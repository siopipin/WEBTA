-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2019 at 02:47 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

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
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

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
(26, 'WACANA: Meretas Jejak Kesejahteraan Desa', 'Edisi ini menyuguhkan telaah atas pemikiran yang terkandung di dalam Undang-Undang Nomor 6 Tahun 2014 tentang Desa beserta peluang dan tantangannya dalam kerangka pelaksanaannya. Sejauh mana, misalnya, muatan inklusi sosial--sebagai lawan eksklusi sosial?diemban, dikerangkai, dan diterjemahkan dalam undang-undang yang meniupkan angin kencang pembaharuan desa mi? Bagaimana prinsip dan cita-cita pemerintahan yang baik dan bersih {good and clean governance) di level desa terwujud seiring penerapan undang-undang ini?\r\n\r\nBagaimana dinamika inisiatif dan praksis perdesaan dalam merespons pelaksanaannya? Artikel-artikel di dalam edisi ini mengajak kita untuk merefleksikan optimisme yang ditiupkan undang-undang ini.', 'Jurnal Transformasi Sosial', 'Ilmu Komputer, Informasi & karya Umum', '110723_f.jpg', 'Insist Press', '2019-02-04', 'Bahasa Indonesia', 0, '14101298', 19, 0, '2019-02-07 10:43:58', '2019-02-07 10:43:58'),
(27, 'Ghost Stories of an Antiquary', 'Renowned for their wit, erudition and suspense, these stories are each masterfully constructed and represent a high achievement in the ghost genre. The details of horror are almost never explicit, the stories relying on a gentle, bucolic background to emphasise the awfulness of the otherworldly intrusions. James’ style of writing can be considered as gothic.', 'M. R. James', 'Ilmu Komputer, Informasi & karya Umum', 'Ghost_Stories_of_an_Antiquary.jpg', 'epubbooks.com', '2012-01-06', 'Bahasa Inggris', 0, '978-1619492486', 20, 1, '2019-02-08 07:52:13', '2019-02-08 07:52:13'),
(28, 'Work of Art', 'Three generations of the Weagle family grow up in and work for boarding houses, inns and hotels. Focus is on two brothers, Myron and Ora, of the second generation. Poetic, ethereal Ora could not wait to escape hotel drudgery, though never too proud to ask plodding Myron for money.', 'Sinclair Lewis', 'Ilmu Komputer, Informasi & karya Umum', 'Work_of_Art.jpg', 'epubbooks.com', '1999-12-01', 'Bahasa Inggris', 0, '978-0404201593', 20, 1, '2019-02-08 08:00:22', '2019-02-08 08:00:22'),
(29, 'Deluge', 'A great cataclysm shakes the world, and much of Great Britain sinks beneath the ocean during a terrifying windstorm that has already flattened most of mankind’s dwellings. Deluge is one of the most famous of the English catastrophe novels. Beautifully written and action packed-RKO Radio Pictures even filmed this story-the novel depicts a flood so severe that it destroys modern civilization, leaving the few survivors to adapt to the rigors of the natural world.', 'S Fowler Wright', 'Tidak ada Klasifikasi (sebelumnya untuk Biografi)', 'Deluge.jpg', 'epubbooks.com', '2003-08-13', 'Bahasa Inggris', 0, '978-0819566607', 20, 1, '2019-02-08 08:06:57', '2019-02-08 08:06:57'),
(30, 'A General Introduction to Psychoanalysis', 'Psychoanalysis was never just a method of treatment, rather a vision of the human condition which has continued to fascinate and provoke long after the death of its originator. Its central hypothesis, that we live in conflict with ourselves and seek to resolve matters by turning away from reality, did not emerge from experimental science but from self-examination and the unique opportunities for observation presented by the psychoanalytic technique - in particular, from the confessions produced by ‘free-association’ in Freud’s consulting room. Written during the turmoil of the First World War, A General Introduction to Psychoanalysis was distilled from a series of lectures given at Vienna University, but had to wait for the war to end before being made available to the English speaking world.', 'Sigmund Freud', 'Psikologi', 'A_General_Introduction_to_Psychoanalysis.jpg', 'epubbooks.com', '2012-06-08', 'Bahasa Inggris', 0, '978-1840226867', 20, 1, '2019-02-08 08:13:07', '2019-02-08 08:13:07'),
(31, 'How to Analyze People on Sight', 'Modern science has proved that the fundamental traits of every individual are indelibly stamped in the shape of his body, head, face and hands–an X-ray by which you can read the characteristics of any person on sight. From this book you are going to learn what type of person you are and the main reasons why you have not been getting the maximum out of yourself. Also you are going to learn how to get the maximum co-operation out of others. This co-operation is vital to happiness and success.', 'epubbooks.com', 'Ilmu Komputer, Informasi & karya Umum', 'How_to_Analyze_People_on_Sight.jpg', 'Elsie Benedict', '2010-08-23', 'Bahasa Inggris', 0, '978-1453756249', 20, 1, '2019-02-08 08:18:21', '2019-02-08 08:18:21'),
(32, 'A Modern Utopia', 'Wells’ uncanny ability to highlight the problems which are now most acute and supply tentative solutions that allow a maximum of individual freedom merits serious consideration. A Modern Utopia is one of the first important blueprints for the modern welfare state and an early major statement of Wells’ idea of the World State, an idea that is perhaps his greatest contribution to the intellectual history of this century. In this quintessential utopia Wells sums up and clarifies the utopia’s of the past, and brings them into contact with the world of the present.', 'H. G. Wells', 'Ilmu Komputer, Informasi & karya Umum', 'A_Modern_Utopia.jpg', 'epubbooks.com', '2006-04-25', 'Bahasa Inggris', 0, '978-0141441122', 20, 1, '2019-02-08 08:22:24', '2019-02-08 08:22:24'),
(33, 'Free Culture', 'Lawrence Lessig, “the most important thinker on intellectual property in the Internet era”, masterfully argues that never before in human history has the power to control creative progress been so concentrated in the hands of the powerful few, the so-called Big Media. Never before have the cultural powers- that-be been able to exert such control over what we can and can’t do with the culture around us. Our society defends free markets and free speech; why then does it permit such top-down control? To lose our long tradition of free culture, Lawrence Lessig shows us, is to lose our freedom to create, our freedom to build, and, ultimately, our freedom to imagine.', 'Lawrence Lessig', 'Ilmu Komputer, Informasi & karya Umum', 'cover1.jpg', 'epubbooks.com', '2015-11-13', 'Bahasa Inggris', 0, '978-8269018202', 20, 1, '2019-02-08 08:36:52', '2019-02-08 08:36:52'),
(36, 'The Lion and the Unicorn', 'Orwell’s moving reflections on the English character and his passionate belief in the need for political change. The Lion and the Unicorn was written in London during the worst period of the blitz. It is vintage Orwell, a dynamic outline of his belief in socialism, patriotism and an English revolution. His fullest political statement, it has been described as ‘one of the most moving and incisive portraits of the English character’ and is as relevant now as it ever has been.', 'George Orwell', 'Ilmu Komputer, Informasi & karya Umum', 'The_Lion_and_the_Unicorn.jpg', 'epubbooks.com', '1976-06-01', 'Bahasa Inggris', 0, '978-0404146917', 20, 1, '2019-02-08 09:02:33', '2019-02-08 09:02:33'),
(35, 'The Temptation of St Antony', 'The Temptation of St. Antony is based on the story of the third-century saint who lived on an isolated mountaintop in the Egyptian desert. Saint Anthony, while living in the desert, remembers former temptations and is beset by the onslaught of philosophic doubt.', 'Gustave Flaubert', 'Ilmu Komputer, Informasi & karya Umum', 'The_Temptation_of_St_Antony.jpg', 'epubbooks.com', '2013-09-12', 'Bahasa Inggris', 0, '978-1230735702', 20, 1, '2019-02-08 08:51:30', '2019-02-08 08:51:30'),
(37, 'Anticipations', 'In 1901, the great writer and social critic attempted to predict the future in this book, a fascinating mix of accurate forecasts — development of cars, buses and trucks, use of flying machines in combat, decline of permanent marriage — and wild misses, including the prediction that submarines will suffocate their crews and founder at sea.', 'H. G Wells', 'Ilmu Komputer, Informasi & karya Umum', 'Anticipations.jpg', 'epubbooks.com', '2013-06-29', 'Bahasa Inggris', 0, '978-1490565675', 20, 1, '2019-02-08 09:05:54', '2019-02-08 09:05:54'),
(38, 'Unto This Last', 'A closely argued assault on the science of political economy, which dominated the Victorian period. Ruskin was a profoundly conservative man who looked back to the Middle Ages as a Utopia, yet his ideas had a considerable influence on the British socialist movement. And in making his powerful moral and aesthetic case against the dangers of unhindered industrialization he was strangely prophetic. This volume shows the astounding range and depth of Ruskin’s work, and in an illuminating introduction the editor reveals the consistency of Ruskin’s philosophy and his adamant belief that questions of economics, art and science could not be separated from questions of morality. In Ruskin’s words, ‘There is no Wealth but Life.’', 'John Ruskin', 'Ilmu Komputer, Informasi & karya Umum', 'Unto_This_Last.jpg', 'epubbooks.com', '2007-09-24', 'Bahasa Inggris', 0, '978-1599868059', 20, 1, '2019-02-08 09:09:10', '2019-02-08 09:09:10'),
(39, 'The River War', 'Here Sir Winston S. Churchill tells the tale of the Anglo-Egyptian reconquest of the Sudan. It isn’t just an account of the battles and the politics; it’s the story of the destiny of the people of the region: Churchill with his powerful insight tells how the war changed the fates of England, Egypt, and the Arabian peoples in northeast Africa. In vivid style the book describes the background to the war, the relationship of the Upper Nile to Egypt, the murder of General Charles George Gordon in the siege at Khartoum, the political reaction in England, and Kitchener’s elaborate preparations for the war. While in the Sudan, Churchill participated in the Battle of Omdurman. Churchill comments at length on the mechanisation of war with use of the telegraph, railroad, and a new generation of weaponry.', 'Sir Winston S. Churchill', 'Ilmu Komputer, Informasi & karya Umum', 'The_River_War.jpg', 'epubbooks.com', '2013-03-13', 'Bahasa Inggris', 0, '978-1482759150', 20, 1, '2019-02-08 09:16:23', '2019-02-08 09:16:23'),
(40, 'The Story of the Malakand Field Force', 'In his first book, the renowned statesman and historian chronicles an 1897 British military campaign on the Northwest Frontier, in the vicinity of modern Pakistan and Afghanistan. Churchill served as a correspondent and cavalry officer in the conflict, and his incisive reportage reflects the energy and vision that re-emerged in his leadership during World War II.\r\n\r\nAt the time of the clash, Churchill was serving as a subaltern in the 4th Hussars. Weary of regimental life, the young soldier drew upon family connections to find a place among the brigades headed for the frontier. There he participated in his first combat in the Mamund Valley, where British troops suppressed a revolt among the region’s Pathan tribes. Churchill’s series of letters to the London Daily Telegraph formed the basis for this book, which he declared “the most noteworthy act of my life,” reflecting “the chances of my possible success in the world.” A century later, the towering historical figure’s account of milit', 'Sir Winston S. Churchill', 'Ilmu Komputer, Informasi & karya Umum', 'The_Story_of_the_Malakand_Field_Force.jpg', 'epubbooks.com', '2009-09-09', 'Bahasa Inggris', 0, '978-1439297568', 20, 1, '2019-02-08 09:19:58', '2019-02-08 09:19:58'),
(41, 'Darkwater', 'The distinguished American civil rights leader, Du Bois first published these fiery essays, sketches, and poems individually nearly 100 years ago in the Atlantic, the Journal of Race Development, and other periodicals. Reflecting the author’s ideas as a politician, historian, and artist, this volume has long moved and inspired readers with its militant cry for social, political, and economic reforms for black Americans. Essential reading for students of African-American history.', 'W. E. B. Du Bois', 'sosial masalah & layanan sosial', 'Darkwater.jpg', 'epubbooks.com', '2009-09-09', 'Bahasa Inggris', 0, '978-1532814068', 20, 1, '2019-02-08 09:30:09', '2019-02-08 09:30:09'),
(42, 'Old Testament Legends', 'This collection is a series of stories not found in the Bible, but found in other works he translated. Among these stories are Adam, about how God showed Adam and Eve how to live outside of Eden, and Solomon and the Demons, the story of how Solomon tamed the demons told from the point of view of the King.', 'M. R. James', 'Bea Cukai, etiket & cerita rakyat', 'Old_Testament_Legends.jpg', 'epubbooks.com', '2015-01-09', 'Bahasa Inggris', 0, '978-1506140896', 20, 1, '2019-02-08 09:38:12', '2019-02-08 09:38:12'),
(43, 'The Demi-Gods', 'In The Demi-Gods, a group of ancient heroes in the form of winged angels show up one night in the camp of the wandering Mac Canns (Patsy, his daughter Mary and their downtrodden donkey). Together the little group wanders around rural Ireland: telling stories, creating mischief and running into some familiar yet often unwelcome faces.', 'James Stephens', 'Bea Cukai, etiket & cerita rakyat', 'The_Demi-Gods.jpg', 'epubbooks.com', '2014-08-14', 'Bahasa Inggris', 0, '978-1500829803', 20, 1, '2019-02-08 09:43:17', '2019-02-08 09:43:17'),
(44, 'Cinderella', 'Lost in her day dreams, Cinderella imagines a new life far far way from the evils of her stepsisters and stepmother. But when the prince announces a ball is to be given and Cinderella’s terrible stepsisters refuse to let her attend, Cinderella’s dreams are crushed. That is until her fairy godmother appears and waves her magical wand.', 'Henry W. Hewet', 'Bea Cukai, etiket & cerita rakyat', 'Cinderella.jpg', 'epubbooks.com', '2015-10-07', 'Bahasa Inggris', 0, '978-1517603755', 20, 1, '2019-02-08 09:46:39', '2019-02-08 09:46:39'),
(45, 'Beauty and the Beast', 'A beautiful daughter dreams of meeting a handsome prince, but in order to save her father’s life, she leaves home to live with a terrible, frightening beast. Though her patron is hideous, his disarming generosity slowly leads to a surprising connection. Generations of children have been fascinated by the story of the girl named Beauty, who grows to love a fearsome beast by learning to see and cherish his kindness, generosity, and intelligence.', 'Jeanne-Marie Leprince de Beaumont', 'Bea Cukai, etiket & cerita rakyat', 'Beauty_and_the_Beast.jpg', 'epubbooks.com', '2012-03-15', 'Bahasa Inggris', 0, '978-1470075415', 20, 1, '2019-02-08 09:50:21', '2019-02-08 09:50:21'),
(46, 'Irish Fairy Tales', 'Take a trip through the rich folklore of Ireland in this enchanting volume from author James Stephens. Fairy kings, femmes fatales, bewitched animals, epic feuds – these action-packed stories traverse a broad spectrum of themes and settings. Folklore fans and readers interested in Gaelic and Celtic culture will appreciate this collection.', 'James Stephens', 'Bea Cukai, etiket & cerita rakyat', 'Irish_Fairy_Tales.jpg', 'epubbooks.com', '2017-04-23', 'Bahasa Inggris', 0, '978-1521093467', 20, 1, '2019-02-08 09:53:59', '2019-02-08 09:53:59'),
(47, 'John Cornelius', 'Walpole, as the biographer of the life of John Cornelius, wrote a long, first person narrative of the life of a genius who could never bring his world of dreams in tune with the world of reality for himself or for those who read his books, a writer who strove desperately to produce serious novels, and who died famous and acknoledged for three slim volumes of fairy tales. Walpole wrote remantically of a character whose life was never very real, and who could not find happiness, except at odd moments because of this gulf between him and the world. Walpole’s romantic flights have realistic intermission to temper them.', 'Hugh Walpole', 'Biografi & silsilah', 'John_Cornelius.jpg', 'epubbooks.com', '2018-08-27', 'Bahasa Inggris', 0, '978-1726231893', 20, 1, '2019-02-08 10:55:17', '2019-02-08 10:55:17'),
(48, 'Real Soldiers of Fortune', 'First published in 1906, this is an early biography of the Real Soldiers are Winston Spencer Churchill, Baron James Harden-Hickey, Captain Philo Norton McGriffin, General McIver and other prominent military men of Davis’ time.', 'Richard H. Davis', 'Biografi & silsilah', 'Real_Soldiers_of_Fortune.jpg', 'epubbooks.com', '1981-09-01', 'Bahasa Inggris', 0, '978-0873642392', 20, 1, '2019-02-08 10:58:27', '2019-02-08 10:58:27'),
(49, 'Boyhood', 'In the 1850s Tolstoy also began his literary career with an autobiographical trilogy: Childhood, Boyhood, and Youth. This, the second novel in the trilogy, tells of the early part of his life, when he was living happily with his family in the countryside. It also portrays his first love affair with Sonya and the tragic incident of his mother’s death.', 'Leo Tolstoy', 'Biografi & silsilah', 'Boyhood.jpg', 'epubbooks.com', '2018-03-06', 'Bahasa Inggris', 0, '978-1980486367', 20, 1, '2019-02-08 11:03:37', '2019-02-08 11:03:37'),
(50, 'Childhood', 'The artistic work of Leo Tolstoy has been described as “nothing less than one tremendous diary kept for over fifty years.” This particular “diary” begins with Tolstoy’s first published work, which was written when he was only 23. A semi-autobiographical work, it recounts two days in the childhood of 10-year-old Nikolai Irtenev, recreating vivid impressions of people, place and events with the exuberant perspective of a child enriched by the ironic retrospective understanding of an adult.', 'Leo Tolstoy', 'Biografi & silsilah', 'Childhood.jpg', 'epubbooks.com', '1985-10-01', 'Bahasa Inggris', 0, '978-0882335186', 20, 1, '2019-02-08 11:06:59', '2019-02-08 11:06:59'),
(51, 'Discourses on Livy', 'The Discourses on the First Decade of Titus Livius is one of the masterpieces by Machiavelli. This work narrates the writer’s comments as to how a democratic government should be established. Through the comparison of Venice and Rome a detailed analysis of different kinds of governments is given. Machiavelli has ingeniously presented different aspects of his own contentions. Thought-provoking!', 'Niccolò Machiavelli', 'Sejarah dunia kuno', 'Discourses_on_Livy.jpg', 'epubbooks.com', '1998-01-28', 'Bahasa Inggris', 0, '978-0226500362', 20, 1, '2019-02-08 11:14:12', '2019-02-08 11:14:12'),
(52, 'History of a Crime', 'Published in 1877, long after it was written, it is an account of the 1852 coup d’état that brought Napoleon into power and forced Hugo into an exile of eighteen years. The work covers those momentous early days of Napoleon rule that changed the course of French history. The deepest feelings and patriotic emotions of the author are reflected in these pages that chronicle the rise of Napoleon.', 'Victor Hugo', 'Sejarah dunia kuno', 'History_of_a_Crime.jpg', 'epubbooks.com', '1991-06-01', 'Bahasa Inggris', 0, '978-0898754131', 20, 1, '2019-02-08 11:19:21', '2019-02-08 11:19:21'),
(53, 'Hospital Sketches', 'Before her wider fame as the author of Little Women, Louisa May Alcott achieved recognition for her accounts of her work as a volunteer nurse in an army hospital. Written during the winter of 1862-63, her lively dispatches appeared in the newspaper Commonwealth, where they were eagerly read by soldiers’ friends and families. Then, as now, these chronicles revealed the desperate realities of battlefield medicine as well as the tentative first steps of women in military service. Writing under a pseudonym, Alcott recounted the vicissitudes of her two-day journey from her home in Concord, Massachusetts, to Washington, D.C. A fiery baptism in the practice of nursing awaited her at Washington Hospital, were she arrived immediately after the slaughter of the Army of the Potomac at the battle of Fredericksburg. Alcott’s rapidly paced prose graphically depicts the facts of hospital life, deftly balancing pathos with gentle humor. A vivid and truthful portrait of an often overlooked aspect of th', 'Louisa May Alcott', 'Biografi & silsilah', 'Hospital_Sketches.jpg', 'epubbooks.com', '2009-09-24', 'Bahasa Inggris', 0, '978-1449531188', 20, 1, '2019-02-08 11:27:31', '2019-02-08 11:27:31'),
(54, 'Modern Mythology', 'This influential work on comparative mythology takes on a scholarly controversy that raged at the time over the origin of mythology. Is myth “a disease of language,” as Max Muller claimed, or does it, as the Lang argues here, reflect the spiritual needs of humans? Lang makes the case for an anthropological study of mythology. A fascinating treatise on the study of modern mythology the construction of myths so soon after an event. Andrew Lang was the foremost scholar in folklore and mythology of his time.', 'Andrew Lang', 'Sejarah dunia kuno', 'Modern_Mythology.jpg', 'epubbooks.com', '2014-08-12', 'Bahasa Inggris', 0, '978-1446521625', 20, 1, '2019-02-08 11:32:11', '2019-02-08 11:32:11'),
(55, 'Myths and Legends of Ancient Greece and Rome', 'A Greek and Roman mythology book that’s suitable for young readers and is a comprehensive collection of all the major and minor gods of Rome and Greece, with descriptions of festivals and retellings of major mythological stories. Learn the mythology behind books like those in the Percy Jackson and the Olympians series with this handbook of ancient Greek and Roman mythology! You’ will also find descriptions of the public worship of the deities, the oracles (such as the Oracle of Delphi), soothsayers, augurs, and festivals. Also includes a description of Greek and Roman legends, such as those of Perseus, Theseus, Daedalus (creator of the famous labyrinth), Jason and the Argonauts, Hercules, and the siege of Troy.', 'E. M. Berens', 'Sejarah Eropa', 'Myths_and_Legends_of_Ancient_Greece_and_Rome.jpg', 'epubbooks.com', '2003-04-07', 'Bahasa Inggris', 0, '978-0766148703', 20, 1, '2019-02-08 11:41:36', '2019-02-08 11:41:36'),
(56, 'Orlando', 'The thrill of reading Virginia Woolf’s Orlando is the feeling of looking into a whirlpool just as something utterly extraordinary materializes for the first time: an exhilarating hallucination of surreal and beautiful images that remain in memory long after you put the book down. Orlando has it all: life, death, immortality, homoerotic desire, lesbianism, and the evanescence of time. Love, fear, solitude, death, and time-travel—the subjects float by like parasols in the rain. Orlando can be found on countless lists of the finest novels of the 20th century, and is one of Virginia Woolf’s major achievements. It is considered one of her greatest works after Mrs. Dalloway and To The Lighthouse.', 'Virginia Woolf', 'Biografi & silsilah', 'Orlando.jpg', 'epubbooks.com', '2017-06-14', 'Bahasa Inggris', 0, '978-1847493705', 20, 1, '2019-02-08 11:50:34', '2019-02-08 11:50:34'),
(57, 'In the Ranks of the CIV', 'Erskine Childers, the famed author of the classic novel of sailing and spying The Riddle of the Sands served with London’s finest-The City Imperial Volunteers within its artillery arm-associated with the Honourable Artillery Company. Childers-together with his enthusiastic colleagues from the professions of the city were keen to fight the Boers of South Africa and he has written an engaging and detailed account of his time with the regiment during the war. It is written in an easy informal style-of the kind that has ensured that his better known writing has endured for over a century-as he takes the reader through training to experiences on the battlefield itself.', 'Erskine Childers', 'Biografi & silsilah', 'In_the_Ranks_of_the_CIV.jpg', 'epubbooks.com', '2007-01-30', 'Bahasa Inggris', 0, '978-1426469589', 20, 1, '2019-02-08 11:58:17', '2019-02-08 11:58:17'),
(58, 'Four Weeks in the Trenches', 'Fritz Kreisler - one of the greatest violinists of hist time, if not of all time, recounts his experiences during World War I as an Austrian soldier. Four Weeks in the Trenches is a brief record of his fighting on the Eastern front in the great war, first published in 1915 after he was honorably discharged when wounded. He spent the remaining years of the war in America. He returned to Europe in 1924, living first in Berlin, then moving to France in 1938. Shortly thereafter, at the outbreak of World War II, he settled once again in the United States, becoming a naturalized citizen in 1943. This book is notable for being the first war book to actually be written by a famous violinist serving at the front. The material is presented with vigor and simplicity. One of the phenomena of war–the sudden transformation of the highly emotional, neurotic man of literary or artistic pursuits, accustomed to an atmosphere of refinement, culture, and luxury, into a primeval savage in the space of a fe', 'Fritz Kreisler', 'Biografi & silsilah', 'Four_Weeks_in_the_Trenches.jpg', 'epubbooks.com', '2018-07-14', 'Bahasa Inggris', 0, '978-1722966850', 20, 1, '2019-02-08 12:04:17', '2019-02-08 12:04:17'),
(59, 'Madame Bovary', 'When Emma Rouault marries Charles Bovary she imagines she will pass into the life of luxury and passion that she reads about in sentimental novels and women’s magazines. But Charles is a dull country doctor, and provincial life is very different from the romantic excitement for which she yearns. In her quest to realize her dreams she takes a lover, and begins a devastating spiral into deceit and despair.', 'Gustave Flaubert', 'Biografi & silsilah', 'Madame_Bovary.jpg', 'epubbooks.com', '1982-07-01', 'Bahasa Inggris', 0, '978-0553213416', 20, 1, '2019-02-08 12:12:31', '2019-02-08 12:12:31'),
(60, 'Margaret Ogilvy', 'Barrie’s autobiography of his mother, published after her death, and which tells a lot of Barrie’s early emotional life. Barrie descibes how strong minded and intelligent she was and how she wanted everything done done her way.', 'J. M. Barrie', 'Biografi & silsilah', 'Margaret_Ogilvy.jpg', 'epubbooks.com', '2005-05-04', 'Bahasa Inggris', 0, '978-1417902279', 20, 1, '2019-02-08 12:28:34', '2019-02-08 12:28:34'),
(61, 'Sons and Lovers', 'Called the most widely-read English novel of the twentieth century, D. H. Lawrence’s largely autobiographical Sons and Lovers tells the story of Paul Morel, a young artist growing into manhood in a British working-class community near the Nottingham coalfields. His mother Gertrude, unhappily married to Paul’s hard-drinking father, devotes all her energies to her son. They develop a powerful and passionate relationship, but eventually tensions arise when Paul falls in love with a girl and seeks to escape his family ties. Torn between his desire for independence and his abiding attachment to his loving but overbearing mother, Paul struggles to define himself sexually and emotionally through his relationships with two women—the innocent, old-fashioned Miriam Leivers, and the experienced, provocatively modern Clara Dawes. Heralding Lawrence’s mature period, Sons and Lovers vividly evokes the all-consuming nature of possessive love and sexual attraction. Lushly descriptive and deeply emotio', 'D. H. Lawrence', 'Biografi & silsilah', 'Sons_and_Lovers.jpg', 'epubbooks.com', '1997-08-05', 'Bahasa Inggris', 0, '978-1853260476', 20, 1, '2019-02-08 12:32:38', '2019-02-08 12:32:38'),
(62, 'Walden', 'In 1845 Henry David Thoreau left his pencil-manufacturing business and began building a cabin on the shore of Walden Pond near Concord, Massachusetts. This lyrical yet practical-minded book is at once a record of the 26 months Thoreau spent in withdrawal from society – an account of the daily minutiae of building, planting, hunting, cooking, and, always, observing nature – and a declaration of independence from the oppressive mores of the world he left behind. Elegant, witty, and quietly searching, Walden remains the most persuasive American argument for simplicity of life clarity of conscience.', 'Henry David Thoreau', 'Biografi & silsilah', 'Walden.jpg', 'epubbooks.com', '1996-06-01', 'Bahasa Inggris', 0, '978-3895082092', 20, 1, '2019-02-08 12:40:36', '2019-02-08 12:40:36'),
(63, 'King James Bible', 'In the course of time, the King James Version came to be regarded as ‘the Authorized Version.’ It has been termed the “noblest monument of English prose,” and it has come to be of central importance to Western society as no other book.', 'Various', 'Bibiliografi', 'King_James_Bible.jpg', 'epubbooks.com', '2006-06-30', 'Bahasa Inggris', 0, '978-1565638082', 20, 1, '2019-02-08 12:45:48', '2019-02-08 12:45:48'),
(64, 'The Genetic Effects of Radiation', 'Nuclear energy is playing a vital role in the life of every man, woman, and child in the world today. Now and in the years ahead, it will continue to affect all the peoples of the Earth. It is essential that we educate ourselves in the understanding of this vital force if we are to discharge thoughtfully our responsibilities as citizens, and if we are to realize fully the myriad benefits that nuclear energy offers us. This booklet was commissioned by The United States Atomic Energy Commission in 1966 and is still interesting to read today.', 'Isaac Asimov', 'Fisika', 'The_Genetic_Effects_of_Radiation.jpg', 'epubbooks.com', '2018-08-23', 'Bahasa Inggris', 0, '978-1725899285', 20, 1, '2019-02-08 13:28:40', '2019-02-08 13:28:40'),
(65, 'Dream Psychology', 'This classic work is essential reading for any serious student of psychology. Dr. Freud covers the hidden meanings within our dreams, especially repressed sexual desires, the purpose of our conscious and unconscious minds, and the importance of dreams to our wellbeing. Freud’s attitude toward dream study was that of a statistician who does not know, and has no means of foreseeing, what conclusions will be forced on him by the information he is gathering, but who is fully prepared to accept those unavoidable conclusions. This was indeed a novel way in psychology.', 'Sigmund Freud', 'Psikologi', 'Dream_Psychology.jpg', 'epubbooks.com', '2011-12-23', 'Bahasa Inggris', 0, '978-1619491311', 20, 1, '2019-02-08 13:50:43', '2019-02-08 13:50:43'),
(66, 'Leonardo da Vinci', 'This remarkable book takes as its subject one of the most outstanding men that ever lived. The ultimate prodigy, Leonardo da Vinci was an artist of great originality and power, a scientist, and a powerful thinker. According to Sigmund Freud, he was also a flawed, repressed homosexual. The first psychosexual history to be published, Leonardo da Vinci was the only biography the great psychoanalyst wrote. When Jung first saw it, he told Freud it was ‘wonderful’, and it remained Freud’s favourite composition. The text includes the first full emergence of the concept of narcissism and develops Freud’s theories of homosexuality. While based upon controversial research, the book offers a fascinating insight into two men - the subject and the author. If you’ve ever wondered just what lies behind the Mona Lisa’s enigmatic smile, read Freud on Leonardo. It’s genius on genius', 'Sigmund Freud', 'Psikologi', 'Leonardo_da_Vinci.jpg', 'epubbooks.com', '1990-01-17', 'Bahasa Inggris', 0, '978-0393001495', 20, 1, '2019-02-08 13:56:08', '2019-02-08 13:56:08'),
(67, 'Totem and Taboo', 'Widely acknowledged to be one of Freud’s greatest works, when first published in 1913, this book caused outrage. It remains the fullest exploration of Freud’s most famous themes. Family, society, religion - they’re all put on the couch.', 'Sigmund Freud', 'Psikologi', 'Totem_and_Taboo.jpg', 'epubbooks.com', '2011-12-08', 'Bahasa Inggris', 0, '978-0486404349', 20, 1, '2019-02-08 14:00:14', '2019-02-08 14:00:14'),
(68, 'The Antichrist', 'This work is both an unrestrained attack on Christianity and a further exposition of Nietzsche’s will-to-power philosophy so dramatically presented in Zarathustra. Christianity, says Nietzsche, represents “everything weak, low, and botched; it has made an ideal out of antagonism towards all the self-preservative instincts of strong life.” By contrast, Nietzsche defines good as: “All that enhances the feeling of power, the Will to Power, and power itself in man. What is bad?–All that proceeds from weakness. What is happiness?–The feeling that power is increasing,–that resistance has been overcome.” In attempting to redefine the basis of Western values by demolishing what Nietzsche saw as the crippling influence of the Judeo-Christian tradition, THE ANTICHRIST has proved to be highly controversial and continuously stimulating to later generations of philosophers.', 'Friedrich Nietzsche', 'Agama lainnya', 'The_Antichrist.jpg', 'epubbooks.com', '2006-01-01', 'Bahasa Inggris', 0, '978-1775429524', 20, 1, '2019-02-08 14:04:04', '2019-02-08 14:04:04'),
(69, 'Ben-Hur', 'Judah Ben-Hur lives as a rich Jewish prince and merchant in Jerusalem at the beginning of the 1st century. His old friend Messala arrives as commanding officer of the Roman legions. They become bitter enemies. Because of an unfortunate accident, Ben-Hur is sent to slave in the mines while his family is sent to leprosy caves. As Messala is dying from being crushed in a chariot race, he reveals where Ben-Hur’s family is. On the road to find them, Ben-Hur meets the Christ as he is on the road to Golgotha to be crucified. That day changes Ben-Hur’s life forever, for that is the day he becomes a believer.', 'Lew Wallace', 'Filsafat & Teori Agama', 'Ben-Hur.jpg', 'epubbooks.com', '2014-03-25', 'Bahasa Inggris', 0, '978-1617203404', 20, 1, '2019-02-08 14:07:59', '2019-02-08 14:07:59'),
(70, 'Quo Vadis', 'Quo Vadis is a love story of Marcus Vinicius, a passionate young Roman tribune, and Lygia Callina, a beautiful and gentle Christian maiden of royal Lygian descent and a hostage of Rome, raised in a patrician home. At first Marcus, a typical aristocratic Roman libertine of his time, has no notion of love and merely desires Lygia with erotic animalistic intensity. Through political machinations of the elegant Petronius he contrives to have her taken by force from her foster home and into the decadent and terrible splendor of the court of Ceasar, setting in motion a course of events that culminate in his own spiritual redemption. Intricately researched, populated with vibrant historical figures, and gorgeous period detail, bloody spectacle and intimate beauty, this is an epic tapestry of the triumph of love, faith and sacrifice.', 'Henryk Sienkiewicz', 'Sejarah Kekristenan', 'Quo_Vadis.jpg', 'epubbooks.com', '1997-05-01', 'Bahasa Inggris', 0, '978-0781805506', 20, 1, '2019-02-08 14:11:10', '2019-02-08 14:11:10'),
(71, 'Siddhartha', 'In the novel, Siddhartha, a young man, leaves his family for a contemplative life, then, restless, discards it for one of the flesh. He conceives a son, but bored and sickened by lust and greed, moves on again. Near despair, Siddhartha comes to a river where he hears a unique sound. This sound signals the true beginning of his life – the beginning of suffering, rejection, peace, and, finally, wisdom.', 'Hermann Hesse', 'Agama lainnya', 'Siddhartha.jpg', 'epubbooks.com', '1982-01-01', 'Bahasa Inggris', 0, '978-0553208849', 20, 1, '2019-02-08 14:15:20', '2019-02-08 14:15:20'),
(72, 'The Man Who Was Thursday', 'G. K. Chesterton’s classic novella tackles anarchy, social order, God, peace, war, religion, human nature, and a few dozen other weighty concepts. And somehow he manages to blend all of it together into a delightful satire, full of tongue-in-cheek commentary that is still relevant today. As the book opens, Gabriel Symes is debating with a soapbox anarchist. The two men impress each other enough that the anarchist introduces Symes to a seven-man council of anarchists, all named after days of the week. Soon they elect Symes their newest member–Thursday. But they don’t know he’s also been recruited by an anti-anarchist organization. And soon Symes finds out that he’s not the only person on the council who is not what he seems. There are other spies and double-agents, all working for the same cause. But who–and what–is the jovial, powerful Mr. Sunday, the head of the organization? Hot-air balloons, elaborate disguises, duels, and police chases–all go to make up this satirical spy novel tha', 'G. K. Chesterton', 'Agama lainnya', 'The_Man_Who_Was_Thursday.jpg', 'epubbooks.com', '2016-03-10', 'Bahasa Inggris', 0, '978-1530451531', 20, 1, '2019-02-08 14:19:22', '2019-02-08 14:19:22'),
(73, 'A Romance of Two Worlds', 'When the female narrator is asked by a painter to pose for a portrait, she has a supernatural experience in his studio. When she is near the painter she feels better. The painter is responsible for her improved health, but he must send her to Heliobas, the man who helped him achieve so much, both in health and in art. Science fiction, occult and fantasy all rolled into one very good plot.', 'Marie Corelli', 'Filsafat & Teori Agama', 'A_Romance_of_Two_Worlds.jpg', 'epubbooks.com', '2016-01-14', 'Bahasa Inggris', 0, '978-1523403479', 20, 1, '2019-02-08 14:22:56', '2019-02-08 14:22:56'),
(74, 'Homage to Catalonia', '“Every line of serious work that I have written since 1936 has been written, directly or indirectly, against totalitarianism and for democratic socialism as I understand it.” Thus wrote Orwell following his experiences as a militiaman in the Spanish Civil War, chronicled in Homage to Catalonia. Here he brings to bear all the force of his humanity, passion and clarity, describing with bitter intensity the bright hopes and cynical betrayals of that chaotic episode.', 'George Orwell', 'Sejarah Eropa', 'Homage_to_Catalonia.jpg', 'epubbooks.com', '1980-10-22', 'Bahasa Inggris', 0, '978-0156421171', 20, 1, '2019-02-08 14:27:50', '2019-02-08 14:27:50'),
(75, 'A Journal of the Plague Year', 'A Journal of the Plague Year is a novel by Daniel Defoe, first published in March 1722. The novel is a fictionalised account of one man’s experiences of the year 1665, in which the Great Plague struck the city of London. The book is told roughly chronologically, though without sections or chapter headings. (source: Wikipedia)', 'Daniel Defoe', 'Kedokteran & Kesehatan', 'A_Journal_of_the_Plague_Year.jpg', 'epubbooks.com', '2001-09-09', 'Bahasa Inggris', 0, '978-0486419190', 20, 1, '2019-02-08 14:31:50', '2019-02-08 14:31:50'),
(76, 'History of the Great Plague in London', 'The History of the Great Plague in London in the Year 1665, Containing Observations and Memorials of the Most Remarkable Occurrences, Both Public and Private, During That Dreadful Period.', 'Daniel Defoe', 'Kedokteran & Kesehatan', 'History_of_the_Great_Plague_in_London.jpg', 'epubbooks.com', '2011-10-04', 'Bahasa Inggris', 0, '978-1247485768', 20, 1, '2019-02-08 14:37:13', '2019-02-08 14:37:13');

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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`d_id`, `d_namadokumen`, `d_idbuku`, `d_key`, `d_iddokumen`, `d_namaenkrip`, `d_namadekrip`, `d_tanggal`) VALUES
(13, 'Hasil Review Penguji 1.pdf', 10, 'RRYHTTVMNLNDPJJUAVEKLOIJYRRTCANY', '70108', '70108_Hasil Review Penguji 1.pdf.encrypted', 'Hasil Review Penguji 1.pdf', '2019-02-07 08:57:28'),
(14, 'Lecture Notes_pertemuan 6(1).pdf', 23, 'HOGICPIVJMESAFJTKEZBIKRLDJMBSZZS', '29036', '29036_Lecture Notes_pertemuan 6(1).pdf.encrypted', '', '2019-02-07 10:59:44'),
(15, 'Lecture Notes_pertemuan 9.pdf', 22, 'UINXRCGTEJDSGSWDIHRVLPHFZVXBZNHT', '54406', '54406_Lecture Notes_pertemuan 9.pdf.encrypted', '', '2019-02-07 11:00:52'),
(16, 'james-ghost-stories-of-an-antiquary.epub', 27, 'IPORQOFPWZKOBZRLHAMOISUFTIYCMMBL', '96123', '96123_james-ghost-stories-of-an-antiquary.epub.encrypted', '', '2019-02-08 07:52:59'),
(17, 'lewis-work-of-art.epub', 28, 'FYJIMFBHAWPGERHBSABPDDDPYJWXHTPA', '96602', '96602_lewis-work-of-art.epub.encrypted', '', '2019-02-08 08:00:50'),
(18, 'wright-deluge.epub', 29, 'JFLCYSGYPKQIXNSUZJBDKSUZSLEEWDTL', '84413', '84413_wright-deluge.epub.encrypted', '', '2019-02-08 08:07:45'),
(19, 'freud-a-general-introduction-to-psychoanalysis.epub', 30, 'LALLVRPHLESLSOFGWSBIFGVSSNBOFGQE', '13312', '13312_freud-a-general-introduction-to-psychoanalysis.epub.encrypted', '', '2019-02-08 08:13:27'),
(20, 'benedict-how-to-analyze-people-on-sight.epub', 31, 'EVBJGQICZQIKJFUASUVYMLHTLAAZJJYT', '24815', '24815_benedict-how-to-analyze-people-on-sight.epub.encrypted', '', '2019-02-08 08:18:52'),
(21, 'wells-a-modern-utopia.epub', 32, 'TJNDQUMCPNRHBTCKKPUSKCPANHTVQKXU', '56978', '56978_wells-a-modern-utopia.epub.encrypted', '', '2019-02-08 08:31:29'),
(22, 'lessig-free-culture.epub', 33, 'VYLRZJFIHBUJDRAPDMHPCTTSCZOUXTPB', '84078', '84078_lessig-free-culture.epub.encrypted', '', '2019-02-08 08:37:10'),
(24, 'flaubert-temptation-of-st-antony-illustrations.epub', 35, 'XJLPEXQKNZRGGBDJTSOXJOHGECAZHNJQ', '4535', '4535_flaubert-temptation-of-st-antony-illustrations.epub.encrypted', '', '2019-02-08 08:54:27'),
(25, 'orwell-lion-and-the-unicorn.epub', 36, 'CURUWYTWZPURSJUWDXKVYCISSHDGUIVV', '26314', '26314_orwell-lion-and-the-unicorn.epub.encrypted', '', '2019-02-08 09:02:49'),
(26, 'wells-anticipations.epub', 37, 'WKEAAEGHQWBFFHSRTNRVSBHGOWGJSPNT', '97572', '97572_wells-anticipations.epub.encrypted', '', '2019-02-08 09:06:04'),
(27, 'ruskin-unto-this-last.epub', 38, 'VWKJSCRARHAFIMMAKLMHUJEIQMLBLTXI', '64396', '64396_ruskin-unto-this-last.epub.encrypted', '', '2019-02-08 09:09:26'),
(28, 'churchill-river-war.epub', 39, 'LNIGUGMBQPSAGVIHPGSAAVLASXZNZPPA', '26336', '26336_churchill-river-war.epub.encrypted', '', '2019-02-08 09:16:38'),
(29, 'churchill-story-of-the-malakand-field-force.epub', 40, 'IFSWKMMNFNYHIHGCCGOYWRASBTPYHNEB', '96717', '96717_churchill-story-of-the-malakand-field-force.epub.encrypted', '', '2019-02-08 09:25:39'),
(30, 'bois-darkwater.epub', 41, 'XNZNUCRAOQTAJFYXFHMHVONCQELLBJIW', '86137', '86137_bois-darkwater.epub.encrypted', '', '2019-02-08 09:30:25'),
(31, 'james-old-testament-legends.epub', 42, 'HLCGYAYTSEPKNQBCKSPBVBJMCCZGCKOU', '94801', '94801_james-old-testament-legends.epub.encrypted', '', '2019-02-08 09:38:23'),
(32, 'stephens-demi-gods.epub', 43, 'IKAPEDNVETATMIEKDYXLEULAEMFWIFXL', '22013', '22013_stephens-demi-gods.epub.encrypted', '', '2019-02-08 09:43:37'),
(33, 'hewet-cinderella-illustrations.epub', 44, 'UDZZUFRKRDFDSEBJZWOJLOQJCWIAVSCP', '82904', '82904_hewet-cinderella-illustrations.epub.encrypted', '', '2019-02-08 09:47:05'),
(34, 'beaumont-beauty-and-the-beast.epub', 45, 'UZSNDTPQPJLDNFTIAMRYCQBJNXHEKYGL', '35188', '35188_beaumont-beauty-and-the-beast.epub.encrypted', '', '2019-02-08 09:50:38'),
(35, 'stephens-irish-fairy-tales.epub', 46, 'SCHYXGLFPGKGZEGJYTOUCQGQJXOHPTLP', '89247', '89247_stephens-irish-fairy-tales.epub.encrypted', '', '2019-02-08 09:54:11'),
(36, 'walpole-john-cornelius.epub', 47, 'WNSHEQRWSEVIPLOTWXAJAMWDPATMXXMR', '43787', '43787_walpole-john-cornelius.epub.encrypted', '', '2019-02-08 10:55:30'),
(37, 'davis-real-soldiers-of-fortune.epub', 48, 'KKUZCFKEWWFSCSUPGEJBGDKZJZCADISE', '3218', '3218_davis-real-soldiers-of-fortune.epub.encrypted', '', '2019-02-08 10:58:57'),
(38, 'tolstoy-boyhood.epub', 49, 'ZDUQWDNLIBQUXVANDSDSYMULYVXHQEXG', '11457', '11457_tolstoy-boyhood.epub.encrypted', '', '2019-02-08 11:03:49'),
(39, 'tolstoy-childhood.epub', 50, 'PFZWFERDHGJEHSUUCGXOBFJNMLQMRSKF', '4079', '4079_tolstoy-childhood.epub.encrypted', '', '2019-02-08 11:07:09'),
(40, 'machiavelli-discourses-on-livy.epub', 51, 'CAWSLBBXVCBKVQTUNXVIZJRQIAUEPEYS', '21102', '21102_machiavelli-discourses-on-livy.epub.encrypted', '', '2019-02-08 11:19:36'),
(41, 'hugo-history-of-a-crime.epub', 52, 'OXWVOMRNAXWBYMCBZNXDFQRCRRGGFRGE', '54347', '54347_hugo-history-of-a-crime.epub.encrypted', '', '2019-02-08 11:20:43'),
(42, 'alcott-hospital-sketches.epub', 53, 'RWBBLDIIWJYIYWNLVOFUZLIUMEBFXNUD', '59039', '59039_alcott-hospital-sketches.epub.encrypted', '', '2019-02-08 11:27:42'),
(43, 'lang-modern-mythology.epub', 54, 'TMPTOTGOVUUUGBGZBASCWBCRFVRRBXHQ', '90214', '90214_lang-modern-mythology.epub.encrypted', '', '2019-02-08 11:32:22'),
(44, 'berens-myths-and-legends-of-ancient-greece-and-rome.epub', 55, 'MNVYJUFUQZCMULEPDPEYYYXNDTUCAXNG', '41738', '41738_berens-myths-and-legends-of-ancient-greece-and-rome.epub.encrypted', '', '2019-02-08 11:41:47'),
(45, 'woolf-orlando.epub', 56, 'AQGVETFYAAOEGBNVYMJHTXIJLPCZONJE', '69676', '69676_woolf-orlando.epub.encrypted', '', '2019-02-08 11:50:47'),
(46, 'childers-in-the-ranks-of-the-c-i-v.epub', 57, 'YPGFHZQRZEYDAETUZGLATYKIJIRPCNOS', '56228', '56228_childers-in-the-ranks-of-the-c-i-v.epub.encrypted', '', '2019-02-08 11:58:41'),
(47, 'kreisler-four-weeks-in-the-trenches-illustrations.epub', 58, 'VEHJACUTSNNICMXROUKXGIHJVUZAXEFG', '74935', '74935_kreisler-four-weeks-in-the-trenches-illustrations.epub.encrypted', '', '2019-02-08 12:05:01'),
(48, 'flaubert-madame-bovary.epub', 59, 'CJJKUJCLCDFYXUJQITWXSQMQKUOTVEYW', '67700', '67700_flaubert-madame-bovary.epub.encrypted', '', '2019-02-08 12:24:48'),
(49, 'barrie-margaret-ogilvy.epub', 60, 'ZDNLBVSHCBSJABPVTKOZEHZJAHCJXIHR', '24087', '24087_barrie-margaret-ogilvy.epub.encrypted', '', '2019-02-08 12:28:43'),
(50, 'lawrence-sons-and-lovers.epub', 61, 'TOJKUSFNTXDWGHHTXTRTNROXWZRQHXIW', '65105', '65105_lawrence-sons-and-lovers.epub.encrypted', '', '2019-02-08 12:32:56'),
(51, 'thoreau-walden.epub', 62, 'DENUUHRDODXSOJIPELMPFEKLITTTMHPN', '71692', '71692_thoreau-walden.epub.encrypted', '', '2019-02-08 12:40:51'),
(52, 'various-king-james-bible.epub', 63, 'NOGACESLSMIJSRQPUXAWDYJAGIGGODRF', '15369', '15369_various-king-james-bible.epub.encrypted', '', '2019-02-08 12:46:22'),
(53, 'asimov-genetic-effects-of-radiation.epub', 64, 'ARBHHVBPIXNNQRKRMLHVJMZJXJHEBGEQ', '96545', '96545_asimov-genetic-effects-of-radiation.epub.encrypted', '', '2019-02-08 13:34:25'),
(54, 'freud-dream-psychology.epub', 65, 'KQAWIOXYONKXXGZUPQXAVEUEQMJOGQNB', '67633', '67633_freud-dream-psychology.epub.encrypted', '', '2019-02-08 13:52:18'),
(55, 'freud-leonardo-da-vinci.epub', 66, 'YHJNMMMWZCIPWVZGHPOTPPBVXYUBXALI', '50192', '50192_freud-leonardo-da-vinci.epub.encrypted', '', '2019-02-08 13:56:55'),
(56, 'freud-totem-and-taboo.epub', 67, 'OLOVVAUKNZCXELDDPKYUZXJWDYCFOFYS', '2384', '2384_freud-totem-and-taboo.epub.encrypted', '', '2019-02-08 14:04:24'),
(57, 'nietzsche-antichrist.epub', 68, 'GYXAGBDUMRZYMJSJEEAKSVQKTWYRSSTM', '46132', '46132_nietzsche-antichrist.epub.encrypted', '', '2019-02-08 14:04:56'),
(58, 'wallace-ben-hur.epub', 69, 'NZUWTDSBGEATMDDKJCPBDUOSJMWYGABG', '88875', '88875_wallace-ben-hur.epub.encrypted', '', '2019-02-08 14:08:16'),
(59, 'sienkiewicz-quo-vadis.epub', 70, 'OIOUIGXCYAWWAQVBIZKYXNNORXGPUMGG', '66835', '66835_sienkiewicz-quo-vadis.epub.encrypted', '', '2019-02-08 14:11:37'),
(60, 'hesse-siddhartha.epub', 71, 'COXTYKUOKYTCLZPGLOROEPIEPRTVXSTE', '63753', '63753_hesse-siddhartha.epub.encrypted', '', '2019-02-08 14:15:36'),
(61, 'chesterton-man-who-was-thursday.epub', 72, 'YZMFJGFEZOZMNMQFCWPWCKDRHZNHUYXM', '53846', '53846_chesterton-man-who-was-thursday.epub.encrypted', '', '2019-02-08 14:19:35'),
(62, 'corelli-a-romance-of-two-worlds.epub', 73, 'SANJBDSSNZQGHSMGECQGVURDYDCSAWRX', '9189', '9189_corelli-a-romance-of-two-worlds.epub.encrypted', '', '2019-02-08 14:23:30'),
(63, 'orwell-homage-to-catalonia.epub', 74, 'KZDCWANZUCWQRSCNIIPMEHNXSSDJJAXZ', '28625', '28625_orwell-homage-to-catalonia.epub.encrypted', '', '2019-02-08 14:27:59'),
(64, 'defoe-a-journal-of-the-plague-year.epub', 75, 'JXWFRYRMJBBLGNAQCOYTYESGBYIUISZK', '93008', '93008_defoe-a-journal-of-the-plague-year.epub.encrypted', '', '2019-02-08 14:32:01'),
(65, 'defoe-history-of-the-great-plague-in-london.epub', 76, 'DVPAXXINJFANMRJGIXJTVMEHIHSUBJBF', '82207', '82207_defoe-history-of-the-great-plague-in-london.epub.encrypted', '', '2019-02-08 14:37:23');

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
