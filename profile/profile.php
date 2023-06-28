<?php

include '../functions.php';

if (isset($_SESSION['login'])) {
 $login = $_SESSION['login'];
} else {
 $login = false;
}

// SECTION DAFTAR VISI
$dataVisi = query("SELECT * FROM visi")[0]['teksVisi'];
$daftarVisi = [];

preg_match_all('/\d+\./', $dataVisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataVisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
 $daftarVisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR VISI


// SECTION DAFTAR MISI
$dataMisi = query("SELECT * FROM misi")[0]['teksMisi'];
$daftarMisi = [];

preg_match_all('/\d+\./', $dataMisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataMisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
 $daftarMisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR MISI

// !SECTION JUMLAH SISWA
$jumlahsiswa = query("SELECT jumlahsiswa FROM profil");

// !SECTION JUMLAH SISWA

// !SECTION AKREDITASI
$dataAkreditasi = query("SELECT akreditasi_profil FROM profil");

// !SECTION AKREDITASI


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
 <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 <style>
  @font-face {
   font-family: 'Poppins';
   src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
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
 <!-- SECTION awal navbar kedua -->
 <?php include "../assets/components/header.php" ?>
 <!-- !SECTION akhir navbar kedua -->
 <div class="container">
  <h3 class="text-center mt-3">Profile Sekolah :</h3>
  <div class="py-5">
   <div class="text-center mb-5">
    <img src="../assets/imgs/Foto_SD/logoSD.png" class="mb-3" width="150" height="150" alt="">
   </div>
   <!-- SECTION SEJARAH -->
   <div class="pb-2">
    <h4>Sejarah</h4>
    <?php foreach ($daftarSejarah as $data) : ?>
     <p class="" name="" id="" cols="30" rows="10">
      <?= $data['teksSejarah'] ?>
     </p>
    <?php endforeach; ?>
   </div>
   <!-- !SECTION SEJARAH -->
  </div>
  <!-- SECTION VISI MISI -->
  <div class="py-5">
   <div class="row">
    <div class="col-md-6">
     <div class="text-center">
      <img src="../assets/imgs/illustrasi/illustrasi_vm2.png" width="400px" height="400px" alt="">
     </div>
    </div>
    <div class="col-md-6 ms-auto">
     <div class="py-5">
      <div class="px-5 pb-4">
       <h4>VISI</h4>
       <?php foreach ($daftarVisi as $data) : ?>
        <?= $data . '<br>' ?>
       <?php endforeach; ?>
      </div>
      <div class="px-5">
       <h4>MISI</h4>
       <?php foreach ($daftarMisi as $data) : ?>
        <?= $data . '<br>' ?>
       <?php endforeach; ?>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- !SECTION VISI MISI -->
  <div class="py-5">
   <!-- SECTION STATISTIC -->
   <div class="card-group border border-5 overflow-hidden text-white" style="border-radius: 2rem;">
    <div class="card border-0 bg-info">
     <div class="text-center">
      <img src="../assets/imgs/icon/icon_p_yellow.png" class="card-img-top w-50" alt="...">
     </div>
     <div class="card-body text-center text-white">
      <h5 class="card-title">Pengajar</h5>
      <h3 class="fw-bold">20</h3>
     </div>
    </div>
    <div class="card border-0 bg-info">
     <div class="text-center">
      <img src="../assets/imgs/icon/icon_a_yellow.png" class="card-img-top w-50" alt="...">
     </div>
     <div class="card-body text-center text-white">
      <h5 class="card-title">Akreditasi</h5>
      <h3 class="fw-bold">
       <?php foreach ($dataAkreditasi as $akreditasi) : ?>
        <?= $akreditasi['akreditasi_profil'] ?>
       <?php endforeach; ?>
      </h3>
     </div>
    </div>
    <div class="card border-0 bg-info">
     <div class="text-center">
      <img src="../assets/imgs/icon/icon_m_yellow.png" class="card-img-top w-50" alt="...">
     </div>
     <div class="card-body text-center text-white">
      <h5 class="card-title">Jumlah Murid</h5>
      <h3 class="fw-bold">
       <?php foreach ($jumlahsiswa as $jumlah) : ?>
        <?= $jumlah['jumlahsiswa'] ?>
       <?php endforeach; ?>
      </h3>
     </div>
    </div>
   </div>
   <!-- !SECTION STATISTIC -->
  </div>
  <div class="py-5">
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
          <h3 class="card-title"><?= $ekskul['namaEkskul'] ?></h3>
          <h6>Hari : <?= $ekskul['jadwalHari'] ?></h6>
          <h6>Pembimbing : <?= $ekskul['nama_guru'] ?></h6>
         </div>
        </div>
       </div>
       <div class="card-footer bg-white border-0">
        <a href="../daftarEskull/detail_eskull.php?ekskul=<?= $ekskul['idEkskul'] ?>" class="btn btn-info btn-sm w-100 text-white">Selengkapnya></a>
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
  <!-- SECTION FEEDBACK -->
  <div class="container" id="feedback">
   <div class="py-5">
    <div class="" style="background: url(../assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
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
  <!-- !SECTION FEEDBACK -->
 </div>
<?php include "../assets/components/footer.php" ?>
 <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
 <?php include "../assets/components/js-form-feedback.html" ?>
</body>

</html>