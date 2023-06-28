<?php
require "Koneksi.php";

session_start();

// if(!isset($_SESSION['login'])){
//   header("Location: ../login/login.php");
// }

// if(isset($_SESSION['login'])){
//     $login = $_SESSION['login'];
// }
// else{
//     $login = false;
// }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>tambah carousel</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      *{
        font-size: small;
      }
    }
    * {
      font-family: 'Poppins';
    }
  </style>
  </head>
  <body>

  <?php include "../assets/components/header.php" ?>
  <div class="container">
    <div class="">
      <form method="post" class="mb-5" action="aksi_tambah_carousel.php" enctype="multipart/form-data">
        <div class="card border-1 border-dark m-3 mb-5 mt-5">
          <!-- <img src="https://th.bing.com/th?id=OIP.cUUf67YH-hex_XPKWlnZ1QHaLF&w=204&h=305&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2" class="card-img-top" alt="No-Image" style="width: 286px; height:200px;"> -->
          <div class="card-body">
            <h5 class="card-title border-bottom border-2 mb-5 pb-2">Tambah Gambar Carousel</h5>
            <input class="form-control" type="file" name="foto" required="required">
            <small class="card-text" style="color: red;">*Format yang diperbolehkan .png | .jpg | .jpeg</small>
            <div class="text-end mt-3">
              <button class="btn btn-primary text-white" type="submit">Tambah</button>
              <!-- <button class="btn btn-primary" type="reset" >Reset</button> -->
              <a href="modifikasi_carousel.php" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </form>
    </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>