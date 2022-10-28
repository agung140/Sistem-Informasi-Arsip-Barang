<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Data Pembelian barang</h4>
			</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover"id="tableExport" style="width: 100%;">
							<div class="text-left-mb-4">

								<ul>
									<ul>
										<a href="?hal=tambahPembelianBarang" class="btn btn-primary pull-right">Tambah Pembelian Barang</a>
									</ul>
									
								</ul>
								
								
							</div>

								<thead>
									
									<?php

										include "../koneksi.php";
										$query = mysqli_query($koneksi,"SELECT * FROM tbpembelian");

									?>

									<tr>
									<th>Kode Pembelian</th>
									<th>Tanggal Pembelian</th>
									<th>Total Barang</th>
									<th>Total Harga</th>
									<th>Kode Suplier</th>
									<th>Id User</th>
									<th>Aksi</th>
									</tr>

								</thead>
								<tbody>

									<?php

										while($data = mysqli_fetch_array($query)){

										
									?>

									<tr>
										
										<td><?php echo $data['kode_pembelian']?></td>
										<td><?php echo $data['tanggal_pembelian']?></td>
										<td><?php echo $data['total_barang']?></td>
										<td><?php echo $data['total_harga']?></td>
										<td><?php echo $data['kode_suplier']?></td>
										<td><?php echo $data['id_user']?></td>
										
										<td>
										<a href="beranda.php?hal=detailPembelianBarang&kode_pembelian=<?php echo $data['kode_pembelian']?>" class="btn btn-info">Detail</a>
										
										<a href="dataPembelianBarang/hapusPembelianBarang.php?kode_pembelian=<?php echo$data['kode_pembelian'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
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