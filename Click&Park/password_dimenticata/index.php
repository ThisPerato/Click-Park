<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$email=$_POST['email'];
$dbconn=pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $query= "SELECT * FROM utenti where email='$email'";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            header('location: check_ok.html');
        }

    else{
        header('location: check_fail.html');

    }
    ?>