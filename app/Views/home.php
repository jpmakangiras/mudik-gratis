<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php require_once("_code/_css.php"); ?>

  <link rel="stylesheet" href="<?php echo base_url('public/css/style-home.css'); ?>">

  <title>MudikGratis</title>
</head>

<body>
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">MudikGratis</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="/admin-panel">AdminPanel</a>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
      <h1 class="cover-heading">MudikGratis by PGN.</h1>
      <p class="lead">
        <a href="/daftar-mudik" class="btn btn-lg btn-secondary">Daftar Mudik</a>
      </p>
      <p class="lead">
        <a href="/cek-status" class="btn btn-lg btn-secondary">Cek Status</a>
      </p>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>
          <a href="https://getbootstrap.com/">Powered by Bootstrap | </a> <a href="https://markdotto.com/">Template by @mdo.</a> <br />
        </p>
      </div>
    </footer>
  </div>
  <?php require_once("_code/_js.php"); ?>

</body>

</html>