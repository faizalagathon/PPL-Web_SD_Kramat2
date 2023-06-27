<?php 

include '../functions.php';

if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = false;
}

$roleGuru = [
    'Guru Mapel',
    'Staff',
    'Admin'
];

$jumlahGuru = count($roleGuru);

$dataMapel = query("SELECT * FROM mapel");


$query = "SELECT * FROM guru 
            INNER JOIN mapel ON
            mapel.id_mapel=guru.id_mapel ";

if(isset($_GET['keyword']) && $_GET['keyword'] != 'none'){
    $keyword = $_GET['keyword'];

    $query .= " WHERE
                nip_guru LIKE '%$keyword%' OR 
                nama_guru LIKE '%$keyword%' OR 
                alamat_guru LIKE '%$keyword%' OR 
                jk_guru LIKE '%$keyword%'";
}
else{
    $keyword = "none";
}
if(isset($_GET['urut'])){
    $urut = $_GET['urut'];
}
else{
    $urut = "default";
}



// SECTION pagination Peminjaman
    
$dataPerhalaman = 10;
$jumlahData =  count(query($query));

$jumlahHalaman = ceil($jumlahData / $dataPerhalaman);

$halamanAktif = isset( $_GET['halamanUser']) ? $_GET['halamanUser'] : 1;

$awalData = ($dataPerhalaman * $halamanAktif) - $dataPerhalaman;

// !SECTION pagination Peminjaman

$query .= " LIMIT $awalData, $dataPerhalaman";

$dataGuru = query($query);

$jumlahDataQueryGuru = count($dataGuru);

