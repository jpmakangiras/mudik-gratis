<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php require_once("_code/_css.php"); ?>

    <link rel="stylesheet" href="<?php echo base_url('public/css/style-login.css'); ?>">

    <title>MudikGratis | AdminPanel</title>
</head>

<body>
    <form class="form-signin" method="post" action="/credentials/validate">
        <?= csrf_field(); ?>
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">AdminPanel</h1>
        </div>

        <?php require_once("_login_error.php"); ?>

        <div class="form-label-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="username">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autofocus>
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        </div>

        <p class="mt-5 mb-3 text-center">
            <a href="/" class="text-muted ">Back To Home</a>
        </p>
    </form>

    <?php require_once("_code/_js.php"); ?>

</body>

</html>