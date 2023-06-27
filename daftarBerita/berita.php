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
    <div class="container-fluid">
        <div class="">
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
                    <img src="../assets/imgs/illustrasi/logo 4.png" width="300px" alt="">
                <?php endif;?>
                </div>
                <div class="">
                    <!-- SECTION BERITA -->
                    <div class="">
                        <div class="d-flex flex-wrap">
                            <div class="mb-3 m-auto">
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
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="detail_berita.php?id=<?= $d['idBerita'] ?>" class="btn btn-info btn-sm w-100 text-white">Selengkapnya></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- !SECTION BERITA -->
                </div>
            </div>
        </div>
        <!-- SECTION FEEDBACK -->
        <div class="container" id="feedback">
            <div class="py-5">
                <div class="" style="background: url(../assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
                    <div class="row">
                        <div class="col-md-6">
        
                        </div>
                        <div class="col-md-6 ms-auto">
                        <div class="feedback">
                            <form action="" class="m-auto mt-3 p-3" method="POST">
                            <h3 class="border-bottom border-2 border-dark mb-5">FeedBack</h3>
                            <div class="mb-2">
                                <label class="form-label" for="username" style="display: block;">Email :</label>
                                <input type="email" class="form-control" name="email" id="username">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password" style="display: block;">Pesan :</label>
                                <textarea class="form-control" name="feedback" id="" cols="30" rows="6"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="btnFeedback">Kirim</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- !SECTION FEEDBACK -->
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
    <?php include "../assets/components/js-form-feedback.html" ?>

</body>
</html>