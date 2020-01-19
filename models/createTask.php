<?php

function createTask($userName, $email, $text)
{
    $db = getenv('DB');
    $dbname = getenv('DB_NAME');
    $dbhost = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dsn = "{$db}:dbname={$dbname};host={$dbhost}";

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "INSERT INTO tasks (user_name, email, text) VALUES (:user_name, :email, :text)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":user_name", $userName);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":text", $text);
        if ($stmt->execute()) {
            return true;
        } else {
            return 'DB ERROR';
        }
    } catch (PDOException $e) {
        return 'Подключение не удалось: ' . $e->getMessage();
    }
}