-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2026 at 04:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mhs` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `jk`, `tempat_lahir`, `tgl_lahir`) VALUES
('A001', 'Ahmad Maulana', 'L', 'Banjarmasin', '2002-05-12'),
('A002', 'Siti Aminah', 'P', 'Banjarbaru', '2003-07-25'),
('A003', 'Ma\'ruf Hidayat', 'L', 'Martapura', '2001-11-30'),
('A004', 'Budi Santoso', 'L', 'Samarinda', '2000-09-18'),
('A005', 'Jürgen Müller', 'L', 'Berlin', '1999-03-10'),
('A006', 'Maria Fernanda', 'P', 'Jakarta', '2002-12-05'),
('A007', '李伟 (Li Wei)', 'L', 'Beijing', '2001-06-22'),
('A008', 'Rizka Aulia', 'P', 'Palangkaraya', '2003-01-15'),
('A009', 'Andi Saputra', 'L', 'Makassar', '2000-10-10'),
('A010', 'Nurul Hidayah', 'P', 'Yogyakarta', '2001-08-17'),
('A011', 'Chloé Dubois', 'P', 'Paris', '2002-03-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `idx_nama_mhs` (`nama_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
