<div class="card">
	<div class="card-header" style="background-color: #00933d; color: #fff;">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
                <div class="col-sm-6">
                    <label class=" col-form-label">Kode Peminjaman</label>
                    <?php
                    $query=mysqli_query($koneksi,"SELECT COUNT(id_pm) AS nomor FROM peminjaman");
                    $row=mysqli_fetch_assoc($query);
                    $nomor=$row['nomor'];
                    $nomor++;
                    $text="PM0".$nomor;
                    ?>
					<input type="text" class="form-control" id="id_pm" name="id_pm" placeholder="kode buku" value="<?= $text ?>" disabled>
				</div>
				<div class="col-sm-6">
                <label class=" col-form-label">Peminjam</label>
                <select name="id_anggota" id="id_anggota" class="form-control select2bs4" required>
					<option selected="selected">- Peminjam -</option>
					<?php
                    // ambil data dari database
                    $query = "SELECT * from anggota";
                    $hasil = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($hasil)) { ?>
					<option value="<?php echo $row['id_anggota']; ?>">
					<?php echo $row['nama_anggota']; ?>
					</option>
					<?php } ?>
				</select>
				</div>
			</div>

			<div class="form-group row">
                <div class="col-sm-6">
                <label class=" col-form-label">Buku</label>
                <select name="id_buku" id="id_buku" class="form-control select2bs4" required>
					<option selected="selected">- Pilih Buku -</option>
					<?php
                    // ambil data dari database
                    $query = "SELECT * from buku where jumlah >= 1";
                    $hasil = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($hasil)) { ?>
					<option value="<?php echo $row['id_buku']; ?>">
					<?php echo $row['judul_buku']; ?>
					</option>
					<?php } ?>
				</select>
				</div>
                <div class="col-sm-6">
                <label class="col-form-label">Tgl Pinjam</label>
                    <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Tahun terbit" required>
				</div>
            </div>
			<div class="form-group row">
                <div class="col-sm-12">
                    <label class="col-form-label">Tgl Kembali</label>
                    <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="Tahun terbit" required>
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
    $idag=$_POST['id_anggota'];
    $status=1;
    $sql_simpan =
        "INSERT INTO peminjaman  VALUES (
           '$text',
			'" .
        $_POST['id_anggota'] .
        "',
			'" .
        $_POST['id_buku'] .
        "',
        '".
        $_POST['tgl_pinjam'] .
        "',
			'" .
        $_POST['tgl_kembali'] .
        "',
        '
        $status
        ')";
    
    $query_ag=mysqli_query($koneksi,"SELECT * FROM anggota WHERE id_anggota = '$idag'");
    $row_ag=mysqli_fetch_assoc($query_ag);
    $row_ag_status=$row_ag['status'];
    if($row_ag_status == 0){
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_query($koneksi,"UPDATE anggota SET status = 1 WHERE id_anggota = '$idag'");
        $id_buku=$_POST['id_buku'];
        $query_buku=mysqli_query($koneksi,"SELECT SUM(jumlah) as jumlah FROM buku WHERE id_buku='$id_buku'");
        $row_buku=mysqli_fetch_assoc($query_buku);
        $jumlah_buku=$row_buku['jumlah'];
        $jumlah_buku-=1;
        mysqli_query($koneksi,"UPDATE buku set jumlah='$jumlah_buku' WHERE id_buku='$id_buku'");
        mysqli_close($koneksi);
        if ($query_simpan) {
            echo "<script>
          Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
          }).then((result) => {if (result.value){
              window.location = '?page=data-peminjaman';
              }
          })</script>";
        } else {
            echo "<script>
          Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value){
              window.location = '?page=data-peminjaman';
              }
          })</script>";
        }
    }else{
        echo "<script>
        Swal.fire({title: 'Status Anda Meminjam! Kembalikan Dulu',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = '?page=data-peminjaman';
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

