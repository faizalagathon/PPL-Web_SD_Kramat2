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
}
$dir = '../';
if (array_search('home.php', explode('/', $_SERVER['REQUEST_URI']))) {
 $dir = '';
}
if (array_search('galeri.php', explode('/', $_SERVER['REQUEST_URI']))) {
 $dir = '../../';
}
?>
<!-- SECTION Awal Navbar Kedua -->
<nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
 <div class="container-fluid ">
  <a class="navbar-brand p-0" href="home.html">
   <img src="<?=$dir?>assets/imgs/Foto_SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
   <div class="navbar-nav ms-5 gap-4">
    <a class="nav-link text-<?= (halAktif('home.php')) ? 'info' : 'white' ?>" aria-current="page" href="<?= $dir ?>routing.php?home">Home</a>
    <a class="nav-link text-<?= (halAktif('profile.php')) ? 'info' : 'white' ?>" href="<?= $dir ?>routing.php?profile">Profil</a>
    <a class="nav-link text-<?= (halAktif('berita.php')) ? 'info' : 'white' ?>" href="<?= $dir ?>routing.php?berita">Berita</a>
    <a class="nav-link text-<?= (halAktif('galeri.php')) ? 'info' : 'white' ?>" href="<?= $dir ?>routing.php?galeri">Galeri</a>
    <a class="nav-link text-<?= (halAktif('daftar_guru_user.php')) ? 'info' : 'white' ?>" href="<?= $dir ?>routing.php?guru">Daftar Guru</a>
    <?php if (isset($login) && $login == true) : ?>
     <li class="nav-item dropdown">
      <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       Edit Website
      </a>
      <ul class="dropdown-menu">
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-carousel">Carousel</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-guru">Guru</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-sejarah">Sejarah</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-visi-misi">Visi Misi</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-ekskul">Ekstrakulikuler</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-galeri">Galeri</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-berita">Berita</a></li>
       <li><a class="dropdown-item" href="<?= $dir ?>routing.php?admin-profile">Profil Sekolah</a></li>
      </ul>
     </li>
    <?php endif; ?>
    <?php if (isset($login) && $login != false) : ?>
     <a href="<?= $dir ?>routing.php?logout" class=" nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
    <?php endif; ?>
    <?php if (isset($login) && $login == false) : ?>
     <a href="<?= $dir ?>routing.php?login" class="nav-link text-white">Login Admin</a>
    <?php endif; ?>
   </div>
  </div>
 </div>
</nav>
<!-- !SECTION akhir navbar kedua -->