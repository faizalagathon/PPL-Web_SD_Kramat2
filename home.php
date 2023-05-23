<?php
require 'koneksi.php';
$gambar = mysqli_query($link, "SELECT * FROM galeri
INNER JOIN kategori_acara
ON galeri.id_k_acara=kategori_acara.id_k_acara
ORDER by kategori_acara.nama_k_acara;
;");
$acara =query('SELECT * FROM kategori_acara LIMIT 1');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    
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
        *{
          font-family: 'Poppins';
        }
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
                        <img src="assets/imgs/Foto SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-5 gap-4">
                            <a class="nav-link text-info" aria-current="page" href="home.php">Home</a>
                            <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                            <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
                            <a class="nav-link text-white" href="#">PPDB</a>
                            <a class="nav-link text-white" href="daftarGaleri/admin/galeri.php">Galeri</a>
                            <a class="nav-link text-white" href="daftarGuru/daftar_guru.php">Daftar Guru</a>
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
                        </div>
                    </div>
                </div>
            </nav>
          <!-- akhir navbar kedua -->
          <div class="container-fluid">
            <!-- SECTION CAROUSEL -->
              <div id="carouselExampleControls" data-bs-ride="carousel" class="carousel slide auto">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <!-- NOTE Maksimal Tinggi Gambar Carousel diatas 500px -->
                <div class="carousel-inner slide">
                  <div class="carousel-item active item" style="max-height: 30rem;">
                    <img src="sample_img/img4.jpg" class="d-block w-100 gambar" style="max-height: max-content;" alt="...">
                  </div>
                  <div class="carousel-item item"  style="max-height: 30rem;">
                    <img src="sample_img/img5.png" class="d-block w-100 gambar" style="max-height: max-content;" alt="...">
                  </div>
                  <div class="carousel-item item"  style="max-height: 30rem;">
                    <img src="sample_img/img2.jpg" class="d-block w-100 gambar" style="max-height: max-content;" alt="...">
                  </div>
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
            <!-- SECTION SAMBUTAN -->
            <div class="text-center py-4 border-bottom border-dark border-1">
              <h3>Sambutan</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet placeat impedit dicta atque ipsam, consequatur 
                at natus a nostrum maiores, iusto sequi consequuntur esse et eius. Corporis id blanditiis molestias qui. Dolore 
                recusandae, veniam ipsam laudantium placeat, voluptatum aliquam, quod perferendis fugiat dolor ut eaque molestiae 
                quo dolorem animi facere? placeat, voluptatum aliquam, quod perferendis fugiat dolor ut eaque molestiae 
              </p>
              <!-- <a href="#">Read More ></a> -->
            </div>
            <!-- !SECTION SAMBUTAN -->
            <!-- SECTION VISI MISI -->
            <div class="row text-center text-white py-5 border-bottom border-dark border-1">
              <div class="col-md-6">
                <div class="bg-info py-5 px-5 text-start mb-3">
                  <h4>VISI</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam commodi amet quod dolores corrupti, voluptates 
                    nulla tempore quae ex reiciendis, cupiditate architecto quasi exercitationem unde, nesciunt repellendus. Aperiam
                    ,voluptatibus hic.
                  </p>
                </div>
              </div>
              <div class="col-md-6 ms-auto">
                <div class="bg-info py-5 px-5 text-start">
                  <h4>MISI</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam commodi amet quod dolores corrupti, voluptates 
                    nulla tempore quae ex reiciendis, cupiditate architecto quasi exercitationem unde, nesciunt repellendus. Aperiam
                    ,voluptatibus hic.
                  </p>
                </div>
              </div>
            </div>
            <!-- !SECTION VISI MISI -->
            <!-- SECTION GALERI -->
            <div class="text-center py-4 border-bottom border-dark border-1">
            <div style="  scroll-snap-type: y mandatory;">
              <h3>GALERI</h3>
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
                    <div class="card mb-5 py-3 gap-3" style=" width: 100%;scroll-snap-type: x mandatory;overflow:auto;display: flex;flex-direction: row;">
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
                  <?php endforeach; ?>
                  <!--!SECTION end Gambar -->
              </div>
              <div class="text-center mb-3">
                <a href="daftarGaleri/admin/galeri.php" class="">Read More ></a>
              </div>
            </div>
            <!-- !SECTION GALERI -->
            <!-- SECTION BERITA -->
            <div class="">
              <h3 class="text-center pt-4">BERITA</h3>
              <div class="d-flex flex-wrap">
                <div class="card mb-3 m-auto">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="sample_img/b1.jpg" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <small>29 Desember 2022</small>
                        <h5 class="card-title">Judul berita</h5>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, 
                          quo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque 
                          dolores fugit quisquam recusandae culpa molestiae id, ab voluptas reprehenderit tempore!
                        </p>
                      </div>
                      <div class="card-footer bg-white border-0">
                        <a href="detail_berita.html">Selengkapnya></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb-3 m-auto">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="sample_img/b2.jpg" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <small>29 Desember 2022</small>
                        <h5 class="card-title">Judul berita</h5>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, 
                          quo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque 
                          dolores fugit quisquam recusandae culpa molestiae id, ab voluptas reprehenderit tempore!
                        </p>
                      </div>
                      <div class="card-footer bg-white border-0">
                        <a href="detail_berita.html">Selengkapnya></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb-3 m-auto">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="sample_img/b3.jpg" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <small>29 Desember 2022</small>
                        <h5 class="card-title">Judul berita</h5>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, 
                          quo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque 
                          dolores fugit quisquam recusandae culpa molestiae id, ab voluptas reprehenderit tempore!
                        </p>
                      </div>
                      <div class="card-footer bg-white border-0">
                        <a href="detail_berita.html">Selengkapnya></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mb-3">
                <a href="berita.html" class="">Read More ></a>
              </div>
            </div>
            <!-- !SECTION BERITA -->
          </div>
          <!-- SECTION FOOTER -->
          <div class="footer">
            <div class="text-center bg-dark" style="padding: 5%;">
              <p class="text-white mb-0 mt-0">
                Coypright By @SD_Keramat2023
              </p>
            </div>
          </div>
          <!-- !SECTION FOOTER -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>