<?php require_once('header.php'); ?>


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                <a class="breadcrumb-item text-dark" href="#">Sản phẩm</a>
                <!-- <span class="breadcrumb-item active">Shop List</span> -->
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Khoảng giá</span>
            </h5>
            <div class="bg-light p-4 mb-30">
                <form id="filter-form" method="GET" action="">
                    <!-- Giá mặc định là tất cả -->
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="all" id="price-all" checked>
                        <label class="custom-control-label" for="price-all">Tất cả</label>
                    </div>
                    <?php
                    $priceRanges = [
                        '0-250000' => 'Dưới 250.000',
                        '250000-500000' => 'Từ 250.000 đến 500.000',
                        '500000-1000000' => 'Từ 500.000 đến 1.000.000',
                        '1000000-2000000' => 'Từ 1.000.000 đến 2.000.000',
                        '2000000-' => 'Trên 2.000.000',
                    ];
                    
                    foreach ($priceRanges as $value => $label) {
                        echo '<div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">';
                        echo '<input type="radio" class="custom-control-input" name="price-range" value="' . $value . '" id="price-' . array_search($value, array_keys($priceRanges)) . '">';
                        echo '<label class="custom-control-label" for="price-' . array_search($value, array_keys($priceRanges)) . '">' . $label . '</label>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <!-- Price End -->

                <!-- Theme Start -->
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Chủ đề Hoa</span>
                </h5>
                <div class="bg-light p-4 mb-30">
                    <!-- Chủ đề mặc định là tất cả -->
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="theme" value="all" id="theme-all" checked>
                        <label class="custom-control-label" for="theme-all">Tất cả</label>
                        <span class="badge border font-weight-normal"><?php echo getTotalProducts(); ?></span>
                    </div>
                    <?php
                    $themes = [
                        'Hoa Cưới',
                        'Hoa Sinh Nhật',
                        'Hoa Tình Yêu',
                        'Hoa Tốt Nghiệp',
                        'Hoa Khai Trương',
                        'Hoa Chúc Sức Khỏe',
                        'Hoa Cảm Ơn',
                        'Hoa Chia Buồn'
                    ];
                    
                    foreach ($themes as $index => $theme) {
                        echo '<div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">';
                        echo '<input type="radio" class="custom-control-input" name="theme" value="' . $theme . '" id="theme-' . ($index + 1) . '">';
                        echo '<label class="custom-control-label" for="theme-' . ($index + 1) . '">' . $theme . '</label>';
                        echo '<span class="badge border font-weight-normal">' . getThemeCount($theme) . '</span>';
                        echo '</div>';
                    }
                    ?>
                    <!-- Nút lọc -->
                    <button type="submit" class="btn btn-primary mt-3">Lọc sản phẩm</button>
                </form>
            </div>
            <!-- Theme End -->

            <?php
// Functions to handle database interactions
            function getDatabaseConnection() {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "banhoa";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }
                
                return $conn;
            }

            function getTotalProducts() {
                $conn = getDatabaseConnection();
                $sql = "SELECT COUNT(*) as total FROM sanpham";
                $result = $conn->query($sql);
                $total = $result ? $result->fetch_assoc()['total'] : 0;
                $conn->close();
                
                return $total;
            }


