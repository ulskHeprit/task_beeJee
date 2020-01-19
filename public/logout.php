<?php

require_once '../env.php';

if (isset($_COOKIE['PHPSESSID'])) {
    $_SESSION = [];
    setcookie(session_name(), null, -1, '/');
    session_destroy();
}

header("Location: /");
