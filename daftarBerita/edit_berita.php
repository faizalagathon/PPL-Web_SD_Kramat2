<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(assets/font/font-poppins/Poppins-Regular.ttf);
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
    <!-- SECTION awal navbar pertama -->
    <div class="navbar-pertama">
        <nav class="navbar navbar-expand-sm display1 p-3" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
            <div class="container-fluid">
                <span class="navbar-brand ukuran-selamat-datang">Selamat Datang Di Website Kami</span>
                <div class="d-flex me-2">
                    <span class="nav-link active me-4 text-light" aria-current="page">Jl. Siliwangi No. 44Kota Cirebon </span>
                    <span class="nav-link active text-light" aria-current="page">Telp. (0231) 202998</span>
                </div>
            </div>
        </nav>
    </div> 
    <!-- !SECTION akhir navbar pertama -->
    <!-- SECTION awal navbar kedua -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand p-0" href="home.html">
                <img src="image/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-5 gap-4">
                    <a class="nav-link text-white" href="home.html">Home</a>
                    <a class="nav-link text-white" href="profile.html">Profil</a>
                    <a class="nav-link text-white" href="berita.html">Berita</a>
                    <a class="nav-link text-white" href="#">PPDB</a>
                    <a class="nav-link text-white" href="#">Galeri</a>
                    <a class="nav-link text-white" href="#">Informasi</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit Website
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-white" href="#">Carousel</a></li>
                            <li><a class="dropdown-item text-white" href="edit_sejarah.html">Sejarah</a></li>
                            <li><a class="dropdown-item text-white" href="edit_visi_misi.html">Visi Misi</a></li>
                            <li><a class="dropdown-item text-white" href="crud_eskull.html">Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item text-white" href="#">Galeri</a></li>
                            <li><a class="dropdown-item text-white" href="crud_berita.html">Berita</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- !SECTION akhir navbar kedua -->
    <div class="container-fluid">
        <div class="justify-content-center d-flex mb-4 mt-3">
            <div class="border-dark border rounded-3" style="width: 70%;">
                <h3 class="border-bottom border-dark py-2 m-3">Edit Berita</h3>
                <div class="p-3">
                    <form action="">
                        <div class="mb-3 text-center">
                            <label for="" class="form-label">Ubah Gambar :</label><br>
                            <img src="sample_img/img4.jpg" class="w-50 mb-2" alt="">
                            <input type="file" class="form-control w-25 m-auto">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">judul :</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="mb-3">                            
                            <label for="" class="form-label">Isi Berita :</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning text-white">Batal</button>
                            <button type="submit" class="btn btn-info text-white">Update</button>
                        </div>
                    </form>
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
