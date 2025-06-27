<div class="card">
    <div class="card-header" style="background-color: #00933d; color: #fff;">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Buku
        </h3>
    </div>
    <div class="card-body">
        <div>
            <a href="?page=add-buku" class="btn" style="background-color: #00933d; color: #fff;">
                <i class="fa fa-edit"></i> Tambah Data Buku
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Jumlah</th>
                        <th>View Buku</th>
                        <!-- <th>File Buku</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM buku ORDER BY judul_buku ASC");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($data['cover'])) : ?>
                                    <a href="#" data-toggle="modal" data-target="#imagePreviewModal" data-img-src="admin/assets/buku/<?= $data['cover']; ?>">
                                        <img src="admin/assets/buku/<?= $data['cover']; ?>" width="70px" alt="Cover">
                                    </a>
                                <?php else : ?>
                                    <img src="admin/assets/buku/default.png" width="70px" alt="No Cover">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($data['judul_buku']); ?></td>
                            <td><?= htmlspecialchars($data['kategori']); ?></td>
                            <td><?= htmlspecialchars($data['penulis']); ?></td>
                               <td><?= htmlspecialchars($data['jumlah']); ?></td>
                          <td class="text-center">
                            <?php if (!empty($data['upload_file_buku'])) : ?>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pdfPreviewModal<?= $data['id_buku'] ?>" data-pdf-src="<?= $data['pdf_path']; ?>" title="Lihat PDF">
                                    <i class="fa fa-eye"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                            <!-- <td class="text-center">
                                    <?php if (!empty($data['pdf_path'])) : ?>
                                    <a href="<?= $data['pdf_path']; ?>" class="btn btn-primary btn-sm " title="Download PDF" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td> -->
                         
                            <td>
                                <a href="?page=edit-buku&kode=<?= $data['id_buku']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-buku&kode=<?= $data['id_buku']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="pdfPreviewModal<?= $data['id_buku'] ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel">Preview File Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <center>
                        <iframe id="modalPdfFrame" src="<?= $data['pdf_path'] ?>" width="100%" height="500px" style="border: none;"></iframe>
                            </center>

                        </div>
                        </div>
                        </div>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Preview Sampul Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Preview Sampul">
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    // Variabel untuk menyimpan elemen mana yang terakhir diklik untuk membuka modal
    var lastFocusedElement;

    // --- Script untuk Modal Preview Gambar ---
    $('#imagePreviewModal').on('show.bs.modal', function (event) {
        // Simpan tombol yang memicu modal ini
        lastFocusedElement = $(event.relatedTarget);
        
        var imgSrc = lastFocusedElement.data('img-src');
        var modal = $(this);
        modal.find('#modalImage').attr('src', imgSrc);
    });

    // Saat modal gambar SUDAH ditutup, kembalikan fokus
    $('#imagePreviewModal').on('hidden.bs.modal', function () {
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }
    });


    // --- Script untuk Modal Preview PDF ---
    // $('#pdfPreviewModal').on('show.bs.modal', function (event) {
    //     // Simpan tombol yang memicu modal ini
    //     lastFocusedElement = $(event.relatedTarget);

    //     var pdfSrc = lastFocusedElement.data('pdf-src');
    //     var modal = $(this);
    //     modal.find('#modalPdfFrame').attr('src', pdfSrc);
    // });

    // Saat modal PDF SUDAH ditutup, kembalikan fokus
    $('#pdfPreviewModal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        // Kosongkan src iframe untuk menghentikan loading PDF
        modal.find('#modalPdfFrame').attr('src', ''); 
        
        if (lastFocusedElement) {
            lastFocusedElement.focus(); // Kembalikan fokus ke tombol ikon mata
        }
    });
});
</script>