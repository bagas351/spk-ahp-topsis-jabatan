-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 09:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `koin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nama_alternatif` varchar(256) NOT NULL DEFAULT '',
  `Jabatan` varchar(256) NOT NULL DEFAULT '',
  `total` double NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `tahun`, `nama_alternatif`, `Jabatan`, `total`, `rank`) VALUES
('A4', 2024, 'Pigus Haryanto', '', 0.44498241554123, 6),
('A5', 2024, 'Mubasyir Mustafa', '', 0.55562479920148, 3),
('K1', 2024, 'Gunawan', '', 0.43636841215278, 7),
('A2', 2024, 'Apriyanto Pamungkas', '', 0.50399837453274, 4),
('A3', 2024, 'Nopi Pratomo', '', 0.45788663123249, 5),
('A1', 2024, 'Asep Kurnia', '', 0.87814961732074, 2),
('K2', 2024, 'Gunawansyah', '', 0.39301552100718, 8),
('K3', 2024, 'Teguh', '', 0.89217894354515, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `atribut` varchar(256) NOT NULL DEFAULT 'benefit'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `tahun`, `nama_kriteria`, `atribut`) VALUES
('C2', 2024, 'Skill', 'benefit'),
('C3', 2024, 'Komunikasi', 'benefit'),
('C4', 2024, 'Masa Kerja', 'cost'),
('C5', 2024, 'pengalaman', 'benefit'),
('C1', 2024, 'Pendidikan', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `tahun` year(4) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`tahun`, `nama`, `keterangan`) VALUES
(2024, '2024 - 2025', ''),
(2025, '2025 - 2026', '124d');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `tahun`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(457, 2024, 'K3', 'C5', 6),
(426, 2024, 'A5', 'C5', 8),
(421, 2024, 'A4', 'C5', 9),
(416, 2024, 'A3', 'C5', 8),
(402, 2024, 'A#', 'C1', -1),
(456, 2024, 'K3', 'C4', 8),
(453, 2024, 'K3', 'C1', 8),
(447, 2024, 'K1', 'C5', 9),
(425, 2024, 'A5', 'C4', 9),
(406, 2024, 'A#', 'C5', -1),
(415, 2024, 'A3', 'C4', 7),
(413, 2024, 'A3', 'C2', 8),
(414, 2024, 'A3', 'C3', 5),
(420, 2024, 'A4', 'C4', 9),
(446, 2024, 'K1', 'C4', 8),
(424, 2024, 'A5', 'C3', 7),
(452, 2024, 'K2', 'C5', 9),
(445, 2024, 'K1', 'C3', 9),
(396, 2024, 'A1', 'C5', 5),
(455, 2024, 'K3', 'C3', 9),
(451, 2024, 'K2', 'C4', 8),
(411, 2024, 'A2', 'C5', 7),
(412, 2024, 'A3', 'C1', 7),
(454, 2024, 'K3', 'C2', 9),
(405, 2024, 'A#', 'C4', -1),
(419, 2024, 'A4', 'C3', 7),
(395, 2024, 'A1', 'C4', 7),
(423, 2024, 'A5', 'C2', 8),
(409, 2024, 'A2', 'C3', 9),
(410, 2024, 'A2', 'C4', 7),
(444, 2024, 'K1', 'C2', 6),
(404, 2024, 'A#', 'C3', -1),
(450, 2024, 'K2', 'C3', 6),
(418, 2024, 'A4', 'C2', 7),
(394, 2024, 'A1', 'C3', 9),
(449, 2024, 'K2', 'C2', 7),
(422, 2024, 'A5', 'C1', 7),
(407, 2024, 'A2', 'C1', 7),
(408, 2024, 'A2', 'C2', 7),
(443, 2024, 'K1', 'C1', 8),
(403, 2024, 'A#', 'C2', -1),
(448, 2024, 'K2', 'C1', 8),
(417, 2024, 'A4', 'C1', 8),
(392, 2024, 'A1', 'C1', 8),
(393, 2024, 'A1', 'C2', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_kriteria`
--

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID`, `tahun`, `ID1`, `ID2`, `nilai`) VALUES
(548, 2024, 'C5', 'C3', 0.166666666),
(549, 2024, 'C5', 'C4', 0.333333333),
(550, 2024, 'C5', 'C5', 1),
(551, 2024, 'C1', 'C5', 6),
(552, 2024, 'C2', 'C5', 5),
(553, 2024, 'C3', 'C5', 6),
(554, 2024, 'C4', 'C5', 3),
(533, 2024, 'C1', 'C2', 1),
(534, 2024, 'C3', 'C1', 0.333333333),
(535, 2024, 'C3', 'C2', 0.333333333),
(536, 2024, 'C3', 'C3', 1),
(537, 2024, 'C1', 'C3', 3),
(538, 2024, 'C2', 'C3', 3),
(539, 2024, 'C4', 'C1', 0.2),
(540, 2024, 'C4', 'C2', 0.2),
(541, 2024, 'C4', 'C3', 0.333333333),
(542, 2024, 'C4', 'C4', 1),
(543, 2024, 'C1', 'C4', 5),
(544, 2024, 'C2', 'C4', 5),
(545, 2024, 'C3', 'C4', 3),
(546, 2024, 'C5', 'C1', 0.166666666),
(532, 2024, 'C2', 'C2', 1),
(530, 2024, 'C1', 'C1', 1),
(547, 2024, 'C5', 'C2', 0.2),
(531, 2024, 'C2', 'C1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user`, `pass`) VALUES
('admin', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`tahun`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;
COMMIT;
