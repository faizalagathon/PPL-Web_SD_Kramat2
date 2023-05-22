<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Eskull</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(assets/font/font-poppins/Poppins-Regular.ttf);
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

  <?php include "aksi_ekskul.php" ?>
  <?php include "../assets/components/header.php" ?>

  <div class="container-fluid">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Tambah Ekstrakulikuler</h3>
        <div class="p-3">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label">Sertakan Gambar :</label>
              <input type="file" class="form-control w-25" name="gambar">
            </div>
<<<<<<< HEAD
        </nav>
    </div> 
    <!-- !SECTION akhir navbar pertama -->
    <!-- SECTION awal navbar kedua -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../assets/imgs/Foto SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
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
                    <a class="nav-link text-white" href="../GALERI/galeri/admin/galeri.php">Galeri</a>
                    <a class="nav-link text-white" href="../daftarGuru/daftar_guru.php">Daftar Guru</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit Website
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Carousel</a></li>
                            <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                            <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                            <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item" href="../GALERI/galeri/admin/galeri.php">Galeri</a></li>
                            <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- !SECTION akhir navbar kedua -->
    <div class="container-fluid">
        <div class="justify-content-center d-flex mb-4 mt-3">
            <div class="border-dark border rounded-3" style="width: 70%;">
                <h3 class="border-bottom border-dark py-2 m-3">Tambah Ekstrakulikuler</h3>
                <div class="p-3">
                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Sertakan Gambar :</label>
                            <input type="file" class="form-control w-25">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Nama Eskull :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Hari :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Pukul :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Pembimbing :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Jumlah Anggota :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning text-white">Batal</button>
                            <button type="submit" class="btn btn-info text-white">Tambahkan</button>
                        </div>
                    </form>
                </div>
=======
            <div class="mb-3">
              <label for="" class="form-label">Nama Eskull :</label>
              <input type="text" class="form-control" name="nama">
>>>>>>> 5bf1e4653dba2858d896c6136602a848c90405bf
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Hari :</label>
              <select class="form-select" aria-label="Default select example" name="jadwal">
                <option selected> - </option>
                <?php foreach ($daftarHari as $hari) : ?>
                  <option value="<?= $hari ?>"><?= $hari ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Pembimbing :</label>
              <select class="form-select" aria-label="Default select example" name="pembimbing">
                <option selected> - </option>
                <?php foreach ($daftarGuru as $guru) : ?>
                  <option value="<?= $guru['id_guru'] ?>"><?= $guru['nama_guru'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <input type="hidden" name="addEkskul">
            <div class="text-end">
              <button type="reset" class="btn btn-warning text-white">Batal</button>
              <button type="submit" class="btn btn-info text-white">Tambahkan</button>
            </div>
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
  <script src="../assets/js/bootstrap-5.3.0/bootstrap.bundle.js"></script>
</body>

</html>