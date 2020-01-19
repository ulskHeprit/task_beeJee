<?php

require_once '../models/updateTask.php';
require_once '../models/getTask.php';
require_once '../env.php';

if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
}
if ($_SESSION['is_admin'] !== true) {
    header('Location: /');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = "";
    $id = (int)$_POST['id'];
    if (empty($id)) {
        $error .= "wrong id\n";
    }

    $text = $_POST['text'];
    if (empty($text) || strlen($text) > 500) {
        $error .= ", text empty or to long (max 500 chars)";
    }

    $isDone = $_POST['done'] ?? false;
    if ($error === '') {
        $msg = updateTask($id, $text, $isDone);
        if ($msg === true) {
            header("Location: /");
            exit();
        }
    }
}
$id = (int)$_GET['id'];
$task = getTask($id);

include '../views/edit.php';

