-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2025 pada 16.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpa_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `add_ons`
--

CREATE TABLE `add_ons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_addon` varchar(255) NOT NULL,
  `keterangan_addon` varchar(255) NOT NULL,
  `harga_addon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `add_ons`
--

INSERT INTO `add_ons` (`id`, `produk_id`, `nama_addon`, `keterangan_addon`, `harga_addon`, `created_at`, `updated_at`) VALUES
(3, 1, 'Dress Putih', 'Pilihan Ukuran XL dan L', '5000000', '2024-12-21 06:11:23', '2024-12-21 06:11:23'),
(4, 1, 'Nasi Goreng', 'Enak Puoll', '1000000', '2025-01-09 07:09:35', '2025-01-09 07:09:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'Family', '2024-11-10 01:15:01', '2024-11-10 03:02:34'),
(3, 'Wedding', '2024-11-10 01:23:34', '2025-01-09 07:04:32'),
(4, 'Pre wedding', '2024-11-10 03:02:43', '2024-11-10 03:02:43'),
(6, 'Wisuda', '2024-11-25 06:20:10', '2024-11-25 06:20:10'),
(7, 'Sempro', '2024-12-21 03:41:47', '2024-12-21 04:58:43'),
(25, 'Testing', '2024-12-29 01:40:15', '2024-12-29 01:40:15'),
(26, 'Tas', '2024-12-29 01:40:22', '2024-12-29 01:40:22'),
(27, 'Tes', '2024-12-29 01:40:28', '2024-12-29 01:40:28'),
(28, 'Tis', '2024-12-29 01:40:37', '2024-12-29 01:40:37'),
(30, 'Halo', '2024-12-29 01:40:55', '2024-12-29 01:40:55'),
(31, 'Bro', '2024-12-29 01:41:46', '2024-12-29 01:41:46'),
(32, 'Kero', '2025-01-09 07:03:50', '2025-01-09 07:03:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_18_130551_create_kategoris_table', 1),
(6, '2024_10_18_131111_create_produks_table', 2),
(7, '2024_10_18_131248_create_add_ons_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('tannicholas54@gmail.com', '$2y$10$1olRuZMDVRkTaqRfehwzpeOlqk5b8splBv9i8IFtettxX66fnAhoS', '2024-11-08 20:25:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolios`
--

CREATE TABLE `portofolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `foto_portofolio` varchar(255) NOT NULL,
  `status_portofolio` enum('foto','video') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `portofolios`
--

INSERT INTO `portofolios` (`id`, `produk_id`, `foto_portofolio`, `status_portofolio`, `created_at`, `updated_at`) VALUES
(3, 2, '1tBULeHrUaTv6Ylb6qJyZ6u2OcwL0Sw32', 'foto', '2024-12-19 05:08:11', '2025-01-03 21:46:45'),
(8, 2, '1pwivyPyfa05Yh6Ufzxm7V-KB43LstJyO', 'foto', '2024-12-26 05:46:19', '2024-12-26 05:48:46'),
(9, 1, '1pdC2WAA1qCiQtrUBd-bHRBsPBm1LAuP3', 'foto', '2025-01-03 22:23:08', '2025-01-03 22:23:08'),
(10, 2, '1CoXmoI0_r1idMYshxJLMMkVA94Ag2szt', 'video', '2025-01-03 23:32:58', '2025-01-03 23:32:58'),
(12, 1, '1LTgiDa7Q4YIjxaCB4m2DCXIfz_CTOGsK', 'foto', '2025-01-06 21:35:50', '2025-01-06 21:35:50'),
(13, 2, '1j4zvX9z28KbNwY8fIGwyu56teDOoRiRP', 'foto', '2025-01-06 21:48:17', '2025-01-06 21:48:17'),
(14, 2, '1VygXnu9zJ3htizKDHLt5FxIySPHmwATu', 'foto', '2025-01-09 06:56:35', '2025-01-09 06:56:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `durasi_foto` varchar(255) NOT NULL,
  `edit_foto` varchar(255) NOT NULL,
  `total_crew` varchar(255) NOT NULL,
  `cetak_foto` varchar(255) NOT NULL,
  `total_orang` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `nama_produk`, `durasi_foto`, `edit_foto`, `total_crew`, `cetak_foto`, `total_orang`, `harga_produk`, `created_at`, `updated_at`) VALUES
(1, 2, 'Paket Wedding', '1 jam', 'Available', '5', '5', '2', '500000', '2024-11-15 22:38:57', '2024-11-16 01:08:51'),
(2, 4, 'Paket Pre Wedding', '1 jam', 'Available', '5', '5', '2', '1000000', '2024-11-16 00:05:04', '2025-01-09 07:05:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_hp`, `email_verified_at`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nicholas', 'JL. Taman Asri', '081327710594', '2024-10-26 03:28:18', 'tannicholas54@gmail.com', '$2y$10$baB/IuvGIwd62i/4mqFj5udWgyGhN9gu5SB16jQVytpqeuuPxsVsy', 'mYtIb12u1CciWaJQQBixVb98Eh3Cs7fdXr2ptJlioRgrKD5EOzsbl7syqxaB', '2024-10-26 03:28:18', '2024-10-26 03:28:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_ons_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portofolios_produk_id_foreign` (`produk_id`) USING BTREE;

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `add_ons`
--
ALTER TABLE `add_ons`
  ADD CONSTRAINT `add_ons_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
