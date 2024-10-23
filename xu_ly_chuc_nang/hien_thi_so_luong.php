<?php
// Truy vấn để đếm số sản phẩm
$sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $color); // Liên kết tham số
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    // Lấy số lượng sản phẩm
    $row = $result->fetch_assoc();
    echo $row['total']; // Hiển thị số lượng sản phẩm
} else {
    echo "0"; // Nếu không có sản phẩm nào
}

// Đóng kết nối
$stmt->close(); // Đóng statement
$conn->close(); // Đóng kết nối
?>