-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 28 Jan 2019 pada 17.31
-- Versi server: 5.7.23
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_level` int(4) DEFAULT '1',
  `a_nama` varchar(200) DEFAULT NULL,
  `a_jeniskelamin` varchar(200) DEFAULT NULL,
  `a_tempatlahir` varchar(200) DEFAULT NULL,
  `a_tanggallahir` date DEFAULT NULL,
  `a_alamat` varchar(200) DEFAULT NULL,
  `a_namapengguna` varchar(200) DEFAULT NULL,
  `a_email` varchar(200) DEFAULT NULL,
  `a_katasandi` varchar(200) DEFAULT NULL,
  `a_nohp` varchar(200) DEFAULT NULL,
  `a_fotoprofil` varchar(200) DEFAULT NULL,
  `a_fotoktp` varchar(200) DEFAULT NULL,
  `a_status` tinyint(4) DEFAULT '0',
  `a_admin` tinyint(4) DEFAULT '0',
  `a_createat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `a_updateat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `a_isdeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_level`, `a_nama`, `a_jeniskelamin`, `a_tempatlahir`, `a_tanggallahir`, `a_alamat`, `a_namapengguna`, `a_email`, `a_katasandi`, `a_nohp`, `a_fotoprofil`, `a_fotoktp`, `a_status`, `a_admin`, `a_createat`, `a_updateat`, `a_isdeleted`) VALUES
(10, 1, NULL, NULL, NULL, NULL, NULL, 'sio', NULL, '172e6e2d6c102ea21fd0d08d194a1853', NULL, NULL, NULL, 0, 0, '2019-01-17 01:02:23', '2019-01-17 01:02:23', 0),
(100, 0, NULL, NULL, NULL, NULL, NULL, 'demo', NULL, '62cc2d8b4bf2d8728120d052163a77df', NULL, NULL, NULL, 0, 0, '2019-01-17 01:51:14', '2019-01-17 01:51:14', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

DROP TABLE IF EXISTS `tbl_buku`;
CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `b_idbuku` int(5) NOT NULL AUTO_INCREMENT,
  `b_judul` varchar(255) DEFAULT NULL,
  `b_deskripsi` varchar(1000) DEFAULT NULL,
  `b_pengarang` varchar(255) DEFAULT NULL,
  `b_klasifikasi` varchar(200) DEFAULT NULL,
  `b_sampul` varchar(255) DEFAULT NULL,
  `b_penerbit` varchar(255) DEFAULT NULL,
  `b_tahunterbit` date DEFAULT NULL,
  `b_bahasa` varchar(255) DEFAULT NULL,
  `b_rating` tinyint(5) DEFAULT NULL,
  `b_isbn` varchar(255) DEFAULT NULL,
  `b_jumlah` int(11) NOT NULL DEFAULT '20',
  `b_tanggalsimpan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `b_tanggalupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_idbuku`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`b_idbuku`, `b_judul`, `b_deskripsi`, `b_pengarang`, `b_klasifikasi`, `b_sampul`, `b_penerbit`, `b_tahunterbit`, `b_bahasa`, `b_rating`, `b_isbn`, `b_jumlah`, `b_tanggalsimpan`, `b_tanggalupdate`) VALUES
