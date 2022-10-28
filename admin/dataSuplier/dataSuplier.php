<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Suplier</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahSuplier" class="btn btn-primary pull-right">Tambah Suplier</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbsuplier");

									?>

									<tr>
									<th>Kode Suplier</th>
									<th>Nama Suplier</th>
									<th>Alamat</th>
									<th>No Telp</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_suplier']?></td>
										<td><?php echo $data['nama_suplier']?></td>
										<td><?php echo $data['alamat']?></td>
										<td><?php echo $data['no_telp']?></td>
										
										<td>
										<a href="beranda.php?hal=ubahSuplier&kode_suplier=<?php echo $data['kode_suplier']?>" class="btn btn-info">Ubah</a>
										
										<a href="dataSuplier/hapusSuplier.php?kode_suplier=<?php echo$data['kode_suplier'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
										</td>
									</tr>

								<?php
								}

								?>
									
								</tbody>
							
						</table>
						
					</div>
					
				</div>

		</div>
		
	</div>
	
</div> 