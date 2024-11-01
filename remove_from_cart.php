<?php
session_start(); // Khởi động phiên làm việc

require_once("database/db_connect.php"); // Kết nối đến cơ sở dữ liệu

if (isset($_GET['MaSanPham'])) {
    $maSanPham = mysqli_real_escape_string($conn, $_GET['MaSanPham']);
    $user_id = $_SESSION['makhachhang']; // Lấy ID người dùng từ phiên làm việc

    // Truy vấn để xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE c
            FROM chitietdonhang AS c
            JOIN donhang AS d ON c.MaDonHang = d.MaDonHang
            WHERE c.MaSanPham = '$maSanPham' AND d.MaKhachHang = '$Ma_KH';"; // Thay đổi tên bảng nếu cần
    if (mysqli_query($conn, $sql)) {
        // Xóa thành công, chuyển hướng trở lại giỏ hàng
        header("Location: cart.php"); // Thay đổi đường dẫn đến trang giỏ hàng
        exit();
    } else {
        // Xử lý lỗi nếu cần
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
