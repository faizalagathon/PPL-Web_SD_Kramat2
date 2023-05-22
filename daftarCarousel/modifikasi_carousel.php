<?php
    // include "../Koneksi.php";
    include '../functions.php';

    $carousel = query("SELECT * FROM carousel");

    if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus'){

      if(hapus($_GET) > 0){
          echo "
          <script>
          alert('Data berhasil dihapus');
          document.location.href = 'modifikasi_carousel.php'; 
          </script>";
      }
      else{
          echo "
          <script>
          alert('Ada kesalahan saat menghapus data');
          document.location.href = 'modifikasi_carousel.php'; 
          </script>";
      }
      
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/modif_carousel.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
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
                            <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                            <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                            <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                            <a class="nav-link text-white" href="#">PPDB</a>
                            <a class="nav-link text-white" href="#">Galeri</a>
                            <a class="nav-link text-white" href="../daftarGuru/daftar_guru.php">Daftar Guru</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Edit Website
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-white" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                    <li><a class="dropdown-item text-white" href="#">Guru</a></li>
                                    <li><a class="dropdown-item text-white" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                    <li><a class="dropdown-item text-white" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                    <li><a class="dropdown-item text-white" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                    <li><a class="dropdown-item text-white" href="#">Galeri</a></li>
                                    <li><a class="dropdown-item text-white" href="../daftarBerita/crud_berita.php">Berita</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </nav>
          <!-- akhir navbar kedua -->
  
  <section>
  <!--for demo wrap-->
  <div class="tbl-header">
    <h1>Edit Data Carousel</h1>
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Gambar Carousel</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
      <?php foreach($carousel as $c) : ?>
        <tr>
            <td><img class="gambar" src="../tugas ppl/../fotocarousel/<?php echo $c["gambarCarousel"]; ?>"></td>
            <td><a  class="btn btn-primary" href="edit_carousel.php?idCarousel=<?php echo $c['idCarousel']; ?>&aksi=edit"> Edit </a>
                &nbsp
                <a  class="btn btn-primary" href="?idCarousel=<?php echo $c['idCarousel']; ?>&aksi=hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> Hapus </a>
                &nbsp 
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div align="center" style="padding: 15px;">
  <!-- <button class="button-24" role="button"><a href="tambah_carousel.php">Tambah</a></button> -->
  <a class="button-24" href="tambah_carousel.php">Tambah</a>
  <a class="button-24-back" href="navbarcarousel.php">Kembali</a>

  </div>

</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">

        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

    </script>
  </body>
</html>