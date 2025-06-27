<?php
// 1. SELECT query diperbarui untuk mengambil SEMUA kolom dari tabel buku
$id_buku = $_GET['kode'];
$stmt = $koneksi->prepare("SELECT * FROM buku WHERE id_buku = ?");
$stmt->bind_param("s", $id_buku);
$stmt->execute();
$result = $stmt->get_result();
$data_buku = $result->fetch_assoc();
$stmt->close();

// Jika data tidak ada, hentikan eksekusi
if (!$data_buku) {
    echo "<script>
        Swal.fire({title: 'Data Tidak Ditemukan', text: 'Kode buku tidak valid.', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => { if (result.value) { window.location = '?page=data-buku'; } });
    </script>";
    exit;
}
?>

<div class="card">
    <div class="card-header" style="background-color: #00933d; color: #fff;">
        <h3 class="card-title"><i class="fa fa-edit"></i> Edit Data Buku</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= htmlspecialchars($data_buku['id_buku']); ?>">

        <div class="card-body">

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Kode Buku</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($data_buku['id_buku']); ?>" disabled>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" required value="<?= htmlspecialchars($data_buku['judul_buku']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" placeholder="Nama Penulis" required value="<?= htmlspecialchars($data_buku['penulis']); ?>">
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori Buku" required value="<?= htmlspecialchars($data_buku['kategori']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Ubah Cover Buku (Gambar)</label>
                    <p class="mb-1">
                        <?php if (!empty($data_buku['cover'])): ?>
                            <img id="coverPreview" src="admin/assets/buku/<?= $data_buku['cover']; ?>" width="100px" class="rounded">
                        <?php else: ?>
                            <img id="coverPreview" src="#" class="rounded" style="display:none; max-width: 150px;" alt="Preview Cover">
                        <?php endif; ?>
                    </p>
                    <input type="file" class="form-control" name="cover" accept="image/*" onchange="previewImage(this, 'coverPreview');">
                    <small class="text-warning">Kosongkan jika tidak ingin mengubah cover.</small>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Stok" required value="<?= htmlspecialchars($data_buku['jumlah']); ?>">
                </div>
            </div>

            <hr>

            <div class="form-group row">
                <div class="col-sm-12">
                     <label class="col-form-label">Ubah File Buku (PDF)</label>
                     <?php if (!empty($data_buku['upload_file_buku'])): ?>
                        <p>File saat ini: <a href="admin/assets/path_pdf_buku/<?= $data_buku['upload_file_buku']; ?>" target="_blank"><?= htmlspecialchars($data_buku['upload_file_buku']); ?></a></p>
                     <?php endif; ?>
                     <input type="file" class="form-control" name="upload_file_buku" accept=".pdf" onchange="previewFileName(this, 'pdfPreviewName');">
                     <p id="pdfPreviewName" class="mt-2 text-muted" style="font-style: italic;"></p>
                     <small class="text-warning">Kosongkan jika tidak ingin mengubah file PDF.</small>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <input type="submit" name="SimpanPerubahan" value="Simpan Perubahan" class="btn btn-primary">
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
        }
    }

    function previewFileName(input, previewId) {
        const namePreview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            namePreview.textContent = 'File baru yang dipilih: ' + input.files[0].name;
        } else {
            namePreview.textContent = '';
        }
    }
</script>

<?php

// Fungsi upload file yang fleksibel
function uploadFile($fileInputName, $targetDirectory, $allowedExtensions, $maxSize = 5000000) {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] == UPLOAD_ERR_NO_FILE) {
        return ['status' => 'no_file'];
    }
    $file = $_FILES[$fileInputName];
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

if (isset($_POST['SimpanPerubahan'])) {
    
    // 3. LOGIKA PROSES PHP DIPERBAIKI TOTAL
    
    // Simpan nama file lama untuk perbandingan dan penghapusan
    $coverLama = $data_buku['cover'];
    $fileBukuLama = $data_buku['upload_file_buku'];
    $pathPdfLama = $data_buku['pdf_path'];

    // --- PROSES UPLOAD COVER BARU (JIKA ADA) ---
    $path_cover = 'admin/assets/buku/';
    $uploadCover = uploadFile('cover', $path_cover, ['jpg', 'jpeg', 'png', 'webp']);
    $namaCoverFinal = $coverLama; // Secara default, gunakan nama lama

    if ($uploadCover['status'] == 'success') {
        $namaCoverFinal = $uploadCover['filename']; // Jika berhasil, gunakan nama baru
        if ($coverLama && file_exists($path_cover . $coverLama)) {
            unlink($path_cover . $coverLama); // Hapus file lama
        }
    } elseif ($uploadCover['status'] == 'error') {
        echo "<script>Swal.fire('Error Upload Cover', '" . $uploadCover['message'] . "', 'error');</script>";
        exit;
    }

    // --- PROSES UPLOAD FILE BUKU PDF BARU (JIKA ADA) ---
    $path_pdf_buku = 'admin/assets/path_pdf_buku/';
    $uploadBuku = uploadFile('upload_file_buku', $path_pdf_buku, ['pdf']);
    $namaFileBukuFinal = $fileBukuLama; // Default: nama file lama
    $pathPdfFinal = $pathPdfLama; // Default: path lama

    if ($uploadBuku['status'] == 'success') {
        $namaFileBukuFinal = $uploadBuku['filename']; // Gunakan nama file baru
        $pathPdfFinal = $path_pdf_buku . $namaFileBukuFinal; // Buat path baru secara otomatis
        if ($fileBukuLama && file_exists($path_pdf_buku . $fileBukuLama)) {
            unlink($path_pdf_buku . $fileBukuLama); // Hapus file lama
        }
    } elseif ($uploadBuku['status'] == 'error') {
        echo "<script>Swal.fire('Error Upload File Buku', '" . $uploadBuku['message'] . "', 'error');</script>";
        exit;
    }

    // --- PROSES UPDATE DATABASE DENGAN SEMUA KOLOM BARU ---
    $stmt_update = $koneksi->prepare(
        "UPDATE buku SET judul_buku=?, kategori=?, penulis=?, jumlah=?, cover=?, upload_file_buku=?, pdf_path=? WHERE id_buku=?"
    );
    
    // Binding parameter disesuaikan dengan urutan dan tipe data yang benar
    $stmt_update->bind_param(
        "sssissss", // s=string, i=integer
        $_POST['judul_buku'],
        $_POST['kategori'],
        $_POST['penulis'],
        $_POST['jumlah'],
        $namaCoverFinal,
        $namaFileBukuFinal,
        $pathPdfFinal,
        $_POST['id_buku']
    );

    $query_update = $stmt_update->execute();

    if ($query_update) {
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
            .then((result) => { if (result.value) { window.location = '?page=data-buku'; } });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal', text: 'Terjadi kesalahan pada database.', icon: 'error', confirmButtonText: 'OK'});
        </script>";
    }

    $stmt_update->close();
    mysqli_close($koneksi);
}
?>