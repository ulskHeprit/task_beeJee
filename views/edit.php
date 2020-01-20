<?php include 'head.html'?>

<body>
<a href="/"><button>Main page</button></a>
<p>name: <?= htmlspecialchars($task['user_name'])?></p>
<p>email: <?= htmlspecialchars($task['email'])?></p>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($task['id'])?>">
    <p>text: <textarea name="text"><?= htmlspecialchars($task['text'])?></textarea></p>
    <p>is complete: <input type="checkbox" name="done" <?= $task['is_done'] ? 'checked' : ''?>></p>
    <input type="submit" value="Edit">
</form>
<p><?= htmlspecialchars($msg)?></p>
<p><?= htmlspecialchars($error)?></p>
</body>
</html>
