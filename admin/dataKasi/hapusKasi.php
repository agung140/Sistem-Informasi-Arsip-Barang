<?php

	include "../../koneksi.php";

	$kode_kasi = $_GET['kode_kasi'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbkasi where kode_kasi = '$kode_kasi'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataKasi'>

	";


?>