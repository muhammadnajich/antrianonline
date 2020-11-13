-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 11:53 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `id` int(3) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `atribut`, `nilai_atribut`) VALUES
(1, 'total', 'total'),
(2, 'kuartal', 'kuartalsatu'),
(3, 'kuartal', 'kuartaldua'),
(4, 'kuartal', 'kuartaltiga'),
(5, 'kuartal', 'kuartalempat'),
(6, 'hari', 'Senin'),
(7, 'hari', 'Selasa'),
(8, 'hari', 'Rabu'),
(9, 'hari', 'Kamis'),
(10, 'hari', 'Jumat'),
(11, 'waktu', 'Pagi'),
(12, 'waktu', 'Siang'),
(13, 'waktu', 'Sore'),
(14, 'jenis_permohonan', 'KTP'),
(15, 'jenis_permohonan', 'KK'),
(16, 'jenis_permohonan', 'KIA');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id` int(11) NOT NULL,
  `kuartal` varchar(15) NOT NULL,
  `hari` varchar(7) NOT NULL,
  `waktu` varchar(6) NOT NULL,
  `jenis_permohonan` varchar(4) NOT NULL,
  `tingkat_kepadatan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `kuartal`, `hari`, `waktu`, `jenis_permohonan`, `tingkat_kepadatan`) VALUES
(1, 'kuartalsatu', 'Senin', 'Pagi', 'KTP', 'Padat'),
(2, 'kuartalsatu', 'Rabu', 'Siang', 'KK', 'Tidak Padat'),
(3, 'kuartalsatu', 'Senin', 'Sore', 'KIA', 'Padat'),
(4, 'kuartaldua', 'Selasa', 'Pagi', 'KTP', 'Tidak Padat'),
(5, 'kuartaldua', 'Rabu', 'Siang', 'KK', 'Padat'),
(6, 'kuartaldua', 'Kamis', 'Sore', 'KIA', 'Tidak Padat'),
(7, 'kuartaltiga', 'Jumat', 'Pagi', 'KTP', 'Padat'),
(8, 'kuartaltiga', 'Senin', 'Siang', 'KK', 'Tidak Padat'),
(9, 'kuartaltiga', 'Selasa', 'Sore', 'KIA', 'Padat'),
(10, 'kuartalempat', 'Rabu', 'Pagi', 'KTP', 'Tidak Padat'),
(11, 'kuartalempat', 'Kamis', 'Pagi', 'KK', 'Padat'),
(12, 'kuartalempat', 'Jumat', 'Siang', 'KIA', 'Tidak Padat'),
(13, 'kuartalsatu', 'Senin', 'Sore', 'KTP', 'Padat'),
(14, 'kuartaldua', 'Selasa', 'Pagi', 'KTP', 'Padat');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`) VALUES
(1, 'Rancamulya'),
(2, 'Bojongkunci'),
(3, 'Rancatungku'),
(4, 'Bojongmanggu'),
(5, 'Sukasari'),
(6, 'Langonsari');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `id_desa`, `nama_dusun`) VALUES
(1, 1, 'I'),
(2, 1, 'II'),
(3, 1, 'III'),
(4, 1, 'IV'),
(5, 1, 'V'),
(6, 2, 'I'),
(7, 2, 'II'),
(8, 2, 'III'),
(9, 2, 'IV'),
(10, 3, 'I'),
(11, 3, 'II'),
(12, 3, 'III'),
(13, 3, 'IV'),
(14, 4, 'I'),
(15, 4, 'II'),
(16, 4, 'III'),
(17, 4, 'IV'),
(18, 4, 'V'),
(19, 5, 'I'),
(20, 5, 'II'),
(21, 5, 'III'),
(22, 5, 'IV'),
(23, 6, 'I'),
(24, 6, 'II'),
(25, 6, 'III'),
(26, 6, 'IV'),
(27, 6, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` text NOT NULL,
  `isi` text NOT NULL,
  `dibuat_oleh` varchar(60) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul_informasi`, `isi`, `dibuat_oleh`, `tanggal_dibuat`) VALUES
(1, 'Syarat Pembuatan Kartu Keluarga (KK)', '1. Surat pengantar dari RT yang sudah distempel oleh RW<p></p><p><span style="font-family: " times="" new="" roman";="" font-size:="" 0.875rem;"="">2. Fotokopi buku nikah atau akta perkawinan.</span></p><p><span style="font-family: " times="" new="" roman";="" font-size:="" 0.875rem;"="">3. Surat keterangan pindah (khusus untuk anggota keluarga pendatang.</span></p>', 'admin', '2020-04-04 12:05:17'),
(2, 'Syarat Pembuatan Kartu Keluarga (KK)', '<h5 style="box-sizing: border-box; font-family: "><font face="Times New Roman">1. Surat pengantar dari RT atau RW setempat<br>2. Kartu keluarga (KK) yang lama<br>3. Surat keterangan kelahiran anggota keluarga baru yang akan ditambahkan</font></h5>', 'admin', '2020-04-04 12:05:43'),
(4, 'Syarat Pembuatan Kartu Keluarga (KK)', '<h5 style="box-sizing: border-box; font-family: "><font face="Times New Roman">1. Surat pengantar RT atau RW daerah setempat<br></font><font face="Times New Roman">2. Kartu keluarga (KK) yang lama atau kartu keluarga yang akan ditumpangi<br></font><font face="Times New Roman">3. Surat keterangan pindah datang (jika tidak satu daerah)<br></font><font face="Times New Roman">4. Surat keterangan datang dari luar negeri (bagi WNI dari luar negeri)<br></font><font face="Times New Roman">5. Paspor, izin tinggal tetap, dan surat keterangan catatan kepolisian (SKCK) atau surat tanda lapor diri (bagi WNA)</font></h5>', 'admin', '2020-04-04 12:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `iterasi_c45`
--

CREATE TABLE `iterasi_c45` (
  `id` int(11) NOT NULL,
  `iterasi` varchar(3) NOT NULL,
  `atribut_gain_ratio_max` varchar(255) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `jml_kasus_total` varchar(5) NOT NULL,
  `jml_padat` varchar(5) NOT NULL,
  `jml_tdk_padat` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuotaantrian`
