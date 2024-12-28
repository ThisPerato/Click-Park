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

$oldpassword = $_POST['password'];
$newpassword = $_POST['confirmPassword'];
$nome = $_SESSION["nome"];
$user_id = $_SESSION["user_id"];
$dbconn = pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!" . pg_last_error());
$query = "SELECT * FROM utenti WHERE user_id = $user_id";
$result = pg_query($dbconn, $query);
if ($line = pg_fetch_array($result)) {
    $hashedPassword = $line['password'];
    // Confronta la password fornita dall'utente con l'hash memorizzato nel database
    if (password_verify($oldpassword, $hashedPassword)) {
        // Genera un nuovo hash per la nuova password
        $newHashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $query = "UPDATE utenti SET password = '$newHashedPassword' WHERE user_id = $user_id";
        $result = pg_query($dbconn, $query);
        header('location: ../modify_ok/modify_ok.html');
    } else {
        header('location: ../modify_fail/modify_fail.html');
    }
} else {
    header('location: ../modify_fail/modify_fail.html');
}
?>
