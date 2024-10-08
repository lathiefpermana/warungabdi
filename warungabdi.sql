-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 10:53 AM
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
  `jam` time DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `tanggal`, `jam`, `bulan`, `tahun`, `pemasok`, `nomor_faktur`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, '2024-09-05', '10:33:06', 9, 2024, 2, '2024/IX/WA0001', 1, '2024-09-05 07:57:05', NULL, NULL, 1, '2024-09-05 09:33:01', '2024-09-13 03:33:46'),
(2, '2024-09-05', '10:33:06', 9, 2024, 2, '1', 1, '2024-09-05 09:33:18', NULL, NULL, 1, '2024-09-05 09:35:39', '2024-09-13 03:33:49'),
(3, '2024-09-05', '10:33:06', 9, 2024, 2, '2', 1, '2024-09-05 09:33:42', NULL, NULL, 1, '2024-09-10 03:05:41', '2024-09-13 03:33:52'),
(4, '2024-09-09', '10:33:06', 9, 2024, 2, '2024/09/0001', 1, '2024-09-10 03:06:02', NULL, NULL, 1, '2024-09-10 03:38:24', '2024-09-13 03:33:55'),
(5, '2024-09-09', '10:33:06', 9, 2024, 2, '2024/09/0002', 1, '2024-09-10 03:37:37', 1, '2024-09-10 03:42:19', NULL, NULL, '2024-09-13 03:33:57'),
(6, '2024-09-13', '10:33:06', 9, 2024, 2, 'IND/09/2024/01-0010034', 1, '2024-09-13 04:31:15', NULL, NULL, NULL, NULL, '2024-09-13 03:34:00'),
(7, '2024-09-24', NULL, NULL, NULL, 3, '4', 1, '2024-09-24 05:31:07', NULL, NULL, NULL, NULL, '2024-09-24 03:31:30'),
(8, '2024-09-24', NULL, NULL, NULL, 3, '1234', 1, '2024-09-24 05:32:50', NULL, NULL, NULL, NULL, '2024-09-24 03:32:50'),
(9, '2024-09-24', '05:37:53', 9, 2024, 3, '1111111', 1, '2024-09-24 05:37:53', NULL, NULL, NULL, NULL, '2024-09-24 03:37:53'),
(10, '2024-09-26', '08:45:46', 9, 2024, 3, '2024/iX/ID/001', 1, '2024-09-26 08:45:46', NULL, NULL, NULL, NULL, '2024-09-26 06:45:46'),
(11, '2024-09-26', '08:46:50', 9, 2024, 3, '2024/09/0001', 1, '2024-09-26 08:46:50', NULL, NULL, NULL, NULL, '2024-09-26 06:46:50'),
(12, '2024-09-26', '08:58:24', 9, 2024, 1, 'Extra', 1, '2024-09-26 08:58:24', NULL, NULL, 1, '2024-09-26 09:02:26', '2024-09-26 07:02:26'),
(13, '2024-09-26', '08:59:21', 9, 2024, 1, 'Extra', 1, '2024-09-26 08:59:21', NULL, NULL, NULL, NULL, '2024-09-26 06:59:21');

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
  `jumlah_stok` int(11) NOT NULL,
  `satuan_stok` int(11) NOT NULL,
  `kadaluarsa` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk_item`
--

INSERT INTO `barang_masuk_item` (`id`, `barang_masuk`, `produk`, `jumlah`, `satuan`, `modal`, `jumlah_stok`, `satuan_stok`, `kadaluarsa`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 1, 7, 1, 3, 255000, 120, 1, '2024-12-31', 1, '2024-09-05 08:26:20', NULL, NULL, 1, '2024-09-05 09:20:44', '2024-09-05 07:20:44'),
(2, 1, 7, 1, 3, 250000, 120, 1, NULL, 1, '2024-09-05 09:21:11', NULL, NULL, 1, '2024-09-05 09:33:01', '2024-09-05 07:33:01'),
(3, 1, 8, 1, 3, 250000, 12, 1, NULL, 1, '2024-09-05 09:32:50', NULL, NULL, 1, '2024-09-05 09:33:01', '2024-09-05 07:33:01'),
(4, 2, 7, 1, 6, 18000, 10, 1, NULL, 1, '2024-09-05 09:33:36', NULL, NULL, 1, '2024-09-05 09:35:39', '2024-09-05 07:35:39'),
(5, 3, 7, 2, 6, 36000, 40, 1, NULL, 1, '2024-09-05 09:35:25', 1, '2024-09-06 04:51:37', 1, '2024-09-06 04:52:19', '2024-09-06 02:52:20'),
(6, 3, 7, 1, 3, 250000, 120, 1, '0000-00-00', 1, '2024-09-06 04:52:10', 1, '2024-09-06 06:07:31', 1, '2024-09-10 03:05:41', '2024-09-10 01:05:41'),
(7, 3, 2, 50, 2, 480000, 50, 2, '2024-09-06', 1, '2024-09-06 05:35:17', 1, '2024-09-06 09:26:27', 1, '2024-09-10 03:05:41', '2024-09-10 01:05:41'),
(8, 3, 4, 1, 4, 250000, 20, 2, '0000-00-00', 1, '2024-09-06 06:03:25', 1, '2024-09-06 09:25:58', 1, '2024-09-10 03:05:41', '2024-09-10 01:05:41'),
(9, 3, 5, 1, 3, 300000, 10, 1, NULL, 1, '2024-09-06 06:39:03', NULL, NULL, 1, '2024-09-10 03:05:41', '2024-09-10 01:05:41'),
(10, 4, 7, 1, 3, 300000, 120, 1, NULL, 1, '2024-09-10 03:30:41', NULL, NULL, 1, '2024-09-10 03:38:24', '2024-09-10 01:38:24'),
(11, 5, 7, 1, 3, 280000, 120, 1, NULL, 1, '2024-09-10 03:38:08', NULL, NULL, NULL, NULL, '2024-09-10 01:38:08'),
(12, 6, 10, 1, 3, 300000, 10, 1, NULL, 1, '2024-09-13 04:32:26', NULL, NULL, NULL, NULL, '2024-09-13 02:32:26'),
(13, 9, 11, 1, 3, 113250, 40, 1, '2024-09-24', 1, '2024-09-24 05:38:33', NULL, NULL, NULL, NULL, '2024-09-24 03:38:33'),
(14, 9, 7, 1, 3, 199000, 120, 1, '2024-10-01', 1, '2024-09-24 06:08:58', 1, '2024-09-24 06:09:49', NULL, NULL, '2024-09-24 04:09:49'),
(15, 11, 13, 1, 3, 7500, 6, 1, NULL, 1, '2024-09-26 08:47:10', NULL, NULL, NULL, NULL, '2024-09-26 06:47:10'),
(16, 11, 14, 1, 3, 119500, 24, 1, NULL, 1, '2024-09-26 08:48:02', NULL, NULL, NULL, NULL, '2024-09-26 06:48:02'),
(17, 13, 15, 999, 1, 0, 999, 1, NULL, 1, '2024-09-26 09:03:06', NULL, NULL, NULL, NULL, '2024-09-26 07:03:06');

--
-- Triggers `barang_masuk_item`
--
DELIMITER $$
CREATE TRIGGER `delete_stok_masuk` BEFORE UPDATE ON `barang_masuk_item` FOR EACH ROW UPDATE stok
SET stok_masuk = stok_masuk - new.jumlah_stok
WHERE produk = new.produk AND bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND new.delete_by IS NOT NULL
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stok_masuk` AFTER INSERT ON `barang_masuk_item` FOR EACH ROW UPDATE stok
SET stok_masuk = stok_masuk + new.jumlah_stok, satuan = new.satuan_stok
WHERE bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND produk = new.produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` AFTER UPDATE ON `barang_masuk_item` FOR EACH ROW UPDATE stok
SET stok_masuk = stok_masuk - old.jumlah_stok + new.jumlah_stok
WHERE produk = old.produk AND bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND new.delete_by IS NULL
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_flow`
--

