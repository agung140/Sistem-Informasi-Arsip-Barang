<?php

	include "../../koneksi.php";

	$kode_suplier = $_GET['kode_suplier'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbsuplier where kode_suplier = '$kode_suplier'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataSuplier'>

	";


?>