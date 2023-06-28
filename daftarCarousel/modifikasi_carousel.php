<?php
include "../functions.php";
// include '../koneksi.php';

// if(!isset($_SESSION['login'])){
//   header("Location: ../login/login.php");
// }

// if(isset($_SESSION['login'])){
//     $login = $_SESSION['login'];
// }
// else{
//     $login = false;
// }

$carousel = query("SELECT * FROM carousel");

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {

  if (hapus($_GET) > 0) {
    echo "
          <script>
          alert('Data berhasil dihapus');
          document.location.href = 'modifikasi_carousel.php'; 
          </script>";
  } else {
    echo "
          <script>
          alert('Ada kesalahan saat menghapus data');
          document.location.href = 'modifikasi_carousel.php'; 
          </script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carousel</title>
  <link rel="stylesheet" href="css/modif_carousel.css">
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
  <!--for demo wrap-->
  <div class="container-fluid">
    <div class="mt-4">
      <h3>Data Carousel</h3>
    </div>
    <div class="tbl-content p-3 border border-1 border-dark mb-5" style="border-radius: 20px;">
      <a class="button-24 btn btn-primary w-100" href="tambah_carousel.php">Tambah</a>
      <div class="d-flex flex-wrap pt-4">
        <?php foreach ($carousel as $c) : ?>
          <div class="card m-auto mb-5" style="width: 18rem;">
            <div class="">
              <img class="card-img-top ms-auto" src="../assets/imgs/fotocarousel/<?php echo $c["gambarCarousel"]; ?>">
            </div>
            <div class="text-end p-2">
              <a class="btn btn-warning text-white" href="edit_carousel.php?idCarousel=<?php echo $c['idCarousel']; ?>&aksi=edit"> Edit </a>
              <a class="btn btn-danger" href="?idCarousel=<?php echo $c['idCarousel']; ?>&aksi=hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> Hapus </a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
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
  <!-- <script src="../assets/js/bootstrap/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
</body>

</html>