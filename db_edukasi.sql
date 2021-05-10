-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 01:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edukasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'keyedukasi', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/soal/index:get', 63, 1620599345, 'keyedukasi'),
(2, 'uri:api/soal/index:delete', 1, 1620570660, 'keyedukasi'),
(3, 'uri:api/soal/index:post', 5, 1620553940, 'keyedukasi'),
(4, 'uri:api/soal/index:put', 1, 1620554895, 'keyedukasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Numerasi', '2021-05-09 11:43:36', '2021-05-09 11:43:36'),
(2, 'Literasi', '2021-05-09 11:43:36', '2021-05-09 11:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihan_pertanyaan`
--

CREATE TABLE `tbl_pilihan_pertanyaan` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `is_right` tinyint(1) NOT NULL,
  `pilihan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pilihan_pertanyaan`
--

INSERT INTO `tbl_pilihan_pertanyaan` (`id`, `soal_id`, `is_right`, `pilihan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ini jawaban benar', '2021-05-09 16:21:06', '2021-05-09 16:21:06'),
(2, 1, 0, 'ini jaban salah', '2021-05-09 16:21:06', '2021-05-09 16:21:06'),
(3, 1, 0, 'ini jaban salah', '2021-05-09 16:21:22', '2021-05-09 16:21:22'),
(4, 1, 0, 'ini jaban salah', '2021-05-09 16:21:22', '2021-05-09 16:21:22'),
(5, 43555, 1, '1dsfdsf', '2021-05-09 22:05:18', '2021-05-09 22:05:18'),
(6, 43555, 0, 'hahha', '2021-05-09 22:09:53', '2021-05-09 22:09:53'),
(7, 43555, 0, 'dasadsaf', '2021-05-09 22:11:51', '2021-05-09 22:11:51'),
(8, 43555, 0, 'sdfasd', '2021-05-09 22:12:22', '2021-05-09 22:12:22'),
(9, 43552, 0, 'dsfds', '2021-05-09 22:20:57', '2021-05-09 22:20:57'),
(10, 43552, 0, 'dasfsdaf', '2021-05-09 22:25:02', '2021-05-09 22:25:02'),
(11, 43552, 0, 'tes', '2021-05-09 22:25:44', '2021-05-09 22:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_kategori_id` int(11) NOT NULL,
  `type_soal` enum('essay','pilihan ganda') COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'default.jpg\'',
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `kategori_id`, `sub_kategori_id`, `type_soal`, `soal`, `gambar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'pilihan ganda', 'Apa bahas pemrograman yang kamu kuasai ?', '43543.jpg', 1, '2021-05-09 13:25:51', '2021-05-09 13:25:51'),
(3, 1, 2, 'essay', 'Mana yang bukan type data string ?', '43547.jpg', 1, '2021-05-09 13:27:55', '2021-05-09 13:27:55'),
(4, 1, 1, 'essay', 'Mana yang tetermaksud type data string?', 'default.jpg', 0, '2021-05-09 13:51:42', '2021-05-09 13:51:42'),
(5, 1, 3, 'essay', 'HTML adalah ?', 'default.jpg', 1, '2021-05-09 15:08:05', '2021-05-09 15:08:05'),
(43550, 1, 3, 'pilihan ganda', 'php adalah ?', 'default.jpg', 1, '2021-05-09 16:44:41', '2021-05-09 16:44:41'),
(43551, 2, 1, 'essay', 'testyre', 'default.jpg', 1, '2021-05-09 18:27:17', '2021-05-09 18:27:17'),
(43552, 2, 1, 'pilihan ganda', 'testype1', 'default.jpg', 1, '2021-05-09 18:30:00', '2021-05-09 18:30:00'),
(43553, 1, 1, 'essay', 'rewew', 'default.jpg', 1, '2021-05-09 18:30:37', '2021-05-09 18:30:37'),
(43554, 1, 1, 'pilihan ganda', 'akuadalaah', 'default.jpg', 1, '2021-05-09 18:56:06', '2021-05-09 18:56:06'),
(43555, 1, 1, 'pilihan ganda', 'dia adalah', 'default.jpg', 1, '2021-05-09 18:56:21', '2021-05-09 18:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kategori`
--

CREATE TABLE `tbl_sub_kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sub_kategori`
--

INSERT INTO `tbl_sub_kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kelas 10', '2021-05-09 14:49:26', '2021-05-09 14:49:26'),
(2, 'kelas 11', '2021-05-09 14:49:44', '2021-05-09 14:49:44'),
(3, 'kelas 12', '2021-05-09 14:49:44', '2021-05-09 14:49:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pilihan_pertanyaan`
--
ALTER TABLE `tbl_pilihan_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pilihan_pertanyaan`
--
ALTER TABLE `tbl_pilihan_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43556;

--
-- AUTO_INCREMENT for table `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
