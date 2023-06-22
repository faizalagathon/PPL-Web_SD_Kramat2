<!-- SECTION awal navbar pertama -->
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
<!-- !SECTION akhir navbar pertama -->
<?php function halAktif($hal)
{
  return array_search($hal, explode('/', $_SERVER['REQUEST_URI']));
} ?>
<!-- SECTION awal navbar kedua -->
<nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
  <div class="container-fluid ">
    <a class="navbar-brand p-0" href="home.html">
      <img src="../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-5 gap-4">
        <a class="nav-link text-white" href="../home.php">Home</a>
        <a class="nav-link text-<?= (halAktif('profile.php') != false) ? 'info' : 'white' ?>" href="../profile/profile.php">Profil</a>
        <a class="nav-link text-<?= (halAktif('berita.php') != false) ? 'info' : 'white' ?>" href="../daftarBerita/berita.php">Berita</a>
        <a class="nav-link text-white" href="../daftarGaleri/admin/galeri.php">Galeri</a>
        <a class="nav-link text-<?= (halAktif('daftar_guru.php') != false) ? 'info' : 'white' ?>" href="../daftarGuru/daftar_guru.php">Daftar Guru</a>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Edit Website
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-<?= (halAktif('profile.php') != false) ? 'info' : 'white' ?>" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
            <li><a class="dropdown-item text-<?= (halAktif('daftar_guru.php') != false) ? 'info' : 'white' ?>" href="../daftarGuru/daftar_guru.php">Guru</a></li>
            <li><a class="dropdown-item text-<?= (halAktif('profile.php') != false) ? 'info' : 'white' ?>" href="../profile/profile.php">Sejarah</a></li>
            <li><a class="dropdown-item text-<?= (halAktif('edit_visi_misi.php') != false) ? 'info' : 'white' ?>" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
            <li><a class="dropdown-item text-<?= (halAktif('crud_eskull.php') != false) ? 'info' : 'white' ?>" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
            <li><a class="dropdown-item text-white" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
            <li><a class="dropdown-item text-<?= (halAktif('berita.php') != false) ? 'info' : 'white' ?>" href="../daftarBerita/berita.php">Berita</a></li>
          </ul>
        </li>
      </div>
    </div>
  </div>
</nav>
<!-- !SECTION akhir navbar kedua -->