-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 09:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama_album` varchar(100) NOT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama_album`, `published`, `created_at`, `updated_at`, `uuid`) VALUES
(5, 'Album pertama', 'Y', '2021-03-17 10:03:26', '2021-03-17 17:03:26', '66514d21-6160-4957-8a91-bf394ca7a8a9');

-- --------------------------------------------------------

--
-- Table structure for table `badan_hukum`
--

CREATE TABLE `badan_hukum` (
  `id` int(11) NOT NULL,
  `nama_badan_hukum` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badan_hukum`
--

INSERT INTO `badan_hukum` (`id`, `nama_badan_hukum`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'CV', '2021-03-12 22:13:26', '2021-03-12 22:14:18', '5be6860a-eb38-42a2-8afb-a1f7ebf2c340'),
(3, 'Firma', '2021-03-13 15:13:11', '2021-03-13 15:13:11', '2c56b71e-5dc0-4415-9146-aa568e060965'),
(4, 'PT', '2021-03-13 15:13:44', '2021-03-13 15:13:44', '80e06990-8e96-4cb6-b26a-a5dbc479a0b2'),
(5, 'Tidak Ada', '2021-03-13 15:13:56', '2021-03-13 15:13:56', '2508c208-5238-4073-90a1-9c18c82609da'),
(6, 'Lainnya', '2021-03-20 21:19:10', '2021-03-20 21:19:10', '4513665e-d456-4b4f-83af-347177644f2c');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
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
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `judul`, `judul_seo`, `kategori_id`, `tag`, `published`, `isi`, `gambar`, `dibaca`, `created_at`, `updated_at`, `uuid`) VALUES
(47, 15, 'Judul Berita 1', 'judul-berita-1', 2, 'Tag 1', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Judul_Berita_1_iEsFw.png', 1, '2021-03-11 04:46:41', '2021-03-17 16:05:17', 'ad64b0b6-1f3f-4475-a55f-3dcb9f9b285d'),
(52, 15, 'Judul Berita 2', 'judul-berita-2', 3, 'Tag 1', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Judul_Berita_2_saULs.jpg', 1, '2021-03-17 08:50:23', '2021-03-17 16:06:54', '1a53b778-185a-4a6b-ab2d-df1480c8a425'),
(53, 15, 'Judul Berita 3', 'judul-berita-3', 2, 'Tag 1', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Judul_Berita_3_nC2nP.jpg', 1, '2021-03-17 08:57:57', '2021-03-17 16:12:23', 'bca02595-363f-494c-9a2a-25a5ad6402c9'),
(54, 15, 'Ini adalah Judul Artikel yang keempat', 'ini-adalah-judul-artikel-yang-keempat', 3, 'Tag 1', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Judul_Berita_4_g8DYn.jpg', 1, '2021-03-17 09:19:48', '2021-03-30 06:53:13', '04ef2236-9a6c-4dc8-8c23-8d7b6f2a8fab'),
(55, 15, 'Judul Berita 5', 'judul-berita-5', 3, 'Tag 1', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Judul_Berita_5_1a28w.jpg', 1, '2021-03-17 09:39:35', '2021-03-17 16:39:35', 'cd11b67a-e0b7-401c-9f65-8acaf0a8b677');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `event_seo` varchar(255) NOT NULL,
  `tgl_event` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto_banner` varchar(255) DEFAULT NULL,
  `published` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `event_seo`, `tgl_event`, `lokasi`, `deskripsi`, `foto_banner`, `published`, `created_at`, `updated_at`, `uuid`) VALUES
