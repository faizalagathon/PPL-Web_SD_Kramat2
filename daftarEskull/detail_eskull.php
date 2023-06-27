<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ekstrakulikuler</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css">
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

  <?php
  if (!isset($_GET['ekskul'])) {
    header("Location: ../profile/profile.php");
  } else {
    $data = query("SELECT * FROM ekskul INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru WHERE idEkskul = $_GET[ekskul]")[0];
  }
  ?>

  <div class="container-fluid">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="card" style="width: 70%;">
        <?php if ($data['gambarEkskul'] == '') : ?>
          <img src="../assets/imgs/ekskul/noImg.png" 
          class="card-img-top" alt="..." style="width: 25%;">
        <?php else : ?>
          <img src="../assets/imgs/ekskul/<?= $data['gambarEkskul'] ?>" class="card-img-top img-fluid" alt="..." style="max-height: 400px; object-fit: cover; object-position: center;">
        <?php endif ?>
        <div class="card-body">
          <h2 class="card-title mb-4 fw-bold"><?= $data['namaEkskul'] ?></h2>
          <h5 class="mb-2 fw-semibold">Informasi :</h5>
          <h5>Hari : <?= $data['jadwalHari'] ?></h5>
          <h5>Pembimbing : <?= $data['nama_guru'] ?></h5>
        </div>
      </div>
    </div>
    <!-- SECTION FOOTER -->
    <div class="footer bg-dark" style="background: url(../assets/imgs/Frame_9.png);background-size: cover;">
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
</body>

</html>