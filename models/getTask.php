<?php

function getTask($id)
{
    $db = getenv('DB');
    $dbname = getenv('DB_NAME');
    $dbhost = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dsn = "{$db}:dbname={$dbname};host={$dbhost}";

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM tasks WHERE id = :id;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return $task;
    } catch (PDOException $e) {
        return false;
    }
}