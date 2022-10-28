<?php

	include "../koneksi.php";

	$query =" SELECT max(kode_kategori) as maxKode FROM tbkategori";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeKategori = $data['maxKode'];
	$noUrut = (int) substr($kodeKategori,3,3);
	$noUrut ++ ;
	$char = "KTG" ;
	$kodeKategori = $char . sprintf("%03s" , $noUrut);

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_kategori = $_POST['kode_kategori'];
		$nama_kategori = $_POST['nama_kategori'];


		$simpan = mysqli_query($koneksi, "INSERT INTO tbkategori VALUES ('$kode_kategori',
			'$nama_kategori')");

		echo "
			<script>
				window.alert('Data Berhasil Disimpan')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataKategori'>
		"	;
	}

?>


<div class=" col-sm-8">

	<div class="card">

		<form class="needs-validation" method="POST" novalidate="">
			
			<div class="card-header">

				<h4>Tambah Kategori</h4>
				
			</div>

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Kategori</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $kodeKategori 
							?>" name="kode_kategori" >

							<div class="invalid-feedback">
								Kode Kategori Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Kategori</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_kategori" required="">

							<div class="invalid-feedback">
								Nama Kategori Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="card-footer">
						<button class="btn btn-primary">Simpan</button>
						
					</div>

				</div>

		</form>
		
	</div>
	
</div>
