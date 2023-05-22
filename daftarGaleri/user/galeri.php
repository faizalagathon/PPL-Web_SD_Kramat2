<?php
require "../../koneksi.php";
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
  <!-- <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/galeri.css">
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
                <img src="image/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-info" aria-current="page" href="home.html">Home</a>
                    <a class="nav-link text-white" href="profile.html">Profil</a>
                    <a class="nav-link text-white" href="berita.html">Berita</a>
                    <a class="nav-link text-white" href="#">PPDB</a>
                    <a class="nav-link text-white" href="#">Galeri</a>
                    <a class="nav-link text-white" href="#">Daftar Guru</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit Website
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-white" href="#">Carousel</a></li>
                            <li><a class="dropdown-item text-white" href="#">Guru</a></li>
                            <li><a class="dropdown-item text-white" href="edit_sejarah.html">Sejarah</a></li>
                            <li><a class="dropdown-item text-white" href="edit_visi_misi.html">Visi Misi</a></li>
                            <li><a class="dropdown-item text-white" href="crud_eskull.html">Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item text-white" href="#">Galeri</a></li>
                            <li><a class="dropdown-item text-white" href="crud_berita.html">Berita</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar kedua -->
  <div class="container-fluid">
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
          <img src="../../assets/imgs/illustrasi/logo 2.png" style="width: 35%; margin: auto 0rem 2rem;" alt="">
      <?php endif;?>
      <br>
      <!-- !SECTION END CARI -->
    <!--SECTION Gambar -->
    <?php foreach ($acara as $cr) : ?>
      <div class="judul">
        <h3><?= $cr['nama_k_acara'] ?></h3>
        <p class="">
          <small>
            <?= $cr['tanggal_k_acara'] ?>
          </small>
        </p>
      </div>
      <!-- SECTION CARD-->
      <div class="card mb-5 py-3 gap-3">
        <?php foreach ($gambar as $gbr) : ?>
          <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
            <!-- SECTION FOTO -->
            <div class="foto">
              <img src="../../upload/<?=$gbr['gambarGaleri']?>" alt="">
            </div>
            <!-- !SECTION FOTO -->
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <!-- !SECTION CARD -->
    <?php endforeach; ?>
  </div>
  <!-- //!SECTION end gambar -->
  <!-- SECTION FOOTER -->
    <div class="footer">
      <div class="text-center bg-dark" style="padding: 5%;">
        <p class="text-white mb-0 mt-0">
          Coypright By @SD_Keramat2023
        </p>
      </div>
    </div>
  <!-- !SECTION FOOTER -->
<script src="../../../assets/js/bootstrap/bootstrap.min.js"></script>

</body>
</html>