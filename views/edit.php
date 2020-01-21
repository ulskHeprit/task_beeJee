<?php include 'head.html'?>

<body>
<div class="jumbotron" style="margin-bottom: 1em; padding: 1em 1em;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <a href="/"><button class="btn btn-secondary">Main page</button></a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-auto">
            <div class="row card-body" style="background-color: lightgrey; border: 1px solid grey; margin-bottom: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            name:
                        </div>
                        <div class="col">
                            <?= htmlspecialchars($task['user_name'])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            email:
                        </div>
                        <div class="col">
                            <?= htmlspecialchars($task['email'])?>
                        </div>
                    </div>

                        <form action="" method="post">

                            <input type="hidden" name="id" value="<?= htmlspecialchars($task['id'])?>">
                            <div class="row">
                                <div class="col">
                                    text:
                                </div>
                                <div class="col">
                                    <textarea name="text"><?= htmlspecialchars($task['text'])?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    is complete:
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="done" <?= $task['is_done'] ? 'checked' : ''?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <input type="submit" value="Edit" class="btn btn-warning">
                                </div>
                            </div>
                    </form>
                    <p class="justify-content-center" style="color: red;">
                        <?= htmlspecialchars($error)?>
                        <?= htmlspecialchars($msg)?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
