<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banhoa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ yêu cầu POST
$maSanPham = isset($_POST['maSanPham']) ? intval($_POST['maSanPham']) : null;
$giaSP = isset($_POST['giaSP']) ? intval($_POST['giaSP']) : null;

$soLuong = 1;
$maDonHang = 1;

// Thực hiện truy vấn SQL để thêm vào bảng chitietdonhang
$insert_query = "INSERT INTO chitietdonhang (MaDonHang, MaSanPham, SoLuong, Gia)
                 VALUES (1, '$maSanPham', 1, '$giaSP')";

if ($conn->query($insert_query) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
