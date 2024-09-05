-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 05, 2024 lúc 05:13 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thfashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` varchar(255) NOT NULL,
  `tenSP` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `loai` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hover_image` varchar(255) NOT NULL,
  `price` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `size`, `loai`, `image`, `hover_image`, `price`) VALUES
('N1', 'BACKPACK LEATHER 24', '', 'nón mũ', 'i4.png', 'i4-4.png', 795000),
('N2', 'CAP 5', '', 'nón mũ', 'i19.png', 'i19-19.png', 490000),
('N3', 'SNAPBACK CAP', '', 'nón mũ', 'i26.png', 'i26-26.png', 332000),
('N4', 'CLASSIC CAP', '', 'nón mũ', 'i27.png', 'i27-27.png', 275000),
('N5', 'HUG CAP', '', 'nón mũ', 'i32.png', 'i32-32.png', 275000),
('QJ1', 'SYMMETRY PANTS', '', 'quần dài jean', 'i3.png', 'i3-3.png', 690000),
('QJ2', 'ABYSS SS24 ECHINIDERM PANTS', '', 'quần dài jean', 'i17.png', 'i17-17.png', 690000),
('QJ3', 'SPLINTERED PANTS', '', 'quần dài jean', 'i9.png', 'i9-9.png', 690000),
('QJ4', 'TORNADO ROUTE PANTS', '', 'quần dài jean', 'i15.png', 'i15-15.png', 690000),
('QJ5', 'PLAID CASUAL PANTS', '', 'quần dài jean', 'i20.png', 'i20-20.png', 690000),
('QS1', 'WASH JEANS SHORT', '', 'quần đùi short', 'i14.png', 'i14-14.png', 690000),
('QS2', 'STRIPED BOXERS', '', 'quần đùi short', 'i22.png', 'i22-22.png', 280000),
('QS3', 'STRIPED BOXERS 2', '', 'quần đùi short ', 'i23.png', 'i23-23.png', 280000),
('QS4', 'REFLECTED PARACHUTE SHORTS', '', 'quần đùi short', 'i28.png', 'i28-28.png', 450000),
('QS5', 'LORRYLOAD CARGO SHORT', '', 'quần đùi short', 'i33.png', 'i33-33.png', 270000),
('QS6', 'SHEENYBEL SHORT', '', 'quần đùi short', 'i25.png', 'i25-25.png', 680000),
('SM1', 'OBSTREPEROUS VARSITY JACKET', '', 'áo sơ mi khoác', 'i2.png', 'i2-2.png', 1900000),
('SM2', 'MASCOT HOCKEY JERSEY', '', 'áo sơ mi', 'i5.png', 'i5-5.png', 590000),
('SM3', 'WHITE ASTRAL SHIRT', '', 'áo sơ mi', 'i6.png', 'i6-6.png', 560000),
('SM4', 'STRIPED SHIRT 24', '', 'áo sơ mi', 'i10.png', 'i10-10.png', 495000),
('SM5', 'CERISE CRAVAT TEE', '', 'áo sơ mi', 'i13.png', 'i13-13.png', 450000),
('SM6', 'SCUFFERS LOVE POLO', '', 'áo sơ mi', 'i16.png', 'i16-16.png', 450000),
('SM7', 'TRACER SLEEVES BOXY SHIRT', '', 'áo sơ mi', 'i24.png', 'i24-24.png', 495000),
('T1', 'STUFFED WOLF TEE', '', 'áo thun', '2.png', 'i1-1.png', 470000),
('T2', 'ABYSS SS24 INSECT AFFECTION TEE', '', 'áo thun', 'i8.png', 'i8-8.png', 200000),
('T3', 'BROKEN HEART TEE', '', 'áo thun', 'i11.png', 'i11-11.png', 450000),
('T4', 'ESSENCE TEE', '', 'áo thun', 'i12.png', 'i12-12.png', 450000),
('T5', 'GUARDIAN BASIC TEE', '', 'áo thun', 'i29.png', 'i29-29.png', 460000),
('T6', 'GUARDIAN ANGLE TEE', '', 'áo thun', 'i21.png', 'i21-21.png', 460000),
('T7', 'LODESTAR BLUR TEE', '', 'áo thun', 'i30.png', 'i30-30.png', 450000),
('T8', 'LAMP LEGEND TEE', '', 'áo thun', 'i31.png', 'i31-31.png', 420000),
('T9', 'ABYSS SS24 MYSTIC WING WAX TEE', '', 'áo thun', 'i18.png', 'i18-18.png', 490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idTK` int(11) NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `TenTK` varchar(100) NOT NULL,
  `MK` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(100) NOT NULL,
  `quyen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idTK`, `hoTen`, `TenTK`, `MK`, `email`, `sdt`, `quyen`) VALUES
(1, 'Ad văn Min', 'Admin1', '123', 'admin1@gmail.com', 123456789, 'admin'),
(3, 'Võ Quang Thành', 'thanhvo2505', '123456', '2251150079@ut.edu.vn', 976925204, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
