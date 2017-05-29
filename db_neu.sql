-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 12:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_neu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `tendangnhap`, `matkhau`, `ten`) VALUES
(1, 'admin', 'admin', 'Admin HUMG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bomon`
--

CREATE TABLE `tb_bomon` (
  `mabomon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `makhoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kihieu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenbomon` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhsachsinhvien`
--

CREATE TABLE `tb_danhsachsinhvien` (
  `id` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `nhommonhoc` int(11) NOT NULL,
  `masinhvien` int(11) NOT NULL,
  `diemA` int(11) NOT NULL,
  `diemA_2` int(11) NOT NULL,
  `diemB` int(11) NOT NULL,
  `diemC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_danhsachsinhvien`
--

INSERT INTO `tb_danhsachsinhvien` (`id`, `mamh`, `nhommonhoc`, `masinhvien`, `diemA`, `diemA_2`, `diemB`, `diemC`) VALUES
(1, 4020101, 1, 1221050139, 0, 0, 0, 0),
(2, 4020101, 1, 1221050220, 0, 0, 0, 0),
(10, 4020101, 1, 1221050140, 0, 0, 0, 0),
(12, 4010501, 1, 1221050420, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_giaovien`
--

CREATE TABLE `tb_giaovien` (
  `magiaovien` int(11) NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tengiaovien` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_giaovien`
--

INSERT INTO `tb_giaovien` (`magiaovien`, `matkhau`, `tengiaovien`) VALUES
(1221050000, '0000', 'Trần Ngọc A'),
(1221050001, '0001', 'Nguyễn Thị Huyền C'),
(1221050002, '0002', 'Nguyễn Đắc D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khoa`
--

CREATE TABLE `tb_khoa` (
  `makhoa` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `kihieu` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_khoa`
--

INSERT INTO `tb_khoa` (`makhoa`, `kihieu`, `tenkhoa`) VALUES
('CD', '01', 'Cơ điện'),
('CT', '08 ', 'Công nghệ thông tin'),
('d', '9', 'b'),
('DD', '01', 'Đại học đại cương'),
('KT', '07', 'Kinh tế và QTKD'),
('LL', '02', 'Khoa Lí luận chính trị'),
('MT', '01', 'Môi trường');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monhoc`
--

CREATE TABLE `tb_monhoc` (
  `mamh` int(10) NOT NULL,
  `tenmonhoc` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `maloai` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `manganh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_monhoc`
--

INSERT INTO `tb_monhoc` (`mamh`, `tenmonhoc`, `sotinchi`, `maloai`, `manganh`) VALUES
(4010101, 'Dai so ', 3, '1', 1),
(4010501, 'Vat li dai cuong', 3, 'BB', 1),
(4010601, 'Tieng Anh 1\r\n', 3, '0', 0),
(4020101, 'nguyen li co ban chu nghia mac le nin', 2, 'BB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhommonhoc`
--

CREATE TABLE `tb_nhommonhoc` (
  `id` int(11) NOT NULL,
  `nhommonhoc` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  `siso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_nhommonhoc`
--

INSERT INTO `tb_nhommonhoc` (`id`, `nhommonhoc`, `mamh`, `magiaovien`, `siso`) VALUES
(1, 1, 4020101, 1221050000, 4),
(2, 2, 4020101, 1221050001, 90),
(3, 3, 4020101, 1221050002, 150),
(4, 1, 4010501, 1221050000, 30),
(5, 2, 4010501, 1221050001, 60),
(6, 1, 4010601, 1221050002, 50),
(7, 2, 4010601, 1221050002, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sinhvien`
--

CREATE TABLE `tb_sinhvien` (
  `masinhvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tensinhvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `malop` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_sinhvien`
--

INSERT INTO `tb_sinhvien` (`masinhvien`, `matkhau`, `tensinhvien`, `malop`, `tinhtrang`) VALUES
('1221050139', 'huy', 'Nguyễn Đắc Huy', 'DCCTKT57', 0),
('1221050140', 'ngocduc', 'Ngocduc', 'DCCTKT57', 0),
('1221050220', 'hien', 'Vũ Đức Hiển', 'DCCTKT57', 0),
('1221050420', 'trang', 'Huyền Trang', 'DCCTKT57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_danhsachsinhvien`
--
ALTER TABLE `tb_danhsachsinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_giaovien`
--
ALTER TABLE `tb_giaovien`
  ADD PRIMARY KEY (`magiaovien`);

--
-- Indexes for table `tb_khoa`
--
ALTER TABLE `tb_khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `tb_monhoc`
--
ALTER TABLE `tb_monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- Indexes for table `tb_nhommonhoc`
--
ALTER TABLE `tb_nhommonhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sinhvien`
--
ALTER TABLE `tb_sinhvien`
  ADD PRIMARY KEY (`masinhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_danhsachsinhvien`
--
ALTER TABLE `tb_danhsachsinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_nhommonhoc`
--
ALTER TABLE `tb_nhommonhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
