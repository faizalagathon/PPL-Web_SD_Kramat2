<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      *{
        font-size: small;
      }
    }
    * {
      font-family: 'Poppins';
    }

    .feedback {
      position: sticky;
    }
  </style>
</head>
<?php include "../functions.php";

$jmlPerHal = 2;
$jmlData = count(query('SELECT * FROM feedback'));
$jmlHal = ceil($jmlData / $jmlPerHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jmlPerHal * $halAktif) / $jmlPerHal;

?>

<body>
  <?php include "../assets/components/header.php" ?>

  <div class="container p-0">
    <div class="text-center m-3">
      <h3>Feedback</h3>
    </div>

    <?php foreach (query("SELECT * FROM feedback LIMIT $awalData, $jmlPerHal") as $feedback) : ?>
      <div class="card mb-3">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p><?= $feedback['pesan_feedback'] ?></p>
            <footer class="blockquote-footer"><cite title="Source Title"><?= $feedback['email_feedback'] ?></cite></footer>
          </blockquote>
        </div>
      </div>
    <?php endforeach ?>
    <div class="m-3">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?= ($halAktif == 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?hal=<?= $halAktif - 1 ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php for ($i = 1; $i < $jmlHal; $i++) : ?>
            <li class="page-item <?= ($halAktif == $i) ? 'active' : '' ?>"><a class="page-link" href="?hal=<?= $i ?>"><?= $i ?></a></li>
          <?php endfor; ?>
          <li class="page-item <?= ($halAktif == ($jmlHal - 1)) ? 'disabled' : '' ?>">
            <a class="page-link" href="?hal=<?= $halAktif + 1 ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="container-fluid p-0">
    <!-- SECTION FOOTER -->
    <div class="footer bg-dark m-0">
      <div class="row p-5">
        <div class="col-md-4 p-3">
          <div class="sd text-center">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../assets/imgs/logo_footer.png" alt="Logo" width="200" class="">
            </a>
            <p class="text-white fs-6 ms-4">Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya</p>
            <!-- SECTION SOSMED -->
            <div class="ms-4">
              <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3 ms-auto">
                <img src="../assets/imgs/icon/icon_ig_primary.png" width="30px" alt="">
              </a>
              <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3 ms-auto">
                <img src="../assets/imgs/icon/icon_fb_primary.png" width="30px" alt="">
              </a>
              <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                <img src="../assets/imgs/icon/icon_yt_primary.png" width="30px" alt="">
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
                  <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
                  <a class="nav-link text-white" href="profile/profile.php">Profil</a>
                  <a class="nav-link text-white" href="daftarBerita/berita.php">Berita</a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>