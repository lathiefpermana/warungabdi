-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 11:29 AM
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

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `tanggal`, `pemasok`, `nomor_faktur`, `created_by`, `created_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, '2024-09-05', 2, '2024/IX/WA0001', 1, '2024-09-05 07:57:05', NULL, NULL, 1, '2024-09-05 09:33:01', '2024-09-05 07:33:01'),
(2, '2024-09-05', 2, '1', 1, '2024-09-05 09:33:18', NULL, NULL, 1, '2024-09-05 09:35:39', '2024-09-05 07:35:39'),
(3, '2024-09-05', 2, '2', 1, '2024-09-05 09:33:42', NULL, NULL, 1, '2024-09-10 03:05:41', '2024-09-10 01:05:41'),
(4, '2024-09-09', 2, '2024/09/0001', 1, '2024-09-10 03:06:02', NULL, NULL, 1, '2024-09-10 03:38:24', '2024-09-10 01:38:24'),
(5, '2024-09-09', 2, '2024/09/0002', 1, '2024-09-10 03:37:37', 1, '2024-09-10 03:42:19', NULL, NULL, '2024-09-10 01:42:19');

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
(11, 5, 7, 1, 3, 280000, 120, 1, NULL, 1, '2024-09-10 03:38:08', NULL, NULL, NULL, NULL, '2024-09-10 01:38:08');

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
(2, 7, 'KAPAL API MIX 1 RNTG', 18000, 10, 1, 'aktif', 1, '2024-09-10 06:02:25', NULL, NULL, NULL, NULL, '2024-09-10 04:02:25'),
(3, 7, 'KAPAL API MIX 3 PCS (PROMO)', 5000, 3, 1, 'aktif', 1, '2024-09-10 06:03:20', NULL, NULL, NULL, NULL, '2024-09-10 04:03:20'),
(4, 1, 'ROJO LELE 5KG', 68000, 5, 2, 'aktif', 1, '2024-09-10 06:08:46', NULL, NULL, NULL, NULL, '2024-09-10 04:08:46'),
(5, 8, 'SUNCO 2L', 32000, 1, 1, 'aktif', 1, '2024-09-10 06:09:45', NULL, NULL, NULL, NULL, '2024-09-10 04:09:45');

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
(6, 'KECAP', 1, '2024-08-16 05:26:12', NULL, NULL, '2024-08-16 03:27:44'),
(7, 'KOPI', 1, '2024-08-21 05:35:06', NULL, NULL, '2024-08-21 05:50:17');

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
(2, 'Toko Achong', 'Hendi', '082240227865', 'Perum Griya Blok A-12', 1, '2024-08-23 06:28:42', NULL, NULL, NULL, NULL, '2024-08-23 04:28:42');

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
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `jam`, `bulan`, `tahun`, `nomor`, `nomor_penjualan`, `created_by`, `created_at`, `delete_by`, `delete_at`, `log`) VALUES
(1, '2024-09-10', '07:42:33', 9, 2024, 1, '2024/IX/0001', 1, '2024-09-10 07:42:33', NULL, NULL, '2024-09-10 05:53:16');

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
(1, 1, 7, 2, 1, 10, 18000, 18000, 1, '2024-09-10 11:02:20', NULL, NULL, NULL, NULL, '2024-09-10 09:02:20');

--
-- Triggers `penjualan_item`
--
DELIMITER $$
CREATE TRIGGER `insert_stok_keluar` AFTER INSERT ON `penjualan_item` FOR EACH ROW UPDATE stok
SET stok_keluar = stok_keluar + new.jumlah_jual
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
(9, 3, '', 'GULAKU 1KG', 1, 1, '2024-09-05 05:47:42', NULL, NULL, NULL, NULL, '2024-09-05 03:47:42');

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
(28, 9, 2024, 1, 2, 3, 0, 0, 0, '2024-09-05 06:03:20'),
(29, 9, 2024, 2, 2, 3, 0, 0, 0, '2024-09-10 01:05:41'),
(30, 9, 2024, 3, 1, 3, 0, 0, 0, '2024-09-05 06:03:20'),
(31, 9, 2024, 4, 2, 3, 0, 0, 0, '2024-09-10 01:05:41'),
(32, 9, 2024, 5, 1, 3, 0, 0, 0, '2024-09-10 01:05:41'),
(33, 9, 2024, 6, 1, 3, 0, 0, 0, '2024-09-05 06:03:20'),
(34, 9, 2024, 7, 1, 3, 120, 10, 0, '2024-09-10 09:02:20'),
(35, 9, 2024, 8, 1, 3, 0, 0, 0, '2024-09-05 07:33:01'),
(36, 9, 2024, 9, 1, 3, 0, 0, 0, '2024-09-05 06:03:20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_masuk`
-- (See below for the actual view)
--
CREATE TABLE `view_barang_masuk` (
`id` int(11)
,`tanggal` date
,`id_pemasok` int(11)
,`pemasok` varchar(255)
,`nomor_faktur` varchar(255)
,`log` timestamp
,`delete_by` int(11)
,`delete_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_masuk_item`
-- (See below for the actual view)
--
CREATE TABLE `view_barang_masuk_item` (
`id` int(11)
,`barang_masuk` int(11)
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
-- Stand-in structure for view `view_daftar_harga`
-- (See below for the actual view)
--
CREATE TABLE `view_daftar_harga` (
`id` int(11)
,`nama` varchar(255)
,`id_produk` int(11)
,`produk` varchar(255)
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
`penjualan` int(11)
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
-- Structure for view `view_barang_masuk`
--
DROP TABLE IF EXISTS `view_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_masuk`  AS SELECT `barang_masuk`.`id` AS `id`, `barang_masuk`.`tanggal` AS `tanggal`, `barang_masuk`.`pemasok` AS `id_pemasok`, `pemasok`.`nama` AS `pemasok`, `barang_masuk`.`nomor_faktur` AS `nomor_faktur`, `barang_masuk`.`log` AS `log`, `barang_masuk`.`delete_by` AS `delete_by`, `barang_masuk`.`delete_at` AS `delete_at` FROM (`barang_masuk` join `pemasok` on(`pemasok`.`id` = `barang_masuk`.`pemasok`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_barang_masuk_item`
--
DROP TABLE IF EXISTS `view_barang_masuk_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_masuk_item`  AS SELECT `barang_masuk_item`.`id` AS `id`, `barang_masuk_item`.`barang_masuk` AS `barang_masuk`, `produk`.`nama` AS `produk`, `barang_masuk_item`.`jumlah` AS `jumlah`, `barang_masuk_item`.`satuan` AS `id_satuan`, `satuan1`.`nama` AS `satuan`, `barang_masuk_item`.`modal` AS `modal`, `barang_masuk_item`.`jumlah_stok` AS `jumlah_stok`, `barang_masuk_item`.`satuan_stok` AS `id_satuan_stok`, `satuan2`.`nama` AS `satuan_stok`, `barang_masuk_item`.`kadaluarsa` AS `kadaluarsa`, `barang_masuk_item`.`delete_by` AS `delete_by`, `barang_masuk_item`.`delete_at` AS `delete_at` FROM (((`barang_masuk_item` join `produk` on(`produk`.`id` = `barang_masuk_item`.`produk`)) join `satuan` `satuan1` on(`satuan1`.`id` = `barang_masuk_item`.`satuan`)) join `satuan` `satuan2` on(`satuan2`.`id` = `barang_masuk_item`.`satuan_stok`)) ORDER BY `barang_masuk_item`.`log` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_daftar_harga`
--
DROP TABLE IF EXISTS `view_daftar_harga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daftar_harga`  AS SELECT `daftar_harga`.`id` AS `id`, `daftar_harga`.`nama` AS `nama`, `daftar_harga`.`produk` AS `id_produk`, `produk`.`nama` AS `produk`, `daftar_harga`.`harga_jual` AS `harga_jual`, `daftar_harga`.`jumlah_jual` AS `jumlah_jual`, `daftar_harga`.`satuan` AS `id_satuan`, `satuan`.`nama` AS `satuan`, `daftar_harga`.`status_aktif` AS `status_aktif`, `daftar_harga`.`delete_by` AS `delete_by`, `daftar_harga`.`delete_at` AS `delete_at`, `daftar_harga`.`log` AS `log` FROM ((`daftar_harga` join `produk` on(`produk`.`id` = `daftar_harga`.`produk`)) join `satuan` on(`satuan`.`id` = `daftar_harga`.`satuan`)) WHERE `daftar_harga`.`status_aktif` = 'aktif' ORDER BY `daftar_harga`.`log` DESC ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan`  AS SELECT `penjualan_item`.`penjualan` AS `penjualan` FROM `penjualan_item` ;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
