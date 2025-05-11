-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Bulan Mei 2025 pada 02.55
-- Versi server: 8.0.30
-- Versi PHP: 8.2.28

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
-- Struktur dari tabel `claims`
--

CREATE TABLE `claims` (
  `claim_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `vehicle_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `vendor_id` int NOT NULL,
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
-- Dumping data untuk tabel `claims`
--

INSERT INTO `claims` (`claim_id`, `uuid`, `vehicle_id`, `driver_id`, `vendor_id`, `jenis_claim`, `biaya`, `remark`, `sj`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1f13b27d-a118-4dd6-a6e5-9370b3de3cc8', 1, 1, 1, 'test', 199000, 'asds', '1746079206-Screenshot-2025-04-15-194622.png', 'Paid', '2025-05-01 06:00:06', '2025-05-03 13:19:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
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
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`driver_id`, `uuid`, `driver_name`, `driver_ksuid`, `phone_number`, `sim_type`, `ktp`, `sim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '195d12cc-0ead-4d27-9e51-48f018587b23', 'Fadli Azka Prayogi', '123456', '0821121212', 'B3 Umum', 'web.png', '455587-minimalism-vector_art.jpg', '2025-03-17 14:41:20', '2025-03-17 14:41:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
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
  `pph23` int NOT NULL,
  `ppn` int NOT NULL,
  `total_pembayaran` double NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `uuid`, `no_invoice`, `tgl_invoice`, `tgl_jatuh_tempo`, `name_pt`, `vendor_id`, `payment_id`, `subtotal`, `pph23`, `ppn`, `total_pembayaran`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8e66939e-6165-44cb-8eaf-c6322a9db4af', '0001_INV-MJL_03_2025', '2025-03-17', '2025-03-17', 'CV Murai Jaya Logistic', 1, 1, 25000000, 4, 11, 28750000, 'Pengiriman batu bara untuk kebutuhan negara', '2025-03-17 14:58:22', '2025-03-17 14:58:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenances`
--

CREATE TABLE `maintenances` (
  `maintenance_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `vehicle_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `description` text,
  `sparepart` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` bigint NOT NULL,
  `jasa` bigint NOT NULL,
  `bon` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `total` bigint NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `maintenances`
--

INSERT INTO `maintenances` (`maintenance_id`, `uuid`, `vehicle_id`, `tanggal`, `description`, `sparepart`, `harga`, `jasa`, `bon`, `bukti`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c2b556c5-c92a-409c-b214-0cbb6b9aa45e', 1, '2025-04-28', 'Rusak', 'Bans', 100000, 10000, 'Screenshot 2025-04-12 105540.png', 'Screenshot 2025-04-15 195329.png', 110000, 'Paid', '2025-04-28 13:23:16', '2025-05-03 13:43:00', NULL),
(2, '3ef24841-17b7-41b3-9ad3-d09dbbd84074', 1, '2025-04-28', 'asd', 'Ban', 500000, 10000, '1745847828-Screenshot-2025-04-24-212856.png', '1745847828-Screenshot-2025-04-12-152405.png', 510000, 'Unpaid', '2025-04-28 13:43:48', '2025-04-28 13:43:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
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
  `price` double NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `no_surat_jalan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `uuid`, `no_po`, `vendor_id`, `pickup_date`, `tgl_pembuatan_po`, `origin_city`, `destination`, `vehicle_id`, `driver_id`, `price`, `invoice_id`, `no_surat_jalan`, `bukti`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4d6bafd6-cbcb-464a-9599-4fd19aea85d1', 'DO-0000001-03-2025', 1, '2025-03-17', '2025-03-17', 'Tangerang', 'Bali', 1, 1, 25000000, 1, '471998', 'IMG_20230627_051052_947.jpg', 'Active', '2025-03-17 14:46:24', '2025-03-17 14:46:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_ap`
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
  `price` int NOT NULL,
  `pajak` int DEFAULT NULL,
  `invoice_id` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `quotation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
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
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `nama_bank`, `no_rek`, `nama_rek`, `bank_code`, `swift_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT. BANK PERMATA TBK.', '702597501', 'CV MURAI JAYA LOGIST', '013', 'BBBAIDJA', '2025-03-12 05:47:20', '2025-03-12 05:47:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prices`
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
  `price` double NOT NULL,
  `project` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prices`
--

INSERT INTO `prices` (`price_id`, `uuid`, `vehicle_id`, `origin_city`, `destination_city`, `min`, `max`, `status`, `price`, `project`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '02df0175-339e-4cb4-bd57-14cafb4b71b1', 1, 'Tangerang', 'Bali', 10, 1000, 'active', 25000000, 'BATU BARA', '2025-03-17 14:42:17', '2025-03-17 14:42:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening_koran`
--

CREATE TABLE `rekening_koran` (
  `rek_koran_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `reference_data` varchar(50) NOT NULL,
  `reference_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `tanggal` int NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `jumlah` int NOT NULL,
  `no_document` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int NOT NULL,
  `uuid` varchar(80) NOT NULL,
  `driver_id` int NOT NULL,
  `salary` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `salaries`
--

INSERT INTO `salaries` (`salary_id`, `uuid`, `driver_id`, `salary`, `tanggal`, `bukti`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cf39bcd7-fc5c-4570-9542-8b2ead57a397', 1, 50000000, '2025-05-01', '1746080429-Screenshot-2025-04-12-114712.png', 'Success', '2025-05-01 06:20:29', '2025-05-01 06:20:45', '2025-05-01 06:20:49'),
(2, '9c2d29c0-e976-4197-8ef2-fc76369638d8', 1, 6000000, '2025-05-03', '1746284424-Screenshot-2025-04-12-105540.png', 'Success', '2025-05-03 15:00:24', '2025-05-03 15:00:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `status_pembayaran_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `invoice_id` int NOT NULL,
  `bukti_data` varchar(150) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah` int NOT NULL,
  `sisa_bayar` int DEFAULT NULL,
  `total_bayar` int NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`status_pembayaran_id`, `uuid`, `invoice_id`, `bukti_data`, `tanggal_pembayaran`, `jumlah`, `sisa_bayar`, `total_bayar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6096517f-4d34-47c6-abf3-36152cdf2c27', 1, '1746927160-Screenshot-2025-04-12-105540.png', '2025-05-11', 10000000, 18750000, 28750000, 'Partial', '2025-05-11 01:32:40', '2025-05-11 01:32:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `reference_table` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reference_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `jenis_transaction` varchar(25) NOT NULL,
  `type_transaction` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `uuid`, `reference_table`, `reference_id`, `payment_id`, `jenis_transaction`, `type_transaction`, `transaction_date`, `amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '90ce73a9-0575-4556-9ee9-342914d0fe09', 'maintenance', 1, 1, 'Repair', 'outcome', '2025-04-28', 110000.00, 'Paid', '2025-05-03 13:43:00', '2025-05-03 13:43:00', NULL),
(2, 'ee7b4b82-bd8b-42a4-895f-8f9d6dcf389b', 'status_pembyaran (invoices)', 1, 1, 'Payment', 'income', '2025-05-11', 10000000.00, 'Partial', '2025-05-11 01:32:40', '2025-05-11 01:32:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`users_id`, `uuid`, `username`, `name`, `password`, `profile`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '97ebb797-43c7-4ba7-a4fa-6680b924b567', 'admin', 'Administrator', '$2y$10$sBxBehzQ1P7qK6w6k5Lsuuk5tbAvm2/1YV6jhDF8UGcP6qM.gtd.u', 'a.jpg', 'Administrator', '2025-03-07 15:10:35', '2025-03-07 15:10:35'),
(2, '9bb51d16-3de3-4290-b340-98abfacf083b', 'guest', 'Guest', '$2y$10$cXzApXmnyAddPuYUqvBIWudVL2pmignnWOciIziZJ8H7dKI7GCfhG', 'IMG-20250309-WA0004.jpg', 'Admin', '2025-03-09 08:32:24', '2025-03-13 15:57:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicles`
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
-- Dumping data untuk tabel `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `uuid`, `plat_number`, `truck_type`, `truck_sub_type`, `plat_color`, `stnk`, `kir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '65846bed-0619-4b0e-bcee-65fd3b88829b', 'A 4190 ZM', 'Tronton', 'Wings Box', 'Merah', 'a.jpg', '455587-minimalism-vector_art.jpg', '2025-03-17 14:33:44', '2025-03-17 14:33:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
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
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `uuid`, `company_name`, `address`, `sales`, `sales_support`, `email`, `phone`, `npwp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6a9ad90c-6266-4612-b007-01eeec2459b3', 'PT Makmur', 'Balaraja', 'Siapa', 'Siapa', 'siapa@gmail.com', '082112897925', '1234567890', '2025-03-17 14:32:57', '2025-03-17 14:32:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `orders_ap`
--
ALTER TABLE `orders_ap`
  ADD PRIMARY KEY (`order_ap_id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indeks untuk tabel `rekening_koran`
--
ALTER TABLE `rekening_koran`
  ADD PRIMARY KEY (`rek_koran_id`);

--
-- Indeks untuk tabel `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indeks untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`status_pembayaran_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indeks untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `maintenance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders_ap`
--
ALTER TABLE `orders_ap`
  MODIFY `order_ap_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekening_koran`
--
ALTER TABLE `rekening_koran`
  MODIFY `rek_koran_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `status_pembayaran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
