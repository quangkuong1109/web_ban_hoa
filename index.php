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
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua sắm ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/anh_for_web/flower_carousel_2.webp" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Phục vụ khách hàng một cách tận tâm nhất</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Với phương châm "Khách hàng là thượng đế",chúng tôi đảm bảo khách sẽ có một trải nghiệm tốt nhất tại cửa hàng của chúng tôi</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua sắm ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/anh_for_web/flower_carousel_3.webp" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Giao hàng nhanh chóng</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Với đội ngũ nhân viên giao hàng nhanh chóng,quý khách sẽ được nhận hàng một cách nhanh chóng</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua sắm ngay</a>
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
                    <a href="" class="btn btn-primary">Xem ngay</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/anh_for_web/giam50.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm 50%</h6>
                    <h3 class="text-white mb-3">Ưu đãi khủng</h3>
                    <a href="" class="btn btn-primary">Xem ngay</a>
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
        foreach ($danhmuc as $madanhmuc) {
            $sql = "SELECT count(*) as tong FROM sanpham WHERE MaDanhMuc = ?"; 
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $madanhmuc["id"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $tong);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop.php?theme=<?php echo urlencode($madanhmuc['name']); ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
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
        <?php } ?>
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
        require_once('database/db_connect.php');
        
        // Tạo mảng để lưu dữ liệu
        $products = [];

        // Lấy dữ liệu từ câu truy vấn và lưu vào mảng
        $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 8";
        $ketqua = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($ketqua)) {
            $products[] = $row;
        }

        // Sử dụng vòng lặp for để duyệt qua các phần tử trong mảng $products
        for ($i = 0; $i < count($products); $i++) {
            // $product = $products[$i];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo $products[$i][6]; ?>" alt=""><!--product[6] là trường HinhAnh-->
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="javascript:void(0)" onclick="addToCart('<?php echo $products[$i][0]; ?>', '<?php echo $products[$i][5]; ?>')"><i class="fa fa-shopping-cart"></i></a>

                            <a class="btn btn-outline-dark btn-square" href="detail.php?productName=<?php echo urlencode($products[$i][1]); ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="detail.php"><?php echo $products[$i][1]; ?></a><!--product[1] là trường TenSanPham-->
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
            </div>
        <?php } ?>
    </div>
</div>



    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/vuonhoa1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/vuonhoa2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
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
                    <div class="bg-light p-4">
                        <img src="img/dai_ly/vendor1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/dai_ly/vendor2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/dai_ly/vendor3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/dai_ly/vendor4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>

</html>