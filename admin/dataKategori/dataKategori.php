<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Kategori</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahKategori" class="btn btn-primary pull-right">Tambah Kategori</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbkategori");

									?>

									<tr>
									<th>Kode Kategori</th>
									<th>Nama Kategori</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_kategori']?></td>
										<td><?php echo $data['nama_kategori']?></td>
										<td>
										<a href="beranda.php?hal=ubahKategori&kode_kategori=<?php echo $data['kode_kategori']?>" class="btn btn-info">Ubah</a>
										
										<a href="dataKategori/hapusKategori.php?kode_kategori=<?php echo$data['kode_kategori'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
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