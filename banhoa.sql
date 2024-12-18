-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2024 lúc 06:43 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `MaDonHang`, `MaSanPham`, `SoLuong`, `Gia`) VALUES
(64, 1, 53, 2, 200000),
(65, 0, 53, 2, 200000),
(66, 0, 59, 1, 1550000),
(67, 0, 54, 1, 850000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(200) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(1, 'Hoa Cưới', 'Hoa dành cho đám cưới'),
(2, 'Hoa Sinh Nhật', 'Hoa dành cho các sự kiện sinh nhật'),
(3, 'Hoa Tình Yêu', 'Hoa dành cho các cặp đôi đang yêu nhau,các đôi vợ chồng,...'),
(4, 'Hoa Tốt Nghiệp', 'Hoa dành cho các sự kiện tốt nghiệp trọng đại như tốt nghiệp cấp 2,cấp 3,tốt nghiệp đại học,...'),
(5, 'Hoa Khai Trương', 'Hoa dành cho các dịp lễ khai trương khánh thành công trình,nhà hàng,cửa hàng,...'),
(6, 'Hoa Chúc Sức Khỏe', 'Hoa dành cho các dịp thăm hỏi sức khỏe bạn bè,người thân,...'),
(7, 'Hoa Cảm Ơn', 'Hoa dành cho các dịp cảm ơn đối tác,cảm ơn các nhãn hàng,sự kiện,...'),
(8, 'Hoa Chia Buồn', 'Hoa dành cho các sự kiện đám tang,chia buồn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `TongGiaTri` decimal(10,0) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaKhachHang`, `NgayDatHang`, `TongGiaTri`, `TrangThai`) VALUES
(0, 1, '2024-11-05 13:49:50', 2900000, 1),
(1, 1, '2024-11-05 13:48:12', 300000, 1),
(2, 1, '2024-11-10 18:34:20', 0, 0),
(5, 100, '2024-11-10 18:42:34', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaohang`
--

CREATE TABLE `giaohang` (
  `MaGiaoHang` int(11) NOT NULL,
  `MaThanhToan` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DiaChi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaohang`
--

INSERT INTO `giaohang` (`MaGiaoHang`, `MaThanhToan`, `HoTen`, `SoDienThoai`, `Email`, `DiaChi`) VALUES
(20, 11, '123 Phạm', '0834035090', 'boymediumpmt@gmail.com', '321, vĩnh hưng, hoàng mai, Hà nội'),
(21, 12, '1 1', '1', '1@gmail', '1, 1, 1, 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `TenTaiKhoan` varchar(50) NOT NULL,
  `TenKhachHang` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `DiaChi` text NOT NULL,
  `MatKhau` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenTaiKhoan`, `TenKhachHang`, `Email`, `SoDienThoai`, `DiaChi`, `MatKhau`) VALUES
(1, 'MT', 'MT', 'MT@gmail.com', '0834035090', 'Lĩnh Nam', 'mt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` int(11) NOT NULL,
  `HoTen` varchar(200) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `NoiDung` text NOT NULL,
  `NgayLienHe` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(200) NOT NULL,
  `MaDanhMuc` int(11) NOT NULL,
  `Mau` varchar(50) NOT NULL,
  `MoTa` text NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `HinhAnh` varchar(200) NOT NULL,
  `TonKho` int(11) NOT NULL,
  `GiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `MaDanhMuc`, `Mau`, `MoTa`, `Gia`, `HinhAnh`, `TonKho`, `GiamGia`) VALUES
(1, 'Chilling', 7, 'Cam', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn cam: 15\r\n- Cúc rossi vàng sunny: 5\r\n- Hoa thạch thảo trắng: 1\r\n- Hồng trứng gà: 10', 200000, 'img/san_pham/cam_on/chilling.jpg\r\n', 20, 20),
(3, 'Lucky', 7, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm vàng: 8\r\n- Cúc calimero vàng nhụy nâu: 8\r\n- Đồng tiền vàng: 10', 450000, 'img/san_pham/cam_on/lucky.jpg\r\n', 20, 0),
(4, 'Niềm hi vọng', 7, 'Xanh', 'Sản phẩm bao gồm:\r\n- Cúc calimero trắng: 10\r\n- Cúc mẫu đơn xanh dương NK: 7\r\n- Hoa baby: 2\r\n- Hồng trắng cồ: 5 (nhuộm xanh dương)', 1450000, 'img/san_pham/cam_on/niem_hi_vong.jpg\r\n', 10, 0),
(5, 'Proud Of You', 7, 'Cam', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm cam: 2\r\n- Free Spirit Rose (10): 15\r\n- Hồng trứng gà: 5', 700000, 'img/san_pham/cam_on/proud_of_you.jpg', 20, 10),
(6, 'Tin Yêu', 7, 'Hồng', 'Sản phẩm bao gồm:\r\n- Hoa baby: 1\r\n- Hồng da: 15\r\n- Mõm sói trắng: 6\r\n- Đồng tiền hồng nhí: 12', 750000, 'img/san_pham/cam_on/tin_yeu.jpg', 30, 20),
(7, 'Treasure', 7, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn trắng : 10\r\n- Hoa baby: 1\r\n- Hồng vàng chùa: 15\r\n- Mõm sói trắng: 20\r\n- Sen đá lớn ngẫu nhiên: 3\r\n- Sen đá nhỏ ngẫu nhiên: 5', 1200000, 'img/san_pham/cam_on/treasure.jpg', 7, 0),
(8, 'Ly Biệt', 8, 'Tím', 'Sản phẩm bao gồm:\r\n- Cát tường tím viền: 6\r\n- Cúc trắng: 20\r\n- Hoa Sao tím: 2\r\n- Hồng tím cà: 25\r\n- Môn trắng: 8', 1500000, 'img/san_pham/chia_buon/ly_biet.jpg', 50, 30),
(9, 'Ngày cách xa ', 8, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cúc lưới trắng: 5\r\n- Cúc mẫu đơn trắng: 3\r\n- Cúc trắng: 15\r\n- Hoa baby: 2\r\n- Hồng capuchino: 60\r\n- Hồng Pink Mondial: 30\r\n- Đồng tiền kem nhí: 15\r\n- Đồng tiền trắng: 15', 3500000, 'img/san_pham/chia_buon/ngay_cach_xa.jpg', 40, 20),
(10, 'Phù Du', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cúc tím: 5\r\n- Cúc mẫu đơn trắng: 10\r\n- Cúc trắng: 5', 1500000, 'img/san_pham/chia_buon/phu_du.jpg', 37, 40),
(11, 'Phút Giây Ly Biệt', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cát tường trắng: 3\r\n- Cúc mai trắng: 10\r\n- Cúc trắng: 10\r\n- Hoa baby: 2\r\n- Hồng trắng cồ: 20\r\n- Lan thái trắng: 8\r\n- Môn trắng: 6    ', 1600000, 'img/san_pham/chia_buon/phut_giay_ly_biet.jpg', 50, 0),
(12, 'The End', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cúc bạc hà: 5\r\n- Cúc mẫu đơn trắng: 3\r\n- Cúc trắng: 15', 1300000, 'img/san_pham/chia_buon/the_end.jpg', 50, 50),
(13, 'Thênh Thang', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cúc trắng: 25\r\n- Hồng trắng cồ: 15\r\n- Lan thái trắng: 5\r\n- Môn xanh: 5\r\n- Đồng tiền trắng: 12', 1200000, 'img/san_pham/chia_buon/thenh_thang.jpg', 50, 60),
(14, 'Tiễn đưa', 8, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn tím: 20\r\n- Cúc calimero tím: 12\r\n- Cúc trắng: 5\r\n- Hoa Sao tím: 2\r\n- Hồng tím cà: 30\r\n- Hồng trắng cồ: 10', 600000, 'img/san_pham/chia_buon/tien_dua.jpg', 50, 5),
(15, 'Ước Nguyện', 8, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Cát tường trắng: 4\r\n- Cúc calimero trắng: 5\r\n- Cúc trắng: 15\r\n- Hoa baby: 1\r\n- Hồng trắng cồ: 28\r\n- Lan vườn tím: 10', 450000, 'img/san_pham/chia_buon/uoc_nguyen.jpg', 60, 0),
(16, 'Vô Thường', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cúc trắng: 15\r\n- Hoa mimi: 15\r\n- Hồng tím cà: 18\r\n- Lan trắng vườn: 10\r\n- Lily hồng: 3', 500000, 'img/san_pham/chia_buon/vo_thuong.jpg', 70, 50),
(17, 'Yên Nghỉ', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn xanh bơ: 10\r\n- Cúc trắng: 20\r\n- Hoa Cúc Nút Xanh: 10\r\n- Lan hồ điệp trắng: 4\r\n- Lan trắng vườn: 15\r\n- Đồng tiền trắng: 30', 800000, 'img/san_pham/chia_buon/yen_nghi.jpg', 100, 0),
(18, 'Sức Khỏe Dồi Dào', 6, 'Trắng', 'Sản phẩm bao gồm:\r\n- Hồng da: 5\r\n- Ly trắng đơn: 3\r\n- Mõm sói vàng: 5', 300000, 'img/san_pham/chuc_suc_khoe/hoa_tang_su_kien.jpg\r\n', 60, 12),
(19, 'Kem Hoa', 6, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa thạch thảo trắng: 2\r\n- Hồng đỏ ớt: 10\r\n- Đinh lăng: 7', 280000, 'img/san_pham/chuc_suc_khoe/kem_hoa.jpg\r\n', 60, 70),
(20, 'Ngày Xanh', 6, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn xanh bơ: 10\r\n- Hoa mimi: 10\r\n- Hoa thạch thảo trắng: 5\r\n- Hồng trắng nhí: 15\r\n- Mõm sói trắng: 10', 880000, 'img/san_pham/chuc_suc_khoe/ngay_xanh.jpg\r\n', 70, 25),
(21, 'Simple', 6, 'Cam', 'Sản phẩm bao gồm:\r\n- Hoa baby: 1\r\n- Hồng trứng gà: 10\r\n- Đinh lăng: 15', 350000, 'img/san_pham/chuc_suc_khoe/simple.jpg\r\n', 40, 50),
(22, 'Tuổi Trẻ', 6, 'Vàng', 'Sản phẩm bao gồm:\r\n- Green wicky: 5\r\n- Hồng trứng gà: 11\r\n- Hồng vàng ánh trăng: 15\r\n- Hướng dương (cành): 6\r\n- Lan vũ nữ: 4\r\n- Mõm sói trắng: 10', 1000000, 'img/san_pham/chuc_suc_khoe/tuoi_tre.jpg\r\n', 80, 45),
(23, 'Kệ Chúc Mừng', 5, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa Cúc Lưới Xanh: 20\r\n- Môn đỏ: 10\r\n- Đồng tiền cam (20): 30', 100000, 'img/san_pham/khai_truong/ke_chuc_mung.jpg\r\n', 50, 0),
(24, 'Khởi Đầu Thuận Lợi', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cúc mai xanh: 10\r\n- Dương xỉ pháp: 40\r\n- Hồng vàng ánh trăng: 40\r\n- Lá mật cật: 5\r\n- Lan Moka vàng nến: 33\r\n- Mõm sói vàng: 20\r\n- Môn xanh: 22\r\n- Đồng tiền vàng: 60', 3500000, 'img/san_pham/khai_truong/khoi_dau_thuan_loi.jpg\r\n', 40, 20),
(25, 'Thành Công Viên Mãn', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cúc calimero xanh: 5\r\n- Hoa thiên điểu: 12\r\n- Hồng da: 25\r\n- Hồng vàng ánh trăng: 25\r\n- Lan vũ nữ: 15\r\n- Lily vàng thơm: 17\r\n- Môn xanh: 16', 2400000, 'img/san_pham/khai_truong/thanh_cong_vien_man.jpg\r\n', 50, 0),
(26, 'Tương Lai Tươi Sáng', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n- Hồng vàng ánh trăng: 50\r\n- Lan vũ nữ: 10\r\n- Lily vàng thơm: 30\r\n- Mõm sói trắng: 20\r\n- Môn xanh: 8', 680000, 'img/san_pham/khai_truong/tuong_lai_tuoi_sang.jpg\r\n', 50, 20),
(27, 'Vạn Đạt', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n- Hoa thiên điểu: 5\r\n- Hồng trứng gà: 22\r\n- Hồng vàng ánh trăng: 18\r\n- Lily vàng thơm: 18\r\n- Mõm sói vàng: 20', 1000000, 'img/san_pham/khai_truong/van_dat.jpg\r\n', 60, 12),
(28, 'Vạn Sự Tốt Đẹp', 5, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa thiên điểu: 10\r\n- Hồng trứng gà: 40\r\n- Hồng đỏ sa: 80\r\n- Lá phụ khác: 19\r\n- Lan Moka vàng nến: 4\r\n- Lan Moka đỏ: 5\r\n- Môn đỏ: 25', 3500000, 'img/san_pham/khai_truong/van_su_tot_dep.jpg\r\n', 60, 20),
(31, 'Congrats', 4, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm đỏ: 5\r\n- Hồng đỏ Pháp: 5\r\n- Hướng dương : 2\r\n- Lan Moka đỏ: 3\r\n- Red Elegance: 2', 500000, 'img/san_pham/tot_nghiep/congrats.jpg\r\n', 50, 30),
(32, 'Hành Trình Mới', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm cam viền: 10\r\n- Cúc mai xanh: 10\r\n- Hồng shimmer DL: 15\r\n- Hướng dương: 8', 1000000, 'img/san_pham/tot_nghiep/hanh_trinh_moi.jpg\r\n', 50, 20),
(33, 'Hy Vọng', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cát tường trắng: 2\r\n- Hoa baby: 1\r\n- Hoa Sao tím: 1\r\n- Hồng da: 10\r\n- Hồng trứng gà: 3\r\n- Hướng dương: 3\r\n- Lá phụ khác: 5\r\n- Mõm sói vàng: 10', 650000, 'img/san_pham/tot_nghiep/hy_vong.jpg\r\n', 50, 50),
(34, 'Only You', 4, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cúc calimero tím: 7\r\n- Hoa mimi: 10\r\n- Hồng da: 1', 250000, 'img/san_pham/tot_nghiep/only_you.jpg\r\n', 50, 32),
(35, 'Tươi Vui', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn xanh bơ: 6\r\n- Cát tường trắng: 2\r\n- Hoa Sao tím: 1\r\n- Hồng vàng mật ong: 6\r\n- Hướng dương: 5\r\n- Lá phụ khác: 6', 500000, 'img/san_pham/tot_nghiep/tuoi_vui.jpg\r\n', 70, 50),
(36, 'Destiny Date', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa baby: 1\r\n- Hồng đỏ Pháp: 100', 1800000, 'img/san_pham/tinh_yeu/destiny_date.jpg\r\n', 50, 5),
(37, 'Hơn Cả Yêu', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn đỏ: 5\r\n- Cát tường hồng viền: 3\r\n- Hồng da: 10\r\n- Hồng đỏ Ecuador DL: 20\r\n- Lan Moka đỏ: 2\r\n- Red Elegance: 15\r\n- Sen đá chuỗi ngọc bi: 3', 1800000, 'img/san_pham/tinh_yeu/hon_ca_yeu.jpg\r\n', 50, 0),
(38, 'Jolie', 3, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cúc calimero hồng: 10\r\n- Cúc mẫu đơn hồng nhạt DL: 5\r\n- Hoa baby: 2\r\n- Mõm sói song hỷ: 12\r\n- Pink OHara: 16', 1500000, 'img/san_pham/tinh_yeu/jolie.jpg\r\n', 60, 0),
(39, 'Purple Love', 3, 'Tím', 'Sản phẩm bao gồm:\r\n- Hoa Sao tím: 5\r\n- Hồng tím cà: 100', 1800000, 'img/san_pham/tinh_yeu/purple_love.jpg\r\n', 50, 20),
(40, 'Romantic Heart', 3, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cúc mai trắng: 3\r\n- Hồng da: 7\r\n- Mõm sói song hỷ: 10\r\n- Đồng tiền tua hồng nhạt: 6', 500000, 'img/san_pham/tinh_yeu/romantic_heart.jpg\r\n', 50, 50),
(41, 'Rung Động', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm đỏ: 10\r\n- Cúc rossi trắng: 5\r\n- Hồng trứng gà: 5\r\n- Hồng đỏ ớt: 15\r\n- Lá bạc: 1', 650000, 'img/san_pham/tinh_yeu/rung_dong.jpg\r\n', 70, 0),
(42, 'Trăm Năm Tình Yêu', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa baby: 1\r\n- Hồng đỏ Pháp: 100', 1650000, 'img/san_pham/tinh_yeu/tram_nam_tinh_yeu.jpg\r\n', 60, 0),
(43, 'Ánh Dương', 2, 'Vàng', 'Sản phẩm bao gồm:\r\n- Hướng dương (cành): 1\r\n- Lá huyết dụ: 3', 150000, 'img/san_pham/sinh_nhat/anh_duong.jpg\r\n', 100, 50),
(44, 'Bầu trời trong xanh', 2, 'Xanh', 'Sản phẩm bao gồm:\r\n- Cát tường trắng: 5\r\n- Cúc mẫu đơn xanh dương nhạt DL: 7\r\n- Hồng trắng cồ: 15', 1500000, 'img/san_pham/sinh_nhat/bau_troi_trong_xanh.jpg\r\n', 50, 65),
(45, 'Điều Thân Thương', 2, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm hồng nhạt: 3\r\n- Hoa Sao tím: 1\r\n- Hồng đỏ Ecuador DL: 1', 150000, 'img/san_pham/sinh_nhat/dieu_than_thuong.jpg\r\n', 60, 20),
(46, 'Gặp Gỡ', 2, 'Hồng', 'Sản phẩm bao gồm:\r\n- Hoa baby: 0.5\r\n- Pink OHara: 1', 150000, 'img/san_pham/sinh_nhat/gap_go.jpg\r\n', 50, 0),
(47, 'My Sun', 2, 'Vàng', 'Sản phẩm bao gồm:\r\n- Hoa Sao tím: 1\r\n- Hướng dương: 1', 200000, 'img/san_pham/sinh_nhat/my_sun.jpg\r\n', 90, 36),
(48, 'Ngày Bên Em', 2, 'Tím', 'Sản phẩm bao gồm:\r\n- Cát tường hồng viền: 5\r\n- Hoa Sao tím: 1\r\n- Mõm sói song hỷ: 10\r\n- Purple Ohara: 15', 1000000, 'img/san_pham/sinh_nhat/ngay_ben_em.jpg\r\n', 50, 0),
(49, 'Take My Hand', 2, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cúc rossi trắng: 3\r\n- Hoa sao vàng: 1\r\n- Hồng Pink Mondial: 1', 150000, 'img/san_pham/sinh_nhat/take_my_hand.jpg\r\n', 50, 0),
(50, 'Tình Cờ', 2, 'Tím', 'Sản phẩm bao gồm:\r\n- Hoa thạch thảo tím: 1\r\n- Purple Ohara: 1', 150000, 'img/san_pham/sinh_nhat/tinh_co.jpg\r\n', 60, 55),
(51, 'Warm Hugs', 2, 'Trắng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn trắng: 5\r\n- Hoa baby: 1\r\n- Hồng shimmer DL: 7', 300000, 'img/san_pham/sinh_nhat/warm_hugs.jpg\r\n', 50, 0),
(52, 'Dynamic', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hồng đỏ Pháp: 25\r\n- Lá bạc: 3', 500000, 'img/san_pham/cuoi/dynamic.jpg\r\n', 100, 33),
(53, 'Everyday With You', 1, 'Xanh', 'Sản phẩm bao gồm:\r\n- Hoa baby: 1\r\n- Hồng trắng cồ: 3', 200000, 'img/san_pham/cuoi/everyday_with_you.jpg\r\n', 50, 20),
(54, 'Gửi Người Tôi Yêu', 1, 'Tím', 'Sản phẩm bao gồm:\r\n- Cẩm chướng đơn hồng: 12\r\n- Hoa Sao tím: 2\r\n- Hồng da (50): 20\r\n- Hồng đỏ sa: 13', 850000, 'img/san_pham/cuoi/gui_nguoi_toi_yeu.jpg\r\n', 50, 0),
(55, 'Nắng Hồng', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cẩm chướng chùm hồng nhạt: 10\r\n- Cúc calimero trắng: 5\r\n- Hoa baby: 1\r\n- Hoa thạch thảo tím: 3\r\n- Hồng da: 17', 550000, 'img/san_pham/cuoi/nang_hong.jpg\r\n', 50, 20),
(56, 'Pretty Clouds', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa baby: 4\r\n- Hồng đỏ Pháp: 1', 450000, 'img/san_pham/cuoi/pretty_clouds.jpg\r\n', 50, 50),
(57, 'Priceless Heart', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cúc Tana: 8\r\n- Cát tường hồng viền: 7\r\n- Hồng da: 20\r\n- Hồng da cồ: 15\r\n- Hồng sen mới: 15', 1800000, 'img/san_pham/cuoi/priceless_heart.jpg\r\n', 50, 0),
(58, 'Tình Yêu Đầu', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n- Cát tường trắng: 2\r\n- Hoa baby: 1\r\n- Hồng da: 12\r\n- Hồng trắng nhí: 8', 650000, 'img/san_pham/cuoi/tinh_yeu_dau.jpg\r\n', 50, 0),
(59, 'Trái Tim Yêu Thương', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa baby: 3\r\n- Hồng đỏ sa: 43\r\n- Sen đá lớn: 1', 1550000, 'img/san_pham/cuoi/trai_tim_yeu_thuong.jpg\r\n', 50, 0),
(60, 'Hạnh Phúc Bất Tận', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n- Hoa hạnh phúc: 3\r\n- Hồng red naomi: 5\r\n- Hồng đỏ sa: 17', 1500000, 'img/san_pham/cuoi/hanh_phuc_bat_tan.jpg\r\n', 50, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `MaThanhToan` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `PhuongThucThanhToan` varchar(50) NOT NULL,
  `NgayThanhToan` datetime NOT NULL,
  `SoTien` decimal(10,0) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`MaThanhToan`, `MaDonHang`, `PhuongThucThanhToan`, `NgayThanhToan`, `SoTien`, `TrangThai`) VALUES
(11, 1, 'Thanh toán khi nhận hàng', '2024-11-05 13:49:50', 300000, 'Đã Thanh Toán'),
(12, 0, 'Thanh toán khi nhận hàng', '2024-11-10 18:34:20', 2900000, 'Đã Thanh Toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthich`
--

CREATE TABLE `yeuthich` (
  `MaYeuThich` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `yeuthich`
--

INSERT INTO `yeuthich` (`MaYeuThich`, `MaSanPham`, `MaKhachHang`) VALUES
(8, 53, 1),
(10, 56, 1),
(11, 58, 1),
(12, 43, 1),
(13, 46, 1),
(14, 31, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `pr_masanpham2` (`MaSanPham`),
  ADD KEY `pr_madonhang2` (`MaDonHang`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  ADD PRIMARY KEY (`MaGiaoHang`),
  ADD KEY `pr_matt` (`MaThanhToan`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `TenTaiKhoan` (`TenTaiKhoan`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `pr_madanhmuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaThanhToan`),
  ADD KEY `pr_madh` (`MaDonHang`);

--
-- Chỉ mục cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`MaYeuThich`),
  ADD KEY `pr_makh2` (`MaKhachHang`),
  ADD KEY `pr_masp` (`MaSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `MaGiaoHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `MaThanhToan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `MaYeuThich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `pr_madonhang2` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pr_masanpham2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `pr_matt` FOREIGN KEY (`MaThanhToan`) REFERENCES `thanhtoan` (`MaThanhToan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `pr_madanhmuc` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmucsanpham` (`MaDanhMuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `pr_madh` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `pr_makh2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pr_masp` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
