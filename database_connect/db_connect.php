<?php
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên đăng nhập của bạn
$password = ""; // Mật khẩu của bạn
$dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
