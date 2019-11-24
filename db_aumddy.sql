-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 03:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aumddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `gambar`, `deskripsi`) VALUES
(1, 'file_1524157378.png', '<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat lectus diam, et ornare dui placerat in. Nunc suscipit posuere ipsum, eget varius leo eleifend a. Etiam bibendum sapien justo, vitae dignissim lacus tincidunt at. Cras pretium vestibulum leo sit amet laoreet. Donec lacinia odio vitae est ornare porttitor. Nunc vel iaculis justo, sed ultricies nibh. Curabitur congue congue nulla, in vehicula lectus. Suspendisse enim dolor, suscipit in massa sit amet, blandit consequat neque.</p>\r\n\r\n<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat lectus diam, et ornare dui placerat in. Nunc suscipit posuere ipsum, eget varius leo eleifend a. Etiam bibendum sapien justo, vitae dignissim lacus tincidunt at. Cras pretium vestibulum leo sit amet laoreet. Donec lacinia odio vitae est ornare porttitor. Nunc vel iaculis justo, sed ultricies nibh. Curabitur congue congue nulla, in vehicula lectus. Suspendisse enim dolor, suscipit in massa sit amet, blandit consequat neque.ssss</p>\r\n\r\n<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat lectus diam, et ornare dui placerat in. Nunc suscipit posuere ipsum, eget varius leo eleifend a. Etiam bibendum sapien justo, vitae dignissim lacus tincidunt at. Cras pretium vestibulum leo sit amet laoreet. Donec lacinia odio vitae est ornare porttitor. Nunc vel iaculis justo, sed ultricies nibh. Curabitur congue congue nulla, in vehicula lectus. Suspendisse enim dolor, suscipit in massa sit amet, blandit consequat neque.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `nama_rekening` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `rekening`, `nama_rekening`, `logo`) VALUES
(1, 'BCA', '1623-1627-17', 'PT.AUMDDY', 'bca.png'),
(2, 'BRI', '0102-25-172861-20-9', 'PT.AUMDDY', 'bri.png'),
(3, 'BNI', '172-819-0099', 'PT.AUMDDY', 'bni.png'),
(4, 'Mandiri', '718-09-9120007-2', 'PT.AUMDDY', 'mandiri.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `foto` varchar(20) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `id_kategori`, `deskripsi`, `foto`, `id_user`, `date`) VALUES
(1, 'baju_putih', '150000', 10, 1, 'Kaos Superhero Black Panther Mask adalah kaos dengan kualitas distro. tersedia Warna Hitam. Bahan Kaos tersedia 2 macam : Cotton Combed 20s dan Cotton Combed 30s Bahan sama-sama katun, hanya berbeda ketebalan saja. 20s yang lebih tebal. 30s yang lebih tipis.', 'jaket_new1.jpg', '1', '2018-03-27 09:32:41'),
(2, 'Celana Coklat', '230000', 12, 2, 'Kaos Superhero Black Panther Mask adalah kaos dengan kualitas distro. tersedia Warna Hitam. Bahan Kaos tersedia 2 macam : Cotton Combed 20s dan Cotton Combed 30s Bahan sama-sama katun, hanya berbeda ketebalan saja. 20s yang lebih tebal. 30s yang lebih tipis.', 'file_1523553604.jpg', '1', '2018-03-30 10:18:43'),
(3, 'Jaket Hitam', '100000', 11, 2, 'Kaos Superhero Black Panther Mask adalah kaos dengan kualitas distro. tersedia Warna Hitam. Bahan Kaos tersedia 2 macam : Cotton Combed 20s dan Cotton Combed 30s Bahan sama-sama katun, hanya berbeda ketebalan saja. 20s yang lebih tebal. 30s yang lebih tipis.', 'jaket_new3.jpg', '1', '2018-03-30 00:00:00'),
(4, 'baju hitam', '250000', 15, 3, 'Kaos Superhero Black Panther Mask adalah kaos dengan kualitas distro. tersedia Warna Hitam. Bahan Kaos tersedia 2 macam : Cotton Combed 20s dan Cotton Combed 30s Bahan sama-sama katun, hanya berbeda ketebalan saja. 20s yang lebih tebal. 30s yang lebih tipis.1', 'file_1523552736.jpg', '1', '2018-03-30 10:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousel`
--

CREATE TABLE `tbl_carousel` (
  `id_carousel` int(11) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carousel`
--

INSERT INTO `tbl_carousel` (`id_carousel`, `gambar`, `id_barang`) VALUES
(2, 'jaket2.png', 3),
(4, 'file_1524154156.png', 1),
(5, 'file_1524157364.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Baju'),
(2, 'Celana'),
(3, 'Jaket'),
(4, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` enum('belum','belum_dibayar','dibayar','dikirim','diterima','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_keranjang`, `id_transaksi`, `id_user`, `id_barang`, `jumlah`, `status`) VALUES
(2, 'AUD00000001', 3, 4, 6, 'dikirim'),
(14, 'AUD00000001', 3, 3, 8, 'dikirim'),
(15, 'AUD00000001', 3, 1, 4, 'dikirim'),
(18, 'AUD00000002', 2, 3, 1, 'dibayar'),
(19, 'AUD00000003', 2, 4, 2, 'belum_dibayar'),
(21, 'AUD00000004', 2, 3, 3, 'belum_dibayar'),
(24, 'AUD00000004', 2, 1, 1, 'belum_dibayar'),
(25, 'AUD00000005', 2, 3, 1, 'dikirim'),
(26, 'AUD00000006', 2, 1, 1, 'diterima'),
(27, 'AUD00000007', 3, 3, 3, 'dibayar'),
(28, 'AUD00000008', 2, 3, 1, 'dibayar'),
(30, 'AUD00000009', 2, 3, 2, 'belum_dibayar'),
(39, '', 2, 3, 1, 'belum'),
(40, 'AUD00000011', 3, 4, 1, 'diterima'),
(41, 'AUD00000011', 3, 1, 1, 'diterima'),
(42, 'AUD00000011', 3, 2, 1, 'diterima'),
(43, 'AUD00000012', 3, 1, 1, 'dikirim'),
(44, 'AUD00000013', 3, 3, 2, 'diterima'),
(45, 'AUD00000013', 3, 2, 1, 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_user` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `alamat` longtext NOT NULL,
  `resi` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_user`, `total`, `id_bank`, `alamat`, `resi`, `date`) VALUES
('AUD00000001', 3, 3150001, 1, '', '78878987', '2018-04-05 00:00:00'),
('AUD00000002', 2, 950002, 3, '', '', '2018-04-05 00:00:00'),
('AUD00000003', 2, 600003, 4, '', '', '2018-04-06 00:00:00'),
('AUD00000004', 2, 1400004, 4, '', '', '2018-04-06 00:00:00'),
('AUD00000005', 2, 350005, 1, 'jl.cilandak no 99', '122323', '2018-04-12 00:00:00'),
('AUD00000006', 2, 150006, 2, 'jl.bojong soang no89,kec.bojong soang', '', '2018-04-12 00:00:00'),
('AUD00000007', 3, 1050007, 4, 'jl.sukabirus', '', '2018-04-12 00:00:00'),
('AUD00000008', 2, 750008, 2, 'jl.cilandak no 99 indramayu', '', '2018-04-12 00:00:00'),
('AUD00000009', 2, 700009, 4, 'jl.cilandak no 99 indramayu', '', '2018-04-12 00:00:00'),
('AUD00000010', 2, 740010, 1, 'jl.cilandak no 99 indramayu', '', '2018-04-13 00:00:00'),
('AUD00000011', 3, 630011, 1, 'kom.pesona', '123321', '2018-04-20 00:00:00'),
('AUD00000012', 3, 150012, 1, 'kom.pesona', '32423424234', '2018-04-24 00:00:00'),
('AUD00000013', 3, 430013, 3, 'kom.pesona', '1989829', '2018-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` longtext NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `foto` varchar(40) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `nama`, `alamat`, `no_telpon`, `jk`, `foto`, `role`) VALUES
(1, 'aliefaditya39@yahoo.com', '6ad14ba9986e3615423dfca256d04e3f', 'Admin aumdy1', 'jl.cikoneng', '085222286863', '', 'file_1524156988.jpg', 1),
(2, 'andrianto.teddy@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'Teddy Andrianto', 'jl.cilandak no 99 indramayu', '085323456778', 'L', '', 1),
(3, 'choddy@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'Choddy Rabbany', 'kom.pesona', '085000011', 'L', 'file_1524067056.jpg', 2),
(4, 'wawan@gmail.com', '202cb962ac59075b964b07152d234b70', 'wawan mardi', 'jl.merdeka1', '98778787', 'L', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `FK_ID_BARANG` (`id_barang`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `FK_ID_BARANG` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
