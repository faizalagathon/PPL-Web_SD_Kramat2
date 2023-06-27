<?php
    include '../functions.php';

    $id = $_POST['id'];
    $gambar = $_FILES['foto']['tmp_name'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $data = mysqli_query($link, "select *from berita where idBerita='$id'");
    $d = mysqli_fetch_array($data);

    if($gambar !== ""){
        if(file_exists('../assets/imgs/berita/'.$d['gambarBerita'])){
            unlink('../assets/imgs/berita/'.$d['gambarBerita']);
        }
        $rand = rand();
        $ekstensi =  array('img','png','jpg','jpeg','gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ukuran < 1044070){
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/imgs/berita/'.$rand.'_'.$filename);
            mysqli_query($link, "update berita set gambarBerita='$xx', judulBerita='$judul', isiBerita='$isi' where idBerita='$id' ");
                    
            header("Location:crud_berita.php?alert=berhasil");
        }else{
            header("Location:crud_berita.php?alert=gagal_ukuran");
        }
    }else{
        mysqli_query($link, "update berita set judulBerita='$judul', isiBerita='$isi' where idBerita='$id' ");
        header("Location:crud_berita.php?alert=berhasil");
    }
?>