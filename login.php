<?php
session_start(); 
require_once("database/db_connect.php"); // Kết nối với database
$errors = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    // Kiểm tra nếu mật khẩu rỗng
    //if (empty($matkhau)) {
      //  $errors['matkhau'] = "Mật khẩu không được để trống.";
    //}
        $sql = "SELECT TenTaiKhoan, MatKhau FROM KhachHang WHERE TenTaiKhoan = ? AND MatKhau = ?";//lệnh sql
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $taikhoan, $matkhau);//gán 2 biến kiểu string(s) cho $taikhoan và $matkhau
        // Thực thi truy vấn
        $stmt->execute();
        
        // Lấy kết quả
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Thực hiện đăng nhập thành công
            $_SESSION['tentaikhoan'] = $taikhoan; 
            header('location:index.php'); 
            exit();
        } else {
            // Thiết lập thông báo lỗi vào phiên
            $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng.";
            header('location:dangnhap.php'); // Chuyển hướng về trang đăng nhập
            exit();
        }        
}

// Đóng kết nối
$conn->close();
?>
