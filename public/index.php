<?php

require_once '../models/getTasks.php';
require_once '../env.php';

if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
}

$page = (int)($_GET['page'] ?? 1);
$order = $_GET['order'] ?? 'user_name';
$tasks = getTasks($page, 3, $order);

include '../views/show.php';