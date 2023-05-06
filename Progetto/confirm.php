<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Elemento trovato!</title>
        <style>
        html{
            background-color: #f2eee3;
        }

        </style>

<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();

$municipio="";
$via="";
$id_tran="";
$user_id="";

$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());

if (isset($_POST['btn_3'])){
    $municipio = $_POST['municipio'];
    $via = $_POST['via_ricerca'];
    $nome=$_SESSION["nome"];
    $comb_check_query = "SELECT * FROM parcheggi where $municipio='$via'";
    $result = pg_query($dbconn, $comb_check_query);
    if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
        $id_tran=mt_rand(0000000000, 9999999999);
        $_SESSION["id_tran"]=$id_tran;
        $query= "SELECT * FROM utenti where nome='$nome'";
        $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $user_id=$line['user_id'];
            $query_2="INSERT INTO storico(user_id, id_tran, via, ora_arrivo, ora_partenza, targa) VALUES ($1,$2,$3,$4,$5,$6)";
            $result = pg_query_params($dbconn,$query_2,array($user_id, $id_tran, $via, null, null, null));
            header('location: summary.html');
            
        }

        
    }
    else{
        header('location: fail.html');
    }

}