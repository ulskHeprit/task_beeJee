<?php

require_once '../models/getTasks.php';
require_once '../env.php';

if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
}

$page = (int)($_GET['page'] ?? 1);
$tasks = getTasks($page);

include '../views/show.php';