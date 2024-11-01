<?php
require_once("database/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    if ($productId && $quantity > 0) {
        $sql = "UPDATE chitietdonhang SET SoLuong = ? WHERE MaSanPham = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $quantity, $productId);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Không thể cập nhật giỏ hàng."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Dữ liệu không hợp lệ."]);
    }
}
?>
