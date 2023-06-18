<?php 

include '../functions.php';

if(isset($_SESSION['loginAdmin'])){
    header('Location: ../daftarGuru/daftar_guru.php');
} 

if(isset($_POST['login'])){

    // $result = login($_POST);
    
    if(login($_POST)){
        echo "
        <script>
        alert('Berhasil Login');
        document.location.href = '../daftarGuru/daftar_guru.php'; 
        </script>";
    }
    else{
        echo "
        <script>
        alert('Ada kesalahan saat menginput data!');
        document.location.href = 'login.php'; 
        </script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <title>Login Admin</title>
    <style type="text/css">
        body{
            background: url(../assets/imgs/background.png);
            background-size: cover;

        }
        /* @keyframes bg-pan-top{
            0%{
                background-color: rgb(0, 179, 255);
                background-position: 50% 100%;
            }
            50%{
                background-color: #ffd000;
                background-position: 50% 0%;
            }
            100%{
                background-color: #ae00ff;
                background-position: 50% 100%;
            }
        } */
        .bg-pan-top{
            -webkit-animation: bg-pan-top 8s infinite both;
            animation: bg-pan-top 8s infinite both;
        }
        @font-face {
            font-family: 'Poppins';
            src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
        }
        form{
            border-radius: 2rem;
            font-family: 'poppins';
            /* background: url(assets/background/bg1.jpg);
            background-size: cover;
            background-attachment: scroll; */
            /* background-color: rgb(0, 0, 0, 50%); */
            /* background-color: white; */
        }
        .footer{
            font-family: 'poppins';
        }
        @media (max-width: 425px){
            .gambar{
                width: 40%;
                margin: auto;
                background-color: white;
                /* border: 2px solid; */
                border-radius: 20%;
            }
            .data{
                padding: 7%;
                font-size: 85%;
            }
        }
    </style>
</head>
<body class="bg-pan-top">
    
    <div class="container mb-auto">
        <form action="" class="m-auto mt-3 w-auto rounded-4" method="POST">
            <div class="text-center py-4 bg-white w-50 m-auto" style="border-radius: 2rem;">
                <h2>Selamat Datang</h2>
                <div class="gambar mb-3">
                    <img src="../assets/imgs/Foto SD/logoSD.png" class="p-3 mb-2" width="160px" style="border-radius: 5%;" alt="">
                </div>
                <div class="data">
                    <div class="">                        
                        <div class="mb-3 w-75 m-auto">
                            <label class="form-label text-start" for="username" style="display: block;">Username :</label>
                            <input type="text" class="form-control bg-white border-1" name="username" id="username">
                        </div>
                        <div class="mb-5 w-75 m-auto">
                            <label class="form-label text-start" for="password" style="display: block;">Password :</label>
                            <input type="password" class="form-control bg-white border-1" name="password" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-75 border-0 fw-bold mb-3" data-bs-target="" 
                            data-bs-toggle="modal" style="background: linear-gradient(120deg,#a800a8,#00c8ff);" name="login">Login!</button>
                        </div>
                        
                        <footer class="main-footer">
                            <p class="text-center"><small class="footer">- Created By RPL 2 SMKN1 Kota Cirebon -</small></p>
                        </footer>
                    </div>
                </div>    
            </div>
            <!-- <h3 class="text-white bg-dark  p-2 ps-3 border-bottom border-2 border-white">Login Admin</h3>
            <div class="row gap-2 p-3">
                <div class="col-md-4">
                    <div class="gambar">
                        <img src="../assets/imgs/Foto SD/logoSD.png" class="w-100 p-3 mb-2" style="border-radius: 5%;" alt="">
                    </div>
                </div>
                <div class="col ms-auto data">
                    <div class="">                        
                        <div class="mb-3">
                            <label class="form-label text-white" for="username" style="display: block;">Username :</label>
                            <input type="text" class="form-control bg-white border-1" name="username" id="username">
                        </div>
                        <div class="mb-5">
                            <label class="form-label text-white" for="password" style="display: block;">Password :</label>
                            <input type="password" class="form-control bg-white border-1" name="password" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary rounded-pill w-50 border-0 fw-bold mb-3" data-bs-target="" 
                            data-bs-toggle="modal" style="background: linear-gradient(120deg,#a800a8,#00c8ff);" name="login">Login!</button>
                        </div>
                
                        <footer class="main-footer">
                            <p class="text-center text-white"><small class="footer">- Support By ZisSensei -</small></p>
                        </footer>
                    </div>
                </div>                
            </div> -->
        </form>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
