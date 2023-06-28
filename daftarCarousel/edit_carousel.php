<?php
if (isset($_GET["ParamAksi"])) {
  $aksi = $_GET["ParamAksi"];
  $table = $_GET['ParamTable'];
  $cek = $_GET['ParamCek'];
}
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
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    @media (max-width: 425px) {
      .card {
        margin-left: -1000px;
      }
      *{
        font-size: small;
      }
    }
  </style>
</head>

<body>

  <?php
  require  "Koneksi.php";
  $idcarousel = $_GET['idCarousel'];
  $sql = "SELECT * FROM carousel WHERE idCarousel like '$idcarousel'";
  $carousel = query($sql);
  ?>
  
  <?php include "../assets/components/header.php" ?>
  <div class="container">
    <div class="my-5">
      <form action="aksiedit.php?ParamAksi=ubah_foto&ParamTable=carousel" method="post" enctype="multipart/form-data">
        <div class="mt-2">
          <div class="card m-auto" style="width: 30rem;">
            <input type="hidden" name="gambarLama" value="<?= $carousel[0]['gambarCarousel'] ?>">
            <input type="hidden" name="idCarousel" value="<?= $carousel[0]['idCarousel'] ?>">
            <img class="card-img-top" alt="..." src="../assets/imgs/fotocarousel/<?= $carousel[0]['gambarCarousel'] ?>">
            <div class="card-body">
              <div class="mb-3">
                <h5 class="card-title">Edit Gambar Carousel</h5>
                <small class="card-text" style="color: red;">*Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</small>
                <input class="form-control mt-4" type="file" name="gambarCarousel" id="foto" required>
              </div>
              <div style="padding: 5px;">
                <button type="submit" class="btn btn-warning text-white">Save</button>
                <a href="modifikasi_carousel.php" class="btn btn-secondary">Kembali</a>
              </div>
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