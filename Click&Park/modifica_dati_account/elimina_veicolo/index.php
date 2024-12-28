<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$targa=$_POST['targa'];
$nome=$_SESSION["nome"];
$user_id=$_SESSION["user_id"];
$dbconn=pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $query= "SELECT * FROM storico where targa='$targa' and user_id='$user_id'";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $query="DELETE FROM storico where targa = $1 and user_id = $2";
            $result = pg_query_params($dbconn,$query, array($targa, $user_id)) ;
            header('location: ../modify_ok/modify_ok.html');
        }

    else{
        header('location: ../modify_fail/modify_fail.html');

    }
    ?>