if($jumlahDataQueryGuru == 0){
    $dataGuruKosong = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Guru</title>
    <style>
        /* @font-face {
            font-family: 'TiltNeon' ;
            src: url(../assets/font/Tilt_Neon/static/TiltNeon-Regular.ttf);
        }
        @font-face {
            font-family: 'ClimateC';
            src: url(../assets/font/Climate_Crisis/static/ClimateCrisis-Regular.ttf);
        }
        @font-face {
            font-family: 'Anton';
            src: url(../assets/font/Anton/Anton-Regular.ttf);
        }
        @font-face {
            font-family: 'Kanit';
            src: url(../assets/font/Kanit/Kanit-Regular.ttf);
        }
        @font-face {
            font-family: 'Lobster';
            src: url(../assets/font/Lobster/Lobster-Regular.ttf);
        }
        @font-face {
            font-family: 'DancingS';
            src: url(../assets/font/Dancing_Script/static/DancingScript-Regular.ttf);
        }
        @font-face {
            font-family: 'Mynerve';
            src: url(../assets/font/Mynerve/Mynerve-Regular.ttf);
        }
        @font-face {
            font-family: 'Oswald';
            src: url(../assets/font/Oswald/static/Oswald-Regular.ttf);
        }
        @font-face {
            font-family: 'TiltWarp';
            src: url(../assets/font/Tilt_Warp/static/TiltWarp-Regular.ttf);
        } */
        @font-face {
            font-family: 'Poppins';
            src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
        }
        *{
            font-family: 'Poppins';
        }
        @media (max-width: 425px){
            .navbar-pertama{
                display: none;
            }
        }
        @media (max-width: 768px){
            *{
                font-size: small;
            }
        }
        .display1{
            flex-wrap: nowrap;
        }
        /* .guru{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        } */
        .guru h5{
            font-family: 'lobster';
        }
    </style>
</head>
<body>
    <!-- COPY DARI SINI -->
    <!-- awal navbar pertama -->
    <!-- akhir navbar pertama -->
    <!-- awal navbar kedua -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand p-0" href="home.html">
                <img src="../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                    <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                    <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                    <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                    <a class="nav-link text-info" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                    <?php if(isset($login) && $login != false) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Edit Website
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../daftarCarousel/modifikasi_carousel.php">Carousel</a></li>
                                <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                                <li><a class="dropdown-item" href="profile/edit_jumlahsiswa_akreditasi.php">Profil Sekolah</a></li>
                            </ul>
                        </li>
                    <?php endif ; ?>
                </div>
                <?php if(isset($login) && $login != false) : ?>
                    <button class="btn btn-primary" style="display: none;" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data Guru</button>
                    <a href="../login/logout.php?halamanAsal=daftar_guru.php" class="ps-3 nav-link text-white" onclick="return confirm('Yakin ingin Logout dari Admin?')">Logout</a>
                <?php endif ; ?>
                <?php if(isset($login) && $login == false) : ?>
                    <a href="../login/login.php" class="ps-3 nav-link text-white">Login Admin</a>
                <?php endif ; ?>
            </div>
        </div>
    </nav>
    <!-- akhir navbar kedua -->
    <div class="container">
        <div class="">
            <div class="mt-3 py-3">
                <div class="row mb-4">
                    <div class="col">
                        <form action="" method="get">
                            <div class="input-group ms-auto">
                                <input type="text" class="form-control rounded-pill rounded-end" placeholder="Cari Data Guru..." name="keyword">
                                <button name="urut" value="cari" class="btn btn-primary rounded-pill rounded-start">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <h5 class="text-center mb-3">Daftar Guru :</h5>
                <!-- SECTION KALO KOSONG KELUAR INI -->
                <?php if(isset($dataGuruKosong) && $dataGuruKosong == true) : ?>
                    <div class="text-center">
                        <img src="../assets/imgs/illustrasi/logo 2.1.png" style="width: 30%;" alt="Tidak Data Guru">
                    </div>
                <?php endif ; ?>
                
                <!-- SECTION CARD DAFTAR GURU -->
                <div class="guru d-flex flex-wrap justify-content-center gap-5">
                    <?php foreach($dataGuru as $data) : ?>
                    <div class="card border-2 text-center border-dark" style="width: 11rem;">
                        <img src="../assets/imgs/Foto_SD/Foto_Guru/<?= $data['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5><?= $data['nama_guru'] ?></h5>
                            <p class="fw-light">-<?= $data['role'] ?>-</p>
                            <div class="d-flex justify-content-center">
                                <button class="bg-transparent border-0 text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id_guru'] ?>">Profile</button>
                            </div>
                        </div>
                    </div>
                <!-- SECTION CARD DAFTAR GURU -->

                <!-- SECTION POP DETAIL GURU -->
                <div class="modal fade" id="exampleModal<?= $data['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content text-start">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- isi -->
                            <div class="detail row" id="modal">
                            <div class="col-md-4" id="detail_kanan">
                                <img src="../assets/imgs/Foto_SD/Foto_Guru/<?= $data['gambar'] ?>" class="m-auto mb-2 w-100" alt="">
                            </div>
                            <div class="col ms-auto" id="detail_kiri">
                                <h5><?= $data['nama_guru'] ?></h5>
                                <p class="fw-light">-<?= $data['role'] ?>-</p>
                                <p>NIP : <?= $data['nip_guru'] ?></p>
                                <p>Jenis Kelamin : <?= $data['jk_guru'] == 'P' ? "Perempuan" : "Laki-laki" ?></p>
                                <p>Mata Pelajaran : <?= $data['nama_mapel'] ?></p>
                                <p>Alamat : <?= $data['alamat_guru'] ?></p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- !SECTION DETAIL GURU -->

                <!-- SECTION Edit GURU -->
                <div class="modal fade" id="editModal<?= $data['id_guru'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content text-start">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Detail Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- isi -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control" name="id_guru" id="id_guru" aria-describedby="helpId" placeholder="Masukan id_guru Guru..." value="<?= $data['id_guru'] ?>" hidden>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Guru</label>
                                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Masukan Password Guru..." value="<?= $data['password'] ?>" disabled>
                                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Masukan Password Guru..." value="<?= $data['password'] ?>" hidden>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Guru</label>
                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan Nama Guru..." value="<?= $data['nama_guru'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" class="form-control" name="nip" id="nip" aria-describedby="helpId" placeholder="Masukan NIP Guru..." value="<?= $data['nip_guru'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-select-md" name="jk" id="jk">
                                        <option value="P" <?= $data['jk_guru'] == 'P' ? "Selected" : "" ;?>>Perempuan</option>
                                        <option value="L" <?= $data['jk_guru'] == 'P' ? "" : "Selected" ;?>>Laki-laki</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="mapel" class="form-label">Mata Pelajaran</label>
                                    <select class="form-select form-select-md" name="mapel" id="mapel">
                                        <?php foreach($dataMapel as $data2) : ?>
                                            <option value="<?= $data2['id_mapel']?>" <?= $data2['id_mapel'] == $data['id_mapel'] ? "Selected" : "" ;?>><?= $data2['nama_mapel']?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $data['alamat_guru']?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <!-- <input type="text" class="form-control" name="role" id="role" aria-describedby="helpId" placeholder="Masukan Role Guru..." value="<?= $data['role']?>"> -->
                                    <select class="form-select form-select-md" name="role" id="role">
                                    <?php foreach($roleGuru as $data3) : ?>
                                        <option value="<?= $data3 ?>" <?= $data3 == $data['role'] ? "Selected" : "" ;?>><?= $data3 ?></option>
                                    <?php endforeach ; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Choose file</label>
                                    <input type="text" class="form-control" name="gambar_lama" id="gambar_lama" aria-describedby="fileHelpId" value="<?= $data['gambar']?>" hidden>
                                    <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="fileHelpId">
                                </div>
                                <button type="submit" name="ubahGuru" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ; ?>
                <!-- !SECTION Edit GURU -->

                <!-- SECTION TAMBAH GURU -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content text-start">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- isi -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Guru</label>
                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan Nama Guru...">
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" class="form-control" name="nip" id="nip" aria-describedby="helpId" placeholder="Masukan NIP Guru...">
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-select-md" name="jk" id="jk">
                                        <option value="P" selected>Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="mapel" class="form-label">Mata Pelajaran</label>
                                    <select class="form-select form-select-md" name="mapel" id="mapel">
                                        <?php foreach($dataMapel as $data) : ?>
                                            <option value="<?= $data['id_mapel']?>"><?= $data['nama_mapel']?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <!-- <input type="text" class="form-control" name="role" id="role" aria-describedby="helpId" placeholder="Masukan Role Guru..."> -->
                                    <select class="form-select form-select-md" name="role" id="role">
                                    <?php foreach($roleGuru as $data3) : ?>
                                        <option value="<?= $data3 ?>"><?= $data3 ?></option>
                                    <?php endforeach ; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Choose file</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="fileHelpId">
                                </div>
                                <button type="submit" name="tambahGuru" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- !SECTION TAMBAH GURU -->
                </div>
            </div>
        <!-- SECTION pagination peminjaman-->
        <div aria-label="Page navigation example" > 
            <ul class="pagination">
                <?php if($jumlahHalaman != 1 || isset($_GET['keyword']) > 1) : ?>
                    <?php if ( $halamanAktif > 1 ) : ?>
                        <li class="page-item"><a class="page-link" href="?halamanUser=<?=$halamanAktif - 1 ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>">Previous</a></li>
                    <?php endif ; ?>

                    <?php for( $i=1; $i<=$jumlahHalaman; $i++) : ?>
                        <?php if ( $i == $halamanAktif ) : ?>
                            <li class="page-item active"><a class="page-link" href="?halamanUser=<?= $i ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>"><?= $i ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="?halamanUser=<?= $i ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>"><?= $i ?></a></li>
                        <?php endif ; ?>
                    <?php endfor ; ?>
                    
                    <?php if ( $halamanAktif < $jumlahHalaman ) : ?>
                        <li class="page-item"><a class="page-link" href="?halamanUser=<?=$halamanAktif + 1 ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>">Next</a></li>
                    <?php endif ; ?>
                <?php endif ; ?>
            </ul>
        </div>
        <!-- !SECTION pagination peminjaman-->
        </div>
        <div class="py-5">
            <div class="row" style="background: url(../assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 ms-auto">
                    <div class="feedback">
                        <form action="" class="m-auto mt-3 p-3" method="POST">
                            <h3 class="border-bottom border-2 border-dark mb-5">FeedBack</h3>
                            <div class="mb-2">
                                <label class="form-label" for="username" style="display: block;">Email :</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password" style="display: block;">Pesan :</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="login">Kirim</button>
                            </div>
                        </form>
                    </div>
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
                                <img src="assets/imgs/icon/icon_ig_primary.png" width="30px" alt="">
                            </a>
                            <a href="https://www.facebook.com/sdn.kramatdua?mibextid=ZbWKwL" class="text-white text-decoration-none me-3 ms-auto">
                                <img src="assets/imgs/icon/icon_fb_primary.png" width="30px" alt="">
                            </a>
                            <a href="https://youtube.com/@sdnkramat2cirebon649 " class="text-white text-decoration-none">
                                <img src="assets/imgs/icon/icon_yt_primary.png" width="30px" alt="">
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>