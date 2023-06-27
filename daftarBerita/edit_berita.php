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
                <img src="../assets/imgs/Foto SD/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                    <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                    <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                    <a class="nav-link text-white" href="#">PPDB</a>
                    <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                    <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit Website
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Carousel</a></li>
                            <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                            <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                            <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                            <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav> -->
    <!-- !SECTION akhir navbar kedua -->
    <div class="container-fluid">
        <div class="justify-content-center d-flex mb-4 mt-3">
            <div class="border-dark border rounded-3" style="width: 70%;">
                <h3 class="border-bottom border-dark py-2 m-3">Edit Berita</h3>
                <div class="p-3">
                    <?php 
                    if(isset($_GET['id'])){
                        $id = ($_GET['id']);
                        $data = mysqli_query($link,"select * from berita where idBerita = '$id' ");
                        $d = mysqli_fetch_array($data);
                    }
                    ?>
                    <form action="edit_act_berita.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <label for="" class="form-label">Ubah Gambar :</label><br>
                            <img src="../assets/imgs/berita/<?php echo $d['gambarBerita'] ?>" class="w-50 mb-2" alt="">
                            <input type="file" name="foto" class="form-control w-25 m-auto">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">judul :</label>
                            <input type="text" class="form-control" VALUE="<?php echo $d['judulBerita'] ?>" name="judul">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Isi Berita :</label>
                            <textarea name="isi" class="form-control" id="isi" cols="30" rows="5" required=""><?php echo $d['isiBerita'] ?></textarea>
                        </div>
                        <div class="mb-3 visually-hidden">
                            <input type="text" name="id" id="" value="<?php echo $id ?>">
                        </div>
                        <div class="text-end">
                            <a href="crud_berita.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-info text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- SECTION FOOTER -->
        <div class="footer bg-dark" style="background: url(../assets/imgs/Frame_9.png);background-size: cover;">
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
