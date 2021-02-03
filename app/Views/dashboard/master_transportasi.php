<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('public/css/style-dashboard.css'); ?>">

    <title>MudikGratis | Transportasi</title>
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <?php require_once('_sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transportasi</h1>
      </div>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transportasiModal">
        Tambah Transportasi Baru
      </button>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Transportasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($AllTransportation as $key => $value) { ?>
            <tr>
              <td><?= $Number++ ?></td>
              <td><?= $value['nama_transportasi'] ?></td>
              <td>Edit | Hapus</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="transportasiModal" tabindex="-1" role="dialog" aria-labelledby="transportasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transportasiModalLabel">Transportasi Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-transportasi">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Transportasi</label>
            <input type="text" class="form-control" name="nama_transportasi" id="nama-transportasi">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="btn-add-transportasi">Simpan</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
  $( "#btn-add-transportasi" ).click(function() {
    let nama_transportasi = $( "#nama-transportasi" ).val();

    if(nama_transportasi=='') {
      alert('Nama Transportasi Kosong');
      $( "#nama-transportasi" ).focus();
      return false;
    }

    let data = $( "#form-transportasi" ).serialize();

    $.ajax({
      data: data,
      method: "post",
      url: "/admin-panel/transportasi/simpan",
      success: function(result){
        alert(result);
        location.reload();
      }
    });
  });
</script>
</body>

</html>