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
if(isset($_SESSION['login'])){
  $login = $_SESSION['login'];
}
else{
  $login = false;
}
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
  <?php include "../assets/components/footer.php" ?>
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