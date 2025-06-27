<?php
$id = $_GET['kode'];
$result = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id_penerbit='$id'");
$row = mysqli_fetch_assoc($result);
?>
<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' class="form-control" name="id_penerbit" value="<?php echo $row['id_penerbit']; ?>"
    readonly/>
		<div class="card-body">
			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Nama penerbit</label>
					<input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit"value="<?= $row[
         'nama_penerbit'
     ] ?>" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-primary">
			<a href="?page=data-penerbit" title="Kembali" class="btn btn-warning">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_penerbit = htmlspecialchars($_POST['id_penerbit']);
    $nama_penerbit = htmlspecialchars($_POST['nama_penerbit']);
  
    //mulai proses ubah data
    $sql_ubah = "UPDATE penerbit SET
    nama_penerbit='$nama_penerbit'
    WHERE id_penerbit='$id_penerbit'
    ";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-penerbit';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-penerbit';
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

