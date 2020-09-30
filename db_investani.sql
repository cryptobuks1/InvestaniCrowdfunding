-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 05:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_investani`
--

-- --------------------------------------------------------

--
-- Table structure for table `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `namaProyek` varchar(255) NOT NULL,
  `jumlahUang` int(255) NOT NULL,
  `investor` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `buktiTransfer` varchar(255) NOT NULL,
  `statusDana` varchar(255) NOT NULL,
  `kumpul` varchar(255) NOT NULL,
  `kerja` varchar(255) NOT NULL,
  `jumlahSaham` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dana`
--

INSERT INTO `dana` (`id`, `namaProyek`, `jumlahUang`, `investor`, `keterangan`, `buktiTransfer`, `statusDana`, `kumpul`, `kerja`, `jumlahSaham`, `tanggal`, `laporan`, `proposal`) VALUES
(52, 'Tes', 50000000, 'budi', '', '', 'Berlangsung', '30', '6', 25, '', '', 'tes.pdf'),
(53, 'Rizal', 5000000, 'budi', '', '', 'Berlangsung', '30', '6', 5, '', '', 'tes.pdf'),
(54, 'PTPN', 250000000, 'budi', '', '', 'Berlangsung', '60', '12', 50, '', '', 'tes.pdf'),
(55, 'PTPN', 250000000, 'budi', '', '', 'Berlangsung', '60', '12', 50, '', '', 'tes.pdf'),
(56, 'Tulungagung', 5000000, 'budi', '', '', 'Berlangsung', '30', '12', 10, '', '', 'tes.pdf'),
(57, 'Tulungagung', 100000000, 'budi', '', '', 'Berlangsung', '30', '12', 200, '', '', 'tes.pdf'),
(58, 'Tulungagung', 495000000, 'budi', '', '', 'Berlangsung', '30', '12', 990, '', '', 'tes.pdf'),
(59, 'Tim', 100000000, 'budi', '', '', 'Berlangsung', '30', '6', 100, '2018/08/27', '', 'tes.pdf'),
(60, 'Tim', 10000000, 'budi', '', '', 'Berlangsung', '30', '6', 10, '2018/08/27', '', 'tes.pdf'),
(61, 'Tim', 10000000, 'budi', '', '', 'Berlangsung', '30', '6', 10, '2018/08/27', '', 'tes.pdf'),
(62, 'Tim', 25000000, 'budi', '', '', 'Berlangsung', '30', '6', 25, '2018/08/27', '', 'tes.pdf'),
(63, 'Tim', 30000000, 'budi', '', '', 'Berlangsung', '30', '6', 30, '2018/08/27', '', 'tes.pdf'),
(64, 'Tim', 10000000, 'budi', '', '', 'Berlangsung', '30', '6', 10, '2018/08/27', '', 'tes.pdf'),
(65, 'Tim', 25000000, 'budi', '', '', 'Berlangsung', '30', '6', 25, '2018/08/27', '', 'tes.pdf'),
(66, 'Tim', 20000000, 'budi', '', '', 'Berlangsung', '30', '6', 20, '2018/08/27', '', 'tes.pdf'),
(67, 'Tim', 5000000, 'budi', '', '', 'Berlangsung', '30', '6', 5, '2018/08/27', '', 'tes.pdf'),
(68, 'Tim', 25000000, 'budi', '', '', 'Berlangsung', '30', '6', 25, '2018/08/27', '', 'tes.pdf'),
(69, 'Yo Yo Ayo', 10000000, 'budi', '', '', 'Berlangsung', '30', '12', 10, '2018/09/02', '', ''),
(70, 'Yo Yo Ayo', 90000000, 'budi', '', '', 'Berlangsung', '30', '12', 90, '2018/09/02', '', ''),
(71, 'Medan Bos', 30000000, 'budi', '', '', 'Berlangsung', '30', '2', 15, '2018/09/03', '', ''),
(72, 'Medan Bos', 70000000, 'yudi', '', '', 'Berlangsung', '30', '2', 35, '2018/09/03', '', ''),
(73, 'Medan Jaya Rakyat', 50000000, 'budi', '', '', 'Berlangsung', '30', '2', 25, '2018/09/03', '', ''),
(74, 'Medan Jaya Rakyat', 150000000, 'yudi', '', '', 'Berlangsung', '30', '2', 75, '2018/09/03', '', ''),
(75, 'Malang Hits', 200000000, 'yudi', '', '', 'Berlangsung', '30', '2', 200, '2018/09/03', '', ''),
(76, 'Tebu Malang', 10000000, 'budi', '', '', 'Berlangsung', '30', '12', 10, '2018/09/03', '', ''),
(77, 'Tebu Malang', 90000000, 'yudi', '', '', 'Berlangsung', '30', '12', 90, '2018/09/03', '', ''),
(78, 'Malang Jaya', 20000000, 'budi', '', '', 'Berlangsung', '30', '6', 10, '2018/11/23', '', ''),
(79, 'Satu', 10000000, 'budi', 'Top Up', '', 'Menunggu Persetujuan', '30', '6', 10, '2018/11/23', '', ''),
(80, 'Tim', 2000000, 'user', '', '', 'Berlangsung', '30', '6', 2, '2018/12/18', '', ''),
(81, 'Proyek Mamat', 500000000, 'user', '', '', 'Berlangsung', '30', '6', 500, '2018/12/18', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `proyek` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `luas` varchar(255) NOT NULL,
  `danakumpul` int(255) NOT NULL,
  `danasisa` int(255) NOT NULL,
  `target` bigint(255) NOT NULL,
  `kumpul` varchar(255) NOT NULL,
  `kerja` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Persetujuan',
  `alamat` varchar(255) NOT NULL,
  `jumlahsaham` int(255) NOT NULL,
  `sisasaham` int(255) NOT NULL,
  `hargasaham` int(255) NOT NULL,
  `inisiator` varchar(255) NOT NULL,
  `pengelola` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL DEFAULT 'Pembukaan Proyek',
  `Untung` int(255) NOT NULL,
  `laporan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `proyek`, `email`, `luas`, `danakumpul`, `danasisa`, `target`, `kumpul`, `kerja`, `deskripsi`, `proposal`, `foto`, `level`, `status`, `alamat`, `jumlahsaham`, `sisasaham`, `hargasaham`, `inisiator`, `pengelola`, `keterangan`, `Untung`, `laporan`) VALUES
