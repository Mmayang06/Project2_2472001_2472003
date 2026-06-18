-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 10:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventoris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_inventaris`
--

CREATE TABLE `barang_inventaris` (
  `id_inventaris` int(10) UNSIGNED NOT NULL,
  `nomor_label` varchar(50) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `kondisi` enum('baik','rusak_ringan','rusak_berat') NOT NULL DEFAULT 'baik',
  `id_ruangan` int(10) UNSIGNED NOT NULL,
  `id_penggunaan` int(10) UNSIGNED NOT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `jenis_barang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_inventaris`
--

INSERT INTO `barang_inventaris` (`id_inventaris`, `nomor_label`, `qr_code`, `kondisi`, `id_ruangan`, `id_penggunaan`, `tanggal_penerimaan`, `nama_barang`, `jenis_barang`) VALUES
(1, NULL, 'QR-2024-PC-001', 'rusak_berat', 1, 1, NULL, NULL, NULL),
(2, 'INV-2024-PC-001', 'QR-2024-PC-002', 'baik', 1, 1, NULL, NULL, NULL),
(3, 'INV-2024-PC-003', 'QR-2024-PC-003', 'baik', 1, 1, NULL, NULL, NULL),
(4, NULL, 'QR-2024-MON-001', 'rusak_berat', 1, 4, NULL, NULL, NULL),
(5, 'INV-2024-MON-001', 'QR-2024-MON-002', 'baik', 1, 4, NULL, NULL, NULL),
(6, 'INV-2024-UPS-001', 'QR-2024-UPS-001', 'baik', 1, 7, NULL, NULL, NULL),
(7, NULL, 'QR-2024-HS-001', 'rusak_berat', 1, 8, NULL, NULL, NULL),
(8, NULL, 'QR-2024-HS-002', 'rusak_berat', 1, 8, NULL, NULL, NULL),
(9, 'INV-2024-PC-006', 'QR-2024-PC-004', 'baik', 2, 2, NULL, NULL, NULL),
(10, NULL, 'QR-2024-PC-005', 'rusak_berat', 2, 2, NULL, NULL, NULL),
(11, NULL, 'QR-2024-PC-006', 'rusak_berat', 2, 2, NULL, NULL, NULL),
(13, 'UNIV-QOE5WZ', 'QR-UNIV-QOE5WZ', 'baik', 2, 43, NULL, NULL, NULL),
(14, 'INV-2024-PC-007', 'QR-2024-PC-007', 'baik', 3, 3, NULL, NULL, NULL),
(16, 'INV-2024-PC-009', 'QR-2024-PC-009', 'baik', 3, 3, NULL, NULL, NULL),
(17, 'INV-2025-ROG-001', 'QR-2025-ROG-001', 'baik', 4, 10, NULL, NULL, NULL),
(18, 'INV-2025-ROG-002', 'QR-2025-ROG-002', 'baik', 4, 10, NULL, NULL, NULL),
(19, 'INV-2025-MOG-001', 'QR-2025-MOG-001', 'baik', 4, 12, NULL, NULL, NULL),
(20, 'INV-2025-MOG-002', 'QR-2025-MOG-002', 'baik', 4, 12, NULL, NULL, NULL),
(21, NULL, 'QR-2025-ROG-003', 'rusak_berat', 5, 11, NULL, NULL, NULL),
(22, 'INV-2025-ROG-003', 'QR-2025-ROG-004', 'rusak_berat', 5, 11, NULL, NULL, NULL),
(23, 'INV-2025-SW-001', 'QR-2025-SW-001', 'baik', 9, 13, NULL, NULL, NULL),
(24, 'INV-2025-RT-001', 'QR-2025-RT-001', 'baik', 9, 14, NULL, NULL, NULL),
(25, 'INV-2025-WC-001', 'QR-2025-WC-001', 'baik', 8, 15, NULL, NULL, NULL),
(26, 'INV-2025-WC-002', 'QR-2025-WC-002', 'baik', 8, 15, NULL, NULL, NULL),
(27, 'INV-2025-WC-003', 'QR-2025-WC-003', 'baik', 8, 15, NULL, NULL, NULL),
(28, 'INV-2025-PRJ-001', 'QR-2025-PRJ-001', 'baik', 1, 16, NULL, NULL, NULL),
(29, 'INV-2025-PRJ-002', 'QR-2025-PRJ-002', 'baik', 4, 16, NULL, NULL, NULL),
(30, NULL, 'QR-2025-PRJ-003', 'rusak_berat', 7, 16, NULL, NULL, NULL),
(32, NULL, 'UNIV-0KA5GR', 'baik', 1, 37, '2026-06-16', 'Monitor LED 24', 'Inventaris'),
(33, NULL, 'UNIV-0KA5GR', 'baik', 1, 37, '2026-06-16', 'Monitor LED 24', 'Inventaris'),
(34, NULL, 'UNIV-0KA5GR', 'baik', 1, 37, '2026-06-16', 'Monitor LED 24', 'Inventaris'),
(35, NULL, 'UNIV-CKBXKC', 'baik', 1, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(36, NULL, 'UNIV-CKBXKC', 'baik', 1, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(37, NULL, 'UNIV-CKBXKC', 'baik', 1, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(38, NULL, 'UNIV-9NYX44', 'baik', 2, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(39, NULL, 'UNIV-9NYX44', 'baik', 10, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(40, NULL, 'UNIV-9NYX44', 'baik', 10, 2, '2026-06-16', 'Monitor LED 24\" LG 24MK430H', 'Monitor'),
(41, NULL, 'UNIV-447V97', 'baik', 1, 39, '2026-06-16', 'Tinta Printer Epson 003 Black', 'Inventaris'),
(42, NULL, 'UNIV-447V97', 'baik', 10, 39, '2026-06-16', 'Tinta Printer Epson 003 Black', 'Inventaris'),
(43, NULL, 'UNIV-7B7XOY', 'baik', 8, 40, '2026-06-16', 'RAM DDR4 16GB Corsair Vengeance', 'Inventaris'),
(44, NULL, 'UNIV-7B7XOY', 'baik', 10, 40, '2026-06-16', 'RAM DDR4 16GB Corsair Vengeance', 'Inventaris'),
(45, NULL, 'UNIV-7B7XOY', 'baik', 10, 40, '2026-06-16', 'RAM DDR4 16GB Corsair Vengeance', 'Inventaris'),
(48, NULL, 'UNIV-HNLI62', 'baik', 1, 42, '2026-06-16', 'Tinta Printer Epson 003 Black', 'Inventaris'),
(49, 'UNIV-HNLI64', 'QR-UNIV-HNLI64', 'baik', 10, 42, '2026-06-16', 'Tinta Printer Epson 003 Black', 'Inventaris'),
(50, 'UNIV-HNLI63', 'QR-UNIV-HNLI63', 'baik', 10, 42, '2026-06-16', 'Tinta Printer Epson 003 Black', 'Inventaris'),
(52, 'UNIV-QOE5WA', 'QR-UNIV-QOE5WA', 'baik', 2, 43, '2026-06-17', 'Headset Stereo Havit H2198d', 'Inventaris'),
(60, 'UNIV-5NQSBK', 'QR-UNIV-5NQSBK', 'baik', 10, 44, '2026-06-17', 'Monitor LED 24', 'Inventaris'),
(61, 'UNIV-5NQSBJ', 'QR-UNIV-5NQSBJ', 'baik', 10, 44, '2026-06-17', 'Monitor LED 24', 'Inventaris'),
(62, 'INV-2024-HS-001', 'QR-UNIV-HNLI65', 'baik', 1, 46, '2026-06-17', 'Tinta Printer Epson 003 Color Set', 'Inventaris'),
(63, 'UNIV-HNLI56', 'QR-UNIV-HNLI56', 'baik', 1, 46, '2026-06-17', 'Tinta Printer Epson 003 Color Set', 'Inventaris'),
(65, 'UNIV-HNLI62', 'QR-UNIV-HNLI62', 'baik', 10, 48, '2026-06-18', 'Smart TV 55', 'Inventaris'),
(66, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(67, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(68, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(69, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(70, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(71, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(72, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(73, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(74, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(75, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(76, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(77, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(78, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(79, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(80, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(81, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(82, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(83, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(84, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(85, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(86, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(87, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(88, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(89, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(90, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(91, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(92, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(93, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(94, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(95, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(96, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(97, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(98, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(99, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(100, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(101, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(102, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(103, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(104, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(105, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(106, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(107, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(108, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(109, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(110, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(111, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(112, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(113, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(114, NULL, 'UNIV-BG1KN7', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(115, 'UNIV-HNLI65', 'QR-UNIV-HNLI65', 'baik', 10, 49, '2026-06-18', 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP'),
(116, 'UNIV-HNLI66', 'QR-UNIV-HNLI66', 'baik', 10, 50, '2026-06-18', 'Smart TV 55', 'Inventaris'),
(117, 'INV-2025-PRJ-003', 'QR-UNIV-HNLI67', 'baik', 7, 51, '2026-06-18', 'SSD NVMe 512GB Kingston NV2', 'Inventaris');

-- --------------------------------------------------------

--
-- Table structure for table `bhp`
--

CREATE TABLE `bhp` (
  `id_bhp` int(10) UNSIGNED NOT NULL,
  `nama_bhp` varchar(150) NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tgl_penerimaan` date NOT NULL,
  `id_detail` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `lokasi_rak` varchar(100) DEFAULT 'Belum Ditentukan',
  `stok_minimal` int(10) UNSIGNED DEFAULT 5,
  `satuan` varchar(50) DEFAULT 'Pcs'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhp`
--

INSERT INTO `bhp` (`id_bhp`, `nama_bhp`, `stok`, `tgl_penerimaan`, `id_detail`, `id_kategori`, `lokasi_rak`, `stok_minimal`, `satuan`) VALUES
(1, 'Konektor RJ45 Cat6 (Isi 50 pcs)', 5, '2026-03-15', 24, 3, 'Belum Ditentukan', 5, 'Pack'),
(2, 'Thermal Paste Deepcool Z5', 9, '2026-03-15', 25, 3, 'Belum Ditentukan', 5, 'Pcs'),
(3, 'Baterai CMOS CR2032 Maxell', 30, '2026-03-16', 26, 3, 'Belum Ditentukan', 5, 'Pcs'),
(4, 'Cairan Pembersih Layar (Screen Cleaner)', 12, '2026-03-16', 27, 3, 'Belum Ditentukan', 5, 'Botol'),
(5, 'Kain Lap Microfiber', 15, '2026-03-16', 28, 3, 'Belum Ditentukan', 5, 'Pcs'),
(6, 'Kertas HVS A4 80gr (Rim)', 104, '2024-03-01', 6, 2, 'Belum Ditentukan', 5, 'Pcs'),
(7, 'Tinta Printer Epson 003 Black', 7, '2024-03-01', 7, 3, 'Belum Ditentukan', 5, 'Pcs'),
(8, 'Tinta Printer Epson 003 Color Set', 7, '2024-03-01', 8, 3, 'Belum Ditentukan', 5, 'Pcs'),
(9, 'Spidol Whiteboard Snowman (12 pcs)', 7, '2024-03-05', 9, 2, 'Belum Ditentukan', 5, 'Pcs'),
(10, 'Penghapus Whiteboard Kenko', 8, '2024-03-05', 10, 2, 'Belum Ditentukan', 5, 'Pcs'),
(11, 'Cable Ties / Pengikat Kabel (100 pcs)', 8, '2026-03-17', 29, 3, 'Belum Ditentukan', 5, 'Pack'),
(12, 'Isolatif Listrik Nitto (Electrical Tape)', 10, '2026-03-17', 30, 3, 'Belum Ditentukan', 5, 'Pcs'),
(13, 'Timah Solder Paragon 10 meter', 5, '2026-03-18', 31, 3, 'Belum Ditentukan', 5, 'Roll'),
(14, 'Pasta Solder (Flux)', 5, '2026-03-18', 32, 3, 'Belum Ditentukan', 5, 'Pcs'),
(15, 'Alkohol Swab 70% (Pembersih Pin RAM)', 3, '2026-03-19', 33, 3, 'Belum Ditentukan', 5, 'Box'),
(16, 'CD-R Blank Verbatim (Isi 50)', 2, '2026-03-20', 30, 3, 'Belum Ditentukan', 5, 'Pack'),
(17, 'Desinfektan Spray untuk Keyboard/Mouse', 6, '2026-03-20', 10, 3, 'Belum Ditentukan', 5, 'Botol'),
(18, 'Kabel UTP Cat6 Belden (Rol 305m)', 4, '2025-03-05', 20, 3, 'Belum Ditentukan', 5, 'Pcs'),
(19, 'Catridge Printer Canon PG-745 Black', 4, '2026-03-22', 7, 3, 'Belum Ditentukan', 5, 'Pcs'),
(20, 'Kertas Label Barcode Thermal', 10, '2026-03-22', 6, 2, 'Belum Ditentukan', 5, 'Roll'),
(21, 'Baterai AA Alkaline (Untuk Mouse Wireless)', 40, '2026-03-23', 26, 3, 'Belum Ditentukan', 5, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengadaan`
--

