<?php
session_start(); // Khởi động phiên làm việc

require_once("database/db_connect.php"); // Kết nối đến cơ sở dữ liệu

if (isset($_GET['MaSanPham'])) {
    $MaSanPham = mysqli_real_escape_string($conn, $_GET['MaSanPham']);
    $Ma_KH = $_SESSION['makhachhang']; // Lấy ID người dùng từ phiên làm việc

    // Truy vấn để xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM yeuthich
            WHERE MaSanPham = '$MaSanPham' AND MaKhachHang = '$Ma_KH'"; // Thay đổi tên bảng nếu cần
    if (mysqli_query($conn, $sql)) {
        // Xóa thành công, chuyển hướng trở lại giỏ hàng
        header("Location: shop.php"); // Thay đổi đường dẫn đến trang giỏ hàng
        exit();
    } else {
        // Xử lý lỗi nếu cần
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
