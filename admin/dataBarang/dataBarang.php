<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Barang</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahBarang" class="btn btn-primary pull-right">Tambah Barang</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbbarang left join tbkategori on tbbarang.kategori = tbkategori.kode_kategori");

									?>

									<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Kategori</th>
									<th>Kondisi</th>
									<th>Merk</th>
									<th>Satuan</th>
									<th>Jumlah</th>
									<th>Tanggal</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_barang']?></td>
										<td><?php echo $data['nama_barang']?></td>
										<td><?php echo $data['nama_kategori']?></td>
										<td><?php echo $data['kondisi']?></td>
										<td><?php echo $data['merk']?></td>
										<td><?php echo $data['satuan']?></td>
										<td><?php echo $data['stok']?></td>
										<td><?php echo $data['tanggal']?></td>
										<td>

										<a href="beranda.php?hal=ubahBarang&kode_barang=<?php echo $data['kode_barang']?>" class="btn btn-info">Ubah</a>
										
										<a href="dataBarang/hapusBarang.php?kode_barang=<?php echo$data['kode_barang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
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
