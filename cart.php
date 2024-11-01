<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CDT Flower - Thế giới hoa tươi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/icon_flower.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <?php require_once ('header.php');?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Thanh toán</a>
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Loại bỏ</th>
                        </tr>
                    </thead>
                    
                    <!-- //du lieu gio hang -->
                    <tbody class="align-middle">
                        <?php
                        // Đảm bảo kết nối cơ sở dữ liệu
                        require_once("database/db_connect.php");

                        // Lấy `user_id` từ session hoặc các nguồn khác tùy theo thiết lập của bạn
                        if (isset($_SESSION['makhachhang'])) {
                            $Ma_KH = $_SESSION['makhachhang'];
                        } else {
                            $Ma_KH = "100";
                        }

                        // Truy vấn để lấy chi tiết sản phẩm trong giỏ hàng cho user cụ thể, liên kết bằng `MaSanPham`
                        $sql = "SELECT c.MaSanPham, s.TenSanPham, c.Gia, c.SoLuong
                        FROM chitietdonhang AS c
                        JOIN sanpham AS s ON c.MaSanPham = s.MaSanPham
                        JOIN donhang AS d ON c.MaDonHang = d.MaDonHang
                        WHERE d.MaKhachHang = '$Ma_KH' AND d.TrangThai = 0"; // Điều chỉnh theo cấu trúc bảng của bạn

                                $result = mysqli_query($conn, $sql);

                        // Khởi tạo tổng tiền hàng
                                $totalAmount = 0;

                        // Hiển thị sản phẩm trong giỏ hàng
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $productTotal = $row['Gia'] * $row['SoLuong']; // Tính tổng cho từng sản phẩm
                                        $totalAmount += $productTotal; // Cộng dồn vào tổng tiền hàng
                                        echo "<tr>";
                                        echo "<td class='align-middle'>{$row['TenSanPham']}</td>";
                                        echo "<td class='align-middle'>" . number_format($row['Gia'], 0, ',', '.') . " đ</td>";

                                // Thêm ô nhập số lượng với nút + và -
                                        echo "<td class='align-middle'>
                                        <div class='input-group quantity mx-auto' style='width: 100px;'>
                                        <div class='input-group-btn'>
                                        <button class='btn btn-sm btn-primary btn-minus' onclick='updateQuantity(\"minus\", {$row['MaSanPham']})'>
                                        <i class='fa fa-minus'></i>
                                        </button>
                                        </div>
                                        <input type='text' id='quantity_{$row['MaSanPham']}' class='form-control form-control-sm bg-secondary border-0 text-center' value='{$row['SoLuong']}' readonly>
                                        <div class='input-group-btn'>
                                        <button class='btn btn-sm btn-primary btn-plus' onclick='updateQuantity(\"plus\", {$row['MaSanPham']})'>
                                        <i class='fa fa-plus'></i>
                                        </button>
                                        </div>
                                        </div>
                                        </td>";

                                // Hiển thị tổng giá cho sản phẩm này
                                        echo "<td class='align-middle'>" . number_format($row['Gia'] * $row['SoLuong'], 0, ',', '.') . " đ</td>";
                                        echo "<td class='align-middle'>
                                                <button class='btn btn-sm btn-danger' onclick='removeFromCart({$row['MaSanPham']})'>
                                                    <i class='fa fa-times'></i>
                                                </button>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Giỏ hàng trống</td></tr>";
                                }
                        // Thêm phần hiển thị tổng tiền hàng và tổng thanh toán
                        $shippingFee = 100000; // Giả sử phí giao hàng là 10 đ
                        $totalPayment = $totalAmount + $shippingFee; // Tính tổng thanh toán
                        ?>
                    </tbody>


                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Mã giảm giá</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền hàng</h6>
                            <h6><?php echo number_format($totalAmount, 0, ',', '.') . " đ"; ?></h6> <!-- Hiển thị tổng tiền hàng -->
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí giao hàng</h6>
                            <h6 class="font-weight-medium"><?php echo number_format($shippingFee, 0, ',', '.') . " đ"; ?></h6> <!-- Hiển thị phí giao hàng -->
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng thanh toán</h5>
                            <h5><?php echo number_format($totalPayment, 0, ',', '.') . " đ"; ?></h5> <!-- Hiển thị tổng thanh toán -->
                        </div>
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="checkout.php">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>
        function updateQuantity(action, productId) {
            const quantityInput = document.getElementById(`quantity_${productId}`);
            let quantity = parseInt(quantityInput.value);

            if (action === "minus" && quantity > 1) {
                quantity--;
            } else if (action === "plus") {
                quantity++;
            }

                // Cập nhật số lượng hiển thị
            quantityInput.value = quantity;

                // Gửi yêu cầu cập nhật số lượng lên server
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "error") {
                        alert(response.message);
                    } else {
                            // Nếu thành công, có thể cập nhật lại tổng giá hoặc các thông tin khác
                            location.reload(); // Tải lại trang để cập nhật giỏ hàng
                        }
                    } else {
                        alert("Có lỗi xảy ra, vui lòng thử lại.");
                    }
                };
                xhr.send(`productId=${productId}&quantity=${quantity}`);
            }

        function removeFromCart(productId) {
                if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?")) {
                    // Gửi yêu cầu đến PHP để xóa sản phẩm
                    window.location.href = 'remove_from_cart.php?MaSanPham=' + productId;
                }
        }
    </script>


        <?php require_once ('footer.php');?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

    </html>