<?php

include '../koneksi.php';

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}



if (isset($_POST['ubahjumlah'])) {
  $jumlahsiswa = $_POST['jumlah'];
  mysqli_query($link, "UPDATE profil SET jumlahsiswa = '$jumlahsiswa'");
  echo "
  <script>
  alert('Jumlah Siswa Berhasil di Ubah');
  window.location.href = 'edit_jumlahsiswa_akreditasi.php';
  </script>
  ";
}

if (isset($_POST['ubahakreditasi'])) {
  $Akreditasi = $_POST['akreditasi'];
  mysqli_query($link, "UPDATE profil SET akreditasi_profil = '$Akreditasi'");
  echo "
  <script>
  alert('Akreditasi Berhasil di Ubah');
  window.location.href = 'edit_jumlahsiswa_akreditasi.php';
  </script>
  ";
}


$dataJumlahSiswa = mysqli_fetch_assoc(mysqli_query($link, 'SELECT jumlahsiswa FROM profil'));
$dataAkreditasi = mysqli_fetch_assoc(mysqli_query($link, 'SELECT akreditasi_profil FROM profil'));

if (!isset($dataJumlahSiswa)) {
  $dataJumlahSiswa = [
    'jumlahsiswa' => 0,
    'teksJumlahSiswa' => 'Belom Menuliskan Jumlah Siswa',
  ];
}

if (!isset($dataAkreditasi)) {
  $dataAkreditasi = [
    'akreditasi_profil' =>NULL,
    'Akreditasi' => 'Belom Menuliskan Akreditasi Sekolah',
  ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Visi Misi</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

<?php include "../assets/components/header.php" ?>
  
    
    <?php if(isset($login) && $login != false) : ?>
        <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
    <?php endif ; ?>
    <?php if(isset($login) && $login == false) : ?>
        <a href="../login/login.php" class="nav-link text-white">Login Admin</a>
    <?php endif ; ?>
  


  <div class="container-fluid p-0">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Edit Jumlah Siswa</h3>
        <div class="p-3">
          <form action="" method="post">
            <div class="mb-3">
              <label for="teksJumlahSiswa" class="form-label">Masukkan Jumlah Siswa :</label>
              <textarea name="jumlah" class="form-control" id="teksJumlahSiswa" cols="30" rows="10"><?= $dataJumlahSiswa['jumlahsiswa'] ?></textarea>
            </div>
            <div class="text-end">
              <button name="ubahjumlah" type="submit" class="btn btn-info text-white" onclick="return confirm('Yakin ingin Mengedit Jumlah Siswa Sekolah?')">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Edit Akreditasi</h3>
        <div class="p-3">
          <form action="" method="post">
            <div class="mb-3">
              <label for="Akreditasi" class="form-label">Masukkan Akreditasi :</label>
              <textarea name="akreditasi" class="form-control" id="Akreditasi" cols="30" rows="10"><?= $dataAkreditasi['akreditasi_profil'] ?></textarea>
            </div>
            <div class="text-end">
              <button name="ubahakreditasi" type="submit" class="btn btn-info text-white" onclick="return confirm('Yakin ingin Mengedit Akreditasi Sekolah?')">Update</button>
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
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>