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
        <div class="col-auto">
            <div class="row card-body" style="background-color: lightgrey; border: 1px solid grey; margin-bottom: 10px;">
                <div class="container">
                    <form method="post">
                        <div class="row">
                            <div class="col">
                                name:
                            </div>
                            <div class="col">
                                <input type="text" name="user_name" value="<?= htmlspecialchars($_POST['user_name'])?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                email:
                            </div>
                            <div class="col">
                                <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'])?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                text:
                            </div>
                            <div class="col">
                                <textarea name="text"><?= htmlspecialchars($_POST['text'])?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col text-center">
                            <input type="submit" class="btn btn-primary" value="Create">
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
</div>
</body>
</html>