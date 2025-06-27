<?php

if (isset($_GET['page'])) {
    $hal = $_GET['page'];

    switch ($hal) {
        //Pengguna
        case 'data-pengguna':
            include 'admin/pengguna/data_pengguna.php';
            break;
        case 'add-pengguna':
            include 'admin/pengguna/add_pengguna.php';
            break;
        case 'edit-pengguna':
            include 'admin/pengguna/edit_pengguna.php';
            break;
        case 'del-pengguna':
            include 'admin/pengguna/del_pengguna.php';
            break;
         //anggota
        case 'data-anggota':
            include 'admin/anggota/data_anggota.php';
            break;
        case 'add-anggota':
            include 'admin/anggota/add_anggota.php';
            break;
        case 'edit-anggota':
            include 'admin/anggota/edit_anggota.php';
            break;
        case 'del-anggota':
            include 'admin/anggota/del_anggota.php';
            break;
         //pengarang
        case 'data-pengarang':
            include 'admin/pengarang/data_pengarang.php';
            break;
        case 'add-pengarang':
            include 'admin/pengarang/add_pengarang.php';
            break;
        case 'edit-pengarang':
            include 'admin/pengarang/edit_pengarang.php';
            break;
        case 'del-pengarang':
            include 'admin/pengarang/del_pengarang.php';
            break;
         //penerbit
         case 'data-penerbit':
            include 'admin/penerbit/data_penerbit.php';
            break;
        case 'add-penerbit':
            include 'admin/penerbit/add_penerbit.php';
            break;
        case 'edit-penerbit':
            include 'admin/penerbit/edit_penerbit.php';
            break;
        case 'del-penerbit':
            include 'admin/penerbit/del_penerbit.php';
            break;
           //buku
           case 'data-buku':
            include 'admin/buku/data_buku.php';
            break;
        case 'add-buku':
            include 'admin/buku/add_buku.php';
            break;
        case 'edit-buku':
            include 'admin/buku/edit_buku.php';
            break;
        case 'del-buku':
            include 'admin/buku/del_buku.php';
            break;
          //peminjaman
          case 'data-peminjaman':
            include 'admin/peminjaman/data_peminjaman.php';
            break;
        case 'add-peminjaman':
            include 'admin/peminjaman/add_peminjaman.php';
            break;
        case 'edit-peminjaman':
            include 'admin/peminjaman/edit_peminjaman.php';
            break;
        case 'del-peminjaman':
            include 'admin/peminjaman/del_peminjaman.php';
            break;
            // pengembalian
            case 'data-pengembalian':
                include 'admin/pengembalian/data_pengembalian.php';
                break;
        //Surat Masuk
        case 'laporan-peminjaman':
            include 'report/report_peminjaman.php';
            break;
        case 'laporan-pengembalian':
            include 'report/report_pengembalian.php';
            break;
            case 'cetak-pengembalian':
                include 'cetak/cetak_pengembalian.php';
                break;
            case 'cetak-peminjaman':
                include 'cetak/cetak_peminjaman.php';
                break;
       

        //Surat Keluar
        case 'laporan-sk':
            include 'report/report_sk.php';
            break;
        case 'cetak-sk':
            include 'cetak/cetak_sk.php';
            break;
        case 'data-sk':
            include 'admin/sk/data_sk.php';
            break;
        case 'add-sk':
            include 'admin/sk/add_sk.php';
            break;
        case 'edit-sk':
            include 'admin/sk/edit_sk.php';
            break;
        case 'del-sk':
            include 'admin/sk/del_sk.php';
            break;
            case 'detail-sk':
                include 'admin/sk/detail_sk.php';
                break;
            case 'revisi':
                include 'admin/sk/revisi_sk.php';
                break;

        //quisioner
        case 'data-quisioner':
            include 'admin/quisioner/data-quisioner.php';
            break;
        case 'add-quisioner':
            include 'admin/quisioner/add-quisioner.php';
            break;
       
        // periksa
        case 'surat':
            include 'surat/suket_akademik.php';
            break;
   
        //default
        default:
            echo '<center><h1> ERROR !</h1></center>';
            break;
    }
} else {
    // Auto Halaman Home Pengguna
    if ($data_level == 'Administrator') {
        include 'home/admin.php';
    } elseif ($data_level == 'Kepala') {
        include 'home/kaur.php';
    }
}

?>
