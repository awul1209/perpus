<?php

if (isset($_POST['btnCetak'])) {
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
}
if ($dari == '' && $sampai == '') {
    $result = mysqli_query($koneksi, 'SELECT id_pm,nama_anggota,judul_buku,tgl_pinjam,tgl_kembali FROM peminjaman
 JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
 JOIN buku ON peminjaman.id_buku=buku.id_buku WHERE status=1 ORDER BY id_pm DESC');
} else {
    $result = mysqli_query(
        $koneksi,
        "SELECT id_pm,nama_anggota,judul_buku,tgl_pinjam,tgl_kembali FROM peminjaman
 JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
 JOIN buku ON peminjaman.id_buku=buku.id_buku WHERE status=1 and
    tgl_pinjam BETWEEN '$dari' and '$sampai'"
    );
}

$tanggal = date('m/y');
$tgl = date('d/m/y');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK</title>
</head>

<body>
<div class="kotak-header" style="display: flex; justify-content: space-around; border-bottom: 1px solid black;">
<div class="logo" style="width: 110px;">
<!-- <img src="dist/img/Logofp.jpg" alt="" style="width: 100px;;"> -->
</div>

<div class="text" style="text-align: center;">
<h2>LAPORAN PEMINJAMAN BUKU</h2>
		<h3>KEJAKSAAN NEGERI SUMENEP</h3>
		
</div>

<div class="logo" style="width: 110px;">
<!-- <img src="dist/img/unija.png" alt="" style="width: 95px; height: 94px;"> -->
</div>
</div>

		<table class="table table-bordered">
				
                     <tr>
					 <th>No</th>
						<th>Kode</th>
						<th>Peminjaman</th>
						<th>Buku</th>
						<th>Tgl Pinjam</th>
						<th>Tgl Kembali</th>
					</tr>
					<?php
     $no = 1;

     while ($data = mysqli_fetch_assoc($result)) { ?>

					<tr>
					<td>
							<?php echo $no; ?>
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
					</tr>

					<?php }
     ?>
			</table>
	<br>
	<br>
	<br>
	<br>
	<br>
        <div class="kotak" style="padding: 10px; box-sizing: border-box; display: flex; justify-content: right;">
        <div class="kanan">
        <p style="text-align: center;">
		Sumenep,
		<?php echo $tgl; ?>
        <br>      Mengetahui,
		<br> Kepala Perpustakaan
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>     ............................
	</p>
        </div>
        </div>


	<script>
		window.print();
	</script>

</body>

</html>
<?php die(); ?>
