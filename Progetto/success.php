
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Successo!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html{
        background-color: #f2eee3;
    }

    table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}

    .final_choice{
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
    }

    body{
        background-color: #f2eee3;
    }

  

    

        </style>
    </head>


    <body>
    <div>
    <?php
    $dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    session_start();
    $oraarrivo="";
    $orapartenza="";
    $targa="";
    $user_id="";
    $id_tran="";
    
    if (isset($_POST['btn_5'])){
        $nome=$_SESSION['nome'];
        $query= "SELECT * FROM utenti where nome='$nome'";
        $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $user_id=$line['user_id'];
            $id_tran=$_SESSION['id_tran'];
            $oraarrivo=$_POST['oraarrivo'];
            $orapartenza=$_POST['orapartenza'];
            $targa=$_POST['targa'];

            $query="UPDATE storico SET ora_arrivo = '$oraarrivo', ora_partenza = '$orapartenza', targa = '$targa' where user_id = $1 and id_tran = $2";
            $result = pg_query_params($dbconn,$query, array($user_id, $id_tran));
        }
        else{
            die("Si è verificato un errore");
        }
    }


    ?>
</div>

<div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">&#10003;</h1>
                <p class="fs-3"> <span class="text-success">Prenotazione confermata!</span> Grazie per avere usato Click & Park.</p>
                <p class="lead">
                  Qui in basso potrai trovare un riepilogo dei dati inseriti.
                  </p>
                <a href="index.php" class="btn btn-primary">Torna alla pagina iniziale</a>
            </div>
        </div>


        

        <div header class="w3-container w3-center" style="padding:128px 16px" id="home">
        <h1 class="w3-jumbo"><b>Riepilogo dati:</b></h1>
        
        <?php
        $nome=$_SESSION['nome'];
        $id_tran=$_SESSION['id_tran'];
        $query2= "SELECT user_id FROM utenti where nome='$nome'";
        $result = pg_query($dbconn, $query2);
        if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
            foreach ($tuple as $colname => $value){
                $user_id=$value;
            }
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
                
                    print $value;
                
                    echo "</td>";
                }

            
                echo "</tr>";
        
            }
        
            echo "</table>";

        }
       
?>

</div>
    </body>


</html>