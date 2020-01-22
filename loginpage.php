<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include 'headerfiles.html';
    ?>
    <title>Document</title>
</head>
<body>
<?php
include_once 'publicheader.php';
?>
<div class="container">
    <div class="jumbotron">
        <div class="row offset-3">
            <h1 class="text-primary">Login Here</h1>
            <hr>
        </div>
        <form action="checklogin.php" method="post">
            <div class="row col-sm-6 offset-3">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="enter username" name="username" id="username">
                </div>
            </div>
            <div class="row justify-content-center col-sm-6 offset-3">
                <div class="input-container">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" class="input-field" placeholder="enter password" name="password"
                           id="password">
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="submit" class='btn btn-success'>
            </div>
        </form>
    </div>
    <?php
    if (isset($_REQUEST['er'])) {
        $val = $_REQUEST['er'];
        if ($val == 1) {
            echo '<div class="alert alert-danger">
                        Password changed successfully
                        <span class="close" data-dismiss="alert">&times;</span>
                            </div>';
        }
    }
    include_once 'footer.php';
    ?>

</div>
</body>
</html>
