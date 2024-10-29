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

    // Nếu không có lỗi thì tiến hành thêm người dùng vào DB
    if (empty($errors)) {
        $sql = "INSERT INTO KhachHang (TenKhachHang, Email, SoDienThoai, DiaChi, TenTaiKhoan, MatKhau) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $ten_khach_hang, $email, $sdt, $dia_chi, $ten_tai_khoan, $mat_khau);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Đăng ký thành công!";
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
