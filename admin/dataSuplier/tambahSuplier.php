<?php

	include "../koneksi.php";

	$query =" SELECT max(kode_suplier) as maxKode FROM tbsuplier";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeSuplier = $data['maxKode'];
	$noUrut = (int) substr($kodeSuplier,3,3);
	$noUrut ++ ;
	$char = "SUP" ;
	$kodeSuplier = $char . sprintf("%03s" , $noUrut);

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_suplier = $_POST['kode_suplier'];
		$nama_suplier = $_POST['nama_suplier'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];


		$simpan = mysqli_query($koneksi, "INSERT INTO tbsuplier VALUES ('$kode_suplier',
			'$nama_suplier', '$alamat','$no_telp')");

		echo "
			<script>
				window.alert('Data Berhasil Disimpan')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataSuplier'>
		"	;
	}

?>


<div class=" col-sm-8">

	<div class="card">

		<form class="needs-validation" method="POST" novalidate="">
			
			<div class="card-header">

				<h4>Tambah Suplier</h4>
				
			</div>

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Suplier</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $kodeSuplier 
							?>" name="kode_suplier" readonly>

							<div class="invalid-feedback">
								Kode Suplier Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Suplier</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_suplier" required="">

							<div class="invalid-feedback">
								Nama Suplier Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Alamat</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="alamat" required="">

							<div class="invalid-feedback">
								Alamat Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">No Telp</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="no_telp" required="">

							<div class="invalid-feedback">
								No Telp Tidak Boleh Kosong
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
