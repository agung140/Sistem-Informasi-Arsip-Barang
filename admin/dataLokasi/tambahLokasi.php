<?php

	include "../koneksi.php";

	$query =" SELECT max(kode_lokasi) as maxKode FROM tblokasi";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeLokasi = $data['maxKode'];
	$noUrut = (int) substr($kodeLokasi,3,3);
	$noUrut ++ ;
	$char = "LK" ;
	$kodeLokasi = $char . sprintf("%03s" , $noUrut);

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_lokasi = $_POST['kode_lokasi'];
		$nama_lokasi = $_POST['nama_lokasi'];
		$keterangan = $_POST['keterangan'];


		$simpan = mysqli_query($koneksi, "INSERT INTO tblokasi VALUES ('$kode_lokasi',
			'$nama_lokasi', '$keterangan')");

		echo "
			<script>
				window.alert('Data Berhasil Disimpan')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataLokasi'>
		"	;
	}

?>


<div class=" col-sm-8">

	<div class="card">

		<form class="needs-validation" method="POST" novalidate="">
			
			<div class="card-header">

				<h4>Tambah Lokasi</h4>
				
			</div>

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Lokasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $kodeLokasi 
							?>" name="kode_lokasi" >

							<div class="invalid-feedback">
								Kode Lokasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Lokasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_lokasi" required="">

							<div class="invalid-feedback">
								Nama Lokasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Keterangan</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="keterangan" required="">

							<div class="invalid-feedback">
								Keterangan Tidak Boleh Kosong
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
