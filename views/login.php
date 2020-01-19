<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="" method="POST">
    <p>name: <input type="text" name="name" value="<?= $_POST['name']?>"></p>
    <p>password: <input type="password" name="password"></p>
    <input type="submit" value="Login">
</form>
<p><?= $error?></p>
</body>
</html>