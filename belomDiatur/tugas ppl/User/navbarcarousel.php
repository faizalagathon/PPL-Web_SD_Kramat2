<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sdn kramat 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style_navbar.css">
  </head>
  <body>
    <!-- COPY DARI SINI -->
    <!-- awal navbar pertama -->
    <div class="navbar-pertama">
      <nav class="navbar navbar-expand-sm display1" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
        <div class="container-fluid">
          <a class="navbar-brand">Alamat Sekolah</a>
          <div class="d-flex me-2">
            <span class="nav-link active me-4" aria-current="page">wlcome</span>
            <a class="nav-link active " aria-current="page" href="#">Kontak Kami</a>
          </div>
        </div>
      </nav>
    </div>
    <!-- akhir navbar pertama -->


    <!-- awal navbar kedua -->
    <nav class="navbar navbar-expand-sm" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../WhatsApp_Image_2022-12-02_at_08.59.18.jpeg-removebg-preview.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          SDN Kramat 2
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>    
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-5">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">Profil</a>
            <a class="nav-link" href="#">Berita</a>
            <a class="nav-link" href="#">PPDB</a>
            <a class="nav-link" href="#">Galeri</a>
            <a class="nav-link" href="#">Informasi</a>
            <a class="nav-link" href="login_user.php">LOGIN</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar kedua -->
    <!-- COPY SAMPE SINI -->


    <!-- AWAL CAROUSEL -->
        <?php
        include "../Koneksi.php";
        $data = mysqli_query($db_link,"select * from carousel ORDER BY idCarousel ASC");
        ?>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php while($d = mysqli_fetch_array($data)) { ?>
        <div class="carousel-item active" data-bs-interval="5000">
          <img class="d-block timer ukuran" src="../fotocarousel/<?php echo $d['gambarCarousel'] ?>">
        </div>
        <?php } ?>
      </div>
        
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- AKHIR CAROUSEL -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

