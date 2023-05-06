<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

session_start();

$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());

if (isset($_POST['btn'])){

    $municipio = $_POST['municipio'];
    $via = $_POST['via_ricerca'];
    $comb_check_query = "SELECT * FROM parcheggi where $municipio='$via'";
    $result = pg_query($dbconn, $comb_check_query);
    if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
        header('location: insert_fail.html');
    }
    else{
        $query_2="INSERT INTO parcheggi($municipio) VALUES ($1)";
        $result = pg_query_params($dbconn,$query_2,array($via));
        header('location: insert_confirm.html');

    }
}


?>