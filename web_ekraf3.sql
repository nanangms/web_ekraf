-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2021 pada 09.49
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
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama_album` varchar(100) NOT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `badan_hukum`
--

CREATE TABLE `badan_hukum` (
  `id` int(11) NOT NULL,
  `nama_badan_hukum` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `badan_hukum`
--

INSERT INTO `badan_hukum` (`id`, `nama_badan_hukum`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'CV', '2021-03-12 22:13:26', '2021-03-12 22:14:18', '5be6860a-eb38-42a2-8afb-a1f7ebf2c340'),
(3, 'Firma', '2021-03-13 15:13:11', '2021-03-13 15:13:11', '2c56b71e-5dc0-4415-9146-aa568e060965'),
(4, 'PT', '2021-03-13 15:13:44', '2021-03-13 15:13:44', '80e06990-8e96-4cb6-b26a-a5dbc479a0b2'),
(5, 'Tidak Ada', '2021-03-13 15:13:56', '2021-03-13 15:13:56', '2508c208-5238-4073-90a1-9c18c82609da');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tag` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `published` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi` longtext CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `judul`, `judul_seo`, `kategori_id`, `tag`, `published`, `isi`, `gambar`, `dibaca`, `created_at`, `updated_at`, `uuid`) VALUES
(47, 1, 'Judul Berita1', 'judul-berita1', 0, '', 'Y', '<p>isi berita</p>', 'Judul_Berita_iUoUe.jpg', 1, '2021-03-11 04:46:41', '2021-03-15 01:06:51', 'ad64b0b6-1f3f-4475-a55f-3dcb9f9b285d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `event_seo` varchar(255) NOT NULL,
  `tgl_event` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
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
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `urutan`, `kategori`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`, `uuid`) VALUES
(12, 1, 'Umum', 'Bagaimana Tahapan Buat Akun baru?', 'Adapun cara Tahapan 1 (Proses Register) adalah :\r\n\r\n    Akses web akukreatif.com\r\n    Klik \"Buat Akun Baru\"\r\n    Lakukan pengisian data\r\n    Kemudian klik \"Buat Akun Baru\"\r\n\r\nTahapan 2 adalah :\r\n\r\n    Login / masuk ke akun yang telah dibuat tadi dengan memasukkan username dan password.\r\n    Klik \"Profil\"\r\n    Posisi samping Kanan adalah untuk Data Pemilik. Untuk update data bisa klik \"Edit Profil\" pada samping kanan.\r\n    Update Data Anda, kemudian klik Update Profil apabila sudah selesai.\r\n    Kemudian dilanjutkan proses \"Update Profil Usaha\"\r\n    Lakukan pengisian data secara lengkap dan persentasi yang baik.\r\n    Klik \"Simpan\" apabila selesai.\r\n    Untuk melengkapi profil dengan gambar Anda harus kembali lagi pada point 5, yaitu Update Profil Usaha.\r\n    Setelah itu fitur upload akan tersedia, dan langsung lakukan proses upload\r\n    Terakhir klik \"Simpan\"\r\n\r\nMaka Profil Anda sudah tampil lengkap di Beranda.', '2021-03-13 22:39:59', '2021-03-13 22:39:59', '2177b8d7-59ec-4cf0-a034-fe481bccc97c'),
(13, 2, 'Umum', 'bagaimana Cara Reset Password', 'masuk halaman login\r\n    Klik link \"Lupa Password?\"\r\n    masukkan alamat email yang sudah terdaaftar\r\n    buka email (bisa di folder spam)\r\n    klik link/URL yang ada di email (otomatis masuk halaman reset password)\r\n    masukkan alamat email, dan password baru\r\n    selesai (otomatis login)', '2021-03-13 22:40:34', '2021-03-13 22:40:34', 'c395174f-2dd7-4b4e-b88b-3a269971c1a6'),
(14, 3, 'Umum', 'Siapa saja yang bisa membuat akun ?', 'Siapa saja yang memiliki usaha / kemampuan personality sesuai dengan 16 sektor ekonomi kreatif.', '2021-03-13 22:41:00', '2021-03-13 22:41:00', '67bb2f9e-3d5d-4869-a154-31b28e579068'),
(15, 4, 'Umum', 'Kenapa hanya Wilayah Jambi ?', 'Untuk sementara kami hanya memfokus wilayah Kalimantan Selatan dulu. Walaupun ada daerah lain, itu dikarenakan owner dari produk tersebut merupakan orang asli Wilayah itu sendiri.', '2021-03-13 22:41:33', '2021-03-13 22:41:33', '65150f35-6038-4a57-9553-cbf9d756717a'),
(16, 5, 'Umum', 'Bagaimana kerahasiaan data para member ?', 'Kami tidak bertanggung jawab atas segala informasi yang digunakan oleh oknum-oknum tertentu untuk perbuatan yang tidak betanggung jawab. Pastikan data yang anda berikan adalah data memang perlu dibagikan ke umum.', '2021-03-13 22:42:07', '2021-03-13 22:42:07', 'bb66f98b-28eb-4fb6-bf7b-496319145951'),
(17, 6, 'Umum', 'Apakah ada dana yang perlu disetorkan ?', 'Kami tidak pernah meminta satu sen pun kepada member walaupun nanti misalkan ada, informasi akan kami sampakan langsung melalui Web Official akukreatif.com.', '2021-03-13 22:42:31', '2021-03-13 22:42:31', '0a1b8c85-c78e-4fbc-8e0a-8b57f262c154');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kab_kota`
--

CREATE TABLE `kab_kota` (
  `id` int(11) NOT NULL,
  `nama_kab_kota` varchar(100) NOT NULL,
  `seo_kab_kota` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kab_kota`
