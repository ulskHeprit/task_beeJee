<!DOCTYPE html>
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
    <form id="main">
    <?php if ($page > 1) :?>
            <!-- <input type="hidden" name="page" value="<?= htmlspecialchars($page - 1) ?>"> -->
            <!-- <input type="submit" name="page" value="<?=$page - 1?>"> -->
            <input type="button" onclick="document.getElementById('page').value = <?=$page - 1?>; this.form.submit();" value="<--<?=$page - 1?>">

    <?php endif; ?>

        <!-- <input type="hidden" name="page" value="<?= htmlspecialchars($page + 1) ?>"> -->
        <!-- <input type="submit" name="page" value="<?=$page + 1?>"> -->
        <input type="hidden" id="page" name="page" value="<?=$page?>">
        <input type="button" onclick="document.getElementById('page').value = <?=$page + 1?>; this.form.submit();" value="<?=$page + 1?>-->">
        <select name="order" onchange="this.form.submit()">
            <option <?= $_GET['order'] === 'user_name' ? 'selected' : ''?> value="user_name">user_name</option>
            <option <?= $_GET['order'] === 'email' ? 'selected' : ''?> value="email">email</option>
            <option <?= $_GET['order'] === 'is_done' ? 'selected' : ''?> value="is_done">is_done</option>
        </select>
    </form>
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

</body>
</html>
