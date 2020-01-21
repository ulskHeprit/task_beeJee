<?php include 'head.html'?>

<body>
<div class="jumbotron" style="margin-bottom: 1em; padding: 1em 1em;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <a href="/"><button class="btn btn-secondary">Main page</button></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="row card-body" style="background-color: lightgrey; border: 1px solid grey; margin-bottom: 10px;">
                <form action="" method="POST">
                <div class="row">
                    <div class="col">
                        name:
                    </div>
                    <div class="col">
                        <input type="text" name="name" value="<?= $_POST['name']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        password:
                    </div>
                    <div class="col">
                        <input type="password" name="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" class="btn btn-primary" style="margin: 10px;" value="Login">
                    </div>
                </div>
                </form>
                <p><?= $error?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>