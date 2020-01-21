<?php include 'head.html'?>

<body>
<div class="jumbotron" style="margin-bottom: 1em; padding: 1em 1em;">
    <div class="container-fluid">
        <div class="row justify-content-center">
                <form action="create.php">
                    <input type="submit" value="Create new Task" class="btn btn-secondary" style="margin: 5px;">
                </form>
                <?php if ($_SESSION['is_admin'] == true) :?>
                    <form action="logout.php">
                        <input type="submit" value="Logout" class="btn btn-warning" style="margin: 5px;">
                    </form>
                <?php else :?>
                    <form action="login.php">
                        <input type="submit" value="Login" class="btn btn-secondary" style="margin: 5px;">
                    </form>
                <?php endif ?>
        </div>
        <div class="row justify-content-center">
            <div class="text-center">
                <form id="main">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <?php if ($page > 1) :?>
                        <input class="btn btn-secondary" type="button" onclick="document.getElementById('page').value = <?=$page - 1?>; this.form.submit();" value="<--<?=$page - 1?>">
                    <?php endif; ?>
                        <input type="text" class="btn btn-light" style="width: 40px" id="page" name="page" value="<?=$page?>">
                        <input class="btn btn-secondary" type="button" onclick="document.getElementById('page').value = <?=$page + 1?>; this.form.submit();" value="<?=$page + 1?>-->">
                    </div>
                        <select class="btn btn-secondary" name="order" onchange="this.form.submit()">
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

        <div class="row card-body" style="background-color: lightgrey; border: 1px solid grey; margin-bottom: 10px;">
            <div class="container">

                <div class="row">
                    <p>user name: <?= htmlspecialchars($task['user_name'])?></p>
                </div>
                <div class="row">
                    <p>email: <?= htmlspecialchars($task['email'])?></p>
                </div>
                <div class="row">
                    <p class="text-justify">text: <?= htmlspecialchars($task['text'])?></p>
                </div>
                <?php if ($task['is_done']) : ?>
                    <p style="color: green;">Completed!</p>
                    <p style="color: red;">Modified by Admin</p>
                <?php else : ?>
                    <p>Not completed</p>
                <?php endif; ?>
                <?php if ($_SESSION['is_admin'] === true) : ?>
                    <div class="row">
                        <a href="/edit.php?id=<?=$task['id']?>">
                            <button class="btn btn-warning"class="btn btn-secondary" style="margin: 5px;">edit</button>
                        </a>
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