(1, 'Tes', 'tes@email', '2', 200000000, 200000000, 200000000, '30', '6', '', 'tes.pdf', 'proyek-3.jpg', 'KBN', 'Berlangsung', 'Mojoagung', 100, 0, 2000000, 'chika', 'andi', 'Pengerjaan Proyek', 0, ''),
(2, 'Tos', 'tos@email', '4', 40000000, 0, 40000000, '60', '12', '', 'tes.pdf', 'proyek-3.jpg', 'KDI', 'Berlangsung', 'Malang', 200, 140, 1000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(3, 'Tas', 'tas@email', '5', 60000000, 0, 200000000, '60', '12', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'tes.pdf', 'proyek-1.jpg', 'TG-I', 'Berlangsung', 'Lawang', 200, 190, 1000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(4, 'Tis', 'chika@email', '10', 62500000, 0, 500000000, '30', '8', 'aaaaaaaaaaaaaaa', 'tes.pdf', 'proyek-1.jpg', 'KBD', 'Berlangsung', 'Kediri', 250, 250, 2000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(5, 'Tus', 'chika@email', '15', 100000000, 100000000, 100000000, '30', '6', 'bagus', 'tes.pdf', 'proyek-2.jpg', 'TG-II', 'Berlangsung', 'Mojoagung', 100, 100, 1000, 'chika', 'andi', 'Penggalangan Dana', 0, ''),
(6, 'Baru', 'chika@email', '10', 0, 0, 500000000, '30', '6', 'Bagus', 'tes.pdf', 'proyek-2.jpg', 'TG-I', 'Berlangsung', 'Malang', 500, 500, 1000, 'chika', '', 'Penggalangan Dana', 0, ''),
(7, 'Lama', 'chika@email', '2', 0, 0, 100000000, '30', '6', 'Bagus', 'tes.pdf', 'proyek-2.jpg', 'KBD', 'Menunggu Persetujuan', 'Lawang', 100, 100, 1000, 'chika', '', 'Pembukaan Proyek', 0, ''),
(8, 'Sekarang', 'chika@email', '10', 0, 0, 10000000, '30', '6', 'Bagus', 'tes.pdf', 'proyek-3.jpg', 'KBN', 'Menunggu Persetujuan', 'Kediri', 10000000, 10000000, 1000, 'chika', '', 'Pembukaan Proyek', 0, ''),
(9, 'Proyek Tebu ', 'chika@email', '10', 0, 0, 100000000, '30', '6', 'Lahan ini adalah blabla', 'tes.pdf', 'proyek-3.jpg', 'KBN', 'Menunggu Persetujuan', 'Mojoagung', 100, 100, 1000000, 'chika', '', 'Pembukaan Proyek', 0, ''),
(10, 'Coba', 'chika@email', '10', 0, 0, 400000000, '30', '8', 'fg', 'tes.pdf', 'proyek-2.jpg', 'KBD', 'Berlangsung', 'Malang', 200, 200, 2000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(11, 'kediri', 'chika@email', '5', 0, 0, 500000000, '60', '8', 'Tanah bagus', 'tes.pdf', 'proyek-1.jpg', 'KBD', 'Berlangsung', 'Kediri', 100, 100, 5000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(12, 'Malang Jaya', 'chika@email', '4.75', 20000000, 0, 250000000, '30', '6', 'Malang jaya', 'tes.pdf', 'proyek-3.jpg', 'KDI', 'Berlangsung', 'Malang', 0, -10, 1500000, 'chika', '', 'Penggalangan Dana', 0, ''),
(13, 'Tim', 'chika@email', '4.75', 222000000, 0, 500000000, '30', '6', 'Bagus', '', 'proyek-3.jpg', 'KBD', 'Berlangsung', 'Rumah Tim', 500, 278, 1000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(15, 'Jombang ', 'chika@email', '2.123', 500000000, 0, 500000000, '30', '12', 'Lahan berada di bekas lahan jagung', 'tes.pdf', 'proyek-3.jpg', 'TG-I', 'Selesai', 'Mojoagung Jombang', 1000, 0, 500000, 'chika', '', '', 1000000000, ''),
(16, 'Tulungagung', 'chika@email', '4.75', 500000000, 450000000, 500000000, '30', '12', 'Bagus', 'tes.pdf', 'proyek-3.jpg', 'TG-I', 'Selesai', 'Kediri', 1000, 1980, 500000, 'chika', 'andi', '', 1000000000, ''),
(21, 'Coba coba', 'chika@email.com', '10', 0, 0, 100000000, '30', '6', 'aaaaa', '', 'proyek-3.jpg', 'KBN', 'Berlangsung', 'Singosari', 100, 0, 1000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(22, 'Medan Jaya Rakyat', 'chika@email', '2.5', 200000000, 200000000, 200000000, '30', '2', 'Medan', 'tes.pdf', 'proyek-1.jpg', 'KBN', 'Selesai', 'Medan', 100, 0, 2000000, 'chika', 'andi', '', 100000000, ''),
(23, 'Tebu Singosari', 'chika@email', '4.75', 100000000, 70000000, 100000000, '30', '12', 'Lahan kosong dengan tanah yang subur', 'tes.pdf', 'proyek-3.jpg', 'TG-I', 'Berlangsung', 'Singosari', 100, 0, 1000000, 'chika', 'andi', 'Pengerjaan Proyek', 20000000, 'tes.pdf'),
(24, 'Yo Yo Ayo', 'chika@email', '10', 100000000, 0, 100000000, '30', '12', 'aaaaaaaaa', 'tes.pdf', 'proyek-3.jpg', 'KBN', 'Selesai', 'Singosari', 100, 0, 1000000, 'chika', 'andi', '', 10000000, 'tes.pdf'),
(25, 'Medan Bos', 'chika@email', '2.90', 100000000, 100000000, 100000000, '30', '2', 'Medan', 'tes.pdf', 'proyek-2.jpg', 'KBN', 'Selesai', 'Medan', 50, 0, 2000000, 'chika', 'andi', '', 20000000, ''),
(26, 'Malang Hits', 'chika@email', '4.75', 200000000, 200000000, 200000000, '30', '2', 'Malang GO', 'tes.pdf', 'proyek-2.jpg', 'KBD', 'Selesai', 'Malang', 200, 0, 1000000, 'chika', 'andi', '', 100000000, ''),
(27, 'Tebu Malang', 'chika@email', '10.5', 100000000, 90000000, 100000000, '30', '12', 'Perkebunan di daerah sekitar Malang', 'tes.pdf', 'proyek-2.jpg', 'TG-I', 'Selesai', 'Malang', 100, 0, 1000000, 'chika', 'andi', '', 50000000, 'tes.pdf'),
(28, 'aad', 'chika@email', '41', 0, 0, 100000000, '30', '6', 'ada', 'tes.pdf', 'proyek-2.jpg', 'KBN', 'Menunggu Persetujuan', 'fa', 100, 100, 1000000, 'chika', '', 'Pembukaan Proyek', 0, ''),
(29, 'CHIKA', 'chika@email', '2.60', 0, 0, 10000000, '60', '7', 'Ini lahanku', 'proyek-2.jpg', 'proyek-3.jpg', 'TG-II', 'Berlangsung', 'JAKARta', 2, 2, 5000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(30, 'Malang Jaya', 'chika@email', '3.14', 20000000, 0, 20000000, '30', '6', 'Bagus', 'tes.pdf', 'proyek-2.jpg', 'KBN', 'Berlangsung', 'Malang', 10, -10, 2000000, 'chika', '', 'Penggalangan Dana', 0, ''),
(31, 'Satu', 'userbaru@ub.ac.id', '10', 10000000, 0, 100000000, '30', '6', 'Lahan di malang selatan', 'tes.pdf', 'proyek-2.jpg', 'KBN', 'Berlangsung', 'Malang', 100, 90, 1000000, 'userbaru', '', 'Penggalangan Dana', 0, ''),
(32, 'Proyek Mamat', 'mamat@gmail.com', '2.60', 500000000, 500000000, 500000000, '30', '6', 'Lahan berada di Malang', 'tes.pdf', 'proyek-1.jpg', 'KDI', 'Selesai', 'Malang', 500, 0, 1000000, 'mamat', 'andi', '', 100000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jumlahuang` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `namapengelola` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id`, `tanggal`, `jumlahuang`, `foto`, `keterangan`, `namapengelola`, `total`) VALUES
(5, '26/07/2018', 1000000, 'aaaa', 'proyek-1.jpg', '', 0),
(6, '26/07/2018', 1000000, 'aaaa', 'proyek-1.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `namaProyek` varchar(255) NOT NULL,
  `tanggalAmbil` varchar(255) NOT NULL,
  `jumlahAmbil` int(255) NOT NULL,
  `deskripsiAmbil` varchar(255) NOT NULL,
  `fotoAmbil` varchar(255) NOT NULL,
  `pengelola` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `namaProyek`, `tanggalAmbil`, `jumlahAmbil`, `deskripsiAmbil`, `fotoAmbil`, `pengelola`, `keterangan`, `status`, `proposal`) VALUES
(16, 'Tulungagung', '17/08/2018', 50000000, 'Pencairan 1', 'user.jpg', 'andi', '', 'Berlangsung', ''),
(17, 'Tebu Singosari', '30/08/2018', 10000000, 'Penarikan 1', 'tes.pdf', 'andi', '', 'Berlangsung', ''),
(18, 'Tebu Singosari', '30/08/2018', 20000000, 'Penarikan 2', 'tes.pdf', 'andi', 'Pengambilan Dana', 'Menunggu Persetujuan', ''),
(29, 'Tebu Malang', '03/09/2018', 10000000, 'Penarikan 1', 'tes.pdf', 'andi', 'Pengambilan Dana', 'Menunggu Persetujuan', '');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlahMasuk` int(255) NOT NULL,
  `jumlahKeluar` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `proyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `nama`, `jumlahMasuk`, `jumlahKeluar`, `keterangan`, `tanggal`, `proyek`) VALUES
(1, 'budi', 20000000, 0, 'Investasi proyek', '2018/11/23', ''),
(2, 'user', 2000000, 0, 'Investasi proyek', '2018/12/18', ''),
(3, 'user', 500000000, 0, 'Investasi proyek', '2018/12/18', ''),
(4, 'user', 575000000, 0, 'Bagi hasil', '2018/12/18', 'Proyek Mamat'),
(5, 'mamat', 5000000, 0, 'Bagi hasil', '2018/12/18', 'Proyek Mamat'),
(6, 'andi', 20000000, 0, 'Bagi hasil', '2018/12/18', 'Proyek Mamat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomorhp` varchar(255) NOT NULL,
  `rekening` varchar(255) NOT NULL,
  `npwk` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `alamat`, `nomorhp`, `rekening`, `npwk`, `nik`, `username`, `password`, `kategori`, `saldo`) VALUES
(1, 'andi', 'budi@email', 'rumah budi', '001122334455', '123456789', '12345', '123', 'andi', '123', 'Pengelola', 20000000),
(2, 'yudi', 'budi@email', 'rumah budi', '081678902345', '', '', '', 'budi', '123', 'Investor', 0),
(3, 'chika', 'chika@email', 'rumah chika', '081567890234', '123456789', '12345', '123', 'chika', '123', 'Inisiator', 0),
(4, 'deny', 'budi@email', 'rumah budi', '081567890234', '123456789', '12345', '123', 'yudi', '123', 'Investor', 0),
(5, 'eko', 'budi@email', 'rumah budi', '081567890234', '123456789', '12345', '123', 'alfin', '123', 'Investor', 0),
(6, 'fahrul', 'budi@email', 'rumah budi', '081567890234', '123456789', '12345', '123', 'tes', '123', 'Pengelola', 0),
(8, 'gilang', 'budi@email', 'rumah budi', '081567890234', '123456789', '12345', '123', 'Osiris', 'qwerty123', 'Investor', 0),
(9, '', 'siahaan.timoti10@gmail.com', '', '', '', '', '', 'tim', '123', '', 0),
(10, 'admin', 'admin@email', '-', '-', '-', '-', '-', 'admin', '123', 'Admin', 0),
(11, '', 'userbaru@ub.ac.id', '', '', '', '', '', 'userbaru', '12345678', 'Inisiator', 0),
(12, '', 'user', '', '', '', '', '', 'user', '123', 'Investor', 575000000),
(13, '', 'mamat@gmail.com', '', '', '', '', '', 'mamat', '123', 'Inisiator', 5000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
