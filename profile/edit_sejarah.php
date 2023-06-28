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

if(isset($_POST['ubahSejarah'])){

  if (ubah($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'edit_sejarah.php'; 
        </script>";
  } else {
    echo "
        <script>
        alert('Ada kesalahan saat menginput data');
        document.location.href = 'edit_visi_misi.php'; 
        </script>";
  }
}

$dataSejarah = mysqli_fetch_assoc(mysqli_query($link, 'SELECT * FROM sejarah'));

if (!isset($dataSejarah)) {
  $dataSejarah = [
    'idSejarah' => 0,
    'teksSejarah' => 'Belom Menuliskan Sejarah',
  ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Sejarah</title>
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
        <h3 class="border-bottom border-dark py-2 m-3">Edit Sejarah</h3>
        <div class="p-3">
          <form action="" method="post">
            <div class="mb-3">
              <label for="teksSejarah" class="form-label">Masukkan Sejarah :</label>
              <input type="text" value="<?= $dataSejarah['idSejarah'] ?>" name="idSejarah" hidden>
              <textarea name="teksSejarah" class="form-control" id="teksSejarah" cols="30" rows="10"><?= $dataSejarah['teksSejarah'] ?></textarea>
            </div>
            <div class="text-end">
              <button type="submit" name="ubahSejarah" class="btn btn-info text-white" onclick="return confirm('Yakin ingin Mengedit Sejarah Sekolah?')">Update</button>
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