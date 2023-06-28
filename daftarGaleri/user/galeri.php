<?php
require "../../koneksi.php";

if (isset($_SESSION['login'])) {
 $login = $_SESSION['login'];
} else {
 $login = false;
}


// NOTE $gambar as gbr && $acara as cr
$gambar = mysqli_query($link, "SELECT * FROM galeri
INNER JOIN kategori_acara
ON galeri.id_k_acara=kategori_acara.id_k_acara
ORDER by kategori_acara.nama_k_acara;
;");

if (isset($_GET['cari'])) {
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
  $not_found = 'not_found';
 }
}
if (isset($_GET['cari'])) {
 $cari = $_GET['cari'];
 $query = "SELECT * FROM kategori_acara WHERE nama_k_acara LIKE '%$cari%'";
} else {
 $query = "SELECT * FROM kategori_acara";
}
$acara = query($query);

if (isset($_POST["cari"])) {
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
 <link rel="stylesheet" href="../../assets/css/bootstrap-5.3.0/bootstrap.min.css">
 <!-- <link rel="stylesheet" href="../../assets/css/galeri.css"> -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <style>
  @font-face {
   font-family: 'Poppins';
   src: url(../../assets/font/font-poppins/Poppins-Regular.ttf);
  }

  * {
   font-family: 'Poppins';
  }

  @media (max-width: 425px) {
   * {
    font-size: small;
   }

   #feedback .row {
    backdrop-filter: blur(3px);
    color: white;
   }

   #feedback {
    margin-x: 5px;
   }
  }
 </style>
</head>

<body>

 <!-- awal navbar kedua -->
 <?php include "../../assets/components/header.php" ?>
 <!-- akhir navbar kedua -->
 <div class="container-fluid p-0">
  <h2 style="text-align: center;" class="mt-3">Galeri</h2>

  <!-- SECTION CARI -->
  <div class="mx-3">
   <form class="mt-3" action="" method="get">
    <div class="input-group">
     <input type="text" class="form-control form-control-md w-50" name="cari" id="keyword" placeholder="masuikan keyword pencaharian..." autocomplete="off" list="datalist">
     <datalist id="datalist" <?= $datalist['id_k_acara'] ?>>
      <?php foreach ($acara as $datalist) : ?>
       <option value="<?= $datalist['nama_k_acara'] ?>"></option>
      <?php endforeach; ?>
     </datalist>
     <button type="submit" class="btn btn-primary" id="cari">cari</button>
    </div>
   </form>
  </div>
  <?php if (isset($not_found)) : ?>
   <div class="text-center my-4">
    <img src="../../assets/imgs/illustrasi/logo 2.png" style="width: 30%;" alt="">
   </div>
  <?php endif; ?>
  <br>
  <!-- !SECTION END CARI -->
  <!--SECTION Gambar -->
  <?php foreach ($acara as $cr) : ?>
   <div class="card border-0 gap-3 mx-3" style="width: 100%;scroll-snap-type: x mandatory;overflow:auto;display: flex;flex-direction: row;">
    <?php foreach ($gambar as $gbr) : ?>
     <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
      <!-- SECTION FOTO -->
      <div class="foto">
       <img src="../../upload/<?= $gbr['gambarGaleri'] ?>" alt="" style=" scroll-snap-align: start;min-width: 380px;min-height: 240px;max-width: 380px;max-height: 240px;object-fit: cover;object-position: center; padding: 0px 2px;">
      </div>
      <!-- !SECTION FOTO -->
     <?php endif; ?>
    <?php endforeach; ?>
   </div>
   <!-- !SECTION CARD -->
   <div class="judul mx-3">
    <h3><?= $cr['nama_k_acara'] ?></h3>
    <p class="">
     <small>
      <?= $cr['tanggal_k_acara'] ?>
     </small>
    </p>
   </div>
   <!-- SECTION CARD-->
  <?php endforeach; ?>
  <!-- SECTION FEEDBACK -->
  <div class="container" id="feedback">
   <div class="py-5">
    <div class="" style="background: url(../../assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
     <div class="row">
      <div class="col-md-6">

      </div>
      <div class="col-md-6 ms-auto">
       <div class="feedback">
        <form action="" class="m-auto mt-3 p-3" method="POST">
         <h3 class="border-bottom border-2 border-dark mb-5">FeedBack</h3>
         <div class="mb-2">
          <label class="form-label" for="username" style="display: block;">Email :</label>
          <input type="email" class="form-control" name="email" id="username">
         </div>
         <div class="mb-4">
          <label class="form-label" for="password" style="display: block;">Pesan :</label>
          <textarea class="form-control" name="feedback" id="" cols="30" rows="6"></textarea>
         </div>
         <div class="text-end">
          <button type="submit" class="btn btn-primary rounded-pill px-5 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="btnFeedback">Kirim</button>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
  <!-- !SECTION FEEDBACK -->
  <!-- SECTION FOOTER -->
 <?php include "../assets/components/footer.php" ?>
 <!-- !SECTION FOOTER -->

 <!-- <script src="../../../assets/js/bootstrap/bootstrap.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>