(9, 'Seminar Web', 'seminar-web', '2021-04-01', 'Rumah Sendiri', 'isi deskripsi', NULL, 'Y', '2021-03-30 13:19:02', '2021-03-30 20:19:02', 'c61bc136-2426-4f82-a652-040ec56d60b1'),
(28, 'Event Badan Ekonomi Kreatif Jambi 2021', 'event-badan-ekonomi-kreatif-jambi-2021', '2021-04-04', 'Kantor Ekraf Jambi', 'This is the first item\'s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.', 'Event_Badan_Ekonomi_Kreatif_Jambi_2021_ADtju.jpg', 'Y', '2021-03-30 13:30:12', '2021-03-30 20:30:12', '10633f48-af2b-4cfb-b962-3abb4b27f175');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faq`
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
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `urutan`, `kategori`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`, `uuid`) VALUES
(12, 1, 'Umum', 'Bagaimana Tahapan Buat Akun baru?', '<p>Adapun cara Tahapan 1 (Proses Register) adalah :\r\n\r\n    </p><ol><li>Akses web ekrafjambi.com\r\n    </li><li>Klik \"DAFTAR\".\r\nLakukan pengisian data pada form yang disediakan secara lengkap dan benar,\r\n    Kemudian klik \"DAFTAR\"</li><li>Pendaftaran Berhasil, Admin akan memverifikasi data pendaftaran anda dan anda akan menerima notifikasi via email bahwa akun anda sudah aktif.</li><li>jika akun anda sudah aktif. lakukan Login/masuk ke akun dengan memasukan email dan password yang telah dibuat pada saat pendaftaran </li><li>Lengkapi profil usaha anda dengan benar dan lengkap.<br></li></ol>', '2021-03-13 22:39:59', '2021-04-13 14:22:04', '2177b8d7-59ec-4cf0-a034-fe481bccc97c'),
(13, 2, 'Umum', 'Bagaimana Cara Reset Password?', '<ol><li>masuk ke halaman login\r\n    Klik link \"Lupa Password?\"\r\n    masukkan alamat email yang sudah terdaftar\r\n    </li><li>buka email (bisa di folder spam)\r\n    klik link/URL yang ada di email (otomatis masuk halaman reset password)\r\n    </li><li>masukkan password baru, dan\r\n    selesai (otomatis login)</li></ol>', '2021-03-13 22:40:34', '2021-04-13 14:24:18', 'c395174f-2dd7-4b4e-b88b-3a269971c1a6'),
(14, 3, 'Umum', 'Siapa saja yang bisa membuat akun ?', 'Siapa saja yang memiliki usaha / kemampuan personality sesuai dengan 16 sektor ekonomi kreatif.', '2021-03-13 22:41:00', '2021-03-13 22:41:00', '67bb2f9e-3d5d-4869-a154-31b28e579068'),
(15, 4, 'Umum', 'Kenapa hanya Wilayah Jambi ?', 'Kami hanya berfokus di wilayah Provinsi Jambi<br>', '2021-03-13 22:41:33', '2021-04-13 14:25:29', '65150f35-6038-4a57-9553-cbf9d756717a'),
(16, 5, 'Umum', 'Bagaimana kerahasiaan data para member ?', 'Kami tidak bertanggung jawab atas segala informasi yang digunakan oleh oknum-oknum tertentu untuk perbuatan yang tidak betanggung jawab. Pastikan data yang anda berikan adalah data memang perlu dibagikan ke umum.', '2021-03-13 22:42:07', '2021-03-13 22:42:07', 'bb66f98b-28eb-4fb6-bf7b-496319145951'),
(17, 6, 'Umum', 'Apakah ada dana yang perlu disetorkan ?', 'Kami tidak pernah meminta satu sen pun kepada member walaupun nanti misalkan ada, informasi akan kami sampakan langsung melalui Web Official ekrafjambi.com', '2021-03-13 22:42:31', '2021-04-13 14:26:26', '0a1b8c85-c78e-4fbc-8e0a-8b57f262c154');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `gambar`, `keterangan`, `album_id`, `created_at`, `updated_at`, `uuid`) VALUES
(17, '_4c192.jpg', 'Foto pertama', 5, '2021-03-17 11:53:45', '2021-03-17 11:05:35', '58e03402-d634-48b5-a2e8-1e1473ca9c29'),
(20, '_iF25h.jpg', 'Foto kedua', 5, '2021-03-17 04:54:38', '2021-03-17 11:54:38', '049557d4-72d3-4912-a7d3-b65c93172b21'),
(21, '_TOjIS.jpg', 'Foto ketiga', 5, '2021-03-17 04:55:26', '2021-03-17 11:55:26', 'd8dbf63b-2012-4aac-b8bd-d0632fa6f559'),
(22, '_tpDTk.jpg', 'Foto keempat', 5, '2021-03-17 04:55:51', '2021-03-17 11:55:51', 'c2bee384-a6c0-4fed-83af-0143211b2cb6'),
(23, '_EA19G.jpg', 'Foto kelima', 5, '2021-03-17 04:56:16', '2021-03-17 11:56:16', '97fbfb8d-5a43-4e55-8cab-54f2825072bc'),
(24, '_OsBpH.jpg', 'Foto keenam', 5, '2021-03-17 04:57:00', '2021-03-17 11:57:00', '8166f48b-137b-4565-8af0-4a797bd2d44a'),
(28, 'Album_pertama_LR2ff.jpg', 'Foto ketujuh', 5, '2021-03-30 11:45:49', '2021-03-30 18:45:49', '0734a0b8-5cde-4649-8c3b-4cb098a06d5d'),
(29, 'Album_pertama_WdOLS.jpg', 'Foto kedelapan', 5, '2021-03-30 11:46:21', '2021-03-30 18:46:21', 'be6e95a1-92ea-4fc8-9f2a-7f1267fdf945'),
(30, 'Album_pertama_sefL8.jpg', 'Foto kesembilan', 5, '2021-03-30 11:46:48', '2021-03-30 18:46:48', '4c8a3398-36af-42f5-ae00-218c9359f51a');

