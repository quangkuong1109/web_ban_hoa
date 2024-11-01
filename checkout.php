
<?php include 'header.php'; ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Thanh toán</a>
                    <span class="breadcrumb-item active">Tiến hành thanh toán</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="container-fluid">
        <form method="post" action="" class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin chi tiết</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row" id="personal-info">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" name="ten" placeholder="John" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Họ</label>
                            <input class="form-control" type="text" name="ho" placeholder="Doe" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="sdt" placeholder="+123 456 789" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ nhận hàng</label>
                            <input class="form-control" type="text" name="diachi" placeholder="Số 218, Lĩnh Nam" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Thành phố</label>
                            <input class="form-control" type="text" name="thanhpho" placeholder="Hà Nội" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quận/Huyện</label>
                            <input class="form-control" type="text" name="quanhuyen" placeholder="Hoàng Mai" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phường/Xã</label>
                            <input class="form-control" type="text" name="phuongxa" placeholder="Vĩnh Hưng" required>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Tặng 1 người bạn</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng đơn hàng</span></h5>
                <?php
                // Kết nối với cơ sở dữ liệu
                require_once("database/db_connect.php");
                $ma_khach_hang = $_SESSION['makhachhang'];

                // Truy vấn để lấy mã đơn hàng chưa thanh toán của khách hàng
                $sql_donhang = "
                SELECT MaDonHang FROM donhang WHERE MaKhachHang = ? AND TrangThai = 0 LIMIT 1;";

                $stmt_donhang = $conn->prepare($sql_donhang);
                $stmt_donhang->bind_param("i", $ma_khach_hang);
                $stmt_donhang->execute();
                $stmt_donhang->bind_result($ma_don_hang);
                $stmt_donhang->fetch();
                $stmt_donhang->close();

                // Truy vấn lấy sản phẩm từ đơn hàng chưa thanh toán của khách hàng
                $sql = "
                SELECT 
                    sp.TenSanPham, 
                    ctdh.SoLuong, 
                    ctdh.Gia,
                    (ctdh.SoLuong * ctdh.Gia) AS ThanhTien
                FROM chitietdonhang AS ctdh
                JOIN sanpham AS sp ON ctdh.MaSanPham = sp.MaSanPham
                JOIN donhang AS d ON ctdh.MaDonHang = d.MaDonHang
                WHERE 
                    d.MaKhachHang = ? 
                    AND d.TrangThai = 0;
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $ma_khach_hang);
                $stmt->execute();
                $result = $stmt->get_result();

                // Tính tổng tiền hàng và phí giao hàng
                $tong_tien_hang = 0;
                $phi_giao_hang = 100000; // Giả sử phí giao hàng cố định
                ?>

                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản phẩm</h6>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <div class="d-flex justify-content-between">
                                <p>
                                    <?php echo $row['TenSanPham']; ?> 
                                    <span style="color: red;">x <?php echo $row['SoLuong']; ?></span>
                                </p>
                                <p><?php echo number_format($row['ThanhTien'], 0, ',', '.') . ' đ'; ?></p>
                            </div>
                            <?php $tong_tien_hang += $row['ThanhTien']; ?>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền hàng</h6>
                            <h6><?php echo number_format($tong_tien_hang, 0, ',', '.') . ' đ'; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí giao hàng</h6>
                            <h6 class="font-weight-medium"><?php echo number_format($phi_giao_hang, 0, ',', '.') . ' đ'; ?></h6>
                        </div>
                    </div>
                    
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng thanh toán</h5>
                            <h5><?php echo number_format($tong_tien_hang + $phi_giao_hang, 0, ',', '.') . ' đ'; ?></h5>
                        </div>
                    </div>
                </div>
                <?php
                // Đóng câu lệnh
                $stmt->close();
                ?>

                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="cod" value="Thanh toán khi nhận hàng" required>
                                <label class="custom-control-label" for="cod">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="Chuyển khoản ngân hàng" required>
                                <label class="custom-control-label" for="banktransfer">Chuyển khoản ngân hàng</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    // Xử lý đơn hàng khi nhấn nút Đặt hàng
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy thông tin từ form
        $ten = $_POST['ten'];
        $ho = $_POST['ho'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $thanhpho = $_POST['thanhpho'];
        $quanhuyen = $_POST['quanhuyen'];
        $phuongxa = $_POST['phuongxa'];
        $phuongthuc_thanhtoan = $_POST['payment'];
        $diachi_full = $diachi . ', ' . $phuongxa . ', ' . $quanhuyen . ', ' . $thanhpho;

        // Tạo các giá trị cần thiết
        $ngay_thanh_toan = date("Y-m-d H:i:s"); // Ngày thanh toán hiện tại

        // Thêm vào bảng thanhtoan
        $sql_thanhtoan = "
        INSERT INTO thanhtoan (MaDonHang, PhuongThucThanhToan, NgayThanhToan, SoTien, TrangThai) 
        VALUES (?, ?, ?, ?, 'Đã Thanh Toán')
        ";

        $stmt_thanhtoan = $conn->prepare($sql_thanhtoan);
        $tong_tien = $tong_tien_hang + $phi_giao_hang; // Tổng số tiền (tiền hàng + phí giao hàng)
        $stmt_thanhtoan->bind_param("issd", $ma_don_hang, $phuongthuc_thanhtoan, $ngay_thanh_toan, $tong_tien);
        $stmt_thanhtoan->execute();

        // Lấy mã thanh toán vừa thêm (ID tự tăng)
        $ma_thanhtoan = $conn->insert_id;

        // Thêm vào bảng giaohang
        $sql_giaohang = "
        INSERT INTO giaohang (MaThanhToan, HoTen, SoDienThoai, Email, DiaChi) 
        VALUES (?, ?, ?, ?, ?)
        ";

        $stmt_giaohang = $conn->prepare($sql_giaohang);
        $ho_ten = $ten . ' ' . $ho;
        $stmt_giaohang->bind_param("issss", $ma_thanhtoan, $ho_ten, $sdt, $email, $diachi_full);
        $stmt_giaohang->execute();

        $sql_update_trang_thai = " UPDATE donhang SET TongGiaTri = ?, TrangThai = ? WHERE MaDonHang = ?";

        $stmt = $conn->prepare($sql_update_trang_thai);
        $trang_thai_moi = 1;
        $stmt->bind_param("iii", $tong_tien, $trang_thai_moi, $ma_don_hang);
        $stmt->execute();

        //Tìm mã đơn hàng trống từ 0 đến 999
        $ma_don_hang_moi = null;
        for ($i = 0; $i <= 999; $i++) {
            // Kiểm tra xem mã đơn hàng $i đã tồn tại chưa
            $sql_kiem_tra = "SELECT MaDonHang FROM donhang WHERE MaDonHang = ?";
            $stmt_kiem_tra = $conn->prepare($sql_kiem_tra);
            $stmt_kiem_tra->bind_param("i", $i);
            $stmt_kiem_tra->execute();
            $result = $stmt_kiem_tra->get_result();

            if ($result->num_rows == 0) {
                // Nếu mã đơn hàng $i chưa tồn tại, sử dụng mã này
                $ma_don_hang_moi = $i;
                $stmt_kiem_tra->close();
                break;
            }

            $stmt_kiem_tra->close();
        }

        // Kiểm tra nếu đã tìm được mã đơn hàng mới
        $tonggt = 0;
        $trang_thai = 0; // Trạng thái mới mặc định là 0
        $ngay_dat_hang = date("Y-m-d H:i:s"); // Ngày đặt hàng hiện tại

        if ($ma_don_hang_moi !== null) {
            // Câu lệnh SQL để thêm đơn hàng mới
            $sql_tao_don_hang = "
            INSERT INTO donhang (MaDonHang, MaKhachHang, NgayDatHang, TongGiaTri, TrangThai) 
            VALUES (?, ?, ?, ?, ?)";

            // Chuẩn bị và thực thi câu lệnh
            $stmt = $conn->prepare($sql_tao_don_hang);
            $stmt->bind_param("iissi", $ma_don_hang_moi, $ma_khach_hang, $ngay_dat_hang, $tonggt, $trang_thai);
            $stmt->execute();
            $stmt->close();

        }

        //Đóng câu lệnh
        $stmt_thanhtoan->close();
        $stmt_giaohang->close();

        // Thông báo thành công
        echo "<script>alert('Đặt hàng thành công!'); window.location.href='index.php';</script>";
    }

    // Đóng kết nối
    $conn->close();
    ?>


    <!-- Checkout End -->

    <?php require_once('footer.php') ?>

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