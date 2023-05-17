<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();



$municipio="";
$via="";
$ora_arrivo="";
$ora_partenza="";
$targa="";
$user_id="";
$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
if (isset($_POST['btn_1'])){
    $municipio = $_POST['municipio-select'];
    $via= $_POST['via-select'];
    $ora_arrivo = $_POST['oraarrivo'];
    $ora_partenza= $_POST['orapartenza'];
    $targa = $_POST['targa'];
    $user_id = '0000000000';
    $_SESSION['user_id']=$user_id;
    $id_tran=mt_rand(0000000000, 9999999999);
    $_SESSION["id_tran"]=$id_tran;
    $query_2="INSERT INTO storico(user_id, id_tran, via, ora_arrivo, ora_partenza, targa) VALUES ($1,$2,$3,$4,$5,$6)";
    $result = pg_query_params($dbconn,$query_2,array($user_id, $id_tran, $via, $ora_arrivo, $ora_partenza, $targa));
    header('location: ../parcheggio_confermato_no_login/index.php');

}
if (isset($_POST['btn_2'])){
    $via= $_POST['via-search'];
    $ora_arrivo = $_POST['oraarrivo1'];
    $ora_partenza= $_POST['orapartenza1'];
    $targa = $_POST['targa1'];
    $user_id = '0000000000';
    $_SESSION['user_id']=$user_id;
    $id_tran=mt_rand(0000000000, 9999999999);
    $_SESSION["id_tran"]=$id_tran;
    $query="SELECT * FROM parcheggi WHERE municipio_i = '$via' or municipio_ii = '$via' or municipio_iii = '$via' or municipio_iv = '$via' or municipio_v = '$via' or municipio_vi = '$via' or municipio_vii = '$via' or municipio_i = '$via' or municipio_viii = '$via' or municipio_i = '$via' or municipio_ix = '$via' or municipio_x = '$via' or municipio_xi = '$via' or municipio_xii = '$via' or municipio_xiii = '$via' or municipio_xiv = '$via' or municipio_xv = '$via'";
    $result = pg_query($dbconn, $query);
    if ($line=pg_fetch_array($result)){
    $query_2="INSERT INTO storico(user_id, id_tran, via, ora_arrivo, ora_partenza, targa) VALUES ($1,$2,$3,$4,$5,$6)";
    $result = pg_query_params($dbconn,$query_2,array($user_id, $id_tran, $via, $ora_arrivo, $ora_partenza, $targa));
    header('location: ../parcheggio_confermato_no_login/index.php');
}
else{
    header('location: modify_fail.html');
}
    }
    
?>