<?php

	include "../koneksi.php";

	$kode_lokasi = $_GET['kode_lokasi'];

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_lokasi = $_POST['kode_lokasi'];
		$nama_lokasi = $_POST['nama_lokasi'];
		$keterangan = $_POST['keterangan'];


		$simpan = mysqli_query($koneksi, "UPDATE tblokasi set nama_lokasi='$nama_lokasi', keterangan='$keterangan' where kode_lokasi='$kode_lokasi'");

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

				<h4>Ubah Lokasi</h4>
				
			</div>

			<?php

				$queryubah= mysqli_query($koneksi, "SELECT * FROM tblokasi where kode_lokasi='$kode_lokasi'");
				while($data=mysqli_fetch_array($queryubah)){

			?>

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Lokasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $data['kode_lokasi']?>" name="kode_lokasi" readonly >

							<div class="invalid-feedback">
								Kode Lokasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Lokasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_lokasi" value="<?php echo $data['nama_lokasi']?>" required="">

							<div class="invalid-feedback">
								Nama Lokasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Keterangan</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']?>" required="">

							<div class="invalid-feedback">
								Keterangan Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="card-footer">
						<button class="btn btn-primary pull-right" id="swal-2" >Ubah</button>
						
					</div>

				</div>

		</form>

		<?php
		}
		?>
		
	</div>
	
</div>
