<?php require_once('header.php'); ?>

<style type="text/css">
  /* Style the buttons that are used to open and close the accordion panel */
.accordion {
  background-color: #eee;
  color: #444;
  font-weight: bold;
  cursor: pointer;
  padding: 18px;
  width: 80%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  display: block; /* Make the button a block element */
  margin: 10px auto; /* Center the button with auto margins */
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #ffd333;
}


.panel {
  width: 80%;
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  display: block; /* Make the button a block element */
  margin: 10px auto; /* Center the button with auto margins */
}

.accordion:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}


.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}

.panel table {
    width: 100%;
    border-collapse: collapse;
}

.panel td {
    padding: 10px;
    vertical-align: middle; /* Căn giữa theo chiều dọc */
    border-bottom: 1px solid #ccc; /* Border dưới */
}

#thongbao {
    width: 80%;
    padding-left: 70px;
}

////

</style>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                <a class="breadcrumb-item text-dark" href="#">Lịch sử đơn hàng</a>
                <!-- <span class="breadcrumb-item active">Shop List</span> -->
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Lịch sử đơn hàng -->
<?php

    require_once("database/db_connect.php");
    // Kiểm tra nếu người dùng đã đăng nhập hay chưa
    if (!isset($_SESSION['makhachhang'])) {
        echo "<p id=\"thongbao\">Vui lòng đăng nhập để xem lịch sử đơn hàng.</p>";
    }else{
        // Giả sử bạn đã có $ma_khach_hang từ session hoặc biến
        $sql_orders = "
        SELECT 
            dh.MaDonHang, 
            dh.TongGiaTri, 
            gh.DiaChi
        FROM 
            donhang AS dh
        JOIN 
            thanhtoan AS tt ON dh.MaDonHang = tt.MaDonHang
        JOIN 
            giaohang AS gh ON tt.MaThanhToan = gh.MaThanhToan
        WHERE 
            dh.MaKhachHang = ? AND tt.TrangThai = 'Đã Thanh Toán' ";

        $stmt = $conn->prepare($sql_orders);
        $stmt->bind_param("i", $ma_khach_hang); // Biến khách hàng
        $stmt->execute();
        $result = $stmt->get_result();

        // Bắt đầu hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            $maDonHang = $row['MaDonHang'];
            $TongGiaTri = $row['TongGiaTri'];
            $diaChi = $row['DiaChi'];       
            
            // Hiển thị thông tin đơn hàng
            echo '<button class="accordion"><span style="color: red;">MÃ ĐƠN HÀNG: #' . $maDonHang . '</span> <i style="font-weight: bold;">- Địa chỉ nhận: ' . $diaChi . '</i></button>';
            echo '<div class="panel">';
            
            // Truy vấn để lấy sản phẩm trong đơn hàng, bao gồm hình ảnh từ bảng sanpham
            $sql_products = "
                SELECT sp.TenSanPham, sp.Gia, ctdh.SoLuong, sp.HinhAnh
                FROM chitietdonhang AS ctdh
                JOIN sanpham AS sp ON ctdh.MaSanPham = sp.MaSanPham
                WHERE ctdh.MaDonHang = ?";
                
            $stmt_products = $conn->prepare($sql_products);
            $stmt_products->bind_param("i", $maDonHang);
            $stmt_products->execute();
            $result_products = $stmt_products->get_result();
            
            // Bắt đầu hiển thị sản phẩm
            while ($product = $result_products->fetch_assoc()) {
                $tenSanPham = $product['TenSanPham'];
                $giaSP = $product['Gia'];
                $soLuong = $product['SoLuong'];
                $tongSP = $giaSP * $soLuong; // Tính tổng cho sản phẩm
                $hinhAnh = $product['HinhAnh']; // Lấy đường dẫn hình ảnh

                echo '<table>';
                echo '<tr>';
                echo '<td><a href="#" class="photo"><img src="' . $hinhAnh . '" class="cart-thumb" alt="" /></a></td>'; // Hiển thị hình ảnh từ cơ sở dữ liệu
                echo '<td><h6><a href="#">' . $tenSanPham . '</a></h6></td>';
                echo '<td><p>' . $soLuong . 'x - ' . number_format($giaSP) . ' VND</p></td>';
                echo '<td><p><strong style="color: #DC143C; font-weight: bold;">Tổng</strong>: ' . number_format($tongSP) . ' VND</p></td>';
                echo '</tr>';
                echo '</table>';
            }

            // Hiển thị thành tiền cho đơn hàng
            echo '<table>';
            echo '<tr>';
            echo '<td align="center"><p><b style="color: #DC143C; font-weight: bold;">Thành tiền:</b> ' . number_format($row['TongGiaTri']) . ' VND</p></td>';
            echo '</tr>';
            echo '</table>';
            
            echo '</div>'; // Kết thúc panel
        }

        $stmt->close();
        $conn->close();
    }

 ?>
<!-- Lịch sử đơn hàng -->

<script type="text/javascript">
  var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>

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