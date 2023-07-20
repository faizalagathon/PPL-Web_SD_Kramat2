<?php 
// session_start();

include '../koneksi.php';

// $link = new mysqli('localhost','root','','db_sdkramat2');

// function query($sql){
//   global $link;

//   $hsl=mysqli_query($link,$sql);
//   $rows=[];

//   while($row= mysqli_fetch_assoc($hsl)){
//       $rows[]=$row;
//   }
//   return $rows;
// }

function login($data){
  global $link;

  $username = htmlspecialchars($data['username']); 
  $password = htmlspecialchars($data['password']); 

  $query = "SELECT * FROM guru WHERE nama_guru='$username'";
  $result = mysqli_query($link, $query);

  $jumlahData = mysqli_num_rows(mysqli_query($link, "SELECT * FROM guru WHERE role = 'Admin'"));
  
  if(mysqli_num_rows($result) === 1){        
        
    // cek password
    $row=mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){
      $role_guru = $row['role'];
  
      $_SESSION['login'] = $role_guru;
      return true;
    }
  }
  else if($jumlahData == 0 && $username == "Admin" && $password == "20222070"){
    $role_guru = "Admin";

    $_SESSION['login'] = $role_guru;
    return true;
  }
  else{
    return false;
  } 
}

function tambah($data){
  global $link;

  if(isset($_POST['tambahGuru'])){
    $nama = htmlspecialchars($data['nama']); 
    $nip = htmlspecialchars($data['nip']); 
    $jk = htmlspecialchars($data['jk']); 
    $password = htmlspecialchars($data['password']); 
    $alamat = htmlspecialchars($data['alamat']);
    $mapel = htmlspecialchars($data['mapel']);
    $role = htmlspecialchars($data['role']);

    // enkripsi password
    $password=password_hash($password,PASSWORD_DEFAULT);
  
    // Cek apakah NIP sudah pernah digunakan atau belom
    $cekGuru = mysqli_query($link,"SELECT * FROM guru WHERE nip_guru='$nip'");
    if(mysqli_num_rows($cekGuru) > 0){
      echo "
        <script>
        alert('NIP Sudah Pernah Digunakan');
        document.location.href = '../daftarGuru/daftar_guru.php'; 
        </script>";
        return false;
    }
    
    if ($_FILES['gambar']['error'] === 4) {
      $gambar = 'default_gambar.png';
    }else {
      $gambar = upload();
      if ($gambar === false) {
        $gambar = 'default_gambar.png';
      }
    }
    
    
    $query = "INSERT INTO guru VALUES(null, '$mapel', '$nip', '$nama', '$jk', '$password', '$alamat', '$role', '$gambar')";
  }

  mysqli_query($link, $query);

  return mysqli_affected_rows($link);

}

