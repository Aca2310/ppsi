-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'avatar.png',
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `username`, `password`, `image`, `telp`) VALUES
(14, 'admin 1', 'admin1@gmail.com', 'admin1', '$2y$10$NekY5lXKLTpTyR8540uluubIoL/.HqKEzoSeAc6EIS2pH71lrnpr6', 'avatar.png', '081234567890'),
(15, 'admin 2', 'admin2@gmail.com', 'admin2', '$2y$10$RUVhsyOGPpT28iyDkwV3/u057SKFwRqQhHjD43BmdMER0Y8zxA3Ie', 'avatar.png', '082134567211');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `delete_admin` AFTER DELETE ON `admin` FOR EACH ROW DELETE FROM users WHERE
username = old.username
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_admin` AFTER INSERT ON `admin` FOR EACH ROW INSERT INTO
users
SET
email = new.email,
nama = new.nama_admin,
username = new.username,
password = new.password,
role = 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `id_petugas`) VALUES
(1, 'Keamanan', 1),
(2, 'Infrastruktur', 2),
(3, 'Sarana dan Prasarana', 3),
(4, 'Akademik', 4),
(5, 'Kemahasiswaan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'avatar.jpg',
  `email` varchar(128) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `username`, `nama`, `password`, `telp`, `image`, `email`, `prodi`) VALUES
('2111523024', 'khairinnisa2310', 'acha', '$2y$10$N7Nny7gzL6tHtX22.IJUneVMLWWOEWlSPQL61he7QImHdiEEqB33W', '2147483647', 'avatar.png', 'khairinnisa2310@gmail.com', 'sitem Informasi');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `insert_warga` AFTER INSERT ON `mahasiswa` FOR EACH ROW INSERT INTO
users
SET
email = new.email,
nama = new.nama,
username = new.username,
password = new.password,
role = 3
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_warga` AFTER UPDATE ON `mahasiswa` FOR EACH ROW UPDATE users
SET
email = new.email,
nama = new.nama,
username = new.username,
password = new.password,
role = 3
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL DEFAULT current_timestamp(),
  `nim` varchar(10) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `judul_pengaduan` varchar(200) NOT NULL,
  `isi_pengaduan` longtext NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `status_verifikasi` enum('Belum Verifikasi','Sudah Verifikasi','','') NOT NULL,
  `identitas_anonim` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nim`, `id_kategori`, `judul_pengaduan`, `isi_pengaduan`, `foto`, `status`, `status_verifikasi`, `identitas_anonim`) VALUES
(83, '0000-00-00', '2111523024', 2, 'kebersihan toilet', 'Untuk toiletnya lebih rajin dibersihkan dan lantai toilet licin.', 'Danze-DC011323-1.jpg', 'selesai', 'Sudah Verifikasi', 1),
(106, '2023-11-20', '2111523024', 1, 'coba petugas', 'coba untuk petugas lagi', 'Capture.PNG', 'pending', 'Belum Verifikasi', 1);

--
-- Triggers `pengaduan`
--
DELIMITER $$
CREATE TRIGGER `delete_pengaduan` AFTER DELETE ON `pengaduan` FOR EACH ROW DELETE FROM tanggapan WHERE
id_pengaduan = old.id_pengaduan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(18) NOT NULL,
  `status_petugas` varchar(35) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'avatar.jpg',
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `status_petugas`, `nama_petugas`, `email`, `username`, `password`, `telp`, `image`, `id_kategori`) VALUES
('197507071991031003', 'Keamanan', 'Petugas1', 'petugas1@gmail.com', 'petugas1', '$2y$10$aAv5Qk.FadDIvJRs7ZU59.uDipsDLuDwX.5eyQSbCX.N4HcMVZCh.', '08522377710', 'avatar.jpg', 1),
('197507071991031010', 'Sarana dan Prasarana', 'Petugas3', 'petugas3@gmail.com', 'petugas3', '$2y$10$B15CHkAyhkALWCiGRCSeiee81ojUYMXbdQ6jqhgMzyLZZ.61E50Tu', '082323236322', 'avatar.jpg', 3),
('198108201997032011', 'Infrastruktur', 'Petugas2', 'petugas2@gmail.com', 'petugas2', '$2y$10$JDL2sstfRTSMJvEkPS2j1OrFD08uYXPWqt3V2Og1cUol..Fky7U4q', '08212377710', 'avatar.jpg', 2),
('198208201997031002', 'Akademik', 'Petugas4', 'petugas4@gmail.com', 'petugas4', '$2y$10$32IOQGQCdmDPqxJbvbfKROpIn4ej7EIc28sA1MwLw15h/zpAyYQoe', '085231787052', 'avatar.jpg', 4),
('199308201997032102', 'Kemahasiswaan', 'Petugas5', 'petugas5@gmail.com', 'petugas5', '$2y$10$On5shVbN4inlLHfdham17ezWLULjrsicVv3.0KEP6uicFrp.ieiLO', '081247483647', 'avatar.jpg', 5);

--
-- Triggers `petugas`
--
DELIMITER $$
CREATE TRIGGER `insert_petugas` BEFORE INSERT ON `petugas` FOR EACH ROW INSERT INTO
users
SET
email = new.email,
nama = new.nama_petugas,
username = new.username,
password = new.password,
role = 2
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` timestamp NULL DEFAULT current_timestamp(),
  `tanggapan` longtext NOT NULL,
  `proses` tinyint(1) NOT NULL,
  `update_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `nip`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `proses`, `update_at`) VALUES
(65, '198108201997032011', 83, '2023-11-06 09:35:04', '<p>baik, terimakasih atas sarannya. Kami akan terus melakukan dan menjaga kebersihan toilet fti unand.</p>', 0, '00:00:00'),
(94, '197507071991031003', 106, '2023-11-20 11:17:32', '<span id=\"docs-internal-guid-2e5d3b86-7fff-af40-3a93-22d3703c4cfc\"><p dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-left: 108pt;text-indent: 36pt;text-align: justify;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; white-space-collapse: preserve;\">Pada halaman ini petugas bisa memberi tanggapan atas pengaduan mahasiswa.</span></p><div><span style=\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></div></span>', 0, '00:00:00');

--
-- Triggers `tanggapan`
--
DELIMITER $$
CREATE TRIGGER `acc_pengaduan` AFTER UPDATE ON `tanggapan` FOR EACH ROW UPDATE `pengaduan` SET `status` = 3 WHERE `pengaduan`.`id_pengaduan`=old.id_pengaduan
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `proses_pengaduan` AFTER INSERT ON `tanggapan` FOR EACH ROW UPDATE `pengaduan` SET `status` = 2 WHERE `pengaduan`.`id_pengaduan`=new.id_pengaduan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','petugas','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `username`, `password`, `role`) VALUES
(87, 'khairinnisa2310@gmail.com', 'acha', 'khairinnisa2310', '$2y$10$N7Nny7gzL6tHtX22.IJUneVMLWWOEWlSPQL61he7QImHdiEEqB33W', 'mahasiswa'),
(88, 'admin1@gmail.com', 'inti bem', 'admin1', '$2y$10$NekY5lXKLTpTyR8540uluubIoL/.HqKEzoSeAc6EIS2pH71lrnpr6', 'admin'),
(89, 'admin2@gmail.com', 'Internal Bem', 'admin2', '$2y$10$3BFcnU0vf1R3Ea7.2VTqV.ylneFw0We62frbSAC89LLVK5GicSqCq', 'admin'),
(98, 'petugas1@gmail.com', 'Petugas1', 'petugas1', '$2y$10$aAv5Qk.FadDIvJRs7ZU59.uDipsDLuDwX.5eyQSbCX.N4HcMVZCh.', 'petugas'),
(99, 'petugas2@gmail.com', 'Petugas2', 'petugas2', '$2y$10$JDL2sstfRTSMJvEkPS2j1OrFD08uYXPWqt3V2Og1cUol..Fky7U4q', 'petugas'),
(101, 'petugas3@gmail.com', 'Petugas3', 'petugas3', '$2y$10$B15CHkAyhkALWCiGRCSeiee81ojUYMXbdQ6jqhgMzyLZZ.61E50Tu', 'petugas'),
(103, 'petugas4@gmail.com', 'Petugas4', 'petugas4', '$2y$10$32IOQGQCdmDPqxJbvbfKROpIn4ej7EIc28sA1MwLw15h/zpAyYQoe', 'petugas'),
(105, 'petugas5@gmail.com', 'Petugas5', 'petugas5', '$2y$10$On5shVbN4inlLHfdham17ezWLULjrsicVv3.0KEP6uicFrp.ieiLO', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nik` (`nim`,`email`),
  ADD UNIQUE KEY `nik_2` (`nim`,`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD UNIQUE KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
