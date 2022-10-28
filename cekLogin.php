<?php
include "koneksi.php";

$username= $_POST["username"];
$password= md5($_POST["password"]);

$login =mysqli_query($koneksi, "SELECT * FROM tbuser where username='$username' AND password='$password'");

$dataAda=mysqli_num_rows($login);
$data=mysqli_fetch_array($login);

if($dataAda > 0){
	session_start();

	$_SESSION ['id_user']		=	$data['id_user'];
	$_SESSION ['username']		=	$data['username'];
	$_SESSION ['nama_user']		=	$data['nama_user'];
	$_SESSION ['status_user']	=	$data['status_user'];

	echo "
		<script>
			alert('Anda Berhasil Login, Selamat Datang $_SESSION[nama_user]');
			window.location = 'admin/index.php'
		</script>

	";

}else{

	echo "
		<script>
			alert('Username atau Password Salah!!!');
			window.location = 'index.html'
		</script>

	";
}


?>