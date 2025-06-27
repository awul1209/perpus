<?php

if (isset($_POST['btnCetak'])) {
    $id = $_POST['id_mhs'];
}

$tanggal = date('m/y');
$tgl = date('d/m/y');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
<div class="kotak-header" style="display: flex; justify-content: space-around; border-bottom: 1px solid black;">
<div class="logo" style="width: 110px; ">
<img src="dist/img/logofp.png" alt="logo" style="width: 100px;">
</div>

<div class="text" style="text-align: center;">
<h2>UNIVERSITAS WIRARAJA SUMENEP</h2>
		<h3>FAKULTAS PERTANIAN</h3>
		
</div>

<div class="logo" style="width: 110px; ">
<img src="dist/img/unija.png" alt="" style="width: 95px; height: 94px;">
</div>
</div>
		<?php
  $sql_tampil = "select * from mhs
			where id_mhs ='$id'";

  $query_tampil = mysqli_query($koneksi, $sql_tampil);
  $no = 1;
  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) { ?>


	<center>
		<h4>
			<u>SURAT KETERANGAN AKTIF</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_mhs']; ?>/Ket.atf/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Dekan Fakutas Pertanian Universitas Wiraraja Sumenep dengan ini menerangkan
		bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td></td>
				<td>:</td>
				<td>
					<?php echo $data['npm']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td></td>
				<td>:</td>
				<td>
					<?php echo $data['nama_mhs']; ?>
				</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td></td>
				<td>:</td>
				<td>
					<?php echo $data['tmp_lahir']; ?>/<?php echo $data['tgl_lahir']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td></td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>

				<tr>
				<td>ALamat</td>
				<td></td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
				</tr>
		
			<?php }
  ?>
		</tbody>
	</table>
    <div class="kotak" style="padding: 10px; box-sizing: border-box; display: flex; justify-content: right;">
        <div class="kanan">
        <p style="text-align: center;">
		Sumenep,
		<?php echo $tgl; ?>
        <br>      Mengetahui,
		<br> Dekan Fakultas Pertanian
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>      Khairil Anwar S.Kom, M.Kom
	</p>
        </div>
        </div>

	<script>
		window.print();
	</script>

</body>

</html>