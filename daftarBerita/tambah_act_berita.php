<?php 
include '../functions.php';

$judul = $_POST['judul'];
$isi = $_POST['isi'];
 
$rand = rand();
$ekstensi =  array('img','png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:crud_berita.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/imgs/berita/'.$rand.'_'.$filename);
		mysqli_query($link, "INSERT INTO berita (gambarBerita,judulBerita,isiBerita) VALUES('$xx','$judul','$isi')");
		header("location:crud_berita.php?alert=berhasil");
	}else{
		header("location:crud_berita.php?alert=gagal_ukuran");
	}
}