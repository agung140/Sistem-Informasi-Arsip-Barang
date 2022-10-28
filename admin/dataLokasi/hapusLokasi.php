<?php

	include "../../koneksi.php";

	$kode_lokasi = $_GET['kode_lokasi'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tblokasi where kode_lokasi = '$kode_lokasi'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataLokasi'>

	";


?>