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
    <link rel="stylesheet" type="text/css" href="css/thongbao_toast.css">

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
            overflow-y: auto;
        }
        .side-content {
            padding: 20px; /* Khoảng cách bên trong sidebar */
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
                    // Nếu đã đăng nhập, hiển thị tên người dùng và nút Đăng xuất
                    echo '<div class="d-inline-flex align-items-center">';
                    echo '<p class="text-body mr-3 mb-0">Xin chào, ' . htmlspecialchars($_SESSION['tennguoidung']) . '</p>';
                    echo '<a class="text-body mr-3" href="logout.php">Đăng xuất</a>';
                    echo '</div>';
                } else {
                    unset($_SESSION['tennguoidung']);
                    // Nếu chưa đăng nhập, hiển thị đường dẫn đăng nhập
                    echo '<a class="text-body mr-3" href="dangnhap.php">Đăng nhập</a>';
                }
                ?>

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
        <div class="row align-items-center bg-light px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none me-0">
                    <img width="130px" height="130px" src="img/logohoa.png">
                </a>
                <a href="index.php" class="text-decoration-none">
                    <img width="210px" height="90px" src="img/chu.png">
                </a>
            </div>


            <!-- Khu vực chứa ảnh GIF đầu, thanh tìm kiếm, và ảnh GIF cuối -->
            <div class="col-lg-4 col-6 d-flex align-items-center" style="position: relative;">
                <img src="img/peach-cat.gif" alt="Peach Cat" width="100px" height="100px" class="mr-2"> <!-- Ảnh GIF bên trái -->
                
                <form action="" onsubmit="return false;" class="d-flex align-items-center w-100">
                    <div class="input-group" style="flex: 1; position: relative; min-width: 300px;">
                        <input type="text" class="form-control" id="searchInput" placeholder="Tìm loại hoa tại đây" oninput="searchProducts()"  style="flex: 1;">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <!-- Khung gợi ý sản phẩm bên dưới thanh tìm kiếm -->
                        <div id="suggestions" class="suggestions-box"></div>
                    </div>
                </form>
                <img src="img/cat-flowers.gif" alt="Cat Flowers" width="100px" height="100px" class="ml-2"> <!-- Ảnh GIF bên phải -->
            </div>

            <div class="col-lg-4 col-6 text-right">
                <p class="m-0"> 👨‍💼 Chăm sóc khách hàng</p>
                <h6 class="m-0">Mr. Cường: &#128222;0816261794</h6>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <?php require_once("database/db_connect.php"); 

        ///////////////LẤY TÊN DANH MỤC SẢN PHẨM ĐỂ LOAD VÀO CHỦ ĐỀ/////////////////////
    $sql = "SELECT TenDanhMuc FROM danhmucsanpham";
    $result = $conn->query($sql);

        // Tạo mảng để lưu dữ liệu
    $tenDanhMucArray = array();

        // Duyệt qua từng hàng dữ liệu và lưu vào mảng
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tenDanhMucArray[] = $row['TenDanhMuc'];
        }
    } else {
        //echo "0 results";
    }

        $result->free(); // GIẢI PHÓNG DỮ LIỆU 

        ///////////////////////////LẤY DỮ LIỆU SẢN PHẨM/////////////////////////////
        $sql_hoa = "SELECT MaSanPham, TenSanPham, MaDanhMuc, Gia, HinhAnh, TonKho FROM sanpham";
        $result_hoa = $conn->query($sql_hoa);

        $sanPhamArray_id_ten = array(); 
        $sanPhamArray_id_anh = array();
        $sanPhamArray_id_gia = array();

        if ($result_hoa->num_rows > 0) {
            while($row_hoa = $result_hoa->fetch_assoc()) {
                // Lưu tên và hình ảnh với khóa là MaSanPham
                $sanPhamArray_id_ten[$row_hoa["MaSanPham"]] = $row_hoa["TenSanPham"];
                $sanPhamArray_id_anh[$row_hoa["MaSanPham"]] = $row_hoa["HinhAnh"];
                $sanPhamArray_id_gia[$row_hoa["MaSanPham"]] = $row_hoa["Gia"];
            }
        } else {
            //echo "0 results";
        }

        // Giải phóng bộ nhớ của kết quả truy vấn
        $result_hoa->free();

        /////////////////////////LẤY DỮ LIỆU GIỎ HÀNG////////////////////////////

        if (isset($_SESSION['makhachhang'])) {
            $Ma_KH = $_SESSION['makhachhang'];
        } else {
            $Ma_KH = "100";
        }

        // $Ma_KH = $_SESSION['makhachhang'];
        // if (empty($Ma_KH)) {
        //     $Ma_KH = "100";
        // }
        // Thực hiện truy vấn SQL lấy dữ liệu từ giỏ hàng
            $get_giohang_query = "SELECT c.MaSanPham, SUM(c.SoLuong) AS TongSoLuong, c.Gia 
                                  FROM chitietdonhang AS c
                                  JOIN donhang AS d ON c.MaDonHang = d.MaDonHang
                                  WHERE d.MaKhachHang = '$Ma_KH' AND d.TrangThai = 0
                                  GROUP BY c.MaSanPham"; // Nhóm theo mã sản phẩm

            $result_get_giohang = $conn->query($get_giohang_query);

            // Tạo các mảng để lưu dữ liệu
            $maSP_giohang = array();
            $soluongSP_giohang = array();
            $giaSP_giohang = array();
            

            // Duyệt qua từng hàng dữ liệu và lưu vào các mảng
            if ($result_get_giohang->num_rows > 0) {
                while($row = $result_get_giohang->fetch_assoc()) {
                    $maSP_giohang[] = $row["MaSanPham"];
                    $soluongSP_giohang[] = $row["TongSoLuong"]; // Sử dụng tổng số lượng từ SQL
                    $giaSP_giohang[] = $row["Gia"];
                }
            } else {
                // echo "0 results";
            }

            // Tạo mảng chỉ lấy phần tử duy nhất của mảng mã sản phẩm
            $maSP_giohang_unique = array_unique($maSP_giohang);
            $maSP_giohang_unique = array_values($maSP_giohang_unique);

            // Đếm số lần xuất hiện của mỗi phần tử trong mảng mã sản phẩm của giỏ hàng
            $count_maSP_giohang = array_count_values($maSP_giohang);

            // Gán số lượng cho từng mã sản phẩm duy nhất
            $final_count_maSP_giohang = [];
            foreach ($maSP_giohang_unique as $maSP) {
                $final_count_maSP_giohang[$maSP] = 0; // Khởi tạo số lượng
            }

            foreach ($maSP_giohang as $key => $maSP) {
                $final_count_maSP_giohang[$maSP] += $soluongSP_giohang[$key]; // Cộng dồn số lượng
            }

            // Số lượng sản phẩm hiện tại theo mã sản phẩm
            $count_maSP_giohang = $final_count_maSP_giohang; 

            // Truy vấn để lấy tên sản phẩm, giá và số lượng từ bảng giohang
            $sql = "
                SELECT 
                    sp.TenSanPham, 
                    sp.Gia
                FROM 
                    yeuthich AS yt
                JOIN 
                    sanpham AS sp ON yt.MaSanPham = sp.MaSanPham
                WHERE 
                    yt.MaKhachHang = ?
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $Ma_KH); // Sử dụng biến đã định nghĩa
                $stmt->execute();
                $result = $stmt->get_result();

                $tong_so_luong = 0; // Biến để đếm tổng số lượng sản phẩm

                // Kiểm tra nếu giỏ hàng không trống
                if ($result->num_rows > 0) {
                    // Duyệt qua các sản phẩm trong giỏ hàng
                    while ($row = $result->fetch_assoc()) {
                        // Cộng dồn số lượng sản phẩm vào biến tổng
                        $tong_so_luong++;
                    }
                }
        ?>

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
                            <a href="shop.php?theme=Hoa%20cưới" class="nav-item nav-link">Hoa cưới</a>
                            <a href="shop.php?theme=Hoa%20sinh%20nhật" class="nav-item nav-link">Hoa sinh nhật</a>
                            <a href="shop.php?theme=Hoa%20tình%20yêu" class="nav-item nav-link">Hoa tình yêu</a>
                            <a href="shop.php?theme=Hoa%20chia%20buồn" class="nav-item nav-link">Hoa chia buồn</a>
                            <a href="shop.php?theme=Hoa%20tốt%20nghiệp" class="nav-item nav-link">Hoa tốt nghiệp</a>
                            <a href="shop.php?theme=Hoa%20khai%20trương" class="nav-item nav-link">Hoa khai trương</a>
                            <a href="shop.php?theme=Hoa%20chúc%20sức%20khỏe" class="nav-item nav-link">Hoa chúc sức khỏe</a>
                            <a href="shop.php?theme=Hoa%20cảm%20ơn" class="nav-item nav-link">Hoa cảm ơn</a>
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
                                <a href="cart.php" class="nav-item nav-link">Giỏ hàng</a>
                                <a href="lichsu_donhang.php" class="nav-item nav-link">Lịch sử đơn hàng</a>
                                <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                <a id="open-side-menu-2" href="#" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo $tong_so_luong; ?></span>
                                </a>
                                <a id="open-side-menu" href="#" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo count($maSP_giohang); ?></span>
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
                    <?php  
                    $sum_gia = 0;
                    for ($i = 0; $i < count($maSP_giohang_unique); $i++) { 
                        // Mã sản phẩm duy nhất
                        $maSP = $maSP_giohang_unique[$i];
                        ?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo $sanPhamArray_id_anh[$maSP]; ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="detail.php?productName=<?php echo urlencode($sanPhamArray_id_ten[$maSP]); ?>">
                                <?php echo $sanPhamArray_id_ten[$maSP]; ?>
                            </a></h6>
                            <p>
                                <?php echo $count_maSP_giohang[$maSP]; ?>x - 
                                <span class="price"><?php echo number_format($sanPhamArray_id_gia[$maSP]); ?></span>
                            </p>
                        </li>
                        <?php 
                        // Tính tổng giá trị
                        $sum_gia += ($sanPhamArray_id_gia[$maSP] * $count_maSP_giohang[$maSP]);
                    } ?>
                    <li class="total">
                        <a href="cart.php" class="btn btn-default hvr-hover btn-cart">Xem giỏ hàng</a>
                        <span class="float-right"><strong>Tổng</strong>: <?php echo number_format($sum_gia); ?></span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->

        <!-- Start Side Menu for Favorites -->
        <div class="side" id="favorites-side-menu" style="transform: translateX(100%); transition: transform 0.3s ease;">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <?php
                    // Thực hiện truy vấn SQL để lấy danh sách sản phẩm yêu thích
                    $sql = "
                        SELECT 
                            sp.TenSanPham, 
                            sp.Gia,
                            sp.HinhAnh
                        FROM 
                            yeuthich AS yt
                        JOIN 
                            sanpham AS sp ON yt.MaSanPham = sp.MaSanPham
                        WHERE 
                            yt.MaKhachHang = ?
                    ";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $Ma_KH); // Sử dụng biến đã định nghĩa
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Kiểm tra nếu có sản phẩm yêu thích
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Cộng dồn số lượng sản phẩm vào biến tổng
                            ?>
                            <li>
                                <a href="#" class="photo"><img src="<?php echo $row['HinhAnh']; ?>" class="cart-thumb" alt="" /></a>
                                <h6>
                                    <a href="detail.php?productName=<?php echo urlencode($row['TenSanPham']); ?>">
                                        <?php echo $row['TenSanPham']; ?>
                                    </a>
                                </h6>
                                <p>
                                    <span class="price"><?php echo number_format($row['Gia']); ?> VND</span>
                                </p>
                            </li>
                            <?php
                        }
                    } else {
                        echo '<li>Chưa có sản phẩm yêu thích nào.</li>';
                    }
                    ?>
                </ul>
            </li>
        </div>
        <!-- End Side Menu for Favorites -->


        <style>
        .suggestions-box {
            border: 1px solid #ccc;
            background: white;
            position: absolute;
            top: 100%; /* Đặt ngay bên dưới ô input */
            left: 10;
            z-index: 1000;
            width: 100%; /* Đặt chiều rộng khung gợi ý bằng với chiều rộng của input-group */
            max-height: 300px; /* Giới hạn chiều cao của khung gợi ý */
            overflow-y: auto; /* Thêm thanh cuộn nếu nội dung quá nhiều */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ để phân biệt */
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background: #ffd700;
        }
        </style>

        <script>
            function searchProducts() {
                const input = document.getElementById('searchInput').value;
                const suggestionsBox = document.getElementById('suggestions');

                if (input.length === 0) {
        suggestionsBox.innerHTML = ''; // Nếu không có gì nhập vào, ẩn khung gợi ý
        return;
    }

    // Gọi AJAX để lấy sản phẩm
    fetch(`search.php?query=${encodeURIComponent(input)}`)
    .then(response => response.json())
    .then(data => {
            console.log(data); // Kiểm tra dữ liệu trả về
            // Xóa khung gợi ý cũ
            suggestionsBox.innerHTML = '';

            // Nếu không có sản phẩm nào
            if (data.length === 0) {
                return;
            }

            // Hiện các sản phẩm phù hợp
            data.forEach(product => {
                const item = document.createElement('div');
                item.className = 'suggestion-item d-flex align-items-center'; // Thêm lớp cho bố cục

                // Tạo phần tử hình ảnh
                const img = document.createElement('img');
                img.src = product.HinhAnh; // Đường dẫn hình ảnh
                img.alt = product.TenSanPham; // Tiêu đề hình ảnh
                img.style.width = '70px'; // Kích thước hình ảnh
                img.style.height = '70px'; // Kích thước hình ảnh
                img.className = 'mr-2'; // Để có khoảng cách bên phải

                // Tạo phần tử tên sản phẩm
                const name = document.createElement('span');
                name.textContent = product.TenSanPham; // Tên sản phẩm

                // Tạo phần tử giá sản phẩm
                const price = document.createElement('span');
                price.textContent = ` -- $: ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.Gia)}`; // Định dạng giá
                price.className = 'ml-2'; // Để có khoảng cách bên trái

                // Thêm hình ảnh và tên vào item
                item.appendChild(img);
                item.appendChild(name);
                item.appendChild(price);

                // Thêm sự kiện khi nhấn vào gợi ý
                item.onclick = () => {
                    document.getElementById('searchInput').value = product.TenSanPham;
                    suggestionsBox.innerHTML = ''; // Ẩn gợi ý
                };

                // Thêm sự kiện khi nhấn vào gợi ý
                item.onclick = () => {
                    // Chuyển hướng đến trang detail.php với tên sản phẩm
                    window.location.href = `detail.php?productName=${encodeURIComponent(product.TenSanPham)}`;
                };
                
                suggestionsBox.appendChild(item);
            });
        })
    .catch(error => {
        console.error('Error fetching products:', error);
    });
}