CREATE TABLE `detail_pengadaan` (
  `id_detail` int(10) UNSIGNED NOT NULL,
  `id_draft` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `link_pembelian` varchar(500) DEFAULT NULL,
  `status_persetujuan` enum('pending','disetujui','ditolak') NOT NULL DEFAULT 'pending',
  `status_pengadaan` varchar(50) NOT NULL DEFAULT 'pending',
  `id_inventaris_ganti` int(10) UNSIGNED DEFAULT NULL,
  `id_ruangan` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pengadaan`
--

INSERT INTO `detail_pengadaan` (`id_detail`, `id_draft`, `nama_barang`, `jenis_barang`, `jumlah`, `harga`, `link_pembelian`, `status_persetujuan`, `status_pengadaan`, `id_inventaris_ganti`, `id_ruangan`) VALUES
(1, 1, 'PC Desktop All-in-One Lenovo V30a', 'Komputer', 30, 8500000.00, 'https://tokopedia.com/lenovo-aio-v30a', 'disetujui', 'pending', NULL, NULL),
(2, 1, 'Monitor LED 24\" LG 24MK430H', 'Monitor', 30, 2100000.00, 'https://tokopedia.com/lg-monitor-24mk430h', 'disetujui', 'penerimaan_sebagian', NULL, 2),
(3, 1, 'Keyboard + Mouse Logitech MK235', 'Periferal', 30, 280000.00, 'https://tokopedia.com/logitech-mk235', 'disetujui', 'pending', NULL, NULL),
(4, 1, 'UPS APC BX650LI 650VA', 'UPS', 15, 750000.00, 'https://tokopedia.com/apc-ups-bx650', 'disetujui', 'pending', NULL, NULL),
(5, 1, 'Headset Stereo Havit H2198d', 'Periferal', 30, 125000.00, 'https://tokopedia.com/havit-headset-h2198d', 'disetujui', 'pending', NULL, NULL),
(6, 2, 'Kertas HVS A4 80gr (Rim)', 'ATK', 20, 85000.00, 'https://tokopedia.com/kertas-hvs-a4', 'disetujui', 'pending', NULL, NULL),
(7, 2, 'Tinta Printer Epson 003 Black', 'ATK', 15, 85000.00, 'https://tokopedia.com/epson-003-black', 'disetujui', 'pending', NULL, NULL),
(8, 2, 'Tinta Printer Epson 003 Color Set', 'ATK', 10, 240000.00, 'https://tokopedia.com/epson-003-color', 'disetujui', 'pending', NULL, NULL),
(9, 2, 'Spidol Whiteboard Snowman (12 pcs)', 'ATK', 10, 45000.00, 'https://tokopedia.com/spidol-snowman', 'disetujui', 'pending', NULL, NULL),
(10, 2, 'Penghapus Whiteboard Kenko', 'ATK', 10, 18000.00, 'https://tokopedia.com/penghapus-whiteboard', 'disetujui', 'pending', NULL, NULL),
(11, 3, 'Smart TV 55\" Samsung UA55AU8000', 'Elektronik', 3, 9500000.00, 'https://tokopedia.com/samsung-smarttv-55', 'ditolak', 'pending', NULL, NULL),
(12, 3, 'Sofa Ruang Tunggu 3-Seat', 'Furniture', 2, 3200000.00, NULL, 'ditolak', 'pending', NULL, NULL),
(13, 4, 'PC Desktop Gaming Asus ROG G22CH', 'Komputer', 20, 15500000.00, 'https://tokopedia.com/asus-rog-g22ch', 'disetujui', 'pending', NULL, NULL),
(14, 4, 'Monitor Gaming 27\" IPS 165Hz MSI', 'Monitor', 20, 3800000.00, 'https://tokopedia.com/msi-monitor-27-165hz', 'disetujui', 'pending', NULL, NULL),
(15, 4, 'RAM DDR4 16GB Corsair Vengeance', 'Komponen', 20, 650000.00, 'https://tokopedia.com/corsair-ram-ddr4-16gb', 'disetujui', 'pending', NULL, NULL),
(16, 4, 'SSD NVMe 512GB Kingston NV2', 'Komponen', 20, 480000.00, 'https://tokopedia.com/kingston-ssd-nvme-512gb', 'disetujui', 'pending', NULL, NULL),
(17, 4, 'Kursi Lab Ergonomis Chitose CL100', 'Furniture', 20, 850000.00, 'https://tokopedia.com/chitose-cl100', 'disetujui', 'pending', NULL, NULL),
(18, 5, 'Switch Managed 24-Port TP-Link TL-SG3428', 'Jaringan', 3, 3200000.00, 'https://tokopedia.com/tplink-tlsg3428', 'disetujui', 'pending', NULL, NULL),
(19, 5, 'Router Mikrotik RB750Gr3', 'Jaringan', 3, 850000.00, 'https://tokopedia.com/mikrotik-rb750gr3', 'disetujui', 'pending', NULL, NULL),
(20, 5, 'Kabel UTP Cat6 Belden (Rol 305m)', 'Jaringan', 5, 580000.00, 'https://tokopedia.com/kabel-utp-cat6-belden', 'disetujui', 'pending', NULL, NULL),
(21, 5, 'Webcam Full HD Logitech C920', 'Multimedia', 15, 980000.00, 'https://tokopedia.com/logitech-c920', 'disetujui', 'pending', NULL, NULL),
(22, 5, 'Microphone Condenser BM-800', 'Multimedia', 5, 185000.00, 'https://tokopedia.com/mic-condenser-bm800', 'disetujui', 'pending', NULL, NULL),
(23, 5, 'Proyektor Epson EB-X49 3600 Lumens', 'Elektronik', 9, 5800000.00, 'https://tokopedia.com/epson-eb-x49', 'disetujui', 'pending', NULL, NULL),
(24, 6, 'Laptop Asus ExpertBook B1 B1502C', 'Komputer', 5, 9200000.00, 'https://tokopedia.com/asus-expertbook-b1502', 'disetujui', 'pending', NULL, NULL),
(25, 6, 'Printer Epson L3250 Multifunction', 'Printer', 3, 2850000.00, 'https://tokopedia.com/epson-l3250', 'disetujui', 'pending', NULL, NULL),
(26, 6, 'Meja Lab Panjang 180cm', 'Furniture', 10, 950000.00, NULL, 'disetujui', 'pending', NULL, NULL),
(27, 6, 'Stabilizer Listrik Matsunaga 1000VA', 'Elektronik', 9, 380000.00, 'https://tokopedia.com/matsunaga-1000va', 'disetujui', 'pending', NULL, NULL),
(28, 7, 'Raspberry Pi 5 4GB', 'Komponen', 30, 850000.00, 'https://tokopedia.com/raspberry-pi5-4gb', 'disetujui', 'pending', NULL, NULL),
(29, 7, 'Cisco Packet Tracer License (Lab)', 'Software', 1, 12000000.00, NULL, 'disetujui', 'pending', NULL, NULL),
(30, 7, 'Flash Disk 64GB Sandisk Ultra (pcs)', 'ATK', 50, 85000.00, 'https://tokopedia.com/sandisk-ultra-64gb', 'disetujui', 'pending', NULL, NULL),
(31, 8, 'AC Split 2PK Daikin FTKC20SVM4', 'Elektronik', 9, 7500000.00, NULL, 'pending', 'pending', NULL, NULL),
(32, 8, 'Whiteboard Magnetic 120x240cm', 'Perlengkapan', 9, 650000.00, NULL, 'pending', 'pending', NULL, NULL),
(33, 8, 'Buku Panduan Praktikum (cetak)', 'ATK', 50, 35000.00, NULL, 'pending', 'pending', NULL, NULL),
(37, 17, 'Monitor LED 24', 'Inventaris', 3, 7000000.00, 'https://tokopedia.com', 'disetujui', 'telah_diterima', NULL, 1),
(39, 16, 'Tinta Printer Epson 003 Black', 'Inventaris', 2, 1500000.00, 'https://shopee.co.id/Narendjeans-Y2K-BUGGY-PANTS-CARGO-Celana-Cargo-Pria-Stretchwear-i.1161044781.29316235236?extraParams=%7B%22display_model_id%22%3A139122444351%2C%22model_selection_logic%22%3A3%7D', 'disetujui', 'telah_diterima', 6, 1),
(40, 18, 'RAM DDR4 16GB Corsair Vengeance', 'Inventaris', 3, 500000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 27, 8),
(41, 19, 'RAM DDR4 16GB Corsair Vengeance', 'Inventaris', 2, 500000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 27, 8),
(42, 20, 'Tinta Printer Epson 003 Black', 'Inventaris', 4, 1000000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 6, 1),
(43, 21, 'Headset Stereo Havit H2198d', 'Inventaris', 2, 700000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 13, 2),
(44, 22, 'Monitor LED 24', 'Inventaris', 2, 2000000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 11, 10),
(45, 23, 'Monitor LED 24', 'Inventaris', 3, 5000000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'pending', 11, NULL),
(46, 24, 'Tinta Printer Epson 003 Color Set', 'Inventaris', 2, 200000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', NULL, 1),
(47, 25, 'SSD NVMe 512GB Kingston NV2', 'Inventaris', 1, 1500000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 28, 1),
(48, 26, 'Smart TV 55', 'Inventaris', 1, 1500000.00, 'https://shopee.co.id/Narendjeans-Y2K-BUGGY-PANTS-CARGO-Celana-Cargo-Pria-Stretchwear-i.1161044781.29316235236?extraParams=%7B%22display_model_id%22%3A139122444351%2C%22model_selection_logic%22%3A3%7D', 'disetujui', 'telah_diterima', 22, 10),
(49, 27, 'Konektor RJ45 Cat6 (Isi 50 pcs)', 'BHP', 50, 15000.00, 'https://shopee.co.id/Narendjeans-Y2K-BUGGY-PANTS-CARGO-Celana-Cargo-Pria-Stretchwear-i.1161044781.29316235236?extraParams=%7B%22display_model_id%22%3A139122444351%2C%22model_selection_logic%22%3A3%7D', 'disetujui', 'telah_diterima', NULL, 10),
(50, 28, 'Smart TV 55', 'Inventaris', 1, 500000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 21, 10),
(51, 29, 'SSD NVMe 512GB Kingston NV2', 'Inventaris', 1, 1200000.00, 'http://localhost:8000/kalab/tambah-draf', 'disetujui', 'telah_diterima', 30, 7),
(52, 30, 'Kertas HVS A4 80gr (Rim)', 'BHP', 100, 100.00, 'https://shopee.co.id/Narendjeans-Y2K-BUGGY-PANTS-CARGO-Celana-Cargo-Pria-Stretchwear-i.1161044781.29316235236?extraParams=%7B%22display_model_id%22%3A139122444351%2C%22model_selection_logic%22%3A3%7D', 'disetujui', 'telah_diterima', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `draft_pengadaan`
--

CREATE TABLE `draft_pengadaan` (
  `id_draft` int(10) UNSIGNED NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `status` enum('draft','diajukan','disetujui','ditolak') NOT NULL DEFAULT 'draft',
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `draft_pengadaan`
--

INSERT INTO `draft_pengadaan` (`id_draft`, `tahun_pengadaan`, `status`, `id_user`) VALUES
(1, '2024', 'disetujui', 6),
(2, '2024', 'disetujui', 7),
(3, '2024', 'ditolak', 8),
(4, '2025', 'disetujui', 9),
(5, '2025', 'disetujui', 10),
(6, '2025', 'disetujui', 6),
(7, '2026', 'disetujui', 7),
(8, '2026', 'draft', 8),
(16, '2026', 'disetujui', 16),
(17, '2026', 'disetujui', 16),
(18, '2026', 'disetujui', 16),
(19, '2026', 'disetujui', 16),
(20, '2026', 'disetujui', 16),
(21, '2026', 'disetujui', 16),
(22, '2026', 'disetujui', 16),
(23, '2026', 'disetujui', 16),
(24, '2026', 'disetujui', 16),
(25, '2026', 'disetujui', 16),
(26, '2026', 'disetujui', 16),
(27, '2026', 'disetujui', 16),
(28, '2026', 'disetujui', 16),
(29, '2026', 'disetujui', 16),
(30, '2026', 'disetujui', 16);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bhp`
--

CREATE TABLE `kategori_bhp` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_bhp`
--

INSERT INTO `kategori_bhp` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Elektronik dan Perangkat Komputer'),
(2, 'Alat Tulis Kantor (ATK)'),
(3, 'Aksesoris dan Kabel'),
(4, 'Peralatan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `role_target` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tipe` varchar(20) DEFAULT 'info',
  `link` varchar(255) DEFAULT '#',
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `role_target`, `pesan`, `tipe`, `link`, `is_read`, `created_at`) VALUES
(1, 'kalab', 'Staf Lab telah menggunakan 4 Tinta Printer Epson 003 Black di Lab INT 2.', 'info', '/kalab/bhp/riwayat', 1, '2026-06-11 02:21:56'),
(2, 'kalab', 'Anggota Staf Lab mengajukan permintaan stok untuk Konektor RJ45 Cat6 (Isi 50 pcs) sebanyak 10. Mohon buatkan draf pengadaan.', 'warning', '/kalab/tambah-draf', 1, '2026-06-11 02:55:19'),
(3, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: Monitor LED 24\" LG 24MK430H', 'warning', '/staf-lab/maintenance', 1, '2026-06-11 03:17:44'),
(4, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: Monitor LED 24\" LG 24MK430H', 'warning', '/staf-lab/maintenance', 1, '2026-06-11 03:23:30'),
(5, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: RAM DDR4 16GB Corsair Vengeance', 'warning', '/staf-lab/maintenance', 1, '2026-06-11 03:38:53'),
(6, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: Tinta Printer Epson 003 Color Set', 'warning', '/staf-lab/maintenance', 1, '2026-06-11 03:41:57'),
(7, 'kalab', 'Anggota Staf Lab mengajukan permintaan stok untuk Kertas HVS A4 80gr (Rim) sebanyak 100. Mohon buatkan draf pengadaan.', 'warning', '/kalab/tambah-draf', 0, '2026-06-11 06:21:59'),
(8, 'kalab', 'Anggota Staf Lab telah menggunakan 1 Thermal Paste Deepcool Z5 di Lab ADV 1.', 'info', '/kalab/bhp/riwayat', 1, '2026-06-11 06:22:44'),
(9, 'staf_admin', 'Draf Pengadaan #6 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-11 06:28:27'),
(10, 'kalab', 'Draf Pengadaan #6 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-11 06:28:27'),
(11, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: RAM DDR4 16GB Corsair Vengeance di ruangan: Lab Multimedia', 'warning', '/staf-lab/maintenance?ajukan=RAM%20DDR4%2016GB%20Corsair%20Vengeance', 0, '2026-06-11 15:19:41'),
(12, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Monitor LED 24\" LG 24MK430H (Label: INV-2024-PC-006) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 1, '2026-06-11 15:49:33'),
(13, 'kalab', 'Peringatan: Barang dengan label INV-2024-MON-004 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-16 05:41:08'),
(14, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Monitor LED 24\" LG 24MK430H sebanyak 1.', 'warning', '/kalab/tambah-draf', 0, '2026-06-16 06:17:46'),
(15, 'staf_admin', 'Draf Pengadaan #17 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-16 06:59:08'),
(16, 'kalab', 'Draf Pengadaan #17 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-16 06:59:08'),
(17, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Tinta Printer Epson 003 Black (Label: INV-2024-UPS-001) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-16 07:40:22'),
(18, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Tinta Printer Epson 003 Black (Label: INV-2024-UPS-001) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-16 07:40:22'),
(19, 'staf_admin', 'Draf Pengadaan #16 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-16 07:41:37'),
(20, 'kalab', 'Draf Pengadaan #16 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-16 07:41:37'),
(21, 'staf_admin', 'Draf Pengadaan #18 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-16 12:10:16'),
(22, 'kalab', 'Draf Pengadaan #18 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-16 12:10:16'),
(23, 'staf_admin', 'Draf Pengadaan #19 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-16 12:14:27'),
(24, 'kalab', 'Draf Pengadaan #19 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-16 12:14:27'),
(25, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk RAM DDR4 16GB Corsair Vengeance (Label: INV-2025-WC-003) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-16 12:23:49'),
(26, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk RAM DDR4 16GB Corsair Vengeance (Label: INV-2025-WC-003) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-16 12:23:49'),
(27, 'staf_admin', 'Draf Pengadaan #20 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-16 13:37:32'),
(28, 'kalab', 'Draf Pengadaan #20 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-16 13:37:32'),
(29, 'staf_admin', 'Draf Pengadaan #21 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-17 04:09:42'),
(30, 'kalab', 'Draf Pengadaan #21 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-17 04:09:42'),
(31, 'staf_admin', 'Draf Pengadaan #22 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-17 04:16:40'),
(32, 'kalab', 'Draf Pengadaan #22 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-17 04:16:40'),
(33, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Monitor LED 24\" LG 24MK430H (Label: INV-2024-PC-005) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 04:22:27'),
(34, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Monitor LED 24\" LG 24MK430H (Label: INV-2024-PC-005) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 04:22:27'),
(35, 'staf_admin', 'Draf Pengadaan #23 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-17 04:24:26'),
(36, 'kalab', 'Draf Pengadaan #23 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-17 04:24:26'),
(37, 'kalab', 'Peringatan: Barang dengan label INV-2024-HS-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 06:31:54'),
(38, 'staf_lab', 'Peringatan: Barang dengan label INV-2024-HS-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 06:31:54'),
(39, 'kalab', 'Peringatan: Barang dengan label INV-2024-HS-002 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 06:32:32'),
(40, 'staf_lab', 'Peringatan: Barang dengan label INV-2024-HS-002 dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 06:32:32'),
(41, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Tinta Printer Epson 003 Color Set (Label: INV-2024-HS-002) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 06:32:54'),
(42, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Tinta Printer Epson 003 Color Set (Label: INV-2024-HS-002) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 06:32:54'),
(43, 'staf_admin', 'Draf Pengadaan #24 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-17 06:45:01'),
(44, 'kalab', 'Draf Pengadaan #24 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-17 06:45:01'),
(45, 'kalab', 'Peringatan: Barang dengan label UNIV-QOE5WZ dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 06:52:34'),
(46, 'staf_lab', 'Peringatan: Barang dengan label UNIV-QOE5WZ dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 06:52:34'),
(47, 'kalab', 'Peringatan: Barang dengan label INV-2024-PC-007 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 06:53:23'),
(48, 'staf_lab', 'Peringatan: Barang dengan label INV-2024-PC-007 dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 06:53:23'),
(49, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: Keyboard + Mouse Logitech MK235 di ruangan: Lab INT 3', 'warning', '/staf-lab/maintenance?ajukan=Keyboard%20%2B%20Mouse%20Logitech%20MK235', 1, '2026-06-17 06:53:56'),
(50, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Keyboard + Mouse Logitech MK235 (Label: INV-2024-PC-007) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 06:54:18'),
(51, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Keyboard + Mouse Logitech MK235 (Label: INV-2024-PC-007) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 06:54:18'),
(52, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk RAM DDR4 16GB Corsair Vengeance (Label: INV-2025-WC-001) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 07:02:04'),
(53, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk RAM DDR4 16GB Corsair Vengeance (Label: INV-2025-WC-001) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 07:02:04'),
(54, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk UPS APC BX650LI 650VA (Label: INV-2024-MON-001) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 07:05:20'),
(55, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk UPS APC BX650LI 650VA (Label: INV-2024-MON-001) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 07:05:20'),
(56, 'kalab', 'Peringatan: Barang dengan label INV-2025-PRJ-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 08:05:20'),
(57, 'staf_lab', 'Peringatan: Barang dengan label INV-2025-PRJ-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 08:05:20'),
(58, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 (Label: INV-2025-PRJ-001) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 08:05:44'),
(59, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 (Label: INV-2025-PRJ-001) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 08:05:44'),
(60, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 sebanyak 1.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 08:05:56'),
(61, 'staf_admin', 'Draf Pengadaan #25 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-17 08:07:59'),
(62, 'kalab', 'Draf Pengadaan #25 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-17 08:07:59'),
(63, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 (Label: INV-2025-ROG-003) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 08:23:41'),
(64, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 (Label: INV-2025-ROG-003) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 08:23:41'),
(65, 'kalab', 'Peringatan: Barang dengan label INV-2024-PC-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/kalab/inventaris', 0, '2026-06-17 08:25:18'),
(66, 'staf_lab', 'Peringatan: Barang dengan label INV-2024-PC-001 dilaporkan dalam kondisi RUSAK.', 'warning', '/staf-lab/maintenance', 0, '2026-06-17 08:25:18'),
(67, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: PC Desktop All-in-One Lenovo V30a di ruangan: Lab INT 1', 'warning', '/staf-lab/maintenance?ajukan=PC%20Desktop%20All-in-One%20Lenovo%20V30a', 1, '2026-06-17 08:26:10'),
(68, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk PC Desktop All-in-One Lenovo V30a (Label: INV-2024-PC-001) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-17 08:26:34'),
(69, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk PC Desktop All-in-One Lenovo V30a (Label: INV-2024-PC-001) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-17 08:26:34'),
(70, 'staf_lab', 'Kalab meminta maintenance/perbaikan untuk inventaris: Smart TV 55\" Samsung UA55AU8000 di ruangan: Lab ADV 2', 'warning', '/staf-lab/maintenance?ajukan=Smart%20TV%2055%22%20Samsung%20UA55AU8000', 1, '2026-06-18 09:44:49'),
(71, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 (Label: INV-2025-ROG-003) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-18 09:45:13'),
(72, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 (Label: INV-2025-ROG-003) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-18 09:45:13'),
(73, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 sebanyak 1.', 'warning', '/kalab/tambah-draf', 0, '2026-06-18 09:45:20'),
(74, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\" Samsung UA55AU8000 sebanyak 1.', 'warning', '/kalab/tambah-draf', 1, '2026-06-18 09:45:29'),
(75, 'staf_admin', 'Draf Pengadaan #26 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-18 09:46:28'),
(76, 'kalab', 'Draf Pengadaan #26 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 1, '2026-06-18 09:46:28'),
(77, 'kalab', 'Anggota Staf Lab mengajukan permintaan stok untuk Konektor RJ45 Cat6 (Isi 50 pcs) sebanyak 50. Mohon buatkan draf pengadaan.', 'warning', '/kalab/tambah-draf', 1, '2026-06-18 10:03:56'),
(78, 'staf_admin', 'Draf Pengadaan #27 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-18 10:05:29'),
(79, 'kalab', 'Draf Pengadaan #27 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-18 10:05:29'),
(80, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk Smart TV 55\\\" Samsung UA55AU8000 sebanyak 1.', 'warning', '/kalab/tambah-draf', 1, '2026-06-18 10:07:22'),
(81, 'staf_admin', 'Draf Pengadaan #28 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-18 10:08:40'),
(82, 'kalab', 'Draf Pengadaan #28 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-18 10:08:40'),
(83, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 (Label: INV-2025-PRJ-003) yang rusak dan perlu diganti.', 'warning', '/kalab/tambah-draf', 0, '2026-06-18 10:10:37'),
(84, 'staf_lab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 (Label: INV-2025-PRJ-003) yang rusak dan perlu diganti.', 'warning', '/staf-lab/perlu-diganti', 0, '2026-06-18 10:10:37'),
(85, 'kalab', 'Staf Lab mengajukan penggantian inventaris untuk SSD NVMe 512GB Kingston NV2 sebanyak 1.', 'warning', '/kalab/tambah-draf', 1, '2026-06-18 10:10:43'),
(86, 'staf_admin', 'Draf Pengadaan #29 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-18 10:11:44'),
(87, 'kalab', 'Draf Pengadaan #29 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-18 10:11:44'),
(88, 'kalab', 'Anggota Staf Lab mengajukan permintaan stok untuk Kertas HVS A4 80gr (Rim) sebanyak 100. Mohon buatkan draf pengadaan.', 'warning', '/kalab/tambah-draf', 1, '2026-06-18 10:28:51'),
(89, 'staf_admin', 'Draf Pengadaan #30 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/stafadmin/draf-pengadaan', 0, '2026-06-18 10:36:05'),
(90, 'kalab', 'Draf Pengadaan #30 telah difinalisasi oleh Kaprodi dengan status: DISETUJUI.', 'success', '/kalab/draf-pengadaan', 0, '2026-06-18 10:36:05'),
(91, 'staf_lab', 'Stok BHP \"Kertas HVS A4 80gr (Rim)\" telah ditambah sebanyak 100 unit. Stok sekarang: 104.', 'info', '/staf-lab/bhp', 0, '2026-06-18 10:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `kondisi_setelah` enum('baik','rusak_ringan','rusak_berat') NOT NULL,
  `id_inventaris` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `kondisi_sebelum` varchar(50) DEFAULT NULL,
  `status` enum('Proses','Selesai','Dibatalkan') DEFAULT 'Selesai',
  `jenis_maintenance` varchar(50) DEFAULT 'Pemeliharaan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `tanggal`, `keterangan`, `kondisi_setelah`, `id_inventaris`, `id_user`, `kondisi_sebelum`, `status`, `jenis_maintenance`) VALUES
(1, '2024-06-10', 'Cek fisik, bersihkan debu casing, uji performa PC Lenovo Lab INT 1', 'baik', 1, 11, NULL, 'Selesai', 'Pemeliharaan'),
(2, '2024-06-10', 'Cek fisik dan uji performa PC Lenovo unit kedua Lab INT 1', 'baik', 2, 11, NULL, 'Selesai', 'Pemeliharaan'),
(3, '2024-06-11', 'Kalibrasi brightness dan contrast monitor Lab INT 1', 'baik', 4, 12, NULL, 'Selesai', 'Pemeliharaan'),
(4, '2024-07-01', 'Headset kiri tidak berbunyi, soldering ulang kabel jack', 'rusak_ringan', 8, 13, NULL, 'Selesai', 'Pemeliharaan'),
(5, '2024-07-15', 'Penggantian pasta thermal CPU, uji stabilitas sistem Lab INT 2', 'baik', 9, 11, NULL, 'Selesai', 'Pemeliharaan'),
(6, '2024-08-20', 'PC Lab INT 2 tidak menyala, ganti power supply unit', 'baik', 11, 12, NULL, 'Selesai', 'Pemeliharaan'),
(7, '2024-09-05', 'PC sering hang, reinstall OS Windows 11 dan update driver', 'rusak_ringan', 11, 13, NULL, 'Selesai', 'Pemeliharaan'),
(8, '2024-10-10', 'Pembersihan rutin semua unit PC di Lab INT 3', 'baik', 14, 14, NULL, 'Selesai', 'Pemeliharaan'),
(9, '2024-11-05', 'Cek koneksi kabel monitor dan uji resolusi display Lab INT 1', 'baik', 5, 15, NULL, 'Selesai', 'Pemeliharaan'),
(10, '2025-04-15', 'Cek semua port switch, uji throughput jaringan Lab Network', 'baik', 23, 15, NULL, 'Selesai', 'Pemeliharaan'),
(11, '2025-04-20', 'Konfigurasi ulang router, update firmware Mikrotik ke 7.x', 'baik', 24, 11, NULL, 'Selesai', 'Pemeliharaan'),
(12, '2025-05-05', 'Webcam tidak terdeteksi sistem, ganti kabel USB dan uji ulang', 'rusak_ringan', 27, 12, NULL, 'Selesai', 'Pemeliharaan'),
(13, '2025-05-10', 'Kalibrasi proyektor Lab INT 1, bersihkan lensa dan filter debu', 'baik', 28, 13, NULL, 'Selesai', 'Pemeliharaan'),
(14, '2025-06-01', 'Servis rutin PC ROG Lab ADV 1, bersihkan kipas, pasta thermal baru', 'baik', 17, 14, NULL, 'Selesai', 'Pemeliharaan'),
(15, '2025-06-15', 'Pengecekan seluruh unit Lab ADV 2, kondisi normal semua', 'baik', 21, 15, NULL, 'Selesai', 'Pemeliharaan'),
(16, '2025-07-01', 'UPS Lab INT 1 berbunyi terus, ganti baterai internal', 'baik', 6, 11, NULL, 'Selesai', 'Pemeliharaan'),
(17, '2025-08-10', 'Monitor ADV 1 flickering, ganti kabel HDMI dan test ulang', 'baik', 19, 12, NULL, 'Selesai', 'Pemeliharaan'),
(18, '2025-09-01', 'Proyektor Lab Database redup, bersihkan filter dan ganti lampu', 'baik', 30, 13, NULL, 'Selesai', 'Pemeliharaan'),
(19, '2026-06-11', 'sudah baik', 'baik', 9, 11, 'Rusak Berat', 'Selesai', 'Korektif'),
(20, '2026-06-11', 'm jbib', 'baik', 10, 11, 'Perlu Perhatian', 'Selesai', 'Korektif'),
(21, '2026-06-11', 'jshdysdwe', 'baik', 16, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(22, '2026-06-11', 'sudah selesai', 'baik', 7, 12, 'rusak_ringan', 'Selesai', 'Korektif'),
(23, '2026-06-11', 'selesai', 'baik', 8, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(24, '2026-06-11', '', 'rusak_berat', 11, 12, 'rusak_berat', 'Selesai', 'Darurat'),
(25, '2026-06-16', 'Kondisi rusak', 'rusak_berat', 13, 12, 'baik', 'Selesai', 'Preventif'),
(26, '2026-06-16', '', 'rusak_berat', 6, 12, 'baik', 'Selesai', 'Preventif'),
(27, '2026-06-16', '', 'rusak_berat', 27, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(28, '2026-06-16', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: UNIV-E4N60J).', 'baik', 27, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(29, '2026-06-16', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: UNIV-HNLI62).', 'baik', 6, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(33, '2026-06-17', 'Mengganti unit rusak (INV-2024-MON-004) dengan unit baru dari storage (Label unit pengganti: UNIV-QOE5WZ).', 'baik', 13, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(34, '2026-06-17', '', 'rusak_berat', 10, 11, 'baik', 'Selesai', 'Preventif'),
(35, '2026-06-17', '', 'rusak_berat', 7, 11, 'baik', 'Selesai', 'Preventif'),
(36, '2026-06-17', '', 'rusak_berat', 8, 11, 'baik', 'Selesai', 'Korektif'),
(37, '2026-06-17', '', 'rusak_berat', 8, 11, 'baik', 'Selesai', 'Preventif'),
(38, '2026-06-17', '', 'rusak_berat', 13, 12, 'baik', 'Selesai', 'Preventif'),
(39, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2024-MON-003).', 'baik', 13, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(40, '2026-06-17', '', 'rusak_berat', 14, 12, 'baik', 'Selesai', 'Preventif'),
(41, '2026-06-17', '', 'rusak_berat', 14, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(42, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2024-PC-008).', 'baik', 14, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(43, '2026-06-17', '', 'rusak_berat', 25, 12, 'baik', 'Selesai', 'Korektif'),
(44, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Unit baru belum dilabeli).', 'baik', 25, 12, 'rusak_berat', 'Selesai', 'Korektif'),
(45, '2026-06-17', '', 'rusak_berat', 4, 11, 'baik', 'Selesai', 'Korektif'),
(47, '2026-06-17', '', 'rusak_berat', 28, 11, 'baik', 'Selesai', 'Preventif'),
(48, '2026-06-17', '', 'rusak_berat', 28, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(49, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: IAS_35484).', 'baik', 28, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(54, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2024-PC-004).', 'baik', 10, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(55, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2024-MON-002).', 'baik', 4, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(56, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: UNIV-HNLI65).', 'baik', 8, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(57, '2026-06-17', '', 'rusak_berat', 21, 11, 'baik', 'Selesai', 'Preventif'),
(58, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2025-ROG-004).', 'baik', 21, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(59, '2026-06-17', '', 'rusak_berat', 1, 11, 'baik', 'Selesai', 'Preventif'),
(60, '2026-06-17', '', 'rusak_berat', 1, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(61, '2026-06-17', 'Mengganti barang dengan unit baru dari storage (Label unit pengganti: INV-2024-PC-005).', 'baik', 11, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(62, '2026-06-18', '', 'rusak_berat', 22, 11, 'baik', 'Selesai', 'Preventif'),
(63, '2026-06-18', 'Penggantian unit Tinta Printer Epson 003 Color Set (Label: INV-2024-HS-001) yang rusak berat di Lab INT 1. Unit pengganti (Label: INV-2024-HS-002) diambil dari Lab INT 1 dan dipindahkan ke Lab INT 1. Unit lama ditandai rusak berat tanpa label.', 'baik', 7, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(64, '2026-06-18', 'Penggantian unit PC Desktop All-in-One Lenovo V30a (Label: INV-2024-PC-001) yang rusak berat di Lab INT 1. Unit pengganti (Label: INV-2024-PC-002) diambil dari Lab INT 1 dan dipindahkan ke Lab INT 1. Unit lama ditandai rusak berat tanpa label.', 'baik', 1, 11, 'rusak_berat', 'Selesai', 'Korektif'),
(65, '2026-06-18', '', 'rusak_berat', 30, 11, 'baik', 'Selesai', 'Preventif'),
(66, '2026-06-18', 'Penggantian unit SSD NVMe 512GB Kingston NV2 (Label: INV-2025-PRJ-003) yang rusak berat di Lab Database. Unit pengganti (Label: UNIV-HNLI67) diambil dari Lab Database dan dipindahkan ke Lab Database. Unit lama ditandai rusak berat tanpa label.', 'baik', 30, 11, 'rusak_berat', 'Selesai', 'Korektif');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_bhp`
--

CREATE TABLE `penggunaan_bhp` (
  `id_penggunaan` int(10) UNSIGNED NOT NULL,
  `id_bhp` int(10) UNSIGNED NOT NULL,
  `jumlah_digunakan` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `id_pemeliharaan` int(11) DEFAULT NULL,
  `id_ruangan` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggunaan_bhp`
--

INSERT INTO `penggunaan_bhp` (`id_penggunaan`, `id_bhp`, `jumlah_digunakan`, `tanggal`, `id_pemeliharaan`, `id_ruangan`) VALUES
(1, 1, 3, '2024-03-01', NULL, NULL),
(2, 1, 3, '2024-03-01', NULL, NULL),
(3, 1, 3, '2024-03-02', NULL, NULL),
(4, 2, 3, '2024-03-01', NULL, NULL),
(5, 2, 3, '2024-03-01', NULL, NULL),
(6, 3, 5, '2024-03-05', NULL, NULL),
(7, 4, 2, '2024-03-10', NULL, NULL),
(8, 5, 8, '2024-03-10', NULL, NULL),
(9, 9, 2, '2024-04-05', NULL, NULL),
(10, 11, 2, '2025-03-01', NULL, NULL),
(11, 11, 2, '2025-03-01', NULL, NULL),
(12, 12, 2, '2025-03-02', NULL, NULL),
(13, 16, 1, '2025-04-01', NULL, NULL),
(14, 17, 1, '2025-04-01', NULL, NULL),
(15, 19, 5, '2025-04-05', NULL, NULL),
(16, 21, 3, '2025-04-05', NULL, NULL),
(17, 1, 1, '2026-06-04', NULL, NULL),
(18, 1, 2, '2026-06-04', NULL, NULL),
(19, 1, 2, '2026-06-09', NULL, 6),
(20, 1, 1, '2026-06-11', NULL, 2),
(21, 6, 10, '2026-06-11', NULL, 7),
(22, 5, 1, '2026-06-11', NULL, 2),
(23, 7, 4, '2026-06-11', NULL, 2),
(24, 2, 1, '2026-06-11', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(10) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(150) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `lokasi`) VALUES
(1, 'Lab INT 1', 'Gedung Teknik, Lantai 1'),
(2, 'Lab INT 2', 'Gedung Teknik, Lantai 1'),
(3, 'Lab INT 3', 'Gedung Teknik, Lantai 1'),
(4, 'Lab ADV 1', 'Gedung Teknik, Lantai 2'),
(5, 'Lab ADV 2', 'Gedung Teknik, Lantai 2'),
(6, 'Lab ADV 3', 'Gedung Teknik, Lantai 2'),
(7, 'Lab Database', 'Gedung Teknik, Lantai 3'),
(8, 'Lab Multimedia', 'Gedung Teknik, Lantai 3'),
(9, 'Lab Network', 'Gedung Teknik, Lantai 3'),
(10, 'Storage', 'Gudang Utama');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`, `is_online`) VALUES
(1, 'Ahmad Fauzi', 'ahmad.fauzi@example.com', 'password123', 'administrator', 0),
(2, 'Budi Santoso', 'budi.santoso@example.com', 'password123', 'administrator', 0),
(3, 'Citra Dewi', 'citra.dewi@example.com', 'password123', 'administrator', 0),
(4, 'Dian Permata', 'dian.permata@example.com', 'password123', 'administrator', 0),
(5, 'Eko Prasetyo', 'eko.prasetyo@example.com', 'password123', 'administrator', 0),
(6, 'Fajar Nugroho', 'fajar.nugroho@example.com', 'password123', 'stafadmin', 1),
(7, 'Gita Rahayu', 'gita.rahayu@example.com', 'password123', 'stafadmin', 0),
(8, 'Hendra Wijaya', 'hendra.wijaya@example.com', 'password123', 'stafadmin', 0),
(9, 'Indah Kusuma', 'indah.kusuma@example.com', 'password123', 'stafadmin', 0),
(10, 'Joko Susilo', 'joko.susilo@example.com', 'password123', 'stafadmin', 0),
(11, 'Kartika Sari', 'kartika.sari@example.com', 'password123', 'staflab', 1),
(12, 'Lukman Hakim', 'lukman.hakim@example.com', 'password123', 'staflab', 0),
(13, 'Mega Lestari', 'mega.lestari@example.com', 'password123', 'staflab', 0),
(14, 'Nanda Putra', 'nanda.putra@example.com', 'password123', 'staflab', 0),
(15, 'Oscar Maulana', 'oscar.maulana@example.com', 'password123', 'staflab', 0),
(16, 'Dr. Rini Handayani', 'rini.handayani@example.com', 'password123', 'kalab', 0),
(17, 'Dr. Samsul Arifin', 'samsul.arifin@example.com', 'password123', 'kaprodi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD UNIQUE KEY `nomor_label` (`nomor_label`),
  ADD KEY `fk_inv_ruangan` (`id_ruangan`),
  ADD KEY `fk_inv_penggunaan` (`id_penggunaan`);

--
-- Indexes for table `bhp`
--
ALTER TABLE `bhp`
  ADD PRIMARY KEY (`id_bhp`),
  ADD KEY `fk_bhp_detail` (`id_detail`),
  ADD KEY `fk_bhp_kategori` (`id_kategori`);

--
-- Indexes for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_draft` (`id_draft`);

--
-- Indexes for table `draft_pengadaan`
--
ALTER TABLE `draft_pengadaan`
  ADD PRIMARY KEY (`id_draft`),
  ADD KEY `fk_draft_user` (`id_user`);

--
-- Indexes for table `kategori_bhp`
--
ALTER TABLE `kategori_bhp`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `fk_pem_inv` (`id_inventaris`),
  ADD KEY `fk_pem_user` (`id_user`);

--
-- Indexes for table `penggunaan_bhp`
--
ALTER TABLE `penggunaan_bhp`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `fk_penggunaan_bhp` (`id_bhp`),
  ADD KEY `fk_penggunaan_bhp_ruangan` (`id_ruangan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  MODIFY `id_inventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `bhp`
--
ALTER TABLE `bhp`
  MODIFY `id_bhp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  MODIFY `id_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `draft_pengadaan`
--
ALTER TABLE `draft_pengadaan`
  MODIFY `id_draft` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kategori_bhp`
--
ALTER TABLE `kategori_bhp`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `penggunaan_bhp`
--
ALTER TABLE `penggunaan_bhp`
  MODIFY `id_penggunaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD CONSTRAINT `fk_inv_detail` FOREIGN KEY (`id_penggunaan`) REFERENCES `detail_pengadaan` (`id_detail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inv_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON UPDATE CASCADE;

--
-- Constraints for table `bhp`
--
ALTER TABLE `bhp`
  ADD CONSTRAINT `fk_bhp_detail` FOREIGN KEY (`id_detail`) REFERENCES `detail_pengadaan` (`id_detail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bhp_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_bhp` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD CONSTRAINT `fk_detail_draft` FOREIGN KEY (`id_draft`) REFERENCES `draft_pengadaan` (`id_draft`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `draft_pengadaan`
--
ALTER TABLE `draft_pengadaan`
  ADD CONSTRAINT `fk_draft_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `fk_pem_inv` FOREIGN KEY (`id_inventaris`) REFERENCES `barang_inventaris` (`id_inventaris`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pem_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `penggunaan_bhp`
--
ALTER TABLE `penggunaan_bhp`
  ADD CONSTRAINT `fk_penggunaan_bhp` FOREIGN KEY (`id_bhp`) REFERENCES `bhp` (`id_bhp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penggunaan_bhp_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
