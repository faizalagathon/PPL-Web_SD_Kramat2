<?php
require "../../koneksi.php";

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}


// NOTE $gambar as gbr && $acara as cr
$gambar = mysqli_query($link, "SELECT * FROM galeri
INNER JOIN kategori_acara
ON galeri.id_k_acara=kategori_acara.id_k_acara
ORDER by kategori_acara.nama_k_acara;
;");

if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $sql = "SELECT * FROM kategori_acara WHERE nama_k_acara LIKE '%$cari%'";
  $result = $link->query($sql);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Nama ditemukan
    while ($row = $result->fetch_assoc()) {
      $sql = "SELECT * FROM kategori_acara WHERE nama_k_acara LIKE '%$cari%'";
    }
} else {
    // Nama tidak ditemukan
    $not_found='not_found';
  }
}
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $query = "SELECT * FROM kategori_acara WHERE nama_k_acara LIKE '%$cari%'";
}
else{
  $query = "SELECT * FROM kategori_acara";
}
$acara = query($query);

if(isset($_POST["cari"])){
  $acara = cari($_POST["keyword"]);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Sekolah</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../../assets/css/galeri.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
        @font-face {
          font-family: 'Poppins';
          src: url(../../assets/font/font-poppins/Poppins-Regular.ttf);
        }
        *{
          font-family: 'Poppins';
        }
  </style>
</head>

<body>
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
      <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" aria-current="page" href="../../home.php">Home</a>
                    <a class="nav-link text-white" href="../../profile/profile.php">Profil</a>
                    <a class="nav-link text-white" href="../../daftarBerita/berita.php">Berita</a>
                    <a class="nav-link text-info" href="galeri.php">Galeri</a>
                    <a class="nav-link text-white" href="../../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                    <?php if(isset($login) && $login != false) : ?>
                      <li class="nav-item dropdown">
                          <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Edit Website
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="../../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                              <li><a class="dropdown-item" href="../../daftarGuru/daftar_guru.php">Guru</a></li>
                              <li><a class="dropdown-item" href="../../profile/edit_sejarah.php">Sejarah</a></li>
                              <li><a class="dropdown-item" href="../../profile/edit_visi_misi.php">Visi Misi</a></li>
                              <li><a class="dropdown-item" href="../../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                              <li><a class="dropdown-item" href="../../daftarGaleri/admin/galeri.php">Galeri</a></li>
                              <li><a class="dropdown-item" href="../../daftarBerita/crud_berita.php">Berita</a></li>
                              <li><a class="dropdown-item" href="profile/edit_jumlahsiswa_akreditasi.php">Profil Sekolah</a></li>
                          </ul>
                      </li>
                    <?php endif ; ?>
                  </div>
                  <?php if(isset($login) && $login != false) : ?>
                      <a href="../../login/logout.php" class="ps-3 nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                  <?php endif ; ?>
                  <?php if(isset($login) && $login == false) : ?>
                      <a href="../../login/login.php" class="nav-link text-white ms-3">Login Admin</a>
                  <?php endif ; ?>
            </div>
        </div>
    </nav>
    <!-- akhir navbar kedua -->
  <div class="container-fluid p-0">
    <h2 style="text-align: center;" class="mt-3">Galeri</h2>

       <!-- SECTION CARI -->
       <form class="mt-3 w-50 d-flex" action="" style="z-index: 0; display: block;" method="get">
        <div class="input-group">
          <input  type="text" class="form-control form-control-md w-50"  name="cari"  id="keyword"   placeholder="masuikan keyword pencaharian..." autocomplete="off" list="datalist">
          <datalist id="datalist" <?=$datalist['id_k_acara']?>>
            <?php foreach ($acara as $datalist) :?>
            <option value="<?=$datalist['nama_k_acara']?>"></option>
            <?php endforeach;?>
          </datalist>
          <button type="submit" class="btn btn-primary" id="cari">cari</button>
        </div>
      </form>
      <?php if (isset($not_found)):?>
        <div class="text-center my-4">
          <img src="../../assets/imgs/illustrasi/logo 2.png" style="width: 30%;" alt="">
        </div>
      <?php endif;?>
      <br>
      <!-- !SECTION END CARI -->
    <!--SECTION Gambar -->
    <?php foreach ($acara as $cr) : ?>
      <div class="card border-0 gap-3" style="width: 100%;scroll-snap-type: x mandatory;overflow:auto;display: flex;flex-direction: row;">
        <?php foreach ($gambar as $gbr) : ?>
          <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
            <!-- SECTION FOTO -->
            <div class="foto">
              <img src="../../upload/<?=$gbr['gambarGaleri']?>" alt="" style=" scroll-snap-align: start;min-width: 380px;min-height: 240px;max-width: 380px;max-height: 240px;object-fit: cover;object-position: center; padding: 0px 2px;">
            </div>
            <!-- !SECTION FOTO -->
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <!-- !SECTION CARD -->
      <div class="judul">
        <h3><?= $cr['nama_k_acara'] ?></h3>
        <p class="">
          <small>
            <?= $cr['tanggal_k_acara'] ?>
          </small>
        </p>
      </div>
      <!-- SECTION CARD-->
    <?php endforeach; ?>
    <!-- SECTION FEEDBACK -->
    <div class="container">
      <div class="py-5">
        <div class="row" style="background: url(../../assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
          <div class="col-md-6">
  
          </div>
          <div class="col-md-6 ms-auto">
            <div class="feedback">
              <form action="" class="m-auto mt-3 p-3" method="POST">
                <h3 class="border-bottom border-2 border-dark mb-5">FeedBack</h3>
                <div class="mb-2">
                  <label class="form-label" for="username" style="display: block;">Email :</label>
                  <input type="email" class="form-control" name="email" id="username">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="password" style="display: block;">Pesan :</label>
                  <textarea class="form-control" name="feedback" id="" cols="30" rows="6"></textarea>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary rounded-pill px-5 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="btnFeedback">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- !SECTION FEEDBACK -->
    <!-- SECTION FOOTER -->
    <div class="footer bg-dark">
      <div class="row p-5">
        <div class="col-md-4 p-3">
          <div class="sd text-center">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../../assets/imgs/logo_footer.png" alt="Logo" width="200" class="">
            </a>
            <p class="text-white fs-6 ms-4">Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya</p>
            <!-- SECTION SOSMED -->
            <div class="ms-4">
              <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3 ms-auto">
                <img src="assets/imgs/icon/icon_ig_primary.png" width="30px" alt="">
              </a>
              <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3 ms-auto">
                <img src="assets/imgs/icon/icon_fb_primary.png" width="30px" alt="">
              </a>
              <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                <img src="assets/imgs/icon/icon_yt_primary.png" width="30px" alt="">
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
                  <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
                  <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                  <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
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
<!-- <script src="../../../assets/js/bootstrap/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>