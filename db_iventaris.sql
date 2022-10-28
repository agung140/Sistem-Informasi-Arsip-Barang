-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 12:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(6) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `kategori`, `kondisi`, `merk`, `satuan`, `stok`, `tanggal`) VALUES
('BRG001', 'Meja', 'KTG001', 'Baik', 'olympic', 'Unit', 12, '2020-08-15'),
('BRG002', 'Komputer', 'KTG002', 'Baik', 'Lenovo', 'Unit', 2, '2020-08-01'),
('BRG003', 'Kertas', 'KTG003', 'Baik', 'Sidu', 'Box', 3, '2020-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbkasi`
--

CREATE TABLE `tbkasi` (
  `kode_kasi` varchar(8) NOT NULL,
  `nama_kasi` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `nama_pejabat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkasi`
--

INSERT INTO `tbkasi` (`kode_kasi`, `nama_kasi`, `no_hp`, `nama_pejabat`) VALUES
('KSI001', 'Lurah', '082153890911', 'Drs. Tafif Hamdani'),
('KSI002', 'Ekonomi dan Pembangunan', '081258194591', 'Hidayah'),
('KSI003', 'Sekretaris Lurah', '085350110099', 'Jumberi, SE');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `kode_kategori` varchar(16) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`kode_kategori`, `nama_kategori`) VALUES
('KTG001', 'Furnitur'),
('KTG002', 'Elektronik'),
('KTG003', 'ATK');

-- --------------------------------------------------------

--
-- Table structure for table `tblokasi`
--

CREATE TABLE `tblokasi` (
  `kode_lokasi` varchar(8) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblokasi`
--

INSERT INTO `tblokasi` (`kode_lokasi`, `nama_lokasi`, `keterangan`) VALUES
('LK001', 'Departemen Pembangunan', 'Gedung Utama Lantai 1'),
('LK002', 'Departemen Keuangan', 'Gedung Utama Lantai 2'),
('LK003', 'Ruang Lurah', 'Gedung Utama Lantai 2'),
('LK004', 'Kasi Kesejahteraan dan Pemberd', 'Gedung Utama Lantai 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenempatan`
--

CREATE TABLE `tbpenempatan` (
  `kode_penempatan` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_lokasi` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `username`, `password`, `nama_user`, `status_user`) VALUES
(1, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'agung', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbkasi`
--
ALTER TABLE `tbkasi`
  ADD PRIMARY KEY (`kode_kasi`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tblokasi`
--
ALTER TABLE `tblokasi`
  ADD PRIMARY KEY (`kode_lokasi`);

--
-- Indexes for table `tbpenempatan`
--
ALTER TABLE `tbpenempatan`
  ADD PRIMARY KEY (`kode_penempatan`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
