-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2023 pada 11.32
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
-- Database: `peminjaman_ruang`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `CheckRoomStatus` (`roomId` INT) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE roomStatus VARCHAR(20);

    SELECT 
        CASE 
            WHEN jp_mulai <= CURRENT_TIME() AND jp_selesai >= CURRENT_TIME() THEN 'Terpakai'
            ELSE 'Tidak Terpakai'
        END INTO roomStatus
    FROM cekstatusruang
    WHERE id_ruang = roomId
    LIMIT 1;

    RETURN roomStatus;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cekstatusruang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cekstatusruang` (
`kode_jadwal` int(3)
,`id_ruang` int(3)
,`nama_ruang` varchar(50)
,`ruang_keterangan` varchar(500)
,`ruang_lantai` int(11)
,`jp_mulai` time
,`jp_selesai` time
,`kode_hari` int(3)
,`nama_hari` varchar(10)
,`status_ruang` varchar(14)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `kapasitas` int(50) NOT NULL,
  `proyektor` int(50) NOT NULL,
  `papantulis` int(50) NOT NULL,
  `stopkontak` int(50) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `kapasitas`, `proyektor`, `papantulis`, `stopkontak`, `id_ruang`) VALUES
(1, 31, 1, 1, 10, 1),
(2, 30, 1, 1, 10, 2),
(3, 32, 4, 1, 10, 3),
(4, 30, 1, 1, 10, 4),
(5, 30, 1, 1, 10, 5),
(6, 30, 1, 1, 10, 6),
(7, 30, 1, 1, 10, 7),
(8, 30, 1, 1, 10, 8),
(9, 30, 1, 1, 10, 9),
(10, 30, 1, 1, 10, 10),
(11, 30, 1, 1, 10, 11),
(12, 30, 1, 1, 10, 12),
(13, 30, 1, 1, 10, 13),
(14, 30, 1, 1, 10, 14),
(15, 30, 1, 1, 10, 15),
(16, 30, 1, 1, 10, 16),
(17, 30, 1, 1, 10, 17),
(18, 30, 1, 1, 10, 18),
(19, 30, 1, 1, 10, 19),
(20, 30, 1, 1, 10, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `kode_hari` int(3) NOT NULL,
  `nama_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`kode_hari`, `nama_hari`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(3) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `kode_hari` int(3) NOT NULL,
  `jp_mulai` int(3) NOT NULL,
  `jp_selesai` int(3) NOT NULL,
  `kode_minggu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `id_ruang`, `kode_hari`, `jp_mulai`, `jp_selesai`, `kode_minggu`) VALUES
(1, 1, 1, 1, 3, 1),
(2, 1, 1, 4, 7, 1),
(3, 1, 2, 4, 7, 1),
(4, 1, 3, 1, 3, 1),
(5, 1, 3, 7, 9, 1),
(6, 1, 4, 2, 5, 1),
(7, 1, 4, 1, 4, 1),
(8, 1, 4, 7, 9, 1),
(9, 1, 5, 1, 4, 1),
(10, 2, 1, 1, 5, 1),
(11, 2, 2, 1, 4, 1),
(12, 2, 2, 5, 8, 1),
(13, 2, 3, 1, 4, 1),
(14, 2, 4, 4, 8, 1),
(15, 2, 5, 1, 3, 1),
(16, 3, 1, 1, 4, 1),
(17, 3, 1, 6, 9, 1),
(18, 3, 2, 5, 9, 1),
(19, 3, 3, 1, 4, 1),
(20, 3, 3, 7, 9, 1),
(21, 3, 4, 4, 7, 1),
(22, 3, 5, 1, 4, 1),
(23, 4, 1, 1, 4, 1),
(24, 4, 2, 5, 7, 1),
(25, 4, 3, 1, 3, 1),
(26, 4, 4, 3, 7, 1),
(27, 4, 5, 7, 9, 1),
(28, 5, 1, 3, 5, 1),
(29, 5, 2, 4, 8, 1),
(30, 5, 3, 1, 3, 1),
(31, 5, 3, 6, 8, 1),
(32, 5, 4, 5, 8, 1),
(33, 5, 5, 1, 4, 1),
(34, 6, 1, 1, 4, 1),
(35, 6, 1, 6, 9, 1),
(36, 6, 2, 2, 6, 1),
(37, 6, 3, 2, 4, 1),
(38, 6, 3, 8, 9, 1),
(39, 6, 4, 2, 5, 1),
(40, 6, 5, 6, 8, 1),
(41, 7, 1, 2, 4, 1),
(42, 7, 2, 3, 7, 1),
(43, 7, 3, 2, 4, 1),
(44, 7, 3, 7, 9, 1),
(45, 7, 4, 3, 7, 1),
(46, 7, 5, 1, 4, 1),
(47, 8, 1, 5, 9, 1),
(48, 8, 2, 3, 7, 1),
(49, 8, 3, 2, 7, 1),
(50, 8, 4, 3, 7, 1),
(51, 8, 5, 6, 9, 1),
(52, 9, 1, 1, 5, 1),
(53, 9, 2, 1, 5, 1),
(54, 9, 2, 6, 9, 1),
(55, 9, 3, 4, 9, 1),
(56, 9, 4, 1, 5, 1),
(57, 9, 4, 6, 9, 1),
(58, 9, 5, 1, 3, 1),
(59, 9, 5, 4, 6, 1),
(60, 9, 5, 7, 9, 1),
(61, 10, 1, 1, 5, 1),
(62, 10, 2, 3, 7, 1),
(63, 10, 3, 1, 4, 1),
(64, 10, 3, 6, 9, 1),
(65, 10, 4, 1, 4, 1),
(66, 10, 4, 7, 9, 1),
(67, 10, 5, 1, 3, 1),
(68, 11, 1, 1, 4, 1),
(69, 11, 2, 3, 7, 1),
(70, 11, 3, 1, 4, 1),
(71, 11, 3, 5, 8, 1),
(72, 11, 4, 3, 6, 1),
(73, 11, 5, 2, 6, 1),
(74, 12, 1, 5, 9, 1),
(75, 12, 2, 1, 4, 1),
(76, 12, 3, 3, 7, 1),
(77, 12, 4, 1, 4, 1),
(78, 12, 5, 2, 4, 1),
(79, 13, 1, 1, 3, 1),
(80, 13, 2, 3, 6, 1),
(81, 13, 3, 4, 8, 1),
(82, 13, 4, 4, 8, 1),
(83, 13, 5, 1, 3, 1),
(84, 14, 1, 1, 5, 1),
(85, 14, 3, 4, 7, 1),
(86, 14, 4, 2, 5, 1),
(87, 14, 4, 6, 9, 1),
(88, 14, 5, 1, 2, 1),
(89, 14, 5, 3, 5, 1),
(90, 14, 5, 8, 9, 1),
(91, 15, 1, 4, 8, 1),
(92, 15, 2, 3, 6, 1),
(93, 15, 3, 2, 5, 1),
(94, 15, 4, 1, 3, 1),
(95, 15, 5, 2, 4, 1),
(96, 17, 1, 1, 4, 1),
(97, 17, 2, 2, 4, 1),
(98, 17, 3, 5, 7, 1),
(99, 17, 5, 2, 4, 1),
(100, 18, 1, 3, 5, 1),
(101, 18, 2, 4, 7, 1),
(102, 18, 3, 1, 3, 1),
(103, 18, 4, 5, 7, 1),
(104, 18, 5, 1, 3, 1),
(105, 19, 1, 4, 6, 1),
(106, 19, 2, 3, 5, 1),
(107, 19, 3, 1, 3, 1),
(108, 19, 3, 6, 8, 1),
(109, 19, 5, 3, 5, 1),
(110, 20, 1, 4, 6, 1),
(111, 20, 2, 1, 3, 1),
(112, 20, 2, 5, 7, 1),
(113, 20, 3, 2, 4, 1),
(114, 20, 4, 3, 5, 1),
(115, 1, 1, 1, 3, 2),
(116, 1, 1, 4, 7, 2),
(117, 1, 2, 4, 7, 2),
(118, 1, 3, 1, 3, 2),
(119, 1, 3, 7, 9, 2),
(120, 1, 4, 2, 5, 2),
(121, 1, 4, 1, 4, 2),
(122, 1, 4, 7, 9, 2),
(123, 1, 5, 1, 4, 2),
(124, 2, 1, 1, 5, 2),
(125, 2, 2, 1, 4, 2),
(126, 2, 2, 5, 8, 2),
(127, 2, 3, 1, 4, 2),
(128, 2, 4, 4, 8, 2),
(129, 2, 5, 1, 3, 2),
(130, 3, 1, 1, 4, 2),
(131, 3, 1, 6, 9, 2),
(132, 3, 2, 5, 9, 2),
(133, 3, 3, 1, 4, 2),
(134, 3, 3, 7, 9, 2),
(135, 3, 4, 4, 7, 2),
(136, 3, 5, 1, 4, 2),
(137, 4, 1, 1, 4, 2),
(138, 4, 2, 5, 7, 2),
(139, 4, 3, 1, 3, 2),
(140, 4, 4, 3, 7, 2),
(141, 4, 5, 7, 9, 2),
(142, 5, 1, 3, 5, 2),
(143, 5, 2, 4, 8, 2),
(144, 5, 3, 1, 3, 2),
(145, 5, 3, 6, 8, 2),
(146, 5, 4, 5, 8, 2),
(147, 5, 5, 1, 4, 2),
(148, 6, 1, 1, 4, 2),
(149, 6, 1, 6, 9, 2),
(150, 6, 2, 2, 6, 2),
(151, 6, 3, 2, 4, 2),
(152, 6, 3, 8, 9, 2),
(153, 6, 4, 2, 5, 2),
(154, 6, 5, 6, 8, 2),
(155, 7, 1, 2, 4, 2),
(156, 7, 2, 3, 7, 2),
(157, 7, 3, 2, 4, 2),
(158, 7, 3, 7, 9, 2),
(159, 7, 4, 3, 7, 2),
(160, 7, 5, 1, 4, 2),
(161, 8, 1, 5, 9, 2),
(162, 8, 2, 3, 7, 2),
(163, 8, 3, 2, 7, 2),
(164, 8, 4, 3, 7, 2),
(165, 8, 5, 6, 9, 2),
(166, 9, 1, 1, 5, 2),
(167, 9, 2, 1, 5, 2),
(168, 9, 2, 6, 9, 2),
(169, 9, 3, 4, 9, 2),
(170, 9, 4, 1, 5, 2),
(171, 9, 4, 6, 9, 2),
(172, 9, 5, 1, 3, 2),
(173, 9, 5, 4, 6, 2),
(174, 9, 5, 7, 9, 2),
(175, 10, 1, 1, 5, 2),
(176, 10, 2, 3, 7, 2),
(177, 10, 3, 1, 4, 2),
(178, 10, 3, 6, 9, 2),
(179, 10, 4, 1, 4, 2),
(180, 10, 4, 7, 9, 2),
(181, 10, 5, 1, 3, 2),
(182, 11, 1, 1, 4, 2),
(183, 11, 2, 3, 7, 2),
(184, 11, 3, 1, 4, 2),
(185, 11, 3, 5, 8, 2),
(186, 11, 4, 3, 6, 2),
(187, 11, 5, 2, 6, 2),
(188, 12, 1, 5, 9, 2),
(189, 12, 2, 1, 4, 2),
(190, 12, 3, 3, 7, 2),
(191, 12, 4, 1, 4, 2),
(192, 12, 5, 2, 4, 2),
(193, 13, 1, 1, 3, 2),
(194, 13, 2, 3, 6, 2),
(195, 13, 3, 4, 8, 2),
(196, 13, 4, 4, 8, 2),
(197, 13, 5, 1, 3, 2),
(198, 14, 1, 1, 5, 2),
(199, 14, 3, 4, 7, 2),
(200, 14, 4, 2, 5, 2),
(201, 14, 4, 6, 9, 2),
(202, 14, 5, 1, 2, 2),
(203, 14, 5, 3, 5, 2),
(204, 14, 5, 8, 9, 2),
(205, 15, 1, 4, 8, 2),
(206, 15, 2, 3, 6, 2),
(207, 15, 3, 2, 5, 2),
(208, 15, 4, 1, 3, 2),
(209, 15, 5, 2, 4, 2),
(210, 17, 1, 1, 4, 2),
(211, 17, 2, 2, 4, 2),
(212, 17, 3, 5, 7, 2),
(213, 17, 5, 2, 4, 2),
(214, 18, 1, 3, 5, 2),
(215, 18, 2, 4, 7, 2),
(216, 18, 3, 1, 3, 2),
(217, 18, 4, 5, 7, 2),
(218, 18, 5, 1, 3, 2),
(219, 19, 1, 4, 6, 2),
(220, 19, 2, 3, 5, 2),
(221, 19, 3, 1, 3, 2),
(222, 19, 3, 6, 8, 2),
(223, 19, 5, 3, 5, 2),
(224, 20, 1, 4, 6, 2),
(225, 20, 2, 1, 3, 2),
(226, 20, 2, 5, 7, 2),
(227, 20, 3, 2, 4, 2),
(228, 20, 4, 3, 5, 2),
(229, 1, 1, 1, 3, 3),
(230, 1, 1, 4, 7, 3),
(231, 1, 2, 4, 7, 3),
(232, 1, 3, 1, 3, 3),
(233, 1, 3, 7, 9, 3),
(234, 1, 4, 2, 5, 3),
(235, 1, 4, 1, 4, 3),
(236, 1, 4, 7, 9, 3),
(237, 1, 5, 1, 4, 3),
(238, 2, 1, 1, 5, 3),
(239, 2, 2, 1, 4, 3),
(240, 2, 2, 5, 8, 3),
(241, 2, 3, 1, 4, 3),
(242, 2, 4, 4, 8, 3),
(243, 2, 5, 1, 3, 3),
(244, 3, 1, 1, 4, 3),
(245, 3, 1, 6, 9, 3),
(246, 3, 2, 5, 9, 3),
(247, 3, 3, 1, 4, 3),
(248, 3, 3, 7, 9, 3),
(249, 3, 4, 4, 7, 3),
(250, 3, 5, 1, 4, 3),
(251, 4, 1, 1, 4, 3),
(252, 4, 2, 5, 7, 3),
(253, 4, 3, 1, 3, 3),
(254, 4, 4, 3, 7, 3),
(255, 4, 5, 7, 9, 3),
(256, 5, 1, 3, 5, 3),
(257, 5, 2, 4, 8, 3),
(258, 5, 3, 1, 3, 3),
(259, 5, 3, 6, 8, 3),
(260, 5, 4, 5, 8, 3),
(261, 5, 5, 1, 4, 3),
(262, 6, 1, 1, 4, 3),
(263, 6, 1, 6, 9, 3),
(264, 6, 2, 2, 6, 3),
(265, 6, 3, 2, 4, 3),
(266, 6, 3, 8, 9, 3),
(267, 6, 4, 2, 5, 3),
(268, 6, 5, 6, 8, 3),
(269, 7, 1, 2, 4, 3),
(270, 7, 2, 3, 7, 3),
(271, 7, 3, 2, 4, 3),
(272, 7, 3, 7, 9, 3),
(273, 7, 4, 3, 7, 3),
(274, 7, 5, 1, 4, 3),
(275, 8, 1, 5, 9, 3),
(276, 8, 2, 3, 7, 3),
(277, 8, 3, 2, 7, 3),
(278, 8, 4, 3, 7, 3),
(279, 8, 5, 6, 9, 3),
(280, 9, 1, 1, 5, 3),
(281, 9, 2, 1, 5, 3),
(282, 9, 2, 6, 9, 3),
(283, 9, 3, 4, 9, 3),
(284, 9, 4, 1, 5, 3),
(285, 9, 4, 6, 9, 3),
(286, 9, 5, 1, 3, 3),
(287, 9, 5, 4, 6, 3),
(288, 9, 5, 7, 9, 3),
(289, 10, 1, 1, 5, 3),
(290, 10, 2, 3, 7, 3),
(291, 10, 3, 1, 4, 3),
(292, 10, 3, 6, 9, 3),
(293, 10, 4, 1, 4, 3),
(294, 10, 4, 7, 9, 3),
(295, 10, 5, 1, 3, 3),
(296, 11, 1, 1, 4, 3),
(297, 11, 2, 3, 7, 3),
(298, 11, 3, 1, 4, 3),
(299, 11, 3, 5, 8, 3),
(300, 11, 4, 3, 6, 3),
(301, 11, 5, 2, 6, 3),
(302, 12, 1, 5, 9, 3),
(303, 12, 2, 1, 4, 3),
(304, 12, 3, 3, 7, 3),
(305, 12, 4, 1, 4, 3),
(306, 12, 5, 2, 4, 3),
(307, 13, 1, 1, 3, 3),
(308, 13, 2, 3, 6, 3),
(309, 13, 3, 4, 8, 3),
(310, 13, 4, 4, 8, 3),
(311, 13, 5, 1, 3, 3),
(312, 14, 1, 1, 5, 3),
(313, 14, 3, 4, 7, 3),
(314, 14, 4, 2, 5, 3),
(315, 14, 4, 6, 9, 3),
(316, 14, 5, 1, 2, 3),
(317, 14, 5, 3, 5, 3),
(318, 14, 5, 8, 9, 3),
(319, 15, 1, 4, 8, 3),
(320, 15, 2, 3, 6, 3),
(321, 15, 3, 2, 5, 3),
(322, 15, 4, 1, 3, 3),
(323, 15, 5, 2, 4, 3),
(324, 17, 1, 1, 4, 3),
(325, 17, 2, 2, 4, 3),
(326, 17, 3, 5, 7, 3),
(327, 17, 5, 2, 4, 3),
(328, 18, 1, 3, 5, 3),
(329, 18, 2, 4, 7, 3),
(330, 18, 3, 1, 3, 3),
(331, 18, 4, 5, 7, 3),
(332, 18, 5, 1, 3, 3),
(333, 19, 1, 4, 6, 3),
(334, 19, 2, 3, 5, 3),
(335, 19, 3, 1, 3, 3),
(336, 19, 3, 6, 8, 3),
(337, 19, 5, 3, 5, 3),
(338, 20, 1, 4, 6, 3),
(339, 20, 2, 1, 3, 3),
(340, 20, 2, 5, 7, 3),
(341, 20, 3, 2, 4, 3),
(342, 20, 4, 3, 5, 3),
(343, 1, 1, 1, 3, 4),
(344, 1, 1, 4, 7, 4),
(345, 1, 2, 4, 7, 4),
(346, 1, 3, 1, 3, 4),
(347, 1, 3, 7, 9, 4),
(348, 1, 4, 2, 5, 4),
(349, 1, 4, 1, 4, 4),
(350, 1, 4, 7, 9, 4),
(351, 1, 5, 1, 4, 4),
(352, 2, 1, 1, 5, 4),
(353, 2, 2, 1, 4, 4),
(354, 2, 2, 5, 8, 4),
(355, 2, 3, 1, 4, 4),
(356, 2, 4, 4, 8, 4),
(357, 2, 5, 1, 3, 4),
(358, 3, 1, 1, 4, 4),
(359, 3, 1, 6, 9, 4),
(360, 3, 2, 5, 9, 4),
(361, 3, 3, 1, 4, 4),
(362, 3, 3, 7, 9, 4),
(363, 3, 4, 4, 7, 4),
(364, 3, 5, 1, 4, 4),
(365, 4, 1, 1, 4, 4),
(366, 4, 2, 5, 7, 4),
(367, 4, 3, 1, 3, 4),
(368, 4, 4, 3, 7, 4),
(369, 4, 5, 7, 9, 4),
(370, 5, 1, 3, 5, 4),
(371, 5, 2, 4, 8, 4),
(372, 5, 3, 1, 3, 4),
(373, 5, 3, 6, 8, 4),
(374, 5, 4, 5, 8, 4),
(375, 5, 5, 1, 4, 4),
(376, 6, 1, 1, 4, 4),
(377, 6, 1, 6, 9, 4),
(378, 6, 2, 2, 6, 4),
(379, 6, 3, 2, 4, 4),
(380, 6, 3, 8, 9, 4),
(381, 6, 4, 2, 5, 4),
(382, 6, 5, 6, 8, 4),
(383, 7, 1, 2, 4, 4),
(384, 7, 2, 3, 7, 4),
(385, 7, 3, 2, 4, 4),
(386, 7, 3, 7, 9, 4),
(387, 7, 4, 3, 7, 4),
(388, 7, 5, 1, 4, 4),
(389, 8, 1, 5, 9, 4),
(390, 8, 2, 3, 7, 4),
(391, 8, 3, 2, 7, 4),
(392, 8, 4, 3, 7, 4),
(393, 8, 5, 6, 9, 4),
(394, 9, 1, 1, 5, 4),
(395, 9, 2, 1, 5, 4),
(396, 9, 2, 6, 9, 4),
(397, 9, 3, 4, 9, 4),
(398, 9, 4, 1, 5, 4),
(399, 9, 4, 6, 9, 4),
(400, 9, 5, 1, 3, 4),
(401, 9, 5, 4, 6, 4),
(402, 9, 5, 7, 9, 4),
(403, 10, 1, 1, 5, 4),
(404, 10, 2, 3, 7, 4),
(405, 10, 3, 1, 4, 4),
(406, 10, 3, 6, 9, 4),
(407, 10, 4, 1, 4, 4),
(408, 10, 4, 7, 9, 4),
(409, 10, 5, 1, 3, 4),
(410, 11, 1, 1, 4, 4),
(411, 11, 2, 3, 7, 4),
(412, 11, 3, 1, 4, 4),
(413, 11, 3, 5, 8, 4),
(414, 11, 4, 3, 6, 4),
(415, 11, 5, 2, 6, 4),
(416, 12, 1, 5, 9, 4),
(417, 12, 2, 1, 4, 4),
(418, 12, 3, 3, 7, 4),
(419, 12, 4, 1, 4, 4),
(420, 12, 5, 2, 4, 4),
(421, 13, 1, 1, 3, 4),
(422, 13, 2, 3, 6, 4),
(423, 13, 3, 4, 8, 4),
(424, 13, 4, 4, 8, 4),
(425, 13, 5, 1, 3, 4),
(426, 14, 1, 1, 5, 4),
(427, 14, 3, 4, 7, 4),
(428, 14, 4, 2, 5, 4),
(429, 14, 4, 6, 9, 4),
(430, 14, 5, 1, 2, 4),
(431, 14, 5, 3, 5, 4),
(432, 14, 5, 8, 9, 4),
(433, 15, 1, 4, 8, 4),
(434, 15, 2, 3, 6, 4),
(435, 15, 3, 2, 5, 4),
(436, 15, 4, 1, 3, 4),
(437, 15, 5, 2, 4, 4),
(438, 17, 1, 1, 4, 4),
(439, 17, 2, 2, 4, 4),
(440, 17, 3, 5, 7, 4),
(441, 17, 5, 2, 4, 4),
(442, 18, 1, 3, 5, 4),
(443, 18, 2, 4, 7, 4),
(444, 18, 3, 1, 3, 4),
(445, 18, 4, 5, 7, 4),
(446, 18, 5, 1, 3, 4),
(447, 19, 1, 4, 6, 4),
(448, 19, 2, 3, 5, 4),
(449, 19, 3, 1, 3, 4),
(450, 19, 3, 6, 8, 4),
(451, 19, 5, 3, 5, 4),
(452, 20, 1, 4, 6, 4),
(453, 20, 2, 1, 3, 4),
(454, 20, 2, 5, 7, 4),
(455, 20, 3, 2, 4, 4),
(456, 20, 4, 3, 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jp`
--

