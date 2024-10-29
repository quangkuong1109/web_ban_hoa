<?php
session_start();
?>
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
    <link href="css/preloader.css" rel="stylesheet">

    <!-- Chèn CSS cho side menu -->
    <style>
        .side {
            position: fixed;
            top: 0;
            right: 0;
            width: 400px;
            /* Độ rộng side menu */
            height: 100%;
            background-color: #121212;
            color: #FFD700;
            /* Màu chữ vàng */
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            transform: translateX(100%);
            /* Ban đầu side menu nằm ngoài view */
            transition: transform 0.3s ease-in-out;
            /* Hiệu ứng chuyển động */
            z-index: 999;
        }

        .close-side {
            color: #FFD700;
            /* Màu nút đóng */
            font-size: 30px;
            /* Kích thước chữ lớn */
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Danh sách giỏ hàng */
        .cart-box {
            padding: 20px;
            /* Padding cho giỏ hàng */
        }

        .cart-list {
            padding: 0;
            list-style: none;
        }

        /* Mỗi sản phẩm trong giỏ hàng */
        .cart-list li {
            display: flex;
            /* Flexbox để căn chỉnh hình ảnh và thông tin */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            margin-bottom: 15px;
            /* Khoảng cách giữa các sản phẩm */
            border-bottom: 1px solid #444;
            /* Đường phân cách giữa các sản phẩm */
            padding-bottom: 10px;
            /* Padding dưới sản phẩm */
        }

        .cart-thumb {
            width: 50px;
            height: auto;
            margin-right: 10px;
            /* Khoảng cách giữa hình ảnh và thông tin */
        }

        /* Tên sản phẩm */
        .cart-list h6 {
            margin: 0;
            /* Bỏ margin cho tiêu đề */
        }

        /* Giá sản phẩm */
        .price {
            margin: 0;
            color: silver;
            /* Màu chữ vàng cho giá */
        }

        /* Tổng tiền */
        .total {
            display: flex;
            /* Flexbox cho tổng tiền */
            justify-content: space-between;
            /* Căn giữa giữa tổng và nút */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            margin-top: 20px;
            /* Khoảng cách phía trên */
        }

        /* Nút xem giỏ hàng */
        .btn-cart {
            background-color: mistyrose;
            /* Nền vàng cho nút */
            color: #111;
            /* Chữ đen */
            padding: 10px 20px;
            /* Padding cho nút */
            border: none;
            /* Bỏ viền */
            border-radius: 5px;
            /* Bo tròn góc */
            cursor: pointer;
            /* Con trỏ tay khi hover */
            transition: background-color 0.3s ease;
            /* Hiệu ứng chuyển màu */
        }

        .btn-cart:hover {
            background-color: #f54d45;
            color: white;
            box-shadow: 5px 5px 3px rgba(255, 243, 238, 0.8);
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Về chúng tôi</a>
                    <a class="text-body mr-3" href="contact.php">Liên hệ</a>
                    <a class="text-body mr-3" href="">Trợ giúp</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <?php
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['tennguoidung'])) {
                // Nếu đã đăng nhập, hiển thị tên người dùng
                echo '<a class="text-body mr-3" href="">Xin chào, ' . htmlspecialchars($_SESSION['tennguoidung']) . '</a>';
            } else {
                // Nếu chưa đăng nhập, hiển thị đường dẫn đăng nhập
                echo '<a class="text-body mr-3" href="dangnhap_dangky.php">Đăng nhập</a>';
            }
            ?>
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="dangnhap.php">Đăng nhập</button>
                            <a class="dropdown-item" href="dangky.php">Đăng ký</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <img width="300px" height="60px" src="img/icon_logo.png">
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm loại hoa tại đây">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Chăm sóc khách hàng</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Chủ đề</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="" class="nav-item nav-link">Hoa cưới</a>
                        <a href="" class="nav-item nav-link">Hoa sinh nhật</a>
                        <a href="" class="nav-item nav-link">Hoa tình yêu</a>
                        <a href="" class="nav-item nav-link">Hoa chia buồn</a>
                        <a href="" class="nav-item nav-link">Hoa tốt nghiệp</a>
                        <a href="" class="nav-item nav-link">Hoa khai trương</a>
                        <a href="" class="nav-item nav-link">Hoa chúc sức khỏe</a>
                        <a href="" class="nav-item nav-link">Hoa cảm ơn</a>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <img width="300px" height="60px" src="img/icon_logo.png">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Trang chủ</a>
                            <a href="shop.php" class="nav-item nav-link">Sản phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thanh toán <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Giỏ hàng</a>
                                    <a href="checkout.php" class="dropdown-item">Thanh toán</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">3</span>
                            </a>
                            <a id="open-side-menu" href="#" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">3</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>


        </div>
    </div>
    <!-- Navbar End -->

    <!-- Start Side Menu -->
    <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <li class="cart-box">
            <ul class="cart-list">
                <li>
                    <a href="#" class="photo"><img src="img/anh_for_web/rose_3.png.webp" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Delica omtantur </a></h6>
                    <p>1x - <span class="price">$80.00</span></p>
                </li>
                <li>
                    <a href="#" class="photo"><img src="img/anh_for_web/rose_4.png.webp" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Omnes ocurreret</a></h6>
                    <p>1x - <span class="price">$60.00</span></p>
                </li>
                <li>
                    <a href="#" class="photo"><img src="img/anh_for_web/rose_5.png.webp" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Agam facilisis</a></h6>
                    <p>1x - <span class="price">$40.00</span></p>
                </li>
                <li class="total">
                    <a href="cart.php" class="btn btn-default hvr-hover btn-cart">Xem giỏ hàng</a>
                    <span class="float-right"><strong>Tổng</strong>: $180.00</span>
                </li>
            </ul>
        </li>
    </div>
    <!-- End Side Menu -->

    <script>
        // Lấy các phần tử cần thiết từ HTML
        const sideMenu = document.querySelector('.side'); // Phần tử side menu
        const openBtn = document.getElementById('open-side-menu'); // Nút mở side menu
        const closeBtn = document.querySelector('.close-side'); // Nút đóng side menu

        // Khi nhấp vào nút mở, thêm class "active" để hiện side menu
        openBtn.addEventListener('click', function() {
            sideMenu.style.transform = 'translateX(0)'; // Di chuyển side menu vào view
        });

        // Khi nhấp vào nút đóng, xóa class "active" để ẩn side menu
        closeBtn.addEventListener('click', function() {
            sideMenu.style.transform = 'translateX(100%)'; // Di chuyển side menu ra khỏi view
        });

        // Thêm sự kiện cho tất cả các liên kết nav-link
        document.querySelectorAll('.nav-item.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                // Xóa lớp active từ tất cả các liên kết
                document.querySelectorAll('.nav-item.nav-link').forEach(nav => nav.classList.remove('active'));

                // Thêm lớp active vào liên kết được nhấp
                this.classList.add('active');
            });
        });
    </script>