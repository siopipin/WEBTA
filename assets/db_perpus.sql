-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2019 at 07:17 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

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
-- Table structure for table `tbl_admin`
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
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_level`, `a_nama`, `a_jeniskelamin`, `a_tempatlahir`, `a_tanggallahir`, `a_alamat`, `a_namapengguna`, `a_email`, `a_katasandi`, `a_nohp`, `a_fotoprofil`, `a_fotoktp`, `a_status`, `a_admin`, `a_createat`, `a_updateat`, `a_isdeleted`) VALUES
(10, 1, NULL, NULL, NULL, NULL, NULL, 'sio', NULL, '172e6e2d6c102ea21fd0d08d194a1853', NULL, NULL, NULL, 0, 0, '2019-01-17 01:02:23', '2019-01-17 01:02:23', 0),
(100, 0, NULL, NULL, NULL, NULL, NULL, 'demo', NULL, '62cc2d8b4bf2d8728120d052163a77df', NULL, NULL, NULL, 0, 0, '2019-01-17 01:51:14', '2019-01-17 01:51:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
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
  `b_rating` float DEFAULT '0',
  `b_isbn` varchar(255) DEFAULT NULL,
  `b_jumlah` int(11) NOT NULL DEFAULT '20',
  `b_statusdokumen` tinyint(4) NOT NULL DEFAULT '0',
  `b_tanggalsimpan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `b_tanggalupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_idbuku`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`b_idbuku`, `b_judul`, `b_deskripsi`, `b_pengarang`, `b_klasifikasi`, `b_sampul`, `b_penerbit`, `b_tahunterbit`, `b_bahasa`, `b_rating`, `b_isbn`, `b_jumlah`, `b_statusdokumen`, `b_tanggalsimpan`, `b_tanggalupdate`) VALUES
