-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 09:13 AM
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
-- Database: `peminjaman_ruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `kode_hari` int(3) NOT NULL,
  `nama_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`kode_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(3) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `kode_hari` int(3) NOT NULL,
  `jp_mulai` int(3) NOT NULL,
  `jp_selesai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `id_ruang`, `kode_hari`, `jp_mulai`, `jp_selesai`) VALUES
(1, 1, 1, 1, 2);

--
-- Triggers `jadwal`
--
DELIMITER $$
CREATE TRIGGER `update_status_ruang` BEFORE INSERT ON `jadwal` FOR EACH ROW BEGIN
    -- Update status to 'unavailable' when new schedule starts
    UPDATE ruang
    SET status = 'unavailable'
    WHERE id_ruang = NEW.id_ruang
      AND lantai = 7
      AND status = 'available'
      AND TIME(NEW.jp_mulai) BETWEEN jp_mulai AND jp_selesai;

    -- Update status to 'available' when new schedule ends
    UPDATE ruang
    SET status = 'available'
    WHERE id_ruang = NEW.id_ruang
      AND lantai = 7
      AND status = 'unavailable'
      AND TIME(NEW.jp_selesai) BETWEEN jp_mulai AND jp_selesai;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jp`
--

CREATE TABLE `jp` (
  `kode_jp` int(3) NOT NULL,
  `jp_mulai` time NOT NULL,
  `jp_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jp`
--

INSERT INTO `jp` (`kode_jp`, `jp_mulai`, `jp_selesai`) VALUES
(1, '15:10:00', '15:11:00'),
(2, '15:11:00', '15:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `kegiatan` varchar(500) NOT NULL,
  `nim/nip` varchar(50) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `id_ruang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(3) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` enum('available','unavailable','pending','urgent') NOT NULL,
  `lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `keterangan`, `status`, `lantai`) VALUES
(1, 'LKB.01', '', 'available', 7),
(2, 'LKJ.01', '', 'available', 7),
(3, 'LKJ.02', '', 'available', 7),
(4, 'LKJ.03', '', 'available', 7),
(5, 'LP.04', '', 'available', 7),
(6, 'LPR.01', '', 'available', 7),
(7, 'LPR.02', '', 'available', 7),
(8, 'LPR.03', '', 'available', 7),
(9, 'LPR.04', '', 'available', 7),
(10, 'LPR.05', '', 'available', 7),
(11, 'LPR.06', '', 'unavailable', 7),
(12, 'LPR.07', '', 'unavailable', 7),
(13, 'LPR.08', '', 'unavailable', 7),
(14, 'LVK.01', '', 'available', 7),
(15, 'LVK.02', '', 'available', 7),
(16, 'RAT.01', '', 'urgent', 8),
(17, 'RT.08', '', 'pending', 7),
(18, 'RT.09', '', 'available', 8),
(19, 'RT.10', '', 'available', 8),
(20, 'RT.11', '', 'pending', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim/nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `level` enum('admin','dosen','mahasiswa') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim/nip`, `nama`, `jurusan`, `level`, `no_telp`, `password`) VALUES
('0001', 'admin1', 'Tekhnologi Informasi', 'admin', '123456789', '1'),
('0002', 'admin2', 'Tekhnologi Informasi', 'admin', '123456789', '2'),
('0003', 'admin3', 'Tekhnologi Informasi', 'admin', '123456789', '3'),
('01', 'admin', 'Teknik Informatika', 'mahasiswa', '081112223334', '21232f297a57a5a743894a0e4a801fc3'),
('1001', 'Dodit Suprianto SKom. MT.', 'Tekhnologi Informasi', 'dosen', '123456789', '1001'),
('1002', 'Dika Rizky Yunianto, S.Kom, M.Kom', 'Tekhnologi Informasi', 'dosen', '123456789', '1002'),
('1003', 'Endah Septa Sintiya. SPd., MKom.', 'Tekhnologi Informasi', 'dosen', '123456789', '1003'),
('1004', 'Muhammad Unggul Pamenang, S.St., M.T.', 'Tekhnologi Informasi', 'dosen', '123456789', '1004'),
('1005', 'Vipkas Al Hadid Firdaus, ST,. MT', 'Tekhnologi Informasi', 'dosen', '123456789', '1005'),
('1006', 'Candra Bella Vista, S.Kom., MT.', 'Tekhnologi Informasi', 'dosen', '123456789', '1006'),
('1007', 'Ahmadi Yuli Ananta, ST., M.M.\r\n', 'Tekhnologi Informasi', 'dosen', '123456789', '1007'),
('2241720018', 'Wahyudi', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720057', 'Rizqi Reza Danuarta', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720099 ', 'Muhammmad Iqbal Makmur Al-Muniri', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '224172099'),
('2241720113', 'Aleron Tsaqif Rakha Rajendra', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720142', 'Ridho Fauzian Pratama', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720159', 'Achmad Mufid', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720161', 'Rhanilham Fadlillatul Ramadhan', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720188', 'Bimantara Dwi Cahyo', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720227', 'Muhammad Irsyad Dany', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647'),
('2241720233', 'Irsyad Danisaputra', 'Tekhnologi Informasi', 'mahasiswa', '123456789', '2147483647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `FK_idRuang` (`id_ruang`),
  ADD KEY `FK_idHari` (`kode_hari`),
  ADD KEY `FK_JpMulai` (`jp_mulai`),
  ADD KEY `FK_JpSelesai` (`jp_selesai`);

--
-- Indexes for table `jp`
--
ALTER TABLE `jp`
  ADD PRIMARY KEY (`kode_jp`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim/nip` (`nim/nip`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim/nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `kode_hari` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jp`
--
ALTER TABLE `jp`
  MODIFY `kode_jp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_JpMulai` FOREIGN KEY (`jp_mulai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `FK_JpSelesai` FOREIGN KEY (`jp_selesai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `FK_idHari` FOREIGN KEY (`kode_hari`) REFERENCES `hari` (`kode_hari`),
  ADD CONSTRAINT `FK_idRuang` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nim/nip`) REFERENCES `user` (`nim/nip`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
