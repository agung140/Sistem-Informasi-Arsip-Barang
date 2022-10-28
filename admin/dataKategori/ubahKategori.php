<?php

	include "../koneksi.php";

	$kode_kategori = $_GET['kode_kategori'];



	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_kategori = $_POST['kode_kategori'];
		$nama_kategori = $_POST['nama_kategori'];


		$ubah = mysqli_query($koneksi, "UPDATE tbkategori SET nama_kategori ='$nama_kategori' where kode_kategori='$kode_kategori'");

		echo "
			<script>
				window.alert('Data Berhasil di Ubah')
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

			<?php

				$queryubah= mysqli_query($koneksi, "SELECT * FROM tbkategori where kode_kategori='$kode_kategori'");
				while($data=mysqli_fetch_array($queryubah)){

			?>




				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Kategori</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" value="<?php echo $data['kode_kategori']?>" name="kode_kategori" readonly >

							<div class="invalid-feedback">
								Kode Kategori Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Kategori</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori']?>" required="">

							<div class="invalid-feedback">
								Nama Kategori Tidak Boleh Kosong
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
