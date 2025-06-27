-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2025 pada 13.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` text NOT NULL,
  `nrp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `jabatan`, `nrp`) VALUES
('AG001', 'Sigit Waseso, S.H.., M.H', 'Laki-Laki', 'Kepala Kejaksaan Negeri', '60276207'),
('AG0010', 'Harry Achmad Dwi Maryono, S.H.', 'Laki-Laki', 'Jaksa Fungsional pada Kejaksaan Negeri\r\n', '60480190'),
('AG0011', 'Nur Fajriyah, S.H.', 'Perempuan', 'Jaksa Fungsional pada Kejaksaan Negeri', '40076191'),
('AG0012', 'Saiful Nurul Akhmadi, S.H.', 'Laki-Laki', 'Penyusun Bahan Inforrmasi dan Publikasi pada Sub Bagian Pembinaan Kejaksaan', '49471191'),
('AG0013', 'Syaiful Arifin, S.H.', 'Laki-Laki', 'Penyusun Bahan Bantuan Hukum pada Seksi Perdata dan Tata Usaha Negara Kejaksaan Negeri\r\n', '49874015'),
('AG0014', 'Yusoep Sulaman, S.H.', 'Laki-Laki', 'Analis Penyuluhan dan Layanan Informasi pada Seksi Intelijen Kejaksaan Negeri\r\n', '60880405'),
('AG0015', 'RB. Akhmad Fajrudin, S.H.', '- Pilih -', 'Analis Penyuluhan dan Layanan Informasi pada Seksi Intelijen Kejaksaan Negeri', '40071196'),
('AG0016', 'Bambang Aji Purwanto, S.H.', 'Laki-Laki', 'Pengadministrasi Penanganan Perkara pada Seksi Tindak Pidana Khusus Kejaksaan Negeri\r\n', '403800507'),
('AG0017', 'Milliyati', 'Perempuan', 'Fungsional Pranata Komputer Pertama pada Seksi Intelijen Kejaksaan Negeri\r\n', '49973152'),
('AG0018', 'Taufik Rahman, S.H.', 'Laki-Laki', 'Auditor Pertama pada Seksi Pengelolaan Barang Bukti dan Barang Rampasan Kejaksaan Negeri', '40685497'),
('AG0019', 'Hariyadi', 'Laki-Laki', 'Kepala Urusan Perlengkapan, DASKRIMTI dan Perpustakaan pada Sub Bagian Pembinaan Kejaksaan Negeri\r\n', '4886674'),
('AG002', 'Moh. Slamet Sarjono, S.H.', 'Laki-Laki', 'Kasubag Pembinaan Kejaksaan Negeri \r\n', '3906957'),
('AG0020', 'Imam Zaini', 'Laki-Laki', 'Pranata Komputer pada Sub Bagian Pembinaan Kejaksaan Negeri\r\n', '4927247'),
('AG0021', 'RB. Rusdi Siswantoyo', 'Laki-Laki', 'Kepala Urusan Tata Usaha, Kepegawaian dan Keuangan dan PNBP pada Sub Bagian Pembinaan Kejaksaan Negeri\r\n', '49367502'),
('AG0022', 'Jodi Frondedy, S.Sos', 'Laki-Laki', 'Pengadministrasi Penanganan Perkara pada Seksi Tindak Pidana Umum Kejaksaan Negeri', '403730517'),
('AG0023', 'Abdul Wahib Koesno', 'Laki-Laki', 'Analis Pengelolaan Keuangan Anggaran Pendapatan dan Belanja Negara Ahli Pertama Pada Sub Bagian Pembinaan Kejaksaan Negeri', '40275101'),
('AG0024', 'Karisma Bintang Pratama, S.H.', 'Laki-Laki', 'Kepala Sub Seksi Penyidikan pada Seksi Tindak Pidana Khusus pada Kejaksaan Negeri', '61993450'),
('AG0025', 'Selamet Budiarno, S.T.', 'Laki-Laki', 'Bendahara pada Sub Bagian Kejaksaan Negeri', '405768427'),
('AG0026', 'Hendro Wibowo, S.H.', 'Laki-Laki', 'Penyusun Laporan Keuangan pada Sub Bagian Pembinaan Kejaksaan Negeri', '41189301'),
('AG0027', 'Robby Sujana, S.H., M.H.', 'Laki-Laki', 'Bendahara pada Sub Bagian Pembinaan Kejaksaan Negeri', '41188286'),
('AG0028', 'Serly Lika Sari, S.H.', 'Laki-Laki', 'Analis Penuntutan pada Seksi Tindak Pidana Khusus Kejaksaan Negeri', '62197983'),
('AG0029', 'Amzein Ramadhan Firmansyah, S.Kom.', 'Laki-Laki', 'Fungsional Pranata Komputer Pertama pada Sub Bagian Pembinaan Kejaksaan Negeri', '621941151'),
('AG003', 'Moch. Indra Subrata, S.H., M.H.', 'Laki-Laki', 'Kepala Seksi Intelijen Kejaksaan Negeri\r\n', '4068625'),
('AG0030', 'Yanuar Firmansyah', 'Laki-Laki', 'Pengelola Tata Naskah pada Sub Bagian Pembinaan Kejaksaan Negeri', '40485187'),
('AG0031', 'Hendra Kadarisman', 'Laki-Laki', 'Pengadministrasi Penanganan Perkara pada Seksi Tindak Pidana Umum Kejaksaan Negeri', '40578390'),
('AG0032', 'Hendri Kadarisman', 'Laki-Laki', 'Pengadministrasi Penanganan Perkara pada Seksi Tindak Pidana Khusus Kejaksaan Negeri', '40578385'),
('AG0033', 'Gilang Pertama Putra', 'Laki-Laki', 'Pengemudi Pengawal Tahanan pada Seksi Intelijen Kejaksaan Negeri', '421001394'),
('AG0034', 'Rendy Nugroho', 'Laki-Laki', 'Pengawal Tahanan atau Narapidana pada Seksi Tindak Pidana Umum Kejaksaan Negeri', '42192730'),
('AG0035', 'Dwi Asri Nafari', 'Perempuan', 'Pengemudi Pengawal Tahanan pada Seksi Pengelolaan Barang Bukti dan Barang Rampasan Kejaksaan Negeri', '421871272'),
('AG0036', 'Eka Ainur Rahma, A.Md.', 'Perempuan', 'Pranata Barang Bukti pada Seksi Pengelolaan Barang Bukti dan Barang Rampasan Kejaksaan Negeri', '522001419'),
('AG0037', 'Mayang Sunda Utari, A.Md.', 'Perempuan', 'Pengolah Data Perkara dan Putusan pada Seksi Tindak Pidana Umum kejaksaan Negeri', '52294705'),
('AG0038', 'Risca Ayu Sinta, A.Md.', 'Perempuan', 'Pengolah Data Intelijen pada Seksi Intelijen Kejaksaan Negeri', '52296214'),
('AG0039', 'Viena Andhani Riswari, S.H.', 'Perempuan', 'Penelaah Penuntutan dan Penegakan Hukum pada Kejaksaan Negeri', '624001139'),
('AG004', 'Hanis Aristya Hermawan, S.H., M.H.', 'Laki-Laki', 'Kepala Seksi Tindak Pidana Umum Kejaksaan Negeri\r\n', '61084382'),
('AG0040', 'Yunda Rana Amanda, S.H.', 'Perempuan', 'Penelaah Penuntutan dan Penegakan Hukum pada Kejaksaan Negeri', '62499923'),
('AG0041', 'Santika Amanda Kesuma, A.Md. A.B.', 'Perempuan', 'Petugas Barang Bukti pada Kejaksaan Negeri', '524011317'),
('AG0042', 'Tsara Afifatusshalihah, A.Md.M.', 'Perempuan', 'Petugas Brang Bukti pada Kejaksaan Negeri', '52499796'),
('AG0043', 'Aisyah Nur Istiqomah ', 'Perempuan', 'Penglola Penanganan Perkara pada Kejaksaan Negeri', '42494283'),
('AG0044', 'Arum Bunga Aprilia', 'Perempuan', 'Penjaga Tahanan pada Kejaksaan Negeri', '424033753'),
('AG0045', 'Bagas Wahyu Tri Pamungkas', 'Laki-Laki', 'Penjaga Tahanan pada Kejaksaan Negeri', '424023410'),
('AG0046', 'Irvan Indra Kurniawan', 'Laki-Laki', 'Penjaga Tahanan pada Kejaksaan Negeri', '424013237'),
('AG0047', 'Rachmatullah Firdaus Yundika Putra', 'Laki-Laki', 'Penjaga Tahanan pada Kejaksaan Negeri', '424044071'),
('AG0048', 'Tasya Febrita Rahmasari', 'Perempuan', 'Penjaga Tahanan pada Kejaksaan Negeri', '424013178'),
('AG0049', 'Wisnu Kuntoro Adji', 'Laki-Laki', 'Pengeloa Penanganan Perkara pada Kejaksaan Negeri', '424041850'),
('AG005', 'Dony Suryahadi Kusuma, S.H., M.H.', 'Laki-Laki', 'Kepala Seksi Tindak Pidana Khusus Kejaksaan Negeri\r\n', '600985879'),
('AG0050', 'Yuangga Anditya Prayoga', 'Laki-Laki', 'Penjaga Tahanan pada Kejaksaan Negeri', '424962489'),
('AG0051', 'Achmad Fajri', 'Laki-Laki', 'Pengemudi Pengawal Tahanan pada Kejaksaan Negeri', '421921014'),
('AG0052', 'Januar Rahman', 'Laki-Laki', 'Pengemudi Pengawal Tahanan pada Kejaksaan Negeri', '421951500'),
('AG0053', 'Bobby Ardirizka Widodo, S.H., M.Hum.', 'Laki-Laki', 'Kepala Seksi Tindak Pidana Khusus Kejaksaan Negeri', '61082612'),
('AG006', 'Slamet Pujiono, S.H.', 'Laki-Laki', 'Kepala Seksi Perdata dan Tata Usaha Negara Kejaksaan Negeri\r\n', '19840530'),
('AG007', 'Surya Rizal Hertady, S.H.', 'Laki-Laki', 'Kepala Seksi Pengelolaan Barang Bukti dan Barang Rampasan dan Kasubsi Penuntutan, Eksekusi dan Eksaminasi pada Seksi Tindak Pidana pada Kejaksaan Negeri\r\n', '40579363'),
('AG008', 'Deddy Arief Wicaksono, S.H.', 'Laki-Laki', 'Jaksa Fungsional pada Kejaksaan Negeri\r\n', '60679321'),
('AG009', 'R. Teddy Roomius, S.H.', 'Laki-Laki', 'Jaksa Fungsional pada Kejaksaan Negeri \r\n', '19660202');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `upload_file_buku` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori`, `penulis`, `jumlah`, `cover`, `upload_file_buku`, `pdf_path`) VALUES
('BK001', 'Aktualita Hukum Dalam Era Reformasi', 'islamic', 'ayyub', 12, '685e794864be1.png', '685e794867894.pdf', 'admin/assets/path_pdf_buku/685e794867894.pdf'),
('BK0010', 'Aspek Hukum Pasar Modal Indonesia', '', '', 1, '', '0', ''),
('BK00100', 'Praperadilan Dan Penggabungan Perkara Gugatan Ganti Kerugian Dalam Kuhap', '', '', 1, '', '0', ''),
('BK00102', 'Pengembangan Kurikulum Pendidikan agama Islam di Sekolah, Madrasah, dan Perguruan Tinggi', '', '', 0, '', '0', ''),
('BK00103', 'Pokok-Pokok Hukum Lingkungan Nasional', '', '', 1, '', '0', ''),
('BK00104', 'Pengantar Ilmu Hukum', '', '', 1, '', '0', ''),
('BK00105', 'Prosedur Pendaftaran Tanah', '', '', 1, '', '0', ''),
('BK00106', 'Perkembangan HAM dan Keberadaan Peradilan HAM di Indonesia', '', '', 1, '', '0', ''),
('BK00107', 'Tindak Pidana Narkoba', '', '', 1, '', '0', ''),
('BK00108', 'Pokok-Pokok Hukum Perdata', '', '', 1, '', '0', ''),
('BK00109', 'Pemberantasan dan Pencegahan Tindak Pidana Terhadap Perbankan', '', '', 1, '', '0', ''),
('BK0011', 'Alternatif Penyelesainan Sengketa', '', '', 1, '', '0', ''),
('BK00110', 'Menuju Sumenep Cerdas 2015', '', '', 1, '', '0', ''),
('BK00111', 'Perkembangan Hukum Kontrak Innominaat Di Indonesia', '', '', 1, '', '0', ''),
('BK00112', 'Para Sahabat Nabi', '', '', 1, '', '0', ''),
('BK00113', 'Pengantar Dan Asas Hukum Pidana Islam Fikih Jinayah', '', '', 1, '', '0', ''),
('BK00114', 'Menuju Sumenep Cerdas 2015', '', '', 2, '', '0', ''),
('BK00115', 'ini judul baru', '', '', 12, '', '685d40bd21014.png', '685d40bd25778.pdf'),
('BK00116', 'buku coba', '', '', 12, '', '685d41bfd0884.png', '685d41de084ca.pdf'),
('BK00117', 'buku coba lagi', 'komik', 'ayyub', 12, '685e76dee4929.png', '685e76deeb59a.pdf', 'admin/assets/path_pdf_buku/685e76deeb59a.pdf'),
('BK0012', 'Asas-Teori-Praktik Hukum Pidana', '', '', 1, '', '0', ''),
('BK0013', 'Aspek Hukum Dalam Bisnis', '', '', 1, '', '0', ''),
('BK0014', 'Alumni FEUI Dan Tantangan Masa Depan', '', '', 1, '', '0', ''),
('BK0015', 'Arbitrase', '', '', 1, '', '0', ''),
('BK0016', 'Apa Dan iIapa Baharuddin Lopa', '', '', 4, '', '0', ''),
('BK0017', 'Capita Selecta Hukum Tata Negara', '', '', 1, '', '0', ''),
('BK0018', 'Contoh Akta Notaris Dan Akta Di Bawah Tangan (Buku III)', '', '', 1, '', '0', ''),
('BK0019', 'Contoh Akta Notaris Dan Akta Di Bawah Tangan (Buku II Bagian 2)', '', '', 1, '', '0', ''),
('BK0020', 'Contoh Akta Notaris Dan Akta Di Bawah Tangan (Buku I)', '', '', 1, '', '0', ''),
('BK0021', 'Beberapa Permasalahan Hukum Di Sekitar Penanaman Modal', '', '', 1, '', '0', ''),
('BK0022', 'Bank Dan Lembaga Keuangan Lainnya', '', '', 1, '', '0', ''),
('BK0023', 'Dasar Dasar Filsafat Dan Teori Hukum', '', '', 1, '', '0', ''),
('BK0024', 'Delik Agama Dalam Hukum Pidana di Indonesa', '', '', 1, '', '0', ''),
('BK0025', 'Demokrasi Kita', '', '', 1, '', '0', ''),
('BK0026', 'Dasar Dasar politik Hukum', '', '', 1, '', '0', ''),
('BK0027', 'Dakwah & Jihad Sebuah Gerakan Islam Bukan Teroris', '', '', 1, '', '0', ''),
('BK0028', 'Dzikir Asmaul Husna Sholawat & Doa', '', '', 1, '', '0', ''),
('BK0029', 'Dasar Dasar Hukum Pidana Indonesia', '', '', 1, '', '0', ''),
('BK003', 'Argumentasi Hukum', '', '', 1, '', '0', ''),
('BK0030', 'Dari Penjara Ke Penjara', '', '', 1, '', '0', ''),
('BK0031', 'Deradikalisasi', '', '', 1, '', '0', ''),
('BK0032', 'Dasar Dasar Hukum Kehutanan', '', '', 1, '', '0', ''),
('BK0033', 'Gugatan Kelompok (Class Action) di Indonesia', '', '', 1, '', '0', ''),
('BK0034', 'Gerakan Anti Korupsi Perbandingan Antara Korea Selatan dan Indonesia', '', '', 1, '', '0', ''),
('BK0035', 'Eksistensi Kejaksaan Dalam Konstitusi di Berbagai Negara', '', '', 1, '', '0', ''),
('BK0036', 'Etika & Perlindungan Konsumen Dalam Ekonomi Islam', '', '', 1, '', '0', ''),
('BK0037', 'Ekonomi Sumberdaya dan Lingkungan', '', '', 1, '', '0', ''),
('BK0038', 'Etika Profesi Hukum Norma-Norma Bagi Penegak Hukum', '', '', 1, '', '0', ''),
('BK0039', 'Etika Profesi Hukum', '', '', 1, '', '0', ''),
('BK004', 'Aspek Hukum Pengawasan Melekat Dalam Lingkungan Ap', '', '', 2, '', '0', ''),
('BK0040', 'Hukum Cara Pidana Indonesia', '', '', 1, '', '0', ''),
('BK0041', 'Hukum Lagu, Musik, dan Nasyid Menurut Syariat Islam', '', '', 1, '', '0', ''),
('BK0042', 'Hukum Acara Perdata Dalam Teori Dan Praktek', '', '', 2, '', '0', ''),
('BK0043', 'Himpunan SOal Dan Jawaban Ujian Negara Cicilan & Ujian Tengah Semester', '', '', 1, '', '0', ''),
('BK0044', 'Hukum Tanah, Jaminan, UUPA Sebagai Keberhasilan Pendayagunaan Tanah', '', '', 1, '', '0', ''),
('BK0045', 'Hukum Asuransi Perlindungan Tertanggung, Asusransi Deposito, Usaha Perasuransian', '', '', 1, '', '0', ''),
('BK0046', 'Hukum Acara Perdata Indonesia', '', '', 1, '', '0', ''),
('BK0047', 'Hukum Konsep dan Metode', '', '', 1, '', '0', ''),
('BK0048', 'Hukum Acara Pengadilan Dalam Lingkungan Peradilan Administrasi (HAPLA)', '', '', 1, '', '0', ''),
('BK0049', 'Hukum dan Ketahanan Nasional', '', '', 1, '', '0', ''),
('BK005', 'Aneka Perjanjian ', '', '', 1, '', '0', ''),
('BK0050', 'Hukum Kepailitan dan Penundaan Pembayaran Di Indonesia', '', '', 1, '', '0', ''),
('BK0051', 'Hukum Perkawinan, Hukum Kewarisan, Hukum Acara Peradilan Agama Dan Zakat', '', '', 1, '', '0', ''),
('BK0052', 'Hukum Laut Indonesia', '', '', 1, '', '0', ''),
('BK0053', 'Pokok-Pokok Hukum Perdata Indonesia', '', '', 1, '', '0', ''),
('BK0054', 'Hukum Perdata : Hukum Benda', '', '', 1, '', '0', ''),
('BK0055', 'Hukum Pembuktian Dalam Acara Perdata', '', '', 1, '', '0', ''),
('BK0056', 'Hukum Acara Pidana Indonesia', '', '', 1, '', '0', ''),
('BK0057', 'Hubungan Keuangan Antara Pemerintah Pusat dan Daerah Indonesia', '', '', 1, '', '0', ''),
('BK0058', 'Hukum Progresif : Sebuah Sintesa Hukum Indonesia', '', '', 1, '', '0', ''),
('BK0059', 'Hukum Perkawinan Adat dengan Adat Istiadat dan Upacara Adatnya', '', '', 1, '', '0', ''),
('BK006', 'An Introduction To Indonesian Law', '', '', 1, '', '0', ''),
('BK0060', 'Hukum Anti Dumping di Indonesia', '', '', 1, '', '0', ''),
('BK0061', 'Hukum Asuransi Indonesia', '', '', 1, '', '0', ''),
('BK0062', 'Hukum Perlindungan Konsumen', '', '', 1, '', '0', ''),
('BK0063', 'Hukum Tata Negara Republik Indonesia 2', '', '', 1, '', '0', ''),
('BK0064', 'Hukum Acara Perdata Indonesia', '', '', 1, '', '0', ''),
('BK0065', 'Hak Milik Intelektual (Sejarah, Teori, dan Prakteknya di Indonesia)', '', '', 1, '', '0', ''),
('BK0066', 'Hukum Asuransi Indonesia', '', '', 1, '', '0', ''),
('BK0067', 'Himpunan Yurisprudensi Tentang Hukum Perdata', '', '', 1, '', '0', ''),
('BK0068', 'Hukum Acara Peradilan Tata Usaha Negara di Indonesia', '', '', 1, '', '0', ''),
('BK0069', 'Hukum Acara Peradilan Tata Usaha Negara ', '', '', 1, '', '0', ''),
('BK007', 'Asian Copyright Handbook', '', '', 1, '', '0', ''),
('BK0070', 'Hukum Perikanan Indonesia', '', '', 1, '', '0', ''),
('BK0071', 'Hak Pengelolaan Dalam Sistem UUPA', '', '', 1, '', '0', ''),
('BK0072', 'Hukum Lingkungan Masalah dan Penanggulangan', '', '', 1, '', '0', ''),
('BK0073', 'Hukum Perdata Internasional Indonesia', '', '', 1, '', '0', ''),
('BK0074', 'Hukum & Advokasi Konsumen', '', '', 1, '', '0', ''),
('BK0075', 'Hukum Meminta minta dan mengemis dalam syariat islam', '', '', 1, '', '0', ''),
('BK0076', 'Hukum Kebendaan Perdata', '', '', 1, '', '0', ''),
('BK0077', 'Hukum Agraria Kehutanan', '', '', 1, '', '0', ''),
('BK0078', 'Hadis-hadis populer', '', '', 1, '', '0', ''),
('BK0079', 'Hukum International di Indonesia', '', '', 1, '', '0', ''),
('BK008', 'Aspek Hukum Dari Perdagangan Bebas', '', '', 1, '', '0', ''),
('BK0080', 'Himpunan peraturan peraturan dan perundang-undangan republik indonesia', '', '', 1, '', '0', ''),
('BK0081', 'Hukum jaminan di indonesia pokok-pokok hukum jaminan dan jaminan perorangan', '', '', 1, '', '0', ''),
('BK0082', 'Hukum kontrak teori & teknik penyusunan kontrak', '', '', 1, '', '0', ''),
('BK0083', 'Hukum acara pidana karakteristik penghentian penyidikan dan impilkasi hukumya', '', '', 1, '', '0', ''),
('BK0084', 'Hukum acara peradilan tata usaha negara', '', '', 1, '', '0', ''),
('BK0085', 'Hegemoni barat terhadap percaturan politik dunia', '', '', 1, '', '0', ''),
('BK0086', 'Kompilasi hukum islam dan undang-undang perkawinan, wakaf, & penyelenggaraan haji', '', '', 1, '', '0', ''),
('BK0087', 'Kumpulan Tulisan Tentang Hukum Tanah', '', '', 1, '', '0', ''),
('BK0088', 'Kompilasi Hukum Perdata Prespektif Teoretis Dan Praktik Peradilan ', '', '', 1, '', '0', ''),
('BK0089', 'Kejahatan Terhadap Keamanan & Keselamatan Negara', '', '', 1, '', '0', ''),
('BK009', 'Arresten Handelscrecht en Burgerlijk Procesrecht', '', '', 1, '', '0', ''),
('BK0090', 'Kitab Undang-undang Hukum Perdata', '', '', 1, '', '0', ''),
('BK0091', 'Kamus Hukum Internasional & Indonesia', '', '', 1, '', '0', ''),
('BK0092', 'Kebijakan Formulasi Sistem Pertanggungjawaban Pidana Korporasi', '', '', 1, '', '0', ''),
('BK0093', 'Kepentingan Umum Dalam Wewenang Jaksa Agung Mengesampingkan Perkara Pidana', '', '', 2, '', '0', ''),
('BK0094', 'Pengetahuan Hukum Perdata Dan Hukum Dagang', '', '', 1, '', '0', ''),
('BK0095', 'Pokok-Pokok Hukum Perdata', '', '', 1, '', '0', ''),
('BK0096', 'Pokok-Pokok Hukum Administrasi', '', '', 1, '', '0', ''),
('BK0097', 'Pokok-Pokok Hukum Acara Perdata', '', '', 1, '', '0', ''),
('BK0098', 'Pengantar Hukum Internasional ', '', '', 1, '', '0', ''),
('BK0099', 'Pengantar Hukum Kejahatan Bisnis', '', '', 1, '', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pm` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pm`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('PM01', 'AG0011', 'BK001', '2024-09-11', '2024-09-18', 0),
('PM02', 'AG001', 'BK001', '2024-09-08', '2024-09-10', 1),
('PM03', 'AG0012', 'BK00102', '2024-09-11', '2024-09-15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(12, 'Rajawali Pers'),
(13, 'Pustaka At-Taqwa'),
(14, 'Gadjah Mada University Press'),
(15, 'Rineka Cipta'),
(17, 'Setara Press'),
(18, 'Asia/Pacific Cultural Centre For UNESCO'),
(19, 'W. E. J. Tjeenk Wilink. Zwolle'),
(20, 'Kencana'),
(21, 'Sinar Grafika'),
(22, 'PT. Gramedia Pustaka Utama'),
(23, 'Kejaksaan Agung RI.'),
(24, 'Mandar Maju'),
(25, 'Hasil Panel Diskusi'),
(27, 'Angkasa Bandung'),
(28, 'Sega Arsy'),
(29, 'Wahyu Press'),
(30, 'Lembar Pustaka Indonesia'),
(32, 'Narasi'),
(33, 'Kompas'),
(34, 'KITA Press'),
(35, 'Nuansa Cendekia'),
(36, 'BPFE - Yogyakarta'),
(37, 'Akademika Presindo'),
(38, 'Kanisius'),
(39, 'Sawo Raya'),
(40, 'P.T Alumni'),
(41, 'Universitas Atma Jaya Yogyakarta'),
(42, 'Sinar Harapan'),
(43, 'PT. Bina Ilmu'),
(44, 'Djambatan'),
(45, 'Liberty'),
(46, 'Alumni'),
(47, 'Genta Pubishing'),
(48, 'Ghalia Indonesia '),
(50, 'PT. Citra Aditya Bakti'),
(51, 'Pustaka At-taqwa'),
(52, 'Ind-Hill Co'),
(53, 'PT.  Raja Grafindo Persada'),
(54, 'PT. eLBA Fitrah Mandiri Sejahtera'),
(55, 'Madyan Press'),
(56, 'Pradnya Paramita'),
(57, 'Liberty Yogyakarta'),
(58, 'LaksBang PRESSindo'),
(60, 'Alika'),
(61, 'Permata Press'),
(62, 'Sinar Grafika'),
(63, 'Dicky Arganova Adipratama'),
(64, 'Angkasa'),
(65, 'Pt.Intermafa'),
(66, 'Bayu media'),
(67, 'Rineka Cipta'),
(68, 'Kencana'),
(69, 'Mandar Maju'),
(70, 'Rajawali Press'),
(71, 'Akademika Pressindo'),
(72, 'Ghalia Indonesia'),
(73, 'Rineka Cipta'),
(74, 'Ghalia Indonesia'),
(75, 'Djambatan'),
(76, 'Absolute Media'),
(77, 'Sinar Grafika'),
(78, 'Darul Haq'),
(79, 'Sinar Grafika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(15, 'Bambang Sutiyoso'),
(16, 'Yazid Bin Abdul Qadir Jawas'),
(17, 'Philipus M. Hadjon'),
(18, 'Victor M. Situmorang'),
(19, 'Prof. R. Subekti'),
(20, 'Peter Mahmud Marzuki'),
(21, 'Tamotsu Hozumi'),
(22, 'Ida Susanti'),
(23, 'Mr. C. J. Van Zeben'),
(24, 'M. Irsan Nasarudin'),
(25, 'Gunawan Widjaja'),
(26, 'Leden Marpaung'),
(27, 'Richard Burton Simatupang'),
(28, 'Winarno Zain'),
(29, 'M. Yahya Harahap'),
(30, 'Hendro Dewanto'),
(31, 'H. Abu Daud Busroh'),
(32, 'Herlina Suyati Bachtiar'),
(33, 'Hyatt Aryaduta'),
(34, 'Dr. Kasmir'),
(35, 'Liza Sonia Rasjidi'),
(36, 'Juhaya S. Praja'),
(37, 'Mohammad Hatta'),
(38, 'Imam Syaukani'),
(39, 'Abu zaid'),
(40, 'Zuayriah'),
(41, 'Lamintang'),
(42, 'Tan Malaka'),
(43, 'Muhammad A.S. Hikam'),
(44, 'Salim'),
(45, 'Dr. Hari Purwadi'),
(46, 'Budi Setiyono'),
(48, 'Prof. EQ. RM Surachman'),
(49, 'Drs. Muhammad '),
(50, 'Addinul Yakin'),
(51, 'E. Sumaryono'),
(52, 'Dr. Mardani'),
(53, 'Prof. Dr. Jur. Andi Hamzah'),
(55, 'Retno Wulan Sutantio'),
(56, 'R. Soeroso'),
(57, 'Karta Sapoetra'),
(58, 'Prof. Dr. H. Man Suparman Sastrawidjaja'),
(59, 'Prof. Dr. Sudikno Mertokusumo'),
(60, 'Soetandyo Wignjosoebroto'),
(61, 'Dr. Sjachran Basah'),
(62, 'Kohar Hari Sumarno'),
(63, 'Zainal Asikin'),
(64, 'Mohd. Idris Ramulyo'),
(65, 'P. Joko Subagyo'),
(66, 'P.N.H. Simanjuntak'),
(68, 'Teguh Samudera'),
(69, 'Ahmad Yani'),
(70, 'Prof. Dr. Satjipto Rahardjo'),
(71, 'Prf. H. Hilman Hadikusuma'),
(72, 'Yulianto Syahyu'),
(73, 'Prof. Abdulkadir Muhammad'),
(74, 'Ahmadi Miru'),
(75, 'Prof. Dr. C.S.T. Kansil'),
(76, 'Drs. Muhammad Jumhana'),
(77, 'Soedharyo Soimin '),
(78, 'R. Soegijatno Tjakranegara'),
(79, 'Zairin Harahap'),
(80, 'R. Djubaidillah'),
(81, 'Djoko Tribawono'),
(82, 'Ramli Zein'),
(83, 'Prof. Mr. Dr. Sudargo Gautama'),
(84, 'Sudaryatmo'),
(85, 'Yazid bin Abdul Qadir Jawas'),
(86, 'Ny. Hj. Frieda Husni Hasbullah'),
(87, 'Bambang Eko Supriyadi'),
(88, 'Syaikh Abdurrahman As-Sakdi'),
(89, 'Jawahir Thontowi'),
(90, 'Harief Harahap'),
(91, 'Prof. Dr. Ny. Sri Soedewi Masjchoen Sofwan'),
(93, 'Dr. Imam Suroso'),
(94, 'R. Wiyono'),
(95, 'Muhammad Musa'),
(96, 'Mediya Rafeldi'),
(97, 'Bachtiar Effendi'),
(98, 'Lilik Muliyadi'),
(99, 'Drs. Adami Chazawi'),
(100, 'Niniek Suparni'),
(101, 'Subrata '),
(102, 'Prof.Dr.H.Dwidja Priyatno'),
(103, 'Dr.Khairul Anwar'),
(104, 'Drs.R.Djatmiko'),
(105, 'Prof.Subekti'),
(106, 'Lutfi Effendi'),
(107, 'Moh.Taufik Makarao'),
(108, 'Starke'),
(109, 'Prof.Dr.Romli Atmasasmita'),
(110, 'R.Soeparmono'),
(111, 'R.Soeroso'),
(112, 'Prof.Dr.H.Muhaimin'),
(113, 'Rachmadi Usman '),
(114, 'Marwan Mas'),
(115, 'Soejono '),
(116, 'Prof.H.Rozali Abdullah'),
(117, 'Moh.Taufik Makarao'),
(118, 'Dr.Leden Marpaung'),
(119, 'KH A.Busyro Karim'),
(120, 'Salim H.S'),
(121, 'Dr. Abdul Hamid As-Suhaibani'),
(122, 'Drs. H. Ahmad Wardi Muslich');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_pengembalian`) VALUES
(15, 'AG0011', 'BK001', '2024-09-11', '2024-09-18', '2024-09-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(4, 'Tsara', 'Tsara', 'admin', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
