<?php require_once('header.php'); ?>

<!-- Hiệu ứng cho icon phía trên chủ đề -->
<style type="text/css">
    .xoay {
        transition: transform 0.5s;
        /* Thời gian xoay khi hover */
    }

    .xoay:hover {
        transform: rotateY(180deg);
        /* Xoay 180 độ theo trục dọc */
    }
</style>

<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/anh_for_web/flower_to.webp" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Hoa Tươi</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tất cả những bó hoa tươi nhất sẽ được giao đến tận tay khách hàng</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Mua sắm ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/anh_for_web/flower_carousel_2.webp" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Phục vụ khách hàng một cách tận tâm nhất</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Với phương châm "Khách hàng là thượng đế",chúng tôi đảm bảo khách sẽ có một trải nghiệm tốt nhất tại cửa hàng của chúng tôi</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Mua sắm ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/anh_for_web/flower_carousel_3.webp" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Giao hàng nhanh chóng</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Với đội ngũ nhân viên giao hàng nhanh chóng,quý khách sẽ được nhận hàng một cách nhanh chóng</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Mua sắm ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/anh_for_web/giam20.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm 20%</h6>
                    <h3 class="text-white mb-3">Ưu đãi đặc biệt</h3>
                    <a href="shop.php?discount=20" class="btn btn-primary">Xem ngay</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/anh_for_web/giam50.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm 50%</h6>
                    <h3 class="text-white mb-3">Ưu đãi khủng</h3>
                    <a href="shop.php?discount=50" class="btn btn-primary">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="xoay fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Chất lượng cao</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="xoay fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Giao hàng miễn phí </h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="xoay fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Đổi trả nhanh chóng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="xoay fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<?php
require_once('database/db_connect.php');

// Mảng chứa các danh mục và mã danh mục tương ứng
$danhmuc = [
    ["id" => 1, "name" => "Hoa cưới", "img" => "img/chude/cuoi.jpg"],
    ["id" => 2, "name" => "Hoa sinh nhật", "img" => "img/chude/sinhnhat.jpg"],
    ["id" => 3, "name" => "Hoa tình yêu", "img" => "img/chude/tinhyeu.jpg"],
    ["id" => 8, "name" => "Hoa chia buồn", "img" => "img/chude/chiabuon.jpg"],
    ["id" => 4, "name" => "Hoa tốt nghiệp", "img" => "img/chude/totnghiep.jpg"],
    ["id" => 5, "name" => "Hoa khai trương", "img" => "img/chude/khaitruong.jpg"],
    ["id" => 6, "name" => "Hoa chúc sức khỏe", "img" => "img/chude/chucsuckhoe.jpg"],
    ["id" => 7, "name" => "Hoa cảm ơn", "img" => "img/chude/camon.jpg"],
];
?>

<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Chủ đề</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
        foreach ($danhmuc as $madanhmuc) {//chạy vòng lặp
            $sql = "SELECT count(*) as tong FROM sanpham WHERE MaDanhMuc = ?";//lấy biến đếm sản phẩm, lưu thành tổng với điều kiện mã danh mục
            $stmt = mysqli_prepare($conn, $sql);//tạo câu lệnh chuẩn bị
            mysqli_stmt_bind_param($stmt, "i", $madanhmuc["id"]);//gán giá trị cho mã danh mục["id"] theo kiểu int(i)
            mysqli_stmt_execute($stmt);//thực thi lệnh truy vấn
            mysqli_stmt_bind_result($stmt, $tong);//gán kết quả của stmt cho tong
            mysqli_stmt_fetch($stmt);//lấy dữ liệu từ truy vấn và đưa vào biến tong
            mysqli_stmt_close($stmt);//đóng câu lệnh
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop.php?theme=<?php echo urlencode($madanhmuc['name']); ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4 border-black">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?php echo $madanhmuc["img"]; ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $madanhmuc["name"]; ?></h6>
                            <small class="text-body"><?php echo $tong; ?> sản phẩm</small>
                        </div>
                    </div>
                </a>
            </div>
        <?php }//kết thúc vòng lặp ?>
    </div>