CREATE TABLE `cash_flow` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tipe` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `nominal` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cash_flow`
--

INSERT INTO `cash_flow` (`id`, `tanggal`, `jam`, `tipe`, `deskripsi`, `nominal`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, '2024-09-01', '09:41:17', 1, 'Saldo awal September', 1000000, 1, '2024-09-17 10:55:27', 1, '2024-09-26 00:00:00', NULL, NULL, '2024-09-26 07:41:17'),
(2, '2024-09-17', '10:56:13', 2, 'Uang receh untuk kembalian', 100000, 1, '2024-09-17 10:56:13', NULL, NULL, NULL, NULL, '2024-09-17 09:25:40'),
(3, '2024-09-17', '04:41:24', 3, 'Belanja lauk', 30000, 1, '2024-09-17 10:57:22', 1, '2024-09-18 00:00:00', NULL, NULL, '2024-09-18 02:41:24'),
(4, '2024-09-17', '10:56:10', 2, 'Penambahan receh', 62000, 1, '2024-09-17 05:00:00', NULL, NULL, NULL, NULL, '2024-09-20 07:28:29'),
(5, '2024-09-18', '03:02:18', 3, 'Belanja sayur', 45000, 1, '2024-09-18 00:00:00', NULL, NULL, NULL, NULL, '2024-09-18 01:02:18'),
(6, '2024-09-18', '03:04:58', 3, 'Iuran RT', 55000, 1, '2024-09-18 00:00:00', NULL, NULL, NULL, NULL, '2024-09-18 01:04:58'),
(7, '2023-09-01', '10:54:27', 1, 'Saldo awal September', 900000, 1, '2024-09-17 10:55:27', NULL, NULL, NULL, NULL, '2024-09-17 03:58:16'),
(8, '2023-09-18', '03:04:58', 3, 'Iuran RT', 40000, 1, '2024-09-18 00:00:00', NULL, NULL, NULL, NULL, '2024-09-18 01:04:58'),
(9, '2024-09-18', '04:50:33', 2, 'Tambahan', 80000, 1, '2024-09-18 00:00:00', NULL, NULL, NULL, NULL, '2024-09-18 02:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_harga`
--

CREATE TABLE `daftar_harga` (
  `id` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_jual` float NOT NULL,
  `satuan` int(11) NOT NULL,
  `status_aktif` enum('aktif','non aktif') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_harga`
--

INSERT INTO `daftar_harga` (`id`, `produk`, `nama`, `harga_jual`, `jumlah_jual`, `satuan`, `status_aktif`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 7, 'KAPAL API MIX 1 PCS', 2000, 1, 1, 'aktif', 1, '2024-09-10 05:57:43', 1, '2024-09-10 06:02:37', NULL, NULL, '2024-09-10 04:02:37'),
(2, 7, 'KAPAL API MIX 1 RTG', 18000, 10, 1, 'aktif', 1, '2024-09-10 06:02:25', 1, '2024-09-24 06:11:07', NULL, NULL, '2024-09-24 04:11:07'),
(3, 7, 'KAPAL API MIX 3 PCS (PROMO)', 5000, 3, 1, 'aktif', 1, '2024-09-10 06:03:20', NULL, NULL, NULL, NULL, '2024-09-10 04:03:20'),
(4, 1, 'ROJO LELE 5KG', 68000, 5, 2, 'aktif', 1, '2024-09-10 06:08:46', NULL, NULL, NULL, NULL, '2024-09-10 04:08:46'),
(5, 8, 'SUNCO 2L', 32000, 1, 1, 'non aktif', 1, '2024-09-10 06:09:45', 1, '2024-09-12 09:12:23', NULL, NULL, '2024-09-12 07:12:23'),
(6, 8, 'SUNCO 2L', 29000, 1, 1, 'aktif', 1, '2024-09-12 09:12:23', NULL, NULL, NULL, NULL, '2024-09-12 07:12:23'),
(7, 10, 'PSM 1 KG', 32000, 1, 1, 'aktif', 1, '2024-09-13 04:33:05', NULL, NULL, NULL, NULL, '2024-09-13 02:33:05'),
(8, 4, 'TELUR AYAM 1/4', 8000, 0.25, 2, 'aktif', 1, '2024-09-13 11:23:28', NULL, NULL, NULL, NULL, '2024-09-13 09:23:28'),
(9, 4, 'TELUR AYAM 1/2 KG', 16000, 0.5, 2, 'aktif', 1, '2024-09-13 11:23:57', NULL, NULL, NULL, NULL, '2024-09-13 09:23:57'),
(10, 4, 'TELUR AYAM 1 KG', 32000, 1, 2, 'aktif', 1, '2024-09-13 11:24:12', NULL, NULL, NULL, NULL, '2024-09-13 09:24:12'),
(11, 2, 'SEGITIGA BIRU 1 KG', 25000, 1, 2, 'aktif', 1, '2024-09-13 11:24:32', NULL, NULL, NULL, NULL, '2024-09-13 09:24:32'),
(12, 11, 'INDOMIE GORENG 80GG 1 PCS', 3500, 1, 1, 'aktif', 1, '2024-09-24 06:12:05', NULL, NULL, NULL, NULL, '2024-09-24 04:12:05'),
(13, 12, 'TEA JUS GULA BATU 1PCS', 1000, 1, 1, 'aktif', 1, '2024-09-26 08:40:08', 1, '2024-09-26 09:23:18', NULL, NULL, '2024-09-26 07:23:18'),
(14, 14, 'ZODA BOTOL 250ML 1PCS', 6000, 1, 1, 'aktif', 1, '2024-09-26 08:40:36', 1, '2024-09-26 08:48:20', NULL, NULL, '2024-09-26 06:48:20'),
(15, 13, 'KUKU BIMA ANGGUR 1 PCS', 2000, 1, 1, 'aktif', 1, '2024-09-26 08:41:17', NULL, NULL, NULL, NULL, '2024-09-26 06:41:17'),
(16, 15, 'ES BATU PLASTIK (1000)', 1000, 1, 1, 'aktif', 1, '2024-09-26 09:06:29', NULL, NULL, NULL, NULL, '2024-09-26 07:06:29');

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
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 'BERAS', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(2, 'TEPUNG', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(3, 'GULA', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(4, 'TELUR', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(5, 'MINYAK', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(6, 'KECAP', 1, '2024-08-16 05:26:12', NULL, NULL, NULL, NULL, '2024-08-16 03:27:44'),
(7, 'KOPI', 1, '2024-08-21 05:35:06', NULL, NULL, NULL, NULL, '2024-08-21 05:50:17'),
(8, 'MIE INSTAN', 1, '2024-09-24 05:22:44', NULL, NULL, NULL, NULL, '2024-09-24 03:29:14'),
(9, 'MINUMAN SACHET', 1, '2024-09-26 08:37:01', NULL, NULL, NULL, NULL, '2024-09-26 06:37:01'),
(10, 'MINUMAN BOTOL', 1, '2024-09-26 08:37:11', NULL, NULL, NULL, NULL, '2024-09-26 06:37:11'),
(11, 'EXTRA', 1, '2024-09-26 08:57:41', 1, '2024-09-26 09:01:40', NULL, NULL, '2024-09-26 07:01:40');

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
(1, 'Jajanan Abdi', 'Diyashita', '081385863839', 'Perum Grand Mutiara ', 1, '2024-08-20 08:07:39', 1, '2024-08-20 09:21:39', NULL, NULL, '2024-08-20 07:39:32'),
(2, 'Toko Achong', 'Hendi', '082240227865', 'Perum Griya Blok A-12', 1, '2024-08-23 06:28:42', NULL, NULL, NULL, NULL, '2024-08-23 04:28:42'),
(3, 'Indogrosir', 'klikindogrosir.com', '08115500280', 'Jalan baru', 1, '2024-09-24 04:02:05', NULL, NULL, NULL, NULL, '2024-09-24 02:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nomor_penjualan` varchar(20) NOT NULL,
  `diskon` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `jam`, `bulan`, `tahun`, `nomor`, `nomor_penjualan`, `diskon`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, '2024-09-10', '07:42:33', 9, 2024, 1, '2024/IX/0001', 2000, 1, '2024-09-10 07:42:33', 1, '2024-09-12 08:58:27', 1, '2024-09-12 09:04:58', '2024-09-12 07:04:58'),
(2, '2024-09-12', '09:14:50', 9, 2024, 2, '2024/IX/0002', 0, 1, '2024-09-12 09:14:50', NULL, NULL, NULL, NULL, '2024-09-12 07:14:50'),
(3, '2024-09-13', '04:32:34', 9, 2024, 3, '2024/IX/0003', 0, 1, '2024-09-13 04:32:34', NULL, NULL, NULL, NULL, '2024-09-13 02:32:34'),
(4, '2024-09-13', '04:33:23', 9, 2024, 4, '2024/IX/0004', 0, 1, '2024-09-13 04:33:23', NULL, NULL, NULL, NULL, '2024-09-13 02:33:23'),
(5, '2024-09-13', '05:19:17', 9, 2024, 5, '2024/IX/0005', 0, 1, '2024-09-13 05:19:17', NULL, NULL, NULL, NULL, '2024-09-13 03:19:17'),
(6, '2024-09-13', '11:22:49', 9, 2024, 6, '2024/IX/0006', 0, 1, '2024-09-13 11:22:49', NULL, NULL, NULL, NULL, '2024-09-13 09:22:49'),
(7, '2024-09-18', '04:51:08', 9, 2024, 7, '2024/IX/0007', 0, 1, '2024-09-18 04:51:08', NULL, NULL, NULL, NULL, '2024-09-18 02:51:08'),
(8, '2024-09-18', '08:13:21', 9, 2024, 8, '2024/IX/0008', 0, 1, '2024-09-19 08:13:21', NULL, NULL, NULL, NULL, '2024-09-18 06:26:00'),
(9, '2024-09-26', '03:33:51', 9, 2024, 9, '2024/IX/0009', 0, 1, '2024-09-26 03:33:51', NULL, NULL, NULL, NULL, '2024-09-26 01:33:51'),
(10, '2024-09-26', '08:33:15', 9, 2024, 10, '2024/IX/0010', 0, 1, '2024-09-26 08:33:15', NULL, NULL, NULL, NULL, '2024-09-26 06:33:15'),
(11, '2024-09-26', '08:36:09', 9, 2024, 11, '2024/IX/0011', 0, 1, '2024-09-26 08:36:09', NULL, NULL, NULL, NULL, '2024-09-26 06:36:09'),
(12, '2024-09-26', '08:45:20', 9, 2024, 12, '2024/IX/0012', 0, 1, '2024-09-26 08:45:20', NULL, NULL, NULL, NULL, '2024-09-26 06:45:20'),
(13, '2024-09-26', '08:48:24', 9, 2024, 13, '2024/IX/0013', 0, 1, '2024-09-26 08:48:24', NULL, NULL, NULL, NULL, '2024-09-26 06:48:24'),
(14, '2024-09-26', '09:06:34', 9, 2024, 14, '2024/IX/0014', 0, 1, '2024-09-26 09:06:34', NULL, NULL, NULL, NULL, '2024-09-26 07:06:34'),
(15, '2024-09-26', '09:09:40', 9, 2024, 15, '2024/IX/0015', 0, 1, '2024-09-26 09:09:40', NULL, NULL, NULL, NULL, '2024-09-26 07:09:40'),
(16, '2024-09-26', '09:22:38', 9, 2024, 16, '2024/IX/0016', 0, 1, '2024-09-26 09:22:38', NULL, NULL, NULL, NULL, '2024-09-26 07:22:38'),
(17, '2024-09-26', '09:23:27', 9, 2024, 17, '2024/IX/0017', 0, 1, '2024-09-26 09:23:27', NULL, NULL, NULL, NULL, '2024-09-26 07:23:27'),
(18, '2024-09-26', '09:24:01', 9, 2024, 18, '2024/IX/0018', 0, 1, '2024-09-26 09:24:01', NULL, NULL, NULL, NULL, '2024-09-26 07:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_item`
--

CREATE TABLE `penjualan_item` (
  `id` int(11) NOT NULL,
  `penjualan` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `daftar_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan_item`
--

INSERT INTO `penjualan_item` (`id`, `penjualan`, `produk`, `daftar_harga`, `jumlah`, `jumlah_jual`, `harga`, `total`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(3, 1, 7, 2, 1, 10, 18000, 18000, 1, '2024-09-12 07:59:04', 1, '2024-09-12 08:51:37', 1, '2024-09-12 09:04:58', '2024-09-12 07:04:58'),
(4, 1, 7, 3, 2, 6, 5000, 10000, 1, '2024-09-12 07:59:34', NULL, NULL, 1, '2024-09-12 09:04:58', '2024-09-12 07:04:58'),
(5, 1, 8, 5, 5, 5, 32000, 160000, 1, '2024-09-12 07:59:51', 1, '2024-09-12 08:21:45', 1, '2024-09-12 09:04:58', '2024-09-12 07:04:58'),
(7, 1, 7, 1, 10, 10, 2000, 20000, 1, '2024-09-12 08:58:12', 1, '2024-09-12 08:58:21', 1, '2024-09-12 09:04:58', '2024-09-12 07:04:58'),
(8, 2, 8, 6, 1, 1, 29000, 29000, 1, '2024-09-12 09:14:55', NULL, NULL, NULL, NULL, '2024-09-12 07:14:55'),
(9, 4, 10, 7, 1, 1, 32000, 32000, 1, '2024-09-13 04:33:29', NULL, NULL, NULL, NULL, '2024-09-13 02:33:29'),
(10, 4, 7, 3, 3, 9, 5000, 15000, 1, '2024-09-13 06:18:08', 1, '2024-09-26 09:24:29', NULL, NULL, '2024-09-26 07:24:29'),
(11, 7, 7, 1, 2, 2, 2000, 4000, 1, '2024-09-18 04:51:17', NULL, NULL, NULL, NULL, '2024-09-18 02:51:17'),
(12, 7, 4, 8, 1, 0, 8000, 8000, 1, '2024-09-18 04:51:23', NULL, NULL, NULL, NULL, '2024-09-18 02:51:23'),
(13, 8, 2, 11, 2, 2, 25000, 50000, 1, '2024-09-18 08:13:29', 1, '2024-09-26 08:33:31', NULL, NULL, '2024-09-26 06:33:31'),
(14, 9, 11, 12, 2, 2, 3500, 7000, 1, '2024-09-26 03:33:59', NULL, NULL, NULL, NULL, '2024-09-26 01:33:59'),
(15, 10, 4, 10, 1, 1, 32000, 32000, 1, '2024-09-26 08:33:20', NULL, NULL, NULL, NULL, '2024-09-26 06:33:20'),
(16, 13, 14, 14, 1, 1, 6000, 6000, 1, '2024-09-26 08:48:30', NULL, NULL, NULL, NULL, '2024-09-26 06:48:30'),
(17, 13, 13, 15, 1, 1, 2000, 2000, 1, '2024-09-26 08:48:34', NULL, NULL, NULL, NULL, '2024-09-26 06:48:34'),
(18, 14, 12, 13, 3, 3, 1000, 3000, 1, '2024-09-26 09:06:38', 1, '2024-09-26 09:23:30', NULL, NULL, '2024-09-26 07:23:30'),
(19, 14, 15, 16, 3, 3, 1000, 3000, 1, '2024-09-26 09:06:40', 1, '2024-09-26 09:23:33', NULL, NULL, '2024-09-26 07:23:33'),
(20, 18, 12, 13, 1, 1, 1000, 1000, 1, '2024-09-26 09:27:39', NULL, NULL, NULL, NULL, '2024-09-26 07:27:39'),
(21, 18, 15, 16, 1, 1, 1000, 1000, 1, '2024-09-26 09:27:45', NULL, NULL, NULL, NULL, '2024-09-26 07:27:45');

--
-- Triggers `penjualan_item`
--
DELIMITER $$
CREATE TRIGGER `delete_stok_keluar` BEFORE UPDATE ON `penjualan_item` FOR EACH ROW UPDATE stok
SET stok_keluar = stok_keluar - new.jumlah_jual
WHERE produk = new.produk AND bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND new.delete_by IS NOT NULL
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stok_keluar` AFTER INSERT ON `penjualan_item` FOR EACH ROW UPDATE stok
SET stok_keluar = stok_keluar + new.jumlah_jual
WHERE bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND produk = new.produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` AFTER UPDATE ON `penjualan_item` FOR EACH ROW UPDATE stok
SET stok_keluar = stok_keluar - old.jumlah_jual + new.jumlah_jual
WHERE bulan = MONTH(NOW()) AND tahun = YEAR(NOW()) AND produk = new.produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_produk` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `satuan` int(11) NOT NULL,
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

INSERT INTO `produk` (`id`, `kategori_produk`, `barcode`, `nama`, `satuan`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 1, '', 'ROJOLELE SUPER', 2, 1, '2024-09-04 03:08:45', 1, '2024-09-04 04:47:51', NULL, NULL, '2024-09-04 02:47:51'),
(2, 2, '', 'SEGITIGA BIRU', 2, 1, '2024-09-04 03:09:31', 1, '2024-09-04 04:49:03', NULL, NULL, '2024-09-04 02:49:03'),
(3, 3, '', 'PSM', 1, 1, '2024-09-04 03:09:42', 1, '2024-09-04 04:48:51', NULL, NULL, '2024-09-04 02:48:51'),
(4, 4, '', 'TELUR AYAM', 2, 1, '2024-09-04 03:09:53', 1, '2024-09-04 04:49:12', NULL, NULL, '2024-09-04 02:49:12'),
(5, 5, '', 'SUNCO 1L', 1, 1, '2024-09-04 03:10:03', 1, '2024-09-04 04:49:43', NULL, NULL, '2024-09-04 02:49:43'),
(6, 6, '', 'BANGO 500ML', 1, 1, '2024-09-04 03:15:50', 1, '2024-09-04 04:02:48', NULL, NULL, '2024-09-04 02:02:48'),
(7, 7, '', 'KAPAL API MIX 40GR', 1, 1, '2024-09-04 03:58:08', NULL, NULL, NULL, NULL, '2024-09-04 01:58:08'),
(8, 5, '', 'SUNCO 2L', 1, 1, '2024-09-04 04:49:53', NULL, NULL, NULL, NULL, '2024-09-04 02:49:53'),
(9, 3, '', 'GULAKU 1KG PREMIUM', 1, 1, '2024-09-05 05:47:42', 1, '2024-09-13 04:30:02', NULL, NULL, '2024-09-13 02:30:02'),
(10, 3, '', 'PSM 1 KG', 1, 1, '2024-09-13 04:30:17', NULL, NULL, NULL, NULL, '2024-09-13 02:30:17'),
(11, 8, '', 'INDOMIE GORENG 80GG', 1, 1, '2024-09-24 05:30:49', NULL, NULL, NULL, NULL, '2024-09-24 03:30:49'),
(12, 9, '', 'TEA JUS GULA BATU', 1, 1, '2024-09-26 08:38:02', 1, '2024-09-26 09:22:23', NULL, NULL, '2024-09-26 07:22:23'),
(13, 9, '', 'KUKU BIMA ANGGUR', 1, 1, '2024-09-26 08:38:33', NULL, NULL, NULL, NULL, '2024-09-26 06:38:33'),
(14, 10, '', 'ZODA BOTOL 250ML', 1, 1, '2024-09-26 08:39:21', NULL, NULL, NULL, NULL, '2024-09-26 06:39:21'),
(15, 11, '', 'ES BATU PLASTIK', 1, 1, '2024-09-26 08:58:08', 1, '2024-09-26 09:05:43', NULL, NULL, '2024-09-26 07:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
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
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 'PCS', 1, '2024-09-04 03:37:46', NULL, NULL, NULL, NULL, '2024-09-04 01:37:46'),
(2, 'KG', 1, '2024-09-04 03:37:51', NULL, NULL, NULL, NULL, '2024-09-04 01:37:51'),
(3, 'KARTON', 1, '2024-09-04 03:37:57', NULL, NULL, NULL, NULL, '2024-09-05 05:57:29'),
(4, 'SAK', 1, '2024-09-04 03:38:02', NULL, NULL, NULL, NULL, '2024-09-04 01:38:02'),
(5, 'LITER', 1, '2024-09-04 03:38:09', NULL, NULL, NULL, NULL, '2024-09-04 01:38:09'),
(6, 'RENTENG', 1, '2024-09-05 02:54:04', NULL, NULL, NULL, NULL, '2024-09-05 00:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `stok_awal` float NOT NULL,
  `stok_masuk` float NOT NULL,
  `stok_keluar` float NOT NULL,
  `stok_opname` float NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `bulan`, `tahun`, `produk`, `satuan`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_opname`, `log`) VALUES
(1, 8, 2024, 1, 2, 2, 1, 0, 0, '2024-09-05 04:40:36'),
(2, 8, 2024, 2, 2, 2, 1, 0, 0, '2024-09-05 04:40:38'),
(3, 8, 2024, 3, 1, 2, 1, 0, 0, '2024-09-05 04:40:39'),
(4, 8, 2024, 4, 2, 2, 1, 0, 0, '2024-09-05 04:40:41'),
(5, 8, 2024, 5, 1, 2, 1, 0, 0, '2024-09-05 04:40:42'),
(6, 8, 2024, 6, 1, 2, 1, 0, 0, '2024-09-05 04:40:43'),
(7, 8, 2024, 7, 1, 2, 1, 0, 0, '2024-09-05 04:40:44'),
(8, 8, 2024, 8, 1, 2, 1, 0, 0, '2024-09-05 04:40:45'),
(9, 8, 2024, 9, 1, 2, 1, 0, 0, '2024-09-05 04:40:46'),
(28, 9, 2024, 1, 2, 3, 20, 15, 0, '2024-09-12 06:13:23'),
(29, 9, 2024, 2, 2, 3, 0, 2, 0, '2024-09-26 06:33:31'),
(30, 9, 2024, 3, 1, 3, 0, 0, 0, '2024-09-05 06:03:20'),
(31, 9, 2024, 4, 2, 3, 0, 1, 0, '2024-09-26 06:33:20'),
(32, 9, 2024, 5, 1, 3, 0, 0, -1, '2024-09-20 06:14:12'),
(33, 9, 2024, 6, 1, 3, 0, 0, 0, '2024-09-05 06:03:20'),
(34, 9, 2024, 7, 1, 3, 240, 92, -12, '2024-09-26 07:24:29'),
(35, 9, 2024, 8, 1, 3, 24, 0, 0, '2024-09-12 07:14:55'),
(36, 9, 2024, 9, 1, 3, 0, 0, -1, '2024-09-13 06:57:09'),
(37, 9, 2024, 10, 1, 0, 10, 1, 0, '2024-09-13 02:33:29'),
(38, 9, 2024, 11, 1, 0, 40, 2, 0, '2024-09-26 01:33:59'),
(39, 9, 2024, 12, 1, 0, 0, 4, 0, '2024-09-26 07:27:39'),
(40, 9, 2024, 13, 1, 0, 6, 1, 0, '2024-09-26 06:48:34'),
(41, 9, 2024, 14, 1, 0, 24, 1, 0, '2024-09-26 06:48:30'),
(42, 9, 2024, 15, 1, 0, 999, 4, 0, '2024-09-26 07:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah` float NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_opname`
--

INSERT INTO `stok_opname` (`id`, `stok`, `jumlah`, `keterangan`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 34, -12, '1 renteng hilang, 2 item bocor', 1, '2024-09-13 08:31:22', 1, '2024-09-13 08:56:04', NULL, NULL, '2024-09-13 06:56:04'),
(2, 36, -1, 'lupa input', 1, '2024-09-13 08:57:09', NULL, NULL, NULL, NULL, '2024-09-13 06:57:09'),
(3, 30, 0, 'sto', 1, '2024-09-13 08:58:10', NULL, NULL, NULL, NULL, '2024-09-13 06:58:10'),
(4, 32, -1, '1 bolong', 1, '2024-09-20 08:14:12', NULL, NULL, NULL, NULL, '2024-09-20 06:14:12');

--
-- Triggers `stok_opname`
--
DELIMITER $$
CREATE TRIGGER `insert_stok_opname` AFTER INSERT ON `stok_opname` FOR EACH ROW UPDATE stok
SET stok_opname = new.jumlah
WHERE id = new.stok
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_opname` AFTER UPDATE ON `stok_opname` FOR EACH ROW UPDATE stok
SET stok_opname = new.jumlah
WHERE id = new.stok
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_cash_flow`
--

CREATE TABLE `tipe_cash_flow` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_cash_flow`
--

INSERT INTO `tipe_cash_flow` (`id`, `nama`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, 'Saldo Awal', 1, '2024-09-17 08:22:43', 1, '2024-09-17 08:30:30', NULL, NULL, '2024-09-17 06:31:14'),
(2, 'Kas masuk', 1, '2024-09-17 08:33:58', NULL, NULL, NULL, NULL, '2024-09-17 06:33:58'),
(3, 'Kas Keluar', 1, '2024-09-17 08:34:05', NULL, NULL, NULL, NULL, '2024-09-17 06:34:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_masuk`
-- (See below for the actual view)
--
CREATE TABLE `view_barang_masuk` (
`id` int(11)
,`tanggal` date
,`jam` time
,`bulan` int(11)
,`tahun` int(11)
,`id_pemasok` int(11)
,`pemasok` varchar(255)
,`nomor_faktur` varchar(255)
,`jumlah_item` bigint(21)
,`modal` decimal(32,0)
,`delete_by` int(11)
,`delete_at` datetime
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_masuk_item`
-- (See below for the actual view)
--
CREATE TABLE `view_barang_masuk_item` (
`id` int(11)
,`barang_masuk` int(11)
,`id_produk` int(11)
,`produk` varchar(255)
,`jumlah` int(11)
,`id_satuan` int(11)
,`satuan` varchar(255)
,`modal` int(11)
,`jumlah_stok` int(11)
,`id_satuan_stok` int(11)
,`satuan_stok` varchar(255)
,`kadaluarsa` date
,`delete_by` int(11)
,`delete_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cash_flow`
-- (See below for the actual view)
--
CREATE TABLE `view_cash_flow` (
`id` int(11)
,`id_tipe` int(11)
,`tipe` varchar(30)
,`tanggal` date
,`jam` time
,`deskripsi` text
,`nominal` float
,`delete_by` int(11)
,`delete_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_daftar_harga`
-- (See below for the actual view)
--
CREATE TABLE `view_daftar_harga` (
`id` int(11)
,`kategori_produk` varchar(255)
,`id_produk` int(11)
,`produk` varchar(255)
,`nama` varchar(255)
,`harga_jual` int(11)
,`jumlah_jual` float
,`id_satuan` int(11)
,`satuan` varchar(255)
,`status_aktif` enum('aktif','non aktif')
,`delete_by` int(11)
,`delete_at` datetime
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_data_barang_masuk`
-- (See below for the actual view)
--
CREATE TABLE `view_data_barang_masuk` (
`id` int(11)
,`bulan` int(11)
,`tahun` int(11)
,`tanggal` date
,`jam` time
,`nomor_faktur` varchar(255)
,`pemasok` varchar(255)
,`kategori_produk` varchar(255)
,`produk` varchar(255)
,`jumlah` int(11)
,`satuan` varchar(255)
,`modal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_data_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_data_penjualan` (
`bulan` int(11)
,`tahun` int(11)
,`tanggal` date
,`jam` time
,`nomor_penjualan` varchar(20)
,`kategori_produk` varchar(255)
,`produk` varchar(255)
,`nama_item` varchar(255)
,`harga` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_cash_flow`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan_cash_flow` (
`bulan` int(2)
,`tahun` int(4)
,`saldo` double
,`pemasukan` double
,`pengeluaran` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan_pembelian` (
`bulan` int(11)
,`tahun` int(11)
,`total_pembelian` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan_penjualan` (
`bulan` int(2)
,`tahun` int(4)
,`total_penjualan` decimal(32,0)
);

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
-- Stand-in structure for view `view_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_penjualan` (
`id` int(11)
,`tanggal` date
,`jam` time
,`bulan` int(11)
,`tahun` int(11)
,`nomor_penjualan` varchar(20)
,`jumlah_item` bigint(21)
,`total` decimal(32,0)
,`diskon` float
,`grand_total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penjualan_item`
-- (See below for the actual view)
--
CREATE TABLE `view_penjualan_item` (
`id` int(11)
,`id_penjualan` int(11)
,`daftar_harga` int(11)
,`id_produk` int(11)
,`produk` varchar(255)
,`jumlah` int(11)
,`jumlah_jual_stok` float
,`jumlah_jual` int(11)
,`harga` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penjualan_terbanyak`
-- (See below for the actual view)
--
CREATE TABLE `view_penjualan_terbanyak` (
`bulan` int(2)
,`tahun` int(4)
,`id_produk` int(11)
,`produk` varchar(255)
,`jumlah_jual` decimal(32,0)
,`total` decimal(32,0)
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
,`produk` varchar(255)
,`id_satuan` int(11)
,`satuan` varchar(255)
,`detail_produk` varchar(511)
,`created_by` varchar(255)
,`created_at` datetime
,`delete_by` int(11)
,`delete_at` datetime
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok`
-- (See below for the actual view)
--
CREATE TABLE `view_stok` (
`id` int(11)
,`id_produk` int(11)
,`bulan` int(11)
,`tahun` int(11)
,`kategori_produk` varchar(255)
,`produk` varchar(255)
,`id_satuan` int(11)
,`satuan` varchar(255)
,`stok_awal` float
,`stok_masuk` float
,`stok_keluar` float
,`stok_opname` float
,`stok_balance` double
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_opname`
-- (See below for the actual view)
--
CREATE TABLE `view_stok_opname` (
`id` int(11)
,`kategori_produk` varchar(255)
,`produk` varchar(255)
,`bulan` int(11)
,`tahun` int(11)
,`satuan` varchar(255)
,`balance_not_opname` double
,`stok_opname` float
,`jumlah` float
,`keterangan` text
,`balance` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_terakhir`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_terakhir` (
`tanggal` date
,`jam` time
,`nama_item` varchar(255)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_barang_masuk`
--
DROP TABLE IF EXISTS `view_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_masuk`  AS SELECT `barang_masuk`.`id` AS `id`, `barang_masuk`.`tanggal` AS `tanggal`, `barang_masuk`.`jam` AS `jam`, `barang_masuk`.`bulan` AS `bulan`, `barang_masuk`.`tahun` AS `tahun`, `barang_masuk`.`pemasok` AS `id_pemasok`, `pemasok`.`nama` AS `pemasok`, `barang_masuk`.`nomor_faktur` AS `nomor_faktur`, count(`barang_masuk_item`.`id`) AS `jumlah_item`, sum(`barang_masuk_item`.`modal`) AS `modal`, `barang_masuk`.`delete_by` AS `delete_by`, `barang_masuk`.`delete_at` AS `delete_at`, `barang_masuk`.`log` AS `log` FROM ((`barang_masuk` join `pemasok` on(`pemasok`.`id` = `barang_masuk`.`pemasok`)) left join `barang_masuk_item` on(`barang_masuk_item`.`barang_masuk` = `barang_masuk`.`id`)) WHERE `barang_masuk`.`delete_by` is null AND `barang_masuk_item`.`delete_by` is null GROUP BY `barang_masuk`.`id` ORDER BY `barang_masuk`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_barang_masuk_item`
--
DROP TABLE IF EXISTS `view_barang_masuk_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_masuk_item`  AS SELECT `barang_masuk_item`.`id` AS `id`, `barang_masuk_item`.`barang_masuk` AS `barang_masuk`, `barang_masuk_item`.`produk` AS `id_produk`, `produk`.`nama` AS `produk`, `barang_masuk_item`.`jumlah` AS `jumlah`, `barang_masuk_item`.`satuan` AS `id_satuan`, `satuan1`.`nama` AS `satuan`, `barang_masuk_item`.`modal` AS `modal`, `barang_masuk_item`.`jumlah_stok` AS `jumlah_stok`, `barang_masuk_item`.`satuan_stok` AS `id_satuan_stok`, `satuan2`.`nama` AS `satuan_stok`, `barang_masuk_item`.`kadaluarsa` AS `kadaluarsa`, `barang_masuk_item`.`delete_by` AS `delete_by`, `barang_masuk_item`.`delete_at` AS `delete_at` FROM (((`barang_masuk_item` join `produk` on(`produk`.`id` = `barang_masuk_item`.`produk`)) join `satuan` `satuan1` on(`satuan1`.`id` = `barang_masuk_item`.`satuan`)) join `satuan` `satuan2` on(`satuan2`.`id` = `barang_masuk_item`.`satuan_stok`)) ORDER BY `barang_masuk_item`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_cash_flow`
--
DROP TABLE IF EXISTS `view_cash_flow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cash_flow`  AS SELECT `cash_flow`.`id` AS `id`, `cash_flow`.`tipe` AS `id_tipe`, `tipe_cash_flow`.`nama` AS `tipe`, `cash_flow`.`tanggal` AS `tanggal`, `cash_flow`.`jam` AS `jam`, `cash_flow`.`deskripsi` AS `deskripsi`, `cash_flow`.`nominal` AS `nominal`, `cash_flow`.`delete_by` AS `delete_by`, `cash_flow`.`delete_at` AS `delete_at` FROM (`cash_flow` join `tipe_cash_flow` on(`tipe_cash_flow`.`id` = `cash_flow`.`tipe`)) ORDER BY `cash_flow`.`tanggal` ASC, `cash_flow`.`jam` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_daftar_harga`
--
DROP TABLE IF EXISTS `view_daftar_harga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daftar_harga`  AS SELECT `daftar_harga`.`id` AS `id`, `kategori_produk`.`nama` AS `kategori_produk`, `daftar_harga`.`produk` AS `id_produk`, `produk`.`nama` AS `produk`, `daftar_harga`.`nama` AS `nama`, `daftar_harga`.`harga_jual` AS `harga_jual`, `daftar_harga`.`jumlah_jual` AS `jumlah_jual`, `daftar_harga`.`satuan` AS `id_satuan`, `satuan`.`nama` AS `satuan`, `daftar_harga`.`status_aktif` AS `status_aktif`, `daftar_harga`.`delete_by` AS `delete_by`, `daftar_harga`.`delete_at` AS `delete_at`, `daftar_harga`.`log` AS `log` FROM (((`daftar_harga` join `produk` on(`produk`.`id` = `daftar_harga`.`produk`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `satuan` on(`satuan`.`id` = `daftar_harga`.`satuan`)) WHERE `daftar_harga`.`status_aktif` = 'aktif' AND `daftar_harga`.`delete_by` is null ORDER BY `daftar_harga`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_data_barang_masuk`
--
DROP TABLE IF EXISTS `view_data_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_barang_masuk`  AS SELECT `barang_masuk_item`.`id` AS `id`, `barang_masuk`.`bulan` AS `bulan`, `barang_masuk`.`tahun` AS `tahun`, `barang_masuk`.`tanggal` AS `tanggal`, `barang_masuk`.`jam` AS `jam`, `barang_masuk`.`nomor_faktur` AS `nomor_faktur`, `pemasok`.`nama` AS `pemasok`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`nama` AS `produk`, `barang_masuk_item`.`jumlah` AS `jumlah`, `satuan`.`nama` AS `satuan`, `barang_masuk_item`.`modal` AS `modal` FROM (((((`barang_masuk_item` join `barang_masuk` on(`barang_masuk`.`id` = `barang_masuk_item`.`barang_masuk`)) join `pemasok` on(`pemasok`.`id` = `barang_masuk`.`pemasok`)) join `produk` on(`produk`.`id` = `barang_masuk_item`.`produk`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `satuan` on(`satuan`.`id` = `barang_masuk_item`.`satuan`)) WHERE `barang_masuk`.`delete_by` is null AND `barang_masuk_item`.`delete_by` is null ORDER BY `barang_masuk`.`tanggal` ASC, `barang_masuk`.`jam` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_data_penjualan`
--
DROP TABLE IF EXISTS `view_data_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan`  AS SELECT `penjualan`.`bulan` AS `bulan`, `penjualan`.`tahun` AS `tahun`, `penjualan`.`tanggal` AS `tanggal`, `penjualan`.`jam` AS `jam`, `penjualan`.`nomor_penjualan` AS `nomor_penjualan`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`nama` AS `produk`, `daftar_harga`.`nama` AS `nama_item`, `daftar_harga`.`harga_jual` AS `harga`, `penjualan_item`.`jumlah` AS `jumlah`, `penjualan_item`.`total` AS `total` FROM ((((`penjualan` join `penjualan_item` on(`penjualan_item`.`penjualan` = `penjualan`.`id`)) join `daftar_harga` on(`daftar_harga`.`id` = `penjualan_item`.`daftar_harga`)) join `produk` on(`produk`.`id` = `daftar_harga`.`produk`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) WHERE `penjualan`.`delete_by` is null AND `penjualan_item`.`delete_by` is null ORDER BY `penjualan`.`tanggal` ASC, `kategori_produk`.`nama` ASC, `daftar_harga`.`nama` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_cash_flow`
--
DROP TABLE IF EXISTS `view_laporan_cash_flow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_cash_flow`  AS SELECT month(`cash_flow`.`tanggal`) AS `bulan`, year(`cash_flow`.`tanggal`) AS `tahun`, sum(case when `cash_flow`.`tipe` = 1 then `cash_flow`.`nominal` else 0 end) AS `saldo`, sum(case when `cash_flow`.`tipe` = 2 then `cash_flow`.`nominal` else 0 end) AS `pemasukan`, sum(case when `cash_flow`.`tipe` = 3 then `cash_flow`.`nominal` else 0 end) AS `pengeluaran` FROM `cash_flow` WHERE `cash_flow`.`delete_by` is null GROUP BY year(`cash_flow`.`tanggal`), month(`cash_flow`.`tanggal`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_pembelian`
--
DROP TABLE IF EXISTS `view_laporan_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_pembelian`  AS SELECT `barang_masuk`.`bulan` AS `bulan`, `barang_masuk`.`tahun` AS `tahun`, sum(`barang_masuk_item`.`modal`) AS `total_pembelian` FROM (`barang_masuk_item` join `barang_masuk` on(`barang_masuk`.`id` = `barang_masuk_item`.`barang_masuk`)) GROUP BY `barang_masuk`.`tahun`, `barang_masuk`.`bulan` ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_penjualan`
--
DROP TABLE IF EXISTS `view_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_penjualan`  AS SELECT month(`penjualan`.`tanggal`) AS `bulan`, year(`penjualan`.`tanggal`) AS `tahun`, sum(`penjualan_item`.`total`) AS `total_penjualan` FROM (`penjualan_item` join `penjualan` on(`penjualan`.`id` = `penjualan_item`.`penjualan`)) WHERE `penjualan_item`.`delete_by` is null AND `penjualan`.`delete_by` is null GROUP BY year(`penjualan`.`tanggal`), month(`penjualan`.`tanggal`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pemasok`
--
DROP TABLE IF EXISTS `view_pemasok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemasok`  AS SELECT `pemasok`.`id` AS `id`, `pemasok`.`nama` AS `nama`, `pemasok`.`kontak` AS `kontak`, `pemasok`.`nomor_telepon` AS `nomor_telepon`, `pemasok`.`alamat` AS `alamat`, `akun`.`akun` AS `created_by`, `pemasok`.`created_at` AS `created_at`, `pemasok`.`delete_by` AS `delete_by`, `pemasok`.`delete_at` AS `delete_at`, `pemasok`.`log` AS `log` FROM (`pemasok` join `akun` on(`akun`.`id` = `pemasok`.`created_by`)) ORDER BY `pemasok`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_penjualan`
--
DROP TABLE IF EXISTS `view_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan`  AS SELECT `penjualan`.`id` AS `id`, `penjualan`.`tanggal` AS `tanggal`, `penjualan`.`jam` AS `jam`, `penjualan`.`bulan` AS `bulan`, `penjualan`.`tahun` AS `tahun`, `penjualan`.`nomor_penjualan` AS `nomor_penjualan`, count(distinct `penjualan_item`.`daftar_harga`) AS `jumlah_item`, sum(`penjualan_item`.`total`) AS `total`, `penjualan`.`diskon` AS `diskon`, sum(`penjualan_item`.`total`) - `penjualan`.`diskon` AS `grand_total` FROM (`penjualan` join `penjualan_item` on(`penjualan_item`.`penjualan` = `penjualan`.`id`)) WHERE `penjualan`.`delete_by` is null AND `penjualan_item`.`delete_by` is null GROUP BY `penjualan`.`id` ORDER BY `penjualan`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_penjualan_item`
--
DROP TABLE IF EXISTS `view_penjualan_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan_item`  AS SELECT `penjualan_item`.`id` AS `id`, `penjualan`.`id` AS `id_penjualan`, `penjualan_item`.`daftar_harga` AS `daftar_harga`, `penjualan_item`.`produk` AS `id_produk`, `daftar_harga`.`nama` AS `produk`, `penjualan_item`.`jumlah` AS `jumlah`, `daftar_harga`.`jumlah_jual` AS `jumlah_jual_stok`, `penjualan_item`.`jumlah_jual` AS `jumlah_jual`, `penjualan_item`.`harga` AS `harga`, `penjualan_item`.`total` AS `total` FROM ((`penjualan_item` join `penjualan` on(`penjualan`.`id` = `penjualan_item`.`penjualan`)) join `daftar_harga` on(`daftar_harga`.`id` = `penjualan_item`.`daftar_harga`)) WHERE `penjualan_item`.`delete_by` is null ORDER BY `penjualan_item`.`log` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_penjualan_terbanyak`
--
DROP TABLE IF EXISTS `view_penjualan_terbanyak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan_terbanyak`  AS SELECT month(`penjualan`.`tanggal`) AS `bulan`, year(`penjualan`.`tanggal`) AS `tahun`, `penjualan_item`.`produk` AS `id_produk`, `produk`.`nama` AS `produk`, sum(`penjualan_item`.`jumlah_jual`) AS `jumlah_jual`, sum(`penjualan_item`.`total`) AS `total` FROM ((`penjualan_item` join `penjualan` on(`penjualan`.`id` = `penjualan_item`.`penjualan`)) join `produk` on(`produk`.`id` = `penjualan_item`.`produk`)) WHERE `penjualan_item`.`delete_by` is null AND `penjualan_item`.`jumlah_jual` <> 0 GROUP BY `penjualan_item`.`produk` ORDER BY sum(`penjualan_item`.`jumlah_jual`) DESC LIMIT 0, 6 ;

-- --------------------------------------------------------

--
-- Structure for view `view_produk`
--
DROP TABLE IF EXISTS `view_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produk`  AS SELECT `produk`.`id` AS `id`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`barcode` AS `barcode`, `produk`.`nama` AS `produk`, `produk`.`satuan` AS `id_satuan`, `satuan`.`nama` AS `satuan`, concat(`kategori_produk`.`nama`,' ',`produk`.`nama`) AS `detail_produk`, `akun`.`akun` AS `created_by`, `produk`.`created_at` AS `created_at`, `produk`.`delete_by` AS `delete_by`, `produk`.`delete_at` AS `delete_at`, `produk`.`log` AS `log` FROM (((`produk` join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `akun` on(`akun`.`id` = `produk`.`created_by`)) join `satuan` on(`satuan`.`id` = `produk`.`satuan`)) ORDER BY `produk`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_stok`
--
DROP TABLE IF EXISTS `view_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok`  AS SELECT `stok`.`id` AS `id`, `stok`.`produk` AS `id_produk`, `stok`.`bulan` AS `bulan`, `stok`.`tahun` AS `tahun`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`nama` AS `produk`, `stok`.`satuan` AS `id_satuan`, `satuan`.`nama` AS `satuan`, `stok`.`stok_awal` AS `stok_awal`, `stok`.`stok_masuk` AS `stok_masuk`, `stok`.`stok_keluar` AS `stok_keluar`, `stok`.`stok_opname` AS `stok_opname`, `stok`.`stok_awal`+ `stok`.`stok_masuk` - `stok`.`stok_keluar` + `stok`.`stok_opname` AS `stok_balance`, `stok`.`log` AS `log` FROM (((`stok` join `produk` on(`produk`.`id` = `stok`.`produk`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `satuan` on(`satuan`.`id` = `stok`.`satuan`)) ORDER BY `stok`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_opname`
--
DROP TABLE IF EXISTS `view_stok_opname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_opname`  AS SELECT `stok`.`id` AS `id`, `kategori_produk`.`nama` AS `kategori_produk`, `produk`.`nama` AS `produk`, `stok`.`bulan` AS `bulan`, `stok`.`tahun` AS `tahun`, `satuan`.`nama` AS `satuan`, `stok`.`stok_awal`+ `stok`.`stok_masuk` - `stok`.`stok_keluar` AS `balance_not_opname`, `stok`.`stok_opname` AS `stok_opname`, `stok_opname`.`jumlah` AS `jumlah`, `stok_opname`.`keterangan` AS `keterangan`, `stok`.`stok_awal`+ `stok`.`stok_masuk` - `stok`.`stok_keluar` + `stok`.`stok_opname` AS `balance` FROM ((((`stok` join `produk` on(`stok`.`produk` = `produk`.`id`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) join `satuan` on(`satuan`.`id` = `stok`.`satuan`)) left join `stok_opname` on(`stok_opname`.`stok` = `stok`.`id`)) ORDER BY `stok`.`tahun` DESC, `stok`.`bulan` DESC, `kategori_produk`.`nama` ASC, `produk`.`nama` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_terakhir`
--
DROP TABLE IF EXISTS `view_transaksi_terakhir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_terakhir`  AS SELECT `penjualan`.`tanggal` AS `tanggal`, `penjualan`.`jam` AS `jam`, `daftar_harga`.`nama` AS `nama_item`, `penjualan_item`.`harga` AS `total` FROM ((((`penjualan` join `penjualan_item` on(`penjualan_item`.`penjualan` = `penjualan`.`id`)) join `daftar_harga` on(`daftar_harga`.`id` = `penjualan_item`.`daftar_harga`)) join `produk` on(`produk`.`id` = `daftar_harga`.`produk`)) join `kategori_produk` on(`kategori_produk`.`id` = `produk`.`kategori_produk`)) WHERE `penjualan`.`delete_by` is null AND `penjualan_item`.`delete_by` is null ORDER BY `penjualan`.`tanggal` DESC, `penjualan`.`jam` DESC LIMIT 0, 6 ;

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
  ADD KEY `produk` (`produk`),
  ADD KEY `satuan` (`satuan`),
  ADD KEY `satuan_stok` (`satuan_stok`);

--
-- Indexes for table `cash_flow`
--
ALTER TABLE `cash_flow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk` (`produk`),
  ADD KEY `satuan` (`satuan`);

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
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan` (`penjualan`),
  ADD KEY `produk` (`produk`),
  ADD KEY `daftar_harga` (`daftar_harga`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk` (`kategori_produk`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk` (`produk`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_cash_flow`
--
ALTER TABLE `tipe_cash_flow`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cash_flow`
--
ALTER TABLE `cash_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipe_cash_flow`
--
ALTER TABLE `tipe_cash_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `barang_masuk_item_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_item_ibfk_3` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id`),
  ADD CONSTRAINT `barang_masuk_item_ibfk_4` FOREIGN KEY (`satuan_stok`) REFERENCES `satuan` (`id`);

--
-- Constraints for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  ADD CONSTRAINT `daftar_harga_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_harga_ibfk_2` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  ADD CONSTRAINT `penjualan_item_ibfk_1` FOREIGN KEY (`penjualan`) REFERENCES `penjualan` (`id`),
  ADD CONSTRAINT `penjualan_item_ibfk_2` FOREIGN KEY (`daftar_harga`) REFERENCES `daftar_harga` (`id`),
  ADD CONSTRAINT `penjualan_item_ibfk_3` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`kategori_produk`) REFERENCES `kategori_produk` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
