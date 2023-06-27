<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Eskull</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css">
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
  </style>
</head>

<body>

  <?php 
    include "aksi_ekskul.php";

    if(!isset($_SESSION['login'])){
      header("Location: ../login/login.php");
    }

    if(isset($_SESSION['login'])){
      $login = $_SESSION['login'];
    }
    else{
      $login = false;
    } 

  ?>
  <?php include "../assets/components/header.php" ?>

  <div class="container-fluid p-0">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Edit Ekstrakulikuler</h3>
        <div class="p-3">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 text-center">
              <label for="" class="form-label">Ubah Gambar :</label><br>
              <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="w-50 mb-2">
              <input type="file" class="form-control m-auto w-25" name="gambar">
            </div>
        </nav>
    </div> 
    <div class="container-fluid">
            <div class="mb-3">
              <label for="" class="form-label">Hari :</label>
              <select class="form-control" aria-label="Default select example" name="jadwal">
                <?php foreach ($daftarHari as $hari) : ?>
                  <option value="<?= $hari ?>" <?= ($hari == $ekskul['jadwalHari']) ? 'selected' : '' ?>>
                    <?= $hari ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Pembimbing :</label>
              <select class="form-select" aria-label="Default select example" name="pembimbing">
                <?php foreach ($daftarGuru as $guru) : ?>
                  <option value="<?= $guru['id_guru'] ?>" <?= ($guru['id_guru'] == $ekskul['idPembimbing']) ? 'selected' : '' ?>>
                    <?= $guru['nama_guru'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="text-end mb-3">
              <input type="hidden" name="editEkskul" value="<?= $ekskul['idEkskul'] ?>">
              <a href="crud_eskull.php" class="btn btn-warning text-white">Batal</a>
              <button type="submit" class="btn btn-info text-white">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
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
    <script src="../assets/js/bootstrap-5.3.0/bootstrap.bundle.js"></script>
</body>

</html>