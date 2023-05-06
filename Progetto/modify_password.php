<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$oldpassword=$_POST['password'];
$newpassword=$_POST['confirmPassword'];
$nome=$_SESSION["nome"];
$user_id=$_SESSION["user_id"];
$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $query= "SELECT * FROM utenti where user_id=$user_id and password='$oldpassword'";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $query="UPDATE utenti SET password = '$newpassword' where user_id = $1 and password = $2";
            $result = pg_query_params($dbconn,$query, array($user_id, $oldpassword));
            header('location: modify_ok.html');
        }

    else{
        header('location: modify_fail.html');

    }
    ?>
