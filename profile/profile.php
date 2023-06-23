<?php

include '../functions.php';

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
} else {
  $login = false;
}

$daftarVisi = query("SELECT * FROM visi");
$daftarMisi = query("SELECT * FROM misi");
$daftarSejarah = query("SELECT * FROM sejarah");
$daftarEkskul = query("SELECT * FROM ekskul INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
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

    .feedback {
      position: sticky;
    }
  </style>
</head>

<body>

  <?php include "../assets/components/header.php" ?>

  <!-- SECTION awal navbar pertama -->
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
        </div>  -->
  <!-- !SECTION akhir navbar pertama -->
  <!-- SECTION awal navbar kedua -->
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
                        <a class="nav-link text-info" href="../profile/profile.php">Profil</a>
                        <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                        <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                        <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                        <?php if (isset($login) && $login != false) : ?>
                          <li class="nav-item dropdown">
                              <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Edit Website
                              </a>
                              <ul class="dropdown-menu" style="z-index: 9999;">
                                  <li><a class="dropdown-item" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                  <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                  <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                  <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                  <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                  <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                  <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                              </ul>
                          </li>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($login) && $login != false) : ?>
                        <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                    <?php endif; ?>
                    <?php if (isset($login) && $login == false) : ?>
                        <a href="../login/login.php" class="nav-link text-white">Login Admin</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav> -->
  <!-- !SECTION akhir navbar kedua -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="">
          <h3 class="text-center mt-3">Profile Sekolah :</h3>
          <div class="text-center mb-5">
            <img src="../assets/imgs/Foto SD/logoSD.png" class="" width="150" height="150" alt="">
          </div>
          <!-- SECTION SEJARAH -->
          <div class="border-bottom border-dark pb-4">
            <h4>Sejarah</h4>
            <?php foreach ($daftarSejarah as $data) : ?>
              <p class="form-control" name="" id="" cols="30" rows="10">
                <?= $data['teksSejarah'] ?>
              </p>
            <?php endforeach; ?>
          </div>
          <!-- !SECTION SEJARAH -->
          <!-- SECTION VISI MISI -->
          <div class="row text-center py-5 border-bottom border-dark border-1 mb-5">
            <div class="col-md-6">
              <div class="py-5 px-5">
                <h4>VISI</h4>
                <?php foreach ($daftarVisi as $data) : ?>
                  <p class="form-control">
                    <?= $data['teksVisi'] ?>
                  </p>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="py-5 px-5">
                <h4>MISI</h4>
                <?php foreach ($daftarMisi as $data) : ?>
                  <p class="form-control">
                    <?= $data['teksMisi'] ?>
                  </p>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <!-- !SECTION VISI MISI -->
          <!-- SECTION STATISTIC -->
          <div class="row mb-4 text-white">
            <div class="col">
              <div class="text-center bg-info p-5 mb-3">
                <h5>Jumlah Pengajar</h5>
                <h3><b>20</b></h3>
              </div>
            </div>
            <div class="col ms-auto mb-3">
              <div class="text-center bg-info p-5">
                <h5>Akreditasi</h5>
                <h4><b>B</b></h4>
              </div>
            </div>
            <div class="col ms-auto">
              <div class="text-center bg-info p-5">
                <h5>Jumlah Murid</h5>
                <h3><b>80</b></h3>
              </div>
            </div>
          </div>
          <!-- !SECTION STATISTIC -->
          <!-- SECTION ESKULL -->
          <div class="">
            <h3 class="pt-4 mb-4">Ekstrakulikuler :</h3>
            <div class="d-flex flex-wrap">
              <?php foreach ($daftarEkskul as $ekskul) : ?>
                <div class="card mb-3 m-auto">
                  <div class="row">
                    <div class="col-md-3">
                      <!-- <img src="../sample_img/b1.jpg" class="img-fluid" alt="..."> -->
                      <?php if ($ekskul['gambarEkskul'] == '') : ?>
                        <img src="../assets/imgs/ekskul/noImg.png" class="img-fluid" alt="...">
                      <?php else : ?>
                        <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="...">
                      <?php endif ?>
                    </div>
                    <div class="col-md-9">
                      <div class="card-body">
                        <h5 class="card-title"><?= $ekskul['namaEkskul'] ?></h5>
                        <p>
                          <?= $ekskul['jadwalHari'] ?> - <?= $ekskul['nama_guru'] ?>
                        </p>
                      </div>
                      <div class="card-footer bg-white border-0">
                        <a href="../daftarEskull/detail_eskull.php?ekskul=<?= $ekskul['idEkskul'] ?>">Selengkapnya></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
            <div class="text-center mb-3">
              <a href="../daftarEskull/read_eskull.php" class="">Read More ></a>
            </div>
          </div>
          <!-- !SECTION ESKULL -->
        </div>
      </div>
      <div class="col ms-auto">
        <div class="feedback sticky-top">
          <?php include "../assets/components/form-feedback.php" ?>
        </div>
      </div>
    </div>
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
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <?php include "../assets/components/js-form-feedback.html" ?>
</body>

</html>