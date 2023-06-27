<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Eskull</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
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
    <div class="">
      <a href="../profile/profile.php" class="btn btn-secondary m-2">Kembali</a>
    </div>
    <!-- SECTION BERITA -->
    <div class="my-4">
      <div class="d-flex flex-wrap">

        <?php if (!$daftarEkskul) : ?>
          <div class="text-center">
            <img src="../assets/imgs/illustrasi/logo 3_2.png" width="50%" alt="">
          </div>
        <?php endif ?>

        <?php foreach ($daftarEkskul as $ekskul) : ?>
          <div class="card mb-3 m-auto w-75">
            <div class="row">
              <div class="col-md-3">
                <!-- <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="..."> -->
                <?php if ($ekskul['gambarEkskul'] == '') : ?>
                  <img src="../assets/imgs/ekskul/noImg.png" class="img-fluid" alt="...">
                <?php else : ?>
                  <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="...">
                <?php endif ?>
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h3 class="card-title"><?= $ekskul['namaEkskul'] ?></h3>
                  <h6>Hari : <?= $ekskul['jadwalHari'] ?></h6>
                  <h6>Pembimbing : <?= $ekskul['nama_guru'] ?></h6>
                </div>
              </div>
            </div>
            <div class="card-footer bg-white border-0">
              <a href="../daftarEskull/detail_eskull.php?ekskul=<?= $ekskul['idEkskul'] ?>" class="btn btn-info btn-sm w-100 text-white">Selengkapnya></a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- !SECTION BERITA -->
  </div>
  <div class="container-fluid p-0">
    <!-- SECTION FOOTER -->
    <div class="footer bg-dark">
      <div class="row p-5">
        <div class="col-md-4 p-3">
          <div class="sd text-center">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../assets/imgs/logo_footer.png" alt="Logo" width="200" class="">
            </a>
            <p class="text-white fs-6 ms-4">Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya</p>
            <!-- SECTION SOSMED -->
            <div class="ms-4">
              <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3 ms-auto">
                <img src="../assets/imgs/icon/icon_ig_primary.png" width="30px" alt="">
              </a>
              <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3 ms-auto">
                <img src="../assets/imgs/icon/icon_fb_primary.png" width="30px" alt="">
              </a>
              <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                <img src="../assets/imgs/icon/icon_yt_primary.png" width="30px" alt="">
              </a>
            </div>
            <!-- !SECTION SOSMED -->
          </div>
        </div>
        <div class="col-md-4 p-3 ms-auto">
          <div class="kontak text-center">
            <h5 class="text-white mb-4">Contact Us</h5>
            <p class="text-white">Jl. Siliwangi No. 44Kota Cirebon </p>
            <p class="text-white">Telp. (0231) 202998</p>
          </div>
        </div>
        <div class="col-md-4 p-3 ms-auto">
          <div class="guide text-center">
            <div class="">
                <div class="">
                  <h5 class="text-white mb-4">Viewer Guides</h5>
                </div>
                <div class="">
                  <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                  <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                  <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <p class="text-white border-top border-white pb-3 pt-2 mx-3 mb-0 mt-0">
          Coypright By @SD_Keramat2023
        </p>
      </div>
    </div>
    <!-- !SECTION FOOTER -->
  </div>
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