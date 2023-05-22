<?php
include "../koneksi_login.php";
$user=$_POST["login"];
$pass=$_POST["pw"];
$query="SELECT * FROM admin WHERE password = '$pass' && user = '$user'";
$query2=mysqli_query($db_link,$query);

if ( mysqli_num_rows($query2) == 1 ){
	echo"
	<script>
	alert('Berhasil Masuk Admin');
	document.location.href = '../Admin/navbarcarousel.php';
	</script>
	";	
} else {
	echo "
		<script>
		alert('User Tidak Tersedia atau User dan PAssword salah');
		document.location.href = 'login_user.php';
		</script>
		";
}

// 	while($d = mysqli_fetch_array($query2)){
// 	$db_user= $d["user"];
// 	$db_pass= $d["password"];

//   if($user == $db_user && $pass == $db_pass) {
	
// 		echo"
// 	    <script>
//         alert('Berhasil Masuk Admin');
//         document.location.href = 'admin.php';
//         </script>
// 		";
//   }else{
// 	echo "
// 		<script>
//         alert('User Tidak Tersedia atau User dan PAssword salah');
//         document.location.href = 'user.php';
//         </script>
// 		";
//   }
// }
?>