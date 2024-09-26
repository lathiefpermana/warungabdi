-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 10:55 AM
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk_item`
--
ALTER TABLE `barang_masuk_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_flow`
--
ALTER TABLE `cash_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_cash_flow`
--
ALTER TABLE `tipe_cash_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
