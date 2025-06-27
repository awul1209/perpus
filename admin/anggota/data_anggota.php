<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Anggota</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-anggota" class="btn" style="background-color: #00933d; color:#fff;">
					<i class="fa fa-edit"></i> Tambah Data Anggota</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Jenis kelamin</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
     $no = 1;
     $sql = $koneksi->query('SELECT * FROM anggota ORDER BY id_anggota DESC');
     while ($data = $sql->fetch_assoc()) { ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_anggota']; ?>
						</td>
						<td>
							<?php echo $data['nama_anggota']; ?>
						</td>
						<td>
							<?php echo $data['jenis_kelamin']; ?>
						</td>

						<td>
							<a href="?page=edit-anggota&kode=<?php echo $data['id_anggota']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-anggota&kode=<?php echo $data[
           'id_anggota'
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