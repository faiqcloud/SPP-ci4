-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 03:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_gregorius`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `nips` int(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nuptk` int(10) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Konghucu','Budha','Hindu') NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `mapel` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `sertifikat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`nips`, `nama`, `nuptk`, `jk`, `tempat`, `tgl_lahir`, `agama`, `tingkat`, `jurusan`, `mapel`, `kelas`, `jabatan`, `sertifikat`) VALUES
(5678, 'BAGUS Dwi P', 6658, 'laki-laki', 'Batang', '1978-09-23', 'Budha', 'S1', 'Matematika Murni', 'Matematika Lm', 'XII', 'Guru', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nisn` int(10) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Budha','Katolik','Konghucu') NOT NULL,
  `tempat` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `sekolah` varchar(25) NOT NULL,
  `pekortu` varchar(25) NOT NULL,
  `ayah` varchar(25) NOT NULL,
  `ibu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `id_user`, `nama`, `nisn`, `jk`, `kelas`, `agama`, `tempat`, `tanggal`, `sekolah`, `pekortu`, `ayah`, `ibu`) VALUES
(1234, 2, 'Ilham', 11998822, 'laki-laki', 'XII MIPA 3', 'Islam', 'Pekalongan', '2004-09-10', 'SMA N 1 Sragi', 'Juragan Tanah', 'Muis', 'Yuni'),
(2233, 3, 'Muhammad Satrio P', 99887766, 'laki-laki', 'XII TKRO', 'Islam', 'Batang', '2005-04-10', 'SMP N 12 Pekalongan', 'PNS', 'Hartanto', 'Sulistya wati'),
(5678, 4, 'M Ilham Sahada', 55664433, 'laki-laki', 'XI IPS 5', 'Kristen', 'Batang', '2007-08-20', 'SMP N 46 Jakarta', 'Wiraswasta', 'Slamet', 'Yuni');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$ajqCZGCjYnWau4xcodTI3O4Q9vAmZ8lpTuhYphmot3b61rAb6hTLG', 'admin'),
(2, 'Ilham', '$2y$10$rr71MgHGLTtOt9TeUkq6iuuPP4xTuabOfUbmvHqHa7kA/ody4336W', 'user'),
(3, '2233', '$2y$10$U029qlAlVD1eFEXyyFAnHeoFGByv61n5NQ3xl3fLQOhOaeXxe8gQK', 'user'),
(4, '5678', '$2y$10$ZR8OTb443pB8HDDDPiIQFuNoABqSxPbDXumE71awP4dY9nSo..vTi', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pangkal`
--

CREATE TABLE `pangkal` (
  `id` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `totbpangkal` int(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pangkal`
--

INSERT INTO `pangkal` (`id`, `nis`, `periode`, `totbpangkal`, `status`) VALUES
(1, 2233, '2024/2025', 300000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `totbspp` int(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `nis`, `periode`, `totbspp`, `status`) VALUES
(13, 2233, '2024/2025', 2100000, 'Lunas'),
(14, 1234, '2024/2025', 120000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tahunan`
--

CREATE TABLE `tahunan` (
  `id` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `totbtahunan` int(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahunan`
--

INSERT INTO `tahunan` (`id`, `nis`, `periode`, `totbtahunan`, `status`) VALUES
(1, 2233, '2024/2025', 200000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tpangkal`
--

CREATE TABLE `tpangkal` (
  `id` int(10) NOT NULL,
  `kpangkal` varchar(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `bpangkal` int(11) NOT NULL,
  `tgl_pangkal` date NOT NULL,
  `periode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpangkal`
--

INSERT INTO `tpangkal` (`id`, `kpangkal`, `nis`, `bpangkal`, `tgl_pangkal`, `periode`) VALUES
(1, 'p-07', 2233, 300000, '2025-01-14', '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `tspp`
--

CREATE TABLE `tspp` (
  `id` int(10) NOT NULL,
  `kspp` varchar(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `bspp` int(11) NOT NULL,
  `tgl_spp` date NOT NULL,
  `periode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tspp`
--

INSERT INTO `tspp` (`id`, `kspp`, `nis`, `bspp`, `tgl_spp`, `periode`) VALUES
(14, 'pp-01', 1234, 60000, '2025-01-13', '2024/2025'),
(13, 'SP-01', 2233, 50000, '2024-12-23', '2024/2025'),
(14, 'SP-02', 1234, 60000, '2024-12-23', '2024/2025'),
(13, 'SP-06', 2233, 1500000, '2024-12-23', '2024/2025'),
(13, 'SP-07', 2233, 550000, '2024-12-24', '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `ttahunan`
--

CREATE TABLE `ttahunan` (
  `id` int(10) NOT NULL,
  `ktahunan` varchar(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `btahunan` int(11) NOT NULL,
  `tgl_tahunan` date NOT NULL,
  `periode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ttahunan`
--

INSERT INTO `ttahunan` (`id`, `ktahunan`, `nis`, `btahunan`, `tgl_tahunan`, `periode`) VALUES
(1, 'T-01', 2233, 200000, '2025-01-14', '2024/2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`nips`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkal`
--
ALTER TABLE `pangkal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tahunan`
--
ALTER TABLE `tahunan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tpangkal`
--
ALTER TABLE `tpangkal`
  ADD PRIMARY KEY (`kpangkal`),
  ADD KEY `id` (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tspp`
--
ALTER TABLE `tspp`
  ADD PRIMARY KEY (`kspp`),
  ADD KEY `id` (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `ttahunan`
--
ALTER TABLE `ttahunan`
  ADD PRIMARY KEY (`ktahunan`),
  ADD KEY `id` (`id`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pangkal`
--
ALTER TABLE `pangkal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahunan`
--
ALTER TABLE `tahunan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `login_user` (`id`);

--
-- Constraints for table `pangkal`
--
ALTER TABLE `pangkal`
  ADD CONSTRAINT `pangkal_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Constraints for table `tahunan`
--
ALTER TABLE `tahunan`
  ADD CONSTRAINT `tahunan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Constraints for table `tpangkal`
--
ALTER TABLE `tpangkal`
  ADD CONSTRAINT `tpangkal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pangkal` (`id`),
  ADD CONSTRAINT `tpangkal_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Constraints for table `tspp`
--
ALTER TABLE `tspp`
  ADD CONSTRAINT `tspp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `spp` (`id`),
  ADD CONSTRAINT `tspp_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Constraints for table `ttahunan`
--
ALTER TABLE `ttahunan`
  ADD CONSTRAINT `ttahunan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tahunan` (`id`),
  ADD CONSTRAINT `ttahunan_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
