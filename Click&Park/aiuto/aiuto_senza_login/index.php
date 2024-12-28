<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $email = $data["email"];
    $message = $data["message"];

    $to = "progetto1sito@gmail.com";
    $subject = "Nuovo messaggio di contatto";
    $body = "Nome: $name\nEmail: $email\nMessaggio: $message";

    if (mail($to, $subject, $body)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
}
?>