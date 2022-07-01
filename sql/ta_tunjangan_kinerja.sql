-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 09:24 AM
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
(2, 'Analisis Bendahara Pranata Pertama', '7', 2928000),
(4, 'Kepala Bagian Kepegawaian', '9', 3579210);

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
  `izin` int(11) NOT NULL COMMENT 'izin',
  `alpa` int(11) NOT NULL COMMENT 'alfa',
  `alb` int(11) NOT NULL COMMENT 'alfa 1 bulan',
  `bs` int(11) NOT NULL COMMENT 'tidak ditempat kerja',
  `dn` int(11) NOT NULL COMMENT 'dinas',
  `sakit` int(11) NOT NULL COMMENT 'cuti sakit',
  `csa` int(11) NOT NULL COMMENT 'cuti sakit lebih dari 6 hari',
  `potongan` float NOT NULL,
  `validasi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `user_id`, `periode`, `hadir`, `tl`, `pa`, `ta`, `tad`, `tap`, `izin`, `alpa`, `alb`, `bs`, `dn`, `sakit`, `csa`, `potongan`, `validasi`) VALUES
(1, 7, '05-2022', 25, 3, 0, 5, 0, 0, 0, 0, 0, 0, 0, 1, 0, 16.5, 1),
(2, 2, '05-2022', 20, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(3, 9, '05-2022', 20, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(5, 7, '06-2022', 17, 0, 4, 1, 1, 0, 0, 1, 0, 2, 0, 0, 0, 8.5, 1),
(7, 9, '06-2022', 22, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0, 2, 0, 10, 1),
(8, 2, '06-2022', 20, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lapkin`
--

