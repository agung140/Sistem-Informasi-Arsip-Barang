<?php
	include "../koneksi.php";

	error_reporting(0);

	$tanggalSekarang = date("d-m-y");
	$today=date("ymd");
	$query = "SELECT MAX(RIGHT(kode_pembelian,12)) as akhir from tbpembelian where RIGHT(kode_pembelian,12) LIKE '$today%'";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$noAkhirBeli = $data['akhir'];
	$noAkhirUrut = substr($noAkhirBeli,8,4);
	$noUrutSelanjutnya = $noAkhirUrut +1;
	$noBeliSelanjutnya = $today. sprintf('%04s',$noUrutSelanjutnya);
	$Kode = "P";
	$no_baru = $Kode.$noBeliSelanjutnya;

	

	$queryi =mysqli_query($koneksi, "SELECT max(id) as maxkode from tbdetailpembelian") ;
	$datai = mysqli_fetch_array($queryi);
	$coba = $datai['maxkode'];
	$hmm = (int) substr($coba, 0);
	$nmr = $hmm++;
	$noid = $nmr +1;

	$hitungBarang = "SELECT SUM(jumlah_beli) as jumlah_beli FROM tbsementara";
	$hasilHitung = @mysqli_query($koneksi,$hitungBarang) or die(mysqli_error());
	$jumlahBarang = mysqli_fetch_array($hasilHitung);


	$hitungHarga = "SELECT SUM(jumlah_harga) as jumlah_harga FROM tbsementara";
	$hasilHarga = @mysqli_query($koneksi,$hitungHarga) or die(mysqli_error());
	$jumlahHarga = mysqli_fetch_array($hasilHarga);


	if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['tambah'])){
		$id = $_POST['id'];
		$kode_pembelian = $_POST['kode_pembelian'];
		$kode_barang = $_POST['kode_barang'];
		$harga_beli = $_POST['harga_beli'];
		$jumlah_beli = $_POST['jumlah_beli'];
		$jumlah_harga = $harga_beli * $jumlah_beli;

		if(empty($harga_beli)||empty($jumlah_beli)){
			echo "<script>window.alert(Harga / Jumlah beli Jangan Kosong !!)</script>";
	
		}else{

			$cekData= "SELECT kode_barang FROM tbsementara where kode_barang= '$kode_barang'";

			$ada= mysqli_query($koneksi,$cekData) or die(mysqli_error());

			if (mysqli_num_rows($ada) > 0) {
				$ubah = mysqli_query($koneksi, "UPDATE tbsementara set jumlah_beli='$jumlah_beli'+ jumlah_beli, jumlah_harga= harga_beli * jumlah_beli where kode_barang='$kode_barang'");
				$simpandetail = mysqli_query($koneksi, "INSERT INTO tbdetailpembelian VALUES('$id', '$kode_pembelian','$kode_barang',
					'$harga_beli', '$jumlah_beli', '$jumlah_harga')");

			}else{
				$simpan = mysqli_query($koneksi, "INSERT INTO tbsementara VALUES('$id', '$kode_pembelian','$kode_barang',
					'$harga_beli', '$jumlah_beli', '$jumlah_harga')");
				$simpandetail = mysqli_query($koneksi, "INSERT INTO tbdetailpembelian VALUES('$id', '$kode_pembelian','$kode_barang',
					'$harga_beli', '$jumlah_beli', '$jumlah_harga')");



			echo "
				<script>
				window.alert('Data Berhasil Disimpan')
				</script>
			"	;

			echo "

				<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=tambahPembelianBarang'>
			"	;

			}
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['simpan'])){
		
		$kode_pembelian = $_POST['kode_pembelian'];
		$total_barang = $_POST['total_barang'];
		$total_harga = $_POST['total_harga'];
		$kode_suplier = $_POST['kode_suplier'];
		$id_user = $_POST['id_user'];



		$cekData= "SELECT kode_pembelian FROM tbpembelian where kode_pembelian= '$kode_pembelian'";

			$ada= mysqli_query($koneksi,$cekData) or die(mysqli_error());

			if (mysqli_num_rows($ada) > 0) {
				$apdet = mysqli_query($koneksi, "UPDATE tbpembelian set tanggal_pembelian='$today',total_barang='$total_barang' +total_barang,total_harga='$total_harga' +total_harga,kode_suplier='$kode_suplier',id_user='$id_user' where kode_pembelian='$kode_pembelian'");
				
				$hapusTMP = mysqli_query($koneksi,"DELETE FROM tbsementara") or die(mysqli_error());
				
			}else{
				$simpan = mysqli_query($koneksi, "INSERT INTO tbpembelian VALUES ('$kode_pembelian','$today','$total_barang', '$total_harga','$kode_suplier','$id_user')");
				
				$hapusTMP = mysqli_query($koneksi,"DELETE FROM tbsementara") or die(mysqli_error());

			}
		
		
		echo "
			<script>
				window.alert('Data TRansaksi Berhasil Disimpan')
			</script>
		"	;

		echo "

			<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=dataPembelianBarang'>
		"	;
	}