(8, 'Panduan Lengkap Office 2007, 2010, 2013, 2016', 'Microsoft Office merupakan salah satu aplikasi perkantoran yang sangat populer dan banyak digunakan oleh berbagai instansi baik negeri maupun swasta. Aplikasi ini mempunyai banyak sekali kegunaan, dimulai dari pembuatan laporan, mengolah data, membuat presentasi, mengolah database, mengirim email, dan masih banyak lagi kegunaan lainnya yang sangat membantu dalam dunia pekerjaan, pendidikan, perekonomian, dan industri. Namun, tidak sedikit dari kita yang tidak menguasai aplikasi ini, padahal skill ini merupakan salah satu skill yang harus dimiliki oleh seseorang yang ingin sukses dalam pekerjaannya.', 'Sarwandi & Cyber Creative', 'Office', 'Panduan_Lengkap_Office_2007,_2010,_2013,_2016.jpg', 'Elex Media Komputindo', '2019-01-07', 'Indonesia ·', 4, '9786020487229', 20, '2019-01-27 11:38:32', '2019-01-27 11:38:32'),
(7, 'Panduan Affiliate Marketing untuk Pemula', 'Ingin belajar affiliate marketing? Ingin dipandu langkah demi langkah untuk menghasilkan income dari kegiatan affiliate marketing? Butuh panduan lengkap untuk belajar affiliate marketing khusus pemula? Jika ya, buku ini adalah jawabannya. Affiliate marketing termasuk salah satu bisnis online yang bisa dijalankan oleh pemula. Dengan menjalankan kegiatan affiliate marketing, kita bisa menawarkan suatu produk di internet, lalu ketika terjadi penjualan, kita mendapatkan komisi. Affiliate marketing juga dapat dijalankan secara fleksibel dan paruh waktu.', 'Jefferly Helianthusonfri', 'Ilmu Komputer, Informasi & karya Umum', 'Panduan_Affiliate_Marketing_untuk_Pemula.jpg', 'Elex Media Komputindo', '2019-01-10', 'Indonesia', 5, '9786020489452', 20, '2019-01-27 10:59:41', '2019-01-27 10:59:41'),
(19, 'Photoshop, Lightroom, dan CorelDraw', 'Photoshop, Lightroom, dan CorelDraw. ? Photoshop: untuk desain grafis bitmap dan mengedit foto. ? Lightroom: untuk mengedit foto dengan lebih profesional. ? CorelDraw: untuk desain grafis vector. Semua desainer grafis, editor foto, maupun fotografer wajib mengenal ketiga software tersebut jika ingin sukses di karier maupun hobi. Buku ini memberi pengantar kepada Anda untuk mengenal secara cepat Photoshop, Lightroom, maupun CorelDraw. Syarat membaca buku ini adalah memiliki: ? Adobe Photoshop minimal versi CS4 ? Adobe Photoshop Lightroom minimal versi 5 ? CorelDraw minimal versi X5. Semoga Anda bisa menjadi desainer grafis, fotografer, dan editor foto yang sukses setelah membaca buku ini!', 'Jubilee Enterprise', 'Ilmu Komputer, Informasi & karya Umum', 'Photoshop,_Lightroom,_dan_CorelDraw.jpg', 'Elex Media Komputindo', '2019-01-15', 'Indonesia', 4, '9786020461618', 20, '2019-01-28 14:27:56', '2019-01-28 14:27:56'),
(9, 'Membangun Aplikasi dengan PHP, Codeigniter, dan Ajax', 'Seiring dengan perkembangan teknologi informasi yang semakin pesat, kebutuhan suatu konsep belajar mengajar berbasis TI menjadi tidak terelakkan lagi. Contohnya, pembuatan aplikasi kini merambah ke ranah pendidikan dengan konsep yang dikenal dengan sebutan e-Learning. Konsep ini membawa pengaruh terhadap terjadinya proses peralihan dari pendidikan konvensional ke bentuk digital, baik secara isi dan sistemnya. Buku ini memberikan gambaran tentang bagaimana cara membuat aplikasi ujian online dengan PHP, Codeigniter, dan Ajax dari pemahaman konsep, struktur database, koding, juga fitur-fitur pelengkap lainnya yang dapat diimplementasikan pada sekolah-sekolah dan disertai source code yang dapat diunduh pada link/tautan di dalam buku. Pembahasan dalam buku mencakup: ?Pemahaman Konsep Ujian Online ?Pemahaman Struktur Database Ujian Online', 'Uus Rusmawan', 'Internet', 'Membangun_Aplikasi_dengan_PHP,_Codeigniter,_dan_Ajax.jpg', 'Elex Media Komputindo', '2019-01-08', 'Indonesia ·', 4, '9786020486000', 20, '2019-01-27 11:43:23', '2019-01-27 11:43:23'),
(10, '25 Proyek Desain dengan Photoshop', 'Photoshop hingga saat ini masih merajai software desain. Jika serius ingin eksis di dunia desain, Photoshop wajib Anda kuasai. Photoshop bukan sekadar sebuah program editor gambar seperti yang diduga sebagian orang. Banyak hal yang bisa dilakukan dengan Photoshop. Hanya dengan program ini, Anda bisa merambah desain web, desain interface, desain ikon, menggambar karakter, dan tentu saja editing foto. Buku ini ingin memperlihatkan berbagai jenis desain yang bisa Anda buat di Photoshop. Itu sebabnya, materi buku ini sangat beragam, mulai dari editing hingga desain interface. Walaupun begitu, buku ini tidak rumit, termasuk bagi para pemula. Dengan banyak gambar dan hanya sedikit teori, buku ini mengajarkan berbagai teknik desain secara praktis dan ringkas.', 'Mohammad Jeprie', 'Fotografi', '25_Proyek_Desain_dengan_Photoshop.jpg', 'Elex Media Komputindo', '2019-01-01', 'Indonesia ·', 5, '9786020488837', 20, '2019-01-27 11:58:30', '2019-01-27 11:58:30'),
(18, 'Teknik Memasang Chatbot di Toko Online', 'Buku ini wajib dibaca bagi Anda yang memang memiliki niat mendapat uang dari internet dengan modal seadanya dan usaha ala kadarnya. Hanya bermodalkan smartphone dan aplikasi chatting seperti Facebook Messenger, LINE, maupun Telegram, Anda bisa membuka toko online otomatis yang bahkan tidak perlu Anda kelola.', 'Jubilee', 'Filsafat & Psikologi', '107296_f1.jpg', 'Elex Media', '2019-01-15', 'Inggris', 5, '9786020458120', 20, '2019-01-28 07:10:58', '2019-01-28 07:10:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_roleid` tinyint(4) DEFAULT NULL,
  `p_nama` varchar(200) DEFAULT NULL,
  `p_jeniskelamin` varchar(200) DEFAULT NULL,
  `p_tempatlahir` varchar(200) DEFAULT NULL,
  `p_tanggallahir` date DEFAULT NULL,
  `p_alamat` varchar(200) DEFAULT NULL,
  `p_namapengguna` varchar(200) DEFAULT NULL,
  `p_email` varchar(200) DEFAULT NULL,
  `p_katasandi` varchar(32) DEFAULT NULL,
  `p_nohp` varchar(200) DEFAULT NULL,
  `p_fotoprofil` varchar(200) DEFAULT NULL,
  `p_fotoktp` varchar(200) DEFAULT NULL,
  `p_status` tinyint(4) DEFAULT '0',
  `p_isadmin` tinyint(4) DEFAULT '0',
  `p_createat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `p_updateat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `p_isdeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`p_id`, `p_roleid`, `p_nama`, `p_jeniskelamin`, `p_tempatlahir`, `p_tanggallahir`, `p_alamat`, `p_namapengguna`, `p_email`, `p_katasandi`, `p_nohp`, `p_fotoprofil`, `p_fotoktp`, `p_status`, `p_isadmin`, `p_createat`, `p_updateat`, `p_isdeleted`) VALUES
(19, NULL, 'ardi', NULL, NULL, NULL, NULL, 'ardi', 'ardi@mail.com', 'b623a7cebe5be1abc1409e528f6b4451', NULL, NULL, NULL, 1, 0, '2019-01-17 06:07:54', '2019-01-17 06:07:54', 0),
(13, NULL, 'Pipin', NULL, NULL, NULL, NULL, 'pipin', 'pipin@mail.com', '3a1ed9acd58baf9eacdecea6310279ad', NULL, NULL, NULL, 1, 0, '2019-01-17 00:52:23', '2019-01-17 00:52:23', 0),
(16, NULL, 'albert', NULL, NULL, NULL, NULL, 'albert', 'albert@mail.com', '73503e6f479c632ebfebc6e58a3cd335', NULL, NULL, NULL, 1, 0, '2019-01-17 03:33:57', '2019-01-17 03:33:57', 0),
(15, NULL, 'heru', NULL, NULL, NULL, NULL, 'heru', 'heru@mail.com', '54ca719ab0dd44a736a6d9c298543199', NULL, NULL, NULL, 1, 0, '2019-01-17 03:00:25', '2019-01-17 03:00:25', 0),
(18, NULL, 'citra', NULL, NULL, NULL, NULL, 'citra', 'citra@mail.com', 'a471cc23d89f15b4c552246412714ee8', NULL, NULL, NULL, 1, 0, '2019-01-17 05:30:48', '2019-01-17 05:30:48', 0),
(20, NULL, 'prima', NULL, NULL, NULL, NULL, 'prima', 'prima@mail.com', 'ae412c64bb1161979d879424c800093f', NULL, NULL, NULL, 0, 0, '2019-01-20 08:06:15', '2019-01-20 08:06:15', 0),
(21, NULL, 'vina', NULL, NULL, NULL, NULL, 'vina', 'vina@mail.com', 'cd3917432dff38d9fd5fd8986aad4fa2', NULL, NULL, NULL, 1, 0, '2019-01-20 08:11:33', '2019-01-20 08:11:33', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
