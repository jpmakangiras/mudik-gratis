<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>DaftarMudik</title>
</head>

<body>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Daftar Mudik</h2>
                <p class="lead">Lengkapi data dibawah ini.</p>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form id="form-daftar">
                        <div class="form-group">
                            <label for="rute-jadwal" class="col-form-label">Rute & Jadwal</label>
                            <h6><i>Format: [ModaTransportasi, Asal-Tujuan, Jadwal Keberangkatan, Sisa Slot]</i></h6>
                            <select class="form-control" name="rute" id="rute">
                                <?php foreach($AllJadwal as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>">
                                    <?= $value['transportasi'].', '. $value['asal'].'-'.$value['tujuan'].', '. date('d-m-Y',$value['jadwal_keberangkatan']).', '. $value['remaining_slot'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="=nama-peserta" class="col-form-label">Nama Peserta</label>
                            <input type="text" class="form-control" name="nama_peserta" id="nama-peserta">
                        </div>
                        <div class="form-group">
                            <label for="kode-verifikasi" class="col-form-label">Kode Verifikasi</label>
                            <h6><i>salin kode verifikasi dibawah ini</i></h6>
                            <input type="text" class="form-control col-md-6" name="kode_verifikasi" id="kode-verifikasi" value="<?= $KodeVerifikasi ?> "readonly>
                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="button" id="daftar">Daftar</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1"><a href="https://getbootstrap.com/">Powered by Bootstrap | </a> <a href="https://markdotto.com/">Template by @mdo.</a> <br /></p>
        <footer>
    </div>
    
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
    $( "#daftar" ).click(function() {
        let rute = $( "#rute" ).val();
        let nama_peserta = $( "#nama-peserta" ).val();
        let kode_verifikasi = $( "#kode-verifikasi" ).val();

        if(nama_peserta=='') {
            alert('Nama Peserta Kosong');
            $( "#nama-peserta" ).focus();
            return false;
        }
        
        let data = $( "#form-daftar" ).serialize();

        $.ajax({
        data: data,
        method: "post",
        url: "/daftar-mudik/simpan",
        success: function(result){
            alert(result);
            location.reload();
        }
        });
    });
</script>
</body>
</html>