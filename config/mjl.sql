-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2025 at 02:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mjl`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `tanggal_claim` date DEFAULT NULL,
  `jenis_claim` varchar(80) NOT NULL,
  `biaya` bigint NOT NULL,
  `remark` text,
  `sj` varchar(255) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `uuid`, `vehicle_id`, `driver_id`, `vendor_id`, `tanggal_claim`, `jenis_claim`, `biaya`, `remark`, `sj`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1f13b27d-a118-4dd6-a6e5-9370b3de3cc8', 1, 1, 1, '2025-05-18', 'test', 199000, 'asds', '1746079206-Screenshot-2025-04-15-194622.png', 'Paid', '2025-05-01 06:00:06', '2025-05-03 13:19:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `driver_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `driver_ksuid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `sim_type` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `ktp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sim` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `uuid`, `driver_name`, `driver_ksuid`, `phone_number`, `sim_type`, `ktp`, `sim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '195d12cc-0ead-4d27-9e51-48f018587b23', 'Fadli Azka Prayogi', '123456', '0821121212', 'B3 Umum', 'web.png', '455587-minimalism-vector_art.jpg', '2025-03-17 14:41:20', '2025-03-17 14:41:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `no_invoice` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_invoice` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `name_pt` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `vendor_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `subtotal` double NOT NULL,
  `pph23` decimal(20,2) NOT NULL,
  `ppn` decimal(20,2) NOT NULL,
  `total_pembayaran` decimal(20,2) NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `uuid`, `no_invoice`, `tgl_invoice`, `tgl_jatuh_tempo`, `name_pt`, `vendor_id`, `payment_id`, `subtotal`, `pph23`, `ppn`, `total_pembayaran`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8e66939e-6165-44cb-8eaf-c6322a9db4af', '0001_INV-MJL_03_2025', '2025-03-17', '2025-03-17', 'CV Murai Jaya Logistic', 1, 1, 25000000, 4.00, 11.00, 28750000.00, 'Pengiriman batu bara untuk kebutuhan negara', '2025-03-17 14:58:22', '2025-03-17 14:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_ap`
--

CREATE TABLE `invoices_ap` (
  `invoice_ap_id` int NOT NULL,
  `uuid` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_invoice` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_invoice` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `name_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendor` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_id` int NOT NULL,
  `subtotal` decimal(20,2) NOT NULL,
  `pph23` decimal(20,2) NOT NULL,
  `ppn` decimal(20,2) NOT NULL,
  `total_pembayaran` decimal(20,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices_ap`
--

INSERT INTO `invoices_ap` (`invoice_ap_id`, `uuid`, `no_invoice`, `tgl_invoice`, `tgl_jatuh_tempo`, `name_pt`, `vendor`, `payment_id`, `subtotal`, `pph23`, `ppn`, `total_pembayaran`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1ec8ebf1-4ea8-4e2b-a048-4eff9707bbaf', '0001_INV-AP-MJL_05_2025', '2025-05-18', '2025-05-18', 'CV Murai Jaya Logistic', 'PT PT AJA', 1, 1000000.00, 10.00, 10.00, 1200000.00, 'asd', '2025-05-18 01:41:02', '2025-05-18 01:41:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `maintenance_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `vehicle_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `description` text,
  `sparepart` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` decimal(20,2) NOT NULL,
  `jasa` decimal(20,2) NOT NULL,
  `bon` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `buktipotong` varchar(150) DEFAULT NULL,
  `ppn` decimal(10,2) DEFAULT NULL,
  `pph` decimal(10,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`maintenance_id`, `uuid`, `vehicle_id`, `tanggal`, `description`, `sparepart`, `harga`, `jasa`, `bon`, `bukti`, `buktipotong`, `ppn`, `pph`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c2b556c5-c92a-409c-b214-0cbb6b9aa45e', 1, '2025-04-28', 'Rusak', 'Bans', 100000.00, 10000.00, 'Screenshot 2025-04-12 105540.png', 'Screenshot 2025-04-15 195329.png', NULL, NULL, NULL, 110000.00, 'Paid', '2025-04-28 13:23:16', '2025-05-15 14:05:34', NULL),
(2, '3ef24841-17b7-41b3-9ad3-d09dbbd84074', 1, '2025-04-28', 'asd', 'Ban', 500000.00, 10000.00, '1745847828-Screenshot-2025-04-24-212856.png', '1745847828-Screenshot-2025-04-12-152405.png', NULL, NULL, NULL, 510000.00, 'Unpaid', '2025-04-28 13:43:48', '2025-04-28 13:43:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `no_po` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `vendor_id` int NOT NULL,
  `pickup_date` date NOT NULL,
  `tgl_pembuatan_po` date NOT NULL,
  `origin_city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `destination` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `no_surat_jalan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uuid`, `no_po`, `vendor_id`, `pickup_date`, `tgl_pembuatan_po`, `origin_city`, `destination`, `vehicle_id`, `driver_id`, `price`, `invoice_id`, `no_surat_jalan`, `bukti`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4d6bafd6-cbcb-464a-9599-4fd19aea85d1', 'DO-0000001-03-2025', 1, '2025-03-17', '2025-03-17', 'Tangerang - Banten', 'Bali', 1, 1, 25000000.00, NULL, '471998', 'IMG_20230627_051052_947.jpg', 'Active', '2025-03-17 14:46:24', '2025-05-23 13:48:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_ap`
--

CREATE TABLE `orders_ap` (
  `order_ap_id` int NOT NULL,
  `uuid` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_po` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendor` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pickup_date` date NOT NULL,
  `tgl_pembuatan_po` date NOT NULL,
  `origin_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `destination` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `driver` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `project` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) DEFAULT NULL,
  `invoice_ap_id` int DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `quotation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_ap`
--

INSERT INTO `orders_ap` (`order_ap_id`, `uuid`, `no_po`, `vendor`, `pickup_date`, `tgl_pembuatan_po`, `origin_city`, `destination`, `vehicle`, `driver`, `project`, `price`, `pajak`, `invoice_ap_id`, `total`, `quotation`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c4a624ce-ef69-41de-b6cd-84aeab5d44a5', 'DO-SMI-0000001-05-2025', 'PT Sinar Makmur Indonesias', '2025-05-25', '2025-05-25', 'Jakarta', 'Banten', 'A 4180 XM', 'Fadli', 'Pasir', 1000000.00, 100000.00, NULL, 1100000.00, NULL, 'Active', '2025-05-25 04:48:16', '2025-05-25 04:48:16', NULL),
(2, 'f503693b-23b8-4748-b164-183bbd3742a8', 'DO-STY-0000002-05-2025', 'PT STANLAY', '2025-05-25', '2025-05-25', 'Jakarta', 'Banten', 'A 4180 XM', 'Fadli', 'Pasir', 1000000.00, 10.00, NULL, 1000010.00, NULL, 'Active', '2025-05-25 04:48:35', '2025-05-25 04:48:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `nama_bank` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rek` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_rek` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_code` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `swift_code` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `nama_bank`, `no_rek`, `nama_rek`, `bank_code`, `swift_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT. BANK PERMATA TBK.', '702597501', 'CV MURAI JAYA LOGIST', '013', 'BBBAIDJA', '2025-03-12 05:47:20', '2025-03-12 05:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` int NOT NULL,
  `origin_city` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `destination_city` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `min` int NOT NULL,
  `max` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `project` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `uuid`, `vehicle_id`, `origin_city`, `destination_city`, `min`, `max`, `status`, `price`, `project`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '02df0175-339e-4cb4-bd57-14cafb4b71b1', 1, 'Tangerang', 'Bali', 10, 1000, 'active', 25000000.00, 'BATU BARA', '2025-03-17 14:42:17', '2025-03-17 14:42:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekening_koran`
--

CREATE TABLE `rekening_koran` (
  `rek_koran_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `reference_data` varchar(50) NOT NULL,
  `reference_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `tanggal` int NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `jumlah` decimal(20,2) NOT NULL,
  `no_document` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `driver_id` int NOT NULL,
  `salary` bigint NOT NULL,
  `ppn` decimal(10,2) DEFAULT NULL,
  `pph` decimal(10,2) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `buktipotong` varchar(150) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `uuid`, `driver_id`, `salary`, `ppn`, `pph`, `tanggal`, `bukti`, `buktipotong`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cf39bcd7-fc5c-4570-9542-8b2ead57a397', 1, 50000000, NULL, NULL, '2025-05-01', '1746080429-Screenshot-2025-04-12-114712.png', NULL, 'Success', '2025-05-01 06:20:29', '2025-05-01 06:20:45', '2025-05-01 06:20:49'),
(2, '9c2d29c0-e976-4197-8ef2-fc76369638d8', 1, 6000000, NULL, NULL, '2025-05-03', '1746284424-Screenshot-2025-04-12-105540.png', NULL, 'Success', '2025-05-03 15:00:24', '2025-05-03 15:00:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saldo_awal`
--

CREATE TABLE `saldo_awal` (
  `saldo_id` int NOT NULL,
  `saldo_awal` decimal(20,2) NOT NULL,
  `tanggal_saldo_awal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `status_pembayaran_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `invoice_id` int NOT NULL,
  `bukti_data` varchar(150) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah` decimal(20,2) NOT NULL,
  `sisa_bayar` decimal(20,2) DEFAULT NULL,
  `total_bayar` decimal(20,2) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`status_pembayaran_id`, `uuid`, `invoice_id`, `bukti_data`, `tanggal_pembayaran`, `jumlah`, `sisa_bayar`, `total_bayar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5dc45d11-d9b5-49ea-8ff1-e8fd46879af5', 1, '1747318096-Screenshot-2025-04-12-105540.png', '2025-05-15', 10000000.00, 18750000.00, 28750000.00, 'Partial', '2025-05-15 14:08:16', '2025-05-15 14:08:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran_ap`
--

CREATE TABLE `status_pembayaran_ap` (
  `status_pembayaran_ap_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `invoice_ap_id` int NOT NULL,
  `bukti_data` varchar(150) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah` decimal(20,2) NOT NULL,
  `sisa_bayar` decimal(20,2) DEFAULT NULL,
  `total_bayar` decimal(20,2) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `reference_table` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reference_id` int NOT NULL,
  `reff` varchar(50) DEFAULT NULL,
  `payment_id` int NOT NULL,
  `jenis_transaction` varchar(25) NOT NULL,
  `type_transaction` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `uuid`, `reference_table`, `reference_id`, `reff`, `payment_id`, `jenis_transaction`, `type_transaction`, `transaction_date`, `amount`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '06eaebfe-65dd-41d2-a2b8-43dbca49247e', 'maintenance', 1, NULL, 1, 'Repair', 'outcome', '2025-04-28', 110000.00, 'sudah dibayar', 'Paid', '2025-05-15 14:05:34', '2025-05-15 14:05:34', NULL),
(2, '82f216f6-2103-4177-9ffc-fc47152bf58b', 'status_pembyaran', 1, '0001_INV-MJL_03_2025', 1, 'Payment', 'income', '2025-05-15', 10000000.00, 'bayar barang', 'Partial', '2025-05-15 14:08:16', '2025-05-15 14:08:16', NULL),
(3, 'ad7e99db-1006-4e58-83a8-4c0db29b1a08', 'status_pembayaran', 1, '0001_INV-MJL_03_2025', 1, 'Payment', 'income', '2025-05-18', 20000000.00, 'asd', 'Paid', '2025-05-18 01:35:42', '2025-05-18 01:35:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `uuid`, `username`, `name`, `password`, `profile`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '97ebb797-43c7-4ba7-a4fa-6680b924b567', 'admin', 'Administrator', '$2y$10$sBxBehzQ1P7qK6w6k5Lsuuk5tbAvm2/1YV6jhDF8UGcP6qM.gtd.u', 'a.jpg', 'Administrator', '2025-03-07 15:10:35', '2025-03-07 15:10:35'),
(2, '9bb51d16-3de3-4290-b340-98abfacf083b', 'guest', 'Guest', '$2y$10$cXzApXmnyAddPuYUqvBIWudVL2pmignnWOciIziZJ8H7dKI7GCfhG', 'IMG-20250309-WA0004.jpg', 'Admin', '2025-03-09 08:32:24', '2025-03-13 15:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `plat_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `truck_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `truck_sub_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `plat_color` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `stnk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `uuid`, `plat_number`, `truck_type`, `truck_sub_type`, `plat_color`, `stnk`, `kir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '65846bed-0619-4b0e-bcee-65fd3b88829b', 'A 4190 ZM', 'Tronton', 'Wings Box', 'Merah', 'a.jpg', '455587-minimalism-vector_art.jpg', '2025-03-17 14:33:44', '2025-03-17 14:33:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `ven_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`ven_id`, `uuid`, `nama_vendor`, `alias`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2c980bfa-aab1-486c-9304-ecdebf61d144', 'PT Sinar Makmur Indonesias', 'SMI', 'smi@gmail.com', '082112807925', '2025-05-24 07:38:29', '2025-05-24 07:39:35', NULL),
(2, '29f2d811-e8c1-4bcf-94a4-cf9e6a65826f', 'PT STANLAY', 'STY', 'sty@sty.co.id', '082112897925', '2025-05-25 04:43:10', '2025-05-25 04:43:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int NOT NULL,
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `sales` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sales_support` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `npwp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `uuid`, `company_name`, `address`, `sales`, `sales_support`, `email`, `phone`, `npwp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6a9ad90c-6266-4612-b007-01eeec2459b3', 'PT Makmur', 'Balaraja', 'Siapa', 'Siapa', 'siapa@gmail.com', '082112897925', '1234567890', '2025-03-17 14:32:57', '2025-03-17 14:32:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoices_ap`
--
ALTER TABLE `invoices_ap`
  ADD PRIMARY KEY (`invoice_ap_id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_ap`
--
ALTER TABLE `orders_ap`
  ADD PRIMARY KEY (`order_ap_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `rekening_koran`
--
ALTER TABLE `rekening_koran`
  ADD PRIMARY KEY (`rek_koran_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `saldo_awal`
--
ALTER TABLE `saldo_awal`
  ADD PRIMARY KEY (`saldo_id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`status_pembayaran_id`);

--
-- Indexes for table `status_pembayaran_ap`
--
ALTER TABLE `status_pembayaran_ap`
  ADD PRIMARY KEY (`status_pembayaran_ap_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ven_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices_ap`
--
ALTER TABLE `invoices_ap`
  MODIFY `invoice_ap_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `maintenance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_ap`
--
ALTER TABLE `orders_ap`
  MODIFY `order_ap_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening_koran`
--
ALTER TABLE `rekening_koran`
  MODIFY `rek_koran_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo_awal`
--
ALTER TABLE `saldo_awal`
  MODIFY `saldo_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `status_pembayaran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pembayaran_ap`
--
ALTER TABLE `status_pembayaran_ap`
  MODIFY `status_pembayaran_ap_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ven_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
