<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

session_start();

$dbconn=pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
$municipio = $_POST['municipio'];
$via = $_POST['via'];
$comb_check_query = "SELECT * FROM parcheggi where $municipio='$via'";
    $result = pg_query($dbconn, $comb_check_query);
    if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
        header('location: ../modifica_dati_account/modify_fail/modify_fail.html');
    }
    else{
        $query_2="INSERT INTO parcheggi($municipio) VALUES ('$via')";
        $result = pg_query($dbconn,$query_2);
        header('location: ../modifica_dati_account/modify_ok/modify_ok.html');

    }
    ?>