-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2024 at 07:07 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `MaHD` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TenHD` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `MaKH` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TongTien` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`MaHD`),
  KEY `fk_MaKH` (`MaKH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `TenHD`, `MaKH`, `TongTien`) VALUES
('12', 'hóa đơn 1', '1', 1872172.00),
('2a', 'hóa đơn 2', '1', 2828233.00),
('3s', 'hóa đơn 3s', '2', 2182732.00),
('5', '132FD F', '1', 91337743.00),
('7', '13asda', '1', 423565.00),
('HD1', 'Hóa đơn', 'KH1', 25.00),
('HD123', 'a', '1', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKH` varchar(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `CCCN` varchar(12) NOT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `SDT`, `CCCN`) VALUES
('', '', '', ''),
('1', 'Hoàng Minh Hưng', '0012327837', '132712612111'),
('2', 'Nguyễn Văn A', '9129231121', '923473294823'),
('6', 'Hoàng ML', '829727327', '929837833'),
('KH1', 'Phúc', '0888135231', '230103'),
('KH12', 'Vui', '0888135231', '230103'),
('e', 'e', 'e', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

DROP TABLE IF EXISTS `phong`;
CREATE TABLE IF NOT EXISTS `phong` (
  `MaPhong` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TenPhong` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TinhTrang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `LoaiPhong` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`MaPhong`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `TinhTrang`, `LoaiPhong`) VALUES
('P1_01', 'Phong don', 'trong', 'don'),
('P1_02', 'Phong don', 'trong', 'don');
('P1_03', 'Phong don', 'full', 'don');

-- --------------------------------------------------------

--
-- Table structure for table `thue`
--

DROP TABLE IF EXISTS `thue`;
CREATE TABLE IF NOT EXISTS `thue` (
  `MaHD` varchar(50) NOT NULL,
  `MaPhong` varchar(50) NOT NULL,
  `NgayThue` date DEFAULT NULL,
  `NgayTra` date DEFAULT NULL,
  `GiaThue` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`MaHD`,`MaPhong`),
  KEY `MaPhong` (`MaPhong`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thue`
--

INSERT INTO `thue` (`MaHD`, `MaPhong`, `NgayThue`, `NgayTra`, `GiaThue`) VALUES
('HD123', 'P1_01', '2024-01-04', '2024-01-06', 20000.00),
('HD1', 'P1_01', '2024-01-04', '2024-01-06', 25.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
