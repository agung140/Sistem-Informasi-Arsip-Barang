<?php

	include "../../koneksi.php";

	$kode_pembelian = $_GET['kode_pembelian'];
	$id = $_GET['id'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbpembelian where kode_pembelian = '$kode_pembelian'") or die (mysqli_eror());
	$hapusdetail = mysqli_query($koneksi, "DELETE FROM tbdetailpembelian where id = '$id'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=dataPembelianBarang'>

	";


?>