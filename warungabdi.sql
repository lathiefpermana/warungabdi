-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 02:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungabdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `warung` varchar(20) NOT NULL,
  `akun_level` enum('superadmin','klien') NOT NULL,
  `akun` varchar(255) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `lisensi` text DEFAULT NULL,
  `tanggal_aktif` date DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `status_aktif` enum('aktif','non aktif') NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `warung`, `akun_level`, `akun`, `sandi`, `lisensi`, `tanggal_aktif`, `tanggal_kadaluarsa`, `status_aktif`, `log`) VALUES
(1, 'Warung Abdi', 'superadmin', 'alathiefpermana@gmail.com', 'a9d0879341c1ff05a0580b3184f9018a98b04736', '6ACbpuK5vSlVr05JNuEvB0cQiDc3kQeFsIjX4jcRDTn7hiHcV7QTizQqCxrmRVdak2ZrNpov1ZWzC6XixdLL4ytmZy10MRVE8ikhZvgs8AanZW7cLY6cJ3dQIdwNF4eL1BUhW4PyC4evEpZDdBZ4o0K55u4sZO72XQpyz02U00kHd8XiQZHOTv5Vn3I1yCQHdkndYUpzaEJNvySxg6kGhAy8o4xHi4SZPVy2dC7ipZrlH5BiYglDKuvyGRBlzex800ikrwQ54gfQ5DO29Y4VqCDZqsC2oDMqSkEpGYGEIghX6idEWsdl724M9HrF4dQg', '2024-08-01', '2030-08-31', 'aktif', '2024-08-16 02:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pemasok` int(11) NOT NULL,
  `nomor_faktur` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk_item`
--

CREATE TABLE `barang_masuk_item` (
  `id` int(11) NOT NULL,
  `barang_masuk` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `modal_satuan` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `created_by`, `created_at`, `update_by`, `update_at`, `log`) VALUES
(1, 'BERAS', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(2, 'TEPUNG', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(3, 'GULA', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(4, 'TELUR', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(5, 'MINYAK', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(6, 'KECAP', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `nomor_telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `kontak`, `nomor_telepon`, `alamat`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 'Jajanan Abdi', 'Diyashita', '081385863839', 'Perum Grand Mutiara ', 1, '2024-08-20 08:07:39', 1, '2024-08-20 09:21:39', NULL, NULL, '2024-08-20 07:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_produk` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_produk`, `barcode`, `nama`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 1, '', 'ROJOLELE 5KG', 1, '2024-08-16 06:21:36', NULL, NULL, 1, '2024-08-20 09:21:56', '2024-08-20 07:21:56'),
(2, 1, '', 'ROJO LELE 10KG', 1, '2024-08-16 06:25:47', NULL, NULL, NULL, NULL, '2024-08-16 04:25:47'),
(3, 1, '', 'ROJOLELE 25KG', 1, '2024-08-16 06:25:57', NULL, NULL, NULL, NULL, '2024-08-16 04:25:57'),
(4, 2, '', 'SEGITIGA BIRU 1/4 KG', 1, '2024-08-16 09:54:56', 1, '2024-08-20 03:29:06', 1, '2024-08-20 03:38:14', '2024-08-20 01:38:14'),
(5, 2, '', 'SEGITIGA BIRU 1/2KG', 1, '2024-08-16 09:55:09', NULL, NULL, 1, '2024-08-20 03:37:11', '2024-08-20 01:37:11'),
(6, 2, '', 'SEGITIGA BIRU 1KG', 1, '2024-08-16 09:55:16', 0, '2024-08-16 11:06:30', NULL, NULL, '2024-08-16 09:06:30'),
(7, 5, '999909091023', 'BIMOLI 1L', 1, '2024-08-16 10:13:50', NULL, NULL, 1, '2024-08-20 03:37:19', '2024-08-20 01:37:19'),
(8, 2, '897099879900', 'SEGITIGA BIRU 1KG', 1, '2024-08-16 10:59:05', NULL, NULL, NULL, NULL, '2024-08-16 08:59:05'),
(9, 1, '', '', 1, '2024-08-20 06:35:13', NULL, NULL, NULL, NULL, '2024-08-20 04:35:13');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemasok`
-- (See below for the actual view)
--
CREATE TABLE `view_pemasok` (
`id` int(11)
,`nama` varchar(255)
,`kontak` varchar(255)
,`nomor_telepon` text
,`alamat` text
,`created_by` varchar(255)
,`created_at` datetime
,`delete_by` int(11)
,`delete_at` datetime
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_produk`
-- (See below for the actual view)
--
CREATE TABLE `view_produk` (
`id` int(11)
,`kategori_produk` varchar(255)
,`barcode` varchar(255)
,`nama_produk` varchar(255)
,`created_by` varchar(255)
,`created_at` datetime
,`delete_by` int(11)
,`delete_at` datetime
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `view_pemasok`
--
DROP TABLE IF EXISTS `view_pemasok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemasok`  AS SELECT `pemasok`.`id` AS `id`, `pemasok`.`nama` AS `nama`, `pemasok`.`kontak` AS `kontak`, `pemasok`.`nomor_telepon` AS `nomor_telepon`, `pemasok`.`alamat` AS `alamat`, `akun`.`akun` AS `created_by`, `pemasok`.`created_at` AS `created_at`, `pemasok`.`delete_by` AS `delete_by`, `pemasok`.`delete_at` AS `delete_at`, `pemasok`.`log` AS `log` FROM (`pemasok` join `akun` on(`akun`.`id` = `pemasok`.`created_by`)) ORDER BY `pemasok`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_produk`
--
DROP TABLE IF EXISTS `view_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produk`  AS SELECT `produk`.`id` AS `id`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`barcode` AS `barcode`, `produk`.`nama` AS `nama_produk`, `akun`.`akun` AS `created_by`, `produk`.`created_at` AS `created_at`, `produk`.`delete_by` AS `delete_by`, `produk`.`delete_at` AS `delete_at`, `produk`.`log` AS `log` FROM ((`produk` join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `akun` on(`akun`.`id` = `produk`.`created_by`)) ORDER BY `produk`.`log` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasok` (`pemasok`);

--
-- Indexes for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuk` (`barang_masuk`),
  ADD KEY `produk` (`produk`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk` (`kategori_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`pemasok`) REFERENCES `pemasok` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  ADD CONSTRAINT `barang_masuk_item_ibfk_1` FOREIGN KEY (`barang_masuk`) REFERENCES `barang_masuk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_item_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`kategori_produk`) REFERENCES `kategori_produk` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
