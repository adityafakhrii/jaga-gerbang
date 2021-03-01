-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2020 pada 14.24
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaga-gerbang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(8) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nis`, `nama`, `kelas_id`, `created_at`, `updated_at`) VALUES
(41, 11707105, 'Aditya Fakhri Riansyah', 2, NULL, '2019-10-07 14:45:32'),
(45, 11707108, 'Ath-Thariq', 2, NULL, '2019-12-16 16:43:07'),
(46, 11707171, 'Dimas', 12, NULL, '2019-12-16 16:43:24'),
(47, 11707181, 'Siti', 1, NULL, '2019-10-07 14:45:32'),
(48, 11708785, 'Ramzy', 7, '2019-12-16 15:03:26', '2019-12-16 15:03:26'),
(49, 11707070, 'Ferdy', 13, '2019-12-16 15:29:49', '2019-12-16 15:29:49'),
(50, 11707345, 'Adi Rizki', 10, '2019-12-16 15:55:10', '2019-12-16 15:55:10'),
(51, 11707115, 'Dimas Anugrah', 2, '2020-01-16 01:53:17', '2020-01-16 01:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'XII Rekayasa Perangkat Lunak 1', NULL, NULL),
(2, 'XII Rekayasa Perangkat Lunak 2', NULL, NULL),
(3, 'XII Teknik Komputer dan Jaringan 1', '2019-09-23 15:36:06', '2019-09-23 15:36:06'),
(4, 'XII Teknik Komputer dan Jaringan 2', '2019-09-23 15:36:19', '2019-09-23 15:36:19'),
(5, 'XII Akuntansi dan Keuangan Lembaga 1', '2019-09-24 07:43:06', '2019-09-24 07:43:06'),
(7, 'XII Akuntansi dan Keuangan Lembaga 2', '2019-09-26 02:22:45', '2019-09-26 02:22:45'),
(8, 'XII Akuntansi dan Keuangan Lembaga 3', '2019-09-26 02:22:51', '2019-09-26 02:22:51'),
(9, 'XII Bisnis Daring dan Pemasaran 1', '2019-09-26 02:23:19', '2019-09-26 02:23:19'),
(10, 'XII Bisnis Daring dan Pemasaran 2', '2019-09-26 02:24:50', '2019-09-26 02:24:50'),
(11, 'XII Bisnis Daring dan Pemasaran 3', '2019-09-26 02:25:57', '2019-09-26 02:25:57'),
(12, 'XII Otomatisasi dan Tata Kelola Perkantoran 1', '2019-09-26 02:26:52', '2019-09-26 02:26:52'),
(13, 'XII Otomatisasi dan Tata Kelola Perkantoran 2', '2019-09-26 02:33:46', '2019-09-26 02:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_02_074500_create_kelas_table', 1),
(4, '2019_09_03_020932_create_seksioses_table', 1),
(5, '2019_09_21_130121_create_data_siswas_table', 1),
(6, '2019_09_23_214720_create_siswa_telat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seksioses`
--

CREATE TABLE `seksioses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_seksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seksioses`
--

