<?php
// --- LOGIKA KODE OTOMATIS VERSI FINAL (ANTI GAGAL) ---
$query = mysqli_query($koneksi, "SELECT MAX(CAST(SUBSTRING(id_buku, 3) AS UNSIGNED)) as nomor_terbesar FROM buku");
$data = mysqli_fetch_array($query);
$nomor_terbesar = $data['nomor_terbesar'];

if ($nomor_terbesar == null) {
    $urutan = 1;
} else {
    $urutan = (int) $nomor_terbesar + 1;
}

$huruf = "BK";
$kodeBukuOtomatis = $huruf . sprintf("%05d", $urutan);
?>

<div class="card">
    <div class="card-header" style="background-color: #00933d; color: #fff;">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data Buku
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Kode Buku</label>
                    <input type="text" class="form-control" value="<?= $kodeBukuOtomatis; ?>" disabled>
                    <input type="hidden" name="id_buku" value="<?= $kodeBukuOtomatis; ?>">
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" placeholder="Nama Penulis" required>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori Buku" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Cover Buku (Gambar)</label>
                    <input type="file" class="form-control" name="cover" accept="image/*" onchange="previewImage(this, 'coverPreview');">
                    <img id="coverPreview" class="mt-2 rounded" style="display:none; max-width: 150px;" alt="Preview Cover">
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Stok" required>
                </div>
            </div>

            <hr>
            
            <div class="form-group row">
                <div class="col-sm-12">
                     <label class="col-form-label">File Buku (PDF)</label>
                     <input type="file" class="form-control" name="upload_file_buku" accept=".pdf" onchange="previewFileName(this, 'pdfPreviewName');">
                     <p id="pdfPreviewName" class="mt-2 text-muted" style="font-style: italic;"></p>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
            <a href="?page=data-buku" title="Kembali" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}

function previewFileName(input, previewId) {
    const namePreview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        namePreview.textContent = 'File dipilih: ' + input.files[0].name;
    } else {
        namePreview.textContent = '';
    }
}
</script>


<?php
// Fungsi upload yang sudah ada sebelumnya
function uploadFile($fileInputName, $targetDirectory, $allowedExtensions, $maxSize = 5000000) {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] == UPLOAD_ERR_NO_FILE) {
        return ['status' => 'no_file'];
    }
    $file = $_FILES[$fileInputName];
    // ... (isi fungsi uploadFile sama seperti sebelumnya, tidak perlu diubah) ...
    $namaFile = $file['name'];
    $tmpName = $file['tmp_name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    if ($error !== UPLOAD_ERR_OK) return ['status' => 'error', 'message' => 'Terjadi kesalahan internal saat upload.'];
    $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensi, $allowedExtensions)) return ['status' => 'error', 'message' => 'Ekstensi file tidak diizinkan.'];
    if ($ukuranFile > $maxSize) return ['status' => 'error', 'message' => 'Ukuran file terlalu besar.'];
    $namaFileBaru = uniqid() . '.' . $ekstensi;
    if (move_uploaded_file($tmpName, $targetDirectory . $namaFileBaru)) {
        return ['status' => 'success', 'filename' => $namaFileBaru];
    } else {
        return ['status' => 'error', 'message' => 'Gagal memindahkan file.'];
    }
}

if (isset($_POST['Simpan'])) {
    
    // 1. Upload file Cover
    $path_cover = 'admin/assets/buku/';
    $uploadCover = uploadFile('cover', $path_cover, ['jpg', 'jpeg', 'png', 'webp']);
    $namaCover = null;
    if ($uploadCover['status'] == 'success') {
        $namaCover = $uploadCover['filename'];
    } elseif ($uploadCover['status'] == 'error') {
        echo "<script>Swal.fire('Error Upload Cover', '" . $uploadCover['message'] . "', 'error');</script>";
        exit;
    }

    // 2. Upload file PDF buku
    $path_pdf_buku = 'admin/assets/path_pdf_buku/';
    $uploadBuku = uploadFile('upload_file_buku', $path_pdf_buku, ['pdf']);
    $namaFileBuku = null;
    $fullPathPdf = null; // Variabel untuk path_pdf
    if ($uploadBuku['status'] == 'success') {
        $namaFileBuku = $uploadBuku['filename'];
        // 3. SECARA OTOMATIS MENGISI NILAI UNTUK 'path_pdf'
        $fullPathPdf = $path_pdf_buku . $namaFileBuku;
    } elseif ($uploadBuku['status'] == 'error') {
        echo "<script>Swal.fire('Error Upload File Buku', '" . $uploadBuku['message'] . "', 'error');</script>";
        exit;
    }
    
    // 4. PERSIAPKAN QUERY INSERT DENGAN SEMUA KOLOM BARU
    $sql_simpan = $koneksi->prepare(
        "INSERT INTO buku (id_buku, judul_buku, kategori, penulis, jumlah, cover, upload_file_buku, pdf_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );
    
    // 5. BINDING PARAMETER SESUAI URUTAN
    $sql_simpan->bind_param(
        "ssssisss", // s=string, i=integer
        $_POST['id_buku'],
        $_POST['judul_buku'],
        $_POST['kategori'],
        $_POST['penulis'],
        $_POST['jumlah'],
        $namaCover,
        $namaFileBuku,
        $fullPathPdf
    );
    
    $query_simpan = $sql_simpan->execute();

    if ($query_simpan) {
        echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
            .then((result) => { if (result.value) { window.location = '?page=data-buku'; } });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Tambah Data Gagal', text: 'Terjadi kesalahan pada database.', icon: 'error', confirmButtonText: 'OK'});
        </script>";
    }

    $sql_simpan->close();
    mysqli_close($koneksi);
}
?>