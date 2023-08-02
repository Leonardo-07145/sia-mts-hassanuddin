-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 09.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_hassanuddin`
--

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
-- Struktur dari tabel `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `genders`
--

INSERT INTO `genders` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(2, 'Perempuan', '2023-07-26 08:45:09', '2023-07-26 08:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan_id` bigint(20) UNSIGNED NOT NULL,
  `nuptk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `gender_id`, `pendidikan_id`, `nuptk`, `nama`, `alamat`, `tgl_lahir`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1', 'Leonardo', 'Dawarblandong', '1991-10-11', '0932493241', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(2, 2, 1, '12', 'Alex', 'Gedeg', '1992-10-11', '0932493242', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(3, 1, 1, '1245', 'Tegar', 'Dawarblandong', '1993-10-11', '0932493243', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(4, 2, 2, '12345', 'Habib', 'Jetis', '1994-10-11', '0932493244', '2023-07-26 08:45:09', '2023-07-26 08:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haris`
--

CREATE TABLE `haris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `haris`
--

INSERT INTO `haris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '2023-07-26 08:45:11', '2023-07-26 08:45:11'),
(2, 'Selasa', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(3, 'Rabu', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(4, 'Kamis', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(5, 'Jumat', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(6, 'Sabtu', '2023-07-26 08:45:12', '2023-07-26 08:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `hari_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `guru_id`, `kelas_id`, `hari_id`, `mapel_id`, `jam_mulai`, `jam_berakhir`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, '07:00:00', '08:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(2, 1, 1, 1, 2, '08:00:00', '09:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(3, 2, 2, 1, 3, '07:00:00', '08:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(4, 1, 2, 1, 4, '08:00:00', '09:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(5, 3, 3, 1, 3, '07:00:00', '08:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(6, 1, 3, 1, 6, '08:00:00', '09:00:00', '2023-07-26 08:45:12', '2023-07-26 08:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayarans`
--

CREATE TABLE `jenis_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pembayarans`
--

INSERT INTO `jenis_pembayarans` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Pengembangan Madrasah', 50000, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(2, 'Kegiatan Keorganisasian', 40000, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(3, 'Kegiatan Ekstra Kurikuler', 45000, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(4, 'Buku Lembar Kerja Siswa', 70000, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(5, 'Atribut Madrasah', 20000, '2023-07-26 08:45:10', '2023-07-26 08:45:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_presensis`
--

CREATE TABLE `jenis_presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_presensis`
--

INSERT INTO `jenis_presensis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Masuk', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(2, 'Sakit', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(3, 'Izin', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(4, 'Alpa', '2023-07-26 08:45:12', '2023-07-26 08:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tahun_ajarans`
--

CREATE TABLE `jenis_tahun_ajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_tahun_ajarans`
--

INSERT INTO `jenis_tahun_ajarans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2023-07-26 08:45:11', '2023-07-27 12:44:25'),
(2, '2022/2023', '2023-07-26 08:45:11', '2023-07-26 08:45:11'),
(3, '2023/2024', '2023-07-26 08:45:11', '2023-07-27 12:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 7, '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(2, 8, '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(3, 9, '2023-07-26 08:45:09', '2023-07-26 08:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(2, 'Akidah Akhlak', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(3, 'Bahasa Indonesia', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(4, 'Bahasa Inggris', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(5, 'Matematika', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(6, 'Bahasa Arab', '2023-07-26 08:45:12', '2023-07-26 08:45:12');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_31_035444_create_gurus_table', 1),
(6, '2023_04_01_153949_create_genders_table', 1),
(7, '2023_04_01_154423_create_pendidikans_table', 1),
(8, '2023_04_04_101518_create_siswas_table', 1),
(9, '2023_05_02_101140_create_pembayarans_table', 1),
(10, '2023_05_04_111301_create_kelas_table', 1),
(11, '2023_05_30_125528_create_jadwals_table', 1),
(12, '2023_05_31_021350_create_haris_table', 1),
(13, '2023_06_12_110501_create_mapels_table', 1),
(14, '2023_06_13_152604_create_jenis_pembayarans_table', 1),
(15, '2023_07_06_110244_create_presensis_table', 1),
(16, '2023_07_08_082909_create_jenis_presensis_table', 1),
(17, '2023_07_11_150650_create_jenis_tahun_ajarans_table', 1),
(18, '2023_07_24_090513_create_tanggal_presensis_table', 1),
(19, '2023_07_25_124105_create_nilais_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `tugas1` int(11) DEFAULT NULL,
  `tugas2` int(11) DEFAULT NULL,
  `harian1` int(11) DEFAULT NULL,
  `harian2` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_id`, `mapel_id`, `tugas1`, `tugas2`, `harian1`, `harian2`, `uts`, `uas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 80, 87, 78, 85, 89, 90, '2023-07-26 08:45:13', '2023-07-26 08:45:13'),
(3, 2, 1, 33, 12, 11, 12, 90, NULL, '2023-07-26 20:42:01', '2023-07-29 07:20:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jenispembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `jenistahunajaran_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `siswa_id`, `jenispembayaran_id`, `jenistahunajaran_id`, `tgl_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2023-05-11', '2023-07-26 08:45:11', '2023-07-26 08:45:11'),
(2, 1, 2, 2, '2023-05-09', '2023-07-26 08:45:11', '2023-07-26 08:45:11'),
(3, 2, 3, 1, '2023-05-10', '2023-07-26 08:45:11', '2023-07-27 09:54:16'),
(4, 2, 4, 2, '2023-05-15', '2023-07-26 08:45:11', '2023-07-26 08:45:11'),
(5, 3, 1, 1, '2023-05-20', '2023-07-26 08:45:11', '2023-07-27 09:54:28'),
(6, 3, 2, 2, '2023-05-18', '2023-07-26 08:45:11', '2023-07-26 08:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'SMA', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(2, 'S1', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(3, 'S2', '2023-07-26 08:45:09', '2023-07-26 08:45:09'),
(4, 'S3', '2023-07-26 08:45:10', '2023-07-26 08:45:10');

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
-- Struktur dari tabel `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_presensi_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jenispresensi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensis`
--

INSERT INTO `presensis` (`id`, `tgl_presensi_id`, `siswa_id`, `jenispresensi_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(2, 2, 1, 1, '2023-07-26 08:45:12', '2023-07-26 08:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `gender_id`, `kelas_id`, `nama`, `nisn`, `email`, `email_verified_at`, `password`, `alamat`, `tgl_lahir`, `no_telp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Habib', '0908091', 'habib@gmail.com', NULL, '$2y$10$WTMtryY8G52lS4rGN9t.iOyHfJ0OBhWkKCzGBuxWHBipYDu4omF1W', 'Dawarblandong', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(2, 2, 1, 'Fitri', '0908092', 'fitri@gmail.com', NULL, '$2y$10$aTPNPcK8NHXc9EQ4/TLfvOqoW9h7CjR.2S1tzg4KuySAUJc8pgW1e', 'Dawarblandong', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(3, 1, 2, 'Alex', '0908093', 'alex@gmail.com', NULL, '$2y$10$6iFXKfoxvM8/O42lX1x8O.GLIRnoeW4KtQQuX3U5jDsIyRp5ymVgm', 'Jetis', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(4, 2, 2, 'Suliati', '0908094', 'suliati@gmail.com', NULL, '$2y$10$xHRuyQ.kwb6gZFfmmpLxqO2qRqW4oLA4.bRhfnQ8jkLTWaKaPST8q', 'Gedeg', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(5, 1, 3, 'Indy', '0908095', 'indy@gmail.com', NULL, '$2y$10$CkVbNPqPehC8AjPh68IaVeS5F5bfM94O4rxfArXUcUTISNUyDezWa', 'Gedeg', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10'),
(6, 2, 3, 'Anin', '0908096', 'anin@gmail.com', NULL, '$2y$10$0bPOY8d9EILxlM6b983.TO83TbLYObHcL/J3HUtsVO8MB9Kur6A2S', 'Dawarblandong', '1999-10-11', '0932493243', NULL, '2023-07-26 08:45:10', '2023-07-26 08:45:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal_presensis`
--

CREATE TABLE `tanggal_presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `walikelas_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_presensi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggal_presensis`
--

INSERT INTO `tanggal_presensis` (`id`, `walikelas_id`, `tgl_presensi`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-05-18', '2023-07-26 08:45:12', '2023-07-26 08:45:12'),
(2, 3, '2023-05-19', '2023-07-26 08:45:12', '2023-07-26 08:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kelas_id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Petugas TU', 'tu@gmail.com', NULL, 0, '$2y$10$VUvZSAMlVunZ6fcJTppRRu4Q.SfSQefpnm9oPVg5cgG2CTuL8wlAe', NULL, '2023-07-26 08:45:07', '2023-07-26 08:45:07'),
(2, NULL, 'Kurikulum', 'kurikulum@gmail.com', NULL, 1, '$2y$10$evvWhrCeeR3QMAbVHTICDuSSdao8bXE41dWwitU1mqV0vj36YZn2K', NULL, '2023-07-26 08:45:07', '2023-07-26 08:45:07'),
(3, 1, 'Wali Kelas 7', 'walikelas7@gmail.com', NULL, 2, '$2y$10$9DnNW1wxLdfyqjuIkHmUMOJmiZH9jnoBhIiFivWoRRPeBVZ/bSaO6', NULL, '2023-07-26 08:45:07', '2023-07-26 08:45:07'),
(4, 2, 'Wali Kelas 8', 'walikelas8@gmail.com', NULL, 2, '$2y$10$jdT9TdvLq0wiNjjs394qL.Zv.BDttYFNei1IUJIpp5w6pJcIN3.QO', NULL, '2023-07-26 08:45:08', '2023-07-26 08:45:08'),
(5, 3, 'Wali Kelas 9', 'walikelas9@gmail.com', NULL, 2, '$2y$10$Y94hcvfFQt/AN/IdpW6eoOLhQy1oNoSG.6Lx5MVfCrDXqMDADiO12', NULL, '2023-07-26 08:45:08', '2023-07-26 08:45:08'),
(6, NULL, 'Kepala Sekolah', 'kepalasekolah@gmail.com', NULL, 3, '$2y$10$q8e.KgBs74.iTUceD5iAPu.SFOQrsD2o9r/ORSUPpd1ZEDNWmTQBO', NULL, '2023-07-26 08:45:08', '2023-07-26 08:45:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nuptk_unique` (`nuptk`);

--
-- Indeks untuk tabel `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pembayarans`
--
ALTER TABLE `jenis_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_presensis`
--
ALTER TABLE `jenis_presensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_tahun_ajarans`
--
ALTER TABLE `jenis_tahun_ajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `siswas_email_unique` (`email`);

--
-- Indeks untuk tabel `tanggal_presensis`
--
ALTER TABLE `tanggal_presensis`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `haris`
--
ALTER TABLE `haris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_pembayarans`
--
ALTER TABLE `jenis_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_presensis`
--
ALTER TABLE `jenis_presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_tahun_ajarans`
--
ALTER TABLE `jenis_tahun_ajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tanggal_presensis`
--
ALTER TABLE `tanggal_presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
