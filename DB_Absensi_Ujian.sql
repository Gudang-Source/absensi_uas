-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2020 at 07:53 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `IDAbsensi` int(5) NOT NULL,
  `KodeSoal` int(5) NOT NULL,
  `IDSiswa` char(5) NOT NULL,
  `TanggalMengerjakan` date DEFAULT NULL,
  `Jam` time NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`IDAbsensi`, `KodeSoal`, `IDSiswa`, `TanggalMengerjakan`, `Jam`, `jurusan`, `kelas`) VALUES
(3, 1, '2134', '2020-05-28', '16:13:56', 'TBSM', 'X TBSM'),
(4, 1, '2610', '2020-05-29', '13:43:50', 'TBSM', 'X TBSM 1'),
(5, 2, '2601', '2020-05-29', '13:44:51', 'BDP', 'XI BDP 2'),
(6, 2, '2602', '2020-05-28', '13:44:51', 'BDP', 'XI BDP 2');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(1) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `NamaSekolah` varchar(128) NOT NULL,
  `AlamatSekolah` varchar(255) NOT NULL,
  `LogoSekolah` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `Judul`, `NamaSekolah`, `AlamatSekolah`, `LogoSekolah`) VALUES
(1, 'DAFTAR HADIR PENILAIAN AKHIR SEMESTER', 'SMK JAYA GEMILANG', 'Jalan Raya Jepara Bangsri KM. 07 Telp (0291) 787878 email : username@mail.com', 'atas.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `IDSiswa` int(5) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `no_peserta` varchar(22) NOT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `tingkatan` varchar(2) NOT NULL,
  `jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `KodeSoal` int(5) NOT NULL,
  `NamaSoal` varchar(128) NOT NULL,
  `link_soal` varchar(254) NOT NULL,
  `waktu_awal` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `tanggal_uji` date NOT NULL,
  `tingkatan` varchar(2) NOT NULL,
  `jurusan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akses` enum('P','O') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'P',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_user`, `akses`, `created`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Administrator', 'O', '2020-03-19 20:15:47'),
(3, 'user', '25d55ad283aa400af464c76d713c07ad', 'Panitia UAS', 'P', '2020-05-30 13:55:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`IDAbsensi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`IDSiswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`KodeSoal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `IDAbsensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `KodeSoal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
