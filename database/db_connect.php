<?php
$servername = "localhost"; // hoặc địa chỉ máy chủ của bạn
$username = "root"; // tên người dùng của bạn
$password = ""; // mật khẩu của bạn
$dbname = "banhoa"; // tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
