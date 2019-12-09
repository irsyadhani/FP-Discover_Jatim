-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 11:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discover_jatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(4) NOT NULL,
  `administrator` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `administrator`, `password`, `foto_admin`) VALUES
('AD01', 'irsyad', 'irsyad', 'irsyad.jpg'),
('AD02', 'feinard', 'feinard', 'feinard.jpg'),
('AD03', 'dhimas', 'dhimas', 'dhimas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` char(6) NOT NULL,
  `nama_daerah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pariwisata`
--

CREATE TABLE `detail_pariwisata` (
  `id_pariwisata` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto_pariwisata`
--

CREATE TABLE `foto_pariwisata` (
  `id_foto` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `foto_pariwisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `nama_hotel` varchar(30) NOT NULL,
  `alamat_hotel` varchar(50) NOT NULL,
  `bintang` int(5) NOT NULL,
  `deskripsi_hotel` text NOT NULL,
  `foto_hotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_buka`
--

CREATE TABLE `jadwal_buka` (
  `id_jadwal` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `hari_buka` char(6) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(6) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id_pariwisata` char(6) NOT NULL,
  `id_daerah` char(6) NOT NULL,
  `nama_tempat` varchar(25) NOT NULL,
  `alamat_pariwisata` varchar(50) NOT NULL,
  `biaya_masuk` decimal(14,2) NOT NULL,
  `deskripsi_pariwisata` text NOT NULL,
  `avg_rating` decimal(14,2) DEFAULT NULL,
  `link_website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(6) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `kata_sandi` varchar(12) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto_pengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `no_telp`, `email`, `foto_pengguna`) VALUES
('U00001', 'Irsyadhani Dwi Shubhi', '12345678', '087655443322', 'butra@gmail.com', 'empty.jpg'),
('U00002', 'dhimas', 'qwerty', '089977665544', 'rete@gmail.com', 'empty.jpg'),
('U00003', 'feinard', 'asdfghj', '087766554411', 'haha@gmail.com', 'empty.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` char(6) NOT NULL,
  `id_pengguna` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `status` enum('tampil','tidak tampil') NOT NULL,
  `rating_review` int(7) NOT NULL,
  `deskripsi_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `detail_pariwisata`
--
ALTER TABLE `detail_pariwisata`
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `foto_pariwisata`
--
ALTER TABLE `foto_pariwisata`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `jadwal_buka`
--
ALTER TABLE `jadwal_buka`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id_pariwisata`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pariwisata`
--
ALTER TABLE `detail_pariwisata`
  ADD CONSTRAINT `detail_pariwisata_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `detail_pariwisata_ibfk_2` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `foto_pariwisata`
--
ALTER TABLE `foto_pariwisata`
  ADD CONSTRAINT `foto_pariwisata_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `jadwal_buka`
--
ALTER TABLE `jadwal_buka`
  ADD CONSTRAINT `jadwal_buka_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD CONSTRAINT `pariwisata_ibfk_1` FOREIGN KEY (`id_daerah`) REFERENCES `daerah` (`id_daerah`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
