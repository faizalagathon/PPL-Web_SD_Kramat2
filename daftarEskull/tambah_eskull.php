<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Eskull</title>
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

  <div class="container-fluid">
    <div class="justify-content-center d-flex mb-4 mt-3">
      <div class="border-dark border rounded-3" style="width: 70%;">
        <h3 class="border-bottom border-dark py-2 m-3">Tambah Ekstrakulikuler</h3>
        <div class="p-3">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label">Sertakan Gambar :</label>
              <input type="file" class="form-control w-25" name="gambar">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Nama Eskull :</label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Hari :</label>
              <select class="form-select" aria-label="Default select example" name="jadwal">
                <option selected> - </option>
                <?php foreach ($daftarHari as $hari) : ?>
                  <option value="<?= $hari ?>"><?= $hari ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Pembimbing :</label>
              <select class="form-select" aria-label="Default select example" name="pembimbing">
                <option selected> - </option>
                <?php foreach ($daftarGuru as $guru) : ?>
                  <option value="<?= $guru['id_guru'] ?>"><?= $guru['nama_guru'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <input type="hidden" name="addEkskul">
            <div class="text-end">
              <button type="reset" class="btn btn-warning text-white">Batal</button>
              <button type="submit" class="btn btn-info text-white">Tambahkan</button>
            </div>
          </form>
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