CREATE TABLE `jp` (
  `kode_jp` int(3) NOT NULL,
  `jp_mulai` time NOT NULL,
  `jp_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jp`
--

INSERT INTO `jp` (`kode_jp`, `jp_mulai`, `jp_selesai`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '07:50:00', '08:40:00'),
(3, '08:40:00', '09:30:00'),
(4, '09:40:00', '10:30:00'),
(5, '10:30:00', '11:20:00'),
(6, '11:20:00', '12:10:00'),
(7, '12:50:00', '13:40:00'),
(8, '13:40:00', '14:30:00'),
(9, '14:30:00', '15:20:00'),
(10, '15:30:00', '16:20:00'),
(11, '16:20:00', '17:10:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minggu`
--

CREATE TABLE `minggu` (
  `kode_minggu` int(11) NOT NULL,
  `nama_minggu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `minggu`
--

INSERT INTO `minggu` (`kode_minggu`, `nama_minggu`) VALUES
(1, 'minggu 1'),
(2, 'minggu 2'),
(3, 'minggu 3'),
(4, 'minggu 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kegiatan` varchar(500) NOT NULL DEFAULT 'Tidak ada keterangan',
  `nim` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jp_mulai` int(3) NOT NULL,
  `kode_jp_selesai` int(3) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `status` enum('belum','diterima','ditolak') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kegiatan`, `nim`, `tanggal`, `kode_jp_mulai`, `kode_jp_selesai`, `id_ruang`, `status`) VALUES
(59, 'Wawancara Seminar Proposal', '1001', '2023-12-13', 2, 10, 1, 'diterima'),
(64, 'Menggoreng telur', '1001', '2023-12-21', 6, 3, 2, 'diterima'),
(65, 'Wawancara Seminar Proposal', '1001', '2023-12-21', 2, 2, 2, 'diterima'),
(68, 'Pinjam tok', '2241720159', '2023-12-21', 1, 5, 1, 'diterima'),
(69, 'Pinjam tok2', '2241720159', '2023-12-21', 1, 5, 1, 'diterima'),
(70, 'Pinjam tok3', '2241720159', '2023-12-22', 1, 1, 1, 'belum'),
(71, 'Pinjam tok5', '2241720159', '2023-12-22', 2, 4, 1, 'belum'),
(72, 'sekarep', '2241720159', '2023-12-13', 1, 3, 7, 'belum'),
(73, 'sekarep', '123', '2023-12-25', 1, 6, 1, 'belum'),
(74, 'sekarep', '2241720099', '2023-12-26', 1, 11, 1, 'ditolak'),
(75, 'scs', '2241720099', '2023-12-26', 1, 2, 1, 'diterima'),
(76, 'Pinjam tok5', '2241720099', '2023-12-21', 6, 6, 1, 'belum'),
(77, 'Pinjam tok', '2241720099', '2023-12-20', 4, 6, 1, 'belum'),
(78, 'Pinjam tok3', '2241720099', '2023-12-22', 5, 10, 1, 'belum'),
(79, 'Pinjam tok', '2241720099', '2024-01-05', 5, 7, 1, 'belum'),
(80, 'sekarep', '2241720099', '2023-12-21', 1, 4, 18, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(3) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` enum('available','unavailable','pending','urgent') NOT NULL,
  `lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nim` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nim`, `nama`, `jurusan`, `level`, `no_telp`, `password`) VALUES
('0001', 'admin1', 'Tekhnologi Informasi', 'admin', '123456789', '$2y$10$yNBaBniq75vciqL5K42mKOfmwE0ol//nya1TYg0T5Eh4EQSK5ka4O'),
('0002', 'admin2', 'Tekhnologi Informasi', 'admin', '123456789', '$2y$10$UB8kiTWCrkYNK1jiX1I9BegNkT4KuzPguT9uyzk4lZ6qUxXVTXAnm'),
('0003', 'admin3', 'Tekhnologi Informasi', 'admin', '123456789', '$2y$10$O048FD1/VGbC3CSv1irueOrjO77MhMTJR4OBrYqxCNr3ows./2Pt.'),
('1001', 'Dodit Suprianto SKom. MT.', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$mEcHGF7qNLhq7pSOFI0HcebG5bAXmfNVkC0ReofBYjQC1.NiuOI2K'),
('1002', 'Dika Rizky Yunianto, S.Kom, M.Kom', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$qMAb1NLDZ8SAsfXlfJBr2.NBoRc3ZmFc1CvFUKyGktlANgDjgWYeq'),
('1003', 'Endah Septa Sintiya. SPd., MKom.', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$6/w4W/l4zPsBsEV2gIkeg.Swl9o8y2EpLkXvNpQZdnA/T7cxPk23q'),
('1004', 'Muhammad Unggul Pamenang, S.St., M.T.', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$wpPmREKvTWfb3jFVw/6mieTwN/lFSqhRiTspIe42HrYZxBhFQjWPe'),
('1005', 'Vipkas Al Hadid Firdaus, ST,. MT', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$jkAvW2aKGUWUG8rC/QILHuT1ueyMv1bFt4G9BZ1BIkIS/i7zoLaXO'),
('1006', 'Candra Bella Vista, S.Kom., MT.', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$GPPYj893b2X6Ujh29bwGbuzko8wU094hTXI3imeLbuagtSjLgibLa'),
('1007', 'Ahmadi Yuli Ananta, ST., M.M.\r\n', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$m.snu7GI.QrpNYoAQ77rd.d647zt2AVr8SiR1hXODOPR1RUzPJWkW'),
('123', 'farel', 'Teknik informatika', 'user', '2222222222', '$2y$10$MurUMBIjc/hqc98u9Mw/qOxKqCHBLbrUJEaFLvJePbZ5dDCriacGW'),
('2241720001', 'yoan sari', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$MYivi2MVrSY/QtjJ8KIcEuYAzcqjTRT8s91OH7P1jKol4QtrGa6MO'),
('2241720057', 'Rizqi Reza Danuarta', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$yI4FPsh9LS6XeqgWcXB7JuNGJC3mv59TKwH1lrO3fzvr68lEJZJqa'),
('2241720099', 'Muhammmad Iqbal Makmur Al-Muniri', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$2FPpegFYbIa8T3QFXyGNx.u1ijt9r7Y1.edi1ArzKh6cjztLZfuoS'),
('2241720113', 'Aleron Tsaqif Rakha Rajendra', 'Tekhnologi Informasi', 'user', '23142356478', '$2y$10$tmaMeeP.X9GOtMld2yeJu.FOf3VxHW.SZ8b3SpTetFzRvif5oIe/O'),
('2241720142', 'Ridho Fauzian Pratama', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$QF23PZyfwKfLeOPs2XLTuewuNWbMLonDhEJAxZmitSkUa0mXldSCu'),
('2241720159', 'Achmad Mufid', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$gbyxqd1lYgccLNSX7yuYQ.4gxeyDtHtworWYhVfSG4KYSHHnpho1O'),
('2241720161', 'Rhanilham Fadlillatul Ramadhan', 'Tekhnologi Informasi', 'user', '1234567', '$2y$10$FQf3QTHb/E7YimfHsH1Ocu0mc6H4t2SUBJHhUzdcJD9ggc2LMia1G'),
('2241720188', 'Bimantara Dwi Cahyo', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$Oe8VlYAkrTcWviqx1JBkQ.GY3uED6bzwF3r95lHJIjTwZboW2mamq'),
('2241720227', 'Muhammad Irsyad Dany', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$NxRQ369dS4O./5cop3GAleFtn4aYwREmGZtyJh6/2Rs.mkTH4Szqe'),
('2241720233', 'Irsyad Danisaputra', 'Tekhnologi Informasi', 'user', '123456789', '$2y$10$7GIlFF46WWsEboQFOs4ShuG78OnIwQHHkCC3z5fmLpOBNErIrQHom');

-- --------------------------------------------------------

--
-- Struktur untuk view `cekstatusruang`
--
DROP TABLE IF EXISTS `cekstatusruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cekstatusruang`  AS SELECT DISTINCT `j`.`kode_jadwal` AS `kode_jadwal`, `r`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `r`.`keterangan` AS `ruang_keterangan`, `r`.`lantai` AS `ruang_lantai`, `jp`.`jp_mulai` AS `jp_mulai`, `jp`.`jp_selesai` AS `jp_selesai`, `h`.`kode_hari` AS `kode_hari`, `h`.`nama_hari` AS `nama_hari`, CASE WHEN `j`.`jp_mulai` <= `jp`.`kode_jp` AND `j`.`jp_selesai` >= `jp`.`kode_jp` THEN 'Terpakai' ELSE 'Tidak Terpakai' END AS `status_ruang` FROM (((`ruang` `r` join `jp`) join `hari` `h`) join `jadwal` `j` on(`r`.`id_ruang` = `j`.`id_ruang` and `h`.`kode_hari` = `j`.`kode_hari`)) ORDER BY `h`.`kode_hari` ASC, `r`.`id_ruang` ASC, `j`.`kode_jadwal` ASC, `jp`.`jp_mulai` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `FK_idRuang` (`id_ruang`),
  ADD KEY `FK_idHari` (`kode_hari`),
  ADD KEY `FK_JpMulai` (`jp_mulai`),
  ADD KEY `FK_JpSelesai` (`jp_selesai`),
  ADD KEY `Fk_Minggu` (`kode_minggu`);

--
-- Indeks untuk tabel `jp`
--
ALTER TABLE `jp`
  ADD PRIMARY KEY (`kode_jp`);

--
-- Indeks untuk tabel `minggu`
--
ALTER TABLE `minggu`
  ADD PRIMARY KEY (`kode_minggu`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim/nip` (`nim`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `jam_mulai` (`kode_jp_mulai`),
  ADD KEY `jam_selesai` (`kode_jp_selesai`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `kode_hari` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT untuk tabel `jp`
--
ALTER TABLE `jp`
  MODIFY `kode_jp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `minggu`
--
ALTER TABLE `minggu`
  MODIFY `kode_minggu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_JpMulai` FOREIGN KEY (`jp_mulai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `FK_JpSelesai` FOREIGN KEY (`jp_selesai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `FK_idHari` FOREIGN KEY (`kode_hari`) REFERENCES `hari` (`kode_hari`),
  ADD CONSTRAINT `FK_idRuang` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `Fk_Minggu` FOREIGN KEY (`kode_minggu`) REFERENCES `minggu` (`kode_minggu`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `jam_mulai` FOREIGN KEY (`kode_jp_mulai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `jam_selesai` FOREIGN KEY (`kode_jp_selesai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
