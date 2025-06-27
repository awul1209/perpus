<?php

$sql = $koneksi->query('SELECT COUNT(id_anggota) as anggota from anggota');
while ($data = $sql->fetch_assoc()) {
    $anggota = $data['anggota'];
}

$sql = $koneksi->query('SELECT COUNT(id_buku) as buku from buku');
while ($data = $sql->fetch_assoc()) {
    $buku = $data['buku'];
}
$sql = $koneksi->query('SELECT COUNT(id_pm) as peminjaman from peminjaman WHERE status=1');
while ($data = $sql->fetch_assoc()) {
    $peminjaman = $data['peminjaman'];
}
$tgl_sekarang = date('Y-m-d');
?>

<div class="row">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box" style="background-color: #FEEDDB; color:#222;">
			<div class="inner">
				<h3 style="color: #00933d;">
					<?php echo $anggota; ?>
				</h3>
				<p style="color: #00933d; font-weight: bold; font-size: 22px;">Anggota</p>
			</div>
			<div class="icon">
			<i style="display: flex; justify-content: flex-start;"><img src="dist/img/ag.png" alt="" style="width: 150px;"></i>
			</div>
			<a href="?page=data-anggota" class="small-box-footer" style="background-color: #00933d;">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box" style="background-color: #FEEDDB; color:#222;">
			<div class="inner">
				<h3 style="color: #00933d;">
					<?php echo $buku; ?>
				</h3>

				<p style="color: #00933d; font-weight: bold; font-size: 22px;">Buku</p>
			</div>
			<div class="icon">
			<i style="display: flex; justify-content: flex-start;"><img src="dist/img/bk.png" alt="" style="width: 150px;"></i>
			</div>
			<a href="?page=data-buku" class="small-box-footer" style="background-color: #00933d;">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box" style="background-color: #FEEDDB; color:#222;">
			<div class="inner">
				<h3 style="color: #00933d;">
					<?php echo $peminjaman; ?>
				</h3>

				<p style="color: #00933d; font-weight: bold; font-size: 22px;">Peminjaman</p>
			</div>
			<div class="icon">
			<i style="display: flex; justify-content: flex-start;"><img src="dist/img/tr.png" alt="" style="width: 150px;"></i>
			</div>
			<a href="?page=data-peminjaman" class="small-box-footer" style="background-color: #00933d;">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->

	

	

</div>