(8, 'Panduan Lengkap Office 2007, 2010, 2013, 2016', 'Microsoft Office merupakan salah satu aplikasi perkantoran yang sangat populer dan banyak digunakan oleh berbagai instansi baik negeri maupun swasta. Aplikasi ini mempunyai banyak sekali kegunaan, dimulai dari pembuatan laporan, mengolah data, membuat presentasi, mengolah database, mengirim email, dan masih banyak lagi kegunaan lainnya yang sangat membantu dalam dunia pekerjaan, pendidikan, perekonomian, dan industri. Namun, tidak sedikit dari kita yang tidak menguasai aplikasi ini, padahal skill ini merupakan salah satu skill yang harus dimiliki oleh seseorang yang ingin sukses dalam pekerjaannya.', 'Sarwandi & Cyber Creative', 'Office', 'Panduan_Lengkap_Office_2007,_2010,_2013,_2016.jpg', 'Elex Media Komputindo', '2019-01-07', 'Indonesia ·', 2.71429, '9786020487229', 19, 0, '2019-01-27 11:38:32', '2019-01-27 11:38:32'),
(7, 'Panduan Affiliate Marketing untuk Pemula', 'Ingin belajar affiliate marketing? Ingin dipandu langkah demi langkah untuk menghasilkan income dari kegiatan affiliate marketing? Butuh panduan lengkap untuk belajar affiliate marketing khusus pemula? Jika ya, buku ini adalah jawabannya. Affiliate marketing termasuk salah satu bisnis online yang bisa dijalankan oleh pemula. Dengan menjalankan kegiatan affiliate marketing, kita bisa menawarkan suatu produk di internet, lalu ketika terjadi penjualan, kita mendapatkan komisi. Affiliate marketing juga dapat dijalankan secara fleksibel dan paruh waktu.', 'Jefferly Helianthusonfri', 'Ilmu Komputer, Informasi & karya Umum', 'Panduan_Affiliate_Marketing_untuk_Pemula.jpg', 'Elex Media Komputindo', '2019-01-10', 'Indonesia', 0.571429, '9786020489452', 20, 0, '2019-01-27 10:59:41', '2019-01-27 10:59:41'),
(19, 'Photoshop, Lightroom, dan CorelDraw', 'Photoshop, Lightroom, dan CorelDraw. ? Photoshop: untuk desain grafis bitmap dan mengedit foto. ? Lightroom: untuk mengedit foto dengan lebih profesional. ? CorelDraw: untuk desain grafis vector. Semua desainer grafis, editor foto, maupun fotografer wajib mengenal ketiga software tersebut jika ingin sukses di karier maupun hobi. Buku ini memberi pengantar kepada Anda untuk mengenal secara cepat Photoshop, Lightroom, maupun CorelDraw. Syarat membaca buku ini adalah memiliki: ? Adobe Photoshop minimal versi CS4 ? Adobe Photoshop Lightroom minimal versi 5 ? CorelDraw minimal versi X5. Semoga Anda bisa menjadi desainer grafis, fotografer, dan editor foto yang sukses setelah membaca buku ini!', 'Jubilee Enterprise', 'Ilmu Komputer, Informasi & karya Umum', 'Photoshop,_Lightroom,_dan_CorelDraw.jpg', 'Elex Media Komputindo', '2019-01-15', 'Indonesia', 1.14286, '9786020461618', 20, 0, '2019-01-28 14:27:56', '2019-01-28 14:27:56'),
(9, 'Membangun Aplikasi dengan PHP, Codeigniter, dan Ajax', 'Seiring dengan perkembangan teknologi informasi yang semakin pesat, kebutuhan suatu konsep belajar mengajar berbasis TI menjadi tidak terelakkan lagi. Contohnya, pembuatan aplikasi kini merambah ke ranah pendidikan dengan konsep yang dikenal dengan sebutan e-Learning. Konsep ini membawa pengaruh terhadap terjadinya proses peralihan dari pendidikan konvensional ke bentuk digital, baik secara isi dan sistemnya. Buku ini memberikan gambaran tentang bagaimana cara membuat aplikasi ujian online dengan PHP, Codeigniter, dan Ajax dari pemahaman konsep, struktur database, koding, juga fitur-fitur pelengkap lainnya yang dapat diimplementasikan pada sekolah-sekolah dan disertai source code yang dapat diunduh pada link/tautan di dalam buku. Pembahasan dalam buku mencakup: ?Pemahaman Konsep Ujian Online ?Pemahaman Struktur Database Ujian Online', 'Uus Rusmawan', 'Internet', 'Membangun_Aplikasi_dengan_PHP,_Codeigniter,_dan_Ajax.jpg', 'Elex Media Komputindo', '2019-01-08', 'Indonesia ·', 1.92857, '9786020486000', 18, 0, '2019-01-27 11:43:23', '2019-01-27 11:43:23'),
(10, '25 Proyek Desain dengan Photoshop', 'Photoshop hingga saat ini masih merajai software desain. Jika serius ingin eksis di dunia desain, Photoshop wajib Anda kuasai. Photoshop bukan sekadar sebuah program editor gambar seperti yang diduga sebagian orang. Banyak hal yang bisa dilakukan dengan Photoshop. Hanya dengan program ini, Anda bisa merambah desain web, desain interface, desain ikon, menggambar karakter, dan tentu saja editing foto. Buku ini ingin memperlihatkan berbagai jenis desain yang bisa Anda buat di Photoshop. Itu sebabnya, materi buku ini sangat beragam, mulai dari editing hingga desain interface. Walaupun begitu, buku ini tidak rumit, termasuk bagi para pemula. Dengan banyak gambar dan hanya sedikit teori, buku ini mengajarkan berbagai teknik desain secara praktis dan ringkas.', 'Mohammad Jeprie', 'Fotografi', '25_Proyek_Desain_dengan_Photoshop.jpg', 'Elex Media Komputindo', '2019-01-01', 'Indonesia ·', 2.71429, '9786020488837', 17, 1, '2019-01-27 11:58:30', '2019-01-27 11:58:30'),
(20, 'Konsep Dasar dan Aplikasi SEM dengan Amos 24', 'Metode statistik Structural Equation Modelling (SEM) saat ini semakin populer dan diaplikasikan pada banyak bidang ilmu. Berbeda dengan metode statistik seperti parametrik, non parametrik maupun multivariat, SEM melibatkan banyak perhitungan matematis yang sangat kompleks. Namun kemajuan teknologi informasi telah memungkinkan pengolahan data pada sebuah model SEM dilakukan dengan mudah dan cepat. AMOS versi 24 adalah program aplikasi SEM yang sangat user friendly namun juga powerful, sehingga saat ini program AMOS banyak digunakan untuk mengolah berbagai model riset yang menggunakan metode SEM.\r\nBuku ini membahas berbagai konsep dasar SEM serta cara penggunaan program AMOS 24 dalam membuat dan mengolah sebuah model SEM. Untuk memudahkan pemahaman, pada setiap topik disertai contoh kasus yang relevan, bagaimana AMOS 24 mengolah data yang ada, serta cara menafsir output yang dihasilkan. Buku ini ditujukan kepada para pemula yang ingin belajar lebih jauh tentang SEM, selain kepada para Ma', 'Singgih Santoso', 'Ilmu Komputer, Informasi & karya Umum', 'Konsep_Dasar_dan_Aplikasi_SEM_dengan_Amos_24.jpg', 'Elex Media Komputindo', '2019-01-01', 'Indonesia', 4, '9786020461328', 19, 0, '2019-01-28 18:12:16', '2019-01-28 18:12:16'),
(18, 'Teknik Memasang Chatbot di Toko Online', 'Buku ini wajib dibaca bagi Anda yang memang memiliki niat mendapat uang dari internet dengan modal seadanya dan usaha ala kadarnya. Hanya bermodalkan smartphone dan aplikasi chatting seperti Facebook Messenger, LINE, maupun Telegram, Anda bisa membuka toko online otomatis yang bahkan tidak perlu Anda kelola.', 'Jubilee', 'Filsafat & Psikologi', '107296_f1.jpg', 'Elex Media', '2019-01-15', 'Inggris', 0.571429, '9786020458120', 20, 0, '2019-01-28 07:10:58', '2019-01-28 07:10:58'),
(21, 'Pemrograman Berorientasi Objek Menggunakan C#', 'Sering kali para mahasiswa mengalami kesulitan untuk menghubungkan analisis dan perancangan sistem diagram Unified Modeling Language (UML) dengan menggunakan bahasa pemrograman tertentu sebagai implementasinya. Buku ini akan menunjukkan hubungan langsung antara diagram-diagram UML di aras analisis dan perancangan dengan kode C# di aras implementasi. Dengan demikian, buku ini bisa menjadi penghubung yang sangat bermanfaat antara buku-buku yang membahas analisis perancangan sistem dengan buku-buku yang membahas pemrograman dengan pemrograman tertentu, khususnya C#.', 'Adi Nugroho', 'Rekayasa', 'Pemrograman_Berorientasi_Objek_Menggunakan_C.jpg', 'Andi Publisher', '2019-01-15', 'Bahasa Indonesia', 1.71429, '9789792966657', 19, 0, '2019-01-28 19:25:49', '2019-01-28 19:25:49'),
(22, 'Coreldraw X8 Untuk Pemula', 'Setiap pokok bahasan disertai dengan contoh latihan yang akan membantu anda dalam memahami isi materi dan pengaplikasiannya.\r\n\r\nSeri buku komputer CoerlDraw X8 untuk pemula ini sangat cocok digunakan oleh para pelajar dan pemula yang ingin mengenal dan dapat menggunakan CorelDraw X8 dengan baik.\r\n\r\nMeskipun buku ini lebih dikhususkan untuk para pemula, namun isi materi yang dibahas cukup kompleks, yaitu meliputi:\r\n\r\n- Pengenalan CorelDraw X8\r\n- Mengolah Toolbox\r\n- Mengelola Objek\r\n- Mewarnai Objek\r\n- Mengelola Objek Teks\r\n- Mengolah Efek objek\r\n- Memodifikasi Objek\r\n- Mengolah efek bitmap\r\n- Membuat Deain PIN\r\n- Mencetak dokumen', 'MADCOMS', 'Rekayasa', 'Coreldraw_X8_Untuk_Pemula.jpg', 'Andi Publisher', '2019-01-07', 'Bahasa Indonesia', 1.57143, '9789792966329', 20, 1, '2019-01-28 19:29:05', '2019-01-28 19:29:05'),
(23, 'Adobe After Effects Komplet', 'Adobe After Effects adalah software yang wajib dikuasai bagi para editor video, special f/x specialist, dan pehobi film secara umum. Dengan menggunakan After Effects, Anda bisa membuat video dengan efek memukau dan animasi canggih dengan mudah.\r\n\r\nBuku ini merangkum fitur-fitur penting yang perlu Anda kuasai dalam Adobe After Effects. Setelah membaca buku ini, Anda bisa menciptakan video untuk berbagai keperluan.', 'Gregorius Agung P', 'Rekayasa', 'Adobe_After_Effects_Komplet.jpg', 'Elex Media Komputindo', '2019-01-08', 'Bahasa Indonesia', 1.07143, '9786020459479', 19, 1, '2019-01-29 11:44:46', '2019-01-29 11:44:46'),
(24, 'Kitab Video Editing dan Efek Khusus', 'Adobe Premiere CC 2018 adalah software video editing yang paling canggih saat ini. Sebagai editor video, Anda harus mengenal dan menguasai software ini untuk mendapatkan pengalaman mengedit yang sempurna dan tanpa cacat. Buku ini membahas bagaimana memanfaatkan Adobe Premiere CC 2018 untuk keperluan editing dan penambahan efek-efek khusus.', 'Jubilee Enterprise', 'Rekayasa', 'Kitab_Video_Editing_dan_Efek_Khusus.jpg', 'Elex Media Komputindo', '2019-01-08', 'Bahasa Indonesia', 0.642857, '9786020460819', 18, 0, '2019-01-30 02:56:04', '2019-01-30 02:56:04'),
(25, '12 Jurus Edit Foto Digital dengan Photoshop CC 2018 Update', 'Fotografer dan editor foto wajib membaca buku yang mengupas 12 jurus editing foto menggunakan Adobe Photoshop CC 2018 ini. Kedua belas jurus itu adalah:\r\n\r\n? Jurus 1: Memilih Foto\r\n? Jurus 2: Komposisi dan Lensa\r\n? Jurus 3: Temperatur Cahaya\r\n? Jurus 4: Koreksi Warna\r\n? Jurus 5: Koreksi Cahaya\r\n? Jurus 6: Histogram\r\n? Jurus 7: Dodge dan Burn Tool\r\n? Jurus 8: Editing Foto\r\n? Jurus 9: Blur\r\n? Jurus 10: Seleksi\r\n? Jurus 11: Quick Mask\r\n? Jurus 12: Mencetak Foto Setelah membaca materi yang disajikan, foto yang indah baik dari segi pewarnaan, cahaya, maupun komposisi, akan bisa Anda peroleh dengan mudah dan murah!', 'Jubilee Enterprise', 'Ilmu Komputer, Informasi & karya Umum', '12_Jurus_Edit_Foto_Digital_dengan_Photoshop_CC_2018.jpg', 'Elex Media Komputindo', '2019-01-14', 'Bahasa Indonesia', 1.28571, '9786020483559', 17, 1, '2019-01-30 03:00:36', '2019-01-30 03:00:36'),
(26, 'WACANA: Meretas Jejak Kesejahteraan Desa', 'Edisi ini menyuguhkan telaah atas pemikiran yang terkandung di dalam Undang-Undang Nomor 6 Tahun 2014 tentang Desa beserta peluang dan tantangannya dalam kerangka pelaksanaannya. Sejauh mana, misalnya, muatan inklusi sosial--sebagai lawan eksklusi sosial?diemban, dikerangkai, dan diterjemahkan dalam undang-undang yang meniupkan angin kencang pembaharuan desa mi? Bagaimana prinsip dan cita-cita pemerintahan yang baik dan bersih {good and clean governance) di level desa terwujud seiring penerapan undang-undang ini?\r\n\r\nBagaimana dinamika inisiatif dan praksis perdesaan dalam merespons pelaksanaannya? Artikel-artikel di dalam edisi ini mengajak kita untuk merefleksikan optimisme yang ditiupkan undang-undang ini.', 'Jurnal Transformasi Sosial', 'Ilmu Komputer, Informasi & karya Umum', '110723_f.jpg', 'Insist Press', '2019-02-04', 'Bahasa Indonesia', 0, '14101298', 19, 0, '2019-02-07 10:43:58', '2019-02-07 10:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

DROP TABLE IF EXISTS `tbl_dokumen`;
CREATE TABLE IF NOT EXISTS `tbl_dokumen` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_namadokumen` varchar(100) NOT NULL,
  `d_idbuku` int(5) NOT NULL,
  `d_key` varchar(32) NOT NULL,
  `d_iddokumen` varchar(100) NOT NULL,
  `d_namaenkrip` varchar(255) NOT NULL,
  `d_namadekrip` varchar(255) NOT NULL,
  `d_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`d_id`, `d_namadokumen`, `d_idbuku`, `d_key`, `d_iddokumen`, `d_namaenkrip`, `d_namadekrip`, `d_tanggal`) VALUES
