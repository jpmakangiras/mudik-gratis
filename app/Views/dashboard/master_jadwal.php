<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('public/css/style-dashboard.css'); ?>">

    <title>MudikGratis | Jadwal</title>
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <?php require_once('_sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Jadwal</h1>
      </div>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalModal">
        Tambah Jadwal Baru
      </button>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Transportasi</th>
              <th>Asal</th> 
              <th>Tujuan</th>
              <th>Jadwal Keberangkatan</th>
              <th>Slot</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($AllJadwal as $key => $value) { ?>
            <tr>
              <td><?= $Number++ ?></td>
              <td><?= $value['transportasi'] ?></td>
              <td><?= $value['asal'] ?></td>
              <td><?= $value['tujuan'] ?></td>
              <td><?= date('d-m-Y', $value['jadwal_keberangkatan']) ?></td>
              <td><?= $value['slot'] ?></td>
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
<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="jadwalModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jadwalModalLabel">Jadwal Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-jadwal">
          <div class="form-group">
            <label for="transportasi" class="col-form-label">Transportasi</label>
            <select class="form-control" name="transportasi" id="transportasi">
              <?php foreach($AllTransportation as $key => $value) { ?>
                <option value="<?= $value['nama_transportasi'] ?>"><?= $value['nama_transportasi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="asal" class="col-form-label">Asal</label>
            <select class="form-control" name="asal" id="asal">
              <?php foreach($AllDestination as $key => $value) { ?>
                <option value="<?= $value['nama_destinasi'] ?>"><?= $value['nama_destinasi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tujuan" class="col-form-label">Tujuan</label>
            <select class="form-control" name="tujuan" id="tujuan">
              <?php foreach($AllDestination as $key => $value) { ?>
                <option value="<?= $value['nama_destinasi'] ?>"><?= $value['nama_destinasi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jadwal-keberangkatan" class="col-form-label">Jadwal Keberangkatan</label>
            <input type="date" class="form-control" name="jadwal_keberangkatan" id="jadwal-keberangkatan">
          </div>
          <div class="form-group">
            <label for="slot" class="col-form-label">Slot Peserta</label>
            <input type="number" class="form-control" name="slot" id="slot">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="btn-add-jadwal">Simpan</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
  $( "#btn-add-jadwal" ).click(function() {
    let asal = $( "#asal" ).val();
    let tujuan = $( "#tujuan" ).val();
    let jadwal_keberangkatan = $( "#jadwal-keberangkatan" ).val();
    let slot = $( "#slot" ).val();

    if(asal===tujuan) {
      alert('Maaf, Asal dan Tujuan Harus Beda');
      $( "#asal" ).focus();
      $( "#tujuan" ).focus();
      return false;
    }

    if(jadwal_keberangkatan=='') {
      alert('Jadwal Keberangkatan Kosong');
      $( "#asal" ).focus();
      $( "#tujuan" ).focus();
      return false;
    }

    if(slot=='' || slot < 1) {
      alert('Slot Kosong');
      $( "#slot" ).focus();
      return false;
    }
    
    let data = $( "#form-jadwal" ).serialize();

    $.ajax({
      data: data,
      method: "post",
      url: "/admin-panel/jadwal/simpan",
      success: function(result){
        alert(result);
        location.reload();
      }
    });
  });
</script>
</body>

</html>