<?php
require 'koneksi.php';

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}

$gambar = mysqli_query($link, "SELECT * FROM galeri
INNER JOIN kategori_acara
ON galeri.id_k_acara=kategori_acara.id_k_acara
ORDER by kategori_acara.nama_k_acara;
;");
$acara =query('SELECT * FROM kategori_acara LIMIT 1');

// Menampilkan Visi dan Misi
$dataVisi = mysqli_fetch_assoc(mysqli_query($link, 'SELECT * FROM visi'));
$dataMisi = mysqli_fetch_assoc(mysqli_query($link, 'SELECT * FROM misi'));
if(!isset($dataVisi)){
  $dataVisi = [
      'idVisi' => 0,
      'teksVisi' => 'Belom Menuliskan Visi',    
  ];
}
if(!isset($dataMisi)){
  $dataMisi = [
      'idMisi' => 0,
      'teksMisi' => 'Belom Menuliskan Misi',    
  ];
}

//Carousel
$datacarousel = mysqli_query($link,"SELECT * FROM carousel ORDER BY idCarousel ASC");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(assets/font/font-poppins/Poppins-Regular.ttf);
        }
        @media (max-width: 425px){
            .navbar-pertama{
                display: none;
            }
            .slide .item{
            overflow-y: hidden;
            
          }
          .slide .item .gambar{
              height: 15rem;
              max-width: 100%;
              max-height: 100%;
          }
        }
        /* @media (max-width: 425px){

        } */
        /* body{
          background: url(assets/imgs/bg3.jpg);
          background-size: cover;
        } */
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
              <div class="d-flex">
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
                        <img src="assets/imgs/Foto_SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-5 gap-4">
                            <a class="nav-link text-info" aria-current="page" href="home.php">Home</a>
                            <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                            <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
                            <a class="nav-link text-white" href="daftarGaleri/user/galeri.php">Galeri</a>
                            <a class="nav-link text-white" href="daftarGuru/daftar_guru.php">Daftar Guru</a>
                            <?php if(isset($login) && $login == true) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Edit Website
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                    <li><a class="dropdown-item" href="daftarGuru/daftar_guru.php">Guru</a></li>
                                    <li><a class="dropdown-item" href="profile/edit_sejarah.php">Sejarah</a></li>
                                    <li><a class="dropdown-item" href="profile/edit_visi_misi.php">Visi Misi</a></li>
                                    <li><a class="dropdown-item" href="daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                    <li><a class="dropdown-item" href="daftarGaleri/admin/galeri.php">Galeri</a></li>
                                    <li><a class="dropdown-item" href="daftarBerita/crud_berita.php">Berita</a></li>
                                </ul>
                            </li>
                            <?php endif ; ?>
                        </div>
                        <?php if(isset($login) && $login != false) : ?>
                            <a href="login/logout.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                        <?php endif ; ?>
                        <?php if(isset($login) && $login == false) : ?>
                            <a href="login/login.php" class="nav-link text-white">Login Admin</a>
                        <?php endif ; ?>
                    </div>
                </div>
            </nav>
          <!-- akhir navbar kedua -->
          <div class="container-fluid">
            <div class="py-5" style="background: url(assets/imgs/Frame_8.png);background-size: cover;">
              <!-- SECTION SEMENTARA -->
              <!-- NOTE DESIGN HOME SEMENTARA -->
              <div class="row my-5">
                <div class="col-md-6">
                  <div class="mt-5 pt-3 ms-5">
                    <div class="greet p-2 pb-5 text-white">
                      <h3>Selamat Datang di</h3>
                      <h1 class="fw-bold text-primary">SDN 2 Kramat</h1>
                      <p class="" style="font-style: italic;">"Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya"</p>
                      <div class="">
                        <button class="btn btn-primary rounded-pill px-5">Let Join Us</button>
                        <!-- <button class="btn btn-outline-light">Jelajahi</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 ms-auto">
                  <div class="px-5 py-4">
                    <!-- SECTION CAROUSEL -->
                      <div id="carouselExampleControls" data-bs-ride="carousel" class="carousel slide auto">

                        <!-- NOTE Maksimal Tinggi Gambar Carousel diatas 500px -->
                        <!-- ini yg tadi ilang -->
                        <div class="carousel-inner">
                            <?php
                            $count = 0;
                            while ($d = mysqli_fetch_array($datacarousel)) {
                                $active_class = ($count == 0) ? 'active' : '';
                            ?>
                            <div class="carousel-item <?php echo $active_class; ?>" style="max-height: 30rem;">
                                <img src="assets/imgs/fotocarousel/<?= $d['gambarCarousel'] ?>" class="d-block" 
                                    style="min-width: 100%; min-height: 100%; max-width: 100%; max-height: 15rem; object-fit: cover; object-position: center;" alt="...">
                            </div>
                            <?php
                                $count++;
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    <!-- !SECTION CAROUSEL -->
                  </div>
                </div>
              </div>
              <!-- !SECTION SEMENTARA -->
            </div>
            <!-- SECTION SAMBUTAN -->
            <div class="py-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="text-center">
                    <img src="assets/imgs/illustrasi/logo_a1.png" width="500px" height="500px" alt="">
                  </div>
                </div>
                <div class="col-md-8 ms-auto">
                  <div class="pt-5">
                    <h3 class="pt-5 mb-3 fw-bold">Sambutan</h3>
                    <p>
                      Selamat datang di halaman Website Resmi Sekolah kami. Website ini dibuat untuk memberikan informasi yang lengkap dan terkini mengenai Kegiatan sekolah, Prestasi Siswa, Visi Misi, dan berbagai berita terkini tentang sekolah. Dan kami berkomitmen untuk memberikan pendidikan berkualitas, menciptakan lingkungan belajar yang inspiratif, serta mengembangkan potensi dan bakat setiap siswa. Kami percaya bahwa setiap individu memiliki keunikan dan kami berupaya untuk membantu mereka tumbuh dan berkembang dengan baik. <br><br>
                      Website ini adalah sumber informasi yang penting bagi orang tua, siswa, dan masyarakat sekitar. Kami mengundang Anda sekalian untuk menjelajahi setiap bagian dari website kami, mempelajari kegiatan dan prestasi yang telah kami dan murid kami capai.
                    </p>
                  </div>
                </div>
              </div>
              <!-- <a href="#">Read More ></a> -->
            </div>
            <!-- !SECTION SAMBUTAN -->
            <!-- SECTION VISI MISI -->
            <!-- NOTE MASIH PROTOTYPE -->
            <div class="bg-dark text-white py-5 border-bottom border-dark border-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="py-5 px-5 text-start mb-3">
                    <h4>VISI</h4>
                    <p>
                      <?= $dataVisi['teksVisi'] ?>
                    </p>
                  </div>
                  <div class="py-5 px-5 text-start">
                    <h4>MISI</h4>
                    <p>
                      <?= $dataMisi['teksMisi'] ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-6 ms-auto">
                  <div class="text-center">
                      <img src="assets/imgs/illustrasi/illustrasi_vm.png" width="400px" height="400px" alt="">
                  </div>
                </div>
              </div>
            </div>
            <!-- !SECTION VISI MISI -->
            <!-- SECTION GALERI -->
            <div class="py-4">
            <div style="scroll-snap-type: y mandatory;">
              <h3 class="text-center">GALERI</h3>
                  <!--SECTION Gambar -->
                  <?php foreach ($acara as $cr) : ?>
                    <!-- SECTION CARD-->
                    <div class="card border-0 py-3 gap-3" style="width: 100%;scroll-snap-type: x mandatory;overflow:auto;display: flex;flex-direction: row;">
                      <?php foreach ($gambar as $gbr) : ?>
                        <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
                          <!-- SECTION FOTO -->
                          <div class="foto">
                            <img src="upload/<?=$gbr['gambarGaleri']?>" alt="" style=" scroll-snap-align: start;min-width: 380px;min-height: 240px;max-width: 380px;max-height: 240px;object-fit: cover;object-position: center; padding: 0px 2px;">
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
                  <?php endforeach; ?>
                  <!--!SECTION end Gambar -->
              </div>
              <div class="text-center mb-3">
                <a href="daftarGaleri/user/galeri.php" class="">Read More ></a>
              </div>
            </div>
            <!-- !SECTION GALERI -->
            <!-- SECTION BERITA -->
            <div class="">
              <div class="m-auto">
                  <h3 class="pt-4 text-center mb-3">BERITA</h3>
                  <div class="d-flex flex-wrap justify-content-center mb-3 gap-4">
                    <div class="card" style="width: 15rem;">
                      <img src="assets/imgs/Foto_SD/IMG-20221202-WA0079.jpg" class="card-img-top" alt="..." style="min-width: 100%;min-height: 100px;max-width: 100%;max-height: 130px;object-fit: cover;object-position: center;">
                      <div class="card-body">
                        <h5 class="card-title">Judul Berita</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    <div class="card" style="width: 15rem;">
                      <img src="assets/imgs/Foto_SD/IMG-20221202-WA0027.jpg" class="card-img-top" alt="..." style="min-width: 100%;min-height: 100px;max-width: 100%;max-height: 130px;object-fit: cover;object-position: center;">
                      <div class="card-body">
                        <h5 class="card-title">Judul Berita</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    <div class="card" style="width: 15rem;">
                      <img src="assets/imgs/Foto_SD/IMG-20221202-WA0089.jpg" class="card-img-top" alt="..." style="min-width: 100%;min-height: 100px;max-width: 100%;max-height: 130px;object-fit: cover;object-position: center;">
                      <div class="card-body">
                        <h5 class="card-title">Judul Berita</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                    <!-- <div class="card mb-3 m-auto">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="sample_img/b1.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <small>29 Desember 2022</small>
                            <h5 class="card-title">Judul berita</h5>
                            <p>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, 
                              quo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque 
                            </p>
                          </div>
                          <div class="card-footer bg-white border-0">
                            <a href="daftarberita/detail_berita.php">Selengkapnya></a>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              <div class="text-center mb-3">
                <a href="daftarBerita/berita.php" class="">Read More ></a>
              </div>
              <!-- SECTION FOOTER -->
              <div class="footer bg-dark">
                <div class="row p-5">
                  <div class="col-md-4 p-3">
                    <div class="">
                      <a class="navbar-brand p-0" href="home.html">
                          <img src="assets/imgs/Foto_SD/logo light2.png" alt="Logo" width="300" class="m-0 mb-3 d-inline-block align-text-top">
                      </a>
                      <p class="text-white fs-6 ms-4">"Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya"</p>
                    </div>
                  </div>
                  <div class="col-md-4 p-3 ms-auto">
                    <div class="">
                      <h5 class="text-white mb-4">Contact Us</h5>
                      <p class="text-white">Jl. Siliwangi No. 44Kota Cirebon </p>
                      <p class="text-white">Telp. (0231) 202998</p>
                    </div>
                  </div>
                  <div class="col-md-4 p-3 ms-auto">
                    <div class="">
                      <h5 class="text-white mb-4">Viewer Guides</h5>
                      <div class="">
                        <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
                        <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                        <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
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
            <!-- !SECTION BERITA -->
    <!-- <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>