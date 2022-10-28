<?php

	include "../koneksi.php";

	$query =" SELECT max(kode_kasi) as maxKode FROM tbkasi";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeKasi = $data['maxKode'];
	$noUrut = (int) substr($kodeKasi,3,3);
	$noUrut ++ ;
	$char = "KSI" ;
	$kodeKasi = $char . sprintf("%03s" , $noUrut);

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_kasi = $_POST['kode_kasi'];
		$nama_kasi = $_POST['nama_kasi'];
		$no_hp = $_POST['no_hp'];
		$nama_pejabat = $_POST['nama_pejabat'];


		$simpan = mysqli_query($koneksi, "INSERT INTO tbkasi VALUES ('$kode_kasi',
			'$nama_kasi','$no_hp','$nama_pejabat')");

		echo "
			<script>
				window.alert('Data Berhasil Disimpan')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataKasi'>
		"	;
	}

?>


<div class=" col-sm-8">

	<div class="card">

		<form class="needs-validation" method="POST" novalidate="">
			
			<div class="card-header">

				<h4>Tambah Kasi</h4>
				
			</div>

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Kasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="kode_kasi" value="<?php echo $kodeKasi?>" readonly >

							<div class="invalid-feedback">
								Kode Kasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Kasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_kasi" required="">

							<div class="invalid-feedback">
								Nama Kasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">No. Handphone</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="no_hp" required="">

							<div class="invalid-feedback">
								No Handphone Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Pejabat</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_pejabat" required="">

							<div class="invalid-feedback">
								Nama Pejabat Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="card-footer">
						<button class="btn btn-primary pull-right">Simpan</button>
						
					</div>

				</div>

		</form>
		
	</div>
	
</div>