</script>
<script>
    // Lấy các phần tử cần thiết từ HTML
    const sideMenu = document.querySelector('.side'); // Phần tử side menu giỏ hàng
    const favoritesSideMenu = document.getElementById('favorites-side-menu'); // Phần tử side menu yêu thích
    const openBtn = document.getElementById('open-side-menu'); // Nút mở side menu giỏ hàng
    const openFavoritesBtn = document.getElementById('open-side-menu-2'); // Nút mở side menu yêu thích
    const closeBtn = document.querySelector('.close-side'); // Nút đóng side menu giỏ hàng

    // Khi nhấp vào nút mở giỏ hàng, thêm class "active" để hiện side menu
    openBtn.addEventListener('click', function() {
        sideMenu.style.transform = 'translateX(0)'; // Di chuyển side menu giỏ hàng vào view
    });

    // Khi nhấp vào nút mở favorites, thêm class "active" để hiện side menu
    openFavoritesBtn.addEventListener('click', function() {
        favoritesSideMenu.style.transform = 'translateX(0)'; // Di chuyển side menu yêu thích vào view
    });

    // Khi nhấp vào nút đóng, xóa class "active" để ẩn side menu giỏ hàng
    closeBtn.addEventListener('click', function() {
        sideMenu.style.transform = 'translateX(100%)'; // Di chuyển side menu giỏ hàng ra khỏi view
    });

    // Khi nhấp vào nút đóng cho favorites, xóa class "active" để ẩn side menu yêu thích
    const closeFavoritesBtn = favoritesSideMenu.querySelector('.close-side'); // Nút đóng cho side menu yêu thích
    closeFavoritesBtn.addEventListener('click', function() {
        favoritesSideMenu.style.transform = 'translateX(100%)'; // Di chuyển side menu yêu thích ra khỏi view
    });
</script>