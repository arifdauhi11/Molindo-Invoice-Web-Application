-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 03:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_molindo`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_service`
-- (See below for the actual view)
--
CREATE TABLE `customer_service` (
`id_customer_service` varchar(255)
,`id_user` varchar(255)
,`id_role` int(11)
,`nama_user` varchar(255)
,`foto_profil` varchar(255)
,`signature` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `finance`
-- (See below for the actual view)
--
CREATE TABLE `finance` (
`id_finance` varchar(255)
,`id_user` varchar(255)
,`id_role` int(11)
,`nama_user` varchar(255)
,`foto_profil` varchar(255)
,`signature` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `karyawan`
-- (See below for the actual view)
--
CREATE TABLE `karyawan` (
`id` varchar(255)
,`id_user` varchar(255)
,`id_foto_profil` int(11)
,`foto_profil` varchar(255)
,`signature` varchar(255)
,`nama_user` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `id_user`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'U001', 'MN2Direktur', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kolektor`
-- (See below for the actual view)
--
CREATE TABLE `kolektor` (
`id_kolektor` varchar(255)
,`id_user` varchar(255)
,`id_role` int(11)
,`nama_user` varchar(255)
,`foto_profil` varchar(255)
,`signature` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `log`
-- (See below for the actual view)
--
CREATE TABLE `log` (
`id_log` int(11)
,`id_user` varchar(255)
,`id_role` int(11)
,`nama_user` varchar(255)
,`username` varchar(255)
,`role` varchar(50)
,`aksi` varchar(255)
,`waktu` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pemasukkan`
-- (See below for the actual view)
--
CREATE TABLE `pemasukkan` (
`id_anggaran` varchar(255)
,`anggaran` bigint(20)
,`masuk` varchar(255)
,`bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember')
,`tahun_anggaran` int(11)
,`bukti_kwitansi` varchar(255)
,`tahap` enum('Tahap 1','Tahap 2','Tahap 3','Tahap 4','Tahap 5','Tahap 6','Tahap 7','Tahap 8','Tahap 9','Tahap 10')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pengeluaran`
-- (See below for the actual view)
--
CREATE TABLE `pengeluaran` (
`id_anggaran` varchar(255)
,`id_biaya` varchar(255)
,`anggaran` bigint(20)
,`terpakai` bigint(20)
,`keluar` varchar(255)
,`bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember')
,`tahun_anggaran` int(11)
,`takteranggarkan` enum('Ya','Tidak')
,`tahap` enum('Tahap 1','Tahap 2','Tahap 3','Tahap 4','Tahap 5','Tahap 6','Tahap 7','Tahap 8','Tahap 9','Tahap 10')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tagihan`
-- (See below for the actual view)
--
CREATE TABLE `tagihan` (
`id_tagihan` varchar(255)
,`id_karyawan` varchar(255)
,`id_pelanggan` varchar(255)
,`kd_tagihan` varchar(255)
,`nama_pelanggan` varchar(255)
,`alamat_pelanggan` varchar(255)
,`status_pelanggan` enum('active','inactive')
,`nama_user` varchar(255)
,`tagihan` bigint(20)
,`iuran` bigint(20)
,`periode` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember')
,`tgl_tagihan` date
,`bulan_tagihan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember')
,`tahun_tagihan` int(11)
,`tahun_pembuatan` int(11)
,`status_tagihan` enum('pending','paid','transfer')
,`jumlah_cetak` int(11)
,`nama_invoice` varchar(255)
,`jumlah_download` int(11)
,`jumlah_kirim` int(11)
,`bukti_transfer` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `t_anggaran`
--

CREATE TABLE `t_anggaran` (
  `id_biaya` varchar(255) DEFAULT NULL,
  `id_anggaran` varchar(255) NOT NULL,
  `anggaran` bigint(20) NOT NULL DEFAULT '0',
  `terpakai` bigint(20) NOT NULL DEFAULT '0',
  `masuk` varchar(255) DEFAULT NULL,
  `keluar` varchar(255) DEFAULT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL,
  `tahun_anggaran` int(11) NOT NULL DEFAULT '0',
  `bukti_kwitansi` varchar(255) DEFAULT NULL,
  `takteranggarkan` enum('Ya','Tidak') DEFAULT NULL,
  `tahap` enum('Tahap 1','Tahap 2','Tahap 3','Tahap 4','Tahap 5','Tahap 6','Tahap 7','Tahap 8','Tahap 9','Tahap 10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_anggaran`
--

INSERT INTO `t_anggaran` (`id_biaya`, `id_anggaran`, `anggaran`, `terpakai`, `masuk`, `keluar`, `bulan`, `tahun_anggaran`, `bukti_kwitansi`, `takteranggarkan`, `tahap`) VALUES
(NULL, 'ANG001', 12000000, 0, 'Pemasukkan 1', NULL, 'Desember', 2020, 'kwitansi.jpg', NULL, 'Tahap 1'),
(NULL, 'ANG002', 13000000, 0, 'Pemasukkan 2', NULL, 'Desember', 2020, 'kwitansi1.jpg', NULL, 'Tahap 1'),
('B001', 'ANG003', 3000000, 2800000, NULL, 'Pengeluaran 1', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
('B002', 'ANG004', 1000000, 1000000, NULL, 'Pengeluaran 2', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
('B003', 'ANG005', 1500000, 1500000, NULL, 'Pengeluaran 3', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
('B004', 'ANG006', 2000000, 1000000, NULL, 'Pengeluaran 4', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
(NULL, 'ANG007', 4000000, 4000000, NULL, 'Tak teranggar 1', 'Desember', 2020, NULL, 'Ya', 'Tahap 1'),
('B001', 'ANG008', 6000000, 6000000, NULL, 'BT 1', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
('B005', 'ANG009', 2000000, 1500000, NULL, 'BL1', 'Desember', 2020, NULL, 'Tidak', 'Tahap 1'),
(NULL, 'ANG012', 2000000, 2000000, NULL, 'Tak teranggar', 'Januari', 2021, NULL, 'Ya', 'Tahap 1'),
(NULL, 'ANG013', 10000000, 0, 'Pemasukkan 2', NULL, 'Januari', 2021, 'kwitansi3.jpg', NULL, 'Tahap 2'),
('B001', 'ANG014', 5000000, 4500000, NULL, 'BT 2', 'Januari', 2021, NULL, 'Tidak', 'Tahap 2');

-- --------------------------------------------------------

--
-- Table structure for table `t_biaya`
--

CREATE TABLE `t_biaya` (
  `id_biaya` varchar(255) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_biaya`
--

INSERT INTO `t_biaya` (`id_biaya`, `nama_biaya`) VALUES
('B001', 'Biaya Tetap'),
('B002', 'Biaya Operasional'),
('B003', 'Biaya Maintenance'),
('B004', 'Tunjangan Direksi'),
('B005', 'Biaya Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `t_biaya_tambahan`
--

CREATE TABLE `t_biaya_tambahan` (
  `id_biaya_tambahan` bigint(20) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `biaya_tambahan` varchar(255) DEFAULT NULL,
  `biaya` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_biaya_tambahan`
--

INSERT INTO `t_biaya_tambahan` (`id_biaya_tambahan`, `id_pelanggan`, `biaya_tambahan`, `biaya`) VALUES
(1, 'PL000001', 'Tambahan 1', 50000),
(2, 'PL000001', 'Tambahan 2', 100000),
(3, 'PL000001', 'Tambahan 3', 75000),
(4, 'PL000002', 'T1', 25000),
(5, 'PL000002', 'T2', 50000),
(6, 'PL000002', 'T3', 100000),
(7, 'PL000003', 'Tambahan 1', 70000),
(8, 'PL000003', 'Tambahan 2', 50000),
(9, 'PL000003', 'Tambahan 3', 80000),
(10, 'PL000004', NULL, NULL),
(11, 'PL000004', NULL, NULL),
(12, 'PL000004', NULL, NULL),
(13, 'PL000005', '', 0),
(14, 'PL000005', '', 0),
(15, 'PL000005', '', 0),
(16, 'PL000006', '', 0),
(17, 'PL000006', '', 0),
(18, 'PL000006', '', 0),
(19, 'PL000007', NULL, NULL),
(20, 'PL000007', NULL, NULL),
(21, 'PL000007', NULL, NULL),
(22, 'PL000006', '', 0),
(23, 'PL000006', '', 0),
(24, 'PL000006', '', 0),
(25, 'PL000007', NULL, NULL),
(26, 'PL000007', NULL, NULL),
(27, 'PL000007', NULL, NULL),
(28, 'PL000008', NULL, NULL),
(29, 'PL000008', NULL, NULL),
(30, 'PL000008', NULL, NULL),
(31, 'PL000009', '', 0),
(32, 'PL000009', '', 0),
(33, 'PL000009', '', 0),
(34, 'PL000010', NULL, NULL),
(35, 'PL000010', NULL, NULL),
(36, 'PL000010', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_customer_service`
--

CREATE TABLE `t_customer_service` (
  `id_customer_service` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_customer_service`
--

INSERT INTO `t_customer_service` (`id_customer_service`, `id_user`, `signature`) VALUES
('CS001', 'U013', 'signature12.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_finance`
--

CREATE TABLE `t_finance` (
  `id_finance` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_finance`
--

INSERT INTO `t_finance` (`id_finance`, `id_user`, `signature`) VALUES
('F001', 'U011', 'ttd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_foto_profil`
--

CREATE TABLE `t_foto_profil` (
  `id_foto_profil` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_foto_profil`
--

INSERT INTO `t_foto_profil` (`id_foto_profil`, `id_user`, `foto_profil`) VALUES
(6, 'U001', 'pembiayaan.png'),
(14, 'U008', 'user.png'),
(15, 'U009', 'user.png'),
(24, 'U010', 'pembangunan.jpg'),
(25, 'U011', 'pemberdayaan.jpg'),
(26, 'U012', 'user.png'),
(30, 'U013', 'penanggulangan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_kolektor`
--

CREATE TABLE `t_kolektor` (
  `id_kolektor` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kolektor`
--

INSERT INTO `t_kolektor` (`id_kolektor`, `id_user`, `signature`) VALUES
('K005', 'U010', 'ttd1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE `t_log` (
  `id_log` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log`
--

INSERT INTO `t_log` (`id_log`, `id_user`, `aksi`, `waktu`) VALUES
(998, 'U001', 'Login', '2020-12-30 11:28:52'),
(999, 'U010', 'Login', '2020-12-30 11:30:00'),
(1000, 'U001', 'Login', '2020-12-30 12:11:23'),
(1001, 'U001', 'Login', '2020-12-30 12:16:20'),
(1002, 'U001', 'Login', '2020-12-30 12:19:15'),
(1003, 'U001', 'Logout', '2020-12-30 12:27:11'),
(1004, 'U011', 'Login', '2020-12-30 12:27:21'),
(1005, 'U001', 'Login', '2021-01-04 01:34:38'),
(1006, 'U001', 'Login', '2021-01-04 01:35:07'),
(1007, 'U001', 'Menambah pelanggan dengan nama SDN 1 AA.', '2021-01-04 04:42:00'),
(1008, 'U001', 'Menambah pelanggan dengan nama SDN 1 AA.', '2021-01-04 04:44:11'),
(1009, 'U001', 'Login', '2021-01-04 10:19:17'),
(1010, 'U001', 'Login', '2021-01-04 12:19:58'),
(1011, 'U001', 'Menambah pelanggan dengan nama Raden Pratama.', '2021-01-04 13:19:39'),
(1012, 'U001', 'Login', '2021-01-05 12:38:35'),
(1013, 'U001', 'Login', '2021-01-05 23:59:12'),
(1014, 'U001', 'Login', '2021-01-06 05:36:24'),
(1015, 'U001', 'Login', '2021-01-06 11:19:28'),
(1016, 'U001', 'Logout', '2021-01-06 11:19:34'),
(1017, 'U001', 'Login', '2021-01-06 11:19:40'),
(1018, 'U001', 'Logout', '2021-01-06 11:21:53'),
(1019, 'U010', 'Login', '2021-01-06 11:21:58'),
(1020, 'U010', 'Logout', '2021-01-06 11:22:44'),
(1021, 'U001', 'Login', '2021-01-06 11:22:49'),
(1022, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 12:12:09'),
(1023, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 12:15:54'),
(1024, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 12:16:26'),
(1025, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:19:20'),
(1026, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:25:44'),
(1027, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:26:04'),
(1028, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:28:36'),
(1029, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:28:52'),
(1030, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-06 13:32:35'),
(1031, 'U001', 'Login', '2021-01-08 11:45:53'),
(1032, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 11:54:02'),
(1033, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:01:46'),
(1034, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:05:39'),
(1035, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:05:46'),
(1036, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:05:58'),
(1037, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:06:18'),
(1038, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:07:01'),
(1039, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:12:06'),
(1040, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:19:13'),
(1041, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:19:34'),
(1042, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:20:01'),
(1043, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 12:20:19'),
(1044, 'U001', 'Login', '2021-01-08 12:55:58'),
(1045, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:24:49'),
(1046, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:26:04'),
(1047, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:29:27'),
(1048, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:29:27'),
(1049, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:31:49'),
(1050, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:33:06'),
(1051, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:33:43'),
(1052, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 13:34:25'),
(1053, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 13:34:45'),
(1054, 'U001', 'Mengubah data pelanggan Raden Pratama.', '2021-01-08 13:35:04'),
(1055, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:38:05'),
(1056, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:38:18'),
(1057, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:38:28'),
(1058, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:39:49'),
(1059, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:42:28'),
(1060, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:42:44'),
(1061, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:43:10'),
(1062, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-08 13:43:23'),
(1063, 'U001', 'Login', '2021-01-09 05:59:17'),
(1064, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-09 06:06:21'),
(1065, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-09 06:06:45'),
(1066, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-09 06:07:11'),
(1067, 'U001', 'Mengubah data pelanggan SDN 1 AA.', '2021-01-09 06:07:54'),
(1068, 'U001', 'Mengubah data pelanggan SDN 1 AA 1.', '2021-01-09 06:23:44'),
(1069, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:24:59'),
(1070, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:25:36'),
(1071, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:27:10'),
(1072, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:28:01'),
(1073, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:37:21'),
(1074, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:37:42'),
(1075, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:37:53'),
(1076, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:40:04'),
(1077, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:40:17'),
(1078, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:40:28'),
(1079, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:40:41'),
(1080, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:41:36'),
(1081, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:41:49'),
(1082, 'U001', 'Mengubah data pelanggan Raden Pratama 1.', '2021-01-09 06:43:11'),
(1083, 'U001', 'Mengubah data pelanggan SDN 1 AA 1.', '2021-01-09 06:43:57'),
(1084, 'U001', 'Mengubah data pelanggan SDN 1 AA 1.', '2021-01-09 06:44:13'),
(1085, 'U001', 'Mengubah data pelanggan SDN 1 AA 1.', '2021-01-09 06:44:24'),
(1086, 'U001', 'Menghapus sementara SDN 1 AA 1 dari data pelanggan.', '2021-01-09 07:34:56'),
(1087, 'U001', 'Menghapus sementara Raden Pratama 1 dari data pelanggan.', '2021-01-09 07:35:20'),
(1088, 'U001', 'Login', '2021-01-09 10:37:40'),
(1089, 'U001', 'Menambah pelanggan dengan nama SDN 1 Biau.', '2021-01-09 10:43:01'),
(1090, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 10:43:29'),
(1091, 'U010', 'Login', '2021-01-09 10:44:39'),
(1092, 'U010', 'Berhasil generate invoice SDN 1 Biau bulan Januari tahun 2021', '2021-01-09 10:48:37'),
(1093, 'U001', 'Menghapus invoice SDN 1 Biau bulan Januari tahun 2021 dari data invoice.', '2021-01-09 10:49:21'),
(1094, 'U010', 'Berhasil generate invoice SDN 1 Biau bulan Januari tahun 2021', '2021-01-09 10:51:00'),
(1095, 'U010', 'Berhasil generate invoice SDN 1 Biau bulan Februari tahun 2021', '2021-01-09 10:53:17'),
(1096, 'U010', 'Berhasil generate invoice SDN 1 Biau bulan Maret tahun 2021', '2021-01-09 10:54:33'),
(1097, 'U010', 'Berhasil generate invoice SDN 1 Biau bulan April tahun 2021', '2021-01-09 10:54:46'),
(1098, 'U010', 'Menambah pelanggan dengan nama Fazria Zia.', '2021-01-09 11:02:09'),
(1099, 'U010', 'Logout', '2021-01-09 11:18:45'),
(1100, 'U011', 'Login', '2021-01-09 11:18:52'),
(1101, 'U011', 'Logout', '2021-01-09 11:21:44'),
(1102, 'U011', 'Login', '2021-01-09 11:21:49'),
(1103, 'U001', 'Logout', '2021-01-09 11:26:03'),
(1104, 'U010', 'Login', '2021-01-09 11:26:10'),
(1105, 'U010', 'Logout', '2021-01-09 11:26:26'),
(1106, 'U001', 'Login', '2021-01-09 11:26:30'),
(1107, 'U011', 'Logout', '2021-01-09 11:31:40'),
(1108, 'U010', 'Login', '2021-01-09 11:31:50'),
(1109, 'U001', 'Mengubah data user.', '2021-01-09 11:33:39'),
(1110, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 11:44:45'),
(1111, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 11:48:27'),
(1112, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 11:49:07'),
(1113, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 11:53:51'),
(1114, 'U001', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-09 11:54:14'),
(1115, 'U001', 'Menonaktifkan akun Fadi Ahmad.', '2021-01-09 11:58:17'),
(1116, 'U001', 'Mengaktifkan akun Fadi Ahmad.', '2021-01-09 11:58:31'),
(1117, 'U010', 'Logout', '2021-01-09 12:01:22'),
(1118, 'U011', 'Login', '2021-01-09 12:01:26'),
(1119, 'U011', 'Logout', '2021-01-09 12:01:39'),
(1120, 'U001', 'Mengubah status tagihan Fazria Zia bulan September tahun 2021 dari Lunas Transfer menjadi Lunas.', '2021-01-09 13:38:07'),
(1121, 'U001', 'Mengubah status tagihan Fazria Zia bulan September tahun 2021 dari Lunas menjadi Lunas Transfer.', '2021-01-09 13:38:20'),
(1122, 'U001', 'Login', '2021-01-10 10:53:11'),
(1123, 'U001', 'Mengubah data user.', '2021-01-10 10:54:22'),
(1124, 'U001', 'Mengubah data user.', '2021-01-10 10:54:31'),
(1125, 'U001', 'Menambah Jos sebagai user baru.', '2021-01-10 10:55:00'),
(1126, 'U001', 'Menonaktifkan akun Yandris.', '2021-01-10 10:56:19'),
(1127, 'U001', 'Menonaktifkan akun Yandris.', '2021-01-10 10:56:22'),
(1128, 'U001', 'Mengaktifkan akun Yandris.', '2021-01-10 10:56:26'),
(1129, 'U001', 'Logout', '2021-01-10 10:56:56'),
(1130, 'U010', 'Login', '2021-01-10 10:57:02'),
(1131, 'U010', 'Menonaktifkan akun Yandris.', '2021-01-10 10:57:20'),
(1132, 'U010', 'Mengaktifkan akun Yandris.', '2021-01-10 10:57:28'),
(1133, 'U010', 'Logout', '2021-01-10 10:57:40'),
(1134, 'U001', 'Login', '2021-01-10 10:57:47'),
(1135, 'U001', 'Login', '2021-01-11 02:59:54'),
(1136, 'U001', 'Logout', '2021-01-11 03:16:30'),
(1137, 'U010', 'Login', '2021-01-11 03:16:36'),
(1138, 'U010', 'Logout', '2021-01-11 03:17:00'),
(1139, 'U010', 'Login', '2021-01-11 03:20:29'),
(1140, 'U010', 'Logout', '2021-01-11 03:20:39'),
(1141, 'U001', 'Login', '2021-01-11 03:27:49'),
(1142, 'U001', 'Menambah Rostika sebagai user baru.', '2021-01-11 03:39:32'),
(1143, 'U001', 'Mengaktifkan akun Rostika.', '2021-01-11 03:39:42'),
(1144, 'U001', 'Menambah Rostika sebagai user baru.', '2021-01-11 03:55:43'),
(1145, 'U001', 'Login', '2021-01-12 02:33:08'),
(1146, 'U001', 'Menghapus Rostika dari data user.', '2021-01-12 03:23:39'),
(1147, 'U001', 'Menambah Rostika sebagai user baru.', '2021-01-12 03:35:47'),
(1148, 'U001', 'Mengaktifkan akun Rostika.', '2021-01-12 03:36:21'),
(1149, 'U001', 'Mengubah data user.', '2021-01-12 04:07:25'),
(1150, 'U001', 'Mengubah data user.', '2021-01-12 04:07:58'),
(1151, 'U001', 'Mengubah data user.', '2021-01-12 04:08:05'),
(1152, 'U001', 'Mengubah data user.', '2021-01-12 04:08:15'),
(1153, 'U001', 'Mengubah data user.', '2021-01-12 04:08:22'),
(1154, 'U001', 'Mengubah foto profil.', '2021-01-12 04:09:10'),
(1155, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:11:55'),
(1156, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:15:55'),
(1157, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:16:10'),
(1158, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:16:23'),
(1159, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:17:35'),
(1160, 'U001', 'Mengubah gambar tanda tangan Rostika.', '2021-01-12 04:17:49'),
(1161, 'U001', 'Mengubah gambar tanda tangan Yandris.', '2021-01-12 04:18:39'),
(1162, 'U001', 'Mengubah gambar tanda tangan Yandris.', '2021-01-12 04:18:51'),
(1163, 'U001', 'Mengubah gambar tanda tangan Fadi%20Ahmad.', '2021-01-12 04:19:08'),
(1164, 'U001', 'Mengubah nama Biaya Tetap menjadi Biaya Tetap 1.', '2021-01-12 04:35:18'),
(1165, 'U001', 'Mengubah nama Biaya Tetap 1 menjadi Biaya Tetap.', '2021-01-12 04:35:59'),
(1166, 'U001', 'Mengubah nama Biaya Operasional menjadi Biaya Operasional 1.', '2021-01-12 04:37:54'),
(1167, 'U001', 'Mengubah nama Biaya Operasional 1 menjadi Biaya Operasional.', '2021-01-12 04:38:01'),
(1168, 'U001', 'Mengubah nama Biaya Tetap menjadi Biaya Tetap.', '2021-01-12 04:39:28'),
(1169, 'U001', 'Logout', '2021-01-12 04:41:43'),
(1170, 'U010', 'Login', '2021-01-12 04:41:53'),
(1171, 'U010', 'Logout', '2021-01-12 04:42:19'),
(1172, 'U001', 'Login', '2021-01-12 04:42:26'),
(1173, 'U001', 'Mengubah nama Biaya Tetap menjadi Biaya Tetap 1.', '2021-01-12 04:42:45'),
(1174, 'U001', 'Mengubah nama Biaya Tetap 1 menjadi Biaya Tetap.', '2021-01-12 04:43:11'),
(1175, 'U011', 'Login', '2021-01-12 04:43:59'),
(1176, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 04:47:55'),
(1177, 'U011', 'Pemasukkan Pemasukkan 2 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 04:54:05'),
(1178, 'U011', 'Pengeluaran Pengeluaran 1 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:06:47'),
(1179, 'U011', 'Pengeluaran Pengeluaran 2 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:19:30'),
(1180, 'U011', 'Pengeluaran Pengeluaran 3 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:20:06'),
(1181, 'U011', 'Pengeluaran Pengeluaran 4 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:21:17'),
(1182, 'U011', 'Pengeluaran Tak teranggar 1 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:32:39'),
(1183, 'U011', 'Pengeluaran BT 1 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:34:13'),
(1184, 'U011', 'Menambah biaya dengan nama Biaya Lainnya.', '2021-01-12 06:36:18'),
(1185, 'U011', 'Pengeluaran BL1 Bulan Desember Tahun 2020 berhasil ditambahkan.', '2021-01-12 06:37:10'),
(1186, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil ditambahkan.', '2021-01-12 06:46:14'),
(1187, 'U011', 'Pengeluaran BT 1 Bulan Januari Tahun 2021 berhasil ditambahkan.', '2021-01-12 06:46:57'),
(1188, 'U011', 'Pengeluaran Tak teranggar Bulan Januari Tahun 2021 berhasil ditambahkan.', '2021-01-12 06:47:48'),
(1189, 'U011', 'Pemasukkan Pemasukkan 2 Bulan Januari Tahun 2021 berhasil ditambahkan.', '2021-01-12 06:52:13'),
(1190, 'U011', 'Pengeluaran BT 2 Bulan Januari Tahun 2021 berhasil ditambahkan.', '2021-01-12 06:52:52'),
(1191, 'U001', 'Login', '2021-01-12 07:08:46'),
(1192, 'U011', 'Menambah biaya dengan nama Biaya Darurat.', '2021-01-12 07:27:36'),
(1193, 'U001', 'Menghapus Biaya%20Darurat dari nama biaya.', '2021-01-12 07:32:32'),
(1194, 'U001', 'Menghapus SDN 1 AA 1 dari data pelanggan.', '2021-01-12 08:15:38'),
(1195, 'U001', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-12 08:16:30'),
(1196, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan Januari tahun 2021 dari Pending menjadi Lunas Transfer.', '2021-01-12 08:17:37'),
(1197, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan Februari tahun 2021 dari Pending menjadi Lunas Transfer.', '2021-01-12 08:30:46'),
(1198, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan Maret tahun 2021 dari Pending menjadi Lunas.', '2021-01-12 08:31:04'),
(1199, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan April tahun 2021 dari Pending menjadi Lunas.', '2021-01-12 08:31:10'),
(1200, 'U001', 'Menghapus SDN 1 Biau dari data pelanggan.', '2021-01-12 08:32:13'),
(1201, 'U001', 'Menambah pelanggan dengan nama SDN 1 Biau.', '2021-01-12 08:35:02'),
(1202, 'U001', 'Mengaktifkan kembali data pelanggan Raden Pratama 1.', '2021-01-12 08:52:55'),
(1203, 'U011', 'Login', '2021-01-12 10:26:53'),
(1204, 'U011', 'Berhasil generate invoice SDN 1 Biau bulan Januari tahun 2021', '2021-01-12 10:29:03'),
(1205, 'U011', 'Mengubah status tagihan SDN 1 Biau bulan Januari tahun 2021 dari Pending menjadi Lunas Transfer.', '2021-01-12 10:29:21'),
(1206, 'U011', 'Berhasil generate invoice SDN 1 Biau bulan Februari tahun 2021', '2021-01-12 10:29:49'),
(1207, 'U011', 'Mengubah status tagihan SDN 1 Biau bulan Februari tahun 2021 dari Pending menjadi Lunas Transfer.', '2021-01-12 10:29:59'),
(1208, 'U011', 'Menambah bukti transfer invoice bulan Februari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:13:51'),
(1209, 'U011', 'Menambah bukti transfer invoice bulan Februari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:15:02'),
(1210, 'U011', 'Menambah bukti transfer invoice bulan Februari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:16:59'),
(1211, 'U011', 'Menambah bukti transfer invoice bulan Februari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:19:45'),
(1212, 'U011', 'Menambah bukti transfer invoice bulan Februari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:24:30'),
(1213, 'U011', 'Mengubah bukti transfer invoice bulan  tahun  untuk pelanggan ', '2021-01-12 11:34:20'),
(1214, 'U011', 'Mengubah bukti transfer invoice bulan  tahun  untuk pelanggan ', '2021-01-12 11:41:42'),
(1215, 'U011', 'Mengubah bukti transfer invoice bulan Januari tahun 2021 untuk pelanggan SDN 1 Biau', '2021-01-12 11:55:13'),
(1216, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-12 12:01:56'),
(1217, 'U001', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-12 12:09:20'),
(1218, 'U001', 'Login', '2021-01-14 10:31:13'),
(1219, 'U001', 'Mengubah foto profil.', '2021-01-14 10:32:10'),
(1220, 'U001', 'Logout', '2021-01-14 10:32:48'),
(1221, 'U001', 'Login', '2021-01-14 10:32:52'),
(1222, 'U001', 'Logout', '2021-01-14 10:34:26'),
(1223, 'U010', 'Login', '2021-01-14 10:34:32'),
(1224, 'U010', 'Logout', '2021-01-14 10:34:41'),
(1225, 'U001', 'Login', '2021-01-14 10:34:46'),
(1226, 'U001', 'Mengubah foto profil.', '2021-01-14 10:38:17'),
(1227, 'U001', 'Mengubah foto profil.', '2021-01-14 10:38:57'),
(1228, 'U001', 'Mengubah foto profil.', '2021-01-14 10:39:36'),
(1229, 'U001', 'Mengubah foto profil.', '2021-01-14 10:47:32'),
(1230, 'U001', 'Mengubah foto profil.', '2021-01-14 10:49:43'),
(1231, 'U001', 'Mengubah foto profil.', '2021-01-14 10:50:14'),
(1232, 'U001', 'Mengubah foto profil.', '2021-01-14 10:51:02'),
(1233, 'U001', 'Mengubah foto profil.', '2021-01-14 10:51:47'),
(1234, 'U001', 'Mengubah foto profil.', '2021-01-14 10:53:29'),
(1235, 'U001', 'Mengubah foto profil.', '2021-01-14 11:10:04'),
(1236, 'U001', 'Mengubah foto profil.', '2021-01-14 11:12:31'),
(1237, 'U001', 'Mengubah foto profil.', '2021-01-14 11:14:23'),
(1238, 'U001', 'Mengubah foto profil.', '2021-01-14 11:15:16'),
(1239, 'U001', 'Mengubah foto profil.', '2021-01-14 11:15:54'),
(1240, 'U001', 'Login', '2021-01-15 06:30:04'),
(1241, 'U001', 'Login', '2021-01-15 11:26:00'),
(1242, 'U001', 'Menghapus sementara Raden Pratama 1 dari data pelanggan.', '2021-01-15 11:27:00'),
(1243, 'U001', 'Menghapus sementara Fazria Zia dari data pelanggan.', '2021-01-15 11:27:37'),
(1244, 'U001', 'Menghapus Fazria Zia dari data pelanggan.', '2021-01-15 11:28:03'),
(1245, 'U001', 'Mengaktifkan kembali data pelanggan Raden Pratama 1.', '2021-01-15 11:28:30'),
(1246, 'U001', 'Login', '2021-01-15 11:30:44'),
(1247, 'U001', 'Logout', '2021-01-15 11:30:48'),
(1248, 'U011', 'Login', '2021-01-15 11:30:58'),
(1249, 'U011', 'Menghapus sementara Raden Pratama 1 dari data pelanggan.', '2021-01-15 11:33:30'),
(1250, 'U011', 'Logout', '2021-01-15 11:39:48'),
(1251, 'U010', 'Login', '2021-01-15 11:39:54'),
(1252, 'U010', 'Logout', '2021-01-15 11:40:13'),
(1253, 'U011', 'Login', '2021-01-15 11:40:21'),
(1254, 'U001', 'Mengkonfirmasi Yandris menghapus Raden Pratama 1 dari data pelanggan.', '2021-01-15 13:03:00'),
(1255, 'U001', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:04:42'),
(1256, 'U001', 'Logout', '2021-01-15 13:04:50'),
(1257, 'U012', 'Login', '2021-01-15 13:04:55'),
(1258, 'U012', 'Logout', '2021-01-15 13:06:32'),
(1259, 'U001', 'Login', '2021-01-15 13:06:37'),
(1260, 'U001', 'Logout', '2021-01-15 13:06:42'),
(1261, 'U012', 'Login', '2021-01-15 13:06:47'),
(1262, 'U012', 'Mengubah data user.', '2021-01-15 13:08:35'),
(1263, 'U012', 'Mengubah data user.', '2021-01-15 13:08:44'),
(1264, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:10:09'),
(1265, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:17:07'),
(1266, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:17:22'),
(1267, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:19:11'),
(1268, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:19:36'),
(1269, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:39:30'),
(1270, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:39:56'),
(1271, 'U012', 'Logout', '2021-01-15 13:40:22'),
(1272, 'U001', 'Login', '2021-01-15 13:40:26'),
(1273, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan Februari tahun 2021 dari Lunas menjadi Pending.', '2021-01-15 13:40:49'),
(1274, 'U001', 'Mengubah status tagihan SDN 1 Biau bulan Februari tahun 2021 dari Pending menjadi Lunas.', '2021-01-15 13:41:19'),
(1275, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:41:30'),
(1276, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:42:38'),
(1277, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:42:49'),
(1278, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:43:32'),
(1279, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:43:46'),
(1280, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:44:35'),
(1281, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:44:58'),
(1282, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:45:38'),
(1283, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:45:55'),
(1284, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:48:32'),
(1285, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:48:41'),
(1286, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 13:48:55'),
(1287, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-15 13:49:20'),
(1288, 'U001', 'Logout', '2021-01-15 13:55:54'),
(1289, 'U012', 'Login', '2021-01-15 13:56:00'),
(1290, 'U011', 'Mengaktifkan kembali data pelanggan SDN 1 Biau.', '2021-01-15 14:01:19'),
(1291, 'U001', 'Login', '2021-01-17 10:08:58'),
(1292, 'U013', 'Login', '2021-01-17 10:10:00'),
(1293, 'U013', 'Logout', '2021-01-17 10:10:45'),
(1294, 'U010', 'Login', '2021-01-17 10:10:54'),
(1295, 'U010', 'Logout', '2021-01-17 10:26:56'),
(1296, 'U011', 'Login', '2021-01-17 10:27:03'),
(1297, 'U001', 'Menghapus invoice SDN 1 Biau bulan April tahun 2020 dari data invoice.', '2021-01-17 10:48:34'),
(1298, 'U001', 'Menghapus invoice SDN 1 Biau bulan Juni tahun 2021 dari data invoice.', '2021-01-17 10:48:47'),
(1299, 'U011', 'Menambah pelanggan dengan nama jasdbaf.', '2021-01-17 11:05:19'),
(1300, 'U011', 'Mengubah data pelanggan jasdbaf.', '2021-01-17 11:05:35'),
(1301, 'U011', 'Menambah pelanggan dengan nama kabfaksjf.', '2021-01-17 11:06:48'),
(1302, 'U011', 'Menghapus sementara jasdbaf dari data pelanggan.', '2021-01-17 11:15:33'),
(1303, 'U011', 'Menghapus sementara kabfaksjf dari data pelanggan.', '2021-01-17 11:15:46'),
(1304, 'U001', 'Mengkonfirmasi Yandris menghapus kabfaksjf dari data pelanggan.', '2021-01-17 11:16:42'),
(1305, 'U001', 'Mengkonfirmasi Yandris menghapus jasdbaf dari data pelanggan.', '2021-01-17 11:17:05'),
(1306, 'U011', 'Menambah pelanggan dengan nama SDN 5 Tolangohula.', '2021-01-17 11:38:18'),
(1307, 'U011', 'Menambah pelanggan dengan nama Kantor Camat Biau.', '2021-01-17 12:19:24'),
(1308, 'U011', 'Menambah pelanggan dengan nama Pemdes Molamahu.', '2021-01-17 12:23:19'),
(1309, 'U011', 'Menambah pelanggan dengan nama Didingga.', '2021-01-17 12:27:50'),
(1310, 'U011', 'Mengubah data pelanggan SDN 5 Biau.', '2021-01-17 12:28:10'),
(1311, 'U011', 'Menambah pelanggan dengan nama Asri Bapuai.', '2021-01-17 12:31:10'),
(1312, 'U001', 'Menghapus invoice SDN 5 Tolangohula bulan Januari tahun 2020 dari data invoice.', '2021-01-17 12:55:38'),
(1313, 'U001', 'Menghapus invoice SDN 5 Tolangohula bulan Februari tahun 2020 dari data invoice.', '2021-01-17 12:55:44'),
(1314, 'U001', 'Menghapus invoice SDN 5 Tolangohula bulan Maret tahun 2021 dari data invoice.', '2021-01-17 12:55:54'),
(1315, 'U001', 'Menghapus invoice SDN 5 Tolangohula bulan September tahun 2021 dari data invoice.', '2021-01-17 12:56:00'),
(1316, 'U001', 'Menghapus invoice SDN 1 Biau bulan Januari tahun 2021 dari data invoice.', '2021-01-17 12:56:58'),
(1317, 'U001', 'Menghapus invoice SDN 1 Biau bulan Februari tahun 2021 dari data invoice.', '2021-01-17 13:03:41'),
(1318, 'U001', 'Menghapus invoice SDN 1 Biau bulan Maret tahun 2021 dari data invoice.', '2021-01-17 13:03:48'),
(1319, 'U001', 'Menghapus invoice SDN 1 Biau bulan April tahun 2021 dari data invoice.', '2021-01-17 13:03:53'),
(1320, 'U001', 'Menghapus invoice SDN 1 Biau bulan Agustus tahun 2021 dari data invoice.', '2021-01-17 13:03:59'),
(1321, 'U001', 'Menghapus invoice  bulan  tahun  dari data invoice.', '2021-01-17 13:04:07'),
(1322, 'U001', 'Menghapus invoice Kantor Camat Biau bulan Januari tahun 2021 dari data invoice.', '2021-01-17 13:04:33'),
(1323, 'U001', 'Menghapus invoice Kantor Camat Biau bulan Februari tahun 2021 dari data invoice.', '2021-01-17 13:04:39'),
(1324, 'U001', 'Menghapus invoice Pemdes Molamahu bulan Maret tahun 2021 dari data invoice.', '2021-01-17 13:05:10'),
(1325, 'U001', 'Menghapus invoice Pemdes Molamahu bulan Februari tahun 2021 dari data invoice.', '2021-01-17 13:05:18'),
(1326, 'U001', 'Menghapus invoice Pemdes Molamahu bulan Januari tahun 2021 dari data invoice.', '2021-01-17 13:05:22'),
(1327, 'U001', 'Menghapus invoice SDN 5 Biau bulan April tahun 2021 dari data invoice.', '2021-01-17 13:05:35'),
(1328, 'U001', 'Menghapus invoice Asri Bapuai bulan Januari tahun 2021 dari data invoice.', '2021-01-17 13:05:46'),
(1329, 'U011', 'Berhasil generate invoice SDN 1 Biau bulan Januari tahun 2021', '2021-01-17 13:06:32'),
(1330, 'U011', 'Berhasil generate invoice SDN 1 Biau bulan Februari tahun 2021', '2021-01-17 13:06:33'),
(1331, 'U011', 'Berhasil generate invoice SDN 5 Tolangohula bulan Desember tahun 2020', '2021-01-17 13:07:02'),
(1332, 'U011', 'Berhasil generate invoice Kantor Camat Biau bulan Januari tahun 2021', '2021-01-17 13:07:17'),
(1333, 'U011', 'Berhasil generate invoice Pemdes Molamahu bulan Januari tahun 2021', '2021-01-17 13:07:47'),
(1334, 'U011', 'Berhasil generate invoice Pemdes Molamahu bulan Februari tahun 2021', '2021-01-17 13:07:48'),
(1335, 'U011', 'Berhasil generate invoice Pemdes Molamahu bulan Maret tahun 2021', '2021-01-17 13:07:48'),
(1336, 'U011', 'Berhasil generate invoice SDN 5 Biau bulan Januari tahun 2021', '2021-01-17 13:08:21'),
(1337, 'U011', 'Berhasil generate invoice SDN 5 Biau bulan Februari tahun 2021', '2021-01-17 13:08:22'),
(1338, 'U011', 'Berhasil generate invoice Asri Bapuai bulan Januari tahun 2021', '2021-01-17 13:09:44'),
(1339, 'U011', 'Logout', '2021-01-17 13:40:50'),
(1340, 'U010', 'Login', '2021-01-17 13:40:55'),
(1341, 'U001', 'Logout', '2021-01-17 13:41:54'),
(1342, 'U011', 'Login', '2021-01-17 13:41:59'),
(1343, 'U011', 'Logout', '2021-01-17 13:50:29'),
(1344, 'U001', 'Login', '2021-01-17 13:50:37'),
(1345, 'U010', 'Logout', '2021-01-17 14:31:31'),
(1346, 'U011', 'Login', '2021-01-17 14:31:38'),
(1347, 'U011', 'Mengubah data pelanggan SDN 1 Biau.', '2021-01-17 14:32:03'),
(1348, 'U011', 'Login', '2021-01-18 10:21:54'),
(1349, 'U001', 'Login', '2021-01-18 10:22:00'),
(1350, 'U011', 'Berhasil generate invoice Asri Bapuai bulan Februari tahun 2021', '2021-01-18 11:03:32'),
(1351, 'U011', 'Logout', '2021-01-18 12:11:14'),
(1352, 'U010', 'Login', '2021-01-18 12:11:20'),
(1353, 'U001', 'Login', '2021-01-20 12:09:37'),
(1354, 'U011', 'Login', '2021-01-20 12:14:37'),
(1355, 'U001', 'Login', '2021-01-21 08:44:48'),
(1356, 'U001', 'Logout', '2021-01-21 08:45:00'),
(1357, 'U011', 'Login', '2021-01-21 08:45:08'),
(1358, 'U011', 'Menghapus sementara SDN 1 Biau dari data pelanggan.', '2021-01-21 08:45:29'),
(1359, 'U011', 'Logout', '2021-01-21 08:56:33'),
(1360, 'U001', 'Login', '2021-01-21 08:56:42'),
(1361, 'U011', 'Login', '2021-01-21 09:04:53'),
(1362, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:04:55'),
(1363, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:06:25'),
(1364, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:24:30'),
(1365, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:33:12'),
(1366, 'U011', 'Pemasukkan Pemasukkan 1 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:33:47'),
(1367, 'U011', 'Pemasukkan Pemasukkan 2 Bulan Januari Tahun 2021 berhasil diedit.', '2021-01-21 11:34:06'),
(1368, 'U001', 'Pengeluaran Pengeluaran 1 Bulan Desember Tahun 2020 berhasil diedit.', '2021-01-21 11:39:09'),
(1369, 'U001', 'Login', '2021-01-21 13:58:50'),
(1370, 'U001', 'Login', '2021-01-22 05:04:00'),
(1371, 'U011', 'Login', '2021-01-22 05:37:44'),
(1372, 'U001', 'Login', '2021-01-23 07:36:21'),
(1373, 'U001', 'Logout', '2021-01-23 08:02:12'),
(1374, 'U011', 'Login', '2021-01-23 08:02:27'),
(1375, 'U011', 'Logout', '2021-01-23 08:19:37'),
(1376, 'U011', 'Login', '2021-01-23 08:19:43'),
(1377, 'U011', 'Logout', '2021-01-23 08:19:48'),
(1378, 'U001', 'Login', '2021-01-23 08:19:53'),
(1379, 'U001', 'Logout', '2021-01-23 08:20:38'),
(1380, 'U011', 'Login', '2021-01-23 08:20:43'),
(1381, 'U011', 'Logout', '2021-01-23 08:23:07'),
(1382, 'U001', 'Login', '2021-01-23 08:23:12'),
(1383, 'U001', 'Login', '2021-01-23 12:28:14'),
(1384, 'U011', 'Login', '2021-01-23 12:38:26'),
(1385, 'U011', 'Logout', '2021-01-23 13:04:04'),
(1386, 'U013', 'Login', '2021-01-23 13:04:11'),
(1387, 'U013', 'Logout', '2021-01-23 13:05:01'),
(1388, 'U011', 'Login', '2021-01-23 13:05:07'),
(1389, 'U001', 'Mengkonfirmasi Yandris menghapus Pemasukkan 1 Tahap 1 bulan Januari tahun 2021 dari data pemasukkan.', '2021-01-23 14:19:52'),
(1390, 'U001', 'Mengkonfirmasi Yandris menghapus BT 1 Tahap 1 bulan Januari tahun 2021 dari data pengeluaran.', '2021-01-23 14:23:56'),
(1391, 'U001', 'Mengkonfirmasi Yandris menghapus BT 1 Tahap 1 bulan Januari tahun 2021 dari data pengeluaran.', '2021-01-23 14:24:49'),
(1392, 'U001', 'Mengkonfirmasi Yandris menghapus BT 1 Tahap 1 bulan Januari tahun 2021 dari data pengeluaran.', '2021-01-23 14:25:19'),
(1393, 'U001', 'Mengkonfirmasi Yandris menghapus invoice pelanggan SDN 5 Tolangohula bulan Desember tahun 2020 dari data invoice.', '2021-01-23 14:29:25'),
(1394, 'U001', 'Mengkonfirmasi Yandris menghapus SDN 1 Biau dari data pelanggan.', '2021-01-23 14:30:28'),
(1395, 'U011', 'Menghapus sementara Kantor Camat Biau dari data pelanggan.', '2021-01-23 14:32:27'),
(1396, 'U011', 'Mengaktifkan kembali data pelanggan Kantor Camat Biau.', '2021-01-23 14:32:36'),
(1397, 'U011', 'Menghapus sementara Kantor Camat Biau dari data pelanggan.', '2021-01-23 14:33:24'),
(1398, 'U001', 'Mengkonfirmasi Yandris menghapus Kantor Camat Biau dari data pelanggan.', '2021-01-23 14:34:35'),
(1399, 'U001', 'Mengkonfirmasi Yandris menghapus Pemasukkan 1 Tahap 1 bulan Januari tahun 2021 dari data pemasukkan.', '2021-01-23 14:42:13'),
(1400, 'U001', 'Mengkonfirmasi Yandris menghapus BT 1 Tahap 1 bulan Januari tahun 2021 dari data pengeluaran.', '2021-01-23 14:43:48'),
(1401, 'U001', 'Mengkonfirmasi Yandris menghapus invoice pelanggan SDN 5 Tolangohula bulan Desember tahun 2020 dari data invoice.', '2021-01-23 14:53:09'),
(1402, 'U001', 'Mengkonfirmasi Yandris menghapus invoice pelanggan SDN 5 Tolangohula bulan Desember tahun 2020 dari data invoice.', '2021-01-23 14:55:10'),
(1403, 'U001', 'Mengkonfirmasi Yandris menghapus invoice pelanggan Asri Bapuai bulan Februari tahun 2021 dari data invoice.', '2021-01-23 14:56:56'),
(1404, 'U011', 'Menghapus sementara Pemdes Molamahu dari data pelanggan.', '2021-01-23 14:59:14'),
(1405, 'U001', 'Mengkonfirmasi Yandris menghapus Pemdes Molamahu dari data pelanggan.', '2021-01-23 15:00:00'),
(1406, 'U011', 'Logout', '2021-01-23 16:11:11'),
(1407, 'U001', 'Login', '2021-01-24 10:26:37'),
(1408, 'U001', 'Mengubah data user.', '2021-01-24 11:28:23'),
(1409, 'U001', 'Mengubah data user.', '2021-01-24 11:28:31'),
(1410, 'U011', 'Login', '2021-01-24 11:43:55'),
(1411, 'U011', 'Logout', '2021-01-24 12:17:26'),
(1412, 'U010', 'Login', '2021-01-24 12:17:35'),
(1413, 'U010', 'Berhasil generate invoice SDN 5 Tolangohula bulan Januari tahun 2021', '2021-01-24 12:18:51'),
(1414, 'U010', 'Berhasil generate invoice SDN 5 Tolangohula bulan April tahun 2021', '2021-01-24 14:09:45'),
(1415, 'U010', 'Berhasil generate invoice SDN 5 Tolangohula bulan Mei tahun 2021', '2021-01-24 14:11:13'),
(1416, 'U001', 'Login', '2021-01-26 02:49:38'),
(1417, 'U011', 'Login', '2021-01-26 02:50:59'),
(1418, 'U011', 'Logout', '2021-01-26 02:52:52'),
(1419, 'U012', 'Login', '2021-01-26 02:52:57'),
(1420, 'U012', 'Logout', '2021-01-26 02:54:04'),
(1421, 'U011', 'Login', '2021-01-26 02:54:13'),
(1422, 'U011', 'Logout', '2021-01-26 02:54:27'),
(1423, 'U013', 'Login', '2021-01-26 02:54:37'),
(1424, 'U013', 'Logout', '2021-01-26 02:54:44'),
(1425, 'U010', 'Login', '2021-01-26 02:54:50'),
(1426, 'U011', 'Login', '2021-01-26 02:55:32'),
(1427, 'U012', 'Login', '2021-01-26 02:56:32'),
(1428, 'U013', 'Login', '2021-01-26 02:56:54'),
(1429, 'U013', 'Berhasil generate invoice SDN 5 Biau bulan Februari tahun 2021', '2021-01-26 03:05:53'),
(1430, 'U001', 'Logout', '2021-01-26 03:21:57'),
(1431, 'U001', 'Login', '2021-01-26 03:22:01'),
(1432, 'U011', 'Menghapus sementara SDN 5 Biau dari data pelanggan.', '2021-01-26 03:25:35'),
(1433, 'U011', 'Berhasil generate invoice SDN 5 Tolangohula bulan Agustus tahun 2021', '2021-01-26 04:59:00'),
(1434, 'U011', 'Berhasil generate invoice SDN 5 Tolangohula bulan September tahun 2021', '2021-01-26 04:59:01'),
(1435, 'U001', 'Mengubah data pelanggan SDN 5 Tolangohula.', '2021-01-26 05:02:23'),
(1436, 'U013', 'Berhasil generate invoice SDN 5 Tolangohula bulan Februari tahun 2021', '2021-01-26 05:03:31'),
(1437, 'U012', 'Login', '2021-01-26 05:35:35'),
(1438, 'U010', 'Login', '2021-01-26 07:55:38'),
(1439, 'U013', 'Login', '2021-01-26 12:30:47'),
(1440, 'U001', 'Login', '2021-01-26 12:31:59'),
(1441, 'U001', 'Mengaktifkan kembali data pelanggan SDN 5 Biau.', '2021-01-26 12:32:15'),
(1442, 'U012', 'Login', '2021-01-26 13:43:55'),
(1443, 'U001', 'Menghapus sementara SDN 5 Biau dari data pelanggan.', '2021-01-26 14:10:22'),
(1444, 'U001', 'Mengaktifkan kembali data pelanggan SDN 5 Biau.', '2021-01-26 14:10:31'),
(1445, 'U001', 'Login', '2021-02-18 13:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `t_notifikasi`
--

CREATE TABLE `t_notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_data` varchar(255) NOT NULL,
  `status_notif` enum('active','inactive') NOT NULL,
  `action` enum('delete','update') NOT NULL,
  `is_confirm` enum('null','no','yes') NOT NULL,
  `notifikasi` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `waktu_karyawan` varchar(255) DEFAULT NULL,
  `status_notif_karyawan` enum('active','inactive') NOT NULL,
  `notifikasi_karyawan` varchar(255) DEFAULT NULL,
  `data` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_notifikasi`
--

INSERT INTO `t_notifikasi` (`id_notifikasi`, `id_user`, `id_data`, `status_notif`, `action`, `is_confirm`, `notifikasi`, `waktu`, `waktu_karyawan`, `status_notif_karyawan`, `notifikasi_karyawan`, `data`, `url`) VALUES
(51, 'U011', 'PL000006', 'active', 'update', 'yes', 'Data pelanggan SDN 5 Tolangohula ingin diedit oleh Yandris', '2021-01-26T15:58:08.478887', '2021-01-26T15:58:18.230027', 'active', 'Data pelanggan SDN 5 Tolangohula yang ingin anda edit telah diizinkan oleh Direktur', 'pelanggan', 'pelanggan/edit_pelanggan/PL000006'),
(52, 'U011', 'ANG013', 'active', 'update', 'no', 'Data pemasukkan Pemasukkan 2 Tahap 2 bulan Januari tahun 2021 ingin diedit oleh Yandris', '2021-01-28T16:05:04.436018', '2021-01-26T16:05:14.977307', 'active', 'Data pemasukkan Pemasukkan 2 Tahap 2 bulan Januari tahun 2021 yang ingin anda edit tidak diizinkan oleh Direktur', 'pemasukkan', 'pemasukkan/edit/ANG013'),
(53, 'U011', 'ANG012', 'active', 'update', 'no', 'Data pengeluaran Tak teranggar Tahap 1 bulan Januari tahun 2021 ingin diedit oleh Yandris', '2021-01-26T16:21:18.845850', '2021-01-26T16:23:57.538365', 'active', 'Data pengeluaran Tak teranggar Tahap 1 bulan Januari tahun 2021 yang ingin anda edit tidak diizinkan oleh Direktur', 'pengeluaran', 'pengeluaran/edit/ANG012'),
(54, 'U011', 'ANG014', 'active', 'update', 'no', 'Data pengeluaran BT 2 Tahap 2 bulan Januari tahun 2021 ingin diedit oleh Yandris', '2021-01-26T16:27:31.488147', '2021-01-26T16:28:42.784327', 'active', 'Data pengeluaran BT 2 Tahap 2 bulan Januari tahun 2021 yang ingin anda hapus tidak dikonfirmasi oleh Direktur', 'pengeluaran', 'pengeluaran/edit/ANG014');

-- --------------------------------------------------------

--
-- Table structure for table `t_no_hp`
--

CREATE TABLE `t_no_hp` (
  `id_no_hp` bigint(20) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_no_hp`
--

INSERT INTO `t_no_hp` (`id_no_hp`, `id_pelanggan`, `no_hp`, `ket`) VALUES
(4, 'PL000001', '082316273891', 'Kepsek'),
(5, 'PL000001', '085231283741', 'Wakil Kepsek'),
(6, 'PL000001', '085238495718', 'Bendahara'),
(7, 'PL000002', '082314756127', 'Raden Pratama'),
(8, 'PL000002', '082317481293', 'Lisa'),
(9, 'PL000002', '082299184631', 'Tetangga'),
(10, 'PL000003', '081237162318', 'Kepsek'),
(11, 'PL000003', '082137648831', 'Wakil Kepsek'),
(12, 'PL000003', '085243278834', 'Bendahara'),
(13, 'PL000004', '081237482236', 'Fazria'),
(14, 'PL000004', '082312918832', 'Neno'),
(15, 'PL000004', '082311983129', 'Tetangga'),
(16, 'PL000005', '082317263389', 'Kepsek'),
(17, 'PL000005', '082387739128', 'Wakil Kepsek'),
(18, 'PL000005', '081728391873', 'Bendahara'),
(19, 'PL000006', '082347561928', 'bsdfj'),
(20, 'PL000006', '085237462837', 'hjbdfsd'),
(21, 'PL000006', '082347824187', 'hjfdsd'),
(22, 'PL000007', '082341723847', 'jsafbasif'),
(23, 'PL000007', '082341723847', 'jkafbasf'),
(24, 'PL000007', '082341723847', 'jkbadfdjkf'),
(25, 'PL000006', '082317263948', 'Kepsek'),
(26, 'PL000006', '082317263941', 'Wakil Kepsek'),
(27, 'PL000006', '082317263943', 'Bendahara'),
(28, 'PL000007', '082398127388', 'Camat'),
(29, 'PL000007', '082398127387', 'Wakil Camat'),
(30, 'PL000007', '082398127386', 'Sekretaris'),
(31, 'PL000008', '082137467738', 'Kepala Desa'),
(32, 'PL000008', '082137467737', 'Sekretaris'),
(33, 'PL000008', '082137467736', 'Bendahara'),
(34, 'PL000009', '082317263882', 'Kepsek'),
(35, 'PL000009', '082317263883', 'Wakil Kepsek'),
(36, 'PL000009', '082317263884', 'Bendahara'),
(37, 'PL000010', '085237482172', 'Asri'),
(38, 'PL000010', '085237482173', 'Adik'),
(39, 'PL000010', '085237482174', 'Tetangga');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nama_panggilan` varchar(75) DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `informasi_pemasang` enum('instansi','personal') NOT NULL,
  `nama_marketing` varchar(75) NOT NULL,
  `kelurahan_desa` varchar(75) NOT NULL,
  `kecamatan` varchar(75) NOT NULL,
  `kabupaten_kota` varchar(75) NOT NULL,
  `provinsi` varchar(75) NOT NULL,
  `pekerjaan` varchar(75) DEFAULT NULL,
  `paket_internet` varchar(75) NOT NULL,
  `tanggal_pemasangan` date NOT NULL,
  `biaya_pemasangan` bigint(20) NOT NULL,
  `iuran` bigint(20) NOT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `status_pelanggan` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `nama_panggilan`, `no_ktp`, `alamat_pelanggan`, `informasi_pemasang`, `nama_marketing`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `pekerjaan`, `paket_internet`, `tanggal_pemasangan`, `biaya_pemasangan`, `iuran`, `npwp`, `status_pelanggan`) VALUES
('PL000006', 'SDN 5 Tolangohula', NULL, NULL, 'JLN. PT. PG. GORONTALO', 'instansi', 'Dede', 'SIDOHARJO', 'Tolangohula', 'Boalemo', 'Gorontalo', NULL, '15 Mbps', '2021-01-17', 1500000, 1500000, 'npwp.jpg', 'active'),
('PL000009', 'SDN 5 Biau', NULL, NULL, 'Gorontalo', 'instansi', 'Dede', 'Bualo', 'Biau', 'Gorontalo Utara', 'Gorontalo', NULL, '10 Mbps', '2021-01-17', 1500000, 1000000, 'npwp.jpg', 'active'),
('PL000010', 'Asri Bapuai', 'Asri', '3271046504930002', 'Timbuolo Tengah', 'personal', 'Dede', 'Timbuolo Tengah', 'Botupingge', 'Bone Bolango', 'Gorontalo', 'PNS', '5 Mbps', '2021-01-17', 1000000, 500000, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengaturan`
--

CREATE TABLE `t_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `alamat_pusat` varchar(255) NOT NULL,
  `alamat_cabang` varchar(255) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengaturan`
--

INSERT INTO `t_pengaturan` (`id_pengaturan`, `nama_perusahaan`, `nickname`, `alamat_pusat`, `alamat_cabang`, `telepon`, `foto`) VALUES
(1, 'PT. Mahameru Media Nusantara', 'M2N', 'Jl. Gunung Mahameru Kunciran Indah Pinang, Kota Tangerang Banten', 'Jl. Jarwadi Kel. Kayu Bulan Kec. Limboto Kab. Gorontalo', '081242627471', 'm2n.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Komisaris'),
(3, 'Direktur'),
(4, 'Finance'),
(5, 'Kolektor'),
(6, 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `t_tagihan2`
--

CREATE TABLE `t_tagihan2` (
  `id_tagihan` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `kd_tagihan` varchar(255) NOT NULL,
  `tagihan` bigint(20) NOT NULL,
  `iuran` bigint(20) NOT NULL,
  `periode` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tgl_tagihan` date DEFAULT NULL,
  `bulan_tagihan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun_tagihan` int(11) NOT NULL,
  `tahun_pembuatan` int(11) NOT NULL,
  `status_tagihan` enum('pending','paid','transfer') NOT NULL,
  `jumlah_cetak` int(11) NOT NULL,
  `jumlah_download` int(11) NOT NULL DEFAULT '0',
  `jumlah_kirim` int(11) NOT NULL DEFAULT '0',
  `nama_invoice` varchar(255) NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tagihan2`
--

INSERT INTO `t_tagihan2` (`id_tagihan`, `id_karyawan`, `id_pelanggan`, `kd_tagihan`, `tagihan`, `iuran`, `periode`, `tgl_tagihan`, `bulan_tagihan`, `tahun_tagihan`, `tahun_pembuatan`, `status_tagihan`, `jumlah_cetak`, `jumlah_download`, `jumlah_kirim`, `nama_invoice`, `bukti_transfer`) VALUES
('INV000010', 'F001', 'PL000010', 'M2N-GTO.2021.INV.11-009', 500000, 500000, 'Januari', '2021-01-17', 'Januari', 2021, 2021, 'paid', 1, 0, 0, 'M2N-GTO2021INV.11-009_Januari_2021.pdf', NULL),
('INV000011', 'K005', 'PL000006', 'M2N-GTO.2021.INV.10-001', 1000000, 1000000, 'Januari', '2021-01-24', 'Januari', 2021, 2021, 'transfer', 1, 0, 0, 'M2N-GTO.2021.INV.10-001_Januari_2021.pdf', NULL),
('INV000012', 'K005', 'PL000006', 'M2N-GTO.2021.INV.10-002', 1000000, 1000000, 'April', '2021-01-24', 'Januari', 2021, 2021, 'transfer', 1, 0, 0, 'M2N-GTO.2021.INV.10-002_April_2021.pdf', 'bukti.jpg'),
('INV000013', 'K005', 'PL000006', 'M2N-GTO.2021.INV.10-003', 1000000, 1000000, 'Mei', '2021-01-24', 'Januari', 2021, 2021, 'transfer', 1, 0, 0, 'M2N-GTO.2021.INV.10-003_Mei_2021.pdf', 'bukti.jpg'),
('INV000014', 'K005', 'PL000006', 'M2N-GTO.2021.INV.10-004', 2000000, 1000000, 'Oktober', '2021-01-25', 'Januari', 2021, 2021, 'pending', 1, 0, 0, 'M2N-GTO.2021.INV.10-004_Oktober_2021.pdf', NULL),
('INV000015', 'K005', 'PL000006', 'M2N-GTO.2021.INV.10-004', 2000000, 1000000, 'November', '2021-01-25', 'Januari', 2021, 2021, 'pending', 1, 0, 0, 'M2N-GTO.2021.INV.10-004_November_2021.pdf', NULL),
('INV000016', 'K005', 'PL000009', 'M2N-GTO.2021.INV.10-006', 1000000, 1000000, 'Agustus', '2021-01-25', 'Januari', 2021, 2021, 'transfer', 1, 0, 0, 'M2N-GTO.2021.INV.10-006_Agustus_2021.pdf', 'Invoice-1611511536-PL000009.jpg'),
('INV000017', 'CS001', 'PL000009', 'M2N-GTO.2021.INV.13-001', 1000000, 1000000, 'Februari', '2021-01-26', 'Januari', 2021, 2021, 'paid', 1, 0, 0, 'M2N-GTO.2021.INV.13-001_Februari_2021.pdf', NULL),
('INV000018', 'F001', 'PL000006', 'M2N-GTO.2021.INV.11-002', 2000000, 1000000, 'Agustus', '2021-01-26', 'Januari', 2021, 2021, 'pending', 1, 0, 0, 'M2N-GTO.2021.INV.11-002_Agustus_2021.pdf', NULL),
('INV000019', 'F001', 'PL000006', 'M2N-GTO.2021.INV.11-002', 2000000, 1000000, 'September', '2021-01-26', 'Januari', 2021, 2021, 'pending', 1, 0, 0, 'M2N-GTO.2021.INV.11-002_September_2021.pdf', NULL),
('INV000020', 'CS001', 'PL000006', 'M2N-GTO.2021.INV.13-002', 1500000, 1500000, 'Februari', '2021-01-26', 'Januari', 2021, 2021, 'paid', 1, 0, 0, 'M2N-GTO.2021.INV.13-002_Februari_2021.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `id_role`, `nama_user`, `username`, `password`, `status`) VALUES
('U001', 3, 'Kifli', 'kifli', 'e10adc3949ba59abbe56e057f20f883e', '1'),
('U010', 5, 'Fadi Ahmad', 'fadi', 'e10adc3949ba59abbe56e057f20f883e', '1'),
('U011', 4, 'Yandris', 'yandris', 'e10adc3949ba59abbe56e057f20f883e', '1'),
('U012', 2, 'Jos', 'jos', 'e10adc3949ba59abbe56e057f20f883e', '1'),
('U013', 6, 'Rostika', 'rostika', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user`
-- (See below for the actual view)
--
CREATE TABLE `user` (
`id_user` varchar(255)
,`id_role` int(11)
,`nama_user` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`role` varchar(50)
,`status` enum('0','1')
,`id_foto_profil` int(11)
,`foto_profil` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `customer_service`
--
DROP TABLE IF EXISTS `customer_service`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_service`  AS  select `t_customer_service`.`id_customer_service` AS `id_customer_service`,`t_user`.`id_user` AS `id_user`,`t_user`.`id_role` AS `id_role`,`t_user`.`nama_user` AS `nama_user`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_customer_service`.`signature` AS `signature` from ((`t_customer_service` join `t_user` on((`t_user`.`id_user` = `t_customer_service`.`id_user`))) join `t_foto_profil` on((`t_user`.`id_user` = `t_foto_profil`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `finance`
--
DROP TABLE IF EXISTS `finance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `finance`  AS  select `t_finance`.`id_finance` AS `id_finance`,`t_user`.`id_user` AS `id_user`,`t_user`.`id_role` AS `id_role`,`t_user`.`nama_user` AS `nama_user`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_finance`.`signature` AS `signature` from ((`t_finance` join `t_user` on((`t_user`.`id_user` = `t_finance`.`id_user`))) join `t_foto_profil` on((`t_user`.`id_user` = `t_foto_profil`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `karyawan`
--
DROP TABLE IF EXISTS `karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `karyawan`  AS  select `t_kolektor`.`id_kolektor` AS `id`,`t_kolektor`.`id_user` AS `id_user`,`t_foto_profil`.`id_foto_profil` AS `id_foto_profil`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_kolektor`.`signature` AS `signature`,`t_user`.`nama_user` AS `nama_user` from ((`t_kolektor` join `t_user` on((`t_user`.`id_user` = `t_kolektor`.`id_user`))) join `t_foto_profil` on((`t_foto_profil`.`id_user` = `t_kolektor`.`id_user`))) union select `t_finance`.`id_finance` AS `id`,`t_finance`.`id_user` AS `id_user`,`t_foto_profil`.`id_foto_profil` AS `id_foto_profil`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_finance`.`signature` AS `signature`,`t_user`.`nama_user` AS `nama_user` from ((`t_finance` join `t_user` on((`t_user`.`id_user` = `t_finance`.`id_user`))) join `t_foto_profil` on((`t_foto_profil`.`id_user` = `t_finance`.`id_user`))) union select `t_customer_service`.`id_customer_service` AS `id`,`t_customer_service`.`id_user` AS `id_user`,`t_foto_profil`.`id_foto_profil` AS `id_foto_profil`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_customer_service`.`signature` AS `signature`,`t_user`.`nama_user` AS `nama_user` from ((`t_customer_service` join `t_user` on((`t_user`.`id_user` = `t_customer_service`.`id_user`))) join `t_foto_profil` on((`t_foto_profil`.`id_user` = `t_customer_service`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `kolektor`
--
DROP TABLE IF EXISTS `kolektor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kolektor`  AS  select `t_kolektor`.`id_kolektor` AS `id_kolektor`,`t_user`.`id_user` AS `id_user`,`t_user`.`id_role` AS `id_role`,`t_user`.`nama_user` AS `nama_user`,`t_foto_profil`.`foto_profil` AS `foto_profil`,`t_kolektor`.`signature` AS `signature` from ((`t_kolektor` join `t_user` on((`t_user`.`id_user` = `t_kolektor`.`id_user`))) join `t_foto_profil` on((`t_user`.`id_user` = `t_foto_profil`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `log`
--
DROP TABLE IF EXISTS `log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `log`  AS  select `t_log`.`id_log` AS `id_log`,`t_user`.`id_user` AS `id_user`,`t_role`.`id_role` AS `id_role`,`t_user`.`nama_user` AS `nama_user`,`t_user`.`username` AS `username`,`t_role`.`role` AS `role`,`t_log`.`aksi` AS `aksi`,`t_log`.`waktu` AS `waktu` from ((`t_log` left join `t_user` on((`t_user`.`id_user` = `t_log`.`id_user`))) join `t_role` on((`t_role`.`id_role` = `t_user`.`id_role`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pemasukkan`
--
DROP TABLE IF EXISTS `pemasukkan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasukkan`  AS  select `t_anggaran`.`id_anggaran` AS `id_anggaran`,`t_anggaran`.`anggaran` AS `anggaran`,`t_anggaran`.`masuk` AS `masuk`,`t_anggaran`.`bulan` AS `bulan`,`t_anggaran`.`tahun_anggaran` AS `tahun_anggaran`,`t_anggaran`.`bukti_kwitansi` AS `bukti_kwitansi`,`t_anggaran`.`tahap` AS `tahap` from `t_anggaran` where (`t_anggaran`.`masuk` <> 'NULL') ;

-- --------------------------------------------------------

--
-- Structure for view `pengeluaran`
--
DROP TABLE IF EXISTS `pengeluaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pengeluaran`  AS  select `t_anggaran`.`id_anggaran` AS `id_anggaran`,`t_anggaran`.`id_biaya` AS `id_biaya`,`t_anggaran`.`anggaran` AS `anggaran`,`t_anggaran`.`terpakai` AS `terpakai`,`t_anggaran`.`keluar` AS `keluar`,`t_anggaran`.`bulan` AS `bulan`,`t_anggaran`.`tahun_anggaran` AS `tahun_anggaran`,`t_anggaran`.`takteranggarkan` AS `takteranggarkan`,`t_anggaran`.`tahap` AS `tahap` from `t_anggaran` where (`t_anggaran`.`keluar` <> 'NULL') ;

-- --------------------------------------------------------

--
-- Structure for view `tagihan`
--
DROP TABLE IF EXISTS `tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tagihan`  AS  select `t_tagihan2`.`id_tagihan` AS `id_tagihan`,`karyawan`.`id` AS `id_karyawan`,`t_pelanggan`.`id_pelanggan` AS `id_pelanggan`,`t_tagihan2`.`kd_tagihan` AS `kd_tagihan`,`t_pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`t_pelanggan`.`alamat_pelanggan` AS `alamat_pelanggan`,`t_pelanggan`.`status_pelanggan` AS `status_pelanggan`,`karyawan`.`nama_user` AS `nama_user`,`t_tagihan2`.`tagihan` AS `tagihan`,`t_tagihan2`.`iuran` AS `iuran`,`t_tagihan2`.`periode` AS `periode`,`t_tagihan2`.`tgl_tagihan` AS `tgl_tagihan`,`t_tagihan2`.`bulan_tagihan` AS `bulan_tagihan`,`t_tagihan2`.`tahun_tagihan` AS `tahun_tagihan`,`t_tagihan2`.`tahun_pembuatan` AS `tahun_pembuatan`,`t_tagihan2`.`status_tagihan` AS `status_tagihan`,`t_tagihan2`.`jumlah_cetak` AS `jumlah_cetak`,`t_tagihan2`.`nama_invoice` AS `nama_invoice`,`t_tagihan2`.`jumlah_download` AS `jumlah_download`,`t_tagihan2`.`jumlah_kirim` AS `jumlah_kirim`,`t_tagihan2`.`bukti_transfer` AS `bukti_transfer` from ((`t_tagihan2` join `t_pelanggan` on((`t_pelanggan`.`id_pelanggan` = `t_tagihan2`.`id_pelanggan`))) join `karyawan` on((`karyawan`.`id` = `t_tagihan2`.`id_karyawan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `user`
--
DROP TABLE IF EXISTS `user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user`  AS  select `t_user`.`id_user` AS `id_user`,`t_role`.`id_role` AS `id_role`,`t_user`.`nama_user` AS `nama_user`,`t_user`.`username` AS `username`,`t_user`.`password` AS `password`,`t_role`.`role` AS `role`,`t_user`.`status` AS `status`,`t_foto_profil`.`id_foto_profil` AS `id_foto_profil`,`t_foto_profil`.`foto_profil` AS `foto_profil` from ((`t_user` join `t_role` on((`t_role`.`id_role` = `t_user`.`id_role`))) join `t_foto_profil` on((`t_foto_profil`.`id_user` = `t_user`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_anggaran`
--
ALTER TABLE `t_anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `t_biaya`
--
ALTER TABLE `t_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `t_biaya_tambahan`
--
ALTER TABLE `t_biaya_tambahan`
  ADD PRIMARY KEY (`id_biaya_tambahan`);

--
-- Indexes for table `t_customer_service`
--
ALTER TABLE `t_customer_service`
  ADD PRIMARY KEY (`id_customer_service`);

--
-- Indexes for table `t_finance`
--
ALTER TABLE `t_finance`
  ADD PRIMARY KEY (`id_finance`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_foto_profil`
--
ALTER TABLE `t_foto_profil`
  ADD PRIMARY KEY (`id_foto_profil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_kolektor`
--
ALTER TABLE `t_kolektor`
  ADD PRIMARY KEY (`id_kolektor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_notifikasi`
--
ALTER TABLE `t_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `t_no_hp`
--
ALTER TABLE `t_no_hp`
  ADD PRIMARY KEY (`id_no_hp`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `t_pengaturan`
--
ALTER TABLE `t_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_tagihan2`
--
ALTER TABLE `t_tagihan2`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_biaya_tambahan`
--
ALTER TABLE `t_biaya_tambahan`
  MODIFY `id_biaya_tambahan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `t_foto_profil`
--
ALTER TABLE `t_foto_profil`
  MODIFY `id_foto_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1446;

--
-- AUTO_INCREMENT for table `t_notifikasi`
--
ALTER TABLE `t_notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `t_no_hp`
--
ALTER TABLE `t_no_hp`
  MODIFY `id_no_hp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `t_pengaturan`
--
ALTER TABLE `t_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_log`
--
ALTER TABLE `t_log`
  ADD CONSTRAINT `t_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
