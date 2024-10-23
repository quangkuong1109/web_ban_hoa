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
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Khoảng giá</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="price-filter-form">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="all" id="price-all" checked>
                        <label class="custom-control-label" for="price-all">Tất cả </label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="0-250000" id="price-1">
                        <label class="custom-control-label" for="price-1">Dưới 250.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="250000-500000" id="price-2">
                        <label class="custom-control-label" for="price-2">Từ 250.000 đến 500.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="500000-1000000" id="price-3">
                        <label class="custom-control-label" for="price-3">Từ 500.000 đến 1.000.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" name="price-range" value="1000000-2000000" id="price-4">
                        <label class="custom-control-label" for="price-4">Từ 1.000.000 đến 2.000.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="radio" class="custom-control-input" name="price-range" value="2000000-" id="price-5">
                        <label class="custom-control-label" for="price-5">Trên 2.000.000</label>
                    </div>
                    
                </form>
            </div>
            <!-- Price End -->


            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Màu sắc</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="price-all">Tất cả</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham";
                            $result = $conn->query($sql);

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $conn->close();
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-1">
                        <label class="custom-control-label" for="color-1">Hồng</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Hồng"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>

                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-2">
                        <label class="custom-control-label" for="color-2">Trắng</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Trắng"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-3">
                        <label class="custom-control-label" for="color-3">Đỏ</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Đỏ"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-4">
                        <label class="custom-control-label" for="color-4">Xanh</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Xanh"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-5">
                        <label class="custom-control-label" for="color-5">Vàng</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Vàng"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-6">
                        <label class="custom-control-label" for="color-6">Tím</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Tím"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-7">
                        <label class="custom-control-label" for="color-7">Cam</label>
                        <span class="badge border font-weight-normal">
                            <?php
                            $servername = "localhost"; // Địa chỉ máy chủ
                            $username = "root"; // Tên đăng nhập của bạn
                            $password = ""; // Mật khẩu của bạn
                            $dbname = "banhoa"; // Tên cơ sở dữ liệu của bạn

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Màu sắc cần tìm
                            $color = "Cam"; // Thay đổi màu sắc tương ứng với sản phẩm

                            // Truy vấn để đếm số sản phẩm
                            $sql = "SELECT COUNT(*) as total FROM sanpham WHERE MAU LIKE ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $color); // Liên kết tham số
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result) {
                                // Lấy số lượng sản phẩm
                                $row = $result->fetch_assoc();
                                echo $row['total']; // Hiển thị số lượng sản phẩm
                            } else {
                                echo "0"; // Nếu không có sản phẩm nào
                            }

                            // Đóng kết nối
                            $stmt->close(); // Đóng statement
                            $conn->close(); // Đóng kết nối
                            ?>
                        </span>
                    </div>
                    <!-- Nút lọc -->
                    <button type="submit" class="btn btn-primary mt-3">Lọc sản phẩm</button>
                </form>
            </div>
            <!-- Color End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sắp xếp</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">A->Z</a>
                                    <a class="dropdown-item" href="#">Z->A</a>
                                    <a class="dropdown-item" href="#">Giá từ thấp đến cao</a>
                                    <a class="dropdown-item" href="#">Giá từ cao đến thấp</a>

                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Hiển thị</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                require_once('database_connect/db_connect.php'); // Lệnh lấy kết nối database

                // Số sản phẩm trên mỗi trang
                $productsPerPage = 9;

                // Tính toán trang hiện tại và tổng số sản phẩm
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($current_page - 1) * $productsPerPage;

                $sql_total = "SELECT COUNT(*) as total FROM sanpham";
                $result_total = mysqli_query($conn, $sql_total);
                $totalProducts = mysqli_fetch_assoc($result_total)['total'];
                $totalPages = ceil($totalProducts / $productsPerPage);

                // Truy vấn để lấy sản phẩm từ cơ sở dữ liệu cho trang hiện tại
                $sql = "SELECT MaSanPham, TenSanPham, MaDanhMuc, Mau, MoTa, Gia, HinhAnh, TonKho, GiamGia FROM sanpham LIMIT $offset, $productsPerPage";
                $result = mysqli_query($conn, $sql);

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
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $product['TenSanPham']; ?></a>
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

                <!-- Thêm phần điều hướng trang ở đây -->
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Trước</a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?php if ($current_page >= $totalPages) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Trang tiếp</a>
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
                            delay: 5000 // Thời gian hiển thị 3 giây
                        });
                        $('#toast').toast('show');
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