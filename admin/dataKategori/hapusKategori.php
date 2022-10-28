<?php

	include "../../koneksi.php";

	$kode_kategori = $_GET['kode_kategori'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbkategori where kode_kategori = '$kode_kategori'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataKategori'>

	";


?>