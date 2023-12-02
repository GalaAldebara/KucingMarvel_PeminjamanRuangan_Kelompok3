-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `kegiatan` varchar(500) NOT NULL,
  `nim/nip` varchar(50) NOT NULL,
  `id_ruang` varchar(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` enum('available','unavailable','pending','urgent') NOT NULL,
  `lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `keterangan`, `status`, `lantai`) VALUES
('lkb01', 'LKB.01', '', 'available', 7),
('lkj01', 'LKJ.01', '', 'available', 7),
('lkj02', 'LKJ.02', '', 'available', 7),
('lkj03', 'LKJ.03', '', 'available', 7),
('lp04', 'LP.04', '', 'available', 7),
('lpr01', 'LPR.01', '', 'available', 7),
('lpr02', 'LPR.02', '', 'available', 7),
('lpr03', 'LPR.03', '', 'available', 7),
('lpr04', 'LPR.04', '', 'available', 7),
('lpr05', 'LPR.05', '', 'available', 7),
('lpr06', 'LPR.06', '', 'unavailable', 7),
('lpr07', 'LPR.07', '', 'unavailable', 7),
('lpr08', 'LPR.08', '', 'unavailable', 7),
('lvk01', 'LVK.01', '', 'available', 7),
('lvk02', 'LVK.02', '', 'available', 7),
('rat01', 'RAT.01', '', 'urgent', 8),
('rt08', 'RT.08', '', 'pending', 7),
('rt09', 'RT.09', '', 'available', 8),
('rt10', 'RT.10', '', 'available', 8),
('rt11', 'RT.11', '', 'pending', 8);

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
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim/nip`, `nama`, `jurusan`, `level`, `no_telp`, `password`) VALUES
('0001', 'admin1', 'Tekhnologi Informasi', 'admin', '123456789', 1),
('0002', 'admin2', 'Tekhnologi Informasi', 'admin', '123456789', 2),
('0003', 'admin3', 'Tekhnologi Informasi', 'admin', '123456789', 3),
('1001', 'Dodit Suprianto SKom. MT.', 'Tekhnologi Informasi', 'dosen', '123456789', 1001),
('1002', 'Dika Rizky Yunianto, S.Kom, M.Kom', 'Tekhnologi Informasi', 'dosen', '123456789', 1002),
('1003', 'Endah Septa Sintiya. SPd., MKom.', 'Tekhnologi Informasi', 'dosen', '123456789', 1003),
('1004', 'Muhammad Unggul Pamenang, S.St., M.T.', 'Tekhnologi Informasi', 'dosen', '123456789', 1004),
('1005', 'Vipkas Al Hadid Firdaus, ST,. MT', 'Tekhnologi Informasi', 'dosen', '123456789', 1005),
('1006', 'Candra Bella Vista, S.Kom., MT.', 'Tekhnologi Informasi', 'dosen', '123456789', 1006),
('1007', 'Ahmadi Yuli Ananta, ST., M.M.\r\n', 'Tekhnologi Informasi', 'dosen', '123456789', 1007),
('2241720018', 'Wahyudi', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720057', 'Rizqi Reza Danuarta', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720099 ', 'Muhammmad Iqbal Makmur Al-Muniri', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 224172099),
('2241720113', 'Aleron Tsaqif Rakha Rajendra', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720142', 'Ridho Fauzian Pratama', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720159', 'Achmad Mufid', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720161', 'Rhanilham Fadlillatul Ramadhan', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720188', 'Bimantara Dwi Cahyo', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720227', 'Muhammad Irsyad Dany', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647),
('2241720233', 'Irsyad Danisaputra', 'Tekhnologi Informasi', 'mahasiswa', '123456789', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim/nip` (`nim/nip`),
  ADD KEY `FK_idRuang` (`id_ruang`);

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
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_idRuang` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nim/nip`) REFERENCES `user` (`nim/nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
