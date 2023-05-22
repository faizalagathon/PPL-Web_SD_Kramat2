<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Eskull</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      .navbar-pertama {
        display: none;
      }
    }

    * {
      font-family: 'Poppins';
    }
  </style>
</head>

<body>

  <?php include "aksi_ekskul.php" ?>
  <?php include "../assets/components/header.php" ?>

  <div class="container-fluid">
    <!-- SECTION BERITA -->
    <div class="mt-3">
      <div class="d-flex flex-wrap">
        <a href="tambah_eskull.php" class="btn btn-primary m-auto w-75 mb-3">Tambah Eskull</a>

        <?php if (!$daftarEkskul) : ?>
          <div class="card alert alert-danger text-center" role="alert">
            Tidak ada Ekskul
          </div>
        <?php endif ?>

        <?php foreach ($daftarEkskul as $ekskul) : ?>
          <div class="card mb-3 m-auto w-75">
            <div class="row">
              <div class="col-md-3">
                <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="...">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h3 class="card-title"><?= $ekskul['namaEkskul'] ?></h3>
                  <p>Hari : <?= $ekskul['jadwalHari'] ?></p>
                  <p>Pembimbing : <?= $ekskul['nama_guru'] ?></p>
                </div>
                <div class="card-footer bg-white border-0 text-end">
                  <a href="edit_eskull.php?idEkskul=<?= $ekskul['idEkskul'] ?>" class="btn btn-warning text-white">edit</a>
                  <form action="" method="post">
                    <button type="submit" class="btn btn-info text-white">Hapus</button>
                    <input type="hidden" name="delEkskul" value="<?= $ekskul['idEkskul'] ?>">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- !SECTION BERITA -->
  </div>
  <!-- SECTION FOOTER -->
  <div class="footer">
    <div class="text-center bg-dark" style="padding: 5%;">
      <p class="text-white mb-0 mt-0">
        Coypright By @SD_Keramat2023
      </p>
    </div>
  </div>
  <!-- !SECTION FOOTER -->
  <script src="../assets/js/bootstrap-5.3.0/bootstrap.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>

  <?php if (isset($_SESSION['tDel'])) : ?>
    <script>
      alert("Berhasil menghapus data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['tAdd'])) : ?>
    <script>
      alert("Berhasil menambah data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['fAdd'])) : ?>
    <script>
      alert($_SESSION['fAdd'])
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['tEdit'])) : ?>
    <script>
      alert("Berhasil mengupdate data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['fEdit'])) : ?>
    <script>
      alert($_SESSION['fEdit'])
    </script>
  <?php endif ?>

  <?php unset($_SESSION['tDel'], $_SESSION['tAdd'], $_SESSION['fAdd'], $_SESSION['tEdit'], $_SESSION['fEdit']) ?>

</body>

</html>