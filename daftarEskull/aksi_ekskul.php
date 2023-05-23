<?php 
include "../koneksi.php";

if (isset($_GET['idEkskul'])){
$ekskul = query("SELECT * FROM ekskul
  INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru
  WHERE ekskul.idEkskul = '$_GET[idEkskul]'")[0];
}

if (isset($_POST['addEkskul'])) {

  $namaEkskul = $_POST['nama'];
  $jadwalEkskul = $_POST['jadwal'];
  $pembimbingEkskul = $_POST['pembimbing'];

  $fileName = basename($_FILES['gambar']['name']);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $maxSize = 10 * 1024 * 1024; /* Maks. 10 MB */
  $namaGambar = rand(100000, 999999) . '.' . $fileType;
  
  if ($_FILES['gambar']['size'] == 0){
    mysqli_query($link, "INSERT INTO ekskul VALUES 
      (NULL, '$pembimbingEkskul', '$namaEkskul', '$jadwalEkskul', 'noImg.png')");
    $_SESSION['tAdd'] = true;
    header("Location: crud_eskull.php");
  } else if ($_FILES['gambar']['size'] > $maxSize) {
    $_SESSION['fAdd'] = "Gambar yang diinputkan lebih dari 10 mb";
    header("Location: crud_eskull.php");
  } else {
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../assets/imgs/ekskul/" . $namaGambar);
    mysqli_query($link, "INSERT INTO ekskul VALUES
      (NULL,'$pembimbingEkskul','$namaEkskul','$jadwalEkskul','$namaGambar')");
    $_SESSION['tAdd'] = true;
    header("Location: crud_eskull.php");
  }
} if (isset($_POST['editEkskul'])) {

  $namaEkskul = $_POST['nama'];
  $jadwalEkskul = $_POST['jadwal'];
  $pembimbingEkskul = $_POST['pembimbing'];

  $fileName = basename($_FILES['gambar']['name']);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $maxSize = 10 * 1024 * 1024; /* Maks. 10 MB */
  $namaGambar = rand(100000, 999999) . '.' . $fileType;

  if ($_FILES['gambar']['size'] == 0){
    $gambarSebelumnya = query("SELECT gambarEkskul FROM ekskul WHERE idEkskul = $_POST[editEkskul]")[0];
    mysqli_query($link, "UPDATE ekskul SET 
    idPembimbing = '$pembimbingEkskul',
    namaEkskul = '$namaEkskul', 
    jadwalHari = '$jadwalEkskul',
    gambarEkskul = '$gambarSebelumnya[gambarEkskul]'
    WHERE idEkskul = $_POST[editEkskul]");
    $_SESSION['tEdit'] = true;
    header("Location: crud_eskull.php");
  } else if ($_FILES['gambar']['size'] > $maxSize) {
    $_SESSION['fEdit'] = "Gambar yang diinputkan lebih dari 10 mb";
    header("Location: crud_eskull.php");
  } else {
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../assets/imgs/ekskul/" . $namaGambar);
    mysqli_query($link, "UPDATE ekskul SET 
    idPembimbing = '$pembimbingEkskul',
    namaEkskul = '$namaEkskul', 
    jadwalHari = '$jadwalEkskul', 
    gambarEkskul = '$namaGambar'
    WHERE idEkskul = $_POST[editEkskul]");
    $_SESSION['tEdit'] = true;
    header("Location: crud_eskull.php");
  }
} if (isset($_POST['delEkskul'])) {

  $gambar = query("SELECT gambarEkskul FROM ekskul WHERE idEkskul = $_POST[delEkskul]")[0]['gambarEkskul'];
  $imagePath = "../assets/imgs/ekskul/" . $gambar;

  if ($gambar == 'noImg.png'){
    mysqli_query($link, "DELETE FROM ekskul WHERE idEkskul = $_POST[delEkskul]");
  } else if (unlink($imagePath)){
    mysqli_query($link, "DELETE FROM ekskul WHERE idEkskul = $_POST[delEkskul]");
  }
  mysqli_query($link, "DELETE FROM ekskul WHERE idEkskul = $_POST[delEkskul]");
  $_SESSION['tDel'] = true;

}






$daftarHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jumat", 'Sabtu', 'Minggu'];
$daftarGuru = query("SELECT * FROM guru");
$daftarEkskul = query("SELECT * FROM ekskul
  INNER JOIN guru ON ekskul.idPembimbing = guru.id_guru");


