<?php

	include "../../koneksi.php";

	$kode_barang = $_GET['kode_barang'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbbarang where kode_barang = '$kode_barang'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataBarang'>

	";


?>