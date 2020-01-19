<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <a href="/"><button>Main page</button></a>
    <form method="post">
        <p>name: <input type="text" name="user_name" value="<?= htmlspecialchars($_POST['user_name'])?>"></p>
        <p>email: <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'])?>"></p>
        <p>text: <textarea name="text"><?= htmlspecialchars($_POST['text'])?></textarea></p>
        <input type="submit" value="Create">
    </form>
    <p><?= htmlspecialchars($error)?></p>
    <p><?= htmlspecialchars($msg)?></p>
</body>
</html>