function ubah($data){
  global $link;

  if(isset($data['ubahSejarah'])){
    $idSejarah = $data['idSejarah'];
    $teksSejarah = $data['teksSejarah'];
    
    if($idSejarah == 0){
      $query = "INSERT INTO sejarah VALUES(NULL, '$teksSejarah')";
    }
    else{
      $query = "UPDATE sejarah SET teksSejarah = '$teksSejarah' WHERE idSejarah='$idSejarah'";
    }
    
  }

  if(isset($data['ubahSambutan'])){
    $idSambutan = $data['idSambutan'];
    $teksSambutan = $data['teksSambutan'];
    
    if($idSambutan == 0){
      $query = "INSERT INTO sambutan VALUES(NULL, '$teksSambutan')";
    }
    else{
      $query = "UPDATE sambutan SET teksSambutan = '$teksSambutan' WHERE idSambutan='$idSambutan'";
    }
    
  }

  if(isset($data['ubahVisi'])){
    $idVisi = $data['idVisi'];
    $teksVisi = $data['teksVisi'];

    if($idVisi == 0){
      $query = "INSERT INTO visi VALUES(NULL, '$teksVisi')";
    }
    else{
      $query = "UPDATE visi SET teksVisi = '$teksVisi' WHERE idVisi='$idVisi'";
    }
  }

  if(isset($data['ubahMisi'])){
    $idMisi = $data['idMisi'];
    $teksMisi = $data['teksMisi'];

    if($idMisi == 0){
      $query = "INSERT INTO misi VALUES(NULL, '$teksMisi')";
    }
    else{
      $query = "UPDATE misi SET teksMisi = '$teksMisi' WHERE idMisi='$idMisi'";
    }
  }
  
  if(isset($data['ubahGuru'])){
    $id = htmlspecialchars($data['id_guru']);
    $nama = htmlspecialchars($data['nama']); 
    $nip = htmlspecialchars($data['nip']); 
    $jk = htmlspecialchars($data['jk']); 
    $alamat = htmlspecialchars($data['alamat']);
    $mapel = htmlspecialchars($data['mapel']);
    $role = htmlspecialchars($data['role']);
    $password = htmlspecialchars($data['password']);
    $gambar_lama = htmlspecialchars($data['gambar_lama']);
    
    // Cek apakah NIP sudah pernah digunakan atau belom
    $nipLama = mysqli_fetch_assoc(mysqli_query($link,"SELECT nip_guru FROM guru WHERE id_guru='$id'"))['nip_guru'];
    if($nipLama != $nip){
      $cekGuru = mysqli_query($link,"SELECT * FROM guru WHERE nip_guru='$nip'");
      if(mysqli_num_rows($cekGuru) > 0){
        echo "
          <script>
          alert('NIP Sudah Pernah Digunakan');
          document.location.href = '../daftarGuru/daftar_guru.php'; 
          </script>";
          return false;
        }
      }
      
      // Bagian Gambar
    if ($_FILES['gambar']['error'] === 4) {
      $gambar = $gambar_lama;
    } else {
      $gambar = upload();
      if ($gambar === false) {
        $gambar = $gambar_lama;
      }
      $file = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM guru WHERE id_guru='$id'"));
      if($file['gambar'] != 'default_gambar.png'){
        unlink('../assets/imgs/Foto_SD/Foto_Guru/' . $file["gambar"]);
      }
    }

    // Cek password
    if($password == ""){
      $query = "UPDATE guru SET id_mapel=$mapel, nip_guru='$nip', nama_guru='$nama', jk_guru='$jk', alamat_guru='$alamat', role='$role', gambar='$gambar' WHERE id_guru='$id'";
    }
    else{
      $password = password_hash($password,PASSWORD_DEFAULT);
      $query = "UPDATE guru SET id_mapel=$mapel, nip_guru='$nip', nama_guru='$nama', jk_guru='$jk', password='$password', alamat_guru='$alamat', role='$role', gambar='$gambar' WHERE id_guru='$id'";
    }
  
  }

  mysqli_query($link, $query);

  return mysqli_affected_rows($link);

}

function upload(){

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  if(isset($_FILES['gambar']['eror'])){
    $eror = $_FILES['gambar']['eror'];
  }
  $tmpName = $_FILES['gambar']['tmp_name'];


  // cek apakah yang di upload adalah gambar
  $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
      echo "
      <script>
      alert('Masukan gambar terlebih dahulu');
      document.location.href = 'daftarGuru/daftar_guru.php'; 
      </script>";
      return false;
  }
  
  // cek jika ukurannya terlalu besar
  if( $ukuranFile > 20000000 ){
      echo "
      <script>
      alert('ukuran Gambar Terlalu Besar');
      document.location.href = 'daftarGuru/daftar_guru.php'; 
      </script>";
      return false;
  }

  // lolos pengecekan gambar siap di upload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  
  move_uploaded_file($tmpName, '../assets/imgs/Foto_SD/Foto_Guru/' . $namaFileBaru);
  
  return $namaFileBaru;
  
}

function hapus($id){
  global $link;
  // var_dump($id['idCarousel']);
  // exit;

  if(isset($id['idCarousel'])){
    $id = $id['idCarousel'];
    $file = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM carousel WHERE idCarousel='$id'"));
    unlink('../assets/imgs/fotocarousel/' . $file["gambarCarousel"]);
    $query= "DELETE FROM carousel where idCarousel='$id'";
  } 
  
  if(isset($id['id_guru'])){
    $id = htmlspecialchars($id['id_guru']);
    
    $file = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM guru WHERE id_guru='$id'"));
    if($file['gambar'] != 'default_gambar.png'){
      unlink('../assets/imgs/Foto_SD/Foto_Guru/' . $file["gambar"]);
    }
    $query = "DELETE FROM guru WHERE id_guru='$id'";
  }

  mysqli_query($link,$query);
  return mysqli_affected_rows($link);
}

// if(isset($_POST['btnFeedback'])){
//   $tambahFeedback = mysqli_query($link, "INSERT INTO feedback VALUES(NULL, '$_POST[email]', '$_POST[feedback]')");
//   if ($tambahFeedback === false){
//     echo "
//       <script>
//         alert('Gagal mengirim Feedback')
//       </script>
//     ";
//   }
//   echo "
//     <script>
//       alert('Berhasil mengirim Feedback')
//     </script>
//   ";
// }

?>
