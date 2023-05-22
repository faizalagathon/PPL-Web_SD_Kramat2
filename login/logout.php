<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

if(isset($_GET['halamanAsal'])){
    $halamanAsal = $_GET['halamanAsal'];
}

if($halamanAsal == 'daftar_guru.php'){
    header('Location: ../daftarGuru/daftar_guru.php');
}

?>