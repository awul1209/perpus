<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Peminjaman</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-peminjaman" class="btn" style="background-color: #00933d; color: #fff">
					<i class="fa fa-edit"></i> Tambah Data Peminjaman</a>
			</div>
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
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
     $no = 1;
     $sql = $koneksi->query('SELECT id_pm,nama_anggota,judul_buku,tgl_pinjam,tgl_kembali FROM peminjaman
 JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
 JOIN buku ON peminjaman.id_buku=buku.id_buku WHERE peminjaman.status=1 ORDER BY id_pm DESC');
     while ($data = $sql->fetch_assoc()) { ?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_pm']; ?>
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
                        <?php
                        $tgl_sekarang=date('Y-m-d');
                        $tgl_kembali=$data['tgl_kembali'];
                         if($tgl_kembali > $tgl_sekarang){ ?>
						<td>
                        <button class="btn btn-success btn-sm" title="kembalikan" type="submit" name="kembalikan">Dipinjam</button>
						</td>
                        <?php }else{ ?>
                        <td>
                        <button class="btn btn-danger btn-sm" title="kembalikan" type="submit" name="kembalikan">Telat</button>
                        </td>
                        <?php } ?>
						<td>
                            <form action="" method="post">
                                <input type="hidden" name="id_pmk" value="<?php echo $data['id_pm']; ?>">
                                <button class="btn btn-primary btn-sm" title="kembalikan" type="submit" name="kembalikan">Kembalikan</button>
                            </form>
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

	// update buku
    $query_buku=mysqli_query($koneksi,"SELECT SUM(jumlah) as jumlah FROM buku WHERE id_buku='$id_buku'");
    $row_buku=mysqli_fetch_assoc($query_buku);
    $jumlah_buku=$row_buku['jumlah'];
    $jumlah_buku+=1;
	mysqli_query($koneksi,"UPDATE buku set jumlah='$jumlah_buku' WHERE id_buku='$id_buku'");

	// update pinjam
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
                        document.location.href='?page=data-pengembalian';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Data Gagal Dikembalikan',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        document.location.href='?page=data-pengembalian';
                    }
                })</script>";
    }
}


?>