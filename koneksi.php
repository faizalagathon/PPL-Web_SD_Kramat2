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