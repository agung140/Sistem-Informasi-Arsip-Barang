<?php

	include "../koneksi.php";

	$query =" SELECT max(kode_barang) as maxKode FROM tbbarang";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeBarang = $data['maxKode'];
	$noUrut = (int) substr($kodeBarang,3,3);
	$noUrut ++ ;
	$char = "BRG" ;
	$kodeBarang = $char . sprintf("%03s" , $noUrut);

	if($_SERVER['REQUEST_METHOD']=="POST"){
		include "../koneksi.php";
		$kode_barang = $_POST['kode_barang'];
		$nama_barang = $_POST['nama_barang'];
		$kode_kategori = $_POST['kode_kategori'];
		$kondisi = $_POST['kondisi'];
		$merk = $_POST['merk'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tanggal= $_POST['tanggal'];


		$simpan = mysqli_query($koneksi, "INSERT INTO tbbarang VALUES ('$kode_barang',
			'$nama_barang','$kode_kategori','$kondisi','$merk','$satuan','$stok','$tanggal')");

		echo "
			<script>
				window.alert('Data Berhasil Disimpan')
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

				<div class="card-body">

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Kode Barang</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="kode_barang" value="<?php echo $kodeBarang?>" readonly >

							<div class="invalid-feedback">
								Kode Barang Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Nama Barang</label>

						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="nama_barang" required="">

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
							while ($data = mysqli_fetch_array($tampil)) {
								echo"<option value = '$data[kode_kategori]'>$data[nama_kategori]</option>";

								# code...
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
							
							<input type="text" class="form-control" name="merk" required="">

							<div class="invalid-feedback">
								Merk Tidak Boleh Kosong
							</div>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Satuan</label>

						<div class="col-sm-9">
							
							<select class="form-control" name="satuan">
								<option value="Unit">Unit</option>
								<option value="Pcs">Pcs</option>
								<option value="Box">Box</option>
								<option value="Lainnya">Lainnya</option>
							</select>

						</div>
						
					</div>

					<div class="form-group row">

						<label class="col-sm-3 col-form-label">Jumlah</label>

						<div class="col-sm-9">
							
							<input type="number" class="form-control" name="stok" required="">

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
		
	</div>
	
</div>

