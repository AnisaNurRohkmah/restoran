-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 03:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `mejas`
--

CREATE TABLE `mejas` (
  `idmeja` int(10) UNSIGNED NOT NULL,
  `nomormeja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mejas`
--

INSERT INTO `mejas` (`idmeja`, `nomormeja`, `created_at`, `updated_at`) VALUES
(1, 3, '2019-05-13 00:00:00', '2019-05-23 00:00:00'),
(3, 5, '2019-05-13 08:55:56', '2019-05-13 08:55:56'),
(5, 7, '2019-05-13 09:03:31', '2019-05-13 09:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `namamenu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `namamenu`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Ayam Bakar Rica Rica', 45000, '2019-05-02 08:24:54', '2019-05-02 08:24:54'),
(4, 'Nasi Goreng', 40000, '2019-05-06 08:51:39', '2019-05-06 08:51:39'),
(5, 'Pecel', 15000, '2019-05-06 09:55:52', '2019-05-06 09:56:43'),
(6, 'Mie Ayam', 20000, '2019-05-06 11:10:24', '2019-05-06 11:10:24'),
(7, 'Chicked Filled', 66000, '2019-05-07 09:08:09', '2019-05-12 01:06:52'),
(8, 'Sate Ayam', 40000, '2019-05-13 08:40:09', '2019-05-13 08:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_02_044303_create_menus_table', 1),
(4, '2019_05_02_044514_create_pelanggans_table', 1),
(5, '2019_05_02_044528_create_pesanans_table', 1),
(6, '2019_05_02_044538_create_transaksis_table', 1),
(7, '2019_05_02_050305_add_relation_to_pesanans', 2),
(8, '2019_05_02_050321_add_relation_to_transaksis', 2),
(9, '2014_10_12_000000_users_table', 3),
(10, '2019_05_12_090020_create_mejas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(10) UNSIGNED NOT NULL,
  `namapelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` int(11) NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `namapelanggan`, `sex`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(3, 'Melati', 'Perempuan', 9876543, 'Bandar Lampung', '2019-05-04 21:51:36', '2019-05-05 01:23:15'),
(4, 'Siska', 'Perempuan', 789654, 'Tegineneng', '2019-05-06 05:48:56', '2019-05-06 05:48:56'),
(5, 'Putra', 'Laki Laki', 123457, 'Jakarta', '2019-05-06 05:49:29', '2019-05-06 05:49:29'),
(6, 'indah', 'Perempuan', 1234567, 'Natar', '2019-05-06 11:00:08', '2019-05-06 11:02:08'),
(7, 'Afika', 'Perempuan', 123456, 'Natar', '2019-05-13 08:17:42', '2019-05-13 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `idpesanan` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`idpesanan`, `menu_id`, `pelanggan_id`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 5, 6, 3, 4, '2019-05-07 05:03:27', '2019-05-07 05:03:27'),
(15, 6, 4, 2, 4, '2019-05-07 06:13:04', '2019-05-07 06:13:04'),
(16, 4, 5, 10, 3, '2019-05-07 23:25:53', '2019-05-07 23:25:53'),
(17, 4, 5, 6, 3, '2019-05-12 00:53:13', '2019-05-12 00:53:13'),
(18, 7, 7, 1, 3, '2019-05-13 08:23:55', '2019-05-13 08:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesanan_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `pesanan_id`, `total`, `bayar`, `created_at`, `updated_at`) VALUES
(8, 16, 400000, 400000, NULL, NULL),
(10, 16, 400000, 500000, NULL, NULL),
(11, 18, 6, 700000, '2019-05-12 17:14:00', '2019-05-12 17:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('kasir','admin','owner','waiter') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'raisa', 'admin', '$2y$10$uhFpyRNx2XT4A/ycpX53/uviAu442h7zGU0gjHgm4S3HLawd40Rfq', '2gezwnvEfdSLzFG58sZWSn4IBJ0NyBWYFJmQDLWHl2kpVvnwHbroQGs6WEf5', '2019-05-05 20:43:53', '2019-05-05 20:43:53'),
(3, 'alisia', 'waiter', '$2y$10$M6nBJkCKWttK0eJjlZg0Ae.0p5wkVhH20EGDbyDJSEM/xvLxDNydu', 'NFZ0K749icbrVbaKiaYV36T7OCVU1SXXsdecqBtAZwt6K0v2oQtiFm9x4OOE', '2019-05-06 20:31:54', '2019-05-06 20:31:54'),
(4, 'rahma', 'kasir', '$2y$10$ihKVrVJw4/FI9KyvhJt7WuKUyyI1bWYiAlYP0Q9.8bZmto4TwN8ci', 'WTfvNdrblsYZ81DrinAF0c5SCotCNFXuHCwMK6oI8ywAp70yRuE6TnDev9p5', '2019-05-06 20:33:59', '2019-05-06 20:33:59'),
(5, 'anisa', 'owner', '$2y$10$d7Um/di7cE9Ob7fXPHiYE.Cgs0f7H7HpXwTQLQJa1DjOsoRHX1XH.', 'pNcfoIyQqTRRGPR6lRLATeyuPvuRr39zRuT0fUNytsdF3NKpmc6ehuzuBGwe', '2019-05-06 20:34:40', '2019-05-06 20:34:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mejas`
--
ALTER TABLE `mejas`
  ADD PRIMARY KEY (`idmeja`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `pesanans_menu_id_foreign` (`menu_id`),
  ADD KEY `pesanans_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mejas`
--
ALTER TABLE `mejas`
  MODIFY `idmeja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `idpesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`idpesanan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
