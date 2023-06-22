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

  <!-- awal navbar pertama -->
    <!-- <div class="navbar-pertama">
      <nav class="navbar navbar-expand-sm display1 p-3" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
        <div class="container-fluid">
          <span class="navbar-brand ukuran-selamat-datang">Selamat Datang Di Website Kami</span>
          <div class="d-flex me-2">
            <span class="nav-link active me-4 text-light" aria-current="page">Jl. Siliwangi No. 44Kota Cirebon </span>
            <span class="nav-link active text-light" aria-current="page">Telp. (0231) 202998</span>
          </div>
        </div>
      </nav>
    </div> -->
  <!-- akhir navbar pertama -->
    <!-- awal navbar kedua -->
        <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
            <div class="container-fluid ">
                <a class="navbar-brand p-0" href="home.html">
                    <img src="../assets/imgs/Foto_SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>    
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-5 gap-4">
                        <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                        <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                        <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                        <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                        <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Edit Website
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav> -->
      <!-- akhir navbar kedua -->
  <div class="container-fluid">
    <!-- SECTION BERITA -->
    <div class="mt-3">
      <div class="d-flex mb-2 gap-2">
        <a href="tambah_eskull.php" class="btn btn-primary">Tambah Eskull</a>
        <a href="../profile/profile.php" class="btn btn-danger">Kembali</a>
      </div>
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