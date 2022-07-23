-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jul 2022 pada 06.16
-- Versi server: 10.5.15-MariaDB-cll-lve
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1021663_kas_keluarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggarans`
--

CREATE TABLE `anggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `persen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_orang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_max_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggarans`
--

INSERT INTO `anggarans` (`id`, `nama_anggaran`, `deskripsi`, `program_id`, `persen`, `max_orang`, `nominal_max_anggaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dana Darurat', 'A', 1, NULL, NULL, NULL, '2022-07-23 10:18:46', '2022-07-23 10:18:46', NULL),
(2, 'Dana Amal', 'B', 1, NULL, NULL, NULL, '2022-07-23 10:19:05', '2022-07-23 10:19:05', NULL),
(3, 'Dana Pinjam', 'A', 1, '30', '3', '1000000', '2022-07-23 10:21:07', '2022-07-23 10:21:07', NULL),
(4, 'Dana Usaha', 'A', 1, NULL, NULL, NULL, '2022-07-23 10:21:49', '2022-07-23 10:21:49', NULL),
(5, 'Dana Acara', 'A', 1, NULL, NULL, NULL, '2022-07-23 10:22:15', '2022-07-23 10:22:15', NULL),
(6, 'Dana Lain-Lain', 'A', 1, NULL, NULL, NULL, '2022-07-23 10:22:31', '2022-07-23 10:22:31', NULL),
(7, 'Keperluan', 'A', 2, NULL, NULL, NULL, '2022-07-23 10:23:15', '2022-07-23 10:23:15', NULL),
(8, 'Sekolah', 'A', 2, NULL, NULL, NULL, '2022-07-23 10:23:35', '2022-07-23 10:23:35', NULL),
(9, 'Nikah', 'A', 2, NULL, NULL, NULL, '2022-07-23 10:23:51', '2022-07-23 10:23:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `keluarga_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_pinjaman`
--

CREATE TABLE `bayar_pinjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_bayar` int(11) NOT NULL,
  `keterangan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengeluaran_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegitans`
--

CREATE TABLE `kegitans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluargas`
--

CREATE TABLE `keluargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_hubungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keluargas`
--

INSERT INTO `keluargas` (`id`, `nama`, `nik`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `pekerjaan`, `hubungan`, `anak_ke`, `nama_hubungan`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ma Haya', '001', '0898', 'Garut', '02', 'Perempuan', 'cihanja', 'Ibu Rumah Tangga', 'Istri', NULL, 'Qodir', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 09:50:41', '2022-07-23 09:50:41', NULL),
(2, 'Yeti Hastuti', '3205402188907979', '081567020405', 'Garut', '2022-07-24', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Irt', 'Anak', '4', 'Ma Haya', 'uploads/anggota/37461723072022_IMG_20220529_131012_861.jpg', '2022-07-23 10:26:37', '2022-07-23 10:46:37', NULL),
(3, 'Ayu', '1234567867162545', '081567020401', 'Garut', '2022-07-24', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '1', 'Yeti Hastuti', 'img/keluarga/08291723072022_IMG_20220511_123632_313.jpg', '2022-07-23 10:29:10', '2022-07-23 10:29:10', NULL),
(4, 'Aldi Wahyudi', '3205402189858003', '083825740394', 'Garut', '1998-12-23', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '2', 'Yeti Hastuti', 'img/keluarga/34301723072022_IMG_20210818_205000_261.jpg', '2022-07-23 10:30:34', '2022-07-23 10:30:34', NULL),
(5, 'Sintia Wati', '3205402184858001', '080000000000', 'Garut', '2000-12-28', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', NULL, 'Yeti Hastuti', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 10:32:46', '2022-07-23 10:32:46', NULL),
(6, 'Sinta Amelia', '3205402204907995', '080000000001', 'Garut', '2006-07-08', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Sekolah', 'Anak', NULL, 'Yeti Hastuti', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 10:34:49', '2022-07-23 10:34:49', NULL),
(7, 'Radit Anugrah', '3205402199907988', '0800000000002', 'Garut', '2013-07-13', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Sekolah', 'Anak', '5', 'Yeti Hastuti', 'img/keluarga/48361723072022_IMG_20210511_214402_348.jpg', '2022-07-23 10:36:48', '2022-07-23 10:36:48', NULL),
(8, 'Yanti', '3205402188907981', '080000000004', 'Garut', '2022-07-24', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Irt', 'Anak', '5', 'Ma Haya', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 10:54:55', '2022-07-23 10:54:55', NULL),
(9, 'Yeni', '3205402188907987', '080000000008', 'Garut', '2022-07-24', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'TBekerja', 'Anak', '3', 'Ma Haya', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 10:56:01', '2022-07-23 10:56:01', NULL),
(10, 'Asep', '3205402188907986', '080000000009', 'Garut', '2022-07-24', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'TBekerja', 'Anak', '1', 'Ma Haya', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 10:56:55', '2022-07-23 10:56:55', NULL),
(11, 'Udin', '3205402188907985', '080000000011', 'Garut', '2022-07-24', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '3', 'Ma Haya', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 10:58:41', '2022-07-23 10:58:41', NULL),
(13, 'Supriatna', '3205402188907978', '08000000076', 'Garut', '2022-07-24', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '1', 'Asep', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:03:46', '2022-07-23 11:03:46', NULL),
(14, 'Ahmad', '3205402207907985', '08000000087', 'Garut', '2022-07-05', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '2', 'Asep', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:04:39', '2022-07-23 11:04:39', NULL),
(15, 'Iis', '3205402196907985', '08000000054', 'Garut', '2022-07-16', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '3', 'Asep', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 11:05:46', '2022-07-23 11:05:46', NULL),
(16, 'Rana', '3205402199907985', '08000000098', 'Garut', '2022-07-13', 'Laki-Laki', 'garut', 'Bekerja', 'Anak', '1', 'Yeni', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:06:42', '2022-07-23 11:06:42', NULL),
(17, 'Rani', '3205402192907985', '08000000009', 'Garut', '2022-07-20', 'Perempuan', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '2', 'Yeni', 'img/keluarga/50271431012020_female.jpg', '2022-07-23 11:07:27', '2022-07-23 11:07:27', NULL),
(19, 'Rangga', '3205402199907981', '08000000053', 'Garut', '2022-07-13', 'Laki-Laki', 'garut', 'Bekerja', 'Anak', NULL, 'Yeni', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:09:16', '2022-07-23 11:09:16', NULL),
(20, 'Ranggi', '3205402207907981', '080000000092', 'Garut', '2022-07-05', 'Laki-Laki', 'garut', 'Bekerja', 'Anak', NULL, 'Yeni', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:10:29', '2022-07-23 11:10:29', NULL),
(21, 'Rifki', '3205402196907984', '080000000056', 'Garut', '2022-07-16', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '1', 'Yanti', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:11:24', '2022-07-23 11:11:24', NULL),
(22, 'Dian', '3205402194907986', '08000000075', 'Garut', '2022-07-18', 'Laki-Laki', 'Kp. Cihanja Rt.03 Rw.03', 'Bekerja', 'Anak', '8', 'Yanti', 'img/keluarga/52471919042020_male.jpg', '2022-07-23 11:12:20', '2022-07-23 11:12:20', NULL);

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
(1, '2013_06_26_053325_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_25_120616_create_anggota_keluargas_table', 1),
(6, '2022_06_26_055632_jabatan', 1),
(7, '2022_06_26_060035_create_programs_table', 1),
(8, '2022_06_26_060545_create_anggotas_table', 1),
(9, '2022_06_26_060546_create_users_table', 1),
(10, '2022_06_26_065657_create_anggarans_table', 1),
(11, '2022_06_26_070554_create_pengeluarans_table', 1),
(12, '2022_06_26_070610_create_bayar_pinjamen_table', 1),
(13, '2022_06_26_071224_create_pengajuans_table', 1),
(14, '2022_06_26_071231_create_pemasukans_table', 1),
(15, '2022_07_03_005056_create_pengumumen_table', 1),
(16, '2022_07_23_122057_create_kegitans_table', 1);

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
-- Struktur dari tabel `pemasukans`
--

CREATE TABLE `pemasukans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekertaris` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bendahara` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengeluaran_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `alasan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekertaris` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bendahara` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `opsi`, `isi`, `program_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Semua', 'Kas Keluarga', 1, '2022-07-23 09:50:41', '2022-07-23 09:50:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `nama_program`, `penjelasan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kas Keluarga', 'a', '2022-07-23 09:50:41', '2022-07-23 09:50:41', NULL),
(2, 'Tabungan Pribadi', 'A', '2022-07-23 10:18:13', '2022-07-23 10:18:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'a', '2022-07-23 09:50:41', '2022-07-23 09:50:41', NULL),
(2, 'Ketua', '<p><b style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Ketua</b><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;atau&nbsp;</span><b style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">pemimpin</b><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;adalah posisi tertinggi dalam kelompok yang terorganisir seperti&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Direksi\" class=\"mw-redirect\" title=\"Direksi\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">direksi</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">,&nbsp;</span><a href=\"https://id.m.wikipedia.org/w/index.php?title=Komite&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Komite (halaman belum tersedia)\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(221, 51, 51);\">komite</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">, atau&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Badan_musyawarah\" title=\"Badan musyawarah\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">badan musyawarah</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">. Orang yang memegang posisi biasanya dipilih atau ditunjuk oleh para anggota kelompok. Ketua memimpin&nbsp;</span><a href=\"https://id.m.wikipedia.org/w/index.php?title=Pertemuan&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Pertemuan (halaman belum tersedia)\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(221, 51, 51);\">pertemuan</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;dari kelompok yang berkumpul dan melakukan usaha secara teratur.</span><sup id=\"cite_ref-Robert_1-0\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; font-size: 0.75em; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; unicode-bidi: isolate; white-space: nowrap; color: rgb(32, 33, 34);\"><a href=\"https://id.m.wikipedia.org/wiki/Ketua#cite_note-Robert-1\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">[1]</a></sup><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;Ketika kelompok tidak dalam sidang, tugas ketua sering mencakup bertindak sebagai kepala, wakil kepada dunia luar dan juru bicara kelompok tersebut.</span></p><p><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">Sumber&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Ketua\" target=\"_blank\">Wikipedia</a></p>', '2022-07-23 09:59:03', '2022-07-23 09:59:03', NULL),
(3, 'Bendahara', '<section class=\"mf-section-0\" id=\"mf-section-0\" style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\"><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\"><b style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\">Bendahara</b><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;adalah orang yang bertanggung jawab untuk menjalankan&nbsp;</font><font style=\"vertical-align: inherit;\">perbendaharaan&nbsp;</font></font><a href=\"https://en.m.wikipedia.org/wiki/Treasury\" title=\"Perbendaharaan\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">organisasi</a><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;.&nbsp;</font><font style=\"vertical-align: inherit;\">Fungsi inti yang signifikan dari bendahara perusahaan termasuk manajemen kas dan likuiditas, manajemen risiko, dan keuangan perusahaan.&nbsp;</font></font><sup id=\"cite_ref-1\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://en.m.wikipedia.org/wiki/Treasurer#cite_note-1\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">[1]</a></sup></p><div class=\"thumb tright\" style=\"margin: 0.6em 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\"><div class=\"thumbinner\" style=\"margin: 0px auto; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none; max-width: 100%; display: flex; place-content: flex-start center; flex-flow: column wrap; width: 222px;\"><a href=\"https://en.m.wikipedia.org/wiki/File:National-Debt-Gillray.jpeg\" class=\"image\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/National-Debt-Gillray.jpeg/220px-National-Debt-Gillray.jpeg\" decoding=\"async\" width=\"220\" height=\"178\" class=\"thumbimage\" data-file-width=\"3883\" data-file-height=\"3146\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; background: none; max-width: 100%; height: auto !important;\"></a><div class=\"thumbcaption\" style=\"margin: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; background: none; color: rgb(84, 89, 93); width: 222px; justify-content: space-between; flex: 1 0 100%; order: 1; padding: 0px !important;\"><font style=\"vertical-align: inherit;\">Dalam&nbsp;</font><i style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\">Cara baru untuk membayar Utang Nasional</i><font style=\"vertical-align: inherit;\">&nbsp;(1786),&nbsp;</font><a href=\"https://en.m.wikipedia.org/wiki/James_Gillray\" title=\"James Gillray\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">James Gillray membuat</a><font style=\"vertical-align: inherit;\">&nbsp;karikatur&nbsp;</font><a href=\"https://en.m.wikipedia.org/wiki/Charlotte_of_Mecklenburg-Strelitz\" title=\"Charlotte dari Mecklenburg-Strelitz\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">Ratu Charlotte</a><font style=\"vertical-align: inherit;\">&nbsp;dan&nbsp;</font><a href=\"https://en.m.wikipedia.org/wiki/George_III_of_the_United_Kingdom\" class=\"mw-redirect\" title=\"George III dari Britania Raya\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">Raja George III</a><font style=\"vertical-align: inherit;\">&nbsp;dibanjiri dana perbendaharaan untuk menutupi utang kerajaan, dengan&nbsp;</font><a href=\"https://en.m.wikipedia.org/wiki/William_Pitt_the_Younger\" title=\"William Pitt yang Lebih Muda\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">Pitt</a><font style=\"vertical-align: inherit;\">&nbsp;memberi mereka kantong uang lagi.</font></div><div class=\"thumbcaption\" style=\"margin: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; background: none; color: rgb(84, 89, 93); width: 222px; justify-content: space-between; flex: 1 0 100%; order: 1; padding: 0px !important;\"><font style=\"vertical-align: inherit;\"><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">Banyak organisasi sukarelawan, terutama organisasi&nbsp;</font></font><a href=\"https://en.m.wikipedia.org/wiki/Not-for-profit\" class=\"mw-redirect\" title=\"Tidak untuk keuntungan\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">nirlaba</font></font></a><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;seperti&nbsp;</font></font><a href=\"https://en.m.wikipedia.org/wiki/Charities\" class=\"mw-redirect\" title=\"Amal\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">amal</font></font></a><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;dan&nbsp;</font></font><a href=\"https://en.m.wikipedia.org/wiki/Theaters\" class=\"mw-redirect\" title=\"Bioskop\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">teater</font></font></a><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;, menunjuk bendahara yang bertanggung jawab untuk konservasi perbendaharaan, apakah ini melalui penetapan harga produk, pengorganisasian&nbsp;</font></font><a href=\"https://en.m.wikipedia.org/wiki/Sponsor_(commercial)\" title=\"Sponsor (komersial)\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">sponsor</font></font></a><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;, atau mengatur acara penggalangan dana.&nbsp;</font></font><sup class=\"noprint Inline-Template Template-Fact\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; white-space: nowrap;\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">[&nbsp;</font></font><i style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\"><a href=\"https://en.m.wikipedia.org/wiki/Wikipedia:Citation_needed\" title=\"Wikipedia:Kutipan diperlukan\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><span title=\"Klaim ini membutuhkan referensi ke sumber yang dapat dipercaya.  (Februari 2022)\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">rujukan?</font></font></span></a></i><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;]</font></font></sup></p><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">Bendahara juga akan menjadi bagian dari kelompok yang akan mengawasi bagaimana uang dibelanjakan, baik secara langsung mendikte pengeluaran atau mengizinkannya sesuai kebutuhan.&nbsp;</font><font style=\"vertical-align: inherit;\">Adalah tanggung jawab mereka untuk memastikan bahwa organisasi memiliki cukup uang untuk melaksanakan tujuan dan sasaran yang telah mereka nyatakan, dan bahwa mereka tidak membelanjakan lebih, atau kurang membelanjakan.&nbsp;</font><font style=\"vertical-align: inherit;\">Mereka juga melaporkan kepada rapat dewan dan/atau kepada anggota umum status keuangan organisasi untuk memastikan checks and balances.&nbsp;</font></font><sup id=\"cite_ref-2\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://en.m.wikipedia.org/wiki/Treasurer#cite_note-2\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">[2]</font></font></a></sup><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;Catatan yang akurat dan dokumentasi pendukung harus disimpan pada tingkat perincian yang wajar yang memberikan jejak audit yang jelas untuk semua transaksi.&nbsp;</font></font><sup id=\"cite_ref-3\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://en.m.wikipedia.org/wiki/Treasurer#cite_note-3\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">[3]</font></font></a></sup></p></font></div><div class=\"thumbcaption\" style=\"margin: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; background: none; color: rgb(84, 89, 93); width: 222px; justify-content: space-between; flex: 1 0 100%; order: 1; padding: 0px !important;\"><font style=\"vertical-align: inherit;\">Sumber :&nbsp;</font><a href=\"https://en.m.wikipedia.org/wiki/Treasurer\" target=\"_blank\">Wikipedia</a></div></div></div></section>', '2022-07-23 10:04:05', '2022-07-23 10:04:05', NULL),
(4, 'Sekertaris', '<p><b style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Sekretaris</b><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;adalah sebuah&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Profesi\" title=\"Profesi\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">profesi</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">&nbsp;administratif yang bersifat asisten/mendukung. Gelar ini merujuk kepada sebuah pekerja kantor yang tugasnya ialah melaksanakan perkerjaan rutin, tugas-tugas administratif, atau tugas-tugas pribadi/langsung dari atasannya. Pekerja atau karyawan ini biasanya melakukan tugas-tugas seperti&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Tipografi\" title=\"Tipografi\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">mengetik</a><span style=\"color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">,</span><span style=\"font-size: 1rem; color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">penggunaan&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Komputer\" title=\"Komputer\" style=\"font-size: 1rem; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">komputer</a><span style=\"font-size: 1rem; color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">, dan pengaturan&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Agenda\" title=\"Agenda\" style=\"font-size: 1rem; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background: none rgb(255, 255, 255); color: rgb(51, 102, 204);\">agenda</a><span style=\"font-size: 1rem; color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">. Mereka biasanya bekerja di belakang meja. Sebagian besar sekretaris adalah wanita.</span></p><p><span style=\"font-size: 1rem; color: rgb(32, 33, 34); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif;\">Sumber :&nbsp;</span><a href=\"https://id.m.wikipedia.org/wiki/Sekretaris#:~:text=Sekretaris%20adalah%20sebuah%20profesi%20administratif,tugas%20pribadi%2Flangsung%20dari%20atasannya.\" target=\"_blank\">Wikipedia</a></p>', '2022-07-23 10:06:37', '2022-07-23 10:06:37', NULL),
(5, 'Anggota', '<p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\"><b style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none;\">Keluarga</b>&nbsp;adalah unit terkecil dari&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Masyarakat\" title=\"Masyarakat\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">masyarakat</a>&nbsp;yang terdiri atas&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Kepala_keluarga\" title=\"Kepala keluarga\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">kepala keluarga</a>&nbsp;dan beberapa orang yang terkumpul dan serta orang orang yang selalu menerima kekurangan dan kelebihan orang yang ada di sekitarnya baik buruk nya anggota keluarga, tetap tidak bisa merubah kodrat yang ada, garis besarnya yang baik diarahkan dan yang buruk diperbaiki tanpa harus menghakimi.<sup id=\"cite_ref-1\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://id.m.wikipedia.org/wiki/Keluarga#cite_note-1\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">[1]</a></sup></p><div class=\"thumb tright\" style=\"margin: 0.6em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\"><div class=\"thumbinner\" style=\"margin: 0px auto; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none; max-width: 100%; display: flex; place-content: flex-start center; flex-flow: column wrap; width: 252px;\"><a href=\"https://id.m.wikipedia.org/wiki/Berkas:The_little_angels_of_umbotso,_kano_,Nigeria.jpg\" class=\"image\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/The_little_angels_of_umbotso%2C_kano_%2CNigeria.jpg/250px-The_little_angels_of_umbotso%2C_kano_%2CNigeria.jpg\" decoding=\"async\" width=\"250\" height=\"167\" class=\"thumbimage\" data-file-width=\"2736\" data-file-height=\"1824\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; background: none; max-width: 100%; height: auto !important;\"></a><div class=\"thumbcaption\" style=\"margin: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; background: none; color: rgb(84, 89, 93); width: 250px; justify-content: space-between; flex: 1 0 100%; order: 1; padding: 0px !important;\">Keluarga dari&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Nigeria\" title=\"Nigeria\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">Nigeria</a></div></div></div><div role=\"note\" class=\"hatnote navigation-not-searchable\" style=\"margin: 0px 0px 0.5em; padding: 5px 7px 5px 1.6em; border: 0px; font-style: italic; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; font-size: 0.8125rem; vertical-align: baseline; background: none rgb(248, 249, 250); color: rgb(84, 89, 93); overflow: hidden;\">Untuk famili dalam ilmu biologi, lihat&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Famili_(biologi)\" title=\"Famili (biologi)\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">Famili (biologi)</a>.</div><div class=\"thumb tright\" style=\"margin: 0.6em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\"><div class=\"thumbinner\" style=\"margin: 0px auto; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background: none; max-width: 100%; display: flex; place-content: flex-start center; flex-flow: column wrap; width: 402px;\"><a href=\"https://id.m.wikipedia.org/wiki/Berkas:Familia_3510.jpg\" class=\"image\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Familia_3510.jpg/400px-Familia_3510.jpg\" decoding=\"async\" width=\"400\" height=\"267\" class=\"thumbimage\" data-file-width=\"4752\" data-file-height=\"3168\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; background: none; max-width: 100%; height: auto !important;\"></a><div class=\"thumbcaption\" style=\"margin: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; background: none; color: rgb(84, 89, 93); width: 328px; justify-content: space-between; flex: 1 0 100%; order: 1; padding: 0px !important;\">Potret sebuah keluarga yang terdiri dari&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Ayah\" title=\"Ayah\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">ayah</a>,&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Ibu\" title=\"Ibu\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">ibu</a>,&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Anak\" title=\"Anak\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">anak</a>,&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Menantu\" title=\"Menantu\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">menantu</a>, dan&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Cucu\" title=\"Cucu\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">cucu</a>.</div></div></div><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Menurut Salvicion dan Celis (1998) di dalam keluarga terdapat dua atau lebih dari dua pribadi yang tergabung karena hubungan&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Darah\" title=\"Darah\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">darah</a>, hubungan perkawinan atau pengangkatan, di hidupnya dalam satu rumah tangga, berinteraksi satu sama lain dan di dalam perannya masing-masing dan menciptakan serta mempertahankan suatu&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Kebudayaan\" class=\"mw-redirect\" title=\"Kebudayaan\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">kebudayaan</a>.<sup id=\"cite_ref-2\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://id.m.wikipedia.org/wiki/Keluarga#cite_note-2\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">[2]</a></sup></p><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Berdasar Undang-Undang 52 tahun 2009 tentang Perkembangan Kependudukan dan Pembangunan Keluarga, Bab I pasal 1 ayat 6 pengertian</p><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Keluarga adalah unit terkecil dalam masyarakat yang terdiri dari suami istri; atau suami (Kepala keluarga), istri dan anaknya yang di sebut dengan Rumah Tangga atau dengan sebutan lainnya ialah keluarga kecil; sedangkan yang disebut dengan keluarga besar selain suami, istri dan anak-anaknya dirumah tangga tersebut terdapat orang tua atau disebut ayah dan ibu dari pihak suami dan juga terdapat anak-anaknya orang tua yang lain termasuk orang tua dari ayah (Kakek dan nenek), Menurut Paul B. Horton bahwa Masyarakat adalah kumpulan manusia yang memiliki kemandirian dengan bersama-sama untuk jangka waktu yang lama dan juga mendiami suatu daerah atau wilayah tertentu. Di mana dalam wilayah tersebut memiliki kebudayaan yang tidak namun memiliki adat yang berbeda di dalam wilayah, daerah tersebut<sup id=\"cite_ref-3\" class=\"reference\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; line-height: 1; font-family: inherit; font-size: 0.75em; background: none; unicode-bidi: isolate; white-space: nowrap;\"><a href=\"https://id.m.wikipedia.org/wiki/Keluarga#cite_note-3\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 102, 204);\">[3]</a></sup>.</p><p style=\"margin: 0.5em 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Lato, Helvetica, Arial, sans-serif; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 34);\">Sumber :&nbsp;<a href=\"https://id.m.wikipedia.org/wiki/Keluarga\" target=\"_blank\">Wikipedia</a></p>', '2022-07-23 10:09:49', '2022-07-23 10:09:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluarga_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `no_hp`, `remember_token`, `role`, `keluarga_id`, `is_active`, `foto`, `program1`, `program2`, `program3`, `created_at`, `updated_at`, `deleted_at`, `last_seen`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$qydKE5UJFkpuzB3D4UBefOJgMS3VGdOJ2OAvQlZ77iTyfX5JTgVeS', '083', NULL, 'Admin', 1, '1', NULL, 'Bayar', 'Tabungan', '1', '2022-07-23 09:50:41', '2022-07-23 16:10:40', NULL, '2022-07-23 16:10:40'),
(2, 'Aldi', 'aldiwahyudi1223@gmail.com', NULL, '$2y$10$x6IcBl.pZAb5M316jj.l9ewMXCmaaf5aBL2SlJKUzy/8xEE93.Wpy', '083825740395', '0mWA3KPgpKdgQyodxZjdVoGRTASCrq8HsFQIQSRuRIBGAvt4eWZxjI8aQTkC', 'Sekertaris', 4, '1', 'uploads/anggota/37461723072022_IMG_20220529_131012_861.jpg', NULL, NULL, NULL, '2022-07-23 10:37:55', '2022-07-23 10:53:03', NULL, '2022-07-23 10:53:03'),
(3, 'Ayu', 'ayu@gmail.com', NULL, '$2y$10$Pz2e8Gk9ge1DkjdaSw3xFuLM8rsL4fmJHWB4Pw4XIW82bti1yn/iy', '080000000000', NULL, 'Anggota', 3, '1', 'img/keluarga/08291723072022_IMG_20220511_123632_313.jpg', NULL, NULL, NULL, '2022-07-23 10:38:55', '2022-07-23 10:52:10', NULL, '2022-07-23 10:52:10'),
(4, 'Tia', 'sintia@gmail.com', NULL, '$2y$10$f8tbOKWOqeVZLXTBiYb5oOyeODYJySAnfnVsHSd84bx0u2Jg6hvLK', '080000000001', NULL, 'Anggota', 5, '1', 'img/keluarga/50271431012020_female.jpg', NULL, NULL, NULL, '2022-07-23 10:39:59', '2022-07-23 10:39:59', NULL, NULL),
(5, 'Sinta', 'sinta@gmail.com', NULL, '$2y$10$Yqvr6oLLGLL8HWACbKVU0ePGuQVCbr7KMUCFWO1t.JkoNiru7UmaC', '080000000002', NULL, 'Anggota', 6, '1', 'img/keluarga/50271431012020_female.jpg', NULL, NULL, NULL, '2022-07-23 10:41:10', '2022-07-23 10:41:10', NULL, NULL),
(6, 'Olen', 'olen@gmail.com', NULL, '$2y$10$vPfmHdT/vXtQ9vsaGrUFOe6be0fuAQ4L9ES3r./GQDblfyu/5dP/W', '08367886668', NULL, 'Ketua', 13, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:41:42', '2022-07-23 15:41:42', NULL, NULL),
(7, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$10$v9Tgfnz7rYMHv76VlexhvO9axliVrmAwvPRfUrAkymS/w7LOXusRy', '08132063676', NULL, 'Anggota', 14, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:42:45', '2022-07-23 15:42:45', NULL, NULL),
(8, 'Iis', 'iis@gmail.com', NULL, '$2y$10$6qLqPo0QChqfY5P5yjEA7uDC0qiluwCdWaVaGjpbWYcdaGUjcCiCm', '08132063656', NULL, 'Anggota', 15, '1', 'img/keluarga/50271431012020_female.jpg', NULL, NULL, NULL, '2022-07-23 15:44:17', '2022-07-23 15:44:17', NULL, NULL),
(9, 'Rana', 'rana@gmail.com', NULL, '$2y$10$irwGG0K8HBSpRaG3uOgqB.QeqFbbFjpRO9aCwzIc.heZIeqQExcvC', '08382766757', NULL, 'Anggota', 16, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:45:13', '2022-07-23 15:45:13', NULL, NULL),
(10, 'Rani', 'rani@gmail.com', NULL, '$2y$10$seYHEFXXJQjqfsE7hkc6Qu.8/Re.qFAeY3hFaH2G92Mbdb.8a3xjy', '08132063765', NULL, 'Anggota', 17, '1', 'img/keluarga/50271431012020_female.jpg', NULL, NULL, NULL, '2022-07-23 15:46:08', '2022-07-23 15:46:08', NULL, NULL),
(11, 'Angga', 'angga@gmail.com', NULL, '$2y$10$qzKws.o1gCIr/jswEdDYUecI4c078.dBohlX9dkOgJIaUjw0VPZTO', '08132063767', NULL, 'Anggota', 19, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:47:08', '2022-07-23 15:47:08', NULL, NULL),
(12, 'Anggi', 'anggi@gmail.com', NULL, '$2y$10$nGcC0NwTgoSq.1pAe1T1Gu20EMOJidyBuGUpGLOd6fBay4fPOawLy', '08132067553', NULL, 'Anggota', 20, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:47:47', '2022-07-23 15:47:47', NULL, NULL),
(13, 'Dian', 'dian@gmail.com', NULL, '$2y$10$RddvRKJArOWm2kJsj5nCXeClBT2hM9EItF1BJ0/iwyC.nCg5CCRsq', '08132063768', NULL, 'Anggota', 22, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:48:58', '2022-07-23 15:48:58', NULL, NULL),
(14, 'Rifki', 'rifki@gmail.com', NULL, '$2y$10$CCR1UOOL4PYJWJ5Ou3yVb.sI3ALDQVM4ROZW.FqPHCU9ttF.Twd42', '081320638664', NULL, 'Bendahara', 21, '1', 'img/keluarga/52471919042020_male.jpg', NULL, NULL, NULL, '2022-07-23 15:49:40', '2022-07-23 16:15:27', NULL, '2022-07-23 16:15:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggarans`
--
ALTER TABLE `anggarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggarans_program_id_foreign` (`program_id`);

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggotas_nama_unique` (`nama`),
  ADD UNIQUE KEY `anggotas_email_unique` (`email`),
  ADD UNIQUE KEY `anggotas_no_hp_unique` (`no_hp`),
  ADD KEY `anggotas_program_id_foreign` (`program_id`),
  ADD KEY `anggotas_role_id_foreign` (`role_id`),
  ADD KEY `anggotas_keluarga_id_foreign` (`keluarga_id`);

--
-- Indeks untuk tabel `bayar_pinjaman`
--
ALTER TABLE `bayar_pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bayar_pinjaman_pengeluaran_id_foreign` (`pengeluaran_id`),
  ADD KEY `bayar_pinjaman_anggota_id_foreign` (`anggota_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegitans`
--
ALTER TABLE `kegitans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kegitans_nama_unique` (`nama`);

--
-- Indeks untuk tabel `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keluargas_nama_unique` (`nama`),
  ADD UNIQUE KEY `keluargas_nik_unique` (`nik`),
  ADD UNIQUE KEY `keluargas_no_hp_unique` (`no_hp`);

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
-- Indeks untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasukans_anggota_id_foreign` (`anggota_id`);

--
-- Indeks untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuans_anggota_id_foreign` (`anggota_id`);

--
-- Indeks untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluarans_anggaran_id_foreign` (`anggaran_id`),
  ADD KEY `pengeluarans_anggota_id_foreign` (`anggota_id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_program_id_foreign` (`program_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`),
  ADD KEY `users_keluarga_id_foreign` (`keluarga_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggarans`
--
ALTER TABLE `anggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bayar_pinjaman`
--
ALTER TABLE `bayar_pinjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegitans`
--
ALTER TABLE `kegitans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggarans`
--
ALTER TABLE `anggarans`
  ADD CONSTRAINT `anggarans_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Ketidakleluasaan untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_keluarga_id_foreign` FOREIGN KEY (`keluarga_id`) REFERENCES `keluargas` (`id`),
  ADD CONSTRAINT `anggotas_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `anggotas_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `bayar_pinjaman`
--
ALTER TABLE `bayar_pinjaman`
  ADD CONSTRAINT `bayar_pinjaman_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bayar_pinjaman_pengeluaran_id_foreign` FOREIGN KEY (`pengeluaran_id`) REFERENCES `pengeluarans` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  ADD CONSTRAINT `pemasukans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_anggaran_id_foreign` FOREIGN KEY (`anggaran_id`) REFERENCES `anggarans` (`id`),
  ADD CONSTRAINT `pengeluarans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_keluarga_id_foreign` FOREIGN KEY (`keluarga_id`) REFERENCES `keluargas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
