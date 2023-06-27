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
    <title>Tambah Berita</title>
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css"> -->
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
        }
        *{
          font-family: 'Poppins';
        }
    </style>
</head>
<body>

<?php include "../assets/components/header.php" ?>
    <div class="container">
        <div class="mb-4 mt-3">
            <div class="border-dark border rounded-3">
                <h3 class="border-bottom border-dark py-2 m-3">Tambah Berita</h3>
                <div class="p-3">
                    <form action="tambah_act_berita.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label">Sertakan Gambar :</label>
                            <input type="file" name="foto" class="form-control w-25" required>
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">judul :</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Isi Berita :</label>
                            <textarea name="isi" class="form-control" id="" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="text-end">
                            <a href="crud_berita.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-info text-white">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <script src="../assets/js/bootstrap-5.3.0/bootstrap.bundle.min.js"></script>
</body>
</html>
