-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2021 pada 14.39
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ekraf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `published` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi` longtext CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tgl_event` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `urutan` int(2) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_menu`, `nama_menu`, `url`, `urutan`, `icon`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 0, 'Home', 'home', 1, 'fa fa-home', '2021-03-01 19:55:06', '2021-03-06 14:22:47', '270e8b89-f2de-41f9-8234-dfc1bba1d7d0'),
(2, 0, 'Data Master', 'data-master', 8, 'fa fa-database', '2021-03-06 10:24:13', '2021-03-08 19:50:54', '28c8e6ba-0d9f-49c7-bb22-4d3b4527c91c'),
(3, 2, 'Sektor', 'data-master/sektor', 1, '-', '2021-03-06 10:25:06', '2021-03-06 12:36:59', 'f31aa4c4-8a4a-4a36-8a79-d6761c981369'),
(4, 0, 'Setting', 'setting', 9, 'fas fa-cogs', '2021-03-06 11:49:48', '2021-03-08 19:50:48', '4b5e74bd-ec0f-47c6-80e4-36c131d3b802'),
(7, 4, 'Menu', 'setting/menu', 1, '-', '2021-03-06 12:54:10', '2021-03-06 12:54:10', '6fa9ff16-b5fc-4024-ba09-3b47ffd0be36'),
(8, 4, 'Role', 'setting/role', 2, '-', '2021-03-06 12:54:38', '2021-03-06 12:54:38', 'cc2f8d56-9828-477c-b923-7913bfef5f5f'),
(9, 4, 'Role Menu', 'setting/role_menu', 3, '-', '2021-03-06 12:55:09', '2021-03-06 15:51:38', '89a44338-d516-4dd8-85d4-8a033c3b3c83'),
(10, 0, 'Data Pengguna', 'user', 7, 'fas fa-users', '2021-03-06 12:56:11', '2021-03-08 19:51:01', 'b6350a8a-0942-4a4a-adfc-dc88ce3e1533'),
(12, 0, 'Profil', 'profil', 2, 'fa fa-user', '2021-03-06 15:54:13', '2021-03-06 15:54:13', 'e365ea6a-756a-463f-a24c-ad23dbad8240'),
(13, 0, 'UMKM', 'umkm', 3, 'fa fa-building', '2021-03-06 15:55:04', '2021-03-06 15:55:04', 'ad04fa62-d27a-47c0-8427-533d73ff778c'),
(14, 0, 'Berita', 'berita', 4, 'fa fa-newspaper', '2021-03-08 08:27:55', '2021-03-08 08:28:40', '6da9d7ca-b4ce-4928-b7ba-69758bf2c6e6'),
(15, 0, 'Galeri', '#', 5, 'fa fa-image', '2021-03-08 19:07:26', '2021-03-08 19:07:26', '54d97448-7e30-40fe-9214-6f84877cab9a'),
(16, 15, 'Foto', 'galeri/foto', 1, '-', '2021-03-08 19:08:00', '2021-03-08 19:08:00', '27efecb5-2280-40ee-9b50-ecb31d331761'),
(17, 15, 'Video', 'galeri/video', 2, '-', '2021-03-08 19:08:13', '2021-03-08 19:08:13', '3d0aec17-8b5f-403b-9903-2b5b1fbbd276'),
(18, 0, 'Event', 'event', 6, 'fa fa-calendar', '2021-03-08 19:51:18', '2021-03-08 19:51:46', '892a37e2-1ebd-4323-9e07-4b7c4cda0e7a');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-03-06 13:06:49', '2021-03-06 13:06:49'),
(2, 'Admin', '2021-03-06 13:07:17', '2021-03-06 13:07:17'),
(3, 'Pelaku Usaha', '2021-03-06 13:07:31', '2021-03-06 13:07:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-06 13:16:01', '2021-03-06 13:16:01'),
(2, 1, 10, '2021-03-06 13:17:00', '2021-03-06 13:17:00'),
(3, 1, 2, '2021-03-06 13:17:28', '2021-03-06 13:17:28'),
(4, 1, 3, '2021-03-06 13:18:09', '2021-03-06 13:18:09'),
(5, 1, 4, '2021-03-06 13:18:16', '2021-03-06 13:18:16'),
(6, 1, 7, '2021-03-06 13:18:23', '2021-03-06 13:18:23'),
(7, 1, 8, '2021-03-06 13:18:29', '2021-03-06 13:18:29'),
(8, 1, 9, '2021-03-06 13:18:38', '2021-03-06 13:18:38'),
(9, 1, 12, '2021-03-06 15:55:23', '2021-03-06 15:55:23'),
(10, 1, 13, '2021-03-06 15:55:34', '2021-03-06 15:55:34'),
(11, 1, 14, '2021-03-08 08:28:07', '2021-03-08 08:28:07'),
(12, 1, 16, '2021-03-08 19:08:46', '2021-03-08 19:08:46'),
(13, 1, 17, '2021-03-08 19:08:51', '2021-03-08 19:08:51'),
(14, 1, 15, '2021-03-08 19:09:09', '2021-03-08 19:09:09'),
(15, 1, 18, '2021-03-08 19:51:27', '2021-03-08 19:51:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor`
--

