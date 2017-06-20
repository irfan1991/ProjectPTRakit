-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 05:03 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nama`) VALUES
(2, 'aliyah'),
(3, 'Perikanan'),
(5, 'Pertanian'),
(6, 'Agama'),
(7, 'Engenering'),
(8, 'Finish good'),
(9, 'HSE'),
(10, 'Barsoap'),
(11, 'Personal Care'),
(12, 'PC'),
(13, 'House Hold'),
(14, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kary` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `no_mr` varchar(225) DEFAULT NULL,
  `namakar` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `dpmnt` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `jk` int(11) NOT NULL,
  `date_c` datetime NOT NULL,
  `date_u` datetime NOT NULL,
  `user_c` varchar(225) NOT NULL,
  `user_u` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kary`, `nik`, `no_mr`, `namakar`, `tgllahir`, `dpmnt`, `status`, `jk`, `date_c`, `date_u`, `user_c`, `user_u`) VALUES
(13, 11213034, 'KGM-00', 'Irawan', '1900-12-15', '3', 0, 0, '2017-03-20 15:59:01', '2017-04-04 17:38:03', 'coba2', 'coba'),
(14, 110213033, 'KGM-01', 'Haadiayati', '1994-03-03', '5', 1, 1, '2017-03-20 21:52:06', '2017-04-25 09:28:22', 'coba', 'ali'),
(15, 110213036, 'KGM-02', 'Hadi Manrasa', '2012-03-01', '3', 1, 0, '2017-03-22 13:14:29', '2017-04-25 09:06:11', 'coba', 'ali'),
(16, 1101452, 'KGM-03', 'ates 2', '1950-03-02', '2', 0, 0, '2017-04-20 05:01:39', '2017-04-20 05:44:11', 'coba', 'ali'),
(17, 1101455, 'KGM-04', 'ali nurdin', '2012-04-25', '3', 1, 0, '2017-04-25 08:26:09', '2017-04-25 09:05:52', 'ali', 'ali'),
(18, 404583, 'KGM-05', 'A. Mubarok', '1982-03-03', '7', 0, 0, '2017-06-12 06:52:48', '2017-06-12 06:53:07', 'coba', 'coba'),
(19, 615343, 'KGM-06', 'Abdul K', '1988-04-04', '8', 1, 0, '2017-06-12 06:59:31', '0000-00-00 00:00:00', 'coba', ''),
(20, 407233, 'KGM-07', 'Abdul Rohman', '2000-08-25', '7', 0, 0, '2017-06-12 07:00:30', '0000-00-00 00:00:00', 'coba', ''),
(21, 406509, 'KGM-08', 'Abdul Somat', '1988-06-01', '9', 0, 0, '2017-06-12 07:02:04', '0000-00-00 00:00:00', 'coba', ''),
(22, 616003, 'KGM-09', 'Abdurahman', '1985-06-13', '10', 0, 0, '2017-06-12 07:03:03', '0000-00-00 00:00:00', 'coba', ''),
(23, 40343, 'KGM-10', 'Aceng Bahro', '1990-02-01', '8', 0, 0, '2017-06-12 07:03:56', '0000-00-00 00:00:00', 'coba', ''),
(24, 619273, 'KGM-11', 'Achad Yusuf Alifudin', '1988-07-03', '11', 0, 0, '2017-06-12 07:04:55', '0000-00-00 00:00:00', 'coba', ''),
(25, 617733, 'KGM-12', 'Acip', '1986-10-04', '11', 0, 1, '2017-06-12 07:05:38', '2017-06-15 06:29:56', 'coba', 'coba2'),
(26, 601390, 'KGM-13', 'Ade Hasanudin', '1987-12-22', '12', 0, 0, '2017-06-12 07:06:17', '0000-00-00 00:00:00', 'coba', ''),
(27, 612262, 'KGM-14', 'Ahmad Zabar', '1983-08-17', '10', 1, 0, '2017-06-12 07:10:35', '0000-00-00 00:00:00', 'coba', '');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stock_awal` int(11) DEFAULT NULL,
  `stock_akhir` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idobat`, `nama_obat`, `satuan`, `harga`, `stock_awal`, `stock_akhir`) VALUES
(24, 'Aspirin', 'pacs', 3000, 30, 30),
(25, 'Obat DLm', 'pacs', 5000, 45, 60),
(26, 'Obat Luar', 'pacs', 2000, 15, 28),
(27, 'Obatan', 'pacs', 2000, 26, 20),
(28, 'Maag', 'pacs', 2500, 20, 26),
(29, 'Cairan RL', 'Botol', 25000, 10, 10),
(30, 'Water for injeksi 25 ml', 'ML', 500, 10, 10),
(31, 'Alkohol Swab', 'Pacs', 1000, 30, 30),
(32, 'Abbocath no. 22 & 24', 'Pacs', 500, 10, 10),
(33, 'Allopurinol 100 mg', 'Mg', 5000, 20, 20),
(34, 'Asam Mefenamat', 'Buah', 1500, 10, 10),
(35, 'Atropine 0,25mg Inj', 'Mg', 2500, 10, 10),
(36, 'Amlodipine Besilate ', 'Pacs', 1500, 15, 15),
(37, 'Benovit C', 'Pacs', 870, 14, 14),
(38, 'Buscopan inj', 'Vial', 350, 5, 5),
(39, 'Captropil 25 mg', 'Mg', 570, 40, 40),
(40, 'Cefixime 200 mg', 'Mg', 450, 23, 23),
(41, 'Cendo xitrol', 'Botol', 12000, 12, 12),
(42, 'Chloramfecort', 'Mg', 2000, 20, 20),
(43, 'Ciprofloxacin 500 mg', 'Mg', 1800, 12, 12),
(44, 'Clindamycin', 'Pacs', 25400, 12, 12),
(45, 'Cobazim', 'Pacs', 1200, 12, 12),
(46, 'Counterpain 15 gr', 'Buah', 7500, 5, 5),
(47, 'Dexametasone inj', 'Vial', 5800, 13, 13),
(48, 'Epineprine 1 mg Inj', 'Vial', 5000, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `trx_keluar_dtl`
--

CREATE TABLE `trx_keluar_dtl` (
  `id_trx_dtl` int(11) NOT NULL,
  `id_trx_hdr` int(11) DEFAULT NULL,
  `idobat` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_keluar_dtl`