INSERT INTO `seksioses` (`id`, `nama_seksi`, `jumlah_anggota`, `bidang`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Seksi Bidang 1', '6', 'Pembinaan keimanan dan ketakwaan terhadap Tuhan Yang Maha Esa', 11, '2019-09-26 02:55:07', '2019-09-26 02:55:07'),
(7, 'Seksi Bidang 2', '3', 'Pembinaan kepribadian unggul, wawasan kebangsaan, dan bela negara', 12, '2019-09-26 02:55:43', '2019-09-26 02:55:43'),
(8, 'Seksi Bidang 3', '4', 'Pembinaan kepribadian unggul, wawasan kebangsaan, dan bela negara', 13, '2019-09-26 02:56:31', '2019-09-26 02:56:31'),
(9, 'Seksi Bidang 4', '5', 'Pembinaan prestasi akademik, seni, dan/atau olahraga sesuai bakat dan minat', 14, '2019-09-26 02:57:56', '2019-09-26 02:57:56'),
(10, 'Seksi Bidang 5', '5', 'Pembinaan demokrasi, hak asasi manusia, pendidikan politik, lingkungan hidup, kepekaan dan toleransi sosial dalam konteks masyarakat plural', 15, '2019-09-26 02:59:12', '2019-09-26 02:59:12'),
(11, 'Seksi Bidang 6', '4', 'Pembinaan kreativitas, keterampilan dan kewirausahaan', 16, '2019-09-26 03:03:22', '2019-09-26 03:03:22'),
(12, 'Seksi Bidang 7', '6', 'Pembinaan kualitas jasmani, kesehatan dan gizi berbasis sumber gizi yang terdiversifikasi', 17, '2019-09-26 03:04:17', '2019-09-26 03:04:17'),
(13, 'Seksi Bidang 8', '5', 'Pembinaan sastra dan budaya', 18, '2019-09-26 03:05:18', '2019-09-26 03:05:18'),
(14, 'Seksi Bidang 9', '4', 'TIK', 22, '2019-10-07 14:29:27', '2019-10-07 14:29:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_telat`
--

CREATE TABLE `siswa_telat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pukul_telat` time NOT NULL,
  `batas_waktu_sanksi` time NOT NULL,
  `ket_sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dikonfirmasi',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_telat`
--

INSERT INTO `siswa_telat` (`id`, `siswa_id`, `pukul_telat`, `batas_waktu_sanksi`, `ket_sanksi`, `created_at`, `updated_at`) VALUES
(36, 41, '13:20:01', '13:35:01', 'sudah', '2019-09-10', '2019-09-30 06:30:05'),
(37, 41, '13:32:56', '13:47:56', 'belum dikonfirmasi', '2019-09-20', '2019-09-29 17:00:00'),
(38, 41, '14:19:01', '14:34:01', 'belum dikonfirmasi', '2019-09-30', '2019-09-30 07:19:08'),
(40, 41, '21:38:53', '21:53:53', 'sudah', '2019-10-07', '2019-10-07 14:39:43'),
(41, 41, '16:08:06', '16:23:06', 'sudah', '2019-10-11', '2019-10-11 09:09:46'),
(43, 41, '22:58:36', '23:13:36', 'belum dikonfirmasi', '2019-12-14', '2019-12-14 15:58:50'),
(45, 45, '18:37:24', '18:52:24', 'sudah', '2019-12-15', '2019-12-15 12:06:44'),
(46, 47, '18:40:14', '18:55:14', 'belum', '2019-12-15', '2019-12-15 12:06:29'),
(48, 46, '19:12:45', '19:27:45', 'belum dikonfirmasi', '2019-12-15', '2019-12-15 12:13:03'),
(50, 48, '23:51:19', '00:06:19', 'belum', '2019-12-16', '2019-12-16 16:51:51'),
(51, 45, '00:04:19', '00:19:19', 'belum', '2019-12-17', '2019-12-16 17:21:44'),
(52, 49, '00:21:09', '00:36:09', 'sudah', '2019-12-17', '2019-12-16 17:21:52'),
(53, 48, '00:22:10', '00:37:10', 'belum dikonfirmasi', '2019-12-17', '2019-12-16 17:22:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin', '$2y$10$W8IxgGoui/.jcGjxj1XQXeFi1UXoP88wzMRdSThil9Fr5RdjXbFlO', NULL, '2019-09-23 14:58:04', '2019-09-23 14:58:04'),
(11, 'osis', 'Seksi Bidang 1', 'sekbid1', '$2y$10$SPcdstWMEQdXc5q2AzC9re7rtPVPmN9yaNlWKADFkDUc1H6RsIWai', 'UpUq6xtyOGXdGFjCeTG04LsqErc95YQ91If9NxxhLyDwqaaxBNcRAAwE3hhA', '2019-09-26 02:55:07', '2019-09-26 02:55:07'),
(12, 'osis', 'Seksi Bidang 2', 'sekbid2', '$2y$10$Dgqs68Ngs/JqDEP5R6oBieH.DbILadZY7amqSQzqNji7Iz3i89BdK', 'NodH9yncfoA98PclXjeY6XyfUii1A73Tbicgk7JL4gtyqLmBVth6X400q9tb', '2019-09-26 02:55:43', '2019-09-26 02:55:43'),
(13, 'osis', 'Seksi Bidang 3', 'sekbid3', '$2y$10$o66kH78Bx0uAdnCHauAZyuvJMpQ7GJ2tMNC1CFS24OSdwhasK7e3O', 'Heb6aUatRFE17k5yaEoWM5gzsjm2rJlUQhJ7dXWLJ935DmFbrzvQYTtlpN70', '2019-09-26 02:56:31', '2019-09-26 02:56:31'),
(14, 'osis', 'Seksi Bidang 4', 'sekbid4', '$2y$10$stRaSwcdrDSvCXTusM86teb5.bafqgDAHYBRQflwydmIs/CrM4glu', 'Y1eccZFWJa71ArAk6Z3foHsjYCePNQYEmu1mH3gz8dnwcsPFcE2VNmAev7Rs', '2019-09-26 02:57:56', '2019-09-26 02:57:56'),
(15, 'osis', 'Seksi Bidang 5', 'sekbid5', '$2y$10$mFmUDEsJWvNm2tdqIXOfbu5wCW/.AOdXs9UcuwbIbA/Qn.L6VKlta', 'mdjqelrAiVGyKGIubXySsUL47oJKdBp4m8XyHfTZEZMesJYQCAYkQ1cT7nF1', '2019-09-26 02:59:12', '2019-09-26 02:59:12'),
(16, 'osis', 'Seksi Bidang 6', 'sekbid6', '$2y$10$KB.6JzE1vMR4TeqhqJwVie.RfEI2HFYOWfc.fLQb09ftliqDD7iQa', 'm3wVqHjzuRtKKXf7oZm38yQKM1HSgTU0T8iMboc7GbWwYLQ7tvU3cue7QUzn', '2019-09-26 03:03:21', '2019-09-26 03:03:21'),
(17, 'osis', 'Seksi Bidang 7', 'sekbid7', '$2y$10$M7NHGd4/mDI3/YkKslmsr.ZmnQTIo0fnihV21Iieyk0ZkbhtaiKF2', 'NXB6Ncn7owDiq06D1Ltx9JyJwt46pzcOD1qtZrboKWuYKhvmeSAPD5O2hLWk', '2019-09-26 03:04:17', '2019-09-26 03:04:17'),
(18, 'osis', 'Seksi Bidang 8', 'sekbid8', '$2y$10$xoaIzcbKXsSb7thRoFlTD.lVxOEfCL50auk485x87B3slWn2HhzR2', 'fCfKjv2go6EEbJkxGq05zuwQ2yZRfZKcRBaGPLGb9TlOIMhtUcbJ9i2BeTRJ', '2019-09-26 03:05:17', '2019-09-26 03:05:17'),
(21, 'wakasek', 'Wakasek', 'wakasek', '$2y$10$ZSwnTta.qOyZg0F30C5oWuESulDmWlEOYmGDuvu97gB4jTq2KOKPe', NULL, '2019-09-30 06:43:36', '2019-09-30 06:43:36'),
(22, 'osis', 'Seksi Bidang 9', 'sekbid9', '$2y$10$UPQl//dFDFn0dYS.JN.46.UCtTo6KY8.bTniKeWT/jpNpaXqad1f2', 'tdbwbkmAbddVMmF3JmpnAQ35DasPVAKJ3QCIEk4XSXmWqmbR1zZFKmlBefyf', '2019-10-07 14:29:27', '2019-10-07 14:29:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `seksioses`
--
ALTER TABLE `seksioses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seksioses_nama_seksi_unique` (`nama_seksi`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `siswa_telat`
--
ALTER TABLE `siswa_telat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `seksioses`
--
ALTER TABLE `seksioses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `siswa_telat`
--
ALTER TABLE `siswa_telat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seksioses`
--
ALTER TABLE `seksioses`
  ADD CONSTRAINT `seksioses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_telat`
--
ALTER TABLE `siswa_telat`
  ADD CONSTRAINT `siswa_telat_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `data_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
