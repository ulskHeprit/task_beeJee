<?php include 'head.html'?>

<body>
<div class="jumbotron d-flex">
<div class="container-fluid">
    <div class="row justify-content-center">
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
    </div>
    <div class="row justify-content-center">
        <div class="text-center">
            <form id="main">
                <?php if ($page > 1) :?>
                    <!-- <input type="hidden" name="page" value="<?= htmlspecialchars($page - 1) ?>"> -->
                    <!-- <input type="submit" name="page" value="<?=$page - 1?>"> -->
                    <input type="button" onclick="document.getElementById('page').value = <?=$page - 1?>; this.form.submit();" value="<--<?=$page - 1?>">

                <?php endif; ?>

                <!-- <input type="hidden" name="page" value="<?= htmlspecialchars($page + 1) ?>"> -->
                <!-- <input type="submit" name="page" value="<?=$page + 1?>"> -->
                <input type="text" style="width: 40px" id="page" name="page" value="<?=$page?>">
                <input type="button" onclick="document.getElementById('page').value = <?=$page + 1?>; this.form.submit();" value="<?=$page + 1?>-->">
                <select name="order" onchange="this.form.submit()">
                    <option <?= $_GET['order'] === 'user_name' ? 'selected' : ''?> value="user_name">user_name</option>
                    <option <?= $_GET['order'] === 'email' ? 'selected' : ''?> value="email">email</option>
                    <option <?= $_GET['order'] === 'is_done' ? 'selected' : ''?> value="is_done">is_done</option>
                </select>
            </form>
        </div>
    </div>
</div>
</div>

    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col col-auto">
    <?php foreach($tasks as $task) :?>
        <div class="row card-body" style="background-color: lightgrey; border: 1px solid grey;">
            <div class="container">


                    <!--<?php //else: ?>-->
                <div class="row">
                    <p>user name: <?= htmlspecialchars($task['user_name'])?></p>
                <!--<?php //endif; ?>--></div>
                <div class="row">
                <p>email: <?= htmlspecialchars($task['email'])?></p></div>
                <div class="row">
                <p>text: <?= htmlspecialchars($task['text'])?></p></div>
                <div class="row">
                <p>complete: <?= $task['is_done'] //TODO?></p></div>
                <?php if ($_SESSION['is_admin'] === true) : ?>
                    <div class="row">
                        <a href="/edit.php?id=<?=$task['id']?>"><p>edit</p></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
        </div>
    </div>

</body>
</html>
