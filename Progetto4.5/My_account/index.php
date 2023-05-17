

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <!--Ricordiamoci icona sito-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    session_start();

    $dbconn=pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $nome=$_SESSION['nome'];
    $user_id=$_SESSION['user_id'];
    $query= "SELECT * FROM utenti where nome='$nome' and user_id=$user_id";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $cognome=$line['cognome'];
            $email=$line['email'];
        }
    ?>

    <div class="container">
        <div class="main">
            <div class="topbar">
                <div class="logo">
                    Click&Park    
                </div>
                <div class="buttons">
                    <button>Come funziona?</button>
                    <button onclick="window.location.href='../aiuto_con_login/index.html';">Aiuto</button>
                    <button onclick="window.location.href='../accesso_effettuato/index.html';">Home</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="../image/utente0.jpg" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h3 id="nome_cognome"><?php echo $nome; ?> <?php echo $cognome; ?></h3>
                                <div class="buttons">
                                <button onclick="location.href='../modifica_password/index.html'">Resetta password</button>
                                <button onclick="location.href='../modifica_email/index.html'">Resetta Email</button>
                                <button onclick="location.href='../elimina_veicolo/index.html'">Elimina Veicolo</button>
                                <button onclick="location.href='../modifica_operazione/index.html'">Modifica operazione</button>
                                <button onclick="location.href='../index.html'">Logout</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">About</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Full Name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo $nome; ?> <?php echo $cognome; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo $email; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>ID</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo $user_id; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Veicoli</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php
                                    $query= "SELECT DISTINCT targa FROM storico where user_id='$user_id'";
                                    $result = pg_query($dbconn, $query);
                                    while ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
                                        foreach ($tuple as $colname => $value){
                                            echo $value;
                                            echo "<br>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 content">
                        <h1 class="m-3">Cronologia</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Ultime transazioni</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    
                                    <?php
                                    $query= "SELECT * FROM storico where user_id='$user_id'";
                                    $result = pg_query($dbconn, $query);
                                    echo "<table>";
                                    $firstline= true;
                                    while ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
                                        if ($firstline){
                                            echo "<tr>";
                                            foreach ($tuple as $colname => $value){
                                                if ($colname=="user_id"){
                                                    echo "<th>";
                                                    print "ID utente";
                                                    echo "</th>";
                                                }
                                                if ($colname=="id_tran"){
                                                    echo "<th>";
                                                    print "ID transazione";
                                                    echo "</th>";
                                                }
                                                if ($colname=="via"){
                                                    echo "<th>";
                                                    print "Via";
                                                    echo "</th>";
                                                }
                                                if ($colname=="ora_arrivo"){
                                                    echo "<th>";
                                                    print "Orario di arrivo";
                                                    echo "</th>";
                                                }
                                                if ($colname=="ora_partenza"){
                                                    echo "<th>";
                                                    print "Orario di Partenza";
                                                    echo "</th>";
                                                }
                                                if ($colname=="targa"){
                                                    echo "<th>";
                                                    print "Targa";
                                                    echo "</th>";
                                                }
                                            }
                                            echo "</tr>";
                                            $firstline=false;
                                        }
                                        echo "<tr>";
                                        foreach ($tuple as $colname => $value){
                                            echo "<td>";
                                        
                                            print $value;
                                        
                                            echo "</td>";
                                        }
                        
                                    
                                        echo "</tr>";
                                
                                    }
                                
                                    echo "</table>";
                                    ?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>© 2023 Click&Park. Tutti i diritti riservati</p>
        </footer>
    </body>
</html>