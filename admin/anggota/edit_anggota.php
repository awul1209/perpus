<?php
$id = $_GET['kode'];
$result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
$row = mysqli_fetch_assoc($result);
?>
<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' class="form-control" name="id_anggota" value="<?php echo $row['id_anggota']; ?>"
    readonly/>
		<div class="card-body">
			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Kode Anggota</label>
					<input type="text" class="form-control" id="kd_anggota" name="kd_anggota"value="<?= $row[
         'id_anggota'
     ] ?>" required disabled>
				</div>
				<div class="col-sm-6">
                    <label class=" col-form-label">Nama</label>
					<input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= $row[
         'nama_anggota'
     ] ?>" required>
				</div>
			</div>

			

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Jenis Kelamin</label>
                    <select name="jekel" id="jekel" class="form-control">
						<option><?= $row['jenis_kelamin'] ?></option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
				<div class="col-sm-6">
                    <label class="col-form-label">No.Telp</label>
					<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $row[
         'no_telp'
     ] ?>" required>
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-12">
                    <label class="col-form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" aria-label="With textarea" rows="4"><?= $row[
                        'alamat'
                    ] ?></textarea>
				</div>
			</div>
			


		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-primary">
			<a href="?page=data-anggota" title="Kembali" class="btn btn-warning">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_anggota = htmlspecialchars($_POST['id_anggota']);
    $nama_anggota = htmlspecialchars($_POST['nama_anggota']);
    $jekel = htmlspecialchars($_POST['jekel']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
  
    //mulai proses ubah data
    $sql_ubah = "UPDATE anggota SET
    nama_anggota='$nama_anggota',
    jenis_kelamin='$jekel',
    alamat='$alamat',
    no_telp='$no_telp'
    WHERE id_anggota='$id_anggota'
    ";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-anggota';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-anggota';
          }
      })</script>";
    }
}
// function upload()
// {
//     $namafile = $_FILES['gambar']['name'];
//     $ukuranfile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpname = $_FILES['gambar']['tmp_name'];

//     // cek file tidak diupload
//     if ($error === 4) {
//         echo "
//         <script>
//         alert('pilih file');
//         </script>
        
//         ";
//         return false;
//     }
//     // cek yang di uplod gambar atau tidak
//     $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

//     $ektensigambar = explode('.', $namafile);
//     $ektensigambar = strtolower(end($ektensigambar));
//     // cek adakah string didalam array
//     if (!in_array($ektensigambar, $ektensigambarvalid)) {
//         echo "
//         <script>
//         alert('yang anda upload bukan file');
//         </script>
//         ";

//         return false;
//     }
//     // cek jika ukuran terlalu besar
//     if ($ukuranfile > 1000000) {
//         echo "
//         <script>
//         alert('ukuran file terlalu besar');
//         </script>
        
//         ";
//         return false;
//     }

//     // lolos pengecekan , gambar siap di upload
//     // generete nama gambar baru
//     $namafilebaru = uniqid();
//     $namafilebaru .= '.';
//     $namafilebaru .= $ektensigambar;

//     move_uploaded_file($tmpname, 'dist/mhs/' . $namafilebaru);

//     return $namafilebaru;
// }
//selesai proses simpan data

