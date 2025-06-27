<?php
$id = $_GET['kode'];
$result = mysqli_query($koneksi, "SELECT * FROM pengarang WHERE id_pengarang='$id'");
$row = mysqli_fetch_assoc($result);
?>
<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' class="form-control" name="id_pengarang" value="<?php echo $row['id_pengarang']; ?>"
    readonly/>
		<div class="card-body">
			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Nama Pengarang</label>
					<input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang"value="<?= $row[
         'nama_pengarang'
     ] ?>" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-primary">
			<a href="?page=data-pengarang" title="Kembali" class="btn btn-warning">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_pengarang = htmlspecialchars($_POST['id_pengarang']);
    $nama_pengarang = htmlspecialchars($_POST['nama_pengarang']);
  
    //mulai proses ubah data
    $sql_ubah = "UPDATE pengarang SET
    nama_pengarang='$nama_pengarang'
    WHERE id_pengarang='$id_pengarang'
    ";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-pengarang';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-pengarang';
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

