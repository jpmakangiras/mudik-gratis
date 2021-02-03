-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 07:37 PM
-- Server version: 8.0.15
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mudikgratis`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_destinasi`
--

CREATE TABLE `master_destinasi` (
  `id` int(11) NOT NULL,
  `nama_destinasi` varchar(70) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_destinasi`
--

INSERT INTO `master_destinasi` (`id`, `nama_destinasi`) VALUES
(1, 'Cilegon'),
(2, 'Bali'),
(3, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `master_jadwal`
--

CREATE TABLE `master_jadwal` (
  `id` int(11) NOT NULL,
  `transportasi` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asal` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jadwal_keberangkatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slot` int(5) NOT NULL,
  `remaining_slot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_jadwal`
--

INSERT INTO `master_jadwal` (`id`, `transportasi`, `asal`, `tujuan`, `jadwal_keberangkatan`, `slot`, `remaining_slot`) VALUES
(1, 'Kereta', 'Cilegon', 'Bali', '1612418400', 55, 55),
(3, 'Bis', 'Bandung', 'Bali', '1613714400', 35, 35);

-- --------------------------------------------------------

--
-- Table structure for table `master_transportasi`
--

CREATE TABLE `master_transportasi` (
  `id` int(11) NOT NULL,
  `nama_transportasi` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_transportasi`
--

INSERT INTO `master_transportasi` (`id`, `nama_transportasi`) VALUES
(5, 'Kereta'),
(6, 'Bis');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(5) NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `nama_peserta` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_verifikasi` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `terverifikasi` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `id_jadwal`, `nama_peserta`, `kode_verifikasi`, `terverifikasi`) VALUES
(1, 1, 'Budi', '60198876bff8b ', 'n'),
(2, 3, 'Ayah Budi', '60198b15024ec ', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_destinasi`
--
ALTER TABLE `master_destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_jadwal`
--
ALTER TABLE `master_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_transportasi`
--
ALTER TABLE `master_transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_destinasi`
--
ALTER TABLE `master_destinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_jadwal`
--
ALTER TABLE `master_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_transportasi`
--
ALTER TABLE `master_transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