(13, 'Hasil Review Penguji 1.pdf', 10, 'RRYHTTVMNLNDPJJUAVEKLOIJYRRTCANY', '70108', '70108_Hasil Review Penguji 1.pdf.encrypted', 'Hasil Review Penguji 1.pdf', '2019-02-07 08:57:28'),
(14, 'Lecture Notes_pertemuan 6(1).pdf', 23, 'HOGICPIVJMESAFJTKEZBIKRLDJMBSZZS', '29036', '29036_Lecture Notes_pertemuan 6(1).pdf.encrypted', '', '2019-02-07 10:59:44'),
(15, 'Lecture Notes_pertemuan 9.pdf', 22, 'UINXRCGTEJDSGSWDIHRVLPHFZVXBZNHT', '54406', '54406_Lecture Notes_pertemuan 9.pdf.encrypted', '', '2019-02-07 11:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_level` tinyint(4) DEFAULT '3',
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
  `p_verifikasi` tinyint(4) DEFAULT '0',
  `p_createat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `p_updateat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `p_isdeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`p_id`, `p_level`, `p_nama`, `p_jeniskelamin`, `p_tempatlahir`, `p_tanggallahir`, `p_alamat`, `p_namapengguna`, `p_email`, `p_katasandi`, `p_nohp`, `p_fotoprofil`, `p_fotoktp`, `p_status`, `p_verifikasi`, `p_createat`, `p_updateat`, `p_isdeleted`) VALUES
(19, NULL, 'ardi', NULL, NULL, NULL, NULL, 'ardi', 'ardi@mail.com', 'b623a7cebe5be1abc1409e528f6b4451', NULL, NULL, NULL, 1, 0, '2019-01-17 06:07:54', '2019-01-17 06:07:54', 0),
(13, NULL, 'Pipin', NULL, NULL, NULL, NULL, 'pipin', 'pipin@mail.com', '3a1ed9acd58baf9eacdecea6310279ad', NULL, NULL, NULL, 1, 1, '2019-01-17 00:52:23', '2019-01-17 00:52:23', 0),
(16, NULL, 'albert', 'Laki-laki', '', '0000-00-00', '', 'albert', 'albert@mail.com', '73503e6f479c632ebfebc6e58a3cd335', '', 'albert.png', NULL, 1, 1, '2019-01-17 03:33:57', '2019-01-17 03:33:57', 0),
(15, NULL, 'Heru Kurniawan', 'Laki-laki', 'Pakam', '0000-00-00', 'Jl. Dekat Pakam No. 109', 'heru', 'heru@mail.com', '54ca719ab0dd44a736a6d9c298543199', '082246781686', 'heru.png', '15.png', 1, 1, '2019-01-17 03:00:25', '2019-01-17 03:00:25', 0),
(18, NULL, 'citra', 'Laki-laki', '', '0000-00-00', '', 'citra', 'citra@mail.com', 'a471cc23d89f15b4c552246412714ee8', '', 'citra.png', NULL, 1, 1, '2019-01-17 05:30:48', '2019-01-17 05:30:48', 0),
(20, NULL, 'prima', NULL, NULL, NULL, NULL, 'prima', 'prima@mail.com', 'ae412c64bb1161979d879424c800093f', NULL, NULL, '20.jpg', 0, 0, '2019-01-20 08:06:15', '2019-01-20 08:06:15', 0),
(24, 3, 'Sonia', NULL, NULL, NULL, NULL, 'sonia', 'sonia@mail.com', 'fc827017dea930384d8768553c5c8caf', NULL, NULL, NULL, 1, 0, '2019-02-07 14:18:12', '2019-02-07 14:18:12', 0),
(25, 3, 'dimas', NULL, NULL, NULL, NULL, 'dimas', 'dimas@mail.com', '51947e3cf64ee746b6f2c73d174d525a', NULL, NULL, NULL, 1, 0, '2019-02-07 14:26:06', '2019-02-07 14:26:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_iduser` int(11) NOT NULL,
  `r_idbuku` int(11) NOT NULL,
  `r_rating` float NOT NULL,
  `r_ulasan` varchar(500) NOT NULL,
  `r_tanggalrating` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`r_id`, `r_iduser`, `r_idbuku`, `r_rating`, `r_ulasan`, `r_tanggalrating`) VALUES
