-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 04:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_tunjangan_kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tunjangan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`, `kelas`, `tunjangan`) VALUES
(1, 'Kepala Balai', '13', 8562000),
(2, 'Analisis Bendahara Pranata Pertama', '7', 2928000);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tl` int(11) NOT NULL COMMENT 'terlambat',
  `pa` int(11) NOT NULL COMMENT 'pulang awal',
  `ta` int(11) NOT NULL COMMENT 'tidak absen',
  `tad` int(11) NOT NULL COMMENT 'tidak absen datang',
  `tap` int(11) NOT NULL COMMENT 'tidak absen pulang',
  `iz` int(11) NOT NULL COMMENT 'izin',
  `al` int(11) NOT NULL COMMENT 'alfa',
  `alb` int(11) NOT NULL COMMENT 'alfa 1 bulan',
  `bs` int(11) NOT NULL COMMENT 'tidak ditempat kerja',
  `dn` int(11) NOT NULL COMMENT 'dinas',
  `sa` int(11) NOT NULL COMMENT 'cuti sakit',
  `csa` int(11) NOT NULL COMMENT 'cuti sakit lebih dari 6 hari'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `agama` varchar(100) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `pendidikan` text NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `status_kepegawaian` tinyint(4) NOT NULL,
  `jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `alamat`, `agama`, `ttl`, `pendidikan`, `jabatan_id`, `status_kepegawaian`, `jk`) VALUES
(4, 7, 'Jl. Mulawarman Gg. Batu Tiban 1 No 3', 'Islam', 'Balikpapan, 23 Juli 1999', 'DIII Teknik Informatika', 1, 1, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `periode_tunjangan`
--

CREATE TABLE `periode_tunjangan` (
  `id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_tunjangan`
--

INSERT INTO `periode_tunjangan` (`id`, `periode`, `tanggal`, `verifikasi`) VALUES
(1, 'Tunjangan Mei 2022', '05-2022', 0),
(2, 'Tunjangan Juni 2022', '06-2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` varchar(225) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'Sistem Informasi Tunjangan Kinerja BLM Banjarmasin', 'logo.png', 'logo.png', 'admin@balatmas-banjarmasin.com', '081906515912', 'Jl. Handil Bhakti KM 9,5 No. 95 Banjarmasin, Kalimantan Selatan, Indonesia', 'https://facebook.com/psmbalatmas.banjarmasin', 'https://instagram.com/balatmas.bjm', 'Balatmas, Balai Latihan Masyarakat Banjarmasin', 'Balai Pelatihan dan Pemberdayaan Masyarakat Desa, Daerah Tertinggal dan Transmigrasi Banjarmasin', 'Kehadiran Lembaga Pelatihan Transmigrasi Banjarmasin waktu itu diawali dengan adanya kebutuhan yang mendesak oleh adanya kesenjangan sumber daya manusia yang dimiliki oleh aparatur transmigrasi dengan warga transmigrasi dan penduduk sekitar yang sangat membutuhkan adanya perubahan, baik dalam peningkatan pengetahuan, sikap perilaku dan keterampilan.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_person`
--

CREATE TABLE `tbl_person` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak akses Administrator'),
(2, 'Kepala Balai', 'Hak akses Kepala Balai'),
(3, 'Pejabat Pembuat Keputusan', ''),
(4, 'Pegawai PNS', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_reset_key` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'Administrator', '', 'admin@mail.com', '081906515912', '1652189426774.png', 1, '2022-05-11 13:29:34', '2020-03-14 21:58:17', NULL),
(2, 2, '122454395602', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'Pepen Efendi, SE., MM.', '', 'member@mail.com', '081906515912', '1583991814826.png', 1, '2022-05-11 00:09:58', '2020-03-14 22:00:32', NULL),
(7, 4, '12345678', '$2y$05$EtXsCR4IIcWtFEeVI0yjouFlZSly.ovC6eAcKZZjW5JXLCUlmvIn2', NULL, 'Ibnu', 'Setiawan', 'ibnu.setia23@gmail.com', '085828491428', '', 0, NULL, '2022-05-11 14:39:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_tunjangan`
--
ALTER TABLE `periode_tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_person`
--
ALTER TABLE `tbl_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `periode_tunjangan`
--
ALTER TABLE `periode_tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_person`
--
ALTER TABLE `tbl_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
