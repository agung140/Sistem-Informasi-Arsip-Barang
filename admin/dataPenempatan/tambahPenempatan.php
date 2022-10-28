<?php
	include "../koneksi.php";

	error_reporting(0);

	$tanggalSekarang = date("d-m-y");
	$today=date("dmy");
	$query = "SELECT MAX(RIGHT(kode_penempatan,10)) as akhir from tbpenempatan where RIGHT(kode_penempatan ,10) LIKE '$today%'";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$noAkhirBeli = $data['akhir'];
	$noAkhirUrut = substr($noAkhirBeli,8,4);
	$noUrutSelanjutnya = $noAkhirUrut +1;
	$noBeliSelanjutnya = $today. sprintf('%04s',$noUrutSelanjutnya);
	$Kode = "P";
	$no_baru = $Kode.$noBeliSelanjutnya;




	if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['tambah'])){

		$kode_penempatan = $_POST['kode_penempatan'];
		$kode_barang = $_POST['kode_barang'];
		$kode_lokasi = $_POST['kode_lokasi'];
		$id_user = $_POST['id_user'];

		

				$simpan = mysqli_query($koneksi, "INSERT INTO tbpenempatan VALUES ('$kode_penempatan', '$today','$kode_barang','$kode_lokasi',1,'Baik','$id_user')");


			echo "
				<script>
				window.alert('Data Berhasil Disimpan')
				</script>
			"	;

			echo "

				<meta http-equiv = 'refresh' content = '0; url=beranda.php?hal=tambahPenempatan'>
			"	;
 
 }

?>

<div class="col-sm-12">
	<div class="card">
		<form class="need-validation " method="post" novalidate="">
			<div class="card-header">
				<h4>Tambah Penempatan Barang</h4>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
					
						
					
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Kode Penempatan
							</label>
							<div class="col-sm-6">
								<input type="text" name="kode_penempatan" value="<?php echo $no_baru ?>" class="form-control" readonly >
								<div class="invalid-feedback">
									Kode Penempatan tidak Boleh Kosong
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

							<div class="col-sm-3">
								<button name="tambah" class="btn btn-info">Tambah</button>
							</div>
						</div>
							
							
						

					</div>
<!------------------------------------------------------------------------------------------------------------------->
					<div class="col-sm-6">
					
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Lokasi
							</label>
							<div class="col-sm-6">
								
								
								<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' name='kode_lokasi'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tblokasi");
							while ($x = mysqli_fetch_array($tampil)) {
								echo"<option value = '$x[kode_lokasi]'>$x[nama_lokasi]</option>";

								# code...
							}
							echo "</select>";
							?>
								
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Admin
							</label>
							<div class="col-sm-5">
								<?php
							include"../koneksi.php";
							echo "<select class= 'form-control' readonly name='id_user'>";
							$tampil = mysqli_query($koneksi,"SELECT * FROM tbuser");
							while ($x = mysqli_fetch_array($tampil)) {
								echo"<option value = '$x[id_user]'>$x[nama_user]</option>";

								# code...
							}
							echo "</select>" ;
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
										$query = mysqli_query($koneksi,"SELECT * FROM tbpenempatan left join tbbarang on tbpenempatan.kode_barang=tbbarang.kode_barang left join tblokasi on tbpenempatan.kode_lokasi=tblokasi.kode_lokasi");

									?>

									<tr>
									<th>Kode Penempatan</th>
									<th>Nama Barang</th>
									<th>Nama Lokasi</th>
									<th>Kondisi Barang</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										<td><?php echo $data['kode_penempatan']?></td>
										<td><?php echo $data['nama_barang']?></td>
										<td><?php echo $data['nama_lokasi']?></td>
										<td><?php echo $data['kondisi']?></td>
										
										<td>
																				
										<a href="dataPenempatan/hapusPenempatan.php?kode_penempatan=<?php echo$data['kode_penempatan'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
										</td>
									</tr>

								<?php
								}

								?>
									
							</tbody>
							
						</table>

						<a href="?hal=dataPenempatan" class="btn btn-primary">Kembali</a>
						
					</div>

				</div>

			</div>

		</form>

	</div>
	
</div>