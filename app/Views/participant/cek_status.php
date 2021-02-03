<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>CekStatus</title>
</head>

<body>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Cek Status</h2>
                <p class="lead">Lengkapi data dibawah ini.</p>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form id="form-cek-status">
                        <div class="form-group">
                            <label for="kode-verifikasi" class="col-form-label">Kode Verifikasi</label>
                            <input type="text" class="form-control col-md-12" name="kode_verifikasi" id="kode-verifikasi" placeholder="Masukkan Kode Verifikasi Anda">
                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="button" id="cek-status">Cek Status</button>
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
    $( "#cek-status" ).click(function() {
        let kode_verifikasi = $( "#kode-verifikasi" ).val();

        if(kode_verifikasi=='') {
            alert('Kode Verifikasi Kosong');
            $( "#kode-verifikasi" ).focus();
            return false;
        }
        
        let data = $( "#form-cek-status" ).serialize();

        $.ajax({
        data: data,
        method: "post",
        url: "/cek-status/status",
        success: function(result){
            alert(result);
            // location.reload();
        }
        });
    });
</script>
</body>
</html>