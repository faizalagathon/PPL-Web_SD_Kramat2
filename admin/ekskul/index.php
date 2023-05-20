<!DOCTYPE html>
<html>
<?php include '../../functions.php' ?>

<head>
  <title>SD Kramat 2 - <?= $title ?></title>
  <link rel="stylesheet" href="../../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
</head>

<body>
  <?php include '../../assets/components/header.php' ?>

  <main>
    <!-- SECTION BTN MODAL TAMBAH EKSKUL -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
      Tambah Ekskul
    </button>
    <!-- !SECTION BTN MODAL TAMBAH EKSKUL -->

    <!-- SECTION MODAL TAMBAH EKSKUL -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tamabah Ekskul</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama : </span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="nama">
              </div>
              <div class="input-group mb-3">
                <label for="formFile" class="input-group-text">Gambar : </label>
                <input class="form-control" type="file" id="formFile" name="gambar" accept=".png,.gif,.jpg,.PNG,.GIF,.JPG">
              </div>
            </div>
            <input type="hidden" name="addEkskul">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- !SECTION MODAL TAMBAH EKSKUL -->

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Gambar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach (query("SELECT * FROM ekskul") as $data) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $data['namaEkskul'] ?></td>
            <td>
              <img src="../../assets/imgs/ekskul/<?= $data['gambarEkskul'] ?>" alt="..." width="100">
            </td>
            <td>

              <!-- SECTION BTN MODAL EDIT EKSKUL -->
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $data['idEkskul'] ?>">
                Edit
              </button>
              <!-- !SECTION BTN MODAL EDIT EKSKUL -->

              <!-- SECTION BTN MODAL HAPUS EKSKUL -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?= $data['idEkskul'] ?>">
                Hapus
              </button>
              <!-- !SECTION BTN MODAL HAPUS EKSKUL -->

            </td>
          </tr>

          <!-- SECTION MODAL EDIT EKSKUL -->
          <div class="modal fade" id="edit<?= $data['idEkskul'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Ekskul</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Nama : </span>
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="nama" value="<?= $data['namaEkskul'] ?>">
                    </div>
                    <div class="w-100">
                      <img src="../../assets/imgs/ekskul/<?= $data['gambarEkskul'] ?>" alt="..." width="150">
                    </div>
                    <div class="input-group mb-3">
                      <label for="formFile" class="input-group-text">Gambar : </label>
                      <input class="form-control" type="file" id="formFile" name="gambar" accept=".png,.gif,.jpg,.PNG,.GIF,.JPG">
                    </div>
                  </div>
                  <input type="hidden" name="editEkskul" value="<?= $data['idEkskul'] ?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- !SECTION MODAL EDIT EKSKUL -->

          <!-- SECTION MODAL HAPUS EKSKUL -->
          <div class="modal fade" id="del<?= $data['idEkskul'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Ekskul</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Nama : <?= $data['namaEkskul'] ?></span>
                    </div>
                    <div class="w-100">
                      <img src="../../assets/imgs/ekskul/<?= $data['gambarEkskul'] ?>" alt="..." width="150">
                    </div>
                  </div>
                  <input type="hidden" name="delEkskul" value="<?= $data['idEkskul'] ?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- !SECTION MODAL HAPUS EKSKUL -->

        <?php endforeach ?>
      </tbody>
    </table>

  </main>

  <?php include '../../assets/components/footer.php' ?>
  <script src="../../assets/js/bootstrap-5.3.0/bootstrap.bundle.js"></script>

</body>

</html>