?>

<div class="col-sm-12">
	<div class="card">
		<form class="need-validation " method="post" novalidate="">
			<div class="card-header">
				<h4>Tambah Pembelian Barang</h4>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
					
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								ID 
							</label>
							<div class="col-sm-6">
								<input type="text" name="id" value="<?php echo $noid ?>" class="form-control" >
								<div class="invalid-feedback">
									Kode Pembelian tidak Boleh Kosong
								</div>
							</div>
						</div>

					
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Kode Pembelian
							</label>
							<div class="col-sm-6">
								<input type="text" name="kode_pembelian" value="<?php echo $no_baru ?>" class="form-control" >
								<div class="invalid-feedback">
									Kode Pembelian tidak Boleh Kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Barang
							</label>
							<div class="col-sm-6">
								
								
								<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' name='kode_barang'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tbbarang");
							while ($x = mysqli_fetch_array($tampil)) {
								echo"<option value = '$x[kode_barang]'>$x[nama_barang]</option>";

								# code...
							}
							echo "</select>";
							?>
								
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Harga Beli        
							</label>
							<div class="col-sm-5">
								<input type="number" name="harga_beli" class="form-control">
								<div class="invalid-feedback">
									Harga Beli tidak Boleh Kosong
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Jumlah Beli        
							</label>
							<div class="col-sm-5">
								<input type="number" name="jumlah_beli" class="form-control">
								<div class="invalid-feedback">
									Jumlah Beli tidak Boleh Kosong
								</div>

							</div>

							<div class="col-sm-4">
								<button name="tambah" class="btn btn-info">Tambah</button>
							</div>
							
						</div>

						</div>
<!------------------------------------------------------------------------------------------------------------------->
					<div class="col-sm-6">
					<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Tanggal Pembelian
							</label>
							<div class="col-sm-6">
								<input type="text" name="tanggal_pembelian" value="<?php echo $tanggalSekarang ?>" class="form-control" >
								<div class="invalid-feedback">
									Tanggal Pembelian tidak Boleh Kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Supplier
							</label>
							<div class="col-sm-6">
								
								
								<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' name='kode_suplier'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tbsuplier");
							while ($x = mysqli_fetch_array($tampil)) {
								echo"<option value = '$x[kode_suplier]'>$x[nama_suplier]</option>";

								# code...
							}
							echo "</select>";
							?>
								
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Total Barang        
							</label>
							<div class="col-sm-5">
								<input type="number" name="total_barang" class="form-control" value="<?php echo $jumlahBarang['jumlah_beli']?>" readonly>
								<div class="invalid-feedback">
									Total Barang tidak Boleh Kosong
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Total Harga        
							</label>
							<div class="col-sm-5">
								<input type="number" name="total_harga" class="form-control" value="<?php echo $jumlahHarga['jumlah_harga']?>" readonly>
								<div class="invalid-feedback">
									Total Harga tidak Boleh Kosong
								</div>
							</div>
							
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Admin
							</label>
							<div class="col-sm-5">
								<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' name='id_user'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tbuser");
							while ($x = mysqli_fetch_array($tampil)) {
								echo"<option value = '$x[id_user]'>$x[nama_user]</option>";

								# code...
							}
							echo "</select>";
							?>
								
								
							</div>
						</div>		

					</div>						
<!-------------------------------------------------------------------------------------------------------------------->
			
					<div class="table-responsive">
						<table class="table table-striped table-hover" style="width: 100%;">
							<div class="text-left-mb-4">
							
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbsementara left join tbbarang on tbsementara.kode_barang=tbbarang.kode_barang");

									?>

									<tr>
									<th>Kode Barang</th>
									<th>Harga Beli</th>
									<th>Jumlah Beli</th>
									<th>Jumlah Harga</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['nama_barang']?></td>
										<td><?php echo number_format($data['harga_beli'])?></td>
										<td><?php echo number_format($data['jumlah_beli'])?></td>
										<td><?php echo number_format($data['jumlah_harga'])?></td>
										
										<td>
																				
										<a href="dataPembelianBarang/hapusHalamanPembelian.php?id=<?php echo$data['id'] ?>" class="btn btn-danger">Hapus</a>
										</td>
									</tr>

								<?php
								}

								?>
									
							</tbody>
							
						</table>

						<button class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
						
					</div>

				</div>

			</div>

		</form>

	</div>
	
</div>