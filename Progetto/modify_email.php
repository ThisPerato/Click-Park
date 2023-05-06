<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$oldemail=$_POST['email'];
$newemail=$_POST['confirmEmail'];
$nome=$_SESSION["nome"];
$user_id=$_SESSION["user_id"];
$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $query= "SELECT * FROM utenti where email='$oldemail'";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $query="UPDATE utenti SET email = '$newemail' where email = $1";
            $result = pg_query_params($dbconn,$query, array($oldemail)) ;
            header('location: modify_ok.html');
        }

    else{
        header('location: modify_fail.html');

    }
    ?>
