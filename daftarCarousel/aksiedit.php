<?php
require 'Koneksi.php';
if(isset($_GET["ParamAksi"])){
    $aksi=$_GET["ParamAksi"];
    $table=$_GET['ParamTable'];
    // $cek=$_GET['ParamCek'];
}

global $db_link;

if($aksi=='ubah_foto'){
    if($table=='carousel'){
        $idcarousel=$_POST["idCarousel"];
        $gambar_lama = $_POST['gambarLama'];
        $gambar = upload();
        if ($gambar === false) {
            $gambar = $gambar_lama;
            }
          
         if($gambar != $gambar_lama){
            unlink('../assets/imgs/fotocarousel/' . $gambar_lama);
            }
       
        $ubah_gambar=mysqli_query ($db_link,"UPDATE $table SET
        gambarCarousel='$gambar'
        WHERE idCarousel =$idcarousel
        ");
        if($ubah_gambar){
            echo "
                    <script>
                    alert('Data Berhasil di Edit');
                    document.location.href = 'modifikasi_carousel.php';
                    </script>
                    ";
        }
        else{
            echo "
                    <script>
                    alert('Data Gagal di Edit');
                    document.location.href = 'modifikasi_carousel.php';
                    </script>
                    ";
        }
        }
    }

    // SECTION UPLOAD
function upload(){
    $namafile=$_FILES['gambarCarousel']['name'];
    $ukuranfile=$_FILES['gambarCarousel']['size'];
    $error=$_FILES['gambarCarousel']['error'];
    $tmpname=$_FILES['gambarCarousel']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "
        <script>
        alert('Mohon Pilih Gambar Terlebih Dahulu');
        document.location.href = 'modifikasi_carousel.php';
        </script>
        ";
    }
    // cek apakah yang diupload adalah gambar
    $ekstensigambarvalid=['jpg','jpeg','png','gif'];
    $ektensigambar= explode('.',$namafile);
    $ektensigambar=strtolower(end($ektensigambar));
    if(!in_array($ektensigambar,$ekstensigambarvalid)){
        echo "
                    <script>
                    alert('Bukan Gambar');
                    document.location.href = 'modifikasi_carousel.php';
                    </script>
                    ";
                    return false;
    }
    // cek jika ukuran terlalu besar
    if($ukuranfile>5000000){
        echo "
                    <script>
                    alert('Ukuran Gambar Terlalu Besar');
                    document.location.href = 'modifikasi_carousel.php';
                    </script>
                    ";
    }

    // lolos pengecekan,gambar siap upload
    // generate nama gambar baru
    $namafilebaru =uniqid();
    $namafilebaru .='.';
    $namafilebaru .=$ektensigambar;

    move_uploaded_file($tmpname,"../assets/imgs/fotocarousel/".$namafilebaru);
    return $namafilebaru;
}
// !SECTION UPLOAD
?>