<?php 
require 'koneksi.php';

function tambah($data){
    global $conn;
        //ambil data dari tiap elemen dalam form
        $id_k_acara=htmlspecialchars($data["id_k_acara"]);
        // UPLOAD GAMBAR
        $gambar = upload();
        if(!$gambar){
            return false;
        }
        // query insert data
        $query="INSERT INTO galeri
        VALUES
        ('','$id_k_acara','$gambar')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    
}

function upload(){
    $namafile=$_FILES['gambarGaleri']['name'];
    $ukuranfile=$_FILES['gambarGaleri']['size'];
    $error=$_FILES['gambarGaleri']['error'];
    $tmpname=$_FILES['gambarGaleri']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error===4){
        echo "
        <script>
        alert('pilih gambar terlebih dahulu')
        </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensigambarvalid=['jpg','jpeg','png','gif'];
    $ektensigambar= explode('.',$namafile);
    $ektensigambar=strtolower(end($ektensigambar));
    if(!in_array($ektensigambar,$ekstensigambarvalid)){
        echo "
        <script>
        alert('yang anda upload bukan gambar')
        </script>
        ";
        return false;
    }
    // cek jika ukuran terlalu besar
    if($ukuranfile>100000000){
        echo "
        <script>
        alert('ukuran gambar terlalu besar!!!')
        </script>
        ";
        return false;
    }

    // lolos pengecekan,gambar siap upload
    // generate nama gambar baru
    $namafilebaru =uniqid();
    $namafilebaru .='.';
    $namafilebaru .=$ektensigambar;
    move_uploaded_file($tmpname,'../../upload/'.$namafilebaru);
    return $namafilebaru;
}
function tambah_kategori($data){
    global $conn;
    $nama_k_acara=htmlspecialchars($data["nama_k_acara"]);
    $tanggal_k_acara=htmlspecialchars($data["tanggal_k_acara"]);
    $error=$nama_k_acara && $tanggal_k_acara;

    if (!$error){
        echo "
        <script>
        alert('silahkan isi tanggal dan nama acara terlebih dahulu')
        </script>
        ";
        return false;
    }

    $tambah_k="INSERT INTO kategori_acara
    VALUES
    ('','$nama_k_acara','$tanggal_k_acara')";
    if ($tambah_k){
        echo "
        <script>
        alert('kategori berhasil ditambahkan');
        document.location='admin/galeri.php';
        </script>
        ";
    }

}



?>

