<?php

function getTasks($offset, $limit = 3, $order = 'user_name')
{
    //$dsn = 'mysql:dbname=beejee;host=127.0.0.1'; //TODO
    //$user = 'heprit'; //TODO
    //$password = '785612'; //TODO

    $db = getenv('DB');
    $dbname = getenv('DB_NAME');
    $dbhost = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dsn = "{$db}:dbname={$dbname};host={$dbhost}";

    $order = in_array($order, [ 'user_name', 'email', 'is_done' ]) ? $order : 'user_name' ;
    $offset = ($offset - 1) * $limit;
    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM tasks ORDER BY {$order} LIMIT :limit OFFSET :offset;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    } catch (PDOException $e) {
        return false;
    }
}