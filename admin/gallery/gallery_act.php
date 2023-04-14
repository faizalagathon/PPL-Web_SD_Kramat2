<?php
require 'functions.php';

$id = $_GET['id'];

$sqlTampil = "SELECT * FROM galeri WHERE id_gambar = $id";
$img = query($sqlTampil)[0];


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Gambar</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2/dist/css/bootstrap.css">
    <style>
      /* *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      } */
      form{
        margin: 24px;
        /* margin-top: ; */
      }
    </style>
  </head> 
  <body>

    <div class="container-sm">
      <form action="" method="post" enctype="multipart/form-data" class="mx-auto">
        <div class="card mx-auto" style="max-width: 40%;">
          <img src="../assets/imgs/galeri/<?=$img['gambar']?>" class="card-img-top" alt="..." >
          <div class="card-body">
      
            <div class="mb-3">
              <label for="formFile" class="form-label">Ubah Gambar : </label>
              <input class="form-control" type="file" id="formFile" name="gambar">
            </div>
      
            <hr>
      
            <p class="text-info">Default : 
              <?=$img['ukuran']?>
            </p>

            <select class="form-select" aria-label="Default select example" name="ukuran">
              <option selected value="square-sm">Pilih Ukuran ...</option>
              <option value="landscape">Landscape</option>
              <option value="portrait">Portrait</option>
              <option value="square-sm">Kotak kecil</option>
              <option value="square-md">Kotak besar</option>
            </select>
      
            <input type="submit" value="submit" name="kirim" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
    
    <?php
    
    if ( isset($_POST['kirim']) ){
      $id = $_GET['id'];
      $ukuran = $_POST['ukuran'];

      $sqlTampil = "SELECT * FROM galeri WHERE id_gambar = $id";
      $img = query($sqlTampil)[0];

      // var_dump($ukuran);

      $rand = rand();
      $ekstensi =  array('img','png','jpg','jpeg','gif');
      $filename = $_FILES['gambar']['name'];
      $ukuranGambar = $_FILES['gambar']['size'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      $gambar = $rand.'.'.$ext;
      
      if (($filename && $ukuran) == NULL) {
        $sqlUtanpaGambar = "UPDATE galeri SET ukuran='$ukuran'
        where id_gambar like '$id'";
        mysqli_query($link,$sqlUtanpaGambar);
  
        echo "
        <script>
        alert('Data Berhasil di Edit');
        document.location.href = 'welcome.php?page=galeri';
        </script>
        ";
      }
      elseif ( $ukuran == NULL ){
        $sqlUtanpaUkuran = "UPDATE galeri SET ukuran='$img[ukuran]'
        where id_gambar like '$id'";
        mysqli_query($link,$sqlUtanpaUkuran);
  
        echo "
        <script>
        alert('Data Berhasil di Edit');
        document.location.href = 'welcome.php?page=galeri';
        </script>
        ";
      }
      elseif(!in_array($ext,$ekstensi) ) {
        echo"<script>alert('gagal ekstensi');document.location.href= 'welcome.php?page=galeri';</script>";
      }else{
        if($ukuranGambar < 20097152){		
          $gambar = $rand.'.'.$ext;
          move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/imgs/galeri/'.$gambar);
          $sqlU= "UPDATE galeri 
          SET
          gambar='$gambar',
          ukuran='$ukuran'
          WHERE id_gambar like '$id'";
          mysqli_query($link,$sqlU);
          echo" 
          <script>
          alert('Data Berhasil di Edit');
          document.location.href = 'welcome.php?page=galeri';
          </script>
          ";
        }else{
          header("location:welcome.php?page=galeri&alert=gagal_ukuran");
        }
      }

    }
    
    ?>

  </body>
</html>
