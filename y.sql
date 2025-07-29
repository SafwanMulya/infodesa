-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2025 at 02:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desawebinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$ifLjegcFPoKZ33OQ0zuTnu.vkUK0WJ8EKqGs4nUBdIBYrMTRKfVL6', NULL, '2025-07-09 07:14:07', '2025-07-28 22:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint UNSIGNED NOT NULL,
  `islam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kristen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `katolik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `hindu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `budha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `konghucu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `persentase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `islam`, `kristen`, `katolik`, `hindu`, `budha`, `konghucu`, `jumlah`, `persentase`, `created_at`, `updated_at`) VALUES
(1, '671', '0', '0', '0', '137', '0', '0', '0', '2025-07-27 23:53:31', '2025-07-27 23:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datadesas`
--

CREATE TABLE `datadesas` (
  `id` bigint UNSIGNED NOT NULL,
  `penduduk_laki_laki` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `penduduk_perempuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `penduduk_jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datadesas`
--

INSERT INTO `datadesas` (`id`, `penduduk_laki_laki`, `penduduk_perempuan`, `penduduk_jumlah`, `created_at`, `updated_at`) VALUES
(1, '848', '837', '1685', '2025-07-27 23:52:50', '2025-07-27 23:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hilders`
--

CREATE TABLE `hilders` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hilders`
--

INSERT INTO `hilders` (`id`, `judul`, `isi`, `alamat`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'DESA TAMERAN', 'Desa Tameran terletak di Kecamatan Bengkalis, Kabupaten Bengkalis, Provinsi Riau, Indonesia, dengan luas sekitar 22 km² dan dihuni oleh sekitar 1.875 jiwa, yang berarti memiliki kepadatan penduduk sekitar 85,23 jiwa/km². Desa ini memiliki kode pos 28740 dan berada pada koordinat 1°27′25.200″N 102°13′22.800″E. Tameran merupakan desa yang masih dalam tahap pengembangan dan termasuk dalam kategori rintisan di Indonesia.', 'Tameran adalah sebuah desa yang terletak di Kecamatan Bengkalis, Kabupaten Bengkalis, Riau, Indonesia.', 'uploads/hilder/1753685162_WhatsApp Image 2025-07-28 at 13.42.16.jpeg', '2025-07-27 23:46:02', '2025-07-27 23:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasis`
--

INSERT INTO `informasis` (`id`, `judul`, `tanggal`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'KELUARGA PENERIMA MANFAAT BLT DESA TAMERAN TAHUN ANGGARAN', '2025-07-03', 'No.	NIK	Nama Kepala Keluarga	Jenis Kelamin	Tanggal Lahir	Jumlah Anggota Keluarga	Alamat	RT	RW	Jenis Pekerjaan\r\n									\r\n1	2	3	4	5	6	7	8	9	10\r\n1	1403014609670738	FATIMAH	PEREMPUAN	9/6/1967	5	DUSUN SUNGAI TEMERAN	001	001	MENGURUS RUMAH TANGGA\r\n2	1403046109570576	AIDA	PEREMPUAN	9/21/1957	3	DUSUN SUNGAI TEMERAN	002	001	WIRASWASTA\r\n3	1403011008730069	ABAS	LAKI-LAKI	8/10/1973	3	DUSUN SUNGAI TEMERAN	002	001	NELAYAN/PERIKANAN\r\n4	1403014608430001	HAPSAH BINTI RAZAK	LAKI-LAKI	6/6/1943	1	DUSUN SUNGAI TEMERAN	002	001	MENGURUS RUMAH TANGGA\r\n5	1403011212550002	ZAHIR	LAKI-LAKI	12/12/1955	2	DUSUN SUNGAI TEMERAN	002	001	PETANI/PEKEBUN\r\n6	1403013112470025	NURDIN	LAKI-LAKI	12/31/1947	4	GG. JAWA	010	004	PENSIUNAN\r\n7	1403015004490001	ROPEAH	PEREMPUAN	4/10/1949	2	DUSUN SUNGAI DAUD	004	002	MENGURUS RUMAH TANGGA\r\n8	1403010502500001	MOHD NUR	LAKI-LAKI	2/5/1950	2	DUSUN SUNGAI DAUD	004	002	PETANI/PEKEBUN', '2025-07-28 01:52:45', '2025-07-28 01:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_23_011805_create_informasis_table', 1),
(5, '2025_07_23_011828_create_datadesas_table', 1),
(6, '2025_07_23_011914_create_profildesas_table', 1),
(7, '2025_07_23_012052_create_suratsktms_table', 1),
(8, '2025_07_24_131138_create_penduduks_table', 1),
(9, '2025_07_24_131146_create_agamas_table', 1),
(10, '2025_07_26_134552_create_hilders_table', 1),
(11, '2025_07_27_234059_create_suratusahas_table', 1),
(12, '2025_07_28_005411_create_suratdomislis_table', 1),
(13, '2025_07_28_014201_create_suratpots_table', 1),
(14, '2025_07_28_024600_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `laki_laki` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `perempuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profildesas`
--

CREATE TABLE `profildesas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profildesas`
--

INSERT INTO `profildesas` (`id`, `nama_desa`, `alamat_desa`, `kode_pos`, `telepon`, `email`, `luas_wilayah`, `kecamatan`, `kabupaten`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Tameran', 'Kecamatan Bengkalis, Kabupaten Bengkalis, Provinsi Riau, Indonesia,', '28711', '08127619024', 'desa.tameran.bks@gmail.com', '1.464,00 Ha', 'Bengkalis', 'Bengkalis', 'Riau', '2025-07-28 00:14:31', '2025-07-28 00:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suratpots`
--

CREATE TABLE `suratpots` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suratsktms`
--

CREATE TABLE `suratsktms` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ayah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `agama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ayah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `agama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ibu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('dalam proses','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dalam proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratsktms`
--

INSERT INTO `suratsktms` (`id`, `nama_lengkap`, `nik`, `tempat_tanggal_lahir`, `kewarganegaraan`, `agama`, `pekerjaan`, `alamat`, `no_hp`, `nama_ayah`, `nik_ayah`, `ttl_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nik_ibu`, `ttl_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `foto_ktp`, `foto_kk`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Junaina', '14003014705100002', 'Tameran, 07 Mei 2010', 'Indonesia', 'Islam', 'Pelajar/Mahasiswa', 'Dusun Sungai Tameran RT 002, RW 001D Desa Tameran', '086543872234', 'Ridwan', '140297635525343', 'Tameran 12 Agustus 1986', 'Indonesia', 'Islam', 'Buruh Harian Lepas', 'Dusun Sungai Tameran RT 002, RW 001D Desa Tameran', 'Fatimah', '1403014710720036', 'Tameran, 07 Oktober 1972', 'Indonesia', 'Islam', 'Mengurus Rumah Tangga', 'Dusun Sungai Tameran RT 002, RW 001D Desa Tameran', 'ktp/GgLkXO1OtBP1fnkTff0saQAe7CbvVrqYbLTDdFE9.jpg', 'kk/N38m3dvCS8XtMpX0r46HGcKYlRdMrcKGUgTKMpY5.jpg', 'dalam proses', '2025-07-28 00:18:48', '2025-07-28 00:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `suratusahas`
--

CREATE TABLE `suratusahas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('dalam proses','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dalam proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_domisilis`
--

CREATE TABLE `surat_domisilis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sebelumnya` text COLLATE utf8mb4_unicode_ci,
  `alamat_sekarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('dalam proses','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dalam proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-07-27 20:34:34', '$2y$12$jLZ20bIB2bWVWrGsVv8Gq.1prSpBkYW6rghTzvnQXfoK8dXQVc7wG', 'u4QMzlb7Tq', '2025-07-27 20:34:35', '2025-07-27 20:34:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `datadesas`
--
ALTER TABLE `datadesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hilders`
--
ALTER TABLE `hilders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profildesas`
--
ALTER TABLE `profildesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suratpots`
--
ALTER TABLE `suratpots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratsktms`
--
ALTER TABLE `suratsktms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratusahas`
--
ALTER TABLE `suratusahas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_domisilis`
--
ALTER TABLE `surat_domisilis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surat_domisilis_nik_unique` (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datadesas`
--
ALTER TABLE `datadesas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hilders`
--
ALTER TABLE `hilders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profildesas`
--
ALTER TABLE `profildesas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratpots`
--
ALTER TABLE `suratpots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suratsktms`
--
ALTER TABLE `suratsktms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratusahas`
--
ALTER TABLE `suratusahas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_domisilis`
--
ALTER TABLE `surat_domisilis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
