<?php
require "../../koneksi.php";
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
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/galeri.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
</head>
<!-- <link rel="stylesheet" href="../asset/fontawesome/css/all.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    @font-face {
      font-family: 'Poppins';
      src: url(../../assets/font/font-poppins/Poppins-Regular.ttf);
    }
    *{
      font-family: 'Poppins';
    }
    @media (max-width: 425px){
      .navbar-pertama{
          display: none;
      }
      .popup{
        width: 50%;
      }
      .alert{
        width: 70%;
        font-size: small;
      }
    }
</style>

<body>
  <!-- SECTION POPUP -->
  <div class="popup">
    <?php if (isset($_GET['sukses'])) : ?>
      <div class="alert alert-info" role="alert">
        Kategori berhasil ditambahkan
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['sukses_t_gambar'])) : ?>
      <div class="alert alert-info" role="alert">
        gambar berhasil ditambahkan
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['sukses_h_g'])) : ?>
      <div class="alert alert-info" role="alert">
        gambar berhasil dihapus
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['sukses_u_g'])) : ?>
      <div class="alert alert-info" role="alert">
        gambar dan kategori berhasil diubah
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['sukses_u_k'])) : ?>
      <div class="alert alert-info" role="alert">
        kategori berhasil diubah
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['sukses_h_k_a'])) : ?>
      <div class="alert alert-info" role="alert">
        kategori berhasil dihapus
      </div>
    <?php endif; ?>
