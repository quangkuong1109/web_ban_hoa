-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 08:38 AM
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
  `GIa` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `DiemDanhGia` int(11) NOT NULL,
  `BinhLuan` text NOT NULL,
  `NgayDanhGia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `TrangThai` varchar(50) NOT NULL,
  `MaGiamGia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaohang`
--

CREATE TABLE `giaohang` (
  `MaGiaoHang` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `NgayGiaoHangDuKien` datetime NOT NULL,
  `DiaChiGiaoHang` text NOT NULL,
  `TrangThaiGiaoHang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

CREATE TABLE `quantrivien` (
  `MaQuanTriVien` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(200) NOT NULL,
  `VaiTro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantrivien`
--

INSERT INTO `quantrivien` (`MaQuanTriVien`, `TenDangNhap`, `MatKhau`, `VaiTro`) VALUES
(1, 'admin', 'admin', 'admin');

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
(1, 'Chilling', 7, 'Cam', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn cam : 15\r\n-Cúc rossi vàng sunny : 5\r\n-Hoa thạch thảo trắng: 1\r\n-Hồng trứng gà : 10', 200000, 'img/san_pham/cam_on/chilling.jpg\r\n', 20, 20),
(3, 'Lucky', 7, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm vàng : 8\r\n-Cúc calimero vàng nhụy nâu : 8\r\n-Đồng tiền vàng : 10', 450000, 'img/san_pham/cam_on/lucky.jpg\r\n', 20, 0),
(4, 'Niềm hi vọng', 7, 'Xanh', 'Sản phẩm bao gồm:\r\n-Cúc calimero trắng : 10\r\n-Cúc mẫu đơn xanh dương NK: 7\r\n-Hoa baby : 2\r\n-Hồng trắng cồ: 5 (nhuộm xanh dương)', 1450000, 'img/san_pham/cam_on/niem_hi_vong.jpg\r\n', 10, 0),
(5, 'Proud Of You', 7, 'Cam', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm cam : 2\r\n-Free Spirit Rose (10): 15\r\n-Hồng trứng gà : 5', 700000, 'img/san_pham/cam_on/proud_of_you.jpg', 20, 0),
(6, 'Tin Yêu', 7, 'Hồng', 'Sản phẩm bao gồm:\r\n-Hoa baby : 1\r\n-Hồng da: 15\r\n-Mõm sói trắng : 6\r\n-Đồng tiền hồng nhí : 12', 750000, 'img/san_pham/cam_on/tin_yeu.jpg', 30, 20),
(7, 'Treasure', 7, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn trắng : 10\r\n-Hoa baby : 1\r\n-Hồng vàng chùa : 15\r\n-Mõm sói trắng : 20\r\n-Sen đá lớn ngẫu nhiên: 3\r\n-Sen đá nhỏ ngẫu nhiên: 5', 1200000, 'img/san_pham/cam_on/treasure.jpg', 7, 0),
(8, 'Ly Biệt', 8, 'Tím', 'Sản phẩm bao gồm:\r\n-Cát tường tím viền : 6\r\n-Cúc trắng : 20\r\n-Hoa Sao tím: 2\r\n-Hồng tím cà: 25\r\n-Môn trắng: 8', 1500000, 'img/san_pham/chia_buon/ly_biet.jpg', 50, 0),
(9, 'Ngày cách xa ', 8, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cúc lưới trắng : 5\r\n-Cúc mẫu đơn trắng: 3\r\n-Cúc trắng : 15\r\n-Hoa baby : 2\r\n-Hồng capuchino: 60\r\n-Hồng Pink Mondial : 30\r\n-Đồng tiền kem nhí : 15\r\n-Đồng tiền trắng : 15', 3500000, 'img/san_pham/chia_buon/ngay_cach_xa.jpg', 40, 20),
(10, 'Phù Du', 8, 'Trắng', 'Bạn bè, người thân ra đi luôn để lại nỗi buồn và nhung nhớ khôn nguôi trong tâm trí mỗi người. Trong giây phút chia cách đau thương, từng kỷ niệm được hồi tưởng như một cuốn phim chiếu chậm, tràn ngập những niềm vui, nỗi buồn cũng như tiếc nuối. Kệ hoa “Phù du” chất chứa nỗi niềm riêng của người ở lại dành cho người đã khuất, những nỗi niềm giờ đây đã không biết tỏ cùng ai.', 1500000, 'img/san_pham/chia_buon/phu_du.jpg', 37, 0),
(11, 'Phút Giây Ly Biệt', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cát tường trắng: 3\r\n-Cúc mai trắng: 10\r\n-Cúc trắng : 10\r\n-Hoa baby : 2\r\n-Hồng trắng cồ: 20\r\n-Lan thái trắng: 8\r\n-Môn trắng: 6    ', 1600000, 'img/san_pham/chia_buon/phut_giay_ly_biet.jpg', 50, 0),
(12, 'The End', 8, 'Trắng', 'Cuộc gặp gỡ nào cũng phải tới lúc chia tay, bàn tiệc nào cũng tới lúc tàn và đời người ai rồi cũng sẽ đi đến hồi kết. Kệ hoa chia buồn “The end” chia sẻ thông điệp về cái kết của đời người, cầu nguyện cho người đã khuất sẽ tìm được an yên, tĩnh tâm ở một thế giới khác. Đồng thời mong người ở lại cũng đừng quá đau lòng, tiếp tục hướng về tương lai phía trước. Bởi trong cuộc đời này, khi đã chấp nhận một sự khởi đầu, cũng đồng nghĩa với việc phải chờ đợi một kết thúc.', 1300000, 'img/san_pham/chia_buon/the_end.jpg', 50, 50),
(13, 'Thênh Thang', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cúc trắng : 25\r\n-Hồng trắng cồ: 15\r\n-Lan thái trắng: 5\r\n-Môn xanh: 5\r\n-Đồng tiền trắng : 12', 1200000, 'img/san_pham/chia_buon/thenh_thang.jpg', 50, 0),
(14, 'Tiễn đưa', 8, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn tím : 20\r\n-Cúc calimero tím: 12\r\n-Cúc trắng : 5\r\n-Hoa Sao tím: 2\r\n-Hồng tím cà: 30\r\n-Hồng trắng cồ: 10', 600000, 'img/san_pham/chia_buon/tien_dua.jpg', 50, 0),
(15, 'Ước Nguyện', 8, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Cát tường trắng: 4\r\n-Cúc calimero trắng : 5\r\n-Cúc trắng : 15\r\n-Hoa baby : 1\r\n-Hồng trắng cồ: 28\r\n-Lan vườn tím: 10', 450000, 'img/san_pham/chia_buon/uoc_nguyen.jpg', 60, 0),
(16, 'Vô Thường', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cúc trắng : 15\r\n-Hoa mimi: 15\r\n-Hồng tím cà: 18\r\n-Lan trắng vườn : 10\r\n-Lily hồng: 3', 500000, 'img/san_pham/chia_buon/vo_thuong.jpg', 70, 0),
(17, 'Yên Nghỉ', 8, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn xanh bơ : 10\r\n-Cúc trắng : 20\r\n-Hoa Cúc Nút Xanh : 10\r\n-Lan hồ điệp trắng : 4\r\n-Lan trắng vườn : 15\r\n-Đồng tiền trắng : 30', 800000, 'img/san_pham/chia_buon/uoc_nguyen.jpg', 100, 0),
(18, 'Sức Khỏe Dồi Dào', 6, 'Trắng', 'Sản phẩm bao gồm:\r\n-Hồng da: 5\r\n-Ly trắng đơn: 3\r\n-Mõm sói vàng: 5', 300000, 'img/san_pham/chuc_suc_khoe/hoa_tang_su_kien.jpg\r\n', 60, 0),
(19, 'Kem Hoa', 6, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa thạch thảo trắng: 2\r\n-Hồng đỏ ớt : 10\r\n-Đinh lăng : 7', 280000, 'img/san_pham/chuc_suc_khoe/kem_hoa.jpg\r\n', 60, 0),
(20, 'Ngày Xanh', 6, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn xanh bơ : 10\r\n-Hoa mimi: 10\r\n-Hoa thạch thảo trắng: 5\r\n-Hồng trắng nhí: 15\r\n-Mõm sói trắng : 10', 880000, 'img/san_pham/chuc_suc_khoe/ngay_xanh.jpg\r\n', 70, 0),
(21, 'Simple', 6, 'Cam', 'Sản phẩm bao gồm:\r\n-Hoa baby : 1\r\n-Hồng trứng gà : 10\r\n-Đinh lăng : 15', 350000, 'img/san_pham/chuc_suc_khoe/simple.jpg\r\n', 40, 50),
(22, 'Tuổi Trẻ', 6, 'Vàng', 'Sản phẩm bao gồm:\r\n-Green wicky : 5\r\n-Hồng trứng gà : 11\r\n-Hồng vàng ánh trăng : 15\r\n-Hướng dương (cành): 6\r\n-Lan vũ nữ: 4\r\n-Mõm sói trắng : 10', 1000000, 'img/san_pham/chuc_suc_khoe/tuoi_tre.jpg\r\n', 80, 0),
(23, 'Kệ Chúc Mừng', 5, 'Đỏ,Cam,Xanh', 'Sản phẩm bao gồm:\r\n-Hoa Cúc Lưới Xanh: 20\r\n-Môn đỏ: 10\r\n-Đồng tiền cam (20): 30', 100000, 'img/san_pham/khai_truong/ke_chuc_mung.jpg\r\n', 50, 0),
(24, 'Khởi Đầu Thuận Lợi', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cúc mai xanh : 10\r\n-Dương xỉ pháp : 40\r\n-Hồng vàng ánh trăng : 40\r\n-Lá mật cật : 5\r\n-Lan Moka vàng nến: 33\r\n-Mõm sói vàng: 20\r\n-Môn xanh: 22\r\n-Đồng tiền vàng : 60', 3500000, 'img/san_pham/khai_truong/khoi_dau_thuan_loi.jpg\r\n', 40, 20),
(25, 'Thành Công Viên Mãn', 5, 'Vàng,Xanh', 'Sản phẩm bao gồm:\r\n-Cúc calimero xanh : 5\r\n-Hoa thiên điểu : 12\r\n-Hồng da: 25\r\n-Hồng vàng ánh trăng : 25\r\n-Lan vũ nữ: 15\r\n-Lily vàng thơm : 17\r\n-Môn xanh: 16', 2400000, 'img/san_pham/khai_truong/thanh_cong_vien_man.jpg\r\n', 50, 0),
(26, 'Tương Lai Tươi Sáng', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n-Hồng vàng ánh trăng : 50\r\n-Lan vũ nữ: 10\r\n-Lily vàng thơm : 30\r\n-Mõm sói trắng : 20\r\n-Môn xanh: 8', 680000, 'img/san_pham/khai_truong/tuong_lai_tuoi_sang.jpg\r\n', 50, 20),
(27, 'Vạn Đạt', 5, 'Vàng', 'Sản phẩm bao gồm:\r\n-Hoa thiên điểu : 5\r\n-Hồng trứng gà : 22\r\n-Hồng vàng ánh trăng : 18\r\n-Lily vàng thơm : 18\r\n-Mõm sói vàng: 20', 1000000, 'img/san_pham/khai_truong/van_dat.jpg\r\n', 60, 0),
(28, 'Vạn Sự Tốt Đẹp', 5, 'Đỏ,Vàng', 'Sản phẩm bao gồm:\r\n-Hoa thiên điểu : 10\r\n-Hồng trứng gà : 40\r\n-Hồng đỏ sa : 80\r\n-Lá phụ khác: 19\r\n-Lan Moka vàng nến: 4\r\n-Lan Moka đỏ: 5\r\n-Môn đỏ: 25', 3500000, 'img/san_pham/khai_truong/van_su_tot_dep.jpg\r\n', 60, 0),
(31, 'Congrats', 4, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm đỏ : 5\r\n-Hồng đỏ Pháp: 5\r\n-Hướng dương : 2\r\n-Lan Moka đỏ: 3\r\n-Red Elegance : 2', 500000, 'img/san_pham/tot_nghiep/congrats.jpg\r\n', 50, 0),
(32, 'Hành Trình Mới', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm cam viền: 10\r\n-Cúc mai xanh : 10\r\n-Hồng shimmer DL: 15\r\n-Hướng dương : 8', 1000000, 'img/san_pham/tot_nghiep/hanh_trinh_moi.jpg\r\n', 50, 20),
(33, 'Hy Vọng', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cát tường trắng: 2\r\n-Hoa baby : 1\r\n-Hoa Sao tím: 1\r\n-Hồng da: 10\r\n-Hồng trứng gà : 3\r\n-Hướng dương : 3\r\n-Lá phụ khác: 5\r\n-Mõm sói vàng: 10', 650000, 'img/san_pham/tot_nghiep/hy_vong.jpg\r\n', 50, 50),
(34, 'Only You', 4, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cúc calimero tím: 7\r\n-Hoa mimi: 10\r\n-Hồng da: 1', 250000, 'img/san_pham/tot_nghiep/only_you.jpg\r\n', 50, 0),
(35, 'Tươi Vui', 4, 'Vàng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn xanh bơ : 6\r\n-Cát tường trắng: 2\r\n-Hoa Sao tím: 1\r\n-Hồng vàng mật ong: 6\r\n-Hướng dương : 5\r\n-Lá phụ khác: 6', 500000, 'img/san_pham/tot_nghiep/tuoi_vui.jpg\r\n', 70, 50),
(36, 'Destiny Date', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa baby : 1\r\n-Hồng đỏ Pháp: 100', 1800000, 'img/san_pham/tinh_yeu/destiny_date.jpg\r\n', 50, 0),
(37, 'Hơn Cả Yêu', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn đỏ : 5\r\n-Cát tường hồng viền: 3\r\n-Hồng da: 10\r\n-Hồng đỏ Ecuador DL: 20\r\n-Lan Moka đỏ: 2\r\n-Red Elegance : 15\r\n-Sen đá chuỗi ngọc bi : 3', 1800000, 'img/san_pham/tinh_yeu/hon_ca_yeu.jpg\r\n', 50, 0),
(38, 'Jolie', 3, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cúc calimero hồng : 10\r\n-Cúc mẫu đơn hồng nhạt DL : 5\r\n-Hoa baby : 2\r\n-Mõm sói song hỷ : 12\r\n-Pink OHara: 16', 1500000, 'img/san_pham/tinh_yeu/jolie.jpg\r\n', 60, 0),
(39, 'Purple Love', 3, 'Tím', 'Sản phẩm bao gồm:\r\n-Hoa Sao tím: 5\r\n-Hồng tím cà: 100', 1800000, 'img/san_pham/tinh_yeu/purple_love.jpg\r\n', 50, 0),
(40, 'Romantic Heart', 3, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cúc mai trắng: 3\r\n-Hồng da: 7\r\n-Mõm sói song hỷ : 10\r\n-Đồng tiền tua hồng nhạt: 6', 500000, 'img/san_pham/tinh_yeu/romantic_heart.jpg\r\n', 50, 0),
(41, 'Rung Động', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm đỏ : 10\r\n-Cúc rossi trắng: 5\r\n-Hồng trứng gà : 5\r\n-Hồng đỏ ớt : 15\r\n-Lá bạc : 1', 650000, 'img/san_pham/tinh_yeu/rung_dong.jpg\r\n', 70, 0),
(42, 'Trăm Năm Tình Yêu', 3, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa baby : 1\r\n-Hồng đỏ Pháp: 100', 1650000, 'img/san_pham/tinh_yeu/tram_nam_tinh_yeu.jpg\r\n', 60, 0),
(43, 'Ánh Dương', 2, 'Vàng', 'Sản phẩm bao gồm:\r\n-Hướng dương (cành): 1\r\n-Lá huyết dụ : 3', 150000, 'img/san_pham/sinh_nhat/anh_duong.jpg\r\n', 100, 50),
(44, 'Bầu trời trong xanh', 2, 'Xanh', 'Sản phẩm bao gồm:\r\n-Cát tường trắng: 5\r\n-Cúc mẫu đơn xanh dương nhạt DL : 7\r\n-Hồng trắng cồ: 15', 1500000, 'img/san_pham/sinh_nhat/bau_troi_trong_xanh.jpg\r\n', 50, 0),
(45, 'Điều Thân Thương', 2, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm hồng nhạt : 3\r\n-Hoa Sao tím: 1\r\n-Hồng đỏ Ecuador DL: 1', 150000, 'img/san_pham/sinh_nhat/dieu_than_thuong.jpg\r\n', 60, 20),
(46, 'Gặp Gỡ', 2, 'Hồng', 'Sản phẩm bao gồm:\r\n-Hoa baby : 0.5\r\n-Pink OHara: 1', 150000, 'img/san_pham/sinh_nhat/gap_go.jpg\r\n', 50, 0),
(47, 'My Sun', 2, 'Vàng', 'Sản phẩm bao gồm:\r\n-Hoa Sao tím: 1\r\n-Hướng dương : 1', 200000, 'img/san_pham/sinh_nhat/my_sun.jpg\r\n', 90, 0),
(48, 'Ngày Bên Em', 2, 'Tím', 'Sản phẩm bao gồm:\r\n-Cát tường hồng viền: 5\r\n-Hoa Sao tím: 1\r\n-Mõm sói song hỷ : 10\r\n-Purple Ohara : 15', 1000000, 'img/san_pham/sinh_nhat/ngay_ben_em.jpg\r\n', 50, 0),
(49, 'Take My Hand', 2, 'Trắng,Vàng', 'Sản phẩm bao gồm:\r\n-Cúc rossi trắng: 3\r\n-Hoa sao vàng: 1\r\n-Hồng Pink Mondial : 1', 150000, 'img/san_pham/sinh_nhat/take_my_hand.jpg\r\n', 50, 0),
(50, 'Tình Cờ', 2, 'Tím', 'Sản phẩm bao gồm:\r\n-Hoa thạch thảo tím: 1\r\n-Purple Ohara : 1', 150000, 'img/san_pham/sinh_nhat/tinh_co.jpg\r\n', 60, 0),
(51, 'Warm Hugs', 2, 'Trắng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn trắng : 5\r\n-Hoa baby : 1\r\n-Hồng shimmer DL: 7', 300000, 'img/san_pham/sinh_nhat/warm_hugs.jpg\r\n', 50, 0),
(52, 'Dynamic', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hồng đỏ Pháp: 25\r\n-Lá bạc : 3', 500000, 'img/san_pham/cuoi/dynamic.jpg\r\n', 100, 0),
(53, 'Everyday With You', 1, 'Xanh', 'Sản phẩm bao gồm:\r\n-Hoa baby : 1\r\n-Hồng trắng cồ: 3', 200000, 'img/san_pham/cuoi/everyday_with_you.jpg\r\n', 50, 20),
(54, 'Gửi Người Tôi Yêu', 1, 'Trắng,Đỏ,Tím', 'Sản phẩm bao gồm:\r\n-Cẩm chướng đơn hồng: 12\r\n-Hoa Sao tím: 2\r\n-Hồng da (50): 20\r\n-Hồng đỏ sa : 13', 850000, 'img/san_pham/cuoi/gui_nguoi_toi_yeu.jpg\r\n', 50, 0),
(55, 'Nắng Hồng', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cẩm chướng chùm hồng nhạt : 10\r\n-Cúc calimero trắng: 5\r\n-Hoa baby : 1\r\n-Hoa thạch thảo tím: 3\r\n-Hồng da: 17', 550000, 'img/san_pham/cuoi/nang_hong.jpg\r\n', 50, 20),
(56, 'Pretty Clouds', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa baby : 4\r\n-Hồng đỏ Pháp: 1', 450000, 'img/san_pham/cuoi/pretty_clouds.jpg\r\n', 50, 50),
(57, 'Priceless Heart', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cúc Tana: 8\r\n-Cát tường hồng viền: 7\r\n-Hồng da: 20\r\n-Hồng da cồ: 15\r\n-Hồng sen mới: 15', 1800000, 'img/san_pham/cuoi/priceless_heart.jpg\r\n', 50, 0),
(58, 'Tình Yêu Đầu', 1, 'Hồng', 'Sản phẩm bao gồm:\r\n-Cát tường trắng: 2\r\n-Hoa baby : 1\r\n-Hồng da: 12\r\n-Hồng trắng nhí: 8', 650000, 'img/san_pham/cuoi/tinh_yeu_dau.jpg\r\n', 50, 0),
(59, 'Trái Tim Yêu Thương', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa baby : 3\r\n-Hồng đỏ sa : 43\r\n-Sen đá lớn: 1', 1550000, 'img/san_pham/cuoi/trai_tim_yeu_thuong.jpg\r\n', 50, 0),
(60, 'Hạnh Phúc Bất Tận', 1, 'Đỏ', 'Sản phẩm bao gồm:\r\n-Hoa hạnh phúc : 3\r\n-Hồng red naomi : 5\r\n-Hồng đỏ sa : 17', 1500000, 'img/san_pham/cuoi/hanh_phuc_bat_tan.jpg\r\n', 50, 0);

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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `fk_chitietdonhang_donhang` (`MaDonHang`),
  ADD KEY `fk_chitietdonhang_sanpham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `fk_danhgia_makhachhang` (`MaKhachHang`),
  ADD KEY `fk_danhgia_masanpham` (`MaSanPham`);

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
  ADD KEY `fk_giaohang_madonhang` (`MaDonHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `TenTaiKhoan` (`TenTaiKhoan`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`MaQuanTriVien`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaThanhToan`),
  ADD KEY `fk_thanhtoan_madonhang` (`MaDonHang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `MaGiaoHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `MaQuanTriVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `MaThanhToan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `MaDonHang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MaSanPham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `fk_chitietdonhang_donhang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitietdonhang_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_danhgia_makhachhang` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_danhgia_masanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `MaKhachHang` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `fk_giaohang_madonhang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `MaDanhMuc` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmucsanpham` (`MaDanhMuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `fk_thanhtoan_madonhang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
