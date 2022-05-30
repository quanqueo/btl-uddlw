-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2022 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `uddlwg5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` bit(1) NOT NULL,
  `state` bit(1) NOT NULL,
  `madoanhnghiep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `admin`, `state`, `madoanhnghiep`) VALUES
('account1', 'asd123456', b'0', b'1', '0100726275'),
('account2', '111111', b'0', b'1', '0311062866'),
('account3', 'asd123456', b'0', b'1', '0400258282'),
('account4', 'asd123456', b'0', b'1', '0700556547'),
('account5', 'asd123456', b'0', b'0', '4000463735');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `madoanhnghiep` varchar(10) NOT NULL,
  `tendoanhnghiep` text CHARACTER SET utf8 NOT NULL,
  `diachi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `doanhnghiep`
--

INSERT INTO `doanhnghiep` (`madoanhnghiep`, `tendoanhnghiep`, `diachi`, `email`, `sdt`) VALUES
('0100726275', 'Công ty Tư vấn thiết kế và Đầu tư xây dựng - Bộ Quốc phòng', '\r\nSố 21 Lê Văn Lương, P. Nhân Chính, Q. Thanh Xuân, Tp Hà Nội', 'dccd@dccd.vn', '0462514111'),
('0311062866', 'CÔNG TY CỔ PHẦN TƯ VẤN ĐẦU TƯ XÂY DỰNG CHIÊU DƯƠNG', '17 Đường số 1 Cư Xá Chu Văn An, P26, Q.Bình Thạnh', 'info@thauxaydung.vn', '0977805536'),
('0400258282', 'Trung tâm kỹ thuật đường bộ 3', '\r\n59B Lê Lợi, phường Thạch Thang, quận Hải Châu, TP Đà Nẵng', 'rtc3.vn@gmail.com', '05113886491'),
('0700556547', 'Công ty TNHH tư vấn xây dựng Kiều Anh', '\r\nTổ 5 - phường Lê Hồng Phong - TP. Phủ Lý - tỉnh Hà Nam', 'tnhhtvxdka@gmail.com', '0916260693'),
('1231231231', 'ABCC', 'VIETNAM', 'abc@gmail.com', '0999488323'),
('4000463735', 'Công ty cổ phần than điện Nông Sơn Vinacomin', '\r\nxã Quế Trung, huyện Nông Sơn, tỉnh Quảng Nam', 'nsontkv@gmail.com', '05103656900');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goithau`
--

CREATE TABLE `goithau` (
  `magoithau` varchar(10) NOT NULL,
  `tengoithau` text NOT NULL,
  `madoanhnghiep` varchar(10) NOT NULL,
  `ngaycongbo` date NOT NULL,
  `ngaydongthau` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `goithau`
--

INSERT INTO `goithau` (`magoithau`, `tengoithau`, `madoanhnghiep`, `ngaycongbo`, `ngaydongthau`) VALUES
('2022050199', 'Thi công sửa chữa công trình', '0400258282', '2022-05-28', '2022-06-10'),
('2022056164', 'Thi công sửa chữa Tuabin NMNĐ Nông SơN', '4000463735', '2022-09-13', '2022-06-16'),
('2022056834', 'Gói thầu số 03: Thi công xây dựng', '0700556547', '2022-05-28', '2022-06-17'),
('2022057875', 'Mua sắm thiết bị, phụ tùng, dụng cụ, vật tư, hóa chất tiêu hao định kỳ cho hệ thống quan trắc tự động chất lượng nước thải sau xử lý tại các Khu chế xuất, Khu công nghiệp và Khu Công nghệ cao\r\n', '0311062866', '2022-05-28', '2022-06-09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `acc_comp` (`madoanhnghiep`);

--
-- Chỉ mục cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD PRIMARY KEY (`madoanhnghiep`);

--
-- Chỉ mục cho bảng `goithau`
--
ALTER TABLE `goithau`
  ADD PRIMARY KEY (`magoithau`),
  ADD KEY `biddingpack_comp` (`madoanhnghiep`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `acc_comp` FOREIGN KEY (`madoanhnghiep`) REFERENCES `doanhnghiep` (`madoanhnghiep`);

--
-- Các ràng buộc cho bảng `goithau`
--
ALTER TABLE `goithau`
  ADD CONSTRAINT `biddingpack_comp` FOREIGN KEY (`madoanhnghiep`) REFERENCES `doanhnghiep` (`madoanhnghiep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
