<?php

$sql = $koneksi->query('SELECT COUNT(id_sm) as sm from tb_sm');
while ($data = $sql->fetch_assoc()) {
    $sm = $data['sm'];
}

$sql = $koneksi->query('SELECT COUNT(id_sk) as sk from tb_sk');
while ($data = $sql->fetch_assoc()) {
    $sk = $data['sk'];
}
$tgl_sekarang = date('Y-m-d');
?>

<div class="row">
	<!-- <div class="col-lg-6 col-6">
	
		<div class="small-box" style="background-color: #fff; color:#222;">
			<div class="inner">
				<h3 style="color: #3276c3;">
					<?php echo $sm; ?>
				</h3>
				<p style="color: #3276c3; font-weight: bold; font-size: 22px;">SURAT MASUK</p>
			</div>
			<div class="icon">
			<i style="display: flex; justify-content: flex-start;"><img src="dist/img/iconuser/masuk.png" alt="" style="width: 70px;"></i>
			</div>
			<a href="?page=data-sm" class="small-box-footer" style="background-color: #3276c3;">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div> -->
	<!-- ./col -->
	<!-- <div class="col-lg-6 col-6">
		
		<div class="small-box" style="background-color: #fff; color:#222;">
			<div class="inner">
				<h3 style="color: #3276c3;">
					<?php echo $sk; ?>
				</h3>

				<p style="color: #3276c3; font-weight: bold; font-size: 22px;">SURAT KELUAR</p>
			</div>
			<div class="icon">
			<i style="display: flex; justify-content: flex-start;"><img src="dist/img/iconuser/keluar.png" alt="" style="width: 70px;"></i>
			</div>
			<a href="?page=data-sk" class="small-box-footer" style="background-color: #3276c3;">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div> -->
	<!-- ./col -->

	<div class="col-lg-12 col-12">
	<h6><a href="?page=data-sm">Surat Masuk Hari Ini <i class="fas fa-arrow-circle-right"></i> </a></h6>
	<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>No. Surat</th>
						<th>Perihal Surat</th>
						<th>Tgl Surat</th>
						<th>Keterangan</th>
						<th>Detail</th>
					</tr>
					<?php
     $tgl = date('Y-m-d');
     $no = 1;
     $sql = $koneksi->query(
         "SELECT * FROM `tb_sm` WHERE  tgl_diterima = '$tgl'"
     );
     while ($data = $sql->fetch_assoc()) { ?>

					<tr>
						 <td>
							
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['no_sm']; ?>
                        </td>
						<td>
							<?php echo $data['perihal']; ?>
                        </td>
						<td>
							<?php echo $data['tgl_sm']; ?>
                        </td> 
						<td>
							<?php echo $data['Disposisi']; ?>
                        </td> 
						<td>
						<a href="?page=detail-sm&kode=<?php echo $data['id_sm']; ?>" title="detail" class="btn btn-success btn-sm">
										<i class="fa fa-eye"></i>
									</a>
                        </td> 
					</tr>

					<?php }
     ?>
			</table>
		</div>
<br>


	<h6><a href="?page=data-sk">Surat Keluar Hari Ini <i class="fas fa-arrow-circle-right"></i></a></h6>
	<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
					<tr>
					<th>No</th>
						<th>No. Surat</th>
						<th>Nama Surat</th>
						<th>Tujuan</th>
						<th>Keterangan</th>
						<th>Detail</th>
						<th>Status</th>
					</tr>
					<?php
     $no = 1;
     $sql = $koneksi->query(
         "SELECT * FROM `tb_sk` WHERE tgl_keluar = '$tgl_sekarang'"
     );
     while ($data = $sql->fetch_assoc()) { ?>

					<tr>
						 <td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['no_sk']; ?>
                        </td>
						<td>
							<?php echo $data['nama_sk']; ?>
                        </td>
						<td>
							<?php echo $data['tujuan']; ?>
                        </td> 
						<td>
							<?php echo $data['keterangan']; ?>
                        </td> 
						<td>
						<a href="?page=detail-sk&kode=<?php echo $data['id_sk']; ?>" title="detail" class="btn btn-success btn-sm">
										<i class="fa fa-eye"></i>
									</a>
                        </td> 
						<td>
						<button style="font-size: 12px;" class="
							<?php  if($data['status'] == 'disetujui'){
								echo 'btn btn-success';
								 } elseif($data['revisi'] == 'Revisi'){
									echo 'btn btn-danger';
								 } else{
									echo 'btn btn-warning';
								 } ?>"> <?php echo $data['status']; ?>
						</button>	
							</td>
					</tr>

					<?php }
     ?>
			</table>
		</div>
</div>

	

</div>