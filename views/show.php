<DOCTYPE html>
<html>
<head>

</head>
<body>

    <form action="create.php">
        <input type="submit" value="Create new Task">
    </form>
    <?php if ($_SESSION['is_admin'] == true) :?>
        <form action="logout.php">
            <input type="submit" value="Logout">
        </form>
    <?php else :?>
        <form action="login.php">
            <input type="submit" value="Login">
        </form>
    <?php endif ?>
    <?php foreach($tasks as $task) :?>
        <?php if ($_SESSION['is_admin'] === true) : ?>
        <a href="/edit.php?id=<?=$task['id']?>"><p>user name: <?= htmlspecialchars($task['user_name'])?></p></a>
        <?php else: ?>
            <p>user name: <?= htmlspecialchars($task['user_name'])?></p>
        <?php endif; ?>
        <p>email: <?= htmlspecialchars($task['email'])?></p>
        <p>text: <?= htmlspecialchars($task['text'])?></p>
        <p>complete: <?= $task['is_done'] //TODO?></p>
        <hr>
    <?php endforeach; ?>
    <?php if ($page > 1) :?>
        <form>
            <input type="hidden" name="page" value="<?= htmlspecialchars($page - 1) ?>">
            <input type="submit" value="<--prev">
        </form>
    <?php endif; ?>
    <form>
        <input type="hidden" name="page" value="<?= htmlspecialchars($page + 1) ?>">
        <input type="submit" value="next-->">
    </form>
</body>
</html>
