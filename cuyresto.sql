-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 02:28 AM
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
-- Database: `cuyresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `hari` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `no_meja`, `nama_pelanggan`, `hari`, `jam`) VALUES
(2, 'A3', 'er', '2024-03-03', '05:56:53'),
(3, 'A1', 'wewe', '2024-03-03', '06:42:24'),
(4, 'A2', 'rustio', '2024-03-03', '06:42:45'),
(5, 'B2', 'ss', '2024-03-03', '06:42:49'),
(6, 'A2', 'raspi', '2024-03-03', '07:29:30'),
(7, 'B1', 'rambut', '2024-03-03', '07:33:38'),
(8, 'A2', 'ww', '2024-03-03', '07:36:56'),
(9, 'B1', 'ss', '2024-03-03', '07:37:00'),
(10, 'B3', 'rampun', '2024-03-03', '07:37:03'),
(11, 'A2', 'aa', '2024-03-03', '07:39:13'),
(12, 'A1', 'row', '2024-03-03', '07:39:24'),
(13, 'A1', 'dea', '2024-03-03', '07:39:41'),
(14, 'A2', 'wewe', '2024-03-03', '07:39:42'),
(15, 'A3', 'rasta', '2024-03-03', '07:39:43'),
(16, 'B1', 'ss', '2024-03-03', '07:39:44'),
(17, 'B2', 'kjamu', '2024-03-03', '07:39:46'),
(18, 'B3', 'asd', '2024-03-03', '07:39:48'),
(19, 'C1', 'rama', '2024-03-03', '07:39:52'),
(20, 'C2', 'hehe', '2024-03-03', '07:39:55'),
(21, 'C3', 'tringger', '2024-03-03', '07:39:59'),
(22, 'A1', 'dea', '2024-04-17', '06:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `tipe_meja` varchar(255) NOT NULL DEFAULT 'standar',
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `jumlah_orang` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`, `tipe_meja`, `nama_pelanggan`, `jumlah_orang`, `status`) VALUES
(1, 'A1', 'standar', NULL, NULL, 0),
(2, 'A2', 'standar', NULL, NULL, 0),
(3, 'A3', 'standar', NULL, NULL, 0),
(4, 'B1', 'premium', NULL, NULL, 0),
(5, 'B2', 'premium', NULL, NULL, 0),
(6, 'B3', 'premium', NULL, NULL, 0),
(7, 'C1', 'vip', NULL, NULL, 0),
(8, 'C2', 'vip', NULL, NULL, 0),
(9, 'C3', 'vip', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_meja` (`no_meja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
