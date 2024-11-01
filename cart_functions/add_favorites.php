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

// Kiểm tra dữ liệu hợp lệ
if ($maSanPham) {
    // Kiểm tra xem sản phẩm đã tồn tại trong danh mục yêu thích chưa
    $check_query = "SELECT * FROM yeuthich WHERE MaKhachHang = ? AND MaSanPham = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $ma_khach_hang, $maSanPham);
    $stmt->execute();
    $stmt->store_result();

    // Kiểm tra nếu sản phẩm đã có trong danh sách yêu thích
    if ($stmt->num_rows > 0) {
        echo "product_exists"; // Sản phẩm đã tồn tại trong danh sách yêu thích
    } else {
        // Thêm sản phẩm vào danh sách yêu thích
        $insert_query = "INSERT INTO yeuthich (MaKhachHang, MaSanPham) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_query);

        if (!$insert_stmt) {
            echo "prepare_failed"; // Kiểm tra nếu chuẩn bị truy vấn thất bại
        }

        $insert_stmt->bind_param("ii", $ma_khach_hang, $maSanPham);

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
