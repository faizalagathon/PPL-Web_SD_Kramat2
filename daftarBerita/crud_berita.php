<?php
require '../functions.php';

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
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
        }
        @media (max-width: 425px){
            .navbar-pertama{
                display: none;
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
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Ekstensi Tidak Diperbolehkan
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Ukuran File terlalu Besar
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-success alert-dismissible">
                    <a href="?" class="btn-close" data-dismiss="alert" aria-hidden="true"></a>
					<!-- <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button> -->
					<h4><i class="icon fa fa-check"></i> Success</h4>
					Berhasil Disimpan
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasilhapus"){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true">X</button>
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
    <div class="container-fluid p-0">
        <!-- SECTION FOOTER -->
        <div class="footer bg-dark">
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
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
