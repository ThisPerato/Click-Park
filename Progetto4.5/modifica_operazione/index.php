<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$idtrans=$_POST['idTrans'];
$type=$_POST['typeOp'];
$value=$_POST['valueOp'];
$nome=$_SESSION["nome"];
$user_id=$_SESSION["user_id"];
$dbconn=pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $query= "SELECT * FROM storico where user_id='$user_id' and id_tran='$idtrans'";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $query="UPDATE storico SET $type = '$value' where user_id = $1 and id_tran = $2";
            $result = pg_query_params($dbconn,$query, array($user_id, $idtrans));
            $ora_arrivo=$line["ora_arrivo"];
            $ora_partenza=$line["ora_partenza"];
            if ($type=="targa"){
            header('location: ../modify_ok.html');
            }
            if ($type=="ora_arrivo"){
                if ($ora_arrivo>$ora_partenza){
                    header('location: index.html');
                }
                else{
                    header('location: ../modify_ok.html');
                }
            }
            if ($type=="ora_partenza"){
                if ($value<=$line["ora_arrivo"]){
                    header('location: index.html');
                }
                else{
                    header('location: ../modify_ok.html'); 
                }
            }
                
            }
      

    else{
        header('location: ../modify_fail.html');

    }
    ?>
