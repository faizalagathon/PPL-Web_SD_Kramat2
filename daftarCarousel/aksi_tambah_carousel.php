<?php 
include 'Koneksi.php';

$rand = rand();
$ekstensi =  array('png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	echo" 
		<script>
		alert('Data Harus Berupa png,jpg, atau jpeg!!');
		document.location.href = 'modifikasi_carousel.php';
		</script>
		";
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/imgs/fotocarousel/'.$rand.'_'.$filename);
		mysqli_query($db_link, "INSERT INTO carousel VALUES(NULL,'$xx')");
		echo" 
		<script>
		alert('Data Berhasil di Tambah');
		document.location.href = 'modifikasi_carousel.php';
		</script>
		"
		;
	}else{
		echo" 
		<script>
		alert('Ukuran Terlalu Besar');
		document.location.href = 'modifikasi_carousel.php';
		</script>
		";
	}
}