--

CREATE TABLE `kuotaantrian` (
  `id_kuotaantrian` int(11) NOT NULL,
  `jumlah_permohonan` int(11) NOT NULL,
  `jumlah_pengambilan` int(11) NOT NULL,
  `kuota` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuotaantrian`
--

INSERT INTO `kuotaantrian` (`id_kuotaantrian`, `jumlah_permohonan`, `jumlah_pengambilan`, `kuota`, `tanggal`) VALUES
(1, 0, 0, '100', '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pelayanan`
--

CREATE TABLE `laporan_pelayanan` (
  `id_laporan` int(11) NOT NULL,
  `jumlah_pelayanan` int(11) NOT NULL,
  `jumlah_pengambilan` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `jumlah_ktp` int(11) NOT NULL,
  `jumlah_kia` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mining_c45`
--

CREATE TABLE `mining_c45` (
  `id` int(11) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `jml_kasus_total` varchar(5) NOT NULL,
  `jml_padat` varchar(5) NOT NULL,
  `jml_tdk_padat` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `inf_gain_temp` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `split_info_temp` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_pengambilan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `keterangan_yang_dimohon` varchar(3) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `nama_jalan` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(8) NOT NULL,
  `waktu` time NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `keterangan_yang_dimohon` varchar(3) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `nama_jalan` varchar(50) NOT NULL,
  `nomor_antrian_pengambilan` varchar(6) NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `waktu_pengambilan` time NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(8) NOT NULL,
  `waktu` time NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id_pengambilan`, `id_permohonan`, `nik`, `nama_lengkap`, `nomor_telepon`, `keterangan_yang_dimohon`, `desa`, `dusun`, `rt`, `nama_jalan`, `nomor_antrian_pengambilan`, `tanggal_pengambilan`, `waktu_pengambilan`, `keterangan`, `tanggal`, `hari`, `waktu`, `tahun`) VALUES
(1, 5, '', '', '', '', '', '', '', '', 'L20000', '2020-07-28', '00:00:00', 'Menunggu Diambil', '2020-07-27', 'Senin', '10:23:44', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `keterangan_yang_dimohon` varchar(3) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `nama_jalan` varchar(50) NOT NULL,
  `nomor_antrian_permohonan` varchar(6) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(8) NOT NULL,
  `waktu` time NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `nik`, `nama_lengkap`, `email`, `nomor_telepon`, `keterangan_yang_dimohon`, `desa`, `dusun`, `rt`, `nama_jalan`, `nomor_antrian_permohonan`, `keterangan`, `tanggal`, `hari`, `waktu`, `tahun`) VALUES
(1, '32939390930', 'najich', 'najich.muhammad2703@gmail.com', '', 'KTP', '2', '6', '76', 'Jl. Bojongkunci no.11', 'L10000', 'Ditunda', '2020-07-25', 'Sabtu', '03:48:52', 2020),
(2, '239020210990', 'fajar', 'najich.muhammad2703@gmail.com', '', 'KK', '1', '1', '1', 'Jl. Rancamulya no.13', 'L10000', 'Memohon', '2020-07-25', 'Sabtu', '04:38:37', 2020),
(3, '342089234', 'Hera', 'najich.muhammad2703@gmail.com', '', 'KTP', '2', '6', '77', 'jl.bojongkunci', 'L10000', 'Memohon', '2020-07-25', 'Sabtu', '04:40:05', 2020),
(4, '23408234', 'rani', 'najich.muhammad2703@gmail.com', '', 'KTP', '4', '14', '172', 'jl.bojongmanggu', 'L10000', 'Memohon', '2020-07-25', 'Sabtu', '04:41:19', 2020),
(5, '390329009342', 'kemal', 'kemalsholehuddin6@gmail.com', '', 'KTP', '4', '15', '183', 'jl.bojongmanggu', 'L10000', 'Selesai', '2020-07-27', 'Senin', '10:20:53', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pohon_keputusan_c45`
--

CREATE TABLE `pohon_keputusan_c45` (
  `id` int(4) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `id_parent` char(3) DEFAULT NULL,
  `jml_padat` varchar(5) NOT NULL,
  `jml_tdk_padat` varchar(5) NOT NULL,
  `keputusan` varchar(100) NOT NULL,
  `diproses` varchar(10) NOT NULL,
  `kondisi_atribut` varchar(255) NOT NULL,
  `looping_kondisi` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `rt` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id_rt`, `id_dusun`, `rt`) VALUES
(1, 1, '01'),
(2, 1, '02'),
(3, 1, '03'),
(4, 1, '04'),
(5, 1, '05'),
(6, 1, '06'),
(7, 1, '07'),
(8, 1, '08'),
(9, 1, '09'),
(10, 1, '10'),
(11, 1, '11'),
(12, 1, '12'),
(13, 1, '13'),
(14, 1, '14'),
(15, 1, '15'),
(16, 2, '01'),
(17, 2, '02'),
(18, 2, '03'),
(19, 2, '04'),
(20, 2, '05'),
(21, 2, '06'),
(22, 2, '07'),
(23, 2, '08'),
(24, 2, '09'),
(25, 2, '10'),
(26, 2, '11'),
(27, 2, '12'),
(28, 2, '13'),
(29, 2, '14'),
(30, 3, '01'),
(31, 3, '02'),
(32, 3, '03'),
(33, 3, '04'),
(34, 3, '05'),
(35, 3, '06'),
(36, 3, '07'),
(37, 3, '08'),
(38, 3, '09'),
(39, 4, '01'),
(40, 4, '02'),
(41, 4, '03'),
(42, 4, '04'),
(43, 4, '05'),
(44, 4, '06'),
(45, 4, '07'),
(46, 4, '08'),
(47, 4, '09'),
(48, 4, '10'),
(49, 4, '11'),
(50, 4, '12'),
(51, 4, '13'),
(52, 4, '14'),
(53, 4, '15'),
(54, 5, '01'),
(55, 5, '02'),
(56, 5, '03'),
(57, 5, '04'),
(58, 5, '05'),
(59, 5, '06'),
(60, 5, '07'),
(61, 5, '08'),
(62, 5, '09'),
(63, 5, '10'),
(64, 5, '11'),
(65, 5, '12'),
(66, 5, '13'),
(67, 6, '01'),
(68, 6, '02'),
(69, 6, '03'),
(70, 6, '04'),
(71, 6, '05'),
(72, 6, '06'),
(73, 6, '07'),
(74, 6, '08'),
(75, 6, '09'),
(76, 6, '10'),
(77, 6, '11'),
(78, 6, '12'),
(79, 6, '13'),
(80, 7, '01'),
(81, 7, '02'),
(82, 7, '03'),
(83, 7, '04'),
(84, 7, '05'),
(85, 7, '06'),
(86, 7, '07'),
(87, 7, '08'),
(88, 7, '09'),
(89, 7, '10'),
(90, 7, '11'),
(91, 8, '01'),
(92, 8, '02'),
(93, 8, '03'),
(94, 8, '04'),
(95, 8, '05'),
(96, 8, '06'),
(97, 8, '07'),
(98, 8, '08'),
(99, 8, '09'),
(100, 8, '10'),
(101, 8, '11'),
(102, 8, '12'),
(103, 8, '13'),
(104, 8, '14'),
(105, 8, '15'),
(106, 9, '01'),
(107, 9, '02'),
(108, 9, '03'),
(109, 9, '04'),
(110, 9, '05'),
(111, 9, '06'),
(112, 9, '07'),
(113, 9, '08'),
(114, 9, '09'),
(115, 9, '10'),
(116, 9, '11'),
(117, 9, '12'),
(118, 9, '13'),
(119, 9, '14'),
(120, 9, '15'),
(121, 9, '16'),
(122, 9, '17'),
(123, 9, '18'),
(124, 9, '19'),
(125, 9, '20'),
(126, 9, '21'),
(127, 9, '22'),
(128, 9, '23'),
(129, 10, '01'),
(130, 10, '02'),
(131, 10, '03'),
(132, 10, '04'),
(133, 10, '05'),
(134, 10, '06'),
(135, 10, '07'),
(136, 10, '08'),
(137, 10, '09'),
(138, 11, '01'),
(139, 11, '02'),
(140, 11, '03'),
(141, 11, '04'),
(142, 11, '05'),
(143, 11, '06'),
(144, 11, '07'),
(145, 11, '08'),
(146, 11, '09'),
(147, 11, '10'),
(148, 11, '11'),
(149, 11, '12'),
(150, 11, '13'),
(151, 11, '14'),
(152, 11, '15'),
(153, 12, '01'),
(154, 12, '02'),
(155, 12, '03'),
(156, 12, '04'),
(157, 12, '05'),
(158, 12, '06'),
(159, 12, '07'),
(160, 12, '08'),
(161, 13, '01'),
(162, 13, '02'),
(163, 13, '03'),
(164, 13, '04'),
(165, 13, '05'),
(166, 13, '06'),
(167, 13, '07'),
(168, 13, '08'),
(169, 13, '09'),
(170, 13, '10'),
(171, 14, '01'),
(172, 14, '02'),
(173, 14, '03'),
(174, 14, '04'),
(175, 14, '05'),
(176, 14, '06'),
(177, 14, '07'),
(178, 15, '01'),
(179, 15, '02'),
(180, 15, '03'),
(181, 15, '04'),
(182, 15, '05'),
(183, 15, '06'),
(184, 15, '07'),
(185, 15, '08'),
(186, 15, '09'),
(187, 16, '01'),
(188, 16, '02'),
(189, 16, '03'),
(190, 16, '04'),
(191, 16, '05'),
(192, 16, '06'),
(193, 17, '01'),
(194, 17, '02'),
(195, 17, '03'),
(196, 17, '04'),
(197, 17, '05'),
(198, 17, '06'),
(199, 17, '07'),
(200, 17, '08'),
(201, 17, '09'),
(202, 18, '01'),
(203, 18, '02'),
(204, 18, '03'),
(205, 18, '04'),
(206, 18, '05'),
(207, 18, '06'),
(208, 18, '07'),
(209, 18, '08'),
(210, 18, '09'),
(211, 19, '01'),
(212, 19, '02'),
(213, 19, '03'),
(214, 19, '04'),
(215, 19, '05'),
(216, 19, '06'),
(217, 19, '07'),
(218, 19, '08'),
(219, 19, '09'),
(220, 19, '10'),
(221, 19, '11'),
(222, 19, '12'),
(223, 19, '13'),
(224, 19, '14'),
(225, 19, '15'),
(226, 19, '16'),
(227, 20, '01'),
(228, 20, '02'),
(229, 20, '03'),
(230, 20, '04'),
(231, 20, '05'),
(232, 20, '06'),
(233, 20, '07'),
(234, 20, '08'),
(235, 20, '09'),
(236, 20, '10'),
(237, 20, '11'),
(238, 20, '12'),
(239, 20, '13'),
(240, 20, '14'),
(241, 20, '15'),
(242, 20, '16'),
(243, 21, '01'),
(244, 21, '02'),
(245, 21, '03'),
(246, 21, '04'),
(247, 21, '05'),
(248, 21, '06'),
(249, 21, '07'),
(250, 21, '08'),
(251, 21, '09'),
(252, 21, '10'),
(253, 22, '01'),
(254, 22, '02'),
(255, 22, '03'),
(256, 22, '04'),
(257, 22, '05'),
(258, 22, '06'),
(259, 22, '07'),
(260, 22, '08'),
(261, 22, '09'),
(274, 24, '01'),
(275, 24, '02'),
(276, 24, '03'),
(277, 24, '04'),
(278, 24, '05'),
(279, 24, '06'),
(280, 24, '07'),
(281, 24, '08'),
(282, 24, '09'),
(283, 24, '10'),
(284, 25, '01'),
(285, 25, '02'),
(286, 25, '03'),
(287, 25, '04'),
(288, 25, '05'),
(289, 25, '06'),
(290, 25, '07'),
(291, 25, '08'),
(292, 25, '09'),
(293, 25, '10'),
(294, 25, '11'),
(295, 25, '12'),
(296, 25, '13'),
(297, 25, '14'),
(298, 26, '01'),
(299, 26, '02'),
(300, 26, '03'),
(301, 26, '04'),
(302, 26, '05'),
(303, 26, '06'),
(304, 26, '07'),
(305, 26, '08'),
(306, 26, '09'),
(307, 26, '10'),
(308, 26, '11'),
(309, 26, '12'),
(310, 26, '13'),
(311, 26, '14'),
(312, 26, '15'),
(313, 26, '16'),
(314, 26, '17'),
(315, 26, '18'),
(316, 27, '01'),
(317, 27, '02'),
(318, 27, '03'),
(319, 27, '04'),
(320, 27, '05'),
(321, 27, '06'),
(322, 27, '07'),
(323, 27, '08'),
(324, 27, '09'),
(325, 27, '10'),
(326, 27, '11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(10) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`, `tanggal_dibuat`, `status`) VALUES
('USR000002', 'pelayanan', 'najich.muhammad2703@gmail.com', 'c1b01c85f96519afb28e43dab8827e18', 'Pelayanan', '2020-07-24 17:00:00', 0),
('USR000003', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-08-11 17:00:00', 0),
('USR000004', 'kecamatan', 'kecamatan@gmail.com', 'dskjlsdfkljdfsklk', 'Pelayanan', '2020-08-13 10:23:57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `iterasi_c45`
--
ALTER TABLE `iterasi_c45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuotaantrian`
--
ALTER TABLE `kuotaantrian`
  ADD PRIMARY KEY (`id_kuotaantrian`);

--
-- Indexes for table `laporan_pelayanan`
--
ALTER TABLE `laporan_pelayanan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mining_c45`
--
ALTER TABLE `mining_c45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `pohon_keputusan_c45`
--
ALTER TABLE `pohon_keputusan_c45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut`
--
ALTER TABLE `atribut`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `iterasi_c45`
--
ALTER TABLE `iterasi_c45`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kuotaantrian`
--
ALTER TABLE `kuotaantrian`
  MODIFY `id_kuotaantrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laporan_pelayanan`
--
ALTER TABLE `laporan_pelayanan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mining_c45`
--
ALTER TABLE `mining_c45`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id_pengambilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pohon_keputusan_c45`
--
ALTER TABLE `pohon_keputusan_c45`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
