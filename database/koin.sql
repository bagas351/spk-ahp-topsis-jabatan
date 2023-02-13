-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 07:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `koin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(256) NOT NULL DEFAULT '',
  `Jabatan` varchar(256) NOT NULL DEFAULT '',
  `total` double NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `Jabatan`, `total`, `rank`) VALUES
('A4', 'Pigus Haryanto', '', 0.48666471492073, 7),
('A5', 'Mubasyir Mustafa', '', 0.50591990440409, 5),
('K1', 'Gunawan', '', 0.50046774990459, 6),
('A2', 'Apriyanto Pamungkas', '', 0.51863299894942, 4),
('A3', 'Nopi Pratomo', '', 0.40143572969428, 9),
('A1', 'Asep Kurnia', '', 0.93032170706763, 1),
('K6', 'x', '', 0, 0),
('K5', 'Riffa', '', 0.88382144832281, 2),
('K4', 'Rini', '', 0.32655689280044, 10),
('K2', 'Gunawansyah', '', 0.42584594739275, 8),
('K3', 'Teguh', '', 0.88382144832281, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `atribut` varchar(256) NOT NULL DEFAULT 'benefit'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `atribut`) VALUES
('C2', 'Skill', 'benefit'),
('C3', 'Komunikasi', 'benefit'),
('C4', 'Masa Kerja', 'cost'),
('C5', 'pengalaman', 'benefit'),
('C1', 'Pendidikan', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_rel_alternatif` (
`ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=473 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(469, 'K6', 'C2', -1),
(457, 'K3', 'C5', 6),
(426, 'A5', 'C5', 8),
(421, 'A4', 'C5', 9),
(416, 'A3', 'C5', 8),
(402, 'A#', 'C1', -1),
(468, 'K6', 'C1', -1),
(465, 'K5', 'C3', 9),
(460, 'K4', 'C3', 6),
(456, 'K3', 'C4', 8),
(453, 'K3', 'C1', 8),
(447, 'K1', 'C5', 9),
(425, 'A5', 'C4', 9),
(406, 'A#', 'C5', -1),
(415, 'A3', 'C4', 7),
(413, 'A3', 'C2', 8),
(414, 'A3', 'C3', 5),
(420, 'A4', 'C4', 9),
(471, 'K6', 'C4', -1),
(459, 'K4', 'C2', 6),
(446, 'K1', 'C4', 8),
(424, 'A5', 'C3', 7),
(464, 'K5', 'C2', 9),
(452, 'K2', 'C5', 9),
(445, 'K1', 'C3', 9),
(396, 'A1', 'C5', 7),
(467, 'K5', 'C5', 6),
(455, 'K3', 'C3', 9),
(451, 'K2', 'C4', 8),
(411, 'A2', 'C5', 7),
(412, 'A3', 'C1', 7),
(454, 'K3', 'C2', 9),
(405, 'A#', 'C4', -1),
(463, 'K5', 'C1', 8),
(458, 'K4', 'C1', 8),
(419, 'A4', 'C3', 7),
(395, 'A1', 'C4', 7),
(466, 'K5', 'C4', 8),
(462, 'K4', 'C5', 7),
(423, 'A5', 'C2', 8),
(409, 'A2', 'C3', 9),
(410, 'A2', 'C4', 7),
(444, 'K1', 'C2', 6),
(404, 'A#', 'C3', -1),
(470, 'K6', 'C3', -1),
(450, 'K2', 'C3', 6),
(418, 'A4', 'C2', 7),
(394, 'A1', 'C3', 9),
(472, 'K6', 'C5', -1),
(449, 'K2', 'C2', 7),
(422, 'A5', 'C1', 7),
(407, 'A2', 'C1', 7),
(408, 'A2', 'C2', 7),
(443, 'K1', 'C1', 8),
(403, 'A#', 'C2', -1),
(461, 'K4', 'C4', 8),
(448, 'K2', 'C1', 8),
(417, 'A4', 'C1', 8),
(392, 'A1', 'C1', 8),
(393, 'A1', 'C2', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_rel_kriteria` (
`ID` int(11) NOT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=577 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID`, `ID1`, `ID2`, `nilai`) VALUES
(548, 'C5', 'C3', 0.166666666),
(549, 'C5', 'C4', 0.333333333),
(550, 'C5', 'C5', 1),
(551, 'C1', 'C5', 6),
(552, 'C2', 'C5', 5),
(553, 'C3', 'C5', 6),
(554, 'C4', 'C5', 3),
(533, 'C1', 'C2', 3),
(534, 'C3', 'C1', 0.333333333),
(535, 'C3', 'C2', 0.333333333),
(536, 'C3', 'C3', 1),
(537, 'C1', 'C3', 3),
(538, 'C2', 'C3', 3),
(539, 'C4', 'C1', 0.2),
(540, 'C4', 'C2', 0.2),
(541, 'C4', 'C3', 0.333333333),
(542, 'C4', 'C4', 1),
(543, 'C1', 'C4', 5),
(544, 'C2', 'C4', 5),
(545, 'C3', 'C4', 3),
(546, 'C5', 'C1', 0.166666666),
(532, 'C2', 'C2', 1),
(530, 'C1', 'C1', 1),
(547, 'C5', 'C2', 0.2),
(531, 'C2', 'C1', 0.333333333);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=473;
--
-- AUTO_INCREMENT for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=577;