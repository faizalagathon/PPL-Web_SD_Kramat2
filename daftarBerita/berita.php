<?php
require '../functions.php';

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}

$result=mysqli_query($link,"SELECT 	gambarBerita FROM berita ");
if(mysqli_num_rows($result)==0){
    $error=false;
}else{
    $data = mysqli_query($link,"SELECT * FROM berita ORDER BY idBerita ASC"); 
}

if(isset($_POST['cari'])){
    $keyword=$_POST['keyword'];
    $sql="SELECT * FROM berita WHERE gambarBerita LIKE '%$keyword%' OR 
    judulBerita LIKE '%$keyword%'OR
    isiBerita LIKE '%$keyword%' OR
    tgldibuatBerita LIKE '%$keyword%'";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==0){
        $error=false;
    }
}else{
    $sql = "SELECT * FROM berita ORDER BY idBerita ASC"; 
}
$data = mysqli_query($link,$sql); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
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

    <!-- SECTION awal navbar pertama -->
    <!-- <div class="navbar-pertama">
        <nav class="navbar navbar-expand-sm display1 p-3" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
            <div class="container-fluid">
                <span class="navbar-brand ukuran-selamat-datang">Selamat Datang Di Website Kami</span>
                <div class="d-flex me-2">
                    <span class="nav-link active me-4 text-light" aria-current="page">Jl. Siliwangi No. 44Kota Cirebon </span>
                    <span class="nav-link active text-light" aria-current="page">Telp. (0231) 202998</span>
                </div>
            </div>
        </nav>
    </div>  -->
    <!-- !SECTION akhir navbar pertama -->
    <!-- SECTION awal navbar kedua -->
    <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                    <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                    <a class="nav-link text-info" href="../daftarBerita/berita.php">Berita</a>
                    <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                    <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                    <?php if(isset($login) && $login != false) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Edit Website
                            </a>
                            <ul class="dropdown-menu" style="z-index: 99999;">
                                <li><a class="dropdown-item" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                            </ul>
                        </li>
                    <?php endif ; ?>
                </div>
                <?php if(isset($login) && $login != false) : ?>
                    <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                <?php endif ; ?>
                <?php if(isset($login) && $login == false) : ?>
                    <a href="../login/login.php" class="nav-link text-white">Login Admin</a>
                <?php endif ; ?>
            </div>
        </div>
    </nav> -->
    <!-- !SECTION akhir navbar kedua -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
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
                    <?php if (isset($error)) :?>
                        <img src="../assets/imgs/illustrasi/logo 4.png" width="50%" alt="">
                    <?php endif;?>
                    </div>
                    <div class="">
                        <!-- SECTION BERITA -->
                        <div class="">
                            <div class="d-flex flex-wrap">
                                <div class="card mb-3 m-auto">
                                    <div class="row">
                                        <div class="col-md-9">
                                        <?php
                                           
                                            foreach ( $data as $d ) :
                                                $part= substr($d['isiBerita'],0,50);
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
                                                        <div class="card-footer bg-white border-0">
                                                            <a href="detail_berita.php?id=<?= $d['idBerita'] ?>">Selengkapnya></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- !SECTION BERITA -->
                    </div>
                </div>
            </div>
            <div class="col ms-auto">
                <div class="sticky-top">
                <?php include "../assets/components/form-feedback.php" ?>

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
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <?php include "../assets/components/js-form-feedback.html" ?>

</body>
</html>