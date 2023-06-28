<?php 
$dir = '../';
if (array_search('home.php', explode('/', $_SERVER['REQUEST_URI']))) {$dir = '';}
if (array_search('galeri.php', explode('/', $_SERVER['REQUEST_URI']))) {$dir = '../../';}
?>

<div class="container-fluid p-0">
 <!-- SECTION FOOTER -->
 <div class="footer bg-dark">
  <div class="row p-5">
   <div class="col-md-4 p-3">
    <div class="sd text-center">
     <a class="navbar-brand p-0" href="<?=$dir?>routing.php?home">
      <img src="<?=$dir?>assets/imgs/logo_footer.png" alt="Logo" width="200" class="">
     </a>
     <p class="text-white fs-6 ms-4">Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya</p>
     <!-- SECTION SOSMED -->
     <div class="ms-4">
      <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3 ms-auto">
       <img src="<?=$dir?>assets/imgs/icon/icon_ig_primary.png" width="30px" alt="">
      </a>
      <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3 ms-auto">
       <img src="<?=$dir?>assets/imgs/icon/icon_fb_primary.png" width="30px" alt="">
      </a>
      <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
       <img src="<?=$dir?>assets/imgs/icon/icon_yt_primary.png" width="30px" alt="">
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
       <a class="nav-link text-white" aria-current="page" href="<?=$dir?>routing.php?home">Home</a>
       <a class="nav-link text-white" href="<?=$dir?>routing.php?profile">Profil</a>
       <a class="nav-link text-white" href="<?=$dir?>routing.php?berita">Berita</a>
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