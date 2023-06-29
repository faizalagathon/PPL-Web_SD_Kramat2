<?php
require '../functions.php';

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
} else {
  $login = false;
}

$result = mysqli_query($link, "SELECT 	gambarBerita FROM berita ");
if (mysqli_num_rows($result) == 0) {
  $error = false;
} else {
  $data = mysqli_query($link, "SELECT * FROM berita ORDER BY idBerita ASC");
}

if (isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  $sql = "SELECT * FROM berita WHERE gambarBerita LIKE '%$keyword%' OR 
    judulBerita LIKE '%$keyword%'OR
    isiBerita LIKE '%$keyword%' OR
    tgldibuatBerita LIKE '%$keyword%'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) == 0) {
    $error = false;
  }
} else {
  $sql = "SELECT * FROM berita ORDER BY idBerita ASC";
}
$data = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
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

    * {
      font-family: 'Poppins';
    }
  </style>
</head>

<body>

  <?php include "../assets/components/header.php" ?>
  <div class="container">
    <div class="">
      <div class="">
        <div class="col">
          <form action="" method="post">
            <div class="input-group ms-auto mt-4">
              <input type="text" class="form-control rounded-pill rounded-end" name="keyword" placeholder="CARI BERITA DISINI...">
              <button name="cari" class="btn btn-primary rounded-pill rounded-start">Cari</button>
            </div>
          </form>
        </div>
        <div class="my-4">
          <h5>berita :</h5>
        </div>
        <div class="text-center">
          <?php if (isset($error)) : ?>
            <img src="../assets/imgs/illustrasi/logo 4.png" width="300px" alt="">
          <?php endif; ?>
        </div>
        <div class="">
          <!-- SECTION BERITA -->
          <div class="">
            <div class="">
              <div class="mb-3 m-auto">
                <?php
                foreach ($data as $d) :
                  $part = substr($d['isiBerita'], 0, 50);
                ?>
                  <div class="card mb-3 m-auto">
                    <div class="row">
                      <div class="col-md-3">
                        <img src="../assets/imgs/berita/<?= $d['gambarBerita'] ?>" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-9">
                        <div class="card-body">
                          <small><?= $d['tgldibuatBerita'] ?></small>
                          <h5 class="card-title"><?= $d['judulBerita'] ?></h5>
                          <p>
                            <?= $part ?>...
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="bg-white border-0 m-1">
                      <a href="detail_berita.php?id=<?= $d['idBerita'] ?>" class="btn btn-info btn-sm w-100 text-white">Selengkapnya></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <!-- !SECTION BERITA -->
        </div>
      </div>
    </div>
    <!-- SECTION FEEDBACK -->
    <?php include "../assets/components/form-feedback.php" ?>
    <!-- !SECTION FEEDBACK -->
  </div>
  <?php include "../assets/components/footer.php" ?>
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <?php include "../assets/components/js-form-feedback.html" ?>

</body>

</html>