<?php
session_start();
require_once("database/db_connect.php");

$errors = []; // Mảng để lưu lỗi cho từng trường

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $ten_khach_hang = $_POST['hoten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['diachi'];
    $ten_tai_khoan = $_POST['taikhoan'];
    $mat_khau = $_POST['matkhau'];
    $mat_khau_nhap_lai = $_POST['nhaplaimatkhau'];

    // Kiểm tra xem gmail đã tồn tại hay chưa
    $sql = "SELECT Email FROM KhachHang WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors['email'] = "Email đã tồn tại trong hệ thống";
    } else {
        // Kiểm tra xem số điện thoại đã tồn tại hay chưa
        $sql = "SELECT SoDienThoai FROM KhachHang WHERE SoDienThoai = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $sdt);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['sdt'] = "Số điện thoại đã tồn tại trong hệ thống";
        } else {
            // Kiểm tra xem tên tài khoản đã tồn tại hay chưa
            $sql = "SELECT TenTaiKhoan FROM KhachHang WHERE TenTaiKhoan = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $ten_tai_khoan);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errors['taikhoan'] = "Tên đăng nhập đã tồn tại trong hệ thống";
            } else {
                // Kiểm tra lỗi
                if ($mat_khau != $mat_khau_nhap_lai) {
                    $errors['nhaplaimatkhau'] = "Mật khẩu không trùng nhau, mời bạn nhập lại";
                }
            }
        }
    }
    // Tìm mã khách hàng mới
    $sql = "SELECT MAX(MaKhachHang) AS MaxMaKhachHang FROM KhachHang";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ma_khach_hang = $row['MaxMaKhachHang'] + 1;
    } else {
        // Nếu chưa có khách hàng nào, bắt đầu với mã 1
        $ma_khach_hang = 1;
    }


    // Nếu không có lỗi thì tiến hành thêm người dùng vào DB
    if (empty($errors)) {
        // Thêm người dùng mới vào cơ sở dữ liệu với mã khách hàng mới
        $sql = "INSERT INTO KhachHang (MaKhachHang, TenKhachHang, Email, SoDienThoai, DiaChi, TenTaiKhoan, MatKhau) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issssss', $ma_khach_hang, $ten_khach_hang, $email, $sdt, $dia_chi, $ten_tai_khoan, $mat_khau);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Đăng ký thành công!";

            //Tìm mã đơn hàng trống từ 0 đến 999
        $ma_don_hang_moi = null;
        for ($i = 0; $i <= 999; $i++) {
            // Kiểm tra xem mã đơn hàng $i đã tồn tại chưa
            $sql_kiem_tra = "SELECT MaDonHang FROM donhang WHERE MaDonHang = ?";
            $stmt_kiem_tra = $conn->prepare($sql_kiem_tra);
            $stmt_kiem_tra->bind_param("i", $i);
            $stmt_kiem_tra->execute();
            $result = $stmt_kiem_tra->get_result();

            if ($result->num_rows == 0) {
                // Nếu mã đơn hàng $i chưa tồn tại, sử dụng mã này
                $ma_don_hang_moi = $i;
                $stmt_kiem_tra->close();
                break;
            }

            $stmt_kiem_tra->close();
        }

        // Kiểm tra nếu đã tìm được mã đơn hàng mới
        $tonggt = 0;
        $trang_thai = 0; // Trạng thái mới mặc định là 0
        $ngay_dat_hang = date("Y-m-d H:i:s"); // Ngày đặt hàng hiện tại

        if ($ma_don_hang_moi !== null) {
            // Câu lệnh SQL để thêm đơn hàng mới
            $sql_tao_don_hang = "
            INSERT INTO donhang (MaDonHang, MaKhachHang, NgayDatHang, TongGiaTri, TrangThai) 
            VALUES (?, ?, ?, ?, ?)";

            // Chuẩn bị và thực thi câu lệnh
            $stmt = $conn->prepare($sql_tao_don_hang);
            $stmt->bind_param("iissi", $ma_don_hang_moi, $ma_khach_hang, $ngay_dat_hang, $tonggt, $trang_thai);
            $stmt->execute();
            $stmt->close();
        }

            header('location:dangky.php');
            exit();
        } else {
            $errors['general'] = "Đã xảy ra lỗi trong quá trình đăng ký!";
        }
    } else {
        // Lưu thông báo lỗi vào phiên để hiển thị trên form
        $_SESSION['errors'] = $errors;
        header('location:dangky.php'); // Quay lại trang đăng ký
        exit();
    }
}

// Đóng kết nối
$conn->close();
