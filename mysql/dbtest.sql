-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 11:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` varchar(50) NOT NULL COMMENT 'yymmxxx 001 by year',
  `prev_suff` varchar(10) DEFAULT NULL,
  `emp_name` varchar(50) NOT NULL,
  `rear_suff` varchar(10) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `blood_group` varchar(2) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `p_of_birth` varchar(20) DEFAULT NULL COMMENT 'place_of_birth',
  `d_of_birth` date DEFAULT NULL COMMENT 'date_of_birth',
  `mother_name` varchar(40) DEFAULT NULL,
  `father_name` varchar(40) DEFAULT NULL,
  `id_kk` varchar(30) DEFAULT NULL,
  `id_card` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `desa_id` varchar(50) DEFAULT NULL,
  `kec_id` varchar(50) DEFAULT NULL,
  `kab_id` varchar(20) DEFAULT NULL,
  `prov_id` varchar(20) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `education` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'SD Tidak Tamat',
  `majoring` varchar(50) DEFAULT NULL,
  `marital` varchar(10) DEFAULT NULL,
  `num_of_child` int(11) DEFAULT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `resign` int(11) DEFAULT 0,
  `resign_date` date DEFAULT NULL,
  `resign_note` varchar(100) DEFAULT NULL,
  `locked` int(11) DEFAULT 0,
  `photolink` varchar(255) DEFAULT 'avatar.png',
  `division` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `position` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `sch_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'NS',
  `entry_by` varchar(20) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `prev_suff`, `emp_name`, `rear_suff`, `join_date`, `gender`, `blood_group`, `religion`, `p_of_birth`, `d_of_birth`, `mother_name`, `father_name`, `id_kk`, `id_card`, `address`, `desa_id`, `kec_id`, `kab_id`, `prov_id`, `kode_pos`, `education`, `majoring`, `marital`, `num_of_child`, `phone_1`, `phone_2`, `email`, `resign`, `resign_date`, `resign_note`, `locked`, `photolink`, `division`, `position`, `sch_id`, `entry_by`, `entry_time`, `update_by`, `update_time`) VALUES
('1000001', 'Ir. H.', 'TESTER', 'S.E.', '2000-01-01', 'P', 'A', 'Islam', 'Cilacap', '1972-05-20', '', '', '', '', 'Jl. Gandaria Barat No 77', '', '32.01.07', '32.01', '32', '', 'S1', '', 'K', 3, '081288765', '', 'priyadiwijaya123@gmail.com ', 0, '0000-00-00', '', 0, 'user_1000001_305101186.png', 'Produksi', 'HR Staff', 'NS', 'demo_1', '2020-05-16 17:26:58', '', '0000-00-00 00:00:00'),
('334455', NULL, 'Kang Darsono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SD Tidak Tamat', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 'avatar.png', NULL, NULL, 'NS', NULL, NULL, NULL, NULL),
('Cust001', NULL, 'Customer Nomor Satu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SD Tidak Tamat', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 'avatar.png', NULL, NULL, 'NS', NULL, NULL, NULL, NULL),
('cust002', NULL, 'Customer Nomer Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SD Tidak Tamat', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 'avatar.png', NULL, NULL, 'NS', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL DEFAULT '0',
  `harga` double NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'a001', 'sepatu kulit', 3000000, 20),
(2, 'a002', 'ikat pinggang', 80000, 20),
(3, 'a003', 'baju kemeja panjang', 180000, 20),
(4, 'a004', 'kaos bola', 50000, 1000),
(5, 'a005', 'topi', 30000, 50),
(27, 'd001', 'sepatu kets', 450000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `education` (`education`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
