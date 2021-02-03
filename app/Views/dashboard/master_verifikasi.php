<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php //require_once("_code/_css.php"); ?>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('public/css/style-dashboard.css'); ?>">

    <title>MudikGratis | Verifikasi</title>
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <?php require_once('_sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Verifikasi</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Peserta</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($AllParticipant as $key => $value) { ?>
            <tr>
              <td><?= $Number++ ?></td>
              <td><?= $value['nama_peserta'] ?></td>
              <td><?= ($value['terverifikasi']=='n') ? '<span class="badge badge-pill badge-danger">Belum Terverifikasi</span>' : '<span class="badge badge-pill badge-success">Terverifikasi</span>' ?></td>
              <td>
              <?= ($value['terverifikasi']=='n') ? '<a href="/admin-panel/verifikasi/simpan/'.$value['id'].'">Verifikasi</a>' : '<span class="badge badge-pill badge-success">Done</span>' ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

</body>

</html>