<!-- SECTION POPUP GAGAL -->
    <?php if (isset($_GET['gagal'])) : ?>
      <div class="alert alert-danger" role="alert">
        mohon untuk mengisikan kategori dan tanggal terlebih dahulu
      </div>
    <?php endif ?>
    <?php if (isset($_GET['mohon_isi_k_a'])) : ?>
      <div class="alert alert-danger" role="alert">
        mohon untuk menambahkan kategori acara terlebih dahulu
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gagal_t_gambar'])) : ?>
      <div class="alert alert-danger" role="alert">
        mohon untuk mengisi gambar terlebih dahulu
      </div>
    <?php endif ?>
    <?php if (isset($_GET['bukan_gambar'])) : ?>
      <div class="alert alert-danger" role="alert">
        yang anda upload bukan gambar
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gagal_h_g'])) : ?>
      <div class="alert alert-danger" role="alert">
        foto gagal dihapus
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gagal_u_g'])) : ?>
      <div class="alert alert-danger" role="alert">
        foto gagal diubah
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gagal_u_k'])) : ?>
      <div class="alert alert-danger" role="alert">
        kategori gagal diubah
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gagal_h_k_a'])) : ?>
      <div class="alert alert-danger" role="alert">
        kategori gagal dihapus mohon hapus gambar terlebih dahulu
      </div>
    <?php endif ?>
    <?php if (isset($_GET['gambar_terlalu_besar'])) : ?>
      <div class="alert alert-danger" role="alert">
       Ukuran Gambar terlalu besar
      </div>
    <?php endif ?>
  </div>
  <!-- !SECTION POPUP GAGAL -->
  <!-- !SECTION POPUP -->
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
                <img src="../../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" aria-current="page" href="../../home.php">Home</a>
                    <a class="nav-link text-white" href="../../profile/profile.php">Profil</a>
                    <a class="nav-link text-white" href="../../daftarBerita/berita.php">Berita</a>
                    <a class="nav-link text-white" href="#">PPDB</a>
                    <a class="nav-link text-info" href="galeri.php">Galeri</a>
                    <a class="nav-link text-white" href="../../daftarGuru/daftar_guru.php">Daftar Guru</a>
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
                            <li><a class="dropdown-item" href="galeri.php">Galeri</a></li>
                            <li><a class="dropdown-item" href="../../daftarBerita/crud_berita.php">Berita</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar kedua -->
  <div class="container-fluid">
  <div class="text-center mt-2" >
        <h2>Galeri</h2>
      </div>

    <div class="mt-3 mb-3">
      <!-- SECTION CARI -->
      <form class="mt-3 d-flex mb-3" action="" method="get">
        <div class="input-group w-100">
          <input type="text" class="form-control  rounded-pill rounded-end"  name="cari"  id="keyword"   placeholder="masukkan keyword pencarian..." autocomplete="off">
          <button type="submit" class="btn btn-primary rounded-pill rounded-start" id="cari">cari</button>
        </div>
      </form>
      <!-- !SECTION END CARI -->
      <div class="d-flex gap-2 ms-auto button pe-2" style="">
        <!-- SECTION FORM TAMBAH KATEGORI -->
        <form action="../../aksi_crud_galeri.php?ParamAksi=tambah_kategori&ParamTable=kategori_acara&ParamCek=required" method="post" enctype="multipart/form-data">
          <!-- //SECTION start modal -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                  <!--SECTION start modal kategori acara -->
                  <div class="modal-body" id="acara">
                    <span>Nama kategori Acara :</span>
                    <input type="text" class="form-control" name="nama_k_acara" placeholder="Nama acara"><br>
                    <span>Tanggal :</span>
                    <input type="date" class="form-control w-50" name="tanggal_k_acara" id="">
                  </div>
                  <!-- !SECTION end kategori acara -->
                </div>
                <div class="modal-footer border-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="tambah_kategori">Save</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- //!SECTION end TAMBAH KATEGORI -->
        <!-- SECTION TAMBAH GAMBAR -->
        <form action="../../aksi_crud_galeri.php?ParamAksi=tambah_gambar&ParamTable=galeri" method="post" enctype="multipart/form-data">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#tambah_gambar">
            Tambah Gambar
          </button>
  
          <!-- Modal -->
          <div class="modal fade" id="tambah_gambar" tabindex="-1" aria-labelledby="tambah_gambarLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="tambah_gambarLabel">Tambah Gambar</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- //SECTION start modal tambah gambar -->
                <i class="mb-3" style="color: red; ">Pastikan gambar memiliki ukuran 16:9</i><br>
                <i class="mb-3" style="color: red; ">Ukuran gambar maksimal 5MB</i>
                <div class="mb-3">
                  <img src="../asset/image/no-img.jpeg" width="50%" class="previewGambar" id="previewGambar"><br>
                  <label for="" class="form-label">Pilih Gambar :</label>
                  <input type="file" class="form-control inputGambar" name="gambarGaleri" id="inputGambar" onchange="tampilkanGambar()" accept="image/*">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">
                    Pilih Kategori Acara :
                  </label>
                  <select name="id_k_acara" class="form-control" id="id_k_acara">
                    <?php foreach ($acara as $cr) : ?>
                      <option value="<?= $cr['id_k_acara'] ?>"><?= $cr['nama_k_acara'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- //!SECTION end tambah gambar-->
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="tambah_gambar">Save</button>
                </div>
              </div>
            </div>
          </div>
        </form>
          <!-- !SECTION END TAMBAH GAMBAR -->
      </div>
    </div>
    <!--SECTION TIDAK ADA GAMBAR  -->
    <?php if (isset($not_found)):?>
      <div class="text-center">
        <img src="../../assets/imgs/illustrasi/logo 2.png" style="width: 35%;" alt="">
      </div>
    <?php endif;?>
    <!--!SECTION END TIDAK ADA GAMBAR  -->
      <!--SECTION Gambar -->
      <?php foreach ($acara as $cr) : ?>
        <!-- SECTION CARD-->
          <div class="card border-0 gap-3">
          <?php foreach ($gambar as $gbr) : ?>
            <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
              <div class="foto py-3">
                <img src="../../upload/<?= $gbr['gambarGaleri']?>" alt="">
                <!-- SECTION DIV AKSI -->
                <div class="aksi gap-4" id="aksi">
                  <a href="<?= $gbr["idGaleri"] ?>" type="button" data-bs-toggle="modal" data-bs-target="#ubah_foto<?= $gbr['idGaleri'] ?>">
                    <i class="fa-regular fa-pen-to-square fa-2x"></i> 
                  </a>
                  <a type="button"data-bs-toggle="modal" data-bs-target="#hapus_foto<?= $gbr['idGaleri'] ?>">
                  <i class="fa-regular fa-trash-can fa-2x"></i>
                  </a>
                </div>
                <!-- !SECTION DIV AKSI -->
                <!-- SECTION Modal UBAH FOTO-->
                <div class="modal fade" id="ubah_foto<?= $gbr['idGaleri'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="../../aksi_crud_galeri.php?ParamAksi=ubah_foto&ParamTable=galeri" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="gambarLama" value="<?= $gbr["gambarGaleri"]; ?>">
                      <input type="hidden" name="idGaleri" value="<?= $gbr["idGaleri"]; ?>">
                      <input type="hidden" name="id_k_acara" value="<?= $gbr["id_k_acara"]; ?>">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class=" text-center">
                          <i style="color:red;">Ganti foto saat ini</i>
                          <img src="../../upload/<?= $gbr["gambarGaleri"];  ?>" class="mb-3 previewGambar" width="auto">
                        </div>
                        <div class="">
                          <div class="mb-3">
                            <label for="">Pilih gambar :</label>
                            <input type="file" class="form-control inputGambar" name="gambarGaleri" onchange="tampilkanGambar()"  id="">
                          </div>
                          <div class="">
                            <label>Kategori :</label>
                            <select name="id_k_acara"  class="form-control text-center" id="id_k_acara">
                            <?php foreach ($acara as $cr_2) : ?>
                              <option value="<?= $cr_2['id_k_acara']?>"<?= $cr_2['id_k_acara'] == $gbr["id_k_acara"] ? 'selected' : '' ; ?>><?= $cr_2['nama_k_acara'] ?></option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="ubah_foto"  class="btn btn-warning text-white">Update</button>
                      </form>
                      </div>
                    </div>
                  </div>
              </div>
                  <!-- //!SECTION end modal UBAH -->
                  <!-- //SECTION modal hapus -->
                  <div class="modal fade" id="hapus_foto<?= $gbr['idGaleri'] ?>" tabindex="-1" aria-labelledby="hapus_fotoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="../../aksi_crud_galeri.php?ParamAksi=hapus_foto&ParamTable=galeri" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idGaleri" value="<?= $gbr['idGaleri'] ?>">
                        <input type="hidden" name="gambarGaleri" value="<?= $gbr['gambarGaleri'] ?>">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapus_fotoLabel">Hapus gambar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <img src="../../upload/<?= $gbr["gambarGaleri"];?>" alt=""> 
                              <h5>Yakin menghapus foto ini?</h5>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger" name="hapus_foto">Delete</button>
                            </center>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
          
                <!-- //!SECTION modal hapus -->
            </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="judul d-flex">
            <div class="">
              <h3><?= $cr['nama_k_acara'] ?></h3>
              <p><?= $cr['tanggal_k_acara'] ?></p>
            </div>
            <div class="pt-3 pe-2" style="position: absolute; right: 0; z-index: 0;">
  
              <a href="" class="btn btn-info text-white fw-semibold" type="button" data-bs-toggle="modal" data-bs-target="#ubah_kategori_acara<?=$cr['id_k_acara']?>">
                <!-- <i class="fa-regular fa-pen-to-square fa-2x"></i>  --> 
                Edit
              </a>
              <a href="" class="btn btn-warning text-white fw-semibold" type="button"data-bs-toggle="modal" data-bs-target="#hapus_kategori_acara<?=$cr['id_k_acara']?>">
                <!-- <i class="fa-regular fa-trash-can fa-2x"></i> -->
                Hapus
              </a>
            </div>
          </div>
            <!-- !SECTION CARD -->

        <!-- SECTION MODAL HAPUS KATEGORI ACARA -->
        <div class="modal fade" id="hapus_kategori_acara<?=$cr['id_k_acara']?>" tabindex="-1" aria-labelledby="hapus_kategori_acaraLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../aksi_crud_galeri.php?ParamAksi=hapus_k_acara&ParamTable=kategori_acara&ParamCek=ada_gambar" method="post" enctype="multipart/form-data">
              <div class="modal-content">
                <input type="hidden" name="id_k_acara" value="<?= $cr['id_k_acara'] ?>">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="hapus_kategori_acaraLabel">Hapus kategori acara</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <center>
                    <h3><?=$cr['nama_k_acara']?></h3>
                    <p><?=$cr['tanggal_k_acara']?></p>
                    <?php foreach ($gambar as $gbr_lama):?>
                    <input type="hidden" name="gambarGaleri" value="<?=$gbr_lama['gambarGaleri']?>" >
                    <?php endforeach ;?>
                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="hapus_k_acara">hapus</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        <!-- !SECTION END MODAL HAPUS KATEGORI ACARA -->

        <!-- SECTION MODAL UBAH KATEGORI ACARA -->   
        <div class="modal fade" id="ubah_kategori_acara<?=$cr['id_k_acara']?>" tabindex="-1" aria-labelledby="hapus_kategori_acaraLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../aksi_crud_galeri.php?ParamAksi=ubah_k_acara&ParamTable=kategori_acara" method="post" enctype="multipart/form-data">
              <div class="modal-content">
                <input type="hidden" name="id_k_acara" value="<?= $cr['id_k_acara'] ?>">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="hapus_kategori_acaraLabel">Ubah kategori acara</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                      <label for="" class="form-label">Nama acara :</label>
                      <input type="text" class="form-control" name="nama_k_acara" value="<?=$cr['nama_k_acara']?>">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Tanggal :</label>
                      <input type="date" class="form-control w-50" name="tanggal_k_acara" value="<?=$cr['tanggal_k_acara']?>">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning text-white" name="ubah_k_acara">Update</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        <!-- !SECTION END MODAL UBAH KATEGORI ACARA -->
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
<script src="../../assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<script>
    function tampilkanGambar() {
      // var gambar = document.querySelector('#inputGambar');
      // var preview = document.querySelector('#previewGambar');
      var gambar = document.querySelector('.inputGambar');
      var preview = document.querySelector('.previewGambar');
      
      // Membuat objek FileReader
      var pembaca = new FileReader();
      
      // Mengatur callback ketika file gambar selesai dibaca
      pembaca.onloadend = function () {
        preview.src = pembaca.result;
      }
      
      // Membaca file gambar sebagai URL data
      if (gambar.files[0]) {
        pembaca.readAsDataURL(gambar.files[0]);
      } else {
        preview.src = "";
      }
    }
</script>
</body>

</html>