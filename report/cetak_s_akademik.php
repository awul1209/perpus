<?php
include '../inc/koneksi.php';

if (isset($_POST['Cetak'])) {
    $jenis = $_POST['jenis'];
    $perihal = $_POST['perihal'];
    $lampiran = $_POST['lampiran'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $tempat = $_POST['tempat'];
    $tujuan = $_POST['tujuan'];
    $isi = $_POST['isi'];
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
<div class="logo" style="width: 110px;">
<img src="../dist/img/unija.png" alt="logo" style="width: 100px;;">
</div>

<div class="text" style="text-align: center;">
<h2>UNIVERSITAS WIRARAJA SUMENEP</h2>
		<h3>FAKULTAS PERTANIAN
			<br>PRODI BISNIS DIGITAL</h3>
		
</div>

<div class="logo" style="width: 110px;">
<img src="../dist/img/sumenep.png" alt="" style="width: 100px; display: none;">
</div>
</div>
<br>
<br>
		<?php
  $sql_tampil = "select * from quisioner
			where id_quisioner ='$jenis'";

  $query_tampil = mysqli_query($koneksi, $sql_tampil);
  $no = 1;
  while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) { ?>
	<table>
		<tbody>
			<tr>
				<td>No Surat</td>
				<td>:</td>
				<td>
                <?php echo $data['id_quisioner']; ?>/<?= $data['quisioner[0]'] ?>/
                <?php echo $tanggal; ?>
				</td>
			</tr>
			<tr>
				<td>Lampiran</td>
				<td>:</td>
				<td>
			<?php echo $lampiran; ?>
				</td>
			</tr>
			<tr>
				<td>Perihal</td>
				<td>:</td>
				<td><b>
			<?php echo $perihal; ?></b>
				</td>
			</tr>
			
		</tbody>
	</table>
    <br>
    <table>
        <tr>
            <td>Yth.</td>
        </tr>
        <tr>
            <td><b><?= $tujuan; ?></b></td>
        </tr>
        <tr>
            <td>di</td>
        </tr>
        <tr>
            <td>Tempat</td>
        </tr>
    </table>


	<p><?= $isi ?> yang akan diselanggarakan pada:</P>
	<table>
		<tbody>
			<tr>
				<td>Hari/Tanggal</td>
				<td>:</td>
				<td>
					<?php echo $hari; ?>
				</td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td>:</td>
				<td>
					<?php echo  $jam; ?>
				</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td>:</td>
				<td>
					<?php echo $tempat; ?>
				</td>
			</tr>
			<?php }
  			?>
		</tbody>
	</table>
	<p>Adalah benar-benar warga Desa Patean, Kecamatan Kota Sumenep, Kabupuaten Sumenep
	Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Sumenep,
		<?php echo $tgl; ?>
		<br> Rektor Universitas Wiraraja
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(....................................................)
	</p>
	<script>
		window.print();
	</script>

</body>

</html>