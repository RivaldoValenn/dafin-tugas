-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2024 at 09:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `kode_brg` varchar(18) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `kategori_id` int NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_brg`, `nama_brg`, `kategori_id`, `merk`, `jumlah`, `gambar`) VALUES
(1, 'S0001', 'Lenovo K14', 1, 'Lenovo', 10, 'img/sg-11134201-22120-zp4qvowgcrkv76.jpeg'),
(2, 'LP002', 'Macbook Pro', 1, 'Macbook', 10, 'img/5yJDoXZecZ8JcsEbxvDSrE-1200-80.jpg'),
(3, 'LP003', 'Macbook Pro Air M1', 3, 'Macbook', 10, '../img/5yJDoXZecZ8JcsEbxvDSrE-1200-80.jpg'),
(4, 'LP004', 'Lenovo ', 1, 'Lenovo', 12, '../img/download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `deskripsi`, `created_at`) VALUES
(1, 'Laptop', 'Kategori laptop', '2024-03-15 07:39:46'),
(2, 'Charger', 'charger', '2024-03-15 07:39:46'),
(3, 'Macbook', 'Laptop Macbook', '2024-03-15 07:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_login` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_identitas`, `nama`, `status`, `username`, `password`, `role`) VALUES
(1, '2120001921', 'Ujang', 'Pelajar', 'ujanggg', 'ujang123', 'pengguna'),
(2, '21921281', 'Asep', 'Pelajar', 'AsepGtg', 'asep123', 'pengguna'),
(3, '212215077098', 'Huh Yunjin', 'Pelajar', 'yunjin', '$2y$10$xuEIevujoy69g6gE/9oZBeh0YexVpVEYWsth5U4TEmgUbYH2lOSzK', 'Pengguna'),
(4, '212215077098', 'Rivaldo Valentino', 'Pelajar', 'rivaldo', '$2y$10$KOHnCood1RVjH2fDgkuAXuGK5DWoxHGNDFQEbddMw9hDJ4dcsLE2K', 'Pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
