<?php
session_start(); // Bắt đầu session

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['makhachhang'])) {
    echo "not_logged_in";
    exit; // Kết thúc script nếu người dùng chưa đăng nhập
}
$ma_khach_hang = $_SESSION['makhachhang'];
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
$soLuong = isset($_POST['soluong_sp']) ? intval($_POST['soluong_sp']) : 1;
// $soLuong = 1; // Số lượng tăng thêm

// Kiểm tra dữ liệu hợp lệ
if ($maSanPham && $giaSP) {
    // Giả sử MaDonHang được lấy từ session hoặc một biến cố định ở đây
    // Truy vấn để lấy mã đơn hàng chưa thanh toán của khách hàng
                $sql_donhang = "
                SELECT MaDonHang FROM donhang WHERE MaKhachHang = ? AND TrangThai = 0 LIMIT 1;";

                $stmt_donhang = $conn->prepare($sql_donhang);
                $stmt_donhang->bind_param("i", $ma_khach_hang);
                $stmt_donhang->execute();
                $stmt_donhang->bind_result($maDonHang);
                $stmt_donhang->fetch();
                $stmt_donhang->close();

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $check_query = "SELECT SoLuong FROM chitietdonhang WHERE MaDonHang = ? AND MaSanPham = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $maDonHang, $maSanPham);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Sản phẩm đã tồn tại, cập nhật số lượng
        $stmt->bind_result($existingQuantity);
        $stmt->fetch();
        $newQuantity = $existingQuantity + $soLuong;

        // Cập nhật số lượng trong bảng
        $update_query = "UPDATE chitietdonhang SET SoLuong = ? WHERE MaDonHang = ? AND MaSanPham = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("iii", $newQuantity, $maDonHang, $maSanPham);

        if ($update_stmt->execute()) {
            echo "success"; // Cập nhật thành công
        } else {
            echo "error"; // Lỗi khi cập nhật
        }

        $update_stmt->close();
    } else {
        // Sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $insert_query = "INSERT INTO chitietdonhang (MaDonHang, MaSanPham, SoLuong, Gia) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("iiii", $maDonHang, $maSanPham, $soLuong, $giaSP);

        if ($insert_stmt->execute()) {
            echo "success"; // Thêm mới thành công
        } else {
            echo "error"; // Lỗi khi thêm mới
        }

        $insert_stmt->close();
    }

    $stmt->close();
} else {
    echo "error"; // Trường hợp dữ liệu không hợp lệ
}

$conn->close();
?>
