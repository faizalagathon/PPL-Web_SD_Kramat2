<?php
include '../functions.php';

$data = mysqli_query($link,"select * from berita where idBerita = '$_GET[id]' ");
$d = mysqli_fetch_array($data);

$foto = $d['gambarBerita'];
if(file_exists('../assets/imgs/berita/'.$foto)){
	unlink('../assets/imgs/berita/'.$foto);
}
$query = "delete from berita where idBerita = '$_GET[id]' ";
mysqli_query($link,$query);
header("location:crud_berita.php?alert=berhasilhapus");
?>