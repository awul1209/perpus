<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Kode Anggota</label>
                    <?php
                    $query=mysqli_query($koneksi,"SELECT COUNT(id_anggota) AS nomor FROM anggota");
                    $row=mysqli_fetch_assoc($query);
                    $nomor=$row['nomor'];
                    $nomor++;
                    $text="AG00".$nomor;
                    ?>
					<input type="text" class="form-control" id="kd_anggota" name="kd_anggota" placeholder="kode anggota" value="<?= $text ?>" disabled>
				</div>
				<div class="col-sm-6">
                    <label class=" col-form-label">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Jenis Kelamin</label>
                    <select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
                <div class="col-sm-6">
                    <label class="col-form-label">No.Telp</label>
					<input type="text" class="form-control" id="notelp" name="notelp" placeholder="no.telp" required>
				</div>
            </div>
			<div class="form-group row">
                <div class="col-sm-12">
                    <label class="col-form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" aria-label="With textarea" rows="4" placeholder="Alamat"></textarea>
				</div>
               
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-anggota" title="Kembali" class="btn btn-warning">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    $sql_simpan =
        "INSERT INTO anggota  VALUES (
           '$text',
			'" .
        $_POST['nama'] .
        "',
			'" .
        $_POST['jekel'] .
        "',
			'" .
        $_POST['alamat'] .
        "',
			'" .
        $_POST['notelp'] .
        "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-anggota';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
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

