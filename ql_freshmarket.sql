-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2024 lúc 04:46 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_freshmarket`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán trực tiếp 2.Chuyển khoản 3. Thanh toán online',
  `ngaydathang` datetime NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0. Đơn hàng mới 1. Đang xác nhận đơn hàng 2.Chờ giao hàng 3. Đã giao hàng',
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_bill`
--

INSERT INTO `tbl_bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(113, 1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', '855328545', 'truongtoan012002@gmail.com', 2, '2024-02-26 08:38:40', 518, 0, NULL, NULL, NULL),
(114, 1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', '855328545', 'truongtoan012002@gmail.com', 1, '2024-02-26 16:41:42', 250, 0, NULL, NULL, NULL),
(116, 1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', '855328545', 'truongtoan012002@gmail.com', 1, '2024-02-28 09:50:12', 61, 0, NULL, NULL, NULL),
(117, 1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', '855328545', 'truongtoan012002@gmail.com', 1, '2024-02-28 09:54:54', 135, 0, NULL, NULL, NULL),
(118, 2, 'toan', '123A Tôn Đức Thắng Quận 7 Tp.HCM', '855328545', 'truongtoan012002@gmail.com', 2, '2024-02-28 09:56:11', 505, 0, NULL, NULL, NULL),
(119, 1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', '855328545', 'truongtoan012002@gmail.com', 2, '2024-03-14 08:40:11', 756, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `idkhachhang` int(11) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `soluong` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietnhaphang`
--

CREATE TABLE `tbl_chitietnhaphang` (
  `id` int(4) NOT NULL,
  `idnhaphang` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `soluong` bigint(20) NOT NULL,
  `gia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` int(4) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `uutien` int(3) NOT NULL DEFAULT 0,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `tendanhmuc`, `trangthai`, `uutien`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'Thực phẩm nông sản', 1, 0, '2024-01-30 01:57:35', NULL),
