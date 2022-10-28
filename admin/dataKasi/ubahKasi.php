<?php

	include "../koneksi.php";

	$kode_kasi = $_GET['kode_kasi'];



	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_kasi = $_POST['kode_kasi'];
		$nama_kasi = $_POST['nama_kasi'];
		$no_hp = $_POST['no_hp'];
		$nama_pejabat = $_POST['nama_pejabat'];

		$simpan = mysqli_query($koneksi, "UPDATE tbkasi SET nama_kasi='$nama_kasi',no_hp='$no_hp',nama_pejabat='$nama_pejabat' where kode_kasi='$kode_kasi'");

		echo "
			<script>
				window.alert('Data Berhasil di Ubah')
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

				<h4>Ubah Kasi</h4>
				
			</div>

			<?php

				$queryubah= mysqli_query($koneksi, "SELECT * FROM tbkasi where kode_kasi='$kode_kasi'");
				while($data=mysqli_fetch_array($queryubah)){

			?>




				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Kasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $data['kode_kasi']?>" name="kode_kasi" readonly >

							<div class="invalid-feedback">
								Kode Kasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Kasi</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_kasi" value="<?php echo $data['nama_kasi']?>" required="">

							<div class="invalid-feedback">
								Nama Kasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">No. Handphone</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']?>" required="">

							<div class="invalid-feedback">
								No Handphone Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Pejabat</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_pejabat" value="<?php echo $data['nama_pejabat']?>" required="">

							<div class="invalid-feedback">
								Nama Kasi Tidak Boleh Kosong
							</div>

						</div>
						
					</div>
					
					<div class="card-footer">
						<button class="btn btn-primary pull-right">Ubah</button>	
					</div>
					

				</div>

		</form>
		
		<?php
			}
		?>


	</div>
	
</div>
