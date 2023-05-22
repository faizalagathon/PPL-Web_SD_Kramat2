<?php
include '../functions.php';
// include "../Koneksi.php";

$id = $_GET['idCarousel'];
$query= "DELETE FROM carousel where idCarousel='$id'";
$result= mysqli_query($link,$query);

if( hapus($id) > 0 ){
    echo "
    <script>
    alert('Data Tidak Berhasil di Hapus');
    document.location.href = 'navbarcarousel.php';
    </script>
    ";
} else {
    echo"
    <script>
    alert('Data Berhasil DiHapus');
    document.location.href = 'navbarcarousel.php';
    </script>
    ";
}
?>