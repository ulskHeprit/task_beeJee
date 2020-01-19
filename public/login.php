<?php

require_once '../env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['name'])
    && isset($_POST['password'])
    ) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if ($name === getenv('ADMIN') && $password === getenv('PASSWORD')) { // TODO
        session_start();
        $_SESSION['is_admin'] = true;
        header("Location: /");
        exit;
    } else {
        $error = "wrong name or password";
    }
}

include '../views/login.php';
