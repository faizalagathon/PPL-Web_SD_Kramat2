<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gallery</title>
  <link
    rel="stylesheet"
    href="../../assets/css/bootstrap/bootstrap.css"
  >
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    .header-navbar{
      z-index: 1010;
    }
    .gallery{
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-auto-flow: dense;
      gap: 24px;
    }
    .gallery .image > img,.gallery > img{
      width: 100%;
      object-fit: cover;
      border-radius: 20px;
      transition: transform 400ms;
      background: #ffffff;
      box-shadow:  17px 17px 33px #d8d8d8,
      -17px -17px 33px #ffffff;
    }
    .gallery img:hover{
      transform: scale(1.1);
    }
    .gallery .square-sm{
      grid-column-end: span 1;
      grid-row-end: span 1;
      aspect-ratio: 1 / 1;
    }
    .gallery .square-md{
      grid-column-end: span 2;
      grid-row-end: span 2;
      aspect-ratio: 1 / 1;
    }
    .gallery .landscape{
      grid-column-end: span 2;
      grid-row-end: span 1;
      aspect-ratio: 2 / 1;
    }
    .gallery .portrait{
      grid-column-end: span 1;
      grid-row-end: span 2;
      aspect-ratio: 1 / 2;
    }

    form .ukuran .form-check .square-sm{
      grid-column-end: span 1;
      grid-row-end: span 1;
      aspect-ratio: 1 / 1;
    }
    form .ukuran .form-check .square-md{
      grid-column-end: span 2;
      grid-row-end: span 2;
      aspect-ratio: 1 / 1;
    }
    form .ukuran .form-check .landscape{
      grid-column-end: span 2;
      grid-row-end: span 1;
      aspect-ratio: 2 / 1;
    }
    form .ukuran .form-check .portrait{
      grid-column-end: span 1;
      grid-row-end: span 2;
      aspect-ratio: 1 / 2;
    }
    
    /* (A) WRAPPER */
    .image {
      position: relative;
      overflow: hidden;
      /* max-width: 500px; optional */
    }
    
    /* (B) RESPONSIVE IMAGE */
    .image > img { width: 100%; }
    
    /* (C) CAPTION */
    .cap {
      /* (C1) DIMENSIONS */
      box-sizing: border-box;
      width: 100%;
      height: 100%;
      border-radius: 20px;
    
      /* (C2) POSITION */
      position: absolute;
      top: 0;
      text-align: center;
      /* padding-top: 25%; */
    
      /* (C3) COLORS */
      background-color: rgba(0, 0, 0, .1);
      backdrop-filter: blur(4px);
      color: white;
    }
    .cap #hapus{
      position: absolute;
      top: 50%; left: 30%; 
      transform: translate(-30%, -50%);
    }
    .cap #edit{
      position: absolute;
      top: 50%; left: 70%;
      transform: translate(-0%, -50%);
    }
    /* (D) SHOW/HIDE */
    .cap {
      visibility: none; opacity: 0;
      transition: opacity 0.3s;
    }
    .image:hover .cap {
      visibility: visible; opacity: 1;
    }
    /* @media ( 768px <= width <= 992px ) {
      .gallery{
        grid-template-columns: repeat(4, 1fr);
      }
    }
    @media ( 576px <= width <= 768px ) {
      .gallery{
        grid-template-columns: repeat(3, 1fr);
      }
    }
    @media ( width <= 576px ) {
      .gallery{
        grid-template-columns: repeat(2, 1fr);
      }
    } */
  </style>
</head>

<body>

  <?php 
  
  require '../functions.php';

  if ( isset($_GET['hapus']) ){
    $id = $_GET['hapus'];
    $sqlHapus = "DELETE FROM galeri WHERE idGaleri = $id";
    mysqli_query($link,$sqlHapus);
  }
  
  if ( isset($_POST['btnTambahdata']) ){
    $ukuran = $_POST['ukuran'];
    
    $rand = rand();
    $ekstensi =  array('img','png','jpg','jpeg','gif');
    $filename = $_FILES['gambarGaleri']['name'];
    $ukuranGambar = $_FILES['gambarGaleri']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
      header("location:welcome.php?page=galeri&alert=gglekstensi");
    }else{
      if($ukuranGambar > 20097152){		
        echo" 
				<script>
				document.location.href = 'welcome.php?page=galeri&gglukuran';
				</script>
				";
      }else{
        $gambar = $rand.'.'.$ext;
        move_uploaded_file($_FILES['gambarGaleri']['tmp_name'], '../assets/imgs/galeri/'.$gambar);
        mysqli_query($link, "INSERT INTO galeri VALUES (NULL,'$gambar','$ukuran')");
        echo" 
				<script>
				document.location.href = 'welcome.php?page=galeri&berhasil';
				</script>
				";
      }
    }  
  
    // var_dump($ukuran);
    // var_dump($filename);
  }
  

    ?>

  <div class="container-md">

    <div class="operation">

      <!-- SECTION BS BTN Modal Tambah Data -->
      <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
        + Tambah Gambar
      </button>
      <!-- !SECTION BS BTN Modal Tambah Data -->

      <!-- SECTION BS BTN Hapus Data -->

      <!-- !SECTION BS BTN Hapus Data -->

    </div>

    <div class="gallery">

      <?php
      $img = mysqli_query($link,"SELECT * FROM galeri ORDER BY gambarGaleri ASC"); ?>

      <?php foreach ( $img as $img ) :?>
      <div class="image">
        <!-- data-aos="zoom-in data-aos-duration='3000'"  -->
        <img 
        src="../../assets/imgs/galeri/<?=$img['gambarGaleri']?>" alt="" 
        loading="lazy">
        <div class="cap">

          <a href="welcome.php?page=galeri&hapus=<?=$img['idGaleri']?>" id="hapus">
            <img src="../assets/svg/iconHapus.svg" alt="..." width="30" title="Hapus">
          </a>

          <a href="gallery_act.php?id=<?=$img['idGaleri']?>" id="edit">
            <!-- <button type="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">
              </button> -->
              <img src="../assets/svg/iconEdit.svg" alt="..." width="30" title="Edit">
          </a>

        </div>
      </div>
      <?php endforeach; ?>
      

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gambar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <h3 class="text-center">Pilih Gambar</h3> <br>
            <input type="file" name="gambar" id="gambar">
            <p class="text-danger">Format : </p>

            <hr>

            <h3 class="text-center">Pilih ukuran</h3>
            <div class="ukuran">

              <select class="form-select" aria-label="Default select example" name="ukuran">
                <option selected value="square-sm">KOTAK KECIL</option>
                <option value="square-md">KOTAK BESAR</option>
                <option value="portrait">PORTRAIT</option>
                <option value="landscape">HORIZONTAL</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Submit" name="btnTambahdata" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>