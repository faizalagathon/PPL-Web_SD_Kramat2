<?php
require 'koneksi.php';

if(isset($_GET["ParamAksi"])){
    if(isset($_GET["ParamAksi"])){
        $aksi=$_GET["ParamAksi"];
    }
    if(isset($_GET['ParamTable'])){
        $table=$_GET['ParamTable'];
    }
    if(isset($_GET['ParamCek'])){
        $cek=$_GET['ParamCek'];
    }
}
global $link;
// SECTION AKSI TAMBAH KATEGORI
if($aksi=='tambah_kategori'){
    
    if($table=='kategori_acara'){
        $nama_k_acara=htmlspecialchars($_POST["nama_k_acara"]);
        $tanggal_k_acara=htmlspecialchars($_POST["tanggal_k_acara"]);
        $required=$nama_k_acara && $tanggal_k_acara;

            if($cek=='required'){
            if(!$required){
                header("Location:  daftarGaleri/admin/galeri.php?gagal");
                exit;
            }
        } 
        $query="INSERT INTO $table
        VALUES
        (NULL,'$nama_k_acara','$tanggal_k_acara')";
        mysqli_query($link,$query);
        if($query){
            header("Location:  daftarGaleri/admin/galeri.php?sukses");
            exit;
        }
    }
}
// !SECTION END T KATEGORI

// SECTION TAMBAH GAMBAR
if($aksi =='tambah_gambar'){
    
    if($table=='galeri'){
        $id_k_acara=htmlspecialchars($_POST["id_k_acara"]);
        // UPLOAD GAMBAR
        $gambar = upload();
       
        if ($gambar === false) {
            header("Location: daftarGaleri/admin/galeri.php?gagal_t_gambar");
            exit;
        }
        if(!$id_k_acara){
            header("Location: daftarGaleri/admin/galeri.php?mohon_isi_k_a");
        }
        // query insert data
        $tambah_gambar="INSERT INTO $table
        VALUES
        (NULL,'$id_k_acara','$gambar')";
        mysqli_query($link,$tambah_gambar);
        
        if($tambah_gambar){
            header("Location: daftarGaleri/admin/galeri.php?sukses_t_gambar");
            exit;
        }
    }
    
}
// !SECTION TAMBAH GAMBAR

// SECTION HAPUS
if($aksi == 'hapus_foto'){
    if($table=='galeri'){
        unlink('upload/' . $_POST['gambarGaleri']);
        $hapus=mysqli_query($link,"DELETE FROM $table WHERE idGaleri='$_POST[idGaleri]'");
        if($hapus){
            header("Location: daftarGaleri/admin/galeri.php?sukses_h_g");
            exit;
        }
        else{
            header("Location: daftarGaleri/admin/galeri.php?gagal_h_g");
        }
        exit;
    }
}
if($aksi == 'hapus_k_acara'){
    if($table=='kategori_acara'){
        $nama_k_acara=($_POST["nama_k_acara"]);
        $tanggal_k_acara=($_POST["tanggal_k_acara"]);
        $gambar =$_POST['gambarGaleri'];
        if($cek=='ada_gambar'){
            if($gambar >= 0){
                    header("Location: daftarGaleri/admin/galeri.php?gagal_h_k_a");
            }
        }
        $hapus=mysqli_query($link,"DELETE FROM $table WHERE id_k_acara='$_POST[id_k_acara]'");
        if($hapus){
            header("Location: daftarGaleri/admin/galeri.php?sukses_h_k_a");
            exit;
        }
     
    }
}
// !SECTION HAPUS
// SECTION UBAH GAMBAR
if($aksi=='ubah_foto'){
    if($table=='galeri'){
        $idgaleri=$_POST["idGaleri"];
        $id_k_acara=$_POST["id_k_acara"];
        $gambar_lama = $_POST['gambarLama'];
        $gambar = upload();
        if ($gambar === false) {
            $gambar = $gambar_lama;
            }
          
         if($gambar != $gambar_lama){
            unlink('upload/' . $gambar_lama);
            }
       
        $ubah_gambar=mysqli_query ($link,"UPDATE $table SET
        id_k_acara='$id_k_acara',
        gambarGaleri='$gambar'
        WHERE idGaleri =$idgaleri
        ");
        if($ubah_gambar){
            header("Location: daftarGaleri/admin/galeri.php?sukses_u_g");
            exit;
        }
        else{
            header("Location: daftarGaleri/admin/galeri.php?gagal_u_g");
            exit;
        }
    }
} 
if($aksi=='ubah_k_acara'){
    if($table=='kategori_acara'){
        $id_k_acara=htmlspecialchars($_POST['id_k_acara']);
        $nama_k_acara=htmlspecialchars($_POST['nama_k_acara']);
        $tanggal_k_acara=htmlspecialchars($_POST['tanggal_k_acara']);
        $ubah_k_acara=mysqli_query ($link,"UPDATE $table SET
        nama_k_acara='$nama_k_acara',
        tanggal_k_acara='$tanggal_k_acara'
        WHERE id_k_acara =$id_k_acara
        ");
        if($ubah_k_acara){
            header("Location: daftarGaleri/admin/galeri.php?sukses_u_k");
            exit;
        }
        else{
            header("Location: daftarGaleri/admin/galeri.php?gagal_u_k");
            exit;
        }
    }

}
// !SECTION UBAH GAMBAR 

// SECTION UPLOAD
function upload(){
    $namafile=$_FILES['gambarGaleri']['name'];
    $ukuranfile=$_FILES['gambarGaleri']['size'];
    $error=$_FILES['gambarGaleri']['error'];
    $tmpname=$_FILES['gambarGaleri']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        return false;
    }
    // cek apakah yang diupload adalah gambar
    $ekstensigambarvalid=['jpg','jpeg','png','gif'];
    $ektensigambar= explode('.',$namafile);
    $ektensigambar=strtolower(end($ektensigambar));
    if(!in_array($ektensigambar,$ekstensigambarvalid)){
        header("Location: daftarGaleri/admin/galeri.php?bukan_gambar");
        exit;
    }
    // cek jika ukuran terlalu besar
    if($ukuranfile>5000000){
        header("Location: daftarGaleri/admin/galeri.php?gambar_terlalu_besar");
        exit;
    }

    // lolos pengecekan,gambar siap upload
    // generate nama gambar baru
    $namafilebaru =uniqid();
    $namafilebaru .='.';
    $namafilebaru .=$ektensigambar;

    move_uploaded_file($tmpname,"upload/".$namafilebaru);
    return $namafilebaru;
}
// !SECTION UPLOAD