</div>

<!-- Categories End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Sản phẩm ngẫu nhiên</span>
    </h2>
    <div class="row px-xl-5">
        <?php
        require_once('database/db_connect.php'); // kết nối csdl
        
        // Tạo mảng để lưu dữ liệu
        $products = [];

        // Lấy dữ liệu từ câu truy vấn và lưu vào mảng
        $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 8";
        $ketqua = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($ketqua)) {//chạy các dòng dữ liệu từ $ketqua để lưu vào mảng product
            $products[] = $row;
        }

        // Sử dụng vòng lặp for để duyệt qua các phần tử trong mảng $products
        for ($i = 0; $i < count($products); $i++) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 border-black">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo $products[$i][6]; ?>" alt=""><!--product[6] là trường HinhAnh-->
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="javascript:void(0)" onclick="addToCart('<?php echo $products[$i][1]; ?>', '<?php echo $products[$i][0]; ?>', '<?php echo $products[$i][5]; ?>')"><i class="fa fa-shopping-cart"></i></a>

                            <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" onclick="addToFavorites('<?php echo $products[$i][1]; ?>', '<?php echo $products[$i][0]; ?>')"><i class="fa fa-heart"></i>
                            </a>

                            <a class="btn btn-outline-dark btn-square" href="detail.php?productName=<?php echo urlencode($products[$i][1]); ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="detail.php?productName=<?php echo urlencode($products[$i][1]); ?>">
                            <?php echo $products[$i][1]; 
                            // Kiểm tra và hiển thị giảm giá nếu có
                            if (!empty($products[$i][8]) && $products[$i][8] > 0) {
                                echo '<span class="discount-badge"> (' . $products[$i][8] . '% OFF)</span>';
                            }
                            ?>
                        </a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo number_format($products[$i][5], 0, ',', '.') . " đ"; ?></h5><!--product[5] là trường Gia-->

                            <!-- 0 là 0 chỉ định số thập phân
                            , dùng nếu là số thập phân
                            . dùng để chia phần nghìn số -->
                            <h6 class="text-muted ml-2"><del>
                                <?php
                                    // Kiểm tra giảm giá và hiển thị giá chưa giảm nếu có
                                        if ($products[$i][8] != 0) {
                                            $giachuagiam = $products[$i][5] / (1 - ($products[$i][8] / 100)); // Tính giá với giảm giá
                                            echo "<del>" . number_format($giachuagiam, 0, ',', '.') . " đ</del>";
                                        }
                                    ?>
                                </del></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="toast" class="toast" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
        <div class="toast-body">
            <span id="toast-message"></span>
        </div>
    </div>


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/vuonhoa1.jpg" alt="">
                    <div class="offer-text">
                        <h5 class="text-white">Với phương châm</h5>
                        <h3 class="text-white mb-3">"Mang sắc hoa tới từng khoảnh khắc"</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/vuonhoa2.jpg" alt="">
                    <div class="offer-text">
                        <h5 class="text-white">Mang ý nghĩa</h5>
                        <h3 class="text-white mb-3">"Nơi hạnh phúc bắt đầu từ những bông hoa!"</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4 border-black">
                        <img src="img/dai_ly/vendor1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4 border-black">
                        <img src="img/dai_ly/vendor2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4 border-black">
                        <img src="img/dai_ly/vendor3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4 border-black">
                        <img src="img/dai_ly/vendor4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        .border-black {
        border: 2px solid #DDDDDD; /* Thay đổi độ dày và màu viền tại đây */
        border-radius: 5px; /* Tùy chọn: làm tròn các góc của viền */
        }
    </style>

    <!-- Vendor End -->

    <?php include 'footer.php'; ?>

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
    <script src="cart_functions/add_to_cart.js"></script>
    <script src="cart_functions/add_favorites.js"></script>
</body>

</html>