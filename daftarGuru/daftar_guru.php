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

$roleGuru = [
    'Guru Mapel',
    'Staff',
    'Admin'
];

// $jumlahGuru = count($roleGuru);

if(isset($_POST['tambahGuru'])){

    if(tambah($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    else{
        echo "
        <script>
        alert('Ada kesalahan saat menginput data');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    
}

if(isset($_POST['ubahGuru'])){

    if(ubah($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    else{
        echo "
        <script>
        alert('Ada kesalahan saat menginput data');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    
}

if(isset($_POST['hapus'])){

    if(hapus($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil dihapus');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    else{
        echo "
        <script>
        alert('Ada kesalahan saat menghapus data');
        document.location.href = 'daftar_guru.php'; 
        </script>";
    }
    
}




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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    <!-- awal navbar kedua -->
    <?php include "../assets/components/header.php" ?>
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
                        <?php if(isset($login) && $login != false) : ?>
                            <div class="col text-end">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data Guru</button>
                            </div>
                        <?php endif ; ?>
                    </div>
                    <h5 class="text-center mb-3">Daftar Guru :</h5>
                    <!-- SECTION KALO KOSONG KELUAR INI -->
                    <?php if(isset($dataGuruKosong) && $dataGuruKosong == true) : ?>
                        <div class="text-center">
                            <img src="../assets/imgs/illustrasi/logo 2.1.png" style="width: 300px;" alt="Tidak Data Guru">
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
                                    <?php if(isset($login) && $login != false) : ?>
                                        <button class="bg-transparent border-0 text-danger " data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_guru'] ?>">Edit</button>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>" >
                                            <button class="bg-transparent border-0 text-danger" name="hapus" id="hapus" onclick="return confirm('Yakin ingin menghapus guru?')">Hapus</button>
                                        </form>
                                    <?php endif ; ?>
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
                                          <label for="nama" class="form-label">Nama Guru</label>
                                          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan Nama Guru..." value="<?= $data['nama_guru'] ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="nip" class="form-label">NIP</label>
                                          <input type="number" class="form-control" name="nip" id="nip" aria-describedby="helpId" placeholder="Masukan NIP Guru..." value="<?= $data['nip_guru'] ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="password" class="form-label">Password Guru</label>
                                          <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Masukan Password Guru...">
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
                                          <label for="password" class="form-label">Password</label>
                                          <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Masukan Password Guru...">
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
        </div>
        <?php include "../assets/components/footer.php" ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>