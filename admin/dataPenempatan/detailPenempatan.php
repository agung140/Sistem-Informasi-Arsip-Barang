<?php

	include "../koneksi.php";

	$kode_lokasi = $_GET['kode_lokasi'];

	$x= mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tblokasi where kode_lokasi='$kode_lokasi'"));

?>





<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Detail Penempatan Barang <span class="col-green"><?php echo $x['nama_lokasi'] ?></span></h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbpenempatan left join tbbarang on tbpenempatan.kode_barang=tbbarang.kode_barang where kode_lokasi='$kode_lokasi'");
									?>

									<tr>
									<th>Kode Barang</th>
									<th>Tanggal Penempatan</th>
									<th>Nama Barang</th>
									<th>Kondisi Barang</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){
											
										
									?>

									<tr>
										
										<td><?php echo $data['kode_barang']?></td>
										<td><?php echo $data['tanggal_penempatan']?></td>
										<td><?php echo $data['nama_barang']?></td>
										<td><?php echo $data['kondisi_barang']?></td>
										
										
									</tr>

								<?php
								}

								?>
									
								</tbody>
							
						</table>
						
					</div>

					<a href="?hal=dataPenempatan" class="btn btn-primary">Kembali</a>
					
				</div>

		</div>
		
	</div>
	
</div> 
