-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 03:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lazizmu`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `nama_lengkap`, `email`, `password`, `status`) VALUES
(18, 'Dwiki', 'Dwiki Ramadanu', 'ramadanu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(19, 'Dimas', 'Dimas Hammam Abdillah', 'erwindandimas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(20, 'Admin', 'Baginda Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(21, 'User', 'Hamba User', 'User@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `badaneksekutif`
--

CREATE TABLE `badaneksekutif` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `badaneksekutif`
--

INSERT INTO `badaneksekutif` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Said Romdhon, S.SI.', 'Manajer', '833114.png'),
(2, 'Henny Dian S,S.ST.', 'Keuangan', '449739.png'),
(3, 'Kuswantoro', 'Amil', '729153.png'),
(4, 'Rizal Mazaki', 'Program & Media', '760738.jpg'),
(5, 'Septian Darma K, S.Ak', 'Kasir', '138222.png'),
(6, 'May Sulistyowati', 'Administrasi', '146667.jpg'),
(7, 'Rezi Yulian F, S.T.', 'Sopir Ambulans', '864241.jpg'),
(10, 'Hamba Allah', 'Penyumbang Handal', '472989.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `badanpengawas`
--

CREATE TABLE `badanpengawas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `badanpengawas`
--

INSERT INTO `badanpengawas` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'M. Taufik, S.E.,M.M', 'Ketua', '909881.jpg'),
(2, 'Solichan', 'Anggota', '232122.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `badanpengurus`
--

CREATE TABLE `badanpengurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `badanpengurus`
--

INSERT INTO `badanpengurus` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Drs. Djatto, M.M.', 'Ketua', '652874.jpg'),
(2, 'Hamdan, S.Pd.I.', 'Wakil Ketua', '454830.jpg'),
(3, 'Kamat, S.Pd.I, M.M.', 'Sekretaris', '159258.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `status`, `gambar`, `isi`, `deskripsi`) VALUES
(53, '123', '2023-12-27 08:34:21', '', 'seorang-tentara-israel-menunjuk-ke-arah-awak-tank-saat-melintasi-jalan-sebagai-bagian-dari-konvoi-di-tengah-konflik-yang-sedan_169.jpeg', '<p>123</p>', ''),
(55, 'Spy x Family Code: White Bakal Tayang di Indonesia', '2023-12-27 11:01:56', '', '860-Spy X Family Episode 1 2 & 3 Review.jpeg', '<p>&nbsp;versi movie dari karya manga dan anime kreatif Tatsuya Endo, bakal memperlihatkan taringnya di bioskop Indonesia setelah sebelumnya membuat gebrakan di Jepang pada 22 Desember 2023.</p>\r\n<p>Antusias para penggemar manga dan anime Spy x Family ini telah mencapai puncaknya sejak pengumuman proyek layar lebar berjudul Spy x Family Code: White. Kegembiraan mereka mencapai puncak ketika film ini akhirnya tayang perdana di Jepang pada tanggal 22 Desember 2023.</p>\r\n<p>Meski begitu, sebelumnya belum ada informasi konkret mengenai tanggal rilis di luar Jepang, membuat para penggemar di seluruh dunia bertanya-tanya. Namun, Encore Films Indonesia baru-baru ini mengakhiri ketidakpastian tersebut dengan mengumumkan bahwa Spy x Family Code: White akan segera menyapa penggemar di Indonesia. Pengumuman berharga ini diposting di akun Instagram resmi Encore Films Indonesia.</p>\r\n<p>&ldquo;Siapa yang sudah tidak sabar menunggu? Angkat tangan kalian,&rdquo; tulis Encore Films Indonesia dalam unggahan mereka pada Minggu, 24 Desember 2023.</p>\r\n<p>Dalam gambar yang mereka bagikan, poster resmi&nbsp;<strong>Spy x Family Code: White</strong>&nbsp;memperlihatkan karakter-karakter utama seperti Anya, Loid, Yor, dan anjing peliharaan mereka, Bond.</p>\r\n<p>Meskipun pengumuman ini memberikan kebahagiaan kepada penggemar, masih terdapat misteri terkait tanggal pasti penayangan. Meski demikian, di bio akun Instagram Encore Films Indonesia, mereka menegaskan bahwa Spy x Family Code: White masih berstatus &ldquo;Coming Soon&rdquo; atau segera tayang.</p>\r\n<p>Meski harus menunggu, penayangan Spy x Family the Movie di bioskop Tanah Air tentu menjadi kabar baik yang patut dinantikan oleh para pecinta anime.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `waktu_masuk`, `nama`, `email`, `alamat`, `telepon`, `pesan`) VALUES
(1, '2023-12-24 05:14:51', 'AULIA ZAMAIRA', 'azamaira278@gmail.com', 'PERUMTAS 5', '085736535013', 'AULIA ZAMAIIRA'),
(2, '2023-12-24 05:14:59', 'YURIDA ZANI', 'yz@gmail.com', 'pandaan', '081327292086', 'YURIDA ZANI'),
(3, '2023-12-24 05:15:11', 'ALI SOYAN', 'ali123@gmail.com', 'Tulangan', '081327292086', 'ALI SOFYAN'),
(4, '2023-12-24 05:15:16', 'M DWIKI RAMADANI', 'dwikir12@gmail.com', 'Tulangan', '08575667867', 'M. DWIKI RAMADANI'),
(5, '2023-12-24 05:15:21', 'Dimas Hammam ', 'erwindandimas@gmail.com', 'Pandaan', '089523418502', 'apakah bumi itu datar');

-- --------------------------------------------------------

--
-- Table structure for table `dewansyariah`
--

CREATE TABLE `dewansyariah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dewansyariah`
--

INSERT INTO `dewansyariah` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Drs. Yusuf Wibisono, M.Si', 'Ketua', '810981.jpg'),
(2, 'KH. Zainuddin, MA.', 'Anggota', '266908.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `infaq`
--

CREATE TABLE `infaq` (
  `id` int(11) NOT NULL,
  `namap` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infaq`
--

INSERT INTO `infaq` (`id`, `namap`, `foto`, `type`) VALUES
(10, 'lazizmu', 'Background_Login.jpg', 'zakat'),
(11, 'Adhika Pratama Hakim', '224714.jpg', 'infaq'),
(16, 'Pinjam Dulu Seratus', 'BackgroundEraser_20231212_132147592.jpg', 'zakat'),
(19, 'Peduli lindungi', 'animeday.jpg', 'infaq');

-- --------------------------------------------------------

--
-- Table structure for table `jemput_donasi`
--

CREATE TABLE `jemput_donasi` (
  `id_jd` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_donasi` varchar(50) NOT NULL,
  `jumlah_donasi` varchar(50) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jemput_donasi`
--

INSERT INTO `jemput_donasi` (`id_jd`, `nama`, `contact`, `email`, `alamat`, `jenis_donasi`, `jumlah_donasi`, `pickup_date`, `pickup_time`) VALUES
(3, 'Hamba Allah', '089523418524', 'pentingyakin@gmail.com', 'Pandaan', 'sedekah', '5.000.000', '2023-12-03', '13:08:00'),
(7, 'Dimas Hammam Abdillah', '089523418502', 'erwindandimas@gmail.com', 'Pandaan', 'kemanusian', '1.000.000', '2023-12-06', '12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `kodedonasi`
--

CREATE TABLE `kodedonasi` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kodedonasi`
--

INSERT INTO `kodedonasi` (`id`, `foto`) VALUES
(1, '462544.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_online`
--

CREATE TABLE `konsultasi_online` (
  `id_ko` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi_online`
--

INSERT INTO `konsultasi_online` (`id_ko`, `nama`, `contact`, `email`, `alamat`, `question`, `answer`) VALUES
(4, 'Hamba Allah', '089523418524', 'pentingyakin@gmail.com', 'Sidoarjo', 'Apakah saya jelek', 'emang');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `nominal` float NOT NULL,
  `infaq_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama`, `no_telp`, `nominal`, `infaq_id`, `wallet_id`) VALUES
(7, 'aura', '08122122', 12000, 10, 1),
(8, 'asaa', '06767567', 45000, 10, 4),
(9, 'zubaedah', '08177668291', 2500000, 10, 5),
(10, 'Hamba Allah', '08991111111', 1000000, 10, 1),
(11, 'Hamba Allah', '08991111111', 99000, 16, 5),
(12, 'Hamba Allah', '08991111111', 1000, 16, 1),
(18, 'Hamba Allah', '08991111111', 1000000, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `foto`, `deskripsi`) VALUES
(1, '221238.jpg', 'LAZISMU Dinobatkan Sebagai Fundraising Kemanusiaan Terbaik Oleh IFA 2021'),
(2, '224714.jpg', 'LAZISMU Lumajang Terima Penghargaan LAZISMU JATIM 2021 Sebagai Digital Fundraising Terbaik'),
(3, '380350.jpg', 'LAZISMU Raih Penghargaan BAZNAS Award 2022'),
(4, '431813.jpg', 'LAZISMU Raih 4 Penghargaan Indonesia Fundraising Award 2022 dalam kategori; Best of The Best Fundraising Zakat Terbaik, Best of The Best Fundraising Kemanusiaan Terbaik, Best of The Best Fundraising Qurban Terbaik, dan The Best Fundraising Infaq Terbaik');

-- --------------------------------------------------------

--
-- Table structure for table `profil_lembaga`
--

CREATE TABLE `profil_lembaga` (
  `id` int(11) NOT NULL,
  `profil_lembaga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_lembaga`
--

INSERT INTO `profil_lembaga` (`id`, `profil_lembaga`) VALUES
(1, '<p><strong>LAZISMU</strong>&nbsp;adalah lembaga zakat tingkat nasional yang berkhidmat dalam pemberdayaan masyarakat melalui pendayagunaan secara produktif dana zakat, infaq, wakaf dan dana kedermawanan lainnya baik dari perseorangan, lembaga, perusahaan dan instansi lainnya.</p>\r\n\r\n<p>Didirikan oleh PP. Muhammadiyah pada tahun 2002, selanjutnya dikukuhkan oleh Menteri Agama Republik Indonesia sebagai Lembaga Amil Zakat Nasional melalui SK No. 457/21 November 2002. Dengan telah berlakunya Undang-undang Zakat nomor 23 tahun 2011, Peraturan Pemerintah nomor 14 tahun 2014, dan Keputusan Mentri Agama Republik Indonesia nomor 333 tahun 2015.&nbsp;<strong>LAZISMU</strong>&nbsp;sebagai lembaga amil zakat nasional telah dikukuhkan kembali melalui SK Mentri Agama Republik Indonesia nomor 730 tahun 2016.</p>\r\n\r\n<p>Latar belakang berdirinya&nbsp;<strong>LAZISMU</strong>&nbsp;terdiri atas dua faktor. Pertama, fakta Indonesia yang berselimut dengan kemiskinan yang masih meluas, kebodohan dan indeks pembangunan manusia yang sangat rendah. Semuanya berakibat dan sekaligus disebabkan tatanan keadilan sosial yang lemah.</p>\r\n\r\n<p>Kedua, zakat diyakini mampu bersumbangsih dalam mendorong keadilan sosial, pembangunan manusia dan mampu mengentaskan kemiskinan. Sebagai negara berpenduduk muslim terbesar di dunia, Indonesia memiliki potensi zakat, infaq dan wakaf yang terbilang cukup tinggi. Namun, potensi yang ada belum dapat dikelola dan didayagunakan secara maksimal sehingga tidak memberi dampak yang signifikan bagi penyelesaian persoalan yang ada.</p>\r\n\r\n<p>Berdirinya&nbsp;<strong>LAZISMU</strong>&nbsp;dimaksudkan sebagai institusi pengelola zakat dengan manajemen modern yang dapat menghantarkan zakat menjadi bagian dari penyelesai masalah (problem solver) sosial masyarakat yang terus berkembang.</p>\r\n\r\n<p>Dengan budaya kerja amanah, professional dan transparan,&nbsp;<strong>LAZISMU</strong>&nbsp;berusaha mengembangkan diri menjadi Lembaga Zakat terpercaya. Dan seiring waktu, kepercayaan publik semakin menguat.</p>\r\n\r\n<p>Dengan spirit kreatifitas dan inovasi,&nbsp;<strong>LAZISMU</strong>&nbsp;senantiasa menproduksi program-program pendayagunaan yang mampu menjawab tantangan perubahan dan problem sosial masyarakat yang berkembang.</p>\r\n\r\n<p>Saat ini,&nbsp;<strong>LAZISMU</strong>&nbsp;telah tersebar hampir di seluruh Indonesia yang menjadikan program-program pendayagunaan mampu menjangkau seluruh wilayah secara cepat, fokus dan tepat sasaran.</p>\r\n\r\n<p>1.&nbsp;<strong>kemiskinan</strong><br />\r\nIndonesia yang berselimut dengan kemiskinan yang masih meluas, kebodohan dan indeks pembangunan manusia yang sangat rendah.<br />\r\n2.&nbsp;<strong>Sumbangsih</strong><br />\r\nZakat diyakini mampu bersumbangsih dalam mendorong keadilan sosial.<br />\r\n3.&nbsp;<strong>Problem</strong><br />\r\nBerdirinya LAZISMU dimaksudkan sebagai institusi pengelola zakat dengan manajemen modern yang dapat menghantarkan zakat menjadi bagian dari penyelesai masalah.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visi_misi`
--

CREATE TABLE `tbl_visi_misi` (
  `id` int(11) NOT NULL,
  `visi_misi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_visi_misi`
--

INSERT INTO `tbl_visi_misi` (`id`, `visi_misi`) VALUES
(1, '<p><span style=\"font-size:24px\"><strong>VISI</strong><br />\r\nMenjadi lembaga amil zakat terpercaya.</span></p>\r\n\r\n<p><span style=\"font-size:24px\"><strong>MISI</strong><br />\r\n1. Meningkatkan kualitas pengelolaan zakat, infaq dan sodaqoh yang amanah, profesional, dan transparan.<br />\r\n2. Meningkatkan pendayagunaan Zakat, Infaq dan Sedekah (ZIS) yang kreatif, inovatif, dan produktif.<br />\r\n3. Meningkatkan pelayanan donatur.</span></p>\r\n\r\n<p><span style=\"font-size:24px\"><strong>PRINSIP</strong><br />\r\nPengelolaan Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA) berprinsip:</span></p>\r\n\r\n<p><span style=\"font-size:24px\">1.&nbsp;<strong>Syariat Islam</strong>, artinya dalam menjalankan tugas dan fungsinya, harus berpedoman sesuai syariat Islam, mulai dari tata cara perekrutan pegawai hingga tata cara pendistribusian Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA);<br />\r\n2.&nbsp;<strong>Amanah dan integritas</strong>, artinya harus menjadi lembaga yang dapat dipercaya, dengan memegang teguh kode etik dan prinsip-prinsip moral;<br />\r\n3.&nbsp;<strong>Kemanfaatan</strong>, artinya memberikan manfaat yang besar bagi mustahik;<br />\r\n4.&nbsp;<strong>Keadilan</strong>, artinya mampu bertindak adil, yakni sikap memperlakukan secara setara di dalam memenuhi hak-hak yang timbul berdasarkan perjanjian serta peraturan perundangan yang berlaku;<br />\r\n5.&nbsp;<strong>Kepastian hukum</strong>, artinya muzaki dan mustahik harus memiliki jaminan dan kepastian hukum dalam proses pengelolaan dana Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA);<br />\r\n6.&nbsp;<strong>Akuntabilitas</strong>, artinya pengelolaan dana Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA) harus bisa dipertanggungjawabkan kepada masyarakat dan mudah diakses oleh masyarakat dan pihak lain yang berkepentingan;<br />\r\n7.&nbsp;<strong>Profesional</strong>, artinya perilaku yang selalu mengedepankan sikap dan Tindakan yang dilandasi oleh tingkat kompetensi, kredibilitas dan komitmen yang tinggi;<br />\r\n8.&nbsp;<strong>Transparansi</strong>, artinya tindakan menyampaikan informasi secara transparan, konsisten, dan kredibel untuk memberikan layanan yang lebih baik dan lebih cepat kepada pemangku kepentingan;<br />\r\n9.&nbsp;<strong>Sinergi</strong>, artinya sikap membangun dan memastikan hubungan kerja sama internal yang produktif serta kemitraan yang harmonis dengan para pemangku kepentingan dana ZISKA untuk menghasilkan karya yang bermanfaat dan berkualitas;<br />\r\n10.&nbsp;<strong>Berkemajuan</strong>, artinya melakukan sesuatu secara baik dan benar yang berorientasi ke depan.</span></p>\r\n\r\n<p><span style=\"font-size:24px\"><strong>TUJUAN</strong><br />\r\nPengelolaan dana Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA) bertujuan:</span></p>\r\n\r\n<p><span style=\"font-size:24px\">1. Meningkatkan efektivitas dan efisiensi pelayanan dalam pengelolaan dana Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA) dalam rangka mencapai maksud dan tujuan Persyarikatan;<br />\r\n2. Meningkatkan manfaat dana Zakat, Infak, Sedekah dan Dana Kemanusiaan (ZISKA) untuk mewujudkan kesejahteraan masyarakat dan penanggulangan kemiskinan dalam rangka mencapai maksud dan tujuan Persyarikatan;<br />\r\n3. Meningkatkan kemampuan ekonomi umat melalui pemberdayaan usaha-usaha produktif.</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `namaw` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `namaw`, `logo`) VALUES
(1, 'BCA ', 'bca.png'),
(2, 'BRI', 'bri.png'),
(3, 'BNI', 'bni.png'),
(4, 'BSI', 'bsi.png'),
(5, 'DANA', 'dana.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `badaneksekutif`
--
ALTER TABLE `badaneksekutif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badanpengawas`
--
ALTER TABLE `badanpengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badanpengurus`
--
ALTER TABLE `badanpengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dewansyariah`
--
ALTER TABLE `dewansyariah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infaq`
--
ALTER TABLE `infaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jemput_donasi`
--
ALTER TABLE `jemput_donasi`
  ADD PRIMARY KEY (`id_jd`);

--
-- Indexes for table `kodedonasi`
--
ALTER TABLE `kodedonasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi_online`
--
ALTER TABLE `konsultasi_online`
  ADD PRIMARY KEY (`id_ko`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_lembaga`
--
ALTER TABLE `profil_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `badaneksekutif`
--
ALTER TABLE `badaneksekutif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `badanpengawas`
--
ALTER TABLE `badanpengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `badanpengurus`
--
ALTER TABLE `badanpengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `dewansyariah`
--
ALTER TABLE `dewansyariah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `infaq`
--
ALTER TABLE `infaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jemput_donasi`
--
ALTER TABLE `jemput_donasi`
  MODIFY `id_jd` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kodedonasi`
--
ALTER TABLE `kodedonasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konsultasi_online`
--
ALTER TABLE `konsultasi_online`
  MODIFY `id_ko` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil_lembaga`
--
ALTER TABLE `profil_lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
