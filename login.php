<?php
session_start(); 
require_once("database/db_connect.php"); // Kết nối với database
$errors = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    // Truy vấn lấy tên tài khoản, mật khẩu và tên người dùng
    $sql = "SELECT TenTaiKhoan, MatKhau, TenKhachHang FROM KhachHang WHERE TenTaiKhoan = ?"; // Không cần kiểm tra mật khẩu ở đây
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $taikhoan);
    
    // Thực thi truy vấn
    $stmt->execute();
    
    // Lấy kết quả
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Lấy thông tin người dùng
        // Kiểm tra mật khẩu
        if ($matkhau === $user['MatKhau']) { // So sánh mật khẩu
            // Đăng nhập thành công, lưu tên người dùng vào session
            $_SESSION['tentaikhoan'] = $user['TenTaiKhoan'];
            $_SESSION['tennguoidung'] = $user['TenKhachHang']; // Lưu tên người dùng
            header('location:index.php'); 
            exit();
        } else {
            // Thiết lập thông báo lỗi vào phiên
            $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng.";
            header('location:dangnhap.php'); // Chuyển hướng về trang đăng nhập
            exit();
        }
    } else {
        // Tên tài khoản không tồn tại
        $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng.";
        header('location:dangnhap.php'); // Chuyển hướng về trang đăng nhập
        exit();
    }        
}

// Đóng kết nối
$conn->close();
?>
