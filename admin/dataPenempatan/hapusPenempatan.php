<?php

	include "../../koneksi.php";

	$kode_penempatan = $_GET['kode_penempatan'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tbpenempatan where kode_penempatan = '$kode_penempatan'") or die (mysqli_eror());

	echo"
		<meta http-equiv='refresh' content = '0 url=../beranda.php?hal=tambahPenempatan'>

	";


?>