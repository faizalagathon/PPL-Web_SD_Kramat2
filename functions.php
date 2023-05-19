<?php

switch (basename($_SERVER['REQUEST_URI'])) {
  case 'ekskul':
    $title = "Ekskul";
    break;
  case 'galleri':
    $title = "Gallery";
    break;
  default:
    # code...
    break;
}

$link = new mysqli('localhost', 'root', '', 'db_sdkramat2');

function query($sql)
{

  global $link;
  $rows = [];
  $hasil = $link->query($sql);
  while ($row = $hasil->fetch_assoc()) {
    $rows[] = $row;
  }
  return $rows;
}

// SECTION CRUD EKSKUL
if (isset($_POST['addEkskul'])) {

  $namaEkskul = $_POST['nama'];

  $fileName = basename($_FILES['gambar']['name']);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $maxSize = 10 * 1024 * 1024; /* Maks. 10 MB */
  $namaGambar = rand(100000, 999999) . '.' . $fileType;

  if ($_FILES['gambar']['size'] == 0){
    mysqli_query($link, "INSERT INTO ekskul VALUES (NULL, '$namaEkskul', 'noImg.png')");
  } else if ($_FILES['gambar']['size'] > $maxSize) {
  } else {
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../assets/imgs/ekskul/" . $namaGambar);
    mysqli_query($link, "INSERT INTO ekskul VALUES(NULL,'$namaEkskul','$namaGambar')");
  }
}
if (isset($_POST['editEkskul'])) {

  $namaEkskul = $_POST['nama'];

  $fileName = basename($_FILES['gambar']['name']);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $maxSize = 10 * 1024 * 1024; /* Maks. 10 MB */
  $namaGambar = rand(100000, 999999) . '.' . $fileType;

  if ($_FILES['gambar']['size'] == 0){
    $gambarSebelumnya = query("SELECT gambarEkskul FROM ekskul WHERE idEkskul = $_POST[editEkskul]")[0];
    mysqli_query($link, "UPDATE ekskul SET 
    namaEkskul = '$namaEkskul', 
    gambarEkskul = '$gambarSebelumnya[gambarEkskul]'
    WHERE idEkskul = $_POST[editEkskul]");
  } else if ($_FILES['gambar']['size'] > $maxSize) {
  } else {
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../assets/imgs/ekskul/" . $namaGambar);
    mysqli_query($link, "UPDATE ekskul SET 
    namaEkskul = '$namaEkskul', 
    gambarEkskul = '$namaGambar'
    WHERE idEkskul = $_POST[editEkskul]");
  }
}
if (isset($_POST['delEkskul'])) {

  mysqli_query($link, "DELETE FROM ekskul WHERE idEkskul = $_POST[delEkskul]");

}
// !SECTION CRUD EKSKUL