(1, 19, 8, 8, '', '2019-01-31 19:51:32'),
(2, 19, 19, 8, '', '2019-01-31 19:51:32'),
(3, 19, 9, 8, '', '2019-01-31 19:51:32'),
(4, 19, 10, 8, '', '2019-01-31 19:51:32'),
(5, 13, 8, 7, '', '2019-01-31 19:51:32'),
(6, 13, 19, 8, '', '2019-01-31 19:51:32'),
(7, 13, 10, 7, '', '2019-01-31 19:51:32'),
(8, 13, 21, 8, '', '2019-01-31 19:51:32'),
(9, 16, 8, 7, '', '2019-01-31 19:51:32'),
(10, 16, 9, 6, '', '2019-01-31 19:51:32'),
(11, 16, 10, 7, '', '2019-01-31 19:51:32'),
(12, 16, 22, 8, '', '2019-01-31 19:51:32'),
(13, 16, 25, 9, '', '2019-01-31 19:51:32'),
(14, 15, 21, 8, '', '2019-01-31 19:51:32'),
(16, 15, 23, 8, '', '2019-01-31 19:51:32'),
(17, 15, 24, 9, '', '2019-01-31 19:51:32'),
(18, 15, 25, 9, '', '2019-01-31 19:51:32'),
(19, 20, 8, 6, '', '2019-01-31 19:51:32'),
(20, 20, 9, 5, '', '2019-01-31 19:51:32'),
(21, 20, 10, 6, '', '2019-01-31 19:51:32'),
(22, 20, 22, 8, '', '2019-01-31 19:51:32'),
(23, 20, 23, 7, '', '2019-01-31 19:51:32'),
(24, 21, 21, 8, '', '2019-01-31 19:51:32'),
(25, 21, 22, 6, '', '2019-01-31 19:51:32'),
(26, 1, 7, 8, '', '2019-02-01 17:07:51'),
(34, 15, 9, 8, '', '2019-02-04 00:18:07'),
(41, 15, 18, 8, '   Buku yang bagus, semoga dapat bermanfaat untuk kalian yang membacanya Update', '2019-02-04 00:56:07'),
(42, 15, 8, 10, '  Bukunya keren sekali coek', '2019-02-05 12:51:59'),
(43, 15, 10, 10, 'Buku ini sangat bagus', '2019-02-07 10:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `t_idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `t_idpengguna` varchar(5) DEFAULT NULL,
  `t_idbuku` varchar(5) DEFAULT NULL,
  `t_tanggalpinjam` datetime DEFAULT CURRENT_TIMESTAMP,
  `t_tanggalkembali` datetime DEFAULT NULL,
  `t_status` char(2) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`t_idtransaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`t_idtransaksi`, `t_idpengguna`, `t_idbuku`, `t_tanggalpinjam`, `t_tanggalkembali`, `t_status`) VALUES
(29, '15', '21', '2019-02-04 11:20:04', '2019-02-04 11:39:41', 'N'),
(19, '15', '25', '2019-02-03 19:29:24', '2019-02-04 11:39:58', 'N'),
(25, '15', '18', '2019-02-04 07:52:45', '2019-02-04 11:39:47', 'N'),
(38, '15', '22', '2019-02-05 15:09:19', '2019-02-12 08:09:19', 'N'),
(45, '15', '25', '2019-02-07 09:53:43', '2019-02-14 02:53:43', 'N'),
(40, '15', '24', '2019-02-05 15:47:16', '2019-02-12 08:47:16', 'N'),
(44, '15', '8', '2019-02-05 15:50:48', '2019-02-12 08:50:48', 'N'),
(43, '15', '9', '2019-02-05 15:49:39', '2019-02-05 08:50:38', 'N'),
(46, '15', '10', '2019-02-07 10:00:49', '2019-02-14 03:00:49', 'N'),
(47, '15', '25', '2019-02-07 10:05:19', '2019-02-14 03:05:19', 'N'),
(48, '15', '25', '2019-02-07 15:03:30', '2019-02-14 08:03:30', 'N'),
(49, '15', '10', '2019-02-07 15:59:13', '2019-02-14 08:59:13', 'N'),
(50, '15', '10', '2019-02-07 16:23:53', '2019-02-14 09:23:53', 'Y'),
(51, '15', '23', '2019-02-07 19:36:05', '2019-02-14 12:36:05', 'Y'),
(52, '15', '26', '2019-02-07 19:48:48', '2019-02-14 12:48:48', 'Y'),
(53, '15', '24', '2019-02-07 19:50:49', '2019-02-14 12:50:49', 'Y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
