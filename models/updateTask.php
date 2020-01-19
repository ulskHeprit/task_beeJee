<?php

function updateTask($id, $text, $isDone)
{
    $db = getenv('DB');
    $dbname = getenv('DB_NAME');
    $dbhost = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dsn = "{$db}:dbname={$dbname};host={$dbhost}";

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "UPDATE tasks SET text = :text, is_done = :done WHERE id = :id;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":text", $text);
        $stmt->bindParam(":done", $isDone, PDO::PARAM_BOOL);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return 'DB ERROR';
        }
    } catch (PDOException $e) {
        return 'Подключение не удалось: ' . $e->getMessage();
    }
}