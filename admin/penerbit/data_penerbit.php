<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penerbit</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-penerbit" class="btn" style="background-color: #00933d; color : #fff;">
					<i class="fa fa-edit"></i> Tambah Data Penerbit</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Penerbit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
     $no = 1;
     $sql = $koneksi->query('SELECT * FROM penerbit ORDER BY id_penerbit DESC');
     while ($data = $sql->fetch_assoc()) { ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_penerbit']; ?>
						</td>
						<td>
							<a href="?page=edit-penerbit&kode=<?php echo $data['id_penerbit']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-penerbit&kode=<?php echo $data[
           'id_penerbit'
       ]; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php }
     ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	</div>
	<!-- /.card-body -->