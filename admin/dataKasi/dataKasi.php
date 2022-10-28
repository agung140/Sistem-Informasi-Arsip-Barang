<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Kasi</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahKasi" class="btn btn-primary pull-right">Tambah Kasi</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbkasi");

									?>

									<tr>
									<th>Kode Kasi</th>
									<th>Nama Kasi</th>
									<th>No. Handphone</th>
									<th>Nama Pejabat</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_kasi']?></td>
										<td><?php echo $data['nama_kasi']?></td>
										<td><?php echo $data['no_hp']?></td>
										<td><?php echo $data['nama_pejabat']?></td>
										<td>

										<a href="beranda.php?hal=ubahKasi&kode_kasi=<?php echo $data['kode_kasi']?>" class="btn btn-info">Ubah</a>
										
										<a href="dataKasi/hapusKasi.php?kode_kasi=<?php echo$data['kode_kasi'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
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