--

INSERT INTO `trx_keluar_dtl` (`id_trx_dtl`, `id_trx_hdr`, `idobat`, `qty`, `harga`) VALUES
(6, 4, 24, 4, 3000),
(7, 4, 25, 8, 5000),
(8, 5, 24, 4, 3000),
(9, 5, 25, 6, 5000),
(10, 6, 26, 6, 2000),
(11, 6, 24, 5, 3000),
(12, 7, 24, 2, 3000),
(13, 7, 25, 1, 5000),
(14, 8, 26, 11, 2000),
(15, 4, 27, 7, 2000),
(16, 9, 25, 1, 5000),
(17, 9, 24, 3, 3000),
(19, 11, 28, 4, 2500),
(20, 12, 25, 5, 5000),
(21, 13, 25, 3, 5000),
(23, 15, 24, 2, 3000),
(24, 16, 24, 12, 3000),
(28, 19, 26, 4, 2000),
(29, 20, 25, 3, 5000),
(30, 20, 26, 7, 2000),
(31, 21, 27, 4, 2000),
(32, 22, 24, 3, 3000),
(33, 22, 27, 6, 2000);

--
-- Triggers `trx_keluar_dtl`
--
DELIMITER $$
CREATE TRIGGER `TG_UPDATESTOK_KELUAR` AFTER INSERT ON `trx_keluar_dtl` FOR EACH ROW BEGIN
UPDATE obat SET stock_akhir = stock_akhir-NEW.qty 
WHERE idobat = NEW.idobat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_UPDATESTOK_KELUAR2` AFTER DELETE ON `trx_keluar_dtl` FOR EACH ROW BEGIN
UPDATE obat SET stock_akhir = stock_akhir+OLD.qty 
WHERE idobat = OLD.idobat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_UPDATESTOK_KELUAR3` AFTER UPDATE ON `trx_keluar_dtl` FOR EACH ROW BEGIN

UPDATE obat SET stock_akhir = stock_akhir-NEW.qty 
WHERE idobat = NEW.idobat;

