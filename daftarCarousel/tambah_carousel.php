<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tambah carousel</title>
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
    </style>
  </head>
  <body>

    <form method="post" action="aksi_tambah_carousel.php" enctype="multipart/form-data">
      
      <div class="card mx-auto" style="width: 18rem;">
        <img src="https://th.bing.com/th?id=OIP.cUUf67YH-hex_XPKWlnZ1QHaLF&w=204&h=305&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2" class="card-img-top" alt="No-Image" style="width: 286px; height:200px;">
        <div class="card-body">
          <h5 class="card-title" style="color: red;">Tambah Gambar Carousel</h5>
          <h5 class="card-title mt-4"><input type="file" name="foto" required="required"></h5>
          <p class="card-text" style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
          <button class="btn btn-primary" type="submit">Tambah</button>
          <button class="btn btn-primary" type="reset" >Reset</button>
          <a href="modifikasi_carousel.php" class="btn btn-primary">Kembali</a>
        </div>
      </div>

    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
