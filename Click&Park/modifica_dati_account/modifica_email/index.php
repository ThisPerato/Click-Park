<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();
if (!isset($_SESSION['username'])) {
    // L'utente non è autenticato, reindirizzalo alla pagina di login o a una pagina di errore
    header('location: ../login/index.html');
    exit;
}

$oldemail = $_POST['email'];
$newemail = $_POST['confirmEmail'];
$nome = $_SESSION["nome"];
$user_id = $_SESSION["user_id"];
$password = $_POST['password'];
$dbconn = pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!" . pg_last_error());
$query = "SELECT password FROM utenti WHERE email = '$oldemail'";
$result = pg_query($dbconn, $query);
if ($line = pg_fetch_assoc($result)) {
    $hashedPassword = $line['password'];

    // Confronta l'hash della password fornita dall'utente con quello nel database
    if (password_verify($password, $hashedPassword)) {
        $query = "SELECT * FROM utenti WHERE email = '$newemail'";
        $result = pg_query($dbconn, $query);
        if ($line = pg_fetch_array($result)) {
            header('location: ../modify_fail/modify_fail.html');
        } else {
            $query = "UPDATE utenti SET email = '$newemail' WHERE email = $1";
            $result = pg_query_params($dbconn, $query, array($oldemail));
            header('location: ../modify_ok/modify_ok.html');
        }
    } else {
        header('location: ../modify_fail/modify_fail.html');
    }
} else {
    header('location: ../modify_fail/modify_fail.html');
}
?>