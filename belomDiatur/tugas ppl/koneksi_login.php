<?php
$host="localhost";
$username="root";
$pass="";
$database_name="db_sdkramat2";
$db_link= mysqli_connect($host,$username,$pass,$database_name);

function query($sql){
    global $db_link;

    $hsl=mysqli_query($db_link,$sql);
    $rows=[];

    while($row= mysqli_fetch_assoc($hsl)){
        $rows[]=$row;
    }
    return $rows;
}

function hapus($idguru){
    global $db_link;
    $sql = "DELETE FROM guru WHERE id_guru = $idguru";
    mysqli_query($db_link,$sql);
    return mysqli_affected_rows($db_link);
}

?>