<?php
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
} else {
    $login = false;
}

$gambar = mysqli_query($link, "SELECT * FROM galeri
INNER JOIN kategori_acara
ON galeri.id_k_acara=kategori_acara.id_k_acara
ORDER by kategori_acara.nama_k_acara;
;");
$acara = query('SELECT * FROM kategori_acara LIMIT 1');

// SECTION DAFTAR VISI
$dataVisi = query("SELECT * FROM visi")[0]['teksVisi'];
$daftarVisi = [];

preg_match_all('/\d+\./', $dataVisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataVisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
    $daftarVisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR VISI

// SECTION DAFTAR MISI
$dataMisi = query("SELECT * FROM misi")[0]['teksMisi'];
$daftarMisi = [];

preg_match_all('/\d+\./', $dataMisi, $matches);
$nomor = $matches[0];

$pola = '/\d+\./';
$kalimat = preg_split($pola, $dataMisi, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($kalimat); $i++) {
    $daftarMisi[] = $nomor[$i] . $kalimat[$i];
}
// !SECTION DAFTAR MISI

// SECTION SAMBUTAN

$dataSambutan = query("SELECT * FROM sambutan")[0]['teksSambutan'];

$dataSambutan = explode("\n", $dataSambutan);

// !SECTION SAMBUTAN

//Carousel
$datacarousel = mysqli_query($link, "SELECT * FROM carousel ORDER BY idCarousel ASC");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(assets/font/font-poppins/Poppins-Regular.ttf);
        }

        @media (max-width: 1024px) {
            .karosel {
                width: 100%;
                scroll-snap-type: x mandatory;
                overflow: auto;
                display: flex;
                flex-direction: row;
            }
        }

        @media (max-width: 768px) {
            * {
                font-size: small;
            }

            .footer .sd .navbar img {
                width: 100px;
            }
        }

        /*  SECTION MOBILE DEVICE */
        @media (max-width: 425px) {
            * {
                font-size: small;
            }

            .slide .item {
                overflow-y: hidden;
            }

            .slide .item .gambar {
                height: 15rem;
                max-width: 100%;
                max-height: 100%;
            }

            .container-fluid #atas #karosel #gambar {
                max-height: 5rem;
            }

            .container-fluid #atas #karosel #gambar #gambar2 {
                min-width: 100%;
                min-height: 50px;
                max-width: 100%;
                max-height: 5rem;
                object-fit: cover;
                object-position: center;
            }

            #feedback .row {
                backdrop-filter: blur(3px);
                color: white;
            }

            #feedback {
                margin-x: 5px;
            }
        }

        /* !SECTION MOBILE DEVICE */
        * {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <?php include "assets/components/header.php" ?>
    <!-- akhir navbar kedua -->
    <div class="container-fluid p-0">
        <div class="py-5" id="atas" style="background: url(assets/imgs/Frame_8.png);background-size: cover;">
            <div class="row my-5">
                <div class="col-md-6">
                    <div class="mt-5 pt-3 ms-5">
                        <div class="greet p-2 pb-5 text-white">
                            <h3>Selamat Datang di</h3>
                            <h1 class="fw-bold text-primary">SDN 2 Kramat</h1>
                            <p class="" style="font-style: italic;">"Jangan hanya bisa untuk bermimpi saja, tapi berusaha dan berdoa untuk menggapai mimpinya"</p>
                            <div class="">
                                <a href="https://instagram.com/sdnkramat2kotacirebon?igshid=YmMyMTA2M2Y" class="text-white text-decoration-none me-3">
                                    <img src="assets/imgs/icon/icon_ig_primary.png" width="40px" alt="">
                                </a>
                                <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3">
                                    <img src="assets/imgs/icon/icon_fb_primary.png" width="40px" alt="">
                                </a>
                                <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                                    <img src="assets/imgs/icon/icon_yt_primary.png" width="43" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ms-auto">
                    <div class="px-5 py-4" id="karosel">
                        <!-- SECTION CAROUSEL -->
                        <div id="carouselExampleControls" data-bs-ride="carousel" class="carousel slide auto">
                            <!-- NOTE Maksimal Tinggi Gambar Carousel diatas 500px -->
                            <!-- ini yg tadi ilang -->
                            <div class="carousel-inner">
                                <?php
                                $count = 0;
                                while ($d = mysqli_fetch_array($datacarousel)) {
                                    $active_class = ($count == 0) ? 'active' : '';
                                ?>
                                    <div class="carousel-item <?php echo $active_class; ?>" style="max-height: 30rem;" id="gambar">
                                        <img src="assets/imgs/fotocarousel/<?= $d['gambarCarousel'] ?>" class="d-block" id="gambar2" style="min-width: 100%; min-height: 100%; max-width: 100%; max-height: 18rem; object-fit: cover; object-position: center;" alt="...">
                                    </div>
                                <?php
                                    $count++;
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- !SECTION CAROUSEL -->
                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION SAMBUTAN -->
        <div class="py-3">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="assets/imgs/illustrasi/illustrasi_a2.png" width="430px" height="430px" alt="">
                    </div>
                </div>
                <div class="col-md-7 ms-auto">
                    <div class="pt-5">
                        <h3 class="mb-3 fw-bold">Sambutan</h3>
                        <?php foreach($dataSambutan as $data) : ?>
                            <p>
                                <?= $data ?>
                            </p>
                        <?php endforeach ; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- !SECTION SAMBUTAN -->
        <!-- SECTION VISI MISI -->
        <div class="py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="pt-4">
                        <div class="py-3 px-5 text-start mb-3">
                            <h4>VISI</h4>
                            <?php foreach ($daftarVisi as $dataVisi) : ?>
                                <?= $dataVisi . "<br>" ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="py-3 px-5 text-start">
                            <h4>MISI</h4>
                            <?php foreach ($daftarMisi as $dataMisi) : ?>
                                <?= $dataMisi . "<br>" ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ms-auto">
                    <div class="text-center">
                        <img src="assets/imgs/illustrasi/illustrasi_vm2.png" width="400px" height="400px" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- !SECTION VISI MISI -->
        <!-- SECTION GALERI -->
        <div class="py-5 px-3">
            <div style="scroll-snap-type: y mandatory;">
                <h3 class="text-center">GALERI</h3>
                <!--SECTION Gambar -->
                <?php foreach ($acara as $cr) : ?>
                    <!-- SECTION CARD-->
                    <div class="card border-0 py-3 gap-3" style="width: 100%;scroll-snap-type: x mandatory;overflow:auto;display: flex;flex-direction: row;">
                        <?php foreach ($gambar as $gbr) : ?>
                            <?php if ($cr['id_k_acara'] == $gbr['id_k_acara']) : ?>
                                <!-- SECTION FOTO -->
                                <div class="foto">
                                    <img src="upload/<?= $gbr['gambarGaleri'] ?>" alt="" style=" scroll-snap-align: start;min-width: 380px;min-height: 240px;max-width: 380px;max-height: 240px;object-fit: cover;object-position: center; padding: 0px 2px;">
                                </div>
                                <!-- !SECTION FOTO -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- !SECTION CARD -->
                    <div class="judul">
                        <h3><?= $cr['nama_k_acara'] ?></h3>
                        <p class="">
                            <small>
                                <?= $cr['tanggal_k_acara'] ?>
                            </small>
                        </p>
                    </div>
                <?php endforeach; ?>
                <!--!SECTION end Gambar -->
            </div>
            <div class="text-center mb-3">
                <a href="daftarGaleri/user/galeri.php" class="">Read More ></a>
            </div>
        </div>
        <!-- !SECTION GALERI -->
        <!-- SECTION BERITA -->
        <div class="py-3">
            <div class="m-auto">
                <h3 class="pt-3 text-center mb-3">BERITA</h3>
                <div class="d-flex flex-wrap justify-content-center mb-3 gap-5">
                    <?php foreach (mysqli_query($link, 'SELECT * FROM berita limit 3') as $datab) : $part = substr($datab['isiBerita'], 0, 50); ?>
                        <div class="card" style="width: 15rem;">
                            <img src="assets/imgs/berita/<?= $datab['gambarBerita'] ?>" class="card-img-top" alt="..." style="min-width: 100%;min-height: 100px;max-width: 100%;max-height: 130px;object-fit: cover;object-position: center;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $datab["judulBerita"] ?></h5>
                                <p class="card-text"><?= $part ?>....</p>
                            </div>
                            <div class="card-footer">
                                <a href="daftarBerita/detail_berita.php?id=<?= $datab['idBerita'] ?>" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="text-center mb-5">
                <a href="daftarBerita/berita.php" class="">Read More ></a>
            </div>
        </div>
        <!-- SECTION FEEDBACK -->
        <?php include "assets/components/form-feedback.php" ?>
        <!-- !SECTION FEEDBACK -->
        <form action="" id="ukuranLayar">
          <input type="hidden" name="width">
          <input type="hidden" name="height">
        </form>
    </div>
    
    <?php include "assets/components/footer.php" ?>

    <script>
      const width = document.querySelector("input[name='width']")
      const height = document.querySelector("input[name='height']")
      width.value = window.innerWidth
      height.value = window.innerHeight
      // const formUkuranLayar = document.querySelector('#ukuranLayar').submit()
    </script>

    <!-- !SECTION BERITA -->
    <!-- <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>