// Hàm đếm số lượng sản phẩm theo chủ đề hoa
            function getThemeCount($theme) {
                $conn = getDatabaseConnection();
    // Câu lệnh SQL để đếm số sản phẩm theo chủ đề
                $sql = "SELECT COUNT(*) AS total FROM sanpham s 
                INNER JOIN danhmucsanpham d ON s.MaDanhMuc = d.MaDanhMuc 
                WHERE d.TenDanhMuc LIKE ?";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $theme);
                $stmt->execute();
                $result = $stmt->get_result();
                $total = $result ? $result->fetch_assoc()['total'] : 0;
                
                $stmt->close();
                $conn->close();
                
                return $total;
            }
            ?>

            <!-- Theme End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->

        <?php
                require_once('database/db_connect.php'); // Lệnh lấy kết nối database

                    // Số sản phẩm trên mỗi trang
                $productsPerPage = 9;

                    // Tính toán trang hiện tại
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($current_page - 1) * $productsPerPage;

                    // Lấy giá trị lọc và sắp xếp từ URL
                $priceRange = isset($_GET['price-range']) ? $_GET['price-range'] : 'all';
                $theme = isset($_GET['theme']) ? $_GET['theme'] : 'all';
                $sort = isset($_GET['sapxep']) ? $_GET['sapxep'] : '';

                    // Điều kiện lọc giá
                $priceCondition = "";
                if ($priceRange != 'all') {
                    $priceParts = explode('-', $priceRange);
                    $minPrice = $priceParts[0];
                    $maxPrice = isset($priceParts[1]) ? $priceParts[1] : null;

                    if ($maxPrice) {
                        $priceCondition = "Gia BETWEEN $minPrice AND $maxPrice";
                    } else {
                        $priceCondition = "Gia >= $minPrice";
                    }
                }

                    // Điều kiện lọc chủ đề
                $themeCondition = "";
                if ($theme != 'all') {
                    $themeCondition = "d.TenDanhMuc = '$theme'";
                }

                    // Kết hợp điều kiện lọc
                $whereClause = "";
                if ($priceCondition && $themeCondition) {
                    $whereClause = "WHERE $priceCondition AND $themeCondition";
                } elseif ($priceCondition) {
                    $whereClause = "WHERE $priceCondition";
                } elseif ($themeCondition) {
                    $whereClause = "WHERE $themeCondition";
                }


                    // Điều kiện sắp xếp
                    // Điều kiện sắp xếp
                $orderBy = "";
                if ($sort === 'asc') {
                    $orderBy = "ORDER BY Gia ASC";
                } elseif ($sort === 'desc') {
                    $orderBy = "ORDER BY Gia DESC";
                } elseif ($sort === 'name_asc') {
                            $orderBy = "ORDER BY sp.TenSanPham ASC"; // Thay 'TenSanPham' bằng tên cột tương ứng trong bảng sản phẩm
                        } elseif ($sort === 'name_desc') {
                            $orderBy = "ORDER BY sp.TenSanPham DESC"; // Thay 'TenSanPham' bằng tên cột tương ứng trong bảng sản phẩm
                        }


                    // Truy vấn SQL với điều kiện WHERE và ORDER BY nếu có
                        $sql = "SELECT * FROM sanpham AS sp JOIN danhmucsanpham AS d ON sp.MaDanhMuc = d.MaDanhMuc $whereClause $orderBy LIMIT $offset, $productsPerPage";

                    // Truy vấn SQL với điều kiện WHERE để tính tổng sản phẩm theo bộ lọc
                        $sql_total = "SELECT COUNT(*) as total FROM sanpham AS sp JOIN danhmucsanpham AS d ON sp.MaDanhMuc = d.MaDanhMuc $whereClause";
                        $result_total = mysqli_query($conn, $sql_total);
                        $totalProducts = mysqli_fetch_assoc($result_total)['total'];

                    // Tính tổng số trang dựa trên số lượng sản phẩm đã lọc
                        $totalPages = ceil($totalProducts / $productsPerPage);

                    // Thực hiện truy vấn SQL để lấy sản phẩm hiển thị
                        $result = mysqli_query($conn, $sql);

                    // Hiển thị thông báo nếu truy vấn không chạy được

                        $products = array();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $products[] = $row;
                            }
                        } else {
                            echo "Không có sản phẩm nào.";
                        }

                // Đóng kết nối
                        mysqli_close($conn);
                        ?>

                        <div class="col-lg-9 col-md-8">
                            <div class="row pb-3">
                                <div class="col-12 pb-1">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                                        </div>
                                        <div class="ml-2">
                                            <!-- Phần sắp xếp sản phẩm -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sắp xếp</button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="?page=1&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sapxep=asc">Giá từ thấp đến cao</a>
                                                    <a class="dropdown-item" href="?page=1&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sapxep=desc">Giá từ cao đến thấp</a>
                                                    <a class="dropdown-item" href="?page=1&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sapxep=name_asc">Tên từ A-Z</a>
                                                    <a class="dropdown-item" href="?page=1&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sapxep=name_desc" >Tên từ Z-A</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                // Hiển thị kết quả (tùy chỉnh cách bạn hiển thị)
                                foreach ($products as $product) {
                                    ?>

                                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                        <div class="product-item bg-light mb-4">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="<?php echo $product['HinhAnh']; ?>" alt="">
                                                <div class="product-action">
                                                    <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" onclick="addToCart('<?php echo $product['TenSanPham']; ?>')">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" onclick="addToLove('<?php echo $product['TenSanPham']; ?>')">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-outline-dark btn-square" href="detail.php?productName=<?php echo urlencode($product['TenSanPham']); ?>">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="text-center py-4">
                                                <a class="h6 text-decoration-none text-truncate" href="detail.php?productName=<?php echo urlencode($product['TenSanPham']); ?>">
                                                    <?php echo $product['TenSanPham']; ?>
                                                </a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5><?php echo number_format($product['Gia'], 0, ',', '.') . " đ"; ?></h5>
                                                    <h6 class="text-muted ml-2">
                                                        <?php
                                        // Kiểm tra giảm giá và hiển thị giá chưa giảm nếu có
                                                        if ($product['GiamGia'] == 20) {
                                            $giachuagiam = $product['Gia'] / 0.8; // Tính giá với giảm giá 20%
                                            echo "<del>" . number_format($giachuagiam, 0, ',', '.') . " đ</del>";
                                        } elseif ($product['GiamGia'] == 50) {
                                            $giachuagiam = $product['Gia'] + (1 * $product['Gia']); // Tính giá với giảm giá 50%
                                            echo "<del>" . number_format($giachuagiam, 0, ',', '.') . " đ</del>";
                                        }
                                        // Nếu GiamGia = 0, không hiển thị thẻ <del>
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>

                <!-- Phần điều hướng trang -->
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sort=<?php echo urlencode($sort); ?>">Trước</a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sort=<?php echo urlencode($sort); ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?php if ($current_page >= $totalPages) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&price-range=<?php echo urlencode($priceRange); ?>&theme=<?php echo urlencode($theme); ?>&sort=<?php echo urlencode($sort); ?>">Trang tiếp</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div id="toast" class="toast" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
                    <div class="toast-body">
                        <span id="toast-message"></span>
                    </div>
                </div>

                <script>
                    function addToCart(productName) {
                        // Cập nhật thông báo
                        $('#toast-message').text('Thêm sản phẩm "' + productName + '" vào giỏ hàng thành công!');

                        // Hiển thị toast
                        $('#toast').toast({
                            delay: 5000 // Thời gian hiển thị 5 giây
                        });
                        $('#toast').toast('show');
                    }

                    function sortProducts(sortType) {
                        // Lấy giá trị của các tham số hiện tại
                        const urlParams = new URLSearchParams(window.location.search);
                        const priceRange = urlParams.get('price-range') || 'all'; // Giá trị lọc giá
                        const theme = urlParams.get('theme') || 'all'; // Giá trị lọc chủ đề

                        // Cập nhật thông báo
                        let message = '';
                        switch (sortType) {
                        case 'asc':
                            message = 'Sắp xếp sản phẩm theo giá từ thấp đến cao!';
                            break;
                        case 'desc':
                            message = 'Sắp xếp sản phẩm theo giá từ cao đến thấp!';
                            break;
                        case 'name_asc':
                            message = 'Sắp xếp sản phẩm theo tên từ A-Z!';
                            break;
                        case 'name_desc':
                            message = 'Sắp xếp sản phẩm theo tên từ Z-A!';
                            break;
                        }
                        
                        $('#toast-message').text(message);

                        // Hiển thị toast
                        $('#toast').toast({
                            delay: 5000 // Thời gian hiển thị 5 giây
                        });
                        $('#toast').toast('show');

                        // Chuyển hướng đến trang với tham số lọc và sắp xếp
                        window.location.href = `?page=1&price-range=${encodeURIComponent(priceRange)}&theme=${encodeURIComponent(theme)}&sapxep=${sortType}`;
                    }
                </script>

                <script>
                    function addToLove(productName) {
                        // Cập nhật thông báo
                        $('#toast-message').text('Thêm "' + productName + '" vào sản phẩm yêu thích thành công!');

                        // Hiển thị toast
                        $('#toast').toast({
                            delay: 5000 // Thời gian hiển thị 3 giây
                        });
                        $('#toast').toast('show');
                    }
                </script>

                <style>
                    .toast {
                        display: none;
                        /* Ẩn toast cho đến khi cần */
                        position: fixed;
                        bottom: 20px;
                        right: 20px;
                        z-index: 1050;
                        background-color: #ffd700;
                        color: #121212;
                        padding: 10px 20px;
                        border-radius: 5px;
                        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
                    }
                </style>

            </div>
        </div>

        <!-- Shop Product End -->
    </div>

</div>
<!-- Shop End -->

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