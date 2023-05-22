<?php 
require 'aksi_crud.php';
global $conn;
if(isset ($_POST['ubah_foto'])){
    $idgaleri=$_POST["idGaleri"];
    $id_k_acara=$_POST["id_k_acara"];
    $gambar=upload();
  
    $ubah_gambar=mysqli_query($conn,"UPDATE galeri SET
    id_k_acara='$id_k_acara',
    gambarGaleri='$gambar'
    WHERE idGaleri =$idgaleri
    ");
    if($ubah_gambar){
        header("Location: admin/galeri.php?sukses_u_g");
        exit;
    }
    else{
        header("Location: admin/galeri.php?gagal_u_g");
        exit;
    }
}
?>