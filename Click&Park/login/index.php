<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

session_start();

$user_id = "";
$email = "";
$nome = "";
$cognome = "";

$dbconn = pg_connect("host=localhost user=postgres password=Password port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!" . pg_last_error());

if (isset($_POST['sign_up'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = mt_rand(0000000000, 9999999999);

    $email_check_query = "SELECT * FROM utenti WHERE email=$1";
    $result = pg_query_params($dbconn, $email_check_query, array($email));
    if ($line = pg_fetch_array($result)) {
        $error_message = "L'email inserita risulta già utilizzata!";
        echo json_encode(array("error" => $error_message));
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash della password

        $query = "INSERT INTO utenti(user_id, nome, cognome, email, password) VALUES ($1,$2,$3,$4,$5)";
        $result = pg_query_params($dbconn, $query, array($user_id, $nome, $cognome, $email, $hashed_password));

        $_SESSION['username'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['cognome'] = $cognome;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['success'] = "Hai effettuato correttamente l'iscrizione, benvenuto in Click & Park!";
        header('Location: ../accesso_effettuato/index.html');
        exit();
    }
}

if (isset($_POST['log_in'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM utenti WHERE email=$1";
    $result = pg_query_params($dbconn, $query, array($email));
    if ($line = pg_fetch_array($result)) {
        $pswd = $_POST['password'];
        if (password_verify($pswd, $line['password'])) { // Verifica della password hashata
            $nome = $line["nome"];
            $cognome = $line["cognome"];
            $user_id = $line["user_id"];
            $_SESSION['username'] = $email;
            $_SESSION['nome'] = $nome;
            $_SESSION['cognome'] = $cognome;
            $_SESSION['user_id'] = $user_id;
            header('Location: ../accesso_effettuato/index.html');
            exit();
        } else {
            echo "Password non corretta!";
            header('Location: index.html');
            exit();
        }
    } else {
        echo "Email non presente!";
        header('Location: index.html');
        exit();
    }
}

?>