CREATE TABLE `sektor` (
  `id` int(11) NOT NULL,
  `nama_sektor` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sektor`
--

INSERT INTO `sektor` (`id`, `nama_sektor`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Aplikasi Dan Game', '2021-02-28 09:58:03', '2021-02-28 11:49:09', '14ba80fe-0fa7-47a9-9255-f326646a9f86'),
(3, 'Musik', '2021-03-01 18:51:42', '2021-03-01 18:51:42', '406ee979-e5d4-4689-b708-ce9ca6833776'),
(4, 'Kuliner', '2021-03-01 18:51:52', '2021-03-01 18:51:52', '24125ee1-4754-4727-9479-6c2a3e7fba64'),
(5, 'Film, Animasi, dan Video', '2021-03-01 18:52:13', '2021-03-01 18:52:13', 'de47aa6b-0344-4670-8820-171a6209eedf'),
(6, 'Arsitektur', '2021-03-01 18:52:26', '2021-03-01 18:52:26', 'b547ada0-0dc8-4ffc-ae49-55792e3f6488'),
(7, 'Desain Produk', '2021-03-01 18:52:34', '2021-03-01 18:52:34', '9d1accbd-3940-445b-94fa-992fa5495347'),
(8, 'Desain Interior', '2021-03-01 18:52:46', '2021-03-01 18:52:46', 'b934117a-7655-4965-b634-60ba76cac41a'),
(9, 'Fotografi', '2021-03-01 18:52:54', '2021-03-01 18:52:54', '41c4fd1c-0ee0-4cc1-ad67-e6e1a62acb74'),
(10, 'Periklanan', '2021-03-01 18:53:06', '2021-03-01 18:53:06', 'ca735d77-4f96-4c9d-9e5a-836f73b152e8'),
(11, 'Desain Komunikasi Visual', '2021-03-01 18:53:21', '2021-03-01 18:53:21', '274e2175-398e-4942-b69e-f4051294cce9'),
(12, 'Fashion', '2021-03-01 18:53:31', '2021-03-01 18:53:31', 'b2a308b3-48e5-4b27-acd3-4b69e39fe6fc'),
(13, 'Kriya', '2021-03-01 18:53:41', '2021-03-01 18:53:41', '70885e19-09c2-4f09-8dc8-c010eac8d3ba'),
(14, 'Penerbitan', '2021-03-01 18:53:48', '2021-03-01 18:53:48', 'def39585-ad40-4431-b494-0cbdf28883d9'),
(15, 'Seni Pertunjukan', '2021-03-01 18:54:01', '2021-03-01 18:54:01', '69502dc8-58c0-464e-961c-02848c5ba886'),
(16, 'Seni Rupa', '2021-03-01 18:54:12', '2021-03-01 18:54:12', '165a391d-b9bd-482b-b539-e7b4f6f124b6'),
(17, 'Televisi dan Radio', '2021-03-01 18:54:21', '2021-03-01 18:54:21', '2c39723f-7c9b-4948-8145-c0f84697ab56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `verifikasi`, `photo`, `created_at`, `updated_at`, `is_active`, `uuid`) VALUES
(1, 'Nanang Ms', 'nanang.ms22@gmail.com', 1, NULL, '$2y$10$uCAE4NrLrEtGl7nTig8wnOdjJjF3Y/neA6AjtRSUHxbu03x8IfJra', NULL, '', NULL, '2021-02-26 20:42:29', '2021-02-26 20:42:29', 'Y', 'asaaaaaaa'),
(15, 'fikri2', 'fikri@gmail.com', 1, NULL, '$2y$10$SOZWK9NsgIyKKEykfc6FB.sso.dAOFbRpxeI11OSqaD/ljdIxlnOG', NULL, NULL, NULL, '2021-03-06 13:08:31', '2021-03-08 07:41:10', 'Y', 'ee2ffcf1-f135-4230-a28d-aa874949dafe'),
(16, 'Rizki', 'rizki@gmail.com', 1, NULL, '$2y$10$IsI2Ea.8T1fqOfnDT0gDueScHdGGBP3ytwQn/NMFtuQsE/AvfGlzO', NULL, NULL, NULL, '2021-03-06 13:10:50', '2021-03-06 13:10:50', 'Y', 'f7008b0b-465d-4a8f-a8c4-be49f0b0aede');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
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
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