--

INSERT INTO `kab_kota` (`id`, `nama_kab_kota`, `seo_kab_kota`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Kota Jambi', 'kota-jambi', '2021-03-11 21:56:12', '2021-03-11 22:20:02', '160f4c37-c890-4a01-a013-a2a3a013a4d5'),
(2, 'Kab. Kerinci', 'kab-kerinci', '2021-03-11 21:59:13', '2021-03-11 22:07:26', '178d85e3-d812-4f1a-abf4-fe5c5d94d388'),
(4, 'Kab. Bungo', 'kab-bungo', '2021-03-11 22:17:21', '2021-03-11 22:17:21', 'b7e6bb77-752f-4015-9426-32de9089c109'),
(5, 'Kab. Merangin', 'kab-merangin', '2021-03-11 22:17:35', '2021-03-11 22:17:35', '82781221-6dfa-4af1-bd27-2f45e2feb181'),
(6, 'Kab. Muaro Jambi', 'kab-muaro-jambi', '2021-03-11 22:17:50', '2021-03-11 22:17:50', '4bc0995e-38fd-4ae9-a1bf-6786c1ddcf77'),
(7, 'Kab. Sarolangun', 'kab-sarolangun', '2021-03-11 22:18:03', '2021-03-11 22:18:03', '8920fa6e-0e03-47e2-9b05-40e6a0273d07'),
(8, 'Kab. Tanjung Jabung Barat', 'kab-tanjung-jabung-barat', '2021-03-11 22:18:23', '2021-03-11 22:18:23', '47e3add8-9f76-4506-bb76-eb6dc2e00193'),
(9, 'Kab. Tanjung Jabung Timur', 'kab-tanjung-jabung-timur', '2021-03-11 22:18:57', '2021-03-11 22:18:57', 'e08aca2e-25bf-45ae-a8d3-7d1784a83a04'),
(10, 'Kab. Tebo', 'kab-tebo', '2021-03-11 22:19:05', '2021-03-11 22:19:05', 'd1516b82-5afb-48ef-bca7-71ed5b7a6373'),
(11, 'Kota Sungai Penuh', 'kota-sungai-penuh', '2021-03-11 22:19:24', '2021-03-11 22:19:24', '62bdb522-8b31-437c-949e-9d945500ac1c'),
(12, 'Kab. Batang Hari', 'kab-batang-hari', '2021-03-11 22:19:47', '2021-03-11 22:19:47', 'ef07fc8c-4872-4f3e-b109-ada1f027fefd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kategori_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'kat1', 'kat1', '2021-03-15 10:12:49', '2021-03-15 10:17:09', '19213fbc-d463-4f8e-885c-31da5b178c4a'),
(3, 'kat2', 'kat2', '2021-03-15 10:15:15', '2021-03-15 10:16:49', 'd1568714-00dc-45f4-951b-315eb15b46ca');

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
(13, 0, 'Pelaku EKRAF', 'pelaku_ekraf', 3, 'fa fa-building', '2021-03-06 15:55:04', '2021-03-11 15:40:15', 'ad04fa62-d27a-47c0-8427-533d73ff778c'),
(14, 0, 'Berita', 'berita', 4, 'fa fa-newspaper', '2021-03-08 08:27:55', '2021-03-08 08:28:40', '6da9d7ca-b4ce-4928-b7ba-69758bf2c6e6'),
(15, 0, 'Galeri', 'galeri', 5, 'fa fa-image', '2021-03-08 19:07:26', '2021-03-08 19:07:26', '54d97448-7e30-40fe-9214-6f84877cab9a'),
(16, 15, 'Foto', 'galeri/album', 1, '-', '2021-03-08 19:08:00', '2021-03-15 08:32:28', '27efecb5-2280-40ee-9b50-ecb31d331761'),
(17, 15, 'Video', 'galeri/video', 2, '-', '2021-03-08 19:08:13', '2021-03-08 19:08:13', '3d0aec17-8b5f-403b-9903-2b5b1fbbd276'),
(18, 0, 'Event', 'event', 6, 'fa fa-calendar', '2021-03-08 19:51:18', '2021-03-08 19:51:46', '892a37e2-1ebd-4323-9e07-4b7c4cda0e7a'),
(19, 2, 'Kabupaten/Kota', 'data-master/kabupaten', 2, '-', '2021-03-11 21:48:34', '2021-03-11 21:48:34', '304499fd-f291-49b0-ab55-ae555ab9e615'),
(20, 2, 'Badan Hukum', 'data-master/badanhukum', 3, '-', '2021-03-11 23:12:20', '2021-03-12 22:11:20', '2c7559ca-1df0-4363-9c4b-5c5c3aec3991'),
(21, 0, 'Pendaftaran', 'pendaftaran', 3, 'fa fa-edit', '2021-03-11 23:28:09', '2021-03-13 19:07:54', 'd2f1a852-ba96-4d17-8ca9-20a86076157b'),
(22, 0, 'FAQ', 'faq', 7, 'fa fa-paw', '2021-03-13 22:24:22', '2021-03-13 22:24:22', '37e934f1-705c-4857-94cf-13a9106aa200'),
(23, 2, 'Kategori', 'data-master/kategori', 4, '-', '2021-03-15 09:55:20', '2021-03-15 09:55:20', 'fae34c0f-93ea-43eb-ab5f-7c3dd7eb6d6d'),
(24, 2, 'Tag', 'data-master/tag', 5, '-', '2021-03-15 09:55:37', '2021-03-15 09:55:37', 'bf66ad7d-0dca-4889-be6e-11b8ac036d2b');

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
-- Struktur dari tabel `pelaku_ekraf`
--

CREATE TABLE `pelaku_ekraf` (
  `id` int(11) NOT NULL,
  `kode_pelaku_ekraf` varchar(10) NOT NULL,
  `kab_kota_id` int(3) NOT NULL,
  `sektor_id` int(3) NOT NULL,
  `badan_hukum_id` int(3) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `siup_usaha` varchar(100) DEFAULT NULL,
  `mulai_usaha` date NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `pengalaman` text DEFAULT NULL,
  `portofolio` text DEFAULT NULL,
  `alamat_usaha` text NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `email_usaha` varchar(255) DEFAULT NULL,
  `telepon_usaha` varchar(50) DEFAULT NULL,
  `facebook_usaha` varchar(100) DEFAULT NULL,
  `twitter_usaha` varchar(50) DEFAULT NULL,
  `ig_usaha` varchar(50) DEFAULT NULL,
  `web_usaha` varchar(100) DEFAULT NULL,
  `member` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `nik_pemilik` varchar(50) DEFAULT NULL,
  `email_pemilik` varchar(255) NOT NULL,
  `wa_pemilik` varchar(50) NOT NULL,
  `fb_pemilik` varchar(50) DEFAULT NULL,
  `twitter_pemilik` varchar(50) DEFAULT NULL,
  `ig_pemilik` varchar(50) DEFAULT NULL,
  `linkedin_pemilik` varchar(50) DEFAULT NULL,
  `telegram_pemilik` varchar(50) DEFAULT NULL,
  `web_pemilik` varchar(100) DEFAULT NULL,
  `foto_usaha` varchar(100) DEFAULT NULL,
  `foto_pemilik` varchar(100) DEFAULT NULL,
  `verifikasi` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelaku_ekraf`
--

INSERT INTO `pelaku_ekraf` (`id`, `kode_pelaku_ekraf`, `kab_kota_id`, `sektor_id`, `badan_hukum_id`, `nama_usaha`, `siup_usaha`, `mulai_usaha`, `deskripsi`, `keahlian`, `pengalaman`, `portofolio`, `alamat_usaha`, `kode_pos`, `email_usaha`, `telepon_usaha`, `facebook_usaha`, `twitter_usaha`, `ig_usaha`, `web_usaha`, `member`, `nama_pemilik`, `nik_pemilik`, `email_pemilik`, `wa_pemilik`, `fb_pemilik`, `twitter_pemilik`, `ig_pemilik`, `linkedin_pemilik`, `telegram_pemilik`, `web_pemilik`, `foto_usaha`, `foto_pemilik`, `verifikasi`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'TssjP', 8, 1, 4, 'asdasd', NULL, '2021-03-17', NULL, NULL, NULL, NULL, 'fasdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Reguler', 'asdas', '234234', 'nanang.ms22s@gmail.com', '324324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-13 21:33:25', '2021-03-13 21:33:25', '02e2066a-ff62-4179-aad2-d7a332728367');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `kode_pelaku_ekraf` varchar(5) NOT NULL,
  `kab_kota_id` int(3) NOT NULL,
  `sektor_id` int(4) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_usaha` varchar(20) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `hasil_barang` varchar(50) DEFAULT NULL,
  `sifat_produk` varchar(50) DEFAULT NULL,
  `dibina` varchar(50) DEFAULT NULL,
  `binaan` varchar(100) DEFAULT NULL,
  `sifat_freelance` varchar(20) DEFAULT NULL,
  `ada_sertifikat` varchar(20) DEFAULT NULL,
  `ada_komunitas` varchar(20) DEFAULT NULL,
  `nama_komunitas` varchar(255) DEFAULT NULL,
  `mulai_usaha` date NOT NULL,
  `jml_karyawan` varchar(10) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `ada_legalitas` varchar(20) DEFAULT NULL,
  `nama_legalitas` varchar(255) DEFAULT NULL,
  `badan_hukum_id` int(3) DEFAULT NULL,
  `sistem_penjualan` varchar(255) NOT NULL,
  `media_online` varchar(255) NOT NULL,
  `sosmed` varchar(255) NOT NULL,
  `verifikasi` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `kode_pelaku_ekraf`, `kab_kota_id`, `sektor_id`, `nama_lengkap`, `no_ktp`, `alamat_domisili`, `no_hp`, `email`, `jenis_usaha`, `nama_usaha`, `hasil_barang`, `sifat_produk`, `dibina`, `binaan`, `sifat_freelance`, `ada_sertifikat`, `ada_komunitas`, `nama_komunitas`, `mulai_usaha`, `jml_karyawan`, `alamat_usaha`, `ada_legalitas`, `nama_legalitas`, `badan_hukum_id`, `sistem_penjualan`, `media_online`, `sosmed`, `verifikasi`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'TssjP', 8, 1, 'asdas', '234234', 'sfsdf', '324324', 'nanang.ms22s@gmail.com', 'Jasa', 'asdasd', 'Ada', 'Jasa', 'Ya', 'asdas', 'Ada', 'Ada', 'Ada', 'adasd', '2021-03-17', '4', 'fasdsa', 'Ada', 'asdasd', 4, 'Langsung', 'Facebook,MarketPlace', 'Facebook,Instagram', 'Y', '2021-03-13 16:28:17', '2021-03-13 21:33:24', '86551a90-6d4c-4e55-83f6-d729077a50c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `pelaku_ekraf_id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Pelaku Ekraf', '2021-03-06 13:07:31', '2021-03-11 23:09:07');

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
(10, 1, 13, '2021-03-06 15:55:34', '2021-03-06 15:55:34'),
(11, 1, 14, '2021-03-08 08:28:07', '2021-03-08 08:28:07'),
(12, 1, 16, '2021-03-08 19:08:46', '2021-03-08 19:08:46'),
(13, 1, 17, '2021-03-08 19:08:51', '2021-03-08 19:08:51'),
(14, 1, 15, '2021-03-08 19:09:09', '2021-03-08 19:09:09'),
(15, 1, 18, '2021-03-08 19:51:27', '2021-03-08 19:51:27'),
(16, 1, 19, '2021-03-11 21:48:56', '2021-03-11 21:48:56'),
(17, 3, 1, '2021-03-11 23:10:19', '2021-03-11 23:10:19'),
(18, 3, 12, '2021-03-11 23:10:30', '2021-03-11 23:10:30'),
(19, 1, 21, '2021-03-11 23:28:26', '2021-03-11 23:28:26'),
(20, 1, 20, '2021-03-12 22:11:39', '2021-03-12 22:11:39'),
(21, 1, 22, '2021-03-13 22:24:39', '2021-03-13 22:24:39'),
(22, 1, 23, '2021-03-15 09:56:13', '2021-03-15 09:56:13'),
(23, 1, 24, '2021-03-15 09:56:18', '2021-03-15 09:56:18');

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
(1, 'Aplikasi Dan Game Developer', '2021-02-28 09:58:03', '2021-03-12 09:12:06', '14ba80fe-0fa7-47a9-9255-f326646a9f86'),
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
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `nama_tag` varchar(25) NOT NULL,
  `tag_seo` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id`, `nama_tag`, `tag_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Tag 1', 'tag-1', '2021-03-15 10:19:51', '2021-03-15 14:20:01', '51f8863f-e037-42b5-a5b4-59e0087204b3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pelaku_ekraf` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `kode_pelaku_ekraf`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `verifikasi`, `photo`, `created_at`, `updated_at`, `is_active`, `uuid`) VALUES
(1, '', 'Nanang Ms', 'nanang.ms22@gmail.com', 1, NULL, '$2y$10$JMmjN/0/y81ZiX0ZJpgaAOLK/j.AfXlLVco/DXstasPwqaycM8JQC', NULL, NULL, 'Nanang_Ms_iyRUK.jpg', '2021-02-26 20:42:29', '2021-03-11 09:58:15', 'Y', 'asaaaaaaa'),
(15, '', 'fikri2', 'fikri@gmail.com', 1, NULL, '$2y$10$SOZWK9NsgIyKKEykfc6FB.sso.dAOFbRpxeI11OSqaD/ljdIxlnOG', NULL, NULL, NULL, '2021-03-06 13:08:31', '2021-03-08 07:41:10', 'Y', 'ee2ffcf1-f135-4230-a28d-aa874949dafe'),
(16, '', 'Rizki', 'rizki@gmail.com', 1, NULL, '$2y$10$IsI2Ea.8T1fqOfnDT0gDueScHdGGBP3ytwQn/NMFtuQsE/AvfGlzO', NULL, NULL, NULL, '2021-03-06 13:10:50', '2021-03-06 13:10:50', 'Y', 'f7008b0b-465d-4a8f-a8c4-be49f0b0aede');

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
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `badan_hukum`
--
ALTER TABLE `badan_hukum`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kab_kota`
--
ALTER TABLE `kab_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
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
-- Indeks untuk tabel `pelaku_ekraf`
--
ALTER TABLE `pelaku_ekraf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pelaku_ekraf` (`kode_pelaku_ekraf`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `tag`
--
ALTER TABLE `tag`
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
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `badan_hukum`
--
ALTER TABLE `badan_hukum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelaku_ekraf`
--
ALTER TABLE `pelaku_ekraf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
