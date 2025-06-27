<?php
$id = $_GET['kode'];
$result = mysqli_query($koneksi, "SELECT id_pm,nama_anggota,judul_buku,tgl_pinjam,tgl_kembali FROM peminjaman
 JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
 JOIN buku ON peminjaman.id_buku=buku.id_buku  WHERE id_pm='$id'");
$roww = mysqli_fetch_assoc($result);
?>
<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Buku</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' class="form-control" name="id_pm" value="<?php echo $roww['id_pm']; ?>"
    readonly/>
		<div class="card-body">

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Kode Peminjaman</label>
					<input type="text" class="form-control" id="kd_buku" name="kd_buku" placeholder="kode buku" value="<?= $roww['id_buku'] ?>" disabled>
				</div>
				<div class="col-sm-6">
                    <label class=" col-form-label">Judul Buku</label>
					<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" required value="<?= $roww['judul_buku'] ?>">
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-6">
                <label class=" col-form-label">Pengarang</label>
                <select name="id_pengarang" id="id_pengarang" class="form-control select2bs4" required>
					<option value="<?= $roww['id_pengarang'] ?>" selected="selected"><?= $roww['nama_pengarang'] ?></option>
					<?php
                    // ambil data dari database
                    $query = "SELECT * from pengarang";
                    $hasil = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($hasil)) { ?>
					<option value="<?php echo $row['id_pengarang']; ?>">
					<?php echo $row['nama_pengarang']; ?>
					</option>
					<?php } ?>
				</select>
				</div>
                <div class="col-sm-6">
                <label class=" col-form-label">Penerbit</label>
                <select name="id_penerbit" id="id_penerbit" class="form-control select2bs4" required>
					<option value="<?= $roww['id_penerbit'] ?>" selected="selected"><?= $roww['nama_penerbit'] ?></option>
					<?php
                    // ambil data dari database
                    $query = "SELECT * from penerbit";
                    $hasil = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($hasil)) { ?>
					<option value="<?php echo $row['id_penerbit']; ?>">
					<?php echo $row['nama_penerbit']; ?>
					</option>
					<?php } ?>
				</select>
				</div>
            </div>
			<div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="th_terbit" name="th_terbit" placeholder="Tahun terbit" required value="<?= $roww['tahun_terbit'] ?>">
				</div>
                <div class="col-sm-6">
                    <label class="col-form-label">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required value="<?= $roww['jumlah'] ?>">
				</div>  
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-buku" title="Kembali" class="btn btn-warning">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    $kd_buku=$_POST['id_buku'];
    $judul_buku=$_POST['judul'];
    $pengarang=$_POST['id_pengarang'];
    $penerbit=$_POST['id_penerbit'];
    $th_terbit=$_POST['th_terbit'];
    $jumlah=$_POST['jumlah'];

    $sql_update ="UPDATE buku set
    id_pengarang='$pengarang',
    id_penerbit='$penerbit',
    judul_buku='$judul_buku',
    tahun_terbit='$th_terbit',
    jumlah='$jumlah'
    WHERE id_buku='$kd_buku'
    ";
    $query_update = mysqli_query($koneksi, $sql_update);
    mysqli_close($koneksi);

    if ($query_update) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-buku';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = '?page=data-buku';
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

