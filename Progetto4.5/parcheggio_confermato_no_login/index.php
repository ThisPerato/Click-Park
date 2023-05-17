<!DOCTYPE html>
<html lang="it">


    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Successo!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <head>
            <body>

            <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">&#10003;</h1>
                <p class="fs-3"> <span class="text-success">Prenotazione confermata!</span> Grazie per avere usato Click & Park.</p>
                <p class="lead">
                  Qui in basso potrai trovare un riepilogo dei dati inseriti.
                  </p>
                <a href="../index.html" class="btn btn-primary">Torna alla pagina iniziale</a>
            </div>
        </div>

        <br>
        <br>
                <div>
                <?php
                $dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
                session_start();
                $id_tran=$_SESSION['id_tran'];
                $user_id=$_SESSION['user_id'];
                $query= "SELECT * FROM storico where user_id='$user_id' and id_tran='$id_tran'";
                $result = pg_query($dbconn, $query);
                echo "<table>";
                $firstline= true;
            if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
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

                    if ($value=='0000000000'){
                        print "Utente non registrato";
                        echo "</td>";

                    }

                    else{
                        
                        print $value;
                        echo "</td>";

                    }
                
                    
                }

            
                echo "</tr>";
        
            }
        
            echo "</table>";

            if ($user_id=="0000000000"){
                $query="DELETE FROM storico where user_id = $1";
                $result = pg_query_params($dbconn,$query, array($user_id));
            }

            

                ?>
                </div>
    </body>


</html>