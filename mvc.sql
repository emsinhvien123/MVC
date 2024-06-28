-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2024 lúc 01:38 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldiem`
--

CREATE TABLE `tbldiem` (
  `MaSV` varchar(10) NOT NULL,
  `MaMon` varchar(10) NOT NULL,
  `Diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbldiem`
--

INSERT INTO `tbldiem` (`MaSV`, `MaMon`, `Diem`) VALUES
('SV01', 'M01', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbllop`
--

CREATE TABLE `tbllop` (
  `MaLop` varchar(10) NOT NULL,
  `TenLop` varchar(30) NOT NULL,
  `TenNganh` varchar(30) NOT NULL,
  `HeDaoTao` varchar(30) NOT NULL,
  `NamNhapHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbllop`
--

INSERT INTO `tbllop` (`MaLop`, `TenLop`, `TenNganh`, `HeDaoTao`, `NamNhapHoc`) VALUES
('L01', '72DCTT23', 'Ke Toan', 'Cao Dang', 2025),
('L03', '72DCTT25', 'Cong Nghe Thong Tin', 'Cao Dang', 2024),
('L04', '72DCTD12', 'Cong Nghe Thong Tin', 'Cao Dang', 2023);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblmon`
--

CREATE TABLE `tblmon` (
  `MaMon` varchar(10) NOT NULL,
  `TenMon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmon`
--

INSERT INTO `tblmon` (`MaMon`, `TenMon`) VALUES
('M01', 'Toan Cao Cap');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsinhvien`
--

CREATE TABLE `tblsinhvien` (
  `MaSV` varchar(10) NOT NULL,
  `HoTen` varchar(30) NOT NULL,
  `NgaySinh` varchar(30) NOT NULL,
  `QueQuan` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsinhvien`
--

INSERT INTO `tblsinhvien` (`MaSV`, `HoTen`, `NgaySinh`, `QueQuan`, `Email`) VALUES
('SV01', 'Nguyen Van Teo', '01-09-2003', 'Ha Noi', 'emsinhvien@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `MaTK` varchar(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  ADD KEY `tbldiem_ibfk_1` (`MaSV`),
  ADD KEY `MaMon` (`MaMon`);

--
-- Chỉ mục cho bảng `tbllop`
--
ALTER TABLE `tbllop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  ADD PRIMARY KEY (`MaMon`);

--
-- Chỉ mục cho bảng `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Chỉ mục cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  ADD CONSTRAINT `tbldiem_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `tblsinhvien` (`MaSV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldiem_ibfk_2` FOREIGN KEY (`MaMon`) REFERENCES `tblmon` (`MaMon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
