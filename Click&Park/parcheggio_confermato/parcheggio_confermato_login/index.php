<!DOCTYPE html>
<html lang="it">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Successo!</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../image/logo.png" />

    <head>

    <body>
        <div class="site-panel">
            <div class="logo">Click&Park</div>
            <div class="buttons">
                <button id="how-it-works-btn">Come funziona?</button>
                <button onclick="window.location.href='../../aiuto/aiuto_senza_login/index.html';">Aiuto</button>
                <button onclick="window.location.href='../../accesso_effettuato/index.html';">Home</button>
            </div>
        </div>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h1 class="display-1 fw-bold">&#10003;</h1>
                    <p class="fs-3"> <span class="text-success">Prenotazione confermata!</span> Grazie per avere usato
                        Click
                        & Park.</p>
                    <p class="lead">
                        Qui in basso potrai trovare un riepilogo dei dati inseriti.
                    </p>
                    <a href="../../accesso_effettuato/index.html" class="btn btn-primary">Torna alla pagina iniziale</a>
                </div>
            </div>
        </div>
        <div class="table-container">
            <?php
            $dbconn = pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!" . pg_last_error());
            session_start();
            if (!isset($_SESSION['username'])) {
                // L'utente non è autenticato, reindirizzalo alla pagina di login o a una pagina di errore
                header('location: ../login/index.html');
                exit;
            }
            $id_tran = $_SESSION['id_tran'];
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM storico where user_id='$user_id' and id_tran='$id_tran'";
            $result = pg_query($dbconn, $query);
            echo "<table>";
            $firstline = true;
            if ($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                if ($firstline) {
                    echo "<tr>";
                    foreach ($tuple as $colname => $value) {
                        if ($colname == "user_id") {
                            echo "<th>";
                            print "ID utente";
                            echo "</th>";
                        }
                        if ($colname == "id_tran") {
                            echo "<th>";
                            print "ID transazione";
                            echo "</th>";
                        }
                        if ($colname == "via") {
                            echo "<th>";
                            print "Via";
                            echo "</th>";
                        }
                        if ($colname == "ora_arrivo") {
                            echo "<th>";
                            print "Orario di arrivo";
                            echo "</th>";
                        }
                        if ($colname == "ora_partenza") {
                            echo "<th>";
                            print "Orario di Partenza";
                            echo "</th>";
                        }
                        if ($colname == "targa") {
                            echo "<th>";
                            print "Targa";
                            echo "</th>";
                        }
                    }
                    echo "</tr>";
                    $firstline = false;
                }
                echo "<tr>";
                foreach ($tuple as $colname => $value) {
                    echo "<td>";

                    if ($value == '0000000000') {
                        print "Utente non registrato";
                        echo "</td>";

                    } else {

                        print $value;
                        echo "</td>";

                    }


                }


                echo "</tr>";

            }

            echo "</table>";

            if ($user_id == "0000000000") {
                $query = "DELETE FROM storico where user_id = $1";
                $result = pg_query_params($dbconn, $query, array($user_id));
            }



            ?>
        </div>
        <footer>
            <div class="footer-container">
                <div class="footer-content">
                    <p>&copy; 2023 Click&Park. Tutti i diritti riservati.</p>
                    <ul class="footer-links">
                        <div class="titolo">
                            <h3>Collabora con noi</h3>
                            <li><a href="../../aggiungi parcheggio/index.html">Aggiungi parcheggio</a></li>
                        </div>
                        <div class="titolo">
                            <h3>Contatti</h3>
                            <li><a href="../../aiuto/aiuto_senza_login/index.html">Contattaci</a></li>
                        </div>
                        <div class="titolo">
                            <h3>Conoscenze utilizzate</h3>
                            <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML">HTML</a></li>
                            <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS">CSS</a></li>
                            <li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">JavaScript</a></li>
                            <li><a href="https://www.php.net/docs.php">PHP</a></li>
                            <li><a href="https://jquery.com/">jQuery</a></li>
                        </div>
                    </ul>
                </div>
            </div>
        </footer>

        <div id="how-it-works-popup" class="popup">
            <div class="popup-content">
                <h2>Non sai cosa fare?</h2>
                <p>Niente, se sei in questa pagina significa che tutto è andato bene, la tua prenotazione è stata
                    effettuata con successo! In fondo alla pagina troverai tutti i dati riguardo alla prenotazione, ma
                    non ti preoccupare potrai sempre rivederli (e modificarli se necessario) nella pagina del tuo
                    profilo!</p>

                <button id="close-btn">Chiudi</button>
            </div>
        </div>

        <script src="script.js"></script>
    </body>


</html>