<?php

	include "../../koneksi.php";

	$id = $_GET['id'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbsementara where id = '$id'") or die (mysqli_eror());
	$hapusdetail = mysqli_query($koneksi, "DELETE FROM tbdetailpembelian where id = '$id'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=tambahPembelianBarang'>

	";


?>