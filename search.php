<?php
// Kết nối đến cơ sở dữ liệu
require_once("database/db_connect.php");

$query = isset($_GET['query']) ? $_GET['query'] : '';
$search = mysqli_real_escape_string($conn, $query);

// Truy vấn sản phẩm có tên chứa từ khóa tìm kiếm, thêm các trường HinhAnh và Gia
$sql = "SELECT TenSanPham, HinhAnh, Gia FROM sanpham WHERE TenSanPham LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

// Kiểm tra lỗi truy vấn
if (!$result) {
    echo json_encode(['error' => 'Lỗi truy vấn: ' . mysqli_error($conn)]);
    exit();
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// Trả về dữ liệu ở định dạng JSON
header('Content-Type: application/json'); // Đặt loại nội dung là JSON
echo json_encode($products);
?>
