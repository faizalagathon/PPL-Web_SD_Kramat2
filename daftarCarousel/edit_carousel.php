<?php 
if(isset($_GET["ParamAksi"])){
    $aksi=$_GET["ParamAksi"];
    $table=$_GET['ParamTable'];
    $cek=$_GET['ParamCek'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-image: url(background_edit.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            align-content: center;
            backdrop-filter: blur(5px);
            justify-content: center;
            padding: 110px;
        }

        @media (max-width: 425px) {
            
            .card{
                margin-left: -1000px;
            }
        }
    </style>
  </head>
  <body>
    
  <?php
    require  "Koneksi.php";
    $idcarousel=$_GET['idCarousel'];
    $sql= "SELECT * FROM carousel WHERE idCarousel like '$idcarousel'";
    $carousel = query($sql);
?>

    <form action="aksiedit.php?ParamAksi=ubah_foto&ParamTable=carousel" method="post" enctype="multipart/form-data">
            
        <div class="card mx-auto" style="width: 18rem;">
        <input type="hidden" name="gambarLama" value="<?= $carousel[0]['gambarCarousel'] ?>">
        <input type="hidden" name="idCarousel" value="<?= $carousel[0]['idCarousel']?>">
            <img class="card-img-top" alt="..." src="../assets/imgs/fotocarousel/<?= $carousel[0]['gambarCarousel'] ?>">
            <div class="card-body">
                <h5 class="card-title">Edit Gambar Carousel</h5>

                <p class="card-text" style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                <input type="file" name="gambarCarousel" id="foto" required>
                <div style="padding: 5px;">
                <input type="hidden" name="hidden">
                <button type="submit" class="btn btn-primary mx-4">Save</button>
                <a href="modifikasi_carousel.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

    <?php
            // if ( isset($_POST['hidden']) ){
                
            //     $rand = rand();
            //     $ekstensi =  array('png','jpg','jpeg','gif');
            //     $filename = $_FILES['foto']['name'];
            //     $ukuran = $_FILES['foto']['size'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
            //     if ( ($filename && $ukuran) == NULL ){
            //         echo "
            //         <script>
            //         alert('Data Gagal di Edit');
            //         document.location.href = 'modifikasi_carousel.php';
            //         </script>
            //         ";
                    
            //     } else {
            //         $xx = $rand.'_'.$filename;
            //         $sqlU= "UPDATE carousel
            //         SET
            //             gambarCarousel='$xx'
            //         WHERE idCarousel = '$idcarousel'";
            //         move_uploaded_file($_FILES['foto']['tmp_name'], 'fotocarousel/'.$xx);

            //         mysqli_query($db_link,$sqlU);
            //         echo "
            //         <script>
            //         alert('Data Berhasil di Edit');
            //                 document.location.href = 'modifikasi_carousel.php';
            //         </script>
            //         ";

            //     }
            // }

        ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>