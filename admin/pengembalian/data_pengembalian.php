<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengembalian</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Peminjaman</th>
						<th>Buku</th>
						<th>Tgl Pinjam</th>
						<th>Tgl Kembali</th>
						<th>Tgl Dikembalikan</th>
					</tr>
				</thead>
				<tbody>

					<?php
     $no = 1;
     $sql = $koneksi->query('SELECT id_pengembalian,nama_anggota,judul_buku,tgl_pinjam,tgl_kembali,tgl_pengembalian FROM pengembalian
 JOIN anggota ON pengembalian.id_anggota=anggota.id_anggota
 JOIN buku ON pengembalian.id_buku=buku.id_buku  ORDER BY id_pengembalian DESC');
     while ($data = $sql->fetch_assoc()) { ?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_pengembalian']; ?>
						</td>
						<td>
							<?php echo $data['nama_anggota']; ?>
						</td>
						<td>
							<?php echo $data['judul_buku']; ?>
						</td>
						<td>
							<?php echo $data['tgl_pinjam']; ?>
						</td>
						<td>
							<?php echo $data['tgl_kembali']; ?>
						</td>
                        <td>
                        <?php echo $data['tgl_pengembalian']; ?>
                        </td>
					</tr>
					<?php } ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	</div>
	<!-- /.card-body -->

<?php
 if(isset($_POST['kembalikan'])){
    $id_pm=$_POST['id_pmk'];
    $query_pinjam=mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_pm='$id_pm'");
    $row=mysqli_fetch_assoc($query_pinjam);
    $id_anggota=$row['id_anggota'];
    $id_buku=$row['id_buku'];
    $tgl_pinjam=$row['tgl_pinjam'];
    $tgl_kembali=$row['tgl_kembali'];
    $update="UPDATE peminjaman set
    status = 0
    where id_pm='$id_pm'
    ";
    $sql_ubah=mysqli_query($koneksi,$update);
    mysqli_query($koneksi,"INSERT INTO pengembalian VALUES ('','$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali','$tgl_sekarang')");

    if ($sql_ubah) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Dikembalikan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        document.location.href='?page=data-peminjaman';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Data Gagal Dikembalikan',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        document.location.href='?page=data-peminjaman';
                    }
                })</script>";
    }
}


?>