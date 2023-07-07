-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 06:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(30) COLLATE armscii8_bin NOT NULL,
  `pass` varchar(50) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `pass`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `nisn` varchar(20) COLLATE armscii8_bin NOT NULL,
  `visi` varchar(5000) COLLATE armscii8_bin NOT NULL,
  `misi` varchar(5000) COLLATE armscii8_bin NOT NULL,
  `prestasi` varchar(5000) COLLATE armscii8_bin NOT NULL,
  `rencana_program_kerja` varchar(10000) COLLATE armscii8_bin NOT NULL,
  `bakat_minat` varchar(5000) COLLATE armscii8_bin NOT NULL,
  `id_pemilihan` int(11) NOT NULL,
  `foto` varchar(100) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`nisn`, `visi`, `misi`, `prestasi`, `rencana_program_kerja`, `bakat_minat`, `id_pemilihan`, `foto`) VALUES
('2134346', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 1, 'boy.jpg'),
('48754164', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 1, 'sis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memilih`
--

CREATE TABLE `memilih` (
  `nisn_siswa` varchar(20) COLLATE armscii8_bin NOT NULL,
  `nisn_calon` varchar(20) COLLATE armscii8_bin NOT NULL,
  `id_pemilihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `memilih`
--

INSERT INTO `memilih` (`nisn_siswa`, `nisn_calon`, `id_pemilihan`) VALUES
('48754564', '2134343', 1),
('2134346', '48754164', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) COLLATE armscii8_bin NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `username_administrator` varchar(30) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `pemilihan`
--

INSERT INTO `pemilihan` (`id`, `judul`, `aktif`, `username_administrator`) VALUES
(1, 'Ketua Osis 2023', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(20) COLLATE armscii8_bin NOT NULL,
  `nama` varchar(50) COLLATE armscii8_bin NOT NULL,
  `pass` varchar(50) COLLATE armscii8_bin NOT NULL,
  `alamat` varchar(250) COLLATE armscii8_bin NOT NULL,
  `kelas` varchar(100) COLLATE armscii8_bin NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `pass`, `alamat`, `kelas`, `jenis_kelamin`) VALUES
('2134346', 'Boy', '123', 'Singaraja', 'X IPS 1', 'L'),
('48754164', 'Sis', '', 'Singaraja', 'X Mipa 2', 'P'),
('48754564', 'Agatha', '123', 'Singaraja', 'XI Mipa 2', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD KEY `fk_nisn_calon` (`nisn`),
  ADD KEY `fk_pemilihan_calon` (`id_pemilihan`);

--
-- Indexes for table `memilih`
--
ALTER TABLE `memilih`
  ADD KEY `fk_calon_dipilih` (`nisn_calon`),
  ADD KEY `fk_pemilihan_memilih` (`id_pemilihan`),
  ADD KEY `fk_siswa_memilih` (`nisn_siswa`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrator_pemilihan` (`username_administrator`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon`
--
ALTER TABLE `calon`
  ADD CONSTRAINT `fk_nisn_calon` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemilihan_calon` FOREIGN KEY (`id_pemilihan`) REFERENCES `pemilihan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memilih`
--
ALTER TABLE `memilih`
  ADD CONSTRAINT `fk_calon_dipilih` FOREIGN KEY (`nisn_calon`) REFERENCES `calon` (`nisn`),
  ADD CONSTRAINT `fk_pemilihan_memilih` FOREIGN KEY (`id_pemilihan`) REFERENCES `pemilihan` (`id`),
  ADD CONSTRAINT `fk_siswa_memilih` FOREIGN KEY (`nisn_siswa`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD CONSTRAINT `fk_administrator_pemilihan` FOREIGN KEY (`username_administrator`) REFERENCES `administrator` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
