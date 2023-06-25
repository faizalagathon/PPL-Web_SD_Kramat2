<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.css">
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      .navbar-pertama {
        display: none;
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

  <div class="container-fluid">
    <h3>Feedback</h3>

    <?php foreach (query("SELECT * FROM feedback LIMIT $awalData, $jmlPerHal") as $feedback) : ?>
      <div class="card">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p><?= $feedback['pesan_feedback'] ?></p>
            <footer class="blockquote-footer"><cite title="Source Title"><?= $feedback['email_feedback'] ?></cite></footer>
          </blockquote>
        </div>
      </div>
    <?php endforeach ?>
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
</body>

</html>