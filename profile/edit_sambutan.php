<?php

include '../functions.php';

if(!isset($_SESSION['login'])){
  header("Location: ../login/login.php");
}

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}

if(isset($_POST['ubahSambutan'])){

  if (ubah($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'edit_sambutan.php'; 
        </script>";
  } else {
    echo "
        <script>
        alert('Ada kesalahan saat menginput data');
        document.location.href = 'edit_visi_misi.php'; 
        </script>";
  }
}

$dataSambutan = mysqli_fetch_assoc(mysqli_query($link, 'SELECT * FROM sambutan'));

if (!isset($dataSambutan)) {
  $dataSambutan = [
    'idSambutan' => 0,
    'teksSambutan' => 'Belom Menuliskan Sambutan',
  ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Sambutan</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
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
  </style>
</head>

<body>

  <?php include "../assets/components/header.php" ?>
  <div class="container-fluid p-0">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Edit Sambutan</h3>
        <div class="p-3">
          <form action="" method="post">
            <div class="mb-3">
              <p class="form-text text-muted">
                Gunakan Tanda '\n' untuk menjadikannya paragraf baru. 
              </p>
              <label for="teksSambutan" class="form-label">Masukkan Sambutan :</label>
              <input type="text" value="<?= $dataSambutan['idSambutan'] ?>" name="idSambutan" hidden>
              <textarea name="teksSambutan" class="form-control" id="teksSambutan" cols="30" rows="10"><?= $dataSambutan['teksSambutan'] ?></textarea>
            </div>
            <div class="text-end">
              <button type="submit" name="ubahSambutan" class="btn btn-info text-white" onclick="return confirm('Yakin ingin Mengedit Sambutan Sekolah?')">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

      <!-- SECTION FOOTER -->
      <?php include "../assets/components/footer.php" ?>
      <!-- !SECTION FOOTER -->
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>