<?php
require "Koneksi.php"; 
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
        /* body{
            background-image: url(background_edit.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            align-content: center;
            backdrop-filter: blur(5px);
            justify-content: center;
            padding: 110px;
        } */
    </style>
  </head>
  <body>
    <!-- awal navbar pertama -->
    <div class="navbar-pertama">
          <nav class="navbar navbar-expand-sm display1 p-3" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
            <div class="container-fluid">
              <span class="navbar-brand ukuran-selamat-datang">Selamat Datang Di Website Kami</span>
              <div class="d-flex me-2">
                <span class="nav-link active me-4 text-light" aria-current="page">Jl. Siliwangi No. 44Kota Cirebon </span>
                <span class="nav-link active text-light" aria-current="page">Telp. (0231) 202998</span>
              </div>
            </div>
          </nav>
        </div>
      <!-- akhir navbar pertama -->
      
      
        <!-- awal navbar kedua -->
            <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
                <div class="container-fluid ">
                    <a class="navbar-brand p-0" href="home.html">
                        <img src="../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-5 gap-4">
                            <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                            <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                            <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                            <a class="nav-link text-white" href="#">PPDB</a>
                            <a class="nav-link text-white" href="#">Galeri</a>
                            <a class="nav-link text-info" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
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
                                    <li><a class="dropdown-item" href="#">Galeri</a></li>
                                    <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                                </ul>
                            </li>
                        </div>
                        <?php if(isset($admin) && $admin == true) : ?>
                            <button class="btn btn-primary" style="display: none;" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data Guru</button>
                            <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                        <?php endif ; ?>
                        <?php if(isset($admin) && $admin == false) : ?>
                            <a href="../login/login.php" class="nav-link text-white">Login Admin</a>
                        <?php endif ; ?>
                    </div>
                </div>
            </nav>
          <!-- akhir navbar kedua -->
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
      
      <div class="">

      </div>
    </form>

    <!-- SECTION FOOTER -->
    <div class="footer">
        <div class="text-center bg-dark fixed-bottom" style="padding: 5%;">
            <p class="text-white mb-0 mt-0">
            Coypright By @SD_Keramat2023
            </p>
        </div>
    </div>
    <!-- !SECTION FOOTER -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