CREATE TABLE `lapkin` (
  `id` int(11) NOT NULL,
  `tunjangan_id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `validasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapkin_detail`
--

CREATE TABLE `lapkin_detail` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `output` varchar(255) NOT NULL,
  `pengguna` varchar(255) NOT NULL,
  `jenis_tugas` varchar(255) NOT NULL,
  `tunjangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapkin_detail`
--

INSERT INTO `lapkin_detail` (`id`, `tanggal_kegiatan`, `nama_kegiatan`, `output`, `pengguna`, `jenis_tugas`, `tunjangan_id`) VALUES
(22, '2021-03-01', 'Membuat notulen tentang penjelasan kegiatan tahun anggara 2021', 'Dokumen', 'BPPMDDTT', 'KT', 3),
(23, '2021-03-02', 'Mengikuti zoom tentang pedoman umum pelatihan ', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(24, '2021-03-03', 'Mengikuti zoom tentang penjelasan Tugas dan fungsi BPSDM', 'Dokumentasi', 'BPPMDDTT, PSM', 'KP', 3),
(25, '2021-03-04', 'Membuat kurikulum pelatihan BUMDesa ', 'Dokumen', 'PSM', 'KS', 3),
(26, '2021-03-05', 'Membuat laporan telaah staf', 'Dokumen', 'BPPMDDTT, PSM', 'KT', 3),
(27, '2021-03-08', 'Mengikuti zoom tentang pedoman umum pelatihan final', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(28, '2021-03-09', 'Mengikuti rapat PSM tentang persipan pelatihan', 'Dokumentasi', 'PSM', 'KS', 3),
(29, '2021-03-10', 'Mengikuti rapat PSM tentang pembuatan bahan ajar dan PPT ', 'Dokumen', 'PSM', 'KS', 3),
(30, '2021-03-15', 'Melakukan rekrument peserta pelatihan BUMDesa di Kab. Tabalong', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(31, '2021-03-16', 'Melakukan rekrument peserta pelatihan BUMDesa di Kab. Tabalong', 'Dokumentai', 'BPPMDDTT, PSM', 'KS', 3),
(32, '2021-03-17', 'Melakukan rekrument peserta pelatihan BUMDesa di Kab. Kadangan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(33, '2021-03-18', 'Melakukan pembuatan laporan rekrutment dan seleksi calon peserta pelatihan pengelolaan BUMDesa angkatan II', 'Laporan', 'BPPMDDTT, PSM', 'KS', 3),
(34, '2021-03-19', 'Melakukan pembuatan Jadwal pelatihan BUMDesa, Merevisi kurikulum pelatihan BUMDesa', 'Dokumen', 'PSM', 'KS', 3),
(35, '2021-03-22', 'Melakukan pelatihan BUMDesa di Kab. Kotawaringi Barat Kalimantan Selatan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(36, '2021-03-23', 'Melakukan pelatihan BUMDesa di Kab. Kotawaringi Barat Kalimantan Selatan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(37, '2021-03-24', 'Melakukan pelatihan BUMDesa di Kab. Kotawaringi Barat Kalimantan Selatan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(38, '2021-03-25', 'Melakukan pelatihan BUMDesa di Kab. Kotawaringi Barat Kalimantan Selatan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(39, '2021-03-26', 'Melakukan pelatihan BUMDesa di Kab. Kotawaringi Barat Kalimantan Selatan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3),
(40, '2021-03-29', 'Mengolah nilai post test dan pre test', 'Data', 'BPPMDDTT, PSM', 'KS', 3),
(41, '2021-03-30', 'Membuat laporan pelatihan BUMDesa angkatan III', 'Laporan', 'BPPMDDTT, PSM', 'KS', 3),
(42, '2021-03-31', 'Melakukan rekrument peserta pelatihan BUMDesa di Kab. Kadangan', 'Dokumentasi', 'BPPMDDTT, PSM', 'KS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `tunjangan_id` int(11) NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  `kualitas_a` int(11) NOT NULL,
  `kualitas_b` int(11) NOT NULL,
  `kualitas_c` int(11) NOT NULL,
  `kualitas_d` int(11) NOT NULL,
  `ketepatan_a` int(11) NOT NULL,
  `ketepatan_b` int(11) NOT NULL,
  `kuantitas_a` int(11) NOT NULL,
  `kuantitas_b` int(11) NOT NULL,
  `pelayanan` int(11) NOT NULL,
  `integritas` int(11) NOT NULL,
  `komitmen` int(11) NOT NULL,
  `disiplin` int(11) NOT NULL,
  `kerjasama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `periode_tunjangan`
--

CREATE TABLE `periode_tunjangan` (
  `id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `hari_kerja` int(11) NOT NULL,
  `verifikasi` date DEFAULT NULL,
  `ttd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_tunjangan`
--

INSERT INTO `periode_tunjangan` (`id`, `periode`, `tanggal`, `awal`, `akhir`, `hari_kerja`, `verifikasi`, `ttd`) VALUES
(1, 'Tunjangan Mei 2022', '05-2022', '2022-05-01', '2022-05-31', 26, '2022-05-18', '2022-07-01'),
(2, 'Tunjangan Juni 2022', '06-2022', '2022-06-01', '2022-05-31', 25, '2022-05-18', '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `potongan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id`, `kode`, `name`, `potongan`) VALUES
(1, 'tl', 'Terlambat Awal', 0.5),
(2, 'pa', 'Pulang Awal', 0.5),
(3, 'ta', 'Tidak Absen', 3),
(4, 'tad', 'Tidak Absen Datang', 1.5),
(5, 'tap', 'Tidak Absen Pulang', 1.5),
(6, 'izin', 'Izin', 1),
(7, 'alpa', 'Alfa', 1),
(8, 'alb', 'Alfa 1 Bulan', 100),
(9, 'bs', 'Tidak di kantor', 1),
(10, 'dn', 'Perjalanan Dinas', 60),
(11, 'sakit', 'Cuti Sakit', 1),
(12, 'csa', 'Cuti Sakit Lebih Dari 6 Hari', 10);

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
(1, 'Sistem Informasi Tunjangan Kinerja BPPNDDTT Banjarmasin', 'logo.png', 'logo.png', 'admin@balatmas-banjarmasin.com', '081906515912', 'Jl. Handil Bhakti KM 9,5 No. 95 Banjarmasin, Kalimantan Selatan, Indonesia', 'https://facebook.com/psmbalatmas.banjarmasin', 'https://instagram.com/balatmas.bjm', 'Balatmas, Balai Latihan Masyarakat Banjarmasin', 'Balai Pelatihan dan Pemberdayaan Masyarakat Desa, Daerah Tertinggal dan Transmigrasi Banjarmasin', 'Kehadiran Lembaga Pelatihan Transmigrasi Banjarmasin waktu itu diawali dengan adanya kebutuhan yang mendesak oleh adanya kesenjangan sumber daya manusia yang dimiliki oleh aparatur transmigrasi dengan warga transmigrasi dan penduduk sekitar yang sangat membutuhkan adanya perubahan, baik dalam peningkatan pengetahuan, sikap perilaku dan keterampilan.');

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
  `alamat` text DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `ttl` text DEFAULT NULL,
  `pendidikan` text DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `status_kepegawaian` tinyint(4) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `first_name`, `last_name`, `email`, `phone`, `photo`, `alamat`, `agama`, `ttl`, `pendidikan`, `jabatan_id`, `status_kepegawaian`, `jk`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'Administrator', '', 'admin@mail.com', '081906515912', '1652189426774.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-01 13:28:43', '2020-03-14 21:58:17', NULL),
(2, 2, '122454395602', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'Pepen Efendi, SE., MM.', '', 'member@mail.com', '081906515912', '1583991814826.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, '2022-07-01 14:20:31', '2020-03-14 22:00:32', NULL),
(7, 4, '12345678', '$2y$05$EtXsCR4IIcWtFEeVI0yjouFlZSly.ovC6eAcKZZjW5JXLCUlmvIn2', NULL, 'Ibnu', 'Setiawan', 'ibnu.setia23@gmail.com', '085828491428', '', NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, '2022-05-27 07:59:06', '2022-05-11 14:39:52', NULL),
(9, 4, '1208192910', '$2y$05$p0tR9TqOfnuRTVYR8a9jGONm.oa59WaMnnOf8xMB9VlNMhZRyv0ES', NULL, 'Salma', 'Evangelina', 'salma@gmail.com', '081293120120', '', 'Handil Bakti', 'Islam', 'Banjarmasin, 07 Februari 2000', 'D-III Teknik Informatika', 2, 1, 'P', 1, '2022-05-27 07:51:07', '2022-05-18 17:16:16', NULL),
(10, 3, '31012039', '$2y$05$7xlNFrKn6K56ayFLPCozDeTB1ttgGtjrJ49SfcyTVeY367IeD6JaK', NULL, 'Rahmat ', 'Hidayatullah', 'rahmat@gmail.com', '08123940210', '', 'Jalan Adhyaksa No 129', 'Islam', 'Bojonegoro, 31 Desember 1980', 'S2 Akuntansi', 4, 1, 'L', 1, '2022-07-01 14:20:44', '2022-05-19 09:45:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL,
  `kehadiran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `tunjangan` float NOT NULL,
  `file_lapkin` varchar(255) DEFAULT NULL,
  `total_potongan` float NOT NULL,
  `total_tunjangan` float NOT NULL,
  `validasi` tinyint(4) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `penilaian` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `kehadiran_id`, `user_id`, `periode`, `tunjangan`, `file_lapkin`, `total_potongan`, `total_tunjangan`, `validasi`, `tanggal_terima`, `penilaian`) VALUES
(1, 1, 7, '05-2022', 2928000, NULL, 7.5, 2708400, 1, '2022-05-18', NULL),
(2, 2, 2, '05-2022', 8562000, NULL, 1, 8476380, 1, NULL, 91.705),
(3, 3, 9, '05-2022', 2928000, '3.xlsx', 1, 2898720, 1, NULL, 92.4),
(6, 5, 7, '06-2022', 2928000, NULL, 8.5, 2679120, 1, '2022-05-18', NULL),
(7, 7, 9, '06-2022', 2928000, NULL, 10, 2635200, 1, '2022-05-18', NULL),
(9, 8, 2, '06-2022', 8562000, NULL, 5, 8133900, 1, NULL, NULL);

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
-- Indexes for table `lapkin`
--
ALTER TABLE `lapkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapkin_detail`
--
ALTER TABLE `lapkin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_tunjangan`
--
ALTER TABLE `periode_tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
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
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lapkin`
--
ALTER TABLE `lapkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapkin_detail`
--
ALTER TABLE `lapkin_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periode_tunjangan`
--
ALTER TABLE `periode_tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
