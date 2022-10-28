<?php
include "../koneksi.php";

$kode_pembelian = $_GET['kode_pembelian'];
$x = mysqli_query($koneksi, "SELECT*FROM tbpembelian left join tbdetailpembelian on tbpembelian.kode_pembelian = tbdetailpembelian.kode_pembelian left join tbsuplier on tbpembelian.kode_suplier = tbsuplier.kode_suplier where tbpembelian.kode_pembelian = '$kode_pembelian'");

$data = mysqli_fetch_array($x);

?>

<div class="col-sm-12">
	<div class="card">
		<form class="need-validation " method="post" novalidate="">
			<div class="card-header">
				<h4>Detail Pembelian Barang</h4>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
					
					
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Kode Pembelian
							</label>
							<div class="col-sm-6">
								<input type="text" name="" value="<?php echo $data['kode_pembelian'] ?>" class="form-control" readonly >
								<div class="invalid-feedback">
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Suplier        
							</label>
							<div class="col-sm-5">
								<input type="text" name="" readonly="" value="<?php echo $data['nama_suplier']; ?>" class="form-control">
								<div class="invalid-feedback">
									
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Nama Admin        
							</label>
							<div class="col-sm-9">
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
<!------------------------------------------------------------------------------------------------------------------->
					<div class="col-sm-6">
					<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Tanggal Pembelian
							</label>
							<div class="col-sm-6">
								<input type="text" name="tanggal_pembelian" value="<?php echo $data['tanggal_pembelian'] ?>" class="form-control" readonly>
								<div class="invalid-feedback">
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Total Barang        
							</label>
							<div class="col-sm-5">
								<input type="number" name="total_barang" class="form-control" value="<?php echo $data['total_barang']?>" readonly>
								<div class="invalid-feedback">
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">
								Total Harga        
							</label>
							<div class="col-sm-5">
								<input type="number" name="total_harga" class="form-control" value="<?php echo $data['total_harga']?>" readonly>
								<div class="invalid-feedback">
								</div>
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
										$query = mysqli_query($koneksi,"SELECT * FROM tbdetailpembelian left join tbbarang on tbdetailpembelian.kode_barang=tbbarang.kode_barang");

									?>

									<tr>
									<th>Kode Barang</th>
									<th>Harga Beli</th>
									<th>Jumlah Beli</th>
									<th>Jumlah Harga</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['nama_barang']?></td>
										<td><?php echo number_format($data['harga_barang'])?></td>
										<td><?php echo number_format($data['jumlah_beli'])?></td>
										<td><?php echo number_format($data['jumlah_harga'])?></td>
										
										
									</tr>

								<?php
								}

								?>
									
							</tbody>
							
						</table>

						
						<a href="beranda.php?hal=dataPembelianBarang" class="btn btn-primary">Kembali</a>
						
					</div>

				</div>

			</div>

		</form>

	</div>
	
</div>