UPDATE obat SET stock_akhir = stock_akhir+OLD.qty 
WHERE idobat = OLD.idobat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_keluar_hdr`
--

CREATE TABLE `trx_keluar_hdr` (
  `id_trx_hdr` int(11) NOT NULL,
  `tgl_trx_hdr` date DEFAULT NULL,
  `no_trx_hdr` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `amnanesa` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `date_c` datetime DEFAULT NULL,
  `user_c` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_keluar_hdr`
--

INSERT INTO `trx_keluar_hdr` (`id_trx_hdr`, `tgl_trx_hdr`, `no_trx_hdr`, `status`, `amnanesa`, `diagnosa`, `id_karyawan`, `date_c`, `user_c`) VALUES
(4, '2015-03-01', '2017-04/20', 1, 'sakit gigi', 'sakit gigi', 13, '2017-04-04 17:36:32', 'coba'),
(5, '2016-03-09', '2017-04/21', 1, 'test', 'test', 14, '2017-05-02 04:47:17', 'coba'),
(6, '2014-03-16', '2017-04/22', 0, 'dadad', 'dadadadada', 15, '2017-03-31 22:25:14', 'coba'),
(7, '2013-03-24', '2017-04/23', 0, 'hahahhaha', 'hhaahhaha', 14, '2017-03-31 22:26:21', 'coba'),
(8, '2017-03-16', '2017-04/24', 0, 'fafafa', 'fafafafa', 14, '2017-03-31 22:27:07', 'coba'),
(9, '2017-04-20', '2017-04/25', 0, 'a', 'a', 15, '2017-04-20 04:42:40', 'coba'),
(11, '2017-04-20', '2017-04/26', 0, 'aaa', 'aaaaa', 16, '2017-04-20 05:14:10', 'ali'),
(12, '2017-04-20', '2017-04/27', 0, 'a', 'a', 14, '2017-04-20 05:30:10', 'ali'),
(13, '2017-04-20', '2017-04/28', 0, '1', '1', 14, '2017-04-20 05:30:29', 'ali'),
(15, '2017-04-20', '2017-04/30', 0, '1', '1', 14, '2017-04-20 05:48:52', 'ali'),
(16, '2017-04-20', '2017-04/31', 0, 'aa', 'aaa', 14, '2017-04-20 05:49:15', 'ali'),
(19, '2017-04-20', '2017-04/32', 0, 'aaa', 'aaa', 16, '2017-04-20 06:13:16', 'ali'),
(20, '2017-04-20', '2017-04/33', 0, 'aa', 'aa', 13, '2017-04-20 06:41:37', 'ali'),
(21, '2017-04-20', '2017-04/34', 1, 'aa', 'aa', 16, '2017-05-02 05:17:29', 'coba2'),
(22, '2017-05-01', '2017-05/35', 1, 'aaaa', 'aaaa', 16, '2017-05-02 04:48:12', 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `trx_masuk_dtl`
--

CREATE TABLE `trx_masuk_dtl` (
  `id_trx_dtl` int(11) NOT NULL,
  `id_trx_hdr` int(11) DEFAULT NULL,
  `idobat` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_masuk_dtl`
--

INSERT INTO `trx_masuk_dtl` (`id_trx_dtl`, `id_trx_hdr`, `idobat`, `qty`) VALUES
(17, 13, 24, 5),
(18, 13, 25, 8),
(19, 14, 24, 7),
(20, 15, 24, 1),
(21, 16, 25, 1),
(22, 17, 25, 12),
(23, 18, 25, 5),
(24, 19, 24, 50),
(25, 20, 26, 20),
(26, 21, 26, 5),
(27, 22, NULL, NULL),
(28, 23, 28, 8),
(29, 24, 25, 1),
(30, 25, 25, 2),
(31, 26, 24, 5),
(32, 27, 25, 1),
(33, 28, 25, 5),
(34, 29, 25, 5);

--
-- Triggers `trx_masuk_dtl`
--
DELIMITER $$
CREATE TRIGGER `TG_STOKUPDATE_MASUK` AFTER INSERT ON `trx_masuk_dtl` FOR EACH ROW BEGIN
UPDATE obat SET stock_akhir = stock_akhir+NEW.qty 
WHERE idobat = NEW.idobat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_STOKUPDATE_MASUK1` AFTER UPDATE ON `trx_masuk_dtl` FOR EACH ROW BEGIN
UPDATE obat SET stock_akhir = stock_akhir+OLD.qty 
WHERE idobat = OLD.idobat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_STOKUPDATE_MASUK2` AFTER DELETE ON `trx_masuk_dtl` FOR EACH ROW BEGIN
UPDATE obat SET stock_akhir = stock_akhir-OLD.qty 
WHERE idobat = OLD.idobat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_masuk_hdr`
--

CREATE TABLE `trx_masuk_hdr` (
  `id_trx_hdr` int(11) NOT NULL,
  `tgl_trx_hdr` date DEFAULT NULL,
  `no_trx_hdr` varchar(50) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `date_c` datetime DEFAULT NULL,
  `user_c` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_masuk_hdr`
--

INSERT INTO `trx_masuk_hdr` (`id_trx_hdr`, `tgl_trx_hdr`, `no_trx_hdr`, `id_karyawan`, `date_c`, `user_c`) VALUES
(13, '2017-03-22', '2017-04/11', 14, '2017-03-22 20:05:03', 'coba'),
(14, '2017-04-05', '2017-04/12', 13, '2017-04-04 13:21:13', 'coba'),
(15, '2017-04-20', '2017-04/13', 13, '2017-04-20 04:33:50', 'coba'),
(16, '2017-04-20', '2017-04/14', 13, '2017-04-20 04:35:06', 'coba'),
(17, '2017-04-20', '2017-04/15', 13, '2017-04-20 04:48:05', 'coba'),
(18, '2017-04-20', '2017-04/16', 14, '2017-04-20 04:49:24', 'coba'),
(19, '2017-04-20', '2017-04/17', 14, '2017-04-20 04:51:41', 'coba'),
(20, '2017-04-20', '2017-04/18', 14, '2017-04-20 04:56:06', 'coba'),
(21, '2017-04-20', '2017-04/19', 14, '2017-04-20 04:59:14', 'coba'),
(22, '2017-04-14', '2017-04/20', 14, '2017-04-20 05:04:21', 'coba'),
(23, '2017-04-20', '2017-04/21', 14, '2017-04-20 05:10:41', 'ali'),
(24, '2017-04-01', '2017-04/22', 16, '2017-04-20 05:27:49', 'coba'),
(25, '2017-04-20', '2017-04/23', 15, '2017-04-20 05:28:47', 'coba'),
(26, '2017-04-20', '2017-04/24', 13, '2017-04-20 05:35:33', 'ali'),
(27, '2017-04-04', '2017-04/25', 13, '2017-04-25 08:22:45', 'ali'),
(28, '2017-05-01', '2017-05/26', NULL, '2017-05-02 04:49:30', 'coba'),
(29, '2017-05-01', '2017-05/27', NULL, '2017-05-02 05:11:06', 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`, `status`, `email`) VALUES
(19, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 'as2a@gmail.com'),
(20, 'Operator', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 'cc1@gmail.com'),
(21, 'ali', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 'abeng_340@yahoo.co.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kary`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idobat`);

--
-- Indexes for table `trx_keluar_dtl`
--
ALTER TABLE `trx_keluar_dtl`
  ADD PRIMARY KEY (`id_trx_dtl`);

--
-- Indexes for table `trx_keluar_hdr`
--
ALTER TABLE `trx_keluar_hdr`
  ADD PRIMARY KEY (`id_trx_hdr`);

--
-- Indexes for table `trx_masuk_dtl`
--
ALTER TABLE `trx_masuk_dtl`
  ADD PRIMARY KEY (`id_trx_dtl`);

--
-- Indexes for table `trx_masuk_hdr`
--
ALTER TABLE `trx_masuk_hdr`
  ADD PRIMARY KEY (`id_trx_hdr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `trx_keluar_dtl`
--
ALTER TABLE `trx_keluar_dtl`
  MODIFY `id_trx_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `trx_keluar_hdr`
--
ALTER TABLE `trx_keluar_hdr`
  MODIFY `id_trx_hdr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `trx_masuk_dtl`
--
ALTER TABLE `trx_masuk_dtl`
  MODIFY `id_trx_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `trx_masuk_hdr`
--
ALTER TABLE `trx_masuk_hdr`
  MODIFY `id_trx_hdr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
