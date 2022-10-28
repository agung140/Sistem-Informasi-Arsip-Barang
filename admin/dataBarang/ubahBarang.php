<?php

	include "../koneksi.php";

	$kode_barang = $_GET['kode_barang'];

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_barang = $_POST['kode_barang'];
		$nama_barang = $_POST['nama_barang'];
		$kode_kategori = $_POST['kode_kategori'];
		$kondisi = $_POST['kondisi'];
		$merk = $_POST['merk'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];


		$simpan = mysqli_query($koneksi, "UPDATE tbbarang SET nama_barang='$nama_barang',kategori='$kode_kategori',kondisi='$kondisi',merk='$merk',satuan='$satuan',stok='$stok' where kode_barang='$kode_barang'");

		echo "
			<script>
				window.alert('Data Berhasil Diubah')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataBarang'>
		"	;
	}

?>


<div class=" col-sm-8">

	<div class="card">

		<form class="needs-validation" method="POST" novalidate="">
			
			<div class="card-header">

				<h4>Tambah Barang</h4>
				
			</div>

			<?php

				$qubah= mysqli_query($koneksi, "SELECT * FROM tbbarang where kode_barang='$kode_barang'");
				while($data=mysqli_fetch_array($qubah)){

			?>


				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Barang</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="kode_barang" value="<?php echo $data['kode_barang']?>" readonly >

							<div class="invalid-feedback">
								Kode Barang Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Barang</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang']?>"required="">

							<div class="invalid-feedback">
								Nama Barang Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kategori Barang</label>

						<div class="col-sm-9">
							
							<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' name='kode_kategori'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tbkategori");
							while ($x = mysqli_fetch_array($tampil)){
								if ($data['kategori']==$x['kode_kategori']) {
									echo"<option value = '$data[kategori]' selected >$x[nama_kategori]</option>";
								}else{
									echo"<option value = '$data[kategori]'>$x[nama_kategori]</option>";
								}

								
							}

							echo "</select>";
							?>
						
						</div>
						</div>

						<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kondisi</label>

						<div class="col-sm-9">
							
							<select class="form-control" name="kondisi">
								<option value="Baik">Baik</option>
								<option value="Rusak">Rusak</option>
							</select>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Merk</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="merk" value="<?php echo $data['merk']?>" required="">

							<div class="invalid-feedback">
								Merk Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Satuan</label>

						<div class="col-sm-9">
							
							<select class="form-control" name="satuan">
								<option alue="<?php echo $data['satuan']?>"><?php echo $data['satuan']?></option>
								<option value="Unit">Unit</option>
								<option value="Pcs">Pcs</option>
								<option value="Box">Box</option>
								<option value="Lainnya">Lainnya</option>
							</select>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Stok</label>

						<div class="col-sm-9">
							
							<input type="number" class="form-control" name="stok" value="<?php echo $data['stok']?>" required="">

							<div class="invalid-feedback">
								Stok Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Masuk Barang</label>
                      <div class="col-sm-9">
                      	<input type="date" class="form-control" name="tanggal" required="">
                      	
                      	<div class="invalid-feedback">
                      		Tanggal Tidak Boleh Kosong
                      		
                      	</div>

                      </div>
                      
                    </div>
	



						<div class="card-footer">
						<button class="btn btn-primary pull-right">Simpan</button>
						
					</div>

				</div>

		</form>

		<?php
			}
		?>
		
	</div>
	
</div>