-- --------------------------------------------------------

--
-- Table structure for table `kab_kota`
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
-- Dumping data for table `kab_kota`
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
-- Table structure for table `kategori`
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
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kategori_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'kat1', 'kat1', '2021-03-15 10:12:49', '2021-03-15 10:17:09', '19213fbc-d463-4f8e-885c-31da5b178c4a'),
(3, 'kat2', 'kat2', '2021-03-15 10:15:15', '2021-03-15 10:16:49', 'd1568714-00dc-45f4-951b-315eb15b46ca');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
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
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_menu`, `nama_menu`, `url`, `urutan`, `icon`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 0, 'Home', 'home', 1, 'fa fa-home', '2021-03-01 19:55:06', '2021-03-06 14:22:47', '270e8b89-f2de-41f9-8234-dfc1bba1d7d0'),
(2, 0, 'Data Master', 'data-master', 11, 'fa fa-database', '2021-03-06 10:24:13', '2021-04-05 08:19:59', '28c8e6ba-0d9f-49c7-bb22-4d3b4527c91c'),
(3, 2, 'Sektor', 'data-master/sektor', 1, '-', '2021-03-06 10:25:06', '2021-03-06 12:36:59', 'f31aa4c4-8a4a-4a36-8a79-d6761c981369'),
(4, 0, 'Setting', 'setting', 12, 'fas fa-cogs', '2021-03-06 11:49:48', '2021-04-05 08:20:05', '4b5e74bd-ec0f-47c6-80e4-36c131d3b802'),
(7, 4, 'Menu', 'setting/menu', 1, '-', '2021-03-06 12:54:10', '2021-03-06 12:54:10', '6fa9ff16-b5fc-4024-ba09-3b47ffd0be36'),
(8, 4, 'Role', 'setting/role', 2, '-', '2021-03-06 12:54:38', '2021-03-06 12:54:38', 'cc2f8d56-9828-477c-b923-7913bfef5f5f'),
(9, 4, 'Role Menu', 'setting/role_menu', 3, '-', '2021-03-06 12:55:09', '2021-03-06 15:51:38', '89a44338-d516-4dd8-85d4-8a033c3b3c83'),
(10, 0, 'Data Pengguna', 'user', 10, 'fas fa-users', '2021-03-06 12:56:11', '2021-04-05 08:19:49', 'b6350a8a-0942-4a4a-adfc-dc88ce3e1533'),
(12, 0, 'Profil Usaha', 'pengguna/profil-usaha', 2, 'fa fa-building', '2021-03-06 15:54:13', '2021-03-26 08:32:26', 'e365ea6a-756a-463f-a24c-ad23dbad8240'),
(13, 0, 'Pelaku EKRAF', 'pelaku_ekraf', 3, 'fa fa-building', '2021-03-06 15:55:04', '2021-03-11 15:40:15', 'ad04fa62-d27a-47c0-8427-533d73ff778c'),
(14, 0, 'Berita', 'berita', 4, 'fa fa-newspaper', '2021-03-08 08:27:55', '2021-03-08 08:28:40', '6da9d7ca-b4ce-4928-b7ba-69758bf2c6e6'),
(15, 0, 'Galeri', 'galeri', 6, 'fa fa-image', '2021-03-08 19:07:26', '2021-04-05 08:18:29', '54d97448-7e30-40fe-9214-6f84877cab9a'),
(16, 15, 'Foto', 'galeri/album', 1, '-', '2021-03-08 19:08:00', '2021-03-15 08:32:28', '27efecb5-2280-40ee-9b50-ecb31d331761'),
(17, 15, 'Video', 'galeri/video', 2, '-', '2021-03-08 19:08:13', '2021-03-08 19:08:13', '3d0aec17-8b5f-403b-9903-2b5b1fbbd276'),
(18, 0, 'Event', 'event', 7, 'fa fa-calendar', '2021-03-08 19:51:18', '2021-04-05 08:18:37', '892a37e2-1ebd-4323-9e07-4b7c4cda0e7a'),
(19, 2, 'Kabupaten/Kota', 'data-master/kabupaten', 2, '-', '2021-03-11 21:48:34', '2021-03-11 21:48:34', '304499fd-f291-49b0-ab55-ae555ab9e615'),
(20, 2, 'Badan Hukum', 'data-master/badanhukum', 3, '-', '2021-03-11 23:12:20', '2021-03-12 22:11:20', '2c7559ca-1df0-4363-9c4b-5c5c3aec3991'),
(21, 0, 'Pendaftaran', 'pendaftaran', 2, 'fa fa-edit', '2021-03-11 23:28:09', '2021-03-20 21:07:34', 'd2f1a852-ba96-4d17-8ca9-20a86076157b'),
(22, 0, 'FAQ', 'faq', 9, 'fa fa-paw', '2021-03-13 22:24:22', '2021-04-05 08:19:41', '37e934f1-705c-4857-94cf-13a9106aa200'),
(23, 2, 'Kategori', 'data-master/kategori', 4, '-', '2021-03-15 09:55:20', '2021-03-15 09:55:20', 'fae34c0f-93ea-43eb-ab5f-7c3dd7eb6d6d'),
(24, 2, 'Tag', 'data-master/tag', 5, '-', '2021-03-15 09:55:37', '2021-03-15 09:55:37', 'bf66ad7d-0dca-4889-be6e-11b8ac036d2b'),
(25, 2, 'Setting Website', 'data-master/setting-web', 6, '-', '2021-03-20 23:53:03', '2021-03-20 23:53:03', '28373d9d-7976-4029-b551-e5b9a8f8bc4c'),
(26, 0, 'Produk', 'produk', 5, 'fa fa-database', '2021-03-23 07:57:15', '2021-04-05 08:18:18', '715ede49-59c2-48e6-99b4-c5658bfb0a6e'),
(27, 0, 'Produk Usaha', 'pengguna/produk-usaha', 3, 'fa fa-tags', '2021-03-26 08:33:39', '2021-03-26 08:33:39', '582e3ea5-e0b2-4146-92ee-09404b978283'),
(28, 0, 'Dashboard', 'pengguna/dashboard', 1, 'fa fa-home', '2021-03-26 08:34:35', '2021-03-26 08:34:53', '8c0bafbb-efdf-48c4-9e76-8c595f1349ec'),
(29, 0, 'Laporan', 'laporan', 8, 'fas fa-file', '2021-04-05 08:15:29', '2021-04-05 08:18:45', 'f599224b-1d9e-4e59-9acd-a3560904446b');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nanang.ms22@gmail.com', '$2y$10$v.RFyEJv5/ubFXgVL/lU5OCYoPN4vwY9sfsizcknREYoq2cfIlhmm', '2021-03-27 06:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `pelaku_ekraf`
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
-- Dumping data for table `pelaku_ekraf`
--

INSERT INTO `pelaku_ekraf` (`id`, `kode_pelaku_ekraf`, `kab_kota_id`, `sektor_id`, `badan_hukum_id`, `nama_usaha`, `siup_usaha`, `mulai_usaha`, `deskripsi`, `keahlian`, `pengalaman`, `portofolio`, `alamat_usaha`, `kode_pos`, `email_usaha`, `telepon_usaha`, `facebook_usaha`, `twitter_usaha`, `ig_usaha`, `web_usaha`, `member`, `nama_pemilik`, `nik_pemilik`, `email_pemilik`, `wa_pemilik`, `fb_pemilik`, `twitter_pemilik`, `ig_pemilik`, `linkedin_pemilik`, `telegram_pemilik`, `web_pemilik`, `foto_usaha`, `foto_pemilik`, `verifikasi`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'TssjP', 8, 1, 4, 'asdasd', NULL, '2021-03-17', NULL, NULL, NULL, NULL, 'fasdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Reguler', 'asdas', '234234', 'nanang.ms22s@gmail.com', '324324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-13 21:33:25', '2021-03-13 21:33:25', '02e2066a-ff62-4179-aad2-d7a332728367'),
(3, 'JTzSX', 1, 5, 4, 'Anima video', NULL, '2008-03-12', NULL, NULL, NULL, NULL, 'Jl. tempat usaha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Reguler', 'Shuuuu', '8973242847293498', 'user@gmail.com', '+62 8546 6332 34234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 21:59:54', '2021-03-20 21:59:54', '2cb61ae2-48d1-4bf9-b569-b5d17bfa1184'),
(11, 'NHahm', 2, 4, 5, 'Remen Enak', '123131313', '2012-03-15', '<p>123<br></p>', NULL, NULL, NULL, 'Jl. Alamat usaha', '36146', NULL, NULL, NULL, NULL, NULL, NULL, 'Reguler', 'Haruka Nakagawa', '3433123213231232', 'haruka@gmail.com', '+62 8986 7874 54544', 'sss', NULL, NULL, NULL, NULL, NULL, 'Remen_Enak_pMUzu.jpg', 'Haruka_Nakagawa_cUbcE.jpg', NULL, '2021-03-20 22:49:42', '2021-03-26 23:17:25', 'c939fe6e-6b95-42e5-a3cf-ba4261398885'),
(12, 'cskvL', 1, 4, 6, 'Rumah Brownis Jambi', NULL, '2021-01-02', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;<span style=\"font-size: 1rem;\">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '<ul><li style=\"margin: 0px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li style=\"margin: 0px; padding: 0px;\">Nunc vel sapien vel elit ornare facilisis.</li><li style=\"margin: 0px; padding: 0px;\">Nam id odio vel nisi ullamcorper ultricies vitae et metus.</li><li style=\"margin: 0px; padding: 0px;\">Cras imperdiet augue id tempor lobortis.</li></ul>', NULL, NULL, 'Jl. Sore Santuy No. 123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Reguler', 'Pengusaha 1', '1234567890123456', 'pengusaha1@gmail.com', '+62 8123 4567 890', NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah_Brownis_Jambi_zbneK.jpg', NULL, NULL, '2021-03-31 10:26:18', '2021-03-31 11:40:23', 'f3184627-cc86-477a-914f-4df9543f0e85');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
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
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `kode_pelaku_ekraf`, `kab_kota_id`, `sektor_id`, `nama_lengkap`, `no_ktp`, `alamat_domisili`, `no_hp`, `email`, `jenis_usaha`, `nama_usaha`, `hasil_barang`, `sifat_produk`, `dibina`, `binaan`, `sifat_freelance`, `ada_sertifikat`, `ada_komunitas`, `nama_komunitas`, `mulai_usaha`, `jml_karyawan`, `alamat_usaha`, `ada_legalitas`, `nama_legalitas`, `badan_hukum_id`, `sistem_penjualan`, `media_online`, `sosmed`, `verifikasi`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'TssjP', 8, 1, 'asdas', '234234', 'sfsdf', '324324', 'nanang.ms22s@gmail.com', 'Jasa', 'asdasd', 'Ada', 'Jasa', 'Ya', 'asdas', 'Ada', 'Ada', 'Ada', 'adasd', '2021-03-17', '4', 'fasdsa', 'Ada', 'asdasd', 4, 'Langsung', 'Facebook,MarketPlace', 'Facebook,Instagram', 'Y', '2021-03-13 16:28:17', '2021-03-13 21:33:24', '86551a90-6d4c-4e55-83f6-d729077a50c7'),
(3, 'NHahm', 1, 4, 'Haruka Nakagawa', '3433123213231232', 'Jl. apaja', '+62 8986 7874 54544', 'haruka@gmail.com', 'Barang', 'Remen Enak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-15', '6', 'Jl. Alamat usaha', 'Tidak Ada', NULL, 5, 'Langsung', 'Facebook,Instagram', 'Facebook,Instagram,Website', 'Y', '2021-03-20 21:25:15', '2021-03-20 22:49:42', '14b02bb2-8781-488c-8ad7-37a0d8fa263d'),
(4, 'JTzSX', 1, 5, 'Shuuuu', '8973242847293498', 'Jl. domisili', '+62 8546 6332 34234', 'user@gmail.com', 'Jasa', 'Anima video', 'Ada', 'Jasa', 'Ya', 'Dinas', 'Tidak', 'Ada', 'Ada', 'komunitas video', '2008-03-12', '3', 'Jl. tempat usaha', 'Ada', 'SIUP', 4, 'Online', 'Facebook,Instagram,Website/Situs,MarketPlace', 'Facebook,Instagram,Website,Twitter', 'Y', '2021-03-20 21:32:45', '2021-03-20 21:59:54', '881172d4-8539-43d5-a45b-01776914cbe8'),
(5, 'cskvL', 1, 4, 'Pengusaha 1', '1234567890123456', 'Jl. Santay', '+62 8123 4567 890', 'pengusaha1@gmail.com', 'Barang', 'Rumah Brownis Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-02', '5', 'Jl. Sore Santuy No. 123', 'Tidak Ada', NULL, 6, 'Langsung,Online', 'Facebook,Instagram,MarketPlace', 'Facebook,Instagram', 'Y', '2021-03-31 10:25:17', '2021-03-31 10:26:18', 'a14dc1ba-5c4b-4c06-94c6-d8b730535de9'),
(7, 'AVbLF', 1, 1, 'tes', '1111111111111111', 'tes', '+62 11', 'tes@gmail.com', 'Jasa', 'tes', 'Tidak', 'Jasa', 'Tidak', NULL, 'Ya', 'Ada', 'Tidak Ada', NULL, '2021-04-06', '2', 'tes', 'Tidak Ada', NULL, 4, 'Online', 'Facebook', 'Facebook', 'N', '2021-04-05 09:19:04', '2021-04-05 09:19:04', '950b2637-8dce-4811-9d5c-021465a9954e');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_pelaku_ekraf` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_pelaku_ekraf`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `created_at`, `updated_at`, `uuid`) VALUES
(10, 'NHahm', 'Produk 1', 'Deskripsi produk 1', '1000000', 'Produk_1_M35H8.jpg', '2021-03-27 16:51:26', '2021-03-27 16:51:26', '84e8d9f7-8ac9-461b-8f47-646abee4001c');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-03-06 13:06:49', '2021-03-06 13:06:49'),
(2, 'Admin', '2021-03-06 13:07:17', '2021-03-06 13:07:17'),
(3, 'Pelaku Ekraf', '2021-03-06 13:07:31', '2021-03-11 23:09:07'),
(5, 'Pembuat Berita', '2021-04-13 14:36:40', '2021-04-13 14:37:16'),
(6, 'Verifikator', '2021-04-13 14:38:08', '2021-04-13 14:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_menu`
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
(17, 3, 28, '2021-03-11 23:10:19', '2021-03-26 08:35:22'),
(18, 3, 12, '2021-03-11 23:10:30', '2021-03-11 23:10:30'),
(19, 1, 21, '2021-03-11 23:28:26', '2021-03-11 23:28:26'),
(20, 1, 20, '2021-03-12 22:11:39', '2021-03-12 22:11:39'),
(21, 1, 22, '2021-03-13 22:24:39', '2021-03-13 22:24:39'),
(22, 1, 23, '2021-03-15 09:56:13', '2021-03-15 09:56:13'),
(23, 1, 24, '2021-03-15 09:56:18', '2021-03-15 09:56:18'),
(24, 1, 25, '2021-03-20 23:53:23', '2021-03-20 23:53:23'),
(25, 1, 26, '2021-03-23 07:57:34', '2021-03-23 07:57:34'),
(26, 3, 27, '2021-03-26 08:36:00', '2021-03-26 08:36:00'),
(27, 1, 29, '2021-04-05 08:15:52', '2021-04-05 08:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id` int(11) NOT NULL,
  `nama_sektor` varchar(100) NOT NULL,
  `seo_sektor` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id`, `nama_sektor`, `seo_sektor`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Aplikasi Dan Game Developer', 'aplikasi-dan-game-developer', '2021-02-28 09:58:03', '2021-04-13 14:03:44', '14ba80fe-0fa7-47a9-9255-f326646a9f86'),
(3, 'Musik', 'musik', '2021-03-01 18:51:42', '2021-04-13 14:03:48', '406ee979-e5d4-4689-b708-ce9ca6833776'),
(4, 'Kuliner', 'kuliner', '2021-03-01 18:51:52', '2021-04-13 14:03:52', '24125ee1-4754-4727-9479-6c2a3e7fba64'),
(5, 'Film, Animasi, dan Video', 'film-animasi-dan-video', '2021-03-01 18:52:13', '2021-04-13 14:03:57', 'de47aa6b-0344-4670-8820-171a6209eedf'),
(6, 'Arsitektur', 'arsitektur', '2021-03-01 18:52:26', '2021-04-13 14:04:01', 'b547ada0-0dc8-4ffc-ae49-55792e3f6488'),
(7, 'Desain Produk', 'desain-produk', '2021-03-01 18:52:34', '2021-04-13 14:02:58', '9d1accbd-3940-445b-94fa-992fa5495347'),
(8, 'Desain Interior', 'desain-interior', '2021-03-01 18:52:46', '2021-04-13 14:04:07', 'b934117a-7655-4965-b634-60ba76cac41a'),
(9, 'Fotografi', 'fotografi', '2021-03-01 18:52:54', '2021-04-13 14:04:14', '41c4fd1c-0ee0-4cc1-ad67-e6e1a62acb74'),
(10, 'Periklanan', 'periklanan', '2021-03-01 18:53:06', '2021-04-13 14:04:18', 'ca735d77-4f96-4c9d-9e5a-836f73b152e8'),
(11, 'Desain Komunikasi Visual', 'desain-komunikasi-visual', '2021-03-01 18:53:21', '2021-04-13 14:04:21', '274e2175-398e-4942-b69e-f4051294cce9'),
(12, 'Fashion', 'fashion', '2021-03-01 18:53:31', '2021-04-13 14:04:28', 'b2a308b3-48e5-4b27-acd3-4b69e39fe6fc'),
(13, 'Kriya', 'kriya', '2021-03-01 18:53:41', '2021-04-13 14:04:33', '70885e19-09c2-4f09-8dc8-c010eac8d3ba'),
(14, 'Penerbitan', 'penerbitan', '2021-03-01 18:53:48', '2021-04-13 14:04:39', 'def39585-ad40-4431-b494-0cbdf28883d9'),
(15, 'Seni Pertunjukan', 'seni-pertunjukan', '2021-03-01 18:54:01', '2021-04-13 14:04:45', '69502dc8-58c0-464e-961c-02848c5ba886'),
(16, 'Seni Rupa', 'seni-rupa', '2021-03-01 18:54:12', '2021-04-13 14:04:57', '165a391d-b9bd-482b-b539-e7b4f6f124b6'),
(17, 'Televisi dan Radio', 'televisi-dan-radio', '2021-03-01 18:54:21', '2021-04-13 14:04:50', '2c39723f-7c9b-4948-8145-c0f84697ab56');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
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
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `nama_tag`, `tag_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Tag 1', 'tag-1', '2021-03-15 10:19:51', '2021-03-15 14:20:01', '51f8863f-e037-42b5-a5b4-59e0087204b3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pelaku_ekraf` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_pelaku_ekraf`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `verifikasi`, `photo`, `created_at`, `updated_at`, `is_active`, `uuid`) VALUES
(1, NULL, 'Nanang Ms', 'nanang.ms22@gmail.com', 1, NULL, '$2y$10$rkjyq4LGie6tX1Jtw.R4fOaJ28souLI3WIyzrlpbdzUlVhmxhAQhm', 'GlpAyMViITXbdrNg7o3SsUcecUmVu68W7Dd9nPCajDrUYOZ1ifCEnfs0yxyM', NULL, 'Nanang_Ms_iyRUK.jpg', '2021-02-26 20:42:29', '2021-03-27 06:14:59', 'Y', 'asaaaaaaa'),
(15, NULL, 'fikri2', 'fikri@gmail.com', 1, NULL, '$2y$10$SOZWK9NsgIyKKEykfc6FB.sso.dAOFbRpxeI11OSqaD/ljdIxlnOG', NULL, NULL, NULL, '2021-03-06 13:08:31', '2021-03-08 07:41:10', 'Y', 'ee2ffcf1-f135-4230-a28d-aa874949dafe'),
(16, NULL, 'Rizki', 'rizki@gmail.com', 1, NULL, '$2y$10$IsI2Ea.8T1fqOfnDT0gDueScHdGGBP3ytwQn/NMFtuQsE/AvfGlzO', NULL, NULL, NULL, '2021-03-06 13:10:50', '2021-03-06 13:10:50', 'Y', 'f7008b0b-465d-4a8f-a8c4-be49f0b0aede'),
(19, 'NHahm', 'Haruka Nakagawa', 'haruka@gmail.com', 3, NULL, '$2y$10$1o1Guf/AT0PwoY52fZC1oOwf/TSX1JdmG/3aMQQOhTKGlA.ShFFK2', NULL, 'Y', 'Haruka_Nakagawa_7KF1b.png', '2021-03-20 14:25:15', '2021-03-26 02:35:37', 'Y', '94dda6cd-8a82-49a5-b01d-d977559e3561'),
(20, 'JTzSX', 'Shuuuu', 'user@gmail.com', 3, NULL, '$2y$10$bjhbCb.rcV/30N5Wso.uL.Cq/.QRJ6qFZjmhnNZeCvhEP7Z1xKjgW', NULL, 'Y', NULL, '2021-03-20 14:32:45', '2021-03-20 14:59:54', 'Y', '197a42cb-7494-4ce5-82d2-b40ee096f9d6'),
(21, 'cskvL', 'Pengusaha 1', 'pengusaha1@gmail.com', 3, NULL, '$2y$10$0CEtOzQ2Kt5UetC10QKR0uSMlJTBVIhofGI./1C86CbUNamqbTyEy', NULL, 'Y', NULL, '2021-03-31 03:25:18', '2021-03-31 03:26:18', 'Y', '8d43ebcf-b6fa-4fce-930b-2b6f103e4178'),
(23, 'AVbLF', 'tes', 'tes@gmail.com', 3, NULL, '$2y$10$Bh2UPYS.vN1UEQAP6zOwmeVy6h72hmNwPjWWkmPfZg5nexrzTbO9S', NULL, 'N', NULL, '2021-04-05 02:19:04', '2021-04-05 02:19:04', 'N', '5d198590-b0f9-4ec4-a7e1-9d7a34483e2d');

-- --------------------------------------------------------

--
-- Table structure for table `video`
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
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badan_hukum`
--
ALTER TABLE `badan_hukum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kab_kota`
--
ALTER TABLE `kab_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- Indexes for table `pelaku_ekraf`
--
ALTER TABLE `pelaku_ekraf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pelaku_ekraf` (`kode_pelaku_ekraf`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `badan_hukum`
--
ALTER TABLE `badan_hukum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelaku_ekraf`
--
ALTER TABLE `pelaku_ekraf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
