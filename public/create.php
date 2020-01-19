<?php

require_once '../models/createTask.php';
require_once '../env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = "";
    $userName = $_POST['user_name'];
    if (empty($userName) || strlen($userName) > 50) {
        $error .= "user name empty or to long (max 50 chars)\n";
    }

    $email = $_POST['email'];
    if (empty($email) || strlen($email) > 50 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= ", email empty or to long (max 50 chars) or incorrect\n";
    }

    $text = $_POST['text'];
    if (empty($text) || strlen($text) > 500) {
        $error .= ", text empty or to long (max 500 chars)";
    }
    if ($error === '') {
        $msg = createTask($userName, $email, $text);
        if ($msg === true) {
            header("Location: /");
            exit();
        }
    }
}

include '../views/create.php';