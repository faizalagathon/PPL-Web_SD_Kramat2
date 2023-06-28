<?php
require '../functions.php';

if(!isset($_SESSION['login'])){
  header("Location: ../login/login.php");
}

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
  }
  else{
    $login = false;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
        }
        @media (max-width: 425px){
            *{
                font-size: small;
            }
            #feedback .row{
                backdrop-filter: blur(3px);
                color: white;
            }
            #feedback{
                margin-x: 5px;
            }
        }
        *{
          font-family: 'Poppins';
        }
    </style>
</head>
<body>

<?php include "../assets/components/header.php" ?>
    <?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
				<div class="alert alert-danger alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Ekstensi Tidak Diperbolehkan
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-danger alert-dismissible fade show">
					<a href="?" type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></a>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Ukuran File terlalu Besar
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-info alert-dismissible">
                    <a href="?" class="btn-close" data-dismiss="alert" aria-hidden="true"></a>
					<!-- <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button> -->
					<h4><i class="icon fa fa-check"></i> Success</h4>
					Berhasil Disimpan
                    <!-- <a href="?">X</a> -->
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasilhapus"){
				?>
				<div class="alert alert-warning alert-dismissible fade show">
                    <a href="?" type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></a>
					<h4><i class="icon fa fa-check"></i> Success</h4>
					Berhasil Dihapus
				</div> 								
				<?php
			}
		}
	?>
    <div class="container-fluid">
        <!-- SECTION BERITA -->
        <div class="mt-3">
            <div class="d-flex flex-wrap">
                <a href="tambah_berita.php" class="btn btn-primary m-auto w-75 mb-3">Tambah berita</a>
                <?php
                $data = mysqli_query($link,"SELECT * FROM berita ORDER BY idBerita ASC"); 
                foreach ( $data as $d ) :
                    $part= substr($d['isiBerita'],0,90);
                ?>
                <div class="card mb-3 m-auto w-75">
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
                    <div class="bg-white border-0 m-2">
                        <a href="edit_berita.php?id=<?php echo $d['idBerita'];?>" class="btn btn-warning w-100 text-white mb-1">edit</a>
                        <a href="hapus_berita.php?id=<?php echo $d['idBerita'];?>" class="btn btn-secondary w-100 text-white" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- !SECTION BERITA -->
    </div>
    <?php include "../assets/components/footer.php" ?>
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        // const alert = document.querySelector('.alert');
        // alert.setInterval(() => {
        //     alert.classList.remove('show');
        // }, 1000);
    </script>
</body>
</html>
