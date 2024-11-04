<?php require_once ('header.php');?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Sản phẩm</a>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
            <?php
            require_once('database/db_connect.php'); // Kết nối cơ sở dữ liệu

            // Kiểm tra xem tên sản phẩm có được truyền qua URL không
            if (isset($_GET['productName'])) {
                $productName = urldecode($_GET['productName']);

                // Truy vấn sản phẩm dựa trên tên sản phẩm
                $sql = "SELECT MaSanPham, TenSanPham, Gia, HinhAnh, MoTa FROM sanpham WHERE TenSanPham = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $productName);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                } else {
                    echo "Không tìm thấy sản phẩm.";
                }
            } else {
                echo "Không có sản phẩm nào được chọn.";
            }
            ?>

    <!-- Shop Detail Start -->
    <?php if (!empty($product)): ?>
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?php echo $product['HinhAnh']; ?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo htmlspecialchars($product['TenSanPham']); ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><?php echo number_format($product['Gia'], 0, ',', '.') . " đ"; ?></h3>
                    <?php
                    // Thay thế để thêm ngắt dòng trước mỗi dấu gạch ngang và bỏ khoảng trống dư thừa
                    $moTaFormatted = nl2br(str_replace('- ', '<br>- ', htmlspecialchars($product['MoTa'])));
                    ?>
                    <p class="mb-4" style="color: red;"><?php echo $moTaFormatted; ?></p>
                    <?php endif; ?>

                    <form>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" id="soluong_sp" name="soluong_sp" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="addToCart('<?php echo $product['TenSanPham']; ?>','<?php echo $product['MaSanPham']; ?>','<?php echo $product['Gia']; ?>')" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng
                        </a>
                    </div>
                    </form>

                    <div class="d-flex pt-2 mb-3">
                        <strong class="text-dark mr-2">Chia sẻ:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                    <h4 align="center" class="blink color-change" style="margin-top: 50px;">Free shipping mọi đơn hàng trong nội thành Hà Nội</h4>
                    <h3 align="center" class="blink color-change" style="margin-top: 20px;">ĐẶT HÀNG NGAY NHÉ</h3>

                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Cách bảo quản</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Ưu đãi</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h3 class="mb-3" style="color: #DC143C; font-weight: bold;">Cách Bảo Quản</h3>
                            <p style="color: #DC143C; font-weight: bold;">* Đối với bó hoa không bọc chân nước: bạn cắm chân hoa vào bình nước sạch, tối đa 2 ngày đổ nước cũ trong bình và thay nước mới.</p>
                            <p style="color: #DC143C; font-weight: bold;">* Đối với bó hoa đã bọc sẵn chân nước: bó hoa có thể đứng được và bạn chỉ cần đổ nước trực tiếp vào chính giữa bó hoa. Tối đa 2 ngày đổ nước cũ trong bó hoa và thay nước mới.</p>
                            <p style="color: #DC143C; font-weight: bold;">Lưu ý :</p>
                            <p style="color: #DC143C; font-weight: bold;">* Tất cả các sản phẩm để nơi thoáng mát, nhiệt độ lý tưởng nhất là 22-24°C.</p>
                            <p style="color: #DC143C; font-weight: bold;">* Tránh để hoa gần các thiết bị điện tử như tivi, tủ lạnh,... tránh ánh nắng trực tiếp từ mặt trời.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h3 class="mb-3" style="color: #DC143C; font-weight: bold;">Ưu Đãi Đặc Biệt Tại CDT Flower</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            1. Tặng banner hoặc thiệp (trị giá 20.000đ - 50.000đ) miễn phí
                                        </li>
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            2. Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE lần thứ 2, 5% cho đơn hàng Bạn tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn tạo ONLINE lần thứ 12.
                                        </li>
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            3. Miễn phí giao khu vực nội thành
                                        </li>
                                    </ul> 
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            4. Giao gấp trong vòng 2 giờ
                                        </li>
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            5. Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng
                                        </li>
                                        <li class="list-group-item px-0" style="color: #DC143C; font-weight: bold;">
                                            6. Cam kết hoa tươi trên 3 ngày
                                        </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <?php // CÓ THỂ BẠN SẼ THÍCH
        require_once('database/db_connect.php');
        
        // Tạo mảng để lưu dữ liệu
        $products = [];

        // Lấy dữ liệu từ câu truy vấn và lưu vào mảng
        $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 8";
        $ketqua = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($ketqua)) {
            $products[] = $row;
        }

        
    ?>

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có thể bạn sẽ thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                    <?php  // VÒNG LẶP IN TỪNG THÔNG TIN SẢN PHẨM NGẪU NHIÊN
                        for ($i=0; $i < count($products); $i++) { 
                            // code...
                    ?>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo $products[$i][6]; ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="javascript:void(0)" onclick="addToCart('<?php echo $products[$i][1]; ?>', '<?php echo $products[$i][0]; ?>', '<?php echo $products[$i][5]; ?>')"><i class="fa fa-shopping-cart"></i></a>

                                <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" onclick="addToLove('<?php echo $products[$i][1]; ?>')"><i class="far fa-heart"></i></a>

                                <a class="btn btn-outline-dark btn-square" href="detail.php?productName=<?php echo urlencode($products[$i][1]); ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="detail.php?productName=<?php echo urlencode($products[$i][1]); ?>"><?php echo $products[$i][1]; 
                            // Kiểm tra và hiển thị giảm giá nếu có
                            if (!empty($products[$i][8]) && $products[$i][8] > 0) {
                                echo '<span class="discount-badge"> (' . $products[$i][8] . '% OFF)</span>';
                            }
                            ?>    
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo number_format($products[$i][5], 0, ',', '.') . " đ"; ?></h5><!--product[5] là trường Gia-->
                            <h6 class="text-muted ml-2"><del>
                                <?php
                                    // Kiểm tra giảm giá và hiển thị giá chưa giảm nếu có
                                    if ($products[$i][8] == 20) { //product[8] là GiamGia
                                        $giachuagiam = $products[$i][5] / 0.8; // Tính giá với giảm giá 20%, product[5] là trường Gia
                                        echo "<del>" . number_format($giachuagiam, 0, ',', '.') . " đ</del>";
                                    } elseif ($products[$i][8] == 50) {
                                        $giachuagiam = $products[$i][5] * 2; // Tính giá với giảm giá 50%
                                        echo "<del>" . number_format($giachuagiam, 0, ',', '.') . " đ</del>";
                                    }
                                    ?>
                                </del></h6>
                            </div>
                        </div>
                    </div>
                    
                    <?php } // KẾT THÚC THÔNG TIN 1 SẢN PHẨM + VÒNG LẶP ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <style>
        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }
        .blink {
            animation: blink 0.4s infinite;
        }
    </style>

    <script>
        function getRandomColor() {
            const letters = "0123456789ABCDEF";
            let color = "#";
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function changeColor() {
            const elements = document.querySelectorAll('.color-change');
            elements.forEach((element) => {
                element.style.color = getRandomColor();
            });
        }

        // Đổi màu sau mỗi 500ms
        setInterval(changeColor, 500);
    </script>
    <style>
        .discount-badge {
            color: red; /* Đổi màu sang đỏ */
            animation: blink 0.5s step-start infinite; /* Hiệu ứng nhấp nháy */
        }

        /* Hiệu ứng nhấp nháy */
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>

    <div id="toast" class="toast" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
        <div class="toast-body">
            <span id="toast-message"></span>
        </div>
    </div>

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
    <script src="js/shop.js"></script>
    <script src="cart_functions/add_to_cart.js"></script>
</body>

</html>