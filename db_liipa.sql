-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2025 at 04:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_liipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Aksesoris'),
(3, 'Tas'),
(5, 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_produk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar_produk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_produk` decimal(12,0) NOT NULL,
  `rating` float NOT NULL,
  `jumlah_varian_warna` int NOT NULL,
  `kategori_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `gambar_produk`, `harga_produk`, `rating`, `jumlah_varian_warna`, `kategori_produk`) VALUES
(1, 'Aksesoris', 'Aksesoris unik dari kain perca', 'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e', '15', 4.5, 3, 1),
(2, 'Baju', 'Baju unik dari kain perca', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JxF-1I7yhPNbTTFQuRK8Pm_pdmR-8zTJxA&s', '30', 4.2, 2, 5),
(3, 'Aksesoris', 'Aksesoris unik dari kain perca', 'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e', '15', 4.5, 3, 1),
(4, 'Aksesoris', 'Aksesoris unik dari kain perca', 'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e', '15', 4.5, 3, 1),
(5, 'Baju', 'Baju unik dari kain perca', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JxF-1I7yhPNbTTFQuRK8Pm_pdmR-8zTJxA&s', '30', 4.2, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `remove_on_delete` (`kategori_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `remove_on_delete` FOREIGN KEY (`kategori_produk`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
