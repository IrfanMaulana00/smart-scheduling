-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekoji2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_instruktur`
--

CREATE TABLE `data_instruktur` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jam_ngajar` int(2) NOT NULL,
  `senin` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `selasa` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `rabu` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `kamis` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `jumat` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `sabtu` enum('bisa','tidak') NOT NULL DEFAULT 'tidak',
  `daftar` int(20) NOT NULL,
  `status` enum('terjadwal','menunggu') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_instruktur`
--

INSERT INTO `data_instruktur` (`id`, `nama`, `jam_ngajar`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `daftar`, `status`) VALUES
(1, 'Adi', 3, 'bisa', 'bisa', 'bisa', 'tidak', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(2, 'Beni', 2, 'tidak', 'tidak', 'bisa', 'bisa', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(3, 'Chicha', 2, 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 'tidak', 1599670800, 'terjadwal'),
(4, 'Dewi', 1, 'bisa', 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 1599670800, 'terjadwal'),
(5, 'Yusuf', 2, 'bisa', 'tidak', 'tidak', 'tidak', 'bisa', 'bisa', 1599670800, 'terjadwal'),
(6, 'Edi', 3, 'tidak', 'bisa', 'bisa', 'bisa', 'bisa', 'tidak', 1599670800, 'terjadwal'),
(7, 'Budi', 3, 'bisa', 'tidak', 'bisa', 'tidak', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(8, 'Hisyam', 2, 'bisa', 'bisa', 'bisa', 'bisa', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(9, 'Galih', 2, 'tidak', 'tidak', 'tidak', 'bisa', 'bisa', 'bisa', 1599670800, 'terjadwal'),
(10, 'Irfan', 3, 'bisa', 'tidak', 'bisa', 'tidak', 'bisa', 'tidak', 1599670800, 'terjadwal'),
(11, 'Wawan', 3, 'tidak', 'bisa', 'tidak', 'bisa', 'tidak', 'bisa', 1599670800, 'terjadwal'),
(12, 'Jamillah', 1, 'bisa', 'bisa', 'tidak', 'bisa', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(13, 'Jamal', 3, 'tidak', 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 1599670800, 'terjadwal'),
(14, 'Steven', 3, 'bisa', 'tidak', 'tidak', 'tidak', 'tidak', 'bisa', 1599670800, 'terjadwal'),
(15, 'Salsabilla', 2, 'tidak', 'tidak', 'bisa', 'tidak', 'bisa', 'tidak', 1599670800, 'terjadwal'),
(16, 'Siti', 3, 'bisa', 'tidak', 'tidak', 'bisa', 'tidak', 'tidak', 1599670800, 'terjadwal'),
(18, 'Rudianto', 3, 'tidak', 'bisa', 'tidak', 'bisa', 'bisa', 'bisa', 1599670800, 'terjadwal'),
(19, 'Wadinah', 3, 'tidak', 'bisa', 'bisa', 'bisa', 'tidak', 'tidak', 1599670800, 'menunggu'),
(20, 'Sulastri', 3, 'tidak', 'bisa', 'tidak', 'bisa', 'bisa', 'tidak', 1599670800, 'terjadwal'),
(21, 'Yahyadi', 3, 'bisa', 'tidak', 'tidak', 'tidak', 'bisa', 'tidak', 1599670800, 'menunggu'),
(22, 'Zunaidi', 3, 'tidak', 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 1599670800, 'menunggu'),
(23, 'Tamara', 3, 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 'tidak', 1599670800, 'menunggu'),
(24, 'Pamadi', 3, 'bisa', 'tidak', 'bisa', 'tidak', 'tidak', 'bisa', 1599670800, 'menunggu'),
(26, 'Koja', 3, 'bisa', 'bisa', 'tidak', 'bisa', 'tidak', 'bisa', 1600505663, 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ngajar`
--

CREATE TABLE `jadwal_ngajar` (
  `id` int(11) NOT NULL,
  `jadwal` varchar(20) NOT NULL,
  `senin` text DEFAULT NULL,
  `selasa` text DEFAULT NULL,
  `rabu` text DEFAULT NULL,
  `kamis` text DEFAULT NULL,
  `jumat` text DEFAULT NULL,
  `sabtu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ngajar`
--

INSERT INTO `jadwal_ngajar` (`id`, `jadwal`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`) VALUES
(1, '08.00-09.00', 'Adi', 'Chicha', 'Beni', 'Galih', 'Salsabilla', 'Jamal'),
(2, '09.00-10.00', 'Adi', 'Chicha', 'Beni', 'Galih', 'Salsabilla', 'Jamal'),
(3, '10.00-11.00', 'Adi', 'Edi', 'Budi', 'Jamillah', 'Rudianto', 'Jamal'),
(4, '11.00-12.00', 'Dewi', 'Edi', 'Budi', 'Siti', 'Rudianto', 'Steven'),
(5, '12.00-13.00', 'Yusuf', 'Edi', 'Budi', 'Siti', 'Rudianto', 'Steven'),
(6, '13.00-14.00', 'Yusuf', 'Wawan', 'Irfan', 'Siti', 'Sulastri', 'Steven'),
(7, '14.00-15.00', 'Hisyam', 'Wawan', 'Irfan', '', 'Sulastri', ''),
(8, '15.00-16.00', 'Hisyam', 'Wawan', 'Irfan', '', 'Sulastri', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_instruktur`
--
ALTER TABLE `data_instruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_ngajar`
--
ALTER TABLE `jadwal_ngajar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_instruktur`
--
ALTER TABLE `data_instruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jadwal_ngajar`
--
ALTER TABLE `jadwal_ngajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
