<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i>Cetak Surat</h3>
	</div>
	<form action="./report/cetak_s_akademik.php" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<div class="col-sm-12">
					<label class="col-form-label">Jenis Surat</label>
					<select name="jenis" id="jenis" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
				// ambil data dari database
				$query = "select * from quisioner";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_quisioner'] ?>">
							<?php echo $row['jenis_surat'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Perihal</label>
					<input type="text" class="form-control" id="perihal" name="perihal" placeholder="perihal" required>
				</div>
				<div class="col-sm-6">
                    <label class="col-form-label">Lampiran</label>
					<input type="text" class="form-control" id="lampiran" name="lampiran" placeholder="lampiran" required>
				</div>
			</div>
			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Hari / Tanggal</label>
					<input type="text" class="form-control" id="hari" name="hari" placeholder="hari" required>
				</div>
				<div class="col-sm-6">
                    <label class="col-form-label">Jam</label>
					<input type="text" class="form-control" id="jam" name="jam" placeholder="jam" required>
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Tempat</label>
					<input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat" required>
				</div>
				<div class="col-sm-6">
                    <label class="col-form-label">Tujuan</label>
					<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="tujuan" required>
				</div>
			</div>

				<div class="form-group row">
                <div class="col-sm-12">
                    <label class="col-form-label">Isi</label>
                    <textarea class="form-control" name="isi" aria-label="With textarea" rows="4" placeholder="Keterangan"></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">

			<input target="_blank" type="submit" name="Cetak" value="Cetak" class="btn btn-info"></input>
		</div>
	</form>
</div>