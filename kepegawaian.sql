-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2023 pada 13.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anaks`
--

CREATE TABLE `anaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `status_anak` varchar(100) DEFAULT NULL,
  `umur` varchar(100) DEFAULT NULL,
  `t_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_tunjangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anaks`
--

INSERT INTO `anaks` (`id`, `user_id`, `nama_anak`, `status_anak`, `umur`, `t_lahir`, `tgl_lahir`, `status_tunjangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Mahmud', 'Mahasiswa', '21', '2023-07-04', '2023-07-04', 'Masih Ditunjang', '2023-07-17 01:05:07', '2023-07-17 17:50:24'),
(3, 1, 'Zahrani', 'Guru', '28', '2023-07-05', '2023-07-05', 'Tidak Ditunjang', '2023-07-17 01:06:37', '2023-07-22 04:42:38'),
(4, 1, 'Noor Afiah', 'Guru', '15', '2023-06-28', '2023-06-28', 'Tidak Ditunjang', '2023-07-17 02:11:30', '2023-07-17 17:50:47'),
(5, 2, 'Moona Hoshinova', 'Mahasiswa', '20', '2023-07-05', '2023-07-05', 'Tidak Ditunjang', '2023-07-17 04:50:21', '2023-07-22 04:43:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklats`
--

CREATE TABLE `diklats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_diklat` varchar(100) DEFAULT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `tempat_diklat` varchar(100) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `no_sttpl` varchar(100) DEFAULT NULL,
  `ttd_pejabat` varchar(100) DEFAULT NULL,
  `status_diklat` enum('Sudah Selesai','Sedang Mengikuti') DEFAULT 'Sedang Mengikuti',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diklats`
--

INSERT INTO `diklats` (`id`, `user_id`, `nama_diklat`, `penyelenggara`, `tempat_diklat`, `tgl_pelaksanaan`, `tgl_selesai`, `no_sttpl`, `ttd_pejabat`, `status_diklat`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'Pak Test', 'Rantau', '2023-07-26', '2023-07-27', '012/152/KK-0', 'Andi', 'Sedang Mengikuti', '2023-07-25 17:46:19', '2023-07-25 17:46:19');

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
-- Struktur dari tabel `file_naik_berkalas`
--

CREATE TABLE `file_naik_berkalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_berkas` varchar(255) DEFAULT NULL,
  `file_berkas_path` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `file_naik_berkalas`
--

INSERT INTO `file_naik_berkalas` (`id`, `user_id`, `file_berkas`, `file_berkas_path`, `ket`, `created_at`, `updated_at`) VALUES
(1, 1, '1690164560_HAHA.pdf', '/storage/uploads/skbt/1690164560_HAHA.pdf', 'sk_berkala_terakhir', '2023-07-23 18:09:20', '2023-07-23 18:09:20'),
(2, 1, '1690164628_HAHA.pdf', '/storage/uploads/skbt/1690164628_HAHA.pdf', 'sk_cpns', '2023-07-23 18:10:28', '2023-07-23 18:10:28'),
(3, 1, '1690164628_HOHO.pdf', '/storage/uploads/sk-cpns/1690164628_HOHO.pdf', NULL, '2023-07-23 18:10:28', '2023-07-23 18:10:28'),
(4, 1, '1690164759_HAHA.pdf', '/storage/uploads/skbt/1690164759_HAHA.pdf', NULL, '2023-07-23 18:12:39', '2023-07-23 18:12:39'),
(5, 1, '1690164759_HEHE.pdf', '/storage/uploads/sk-cpns/1690164759_HEHE.pdf', NULL, '2023-07-23 18:12:39', '2023-07-23 18:12:39'),
(6, 1, '1690348109_HAHA.pdf', '/storage/uploads/skbt/1690348109_HAHA.pdf', NULL, '2023-07-25 21:08:29', '2023-07-25 21:08:29'),
(7, 1, '1690348109_HEHE.pdf', '/storage/uploads/sk-cpns/1690348109_HEHE.pdf', NULL, '2023-07-25 21:08:29', '2023-07-25 21:08:29'),
(8, 1, '1690348109_HIHI.pdf', '/storage/uploads/sk-naik-pangkat-terakhir/1690348109_HIHI.pdf', NULL, '2023-07-25 21:08:29', '2023-07-25 21:08:29'),
(9, 1, '1690348109_HOHO.pdf', '/storage/uploads/sk-pemangku-jabatan/1690348109_HOHO.pdf', NULL, '2023-07-25 21:08:29', '2023-07-25 21:08:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  `masa_kerja` varchar(100) DEFAULT NULL,
  `gaji_pokok` varchar(100) DEFAULT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gajis`
--

INSERT INTO `gajis` (`id`, `golongan`, `masa_kerja`, `gaji_pokok`, `tahun`, `created_at`, `updated_at`) VALUES
(2, 'ia', '0 Tahun', '1.560.800', '2023-2024', '2023-07-18 16:52:47', '2023-07-18 16:52:47'),
(4, 'ia', '1 tahun', '-', '2023-2024', '2023-07-18 17:10:53', '2023-07-18 17:10:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepegawaians`
--

CREATE TABLE `kepegawaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jenis_jabatan` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `nomor_sk_cpns` varchar(255) DEFAULT NULL,
  `tgl_sk_cpns` date DEFAULT NULL,
  `nomor_sk_pns` varchar(255) DEFAULT NULL,
  `tgl_sk_pns` date DEFAULT NULL,
  `no_karpeg` varchar(100) DEFAULT NULL,
  `status_pegawai` varchar(100) DEFAULT NULL,
  `masa_kerja` varchar(100) DEFAULT 'Aktif',
  `gaji` varchar(100) DEFAULT NULL,
  `satuan_kerja` varchar(100) DEFAULT NULL,
  `isKepalaSatuan` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kepegawaians`
--

INSERT INTO `kepegawaians` (`id`, `user_id`, `jabatan`, `jenis_jabatan`, `pangkat`, `golongan`, `nomor_sk_cpns`, `tgl_sk_cpns`, `nomor_sk_pns`, `tgl_sk_pns`, `no_karpeg`, `status_pegawai`, `masa_kerja`, `gaji`, `satuan_kerja`, `isKepalaSatuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Analis Perlindungan Masyarakat', 'Jabatan Tambahan/Tugas Kerja', 'Penata Muda', 'III/a', '813.2/002-SI/BKD', '2007-01-18', '821.12/071-SI/BKD', '2008-02-28', '1122334455', 'Aktif', '30 tahun', '3000000', 'Satuan Polisi Pamong Praja Dan Kebakaran', NULL, '2023-07-16 05:37:37', '2023-07-25 23:43:45'),
(3, 2, 'Pengelola Data', 'Jabatan Tambahan/Tugas Kerja', 'Penata Muda', 'III/a', '813.2/002-SI/BKD', '2007-01-18', '821.2/071-SI/BKD', '2008-02-28', '0123654789', 'Aktif', '30 tahun', '1000000', 'Satuan Polisi Pamong Praja Dan Kebakaran', 1, '2023-07-16 19:27:34', '2023-07-19 03:27:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page`
--

CREATE TABLE `landing_page` (
  `id` int(11) NOT NULL,
  `tittle` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `foto_landing_page` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `landing_page`
--

INSERT INTO `landing_page` (`id`, `tittle`, `deskripsi`, `foto_landing_page`) VALUES
(3, 'test123', 'test123', '3.png'),
(4, 'Ini tittle ke 2', 'Ini deskripsi ke 2', '4.png'),
(5, 'Ini tittle ke 3', 'Ini deskripsi ke 3', '5.png');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_15_114416_create_pegawai_table', 2),
(7, '2023_07_16_112507_create_kepegawaians_table', 2),
(8, '2023_07_17_001147_create_suami_istris_table', 3),
(9, '2023_07_17_052859_create_anaks_table', 4),
(10, '2023_07_17_105917_create_gajis_table', 5),
(11, '2023_08_17_104926_create_naik_berkalas_table', 5),
(12, '2023_07_19_113132_create_file_naik_berkalas_table', 6),
(13, '2023_07_20_132513_create_pangkats_table', 7),
(14, '2023_08_20_070057_create_naik_pangkats_table', 7),
(15, '2023_07_22_075531_create_pendidikans_table', 8),
(16, '2023_07_25_103220_create_diklats_table', 9),
(17, '2023_07_26_081206_create_naik_pangkat_p_s_table', 10),
(18, '2023_07_26_081215_create_naik_pangkat_p_s_i_s_table', 10),
(19, '2023_07_26_081222_create_naik_pangkat_f_t_s_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `naik_berkalas`
--

CREATE TABLE `naik_berkalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gaji_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gaji_lama` varchar(255) DEFAULT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `naik_selanjutnya` date DEFAULT NULL,
  `ket` enum('Belum Disetujui','Disetujui') DEFAULT 'Belum Disetujui',
  `tgl_usulan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `naik_berkalas`
--

INSERT INTO `naik_berkalas` (`id`, `user_id`, `gaji_id`, `gaji_lama`, `mulai_tanggal`, `naik_selanjutnya`, `ket`, `tgl_usulan`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, '2023-07-15', '2023-07-21', 'Belum Disetujui', '2023-07-22', '2023-07-20 02:32:40', '2023-07-20 02:32:40'),
(3, 1, 2, NULL, '2023-07-24', '2023-07-13', 'Disetujui', '2023-07-18', '2023-07-23 17:53:20', '2023-07-28 06:01:34'),
(4, 1, 2, NULL, '2023-07-24', '2023-07-24', 'Belum Disetujui', '2023-07-24', '2023-07-23 18:12:39', '2023-07-23 18:12:39'),
(5, 1, 2, NULL, '2023-07-21', '2023-07-21', 'Belum Disetujui', '2023-07-26', '2023-07-25 21:08:29', '2023-07-25 21:08:29'),
(6, 3, 2, NULL, '2023-07-29', '2023-07-29', 'Belum Disetujui', '2023-07-29', '2023-07-28 23:04:29', '2023-07-28 23:04:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `naik_pangkats`
--

CREATE TABLE `naik_pangkats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_usulan` int(1) DEFAULT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `naik_selanjutnya` date DEFAULT NULL,
  `tgl_usulan` date DEFAULT NULL,
  `ket` enum('Belum Disetujui','Disetujui') DEFAULT 'Belum Disetujui',
  `link` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `naik_pangkats`
--

INSERT INTO `naik_pangkats` (`id`, `user_id`, `jenis_usulan`, `pangkat_id`, `mulai_tanggal`, `naik_selanjutnya`, `tgl_usulan`, `ket`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, '2023-07-25', '2023-08-24', '2023-07-24', 'Disetujui', 'www.google.co.id', '2023-07-24 06:27:15', '2023-07-28 07:02:34'),
(3, 1, 2, 1, '2023-07-13', '2023-06-25', '2023-07-15', 'Disetujui', 'https://www.youtube.com/watch?v=ZpRYJwPFbWY', '2023-07-24 06:44:17', '2023-07-28 07:10:52'),
(4, 1, 3, 1, '2023-07-13', '2023-06-25', '2023-07-15', 'Disetujui', 'https://www.youtube.com/watch?v=ZpRYJwPFbWY', '2023-07-24 06:44:17', '2023-07-28 07:16:59'),
(5, 3, 1, 2, '2023-07-29', '2023-07-29', '2023-07-29', 'Belum Disetujui', NULL, '2023-07-29 00:54:12', '2023-07-29 00:54:12'),
(6, 3, 2, 1, '2023-07-29', '2023-07-29', '2023-07-29', 'Belum Disetujui', NULL, '2023-07-29 01:02:45', '2023-07-29 01:02:45'),
(7, 3, 3, 2, '2023-07-29', '2023-07-29', '2023-07-29', 'Belum Disetujui', NULL, '2023-07-29 01:03:36', '2023-07-29 01:03:36'),
(8, 3, 4, 1, '2023-07-29', '2023-07-29', '2023-07-29', 'Belum Disetujui', NULL, '2023-07-29 01:04:24', '2023-07-29 01:04:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `naik_pangkat_f_t_s`
--

CREATE TABLE `naik_pangkat_f_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `naik_selanjutnya` date DEFAULT NULL,
  `tgl_usulan` date DEFAULT NULL,
  `ket` enum('Belum Disetujui','Disetujui') DEFAULT 'Belum Disetujui',
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `naik_pangkat_p_s`
--

CREATE TABLE `naik_pangkat_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `naik_selanjutnya` date DEFAULT NULL,
  `tgl_usulan` date DEFAULT NULL,
  `ket` enum('Belum Disetujui','Disetujui') DEFAULT 'Belum Disetujui',
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `naik_pangkat_p_s_i_s`
--

CREATE TABLE `naik_pangkat_p_s_i_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `naik_selanjutnya` date DEFAULT NULL,
  `tgl_usulan` date DEFAULT NULL,
  `ket` enum('Belum Disetujui','Disetujui') DEFAULT 'Belum Disetujui',
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkats`
--

CREATE TABLE `pangkats` (
  `id_pangkat` bigint(20) UNSIGNED NOT NULL,
  `nama_pangkat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pangkats`
--

INSERT INTO `pangkats` (`id_pangkat`, `nama_pangkat`, `created_at`, `updated_at`) VALUES
(1, 'Juru Muda', '2023-07-20 06:26:30', '2023-07-20 06:39:49'),
(2, 'Juru Muda Tingkat I', '2023-07-20 06:28:09', '2023-07-20 06:28:09'),
(3, 'Juru', '2023-07-20 06:40:10', '2023-07-20 06:40:16');

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
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id_pendidikan` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_ijazah` varchar(255) DEFAULT NULL,
  `tgl_ijazah` date DEFAULT NULL,
  `tingkat_pendidikan` varchar(255) DEFAULT NULL,
  `lembaga_pendidikan` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikans`
--

INSERT INTO `pendidikans` (`id_pendidikan`, `user_id`, `no_ijazah`, `tgl_ijazah`, `tingkat_pendidikan`, `lembaga_pendidikan`, `jurusan`, `kota`, `tahun_lulus`, `created_at`, `updated_at`) VALUES
(1, 1, '15 OA oa 0019276', '1992-05-30', 'SDA', 'SDN RANTAU KIWA 1', '-', 'RANTAU', '1992', '2023-07-22 03:41:34', '2023-07-22 04:32:10');

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
-- Struktur dari tabel `suami_istris`
--

CREATE TABLE `suami_istris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_si` varchar(100) DEFAULT NULL,
  `status_si` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `t_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_tunjangan` varchar(100) DEFAULT NULL,
  `umur` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suami_istris`
--

INSERT INTO `suami_istris` (`id`, `user_id`, `nama_si`, `status_si`, `pekerjaan`, `t_lahir`, `tgl_lahir`, `status_tunjangan`, `umur`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nama Istri', 'Istri', 'Ibu Rumah tangga', 'Rantau', '2023-07-04', 'Masih Ditunjang', '21', '082351426589', '2023-07-16 21:11:14', '2023-07-16 21:19:26'),
(2, 2, 'Kiki Asiyah', 'Istri', 'Ibu Rumah Tangga', 'Bandung', '1983-11-01', 'Masih Ditunjang', '40', '0812510245215', '2023-07-19 02:58:04', '2023-07-19 02:58:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `t_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status_kawin` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `jumlah_anak` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `no_kk` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `no_bpjs` varchar(255) DEFAULT NULL,
  `no_karsu` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `t_lahir`, `tgl_lahir`, `jenis_kelamin`, `nohp`, `alamat`, `agama`, `status_kawin`, `pendidikan`, `jumlah_anak`, `nik`, `no_kk`, `no_rek`, `npwp`, `no_bpjs`, `no_karsu`, `email`, `foto`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, '197911082006041022', 'Mukhlis, SH', 'Tapin', '1979-11-08', 'Laki-laki', '081348017891', 'Jln. Brigjend H. Hasan Basri - Tapin ', 'Islam', 'Kawin', 'SLTA', '3', '35054290', '31445', '034101000743', '08.178.554.2-123.321', '123456789', '16545655', 'mukhlisnafis07@gmail.com', NULL, NULL, '$2y$10$4I4yLLSY5O/74XuIBqyizuA.3IN4EDK6a5OUBks9Q02tTN.6s3x6W', NULL, NULL, '2023-07-11 15:23:19', '2023-07-25 23:43:45'),
(2, '197407272006041016', 'Rizali', 'Kuala Kapuas', '1974-07-27', 'Laki-laki', '081251384526', 'Jln. MTQ Gang Mufakat RT 005 RW 001 Kel. Rantau Kiwa Kec. Tapin Utara - Tapin ', 'Islam', 'Kawin', 'SLTA', '1', '12344', '123', '1234321099', '333', '123', '5555', 'rizali.ahmadku@gmail.com', NULL, NULL, '$2y$10$xTQnhXxoWHVdteCbSu67uevpP4EtQcbIB8Ibe99Csg4Z85cu3VOKm', NULL, NULL, '2023-07-15 17:37:29', '2023-07-19 02:46:23'),
(3, 'e03100141', 'Riswandi', NULL, NULL, NULL, '0811511441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'riswandi.adha@gmail.com', NULL, NULL, '$2y$10$14alT.74wdEPhIkal0m3Ney6nfESWdLgJkYeBwWvEJaD2Gasvhdfi', NULL, 'Admin', '2023-07-26 06:03:32', '2023-07-26 06:03:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anaks`
--
ALTER TABLE `anaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anaks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `diklats`
--
ALTER TABLE `diklats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diklats_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_naik_berkalas`
--
ALTER TABLE `file_naik_berkalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_naik_berkalas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepegawaians`
--
ALTER TABLE `kepegawaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepegawaians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `landing_page`
--
ALTER TABLE `landing_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `naik_berkalas`
--
ALTER TABLE `naik_berkalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naik_berkalas_user_id_foreign` (`user_id`),
  ADD KEY `naik_berkalas_gaji_id_foreign` (`gaji_id`);

--
-- Indeks untuk tabel `naik_pangkats`
--
ALTER TABLE `naik_pangkats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naik_pangkats_user_id_foreign` (`user_id`),
  ADD KEY `naik_pangkats_pangkat_id_foreign` (`pangkat_id`);

--
-- Indeks untuk tabel `naik_pangkat_f_t_s`
--
ALTER TABLE `naik_pangkat_f_t_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naik_pangkat_f_t_s_user_id_foreign` (`user_id`),
  ADD KEY `naik_pangkat_f_t_s_pangkat_id_foreign` (`pangkat_id`);

--
-- Indeks untuk tabel `naik_pangkat_p_s`
--
ALTER TABLE `naik_pangkat_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naik_pangkat_p_s_user_id_foreign` (`user_id`),
  ADD KEY `naik_pangkat_p_s_pangkat_id_foreign` (`pangkat_id`);

--
-- Indeks untuk tabel `naik_pangkat_p_s_i_s`
--
ALTER TABLE `naik_pangkat_p_s_i_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naik_pangkat_p_s_i_s_user_id_foreign` (`user_id`),
  ADD KEY `naik_pangkat_p_s_i_s_pangkat_id_foreign` (`pangkat_id`);

--
-- Indeks untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `pendidikans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `suami_istris`
--
ALTER TABLE `suami_istris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suami_istris_no_hp_unique` (`no_hp`),
  ADD KEY `suami_istris_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anaks`
--
ALTER TABLE `anaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `diklats`
--
ALTER TABLE `diklats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_naik_berkalas`
--
ALTER TABLE `file_naik_berkalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kepegawaians`
--
ALTER TABLE `kepegawaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `landing_page`
--
ALTER TABLE `landing_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `naik_berkalas`
--
ALTER TABLE `naik_berkalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `naik_pangkats`
--
ALTER TABLE `naik_pangkats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `naik_pangkat_f_t_s`
--
ALTER TABLE `naik_pangkat_f_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `naik_pangkat_p_s`
--
ALTER TABLE `naik_pangkat_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `naik_pangkat_p_s_i_s`
--
ALTER TABLE `naik_pangkat_p_s_i_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  MODIFY `id_pangkat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id_pendidikan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suami_istris`
--
ALTER TABLE `suami_istris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anaks`
--
ALTER TABLE `anaks`
  ADD CONSTRAINT `anaks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `diklats`
--
ALTER TABLE `diklats`
  ADD CONSTRAINT `diklats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file_naik_berkalas`
--
ALTER TABLE `file_naik_berkalas`
  ADD CONSTRAINT `file_naik_berkalas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kepegawaians`
--
ALTER TABLE `kepegawaians`
  ADD CONSTRAINT `kepegawaians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `naik_berkalas`
--
ALTER TABLE `naik_berkalas`
  ADD CONSTRAINT `naik_berkalas_gaji_id_foreign` FOREIGN KEY (`gaji_id`) REFERENCES `gajis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `naik_berkalas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `naik_pangkats`
--
ALTER TABLE `naik_pangkats`
  ADD CONSTRAINT `naik_pangkats_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id_pangkat`) ON DELETE CASCADE,
  ADD CONSTRAINT `naik_pangkats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `naik_pangkat_f_t_s`
--
ALTER TABLE `naik_pangkat_f_t_s`
  ADD CONSTRAINT `naik_pangkat_f_t_s_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id_pangkat`) ON DELETE CASCADE,
  ADD CONSTRAINT `naik_pangkat_f_t_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `naik_pangkat_p_s`
--
ALTER TABLE `naik_pangkat_p_s`
  ADD CONSTRAINT `naik_pangkat_p_s_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id_pangkat`) ON DELETE CASCADE,
  ADD CONSTRAINT `naik_pangkat_p_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `naik_pangkat_p_s_i_s`
--
ALTER TABLE `naik_pangkat_p_s_i_s`
  ADD CONSTRAINT `naik_pangkat_p_s_i_s_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id_pangkat`) ON DELETE CASCADE,
  ADD CONSTRAINT `naik_pangkat_p_s_i_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD CONSTRAINT `pendidikans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suami_istris`
--
ALTER TABLE `suami_istris`
  ADD CONSTRAINT `suami_istris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
