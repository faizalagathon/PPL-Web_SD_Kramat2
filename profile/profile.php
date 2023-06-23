<?php

include '../functions.php';

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}

$daftarVisi = query("SELECT * FROM visi");
$daftarMisi = query("SELECT * FROM misi");
$daftarSejarah = query("SELECT * FROM sejarah");
$daftarEkskul = query("SELECT * FROM ekskul INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      .navbar-pertama {
        display: none;
      }
    }

    * {
      font-family: 'Poppins';
    }

    .feedback {
      position: sticky;
    }
  </style>
</head>

<body>

  <!-- SECTION awal navbar pertama -->
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
        </div>  -->
  <!-- !SECTION akhir navbar pertama -->
  <!-- SECTION awal navbar kedua -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
            <div class="container-fluid ">
                <a class="navbar-brand p-0" href="home.html">
                    <img src="../assets/imgs/Foto_SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>    
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-5 gap-4">
                        <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                        <a class="nav-link text-info" href="../profile/profile.php">Profil</a>
                        <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                        <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                        <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                        <?php if(isset($login) && $login != false) : ?>
                          <li class="nav-item dropdown">
                              <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Edit Website
                              </a>
                              <ul class="dropdown-menu" style="z-index: 9999;">
                                  <li><a class="dropdown-item" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                  <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                  <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                  <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                  <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                  <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                  <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                              </ul>
                          </li>
                        <?php endif ; ?>
                    </div>
                    <?php if(isset($login) && $login != false) : ?>
                        <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                    <?php endif ; ?>
                    <?php if(isset($login) && $login == false) : ?>
                        <a href="../login/login.php" class="nav-link text-white">Login Admin</a>
                    <?php endif ; ?>
                </div>
            </div>
        </nav>
  <!-- !SECTION akhir navbar kedua -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="">
          <h3 class="text-center mt-3">Profile Sekolah :</h3>
          <div class="text-center mb-5">
            <img src="../assets/imgs/Foto_SD/logoSD.png" class="" width="150" height="150" alt="">
          </div>
          <!-- SECTION SEJARAH -->
          <div class="border-bottom border-dark pb-4">
            <h4>Sejarah</h4>
            <?php foreach ($daftarSejarah as $data) : ?>
              <p class="form-control" name="" id="" cols="30" rows="10">
                <?= $data['teksSejarah'] ?>
              </p>
            <?php endforeach; ?>
          </div>
          <!-- !SECTION SEJARAH -->
          <!-- SECTION VISI MISI -->
          <div class="row text-center py-5 border-bottom border-dark border-1 mb-5">
            <div class="col-md-6">
              <div class="py-5 px-5">
                <h4>VISI</h4>
                <?php foreach ($daftarVisi as $data) : ?>
                  <p class="form-control">
                    <?= $data['teksVisi'] ?>
                  </p>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="py-5 px-5">
                <h4>MISI</h4>
                <?php foreach ($daftarMisi as $data) : ?>
                  <p class="form-control">
                    <?= $data['teksMisi'] ?>
                  </p>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <!-- !SECTION VISI MISI -->
          <!-- SECTION STATISTIC -->
          <div class="card-group border border-5 overflow-hidden text-white" style="border-radius: 2rem;">
            <div class="card border-0 bg-info">
              <div class="text-center">
                <img src="../assets/imgs/icon/icon_p_yellow.png" class="card-img-top w-50" alt="...">
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Pengajar</h5>
                <h3 class="fw-bold">20</h3>
              </div>
            </div>
            <div class="card border-0 bg-info">
              <div class="text-center">
                <img src="../assets/imgs/icon/icon_a_yellow.png" class="card-img-top w-50" alt="...">
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Akreditasi</h5>
                <h3 class="fw-bold">B</h3>
              </div>
            </div>
            <div class="card border-0 bg-info">
              <div class="text-center">
                <img src="../assets/imgs/icon/icon_m_yellow.png" class="card-img-top w-50" alt="...">
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Jumlah Murid</h5>
                <h3 class="fw-bold">80</h3>
              </div>
            </div>
          </div>
          <!-- !SECTION STATISTIC -->
          <!-- SECTION ESKULL -->
          <div class="">
            <h3 class="pt-4 mb-4">Ekstrakulikuler :</h3>
            <div class="d-flex flex-wrap">
              <?php foreach ($daftarEkskul as $ekskul) : ?>
                <div class="card mb-3 m-auto">
                  <div class="row">
                    <div class="col-md-3">
                      <!-- <img src="../sample_img/b1.jpg" class="img-fluid" alt="..."> -->
                      <?php if ($ekskul['gambarEkskul'] == '') : ?>
                        <img src="../assets/imgs/ekskul/noImg.png" class="img-fluid" alt="...">
                      <?php else : ?>
                        <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="...">
                      <?php endif ?>
                    </div>
                    <div class="col-md-9">
                      <div class="card-body">
                        <h5 class="card-title"><?= $ekskul['namaEkskul'] ?></h5>
                        <p>
                          <?= $ekskul['jadwalHari'] ?> - <?= $ekskul['nama_guru'] ?>
                        </p>
                      </div>
                      <div class="card-footer bg-white border-0">
                        <a href="../daftarEskull/detail_eskull.php?ekskul=<?= $ekskul['idEkskul'] ?>">Selengkapnya></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
            <div class="text-center mb-3">
              <a href="../daftarEskull/read_eskull.php" class="">Read More ></a>
            </div>
          </div>
          <!-- !SECTION ESKULL -->
        </div>
      </div>
      <div class="col ms-auto">
        <div class="feedback sticky-top">
          <form action="" class="m-auto mt-3 p-3 bg-dark border border-white border-2" method="POST">
            <h3 class="text-white border-bottom border-2 border-white mb-5">FeedBack</h3>
            <div class="mb-2">
              <label class="form-label text-white" for="username" style="display: block;">Email :</label>
              <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-4">
              <label class="form-label text-white" for="password" style="display: block;">Pesan :</label>
              <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
            </div>
            <div class="mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill w-100 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="login">Kirim</button>
          </form>
        </div>
      </div>
    </div>
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
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>