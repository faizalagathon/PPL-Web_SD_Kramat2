<?php
$conn=mysqli_connect("localhost","root","","db_sdkramat2");

function query($query){
    global $conn;
    $result= mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return$rows;
}

function cari($keyword){
    $query="SELECT * FROM  kategori_acara 
    WHERE 
    kategori_acara LIKE '%$keyword%' OR
    gambarGaleri LIKE '%$keyword%' 
    ";
    return query($query);
    }