(2, 'Thực phẩm tươi sống', 1, 0, '2024-01-30 01:57:35', NULL),
(3, 'Thực phẩn đóng hộp', 1, 0, '2024-02-01 06:57:56', NULL),
(4, 'Thực phẩm khô', 1, 0, '2024-02-01 06:58:14', NULL),
(5, 'Hàng nhập khẩu', 1, 0, '2024-02-22 01:33:51', NULL),
(6, 'Gia vị ', 1, 0, '2024-02-22 01:34:12', NULL),
(7, 'Nước giải khác', 1, 0, '2024-02-22 01:34:17', NULL),
(8, 'Sữa', 1, 0, '2024-02-22 07:37:35', '2024-02-22 13:06:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(4) NOT NULL,
  `ngaydat` date NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `tinhtranggiaohang` tinyint(4) NOT NULL,
  `ngaygiao` datetime NOT NULL,
  `idkhachhang` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(4) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(144, 1, 12, 'uploads/../uploads/rau_xalach.png', 'Rau Xà Lách', 18, 1, 18, 113),
(145, 1, 11, 'uploads/../uploads/haisan_tomcangxanh.jpg', 'Tôm Càng Xanh', 250, 2, 500, 113),
(146, 1, 11, 'uploads/../uploads/haisan_tomcangxanh.jpg', 'Tôm Càng Xanh', 250, 1, 250, 114),
(150, 1, 23, 'uploads/../uploads/rau_mongtoi.jpeg', 'Rau Mồng Tơi', 25, 1, 25, 116),
(151, 1, 9, 'uploads/../uploads/rau_muong.jpg', 'Rau Muống', 18, 2, 36, 116),
(152, 1, 25, 'uploads/../uploads/donghop_cangungamdau.jpg', 'Cá Ngừ Ngâm Dầu', 38, 1, 38, 117),
(153, 1, 23, 'uploads/../uploads/rau_mongtoi.jpeg', 'Rau Mồng Tơi', 25, 1, 25, 117),
(154, 1, 9, 'uploads/../uploads/rau_muong.jpg', 'Rau Muống', 18, 4, 72, 117),
(155, 2, 10, 'uploads/../uploads/rau_mui.jpg', 'Rau Thơm - Ngò Rí', 5, 1, 5, 118),
(156, 2, 11, 'uploads/../uploads/haisan_tomcangxanh.jpg', 'Tôm Càng Xanh', 250, 2, 500, 118);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id` int(4) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `gioitinh` varchar(11) DEFAULT NULL,
  `diachi` varchar(255) NOT NULL,
  `dienthoai` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaysinh` int(11) DEFAULT NULL,
  `thangsinh` int(11) DEFAULT NULL,
  `namsinh` int(11) DEFAULT NULL,
  `cccd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id` int(4) NOT NULL,
  `tennhacungcap` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt` varchar(50) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhaphang`
--

CREATE TABLE `tbl_nhaphang` (
  `id` int(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `idnhacungcap` int(11) NOT NULL,
  `nguoitao` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `nguoihuy` int(11) NOT NULL,
  `ngayhuy` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int(4) NOT NULL,
  `id_danhmuc` int(4) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `gia` double(10,0) NOT NULL DEFAULT 0,
  `giamoi` double(10,0) DEFAULT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `sanphamkhuyenmai` int(1) DEFAULT 0 COMMENT '0. sản phẩm không khuyến mãi 1. sản phẩm khuyến mãi',
  `luotxem` int(6) NOT NULL DEFAULT 0,
  `daban` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `id_danhmuc`, `tensanpham`, `img`, `gia`, `giamoi`, `mota`, `chitiet`, `sanphamkhuyenmai`, `luotxem`, `daban`) VALUES
(9, 1, 'Rau Muống', '../uploads/rau_muong.jpg', 20000, 18000, NULL, NULL, 1, 31, 155),
(10, 1, 'Rau Thơm - Ngò Rí', '../uploads/rau_mui.jpg', 5000, 3500, NULL, NULL, 0, 62, 55),
(11, 2, 'Tôm Càng Xanh', '../uploads/haisan_tomcangxanh.jpg', 250000, 185000, NULL, NULL, 0, 145, 432),
(12, 1, 'Rau Xà Lách', '../uploads/rau_xalach.png', 18000, 12000, NULL, NULL, 0, 24, 1212),
(23, 1, 'Rau Mồng Tơi', '../uploads/rau_mongtoi.jpeg', 25000, 22000, NULL, NULL, 0, 0, NULL),
(25, 3, 'Cá Ngừ Ngâm Dầu', '../uploads/donghop_cangungamdau.jpg', 40000, 38000, NULL, NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(4) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `email`, `tel`, `user`, `pass`, `role`) VALUES
(1, 'truongtoan', '1A/28 Hưng Phú Phường 8 Quận 8 TP.HCM', 'truongtoan012002@gmail.com', 855328545, 'admin', '123', 1),
(2, 'toan', '123A Tôn Đức Thắng Quận 7 Tp.HCM', 'truongtoan012002@gmail.com', 855328545, 'user', '123456', 0),
(6, NULL, NULL, NULL, NULL, 'toana', '123', 0),
(7, NULL, NULL, NULL, NULL, 'toanb', '123', 0),
(8, NULL, NULL, NULL, NULL, 'user1', '1234', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_chitietnhaphang`
--
ALTER TABLE `tbl_chitietnhaphang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giohang_user` (`iduser`),
  ADD KEY `fk_giohang_bill` (`idbill`),
  ADD KEY `fk_giohang_sanpham` (`idpro`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietnhaphang`
--
ALTER TABLE `tbl_chitietnhaphang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`);

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `fk_giohang_bill` FOREIGN KEY (`idbill`) REFERENCES `tbl_bill` (`id`),
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`idpro`) REFERENCES `tbl_sanpham` (`id`),
  ADD CONSTRAINT `fk_giohang_user` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `tbl_danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
