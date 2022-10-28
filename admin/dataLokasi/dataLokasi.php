<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Lokasi</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahLokasi" class="btn btn-primary pull-right">Tambah Lokasi</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tblokasi");

									?>

									<tr>
									<th>Kode Lokasi</th>
									<th>Nama Lokasi</th>
									<th>Keterangan</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_lokasi']?></td>
										<td><?php echo $data['nama_lokasi']?></td>
										<td><?php echo $data['keterangan']?></td>
										
										<td>
										<a href="beranda.php?hal=ubahLokasi&kode_lokasi=<?php echo $data['kode_lokasi']?>" class="btn btn-info">Ubah</a>
										
										<a href="dataLokasi/hapusLokasi.php?kode_lokasi=<?php echo$data['kode_lokasi'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
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