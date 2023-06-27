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

// SECTION DAFTAR VISI
$dataVisi = query("SELECT * FROM visi")[0]['teksVisi'];
$daftarVisi = [];

preg_match_all('/\d+\./', $dataVisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataVisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
  $daftarVisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR VISI

// SECTION DAFTAR MISI
$dataMisi = query("SELECT * FROM misi")[0]['teksMisi'];
$daftarMisi = [];

preg_match_all('/\d+\./', $dataMisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataMisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
  $daftarMisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR MISI

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
        /* MOBILE LAPTOP */
        @media (max-width: 1024px){
          .karosel{
            width: 100%;
            scroll-snap-type: x mandatory;
            overflow:auto;
            display: flex;
            flex-direction: row;
          }
        }
        @media (max-width: 768px){
          *{
            font-size: small;
          }
          .footer .sd .navbar img{
            width: 100px;
          }
          .container-fluid #atas #karosel #gambar{
            max-height: 30rem;
          }
          .container-fluid #atas #karosel #gambar img{
            min-width: 100%; 
            min-height: 100%; 
            max-width: 100%; 
            max-height: 18rem; 
            object-fit: cover; 
            object-position: center;
          }
        }
        @media (max-width: 425px){
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-5 gap-4">
                            <a class="nav-link text-info" aria-current="page" href="home.php">Home</a>
                            <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                            <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
                            <a class="nav-link text-white" href="daftarGaleri/user/galeri.php">Galeri</a>
                            <a class="nav-link text-white" href="daftarGuru/daftar_guru_user.php">Daftar Guru</a>
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
                            <a href="login/logout.php" class="ps-3 nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                        <?php endif ; ?>
                        <?php if(isset($login) && $login == false) : ?>
                            <a href="login/login.php" class="ps-3 nav-link text-white">Login Admin</a>
                        <?php endif ; ?>
                    </div>
                </div>
            </nav>
          <!-- akhir navbar kedua -->
          <div class="container-fluid p-0">
            <div class="py-5" id="atas" style="background: url(assets/imgs/Frame_8.png);background-size: cover;">
              <div class="row my-5">
                <div class="col-md-6">
                  <div class="mt-5 pt-3 ms-5">
                    <div class="greet p-2 pb-5 text-white">
                      <h3>Selamat Datang di</h3>
                      <h1 class="fw-bold text-primary">SDN 2 Kramat</h1>
                      <p class="" style="font-style: italic;">"Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya"</p>
                      <div class="">
                        <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3">
                          <img src="assets/imgs/icon/icon_ig_primary.png" width="40px" alt="">
                        </a>
                        <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3">
                          <img src="assets/imgs/icon/icon_fb_primary.png" width="40px" alt="">
                        </a>
                        <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                          <img src="assets/imgs/icon/icon_yt_primary.png" width="43" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 ms-auto">
                  <div class="px-5 py-4" id="karosel">
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
                            <div class="carousel-item <?php echo $active_class; ?>" style="max-height: 30rem;" id="gambar">
                                <img src="assets/imgs/fotocarousel/<?= $d['gambarCarousel'] ?>" class="d-block" id="gambar2"
                                style="min-width: 100%; min-height: 100%; max-width: 100%; max-height: 18rem; object-fit: cover; object-position: center;" alt="...">
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
            </div>
            <!-- SECTION SAMBUTAN -->
            <div class="py-3">
              <div class="row">
                <div class="col-md-5">
                  <div class="text-center">
                    <img src="assets/imgs/illustrasi/illustrasi_a2.png" width="430px" height="430px" alt="">
                  </div>
                </div>
                <div class="col-md-7 ms-auto">
                  <div class="pt-5">
                    <h3 class="pt-5 mb-3 fw-bold">Sambutan</h3>
                    <p>
                      Selamat datang di halaman Website Resmi Sekolah kami. Website ini dibuat untuk memberikan informasi yang lengkap dan terkini mengenai Kegiatan sekolah, Prestasi Siswa, Visi Misi, dan berbagai berita terkini tentang sekolah. Dan kami berkomitmen untuk memberikan pendidikan berkualitas, menciptakan lingkungan belajar yang inspiratif, serta mengembangkan potensi dan bakat setiap siswa. Kami percaya bahwa setiap individu memiliki keunikan dan kami berupaya untuk membantu mereka tumbuh dan berkembang dengan baik. <br><br>
                      Website ini adalah sumber informasi yang penting bagi orang tua, siswa, dan masyarakat sekitar. Kami mengundang Anda sekalian untuk menjelajahi setiap bagian dari website kami, mempelajari kegiatan dan prestasi yang telah kami dan murid kami capai.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- !SECTION SAMBUTAN -->
            <!-- SECTION VISI MISI -->
            <div class="py-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="pt-4">
                    <div class="py-3 px-5 text-start mb-3">
                      <h4>VISI</h4>
                      <?php foreach($daftarVisi as $dataVisi) : ?>
                        <?= $dataVisi . "<br>" ?>
                      <?php endforeach; ?>
                    </div>
                    <div class="py-3 px-5 text-start">
                      <h4>MISI</h4>
                      <?php foreach($daftarMisi as $dataMisi) : ?>
                        <?= $dataMisi . "<br>" ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 ms-auto">
                  <div class="text-center">
                      <img src="assets/imgs/illustrasi/illustrasi_vm2.png" width="400px" height="400px" alt="">
                  </div>
                </div>
              </div>
            </div>
            <!-- !SECTION VISI MISI -->
            <!-- SECTION GALERI -->
            <div class="py-5">
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
            <div class="py-3">
              <div class="m-auto">
                  <h3 class="pt-3 text-center mb-3">BERITA</h3>
                  <div class="d-flex flex-wrap justify-content-center mb-3 gap-4">
                  <?php foreach(mysqli_query($link, 'SELECT * FROM berita limit 3') as $datab): $part= substr($datab['isiBerita'],0,50);?>
                    <div class="card" style="width: 15rem;">
                      <img src="assets/imgs/berita/<?= $datab['gambarBerita'] ?>" class="card-img-top" alt="..." style="min-width: 100%;min-height: 100px;max-width: 100%;max-height: 130px;object-fit: cover;object-position: center;">
                      <div class="card-body">
                        <h5 class="card-title"><?= $datab["judulBerita"] ?></h5>
                        <p class="card-text"><?= $part ?>....</p>
                      </div>
                      <div class="card-footer">
                        <a href="daftarBerita/detail_berita.php?id=<?= $datab['idBerita'] ?>" class="btn btn-primary">Selengkapnya</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </div>
                </div>
                <div class="text-center mb-5">
                  <a href="daftarBerita/berita.php" class="">Read More ></a>
                </div>
              </div>
              <!-- SECTION FEEDBACK -->
              <div class="container">
                <div class="py-5">
                  <div class="row" style="background: url(assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
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
              <div class="footer bg-dark m-0">
                <div class="row p-5">
                  <div class="col-md-4 p-3">
                    <div class="sd text-center">
                      <a class="navbar-brand p-0" href="home.html">
                          <img src="assets/imgs/logo_footer.png" alt="Logo" width="200" class="">
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
            <!-- !SECTION BERITA -->
    <!-- <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>