<?php
// Kết nối đến cơ sở dữ liệu
require_once('database_connect/db_connect.php');

// Danh sách màu sắc và biến để lưu số lượng
$colors = [
    'Hồng' => 0,
    'Trắng' => 0,
    'Đỏ' => 0,
    'Xanh' => 0,
    'Vàng' => 0,
    'Tím' => 0,
    'Cam' => 0,
];

// Thực hiện truy vấn COUNT(*) cho từng màu
foreach ($colors as $color => &$count) {
    $sql = "SELECT COUNT(*) as total FROM sanpham WHERE Mau LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeColor = "%" . $color . "%"; // Thêm dấu % để sử dụng LIKE
    $stmt->bind_param("s", $likeColor);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $count = $row['total']; // Lưu số lượng vào biến
    }
}
// Đóng kết nối
$conn->close();
?>

