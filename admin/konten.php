<?php
            
	if($_GET['hal']=='beranda'){
		include "beranda.php";
	}

	elseif ($_GET['hal']=='dashboard') {
		include "dashboard.php";
	}

	elseif ($_GET['hal']=='dataKategori') {
		include "dataKategori/dataKategori.php";
	}

	elseif ($_GET['hal']=='tambahKategori') {
		include "dataKategori/tambahKategori.php";
	}

	elseif ($_GET['hal']=='ubahKategori') {
		include "dataKategori/ubahKategori.php";
	}

	elseif ($_GET['hal']=='dataBarang') {
		include "dataBarang/dataBarang.php";
	}

	elseif ($_GET['hal']=='tambahBarang') {
		include "dataBarang/tambahBarang.php";
	}

	elseif ($_GET['hal']=='ubahBarang') {
		include "dataBarang/ubahBarang.php";
	}

	elseif ($_GET['hal']=='dataLokasi') {
		include "dataLokasi/dataLokasi.php";
	}

	elseif ($_GET['hal']=='tambahLokasi') {
		include "dataLokasi/tambahLokasi.php";
	}

	elseif ($_GET['hal']=='ubahLokasi') {
		include "dataLokasi/ubahLokasi.php";
	}

	elseif ($_GET['hal']=='dataSuplier') {
		include "dataSuplier/dataSuplier.php";
	}

	elseif ($_GET['hal']=='tambahSuplier') {
		include "dataSuplier/tambahSuplier.php";
	}

	elseif ($_GET['hal']=='ubahSuplier') {
		include "dataSuplier/ubahSuplier.php";
	}

	elseif ($_GET['hal']=='hapusSuplier') {
		include "dataSuplier/hapusSuplier.php";
	}

	elseif ($_GET['hal']=='dataPembelianBarang') {
		include "dataPembelianBarang/dataPembelianBarang.php";
	}

	elseif ($_GET['hal']=='detailPembelianBarang') {
		include "dataPembelianBarang/detailPembelianBarang.php";
	}

	elseif ($_GET['hal']=='tambahPembelianBarang') {
		include "dataPembelianBarang/tambahPembelianBarang.php";
	}

	elseif ($_GET['hal']=='hapusPembelianBarang') {
		include "dataPembelianBarang/hapusPembelianBarang.php";
	}

	elseif ($_GET['hal']=='hapusHalamanBarang') {
		include "dataPembelianBarang/hapusHalamanBarang.php";
	}

	elseif ($_GET['hal']=='dataPenempatan') {
		include "dataPenempatan/dataPenempatan.php";
	}

	elseif ($_GET['hal']=='tambahPenempatan') {
		include "dataPenempatan/tambahPenempatan.php";
	}

	elseif ($_GET['hal']=='hapusPenempatan') {
		include "dataPenempatan/hapusPenempatan.php";
	}

	elseif ($_GET['hal']=='detailPenempatan') {
		include "dataPenempatan/detailPenempatan.php";
	}

	elseif ($_GET['hal']=='dataKasi') {
		include "dataKasi/dataKasi.php";
	}

	elseif ($_GET['hal']=='tambahKasi') {
		include "dataKasi/tambahKasi.php";
	}

	elseif ($_GET['hal']=='ubahKasi') {
		include "dataKasi/ubahkasi.php";
	}

?>