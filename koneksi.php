<?php 

session_start();

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
function cari($keyword){
  $query="SELECT * FROM  kategori_acara 
  WHERE 
  kategori_acara LIKE '%$keyword%' OR
  gambarGaleri LIKE '%$keyword%' 
  ";
  return query($query);
}

