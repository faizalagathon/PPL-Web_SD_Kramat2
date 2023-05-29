<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ekstrakulikuler</title>
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

  <?php
  if (!isset($_GET['ekskul'])) {
    header("Location: ../profile/profile.php");
  } else {
    $data = query("SELECT * FROM ekskul INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru")[0];
  }
  ?>

  <div class="container-fluid">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="card" style="width: 70%;">
        <?php if ($data['gambarEkskul'] == '') : ?>
          <img src="../assets/imgs/ekskul/noImg.png" 
          class="card-img-top" alt="..." style="width: 25%;">
        <?php else : ?>
          <img src="../assets/imgs/ekskul/<?= $data['gambarEkskul'] ?>" 
          class="card-img-top" alt="..." style="width: 25%;">
        <?php endif ?>
        <div class="card-body">
          <h2 class="card-title mb-4 fw-bold"><?= $data['namaEkskul'] ?></h2>
          <h5 class="mb-2 fw-semibold">Informasi :</h5>
          <h5>Hari : <?= $data['jadwalHari'] ?></h5>
          <h5>Pembimbing : <?= $data['nama_guru'] ?></h5>
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