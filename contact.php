<?php require_once ('header.php');?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30 border-black">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <span class="breadcrumb-item active">Liên hệ</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php
        // 1. Kết nối đến MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "banhoa";

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Lấy giá trị của các input
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
            $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
            $subject = isset($_POST['subject']) ? mysqli_real_escape_string($conn, $_POST['subject']) : '';
            $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

            // 2. Thực hiện truy vấn SQL
            $insert_query = "INSERT INTO lienhe (HoTen, Email, TieuDe, NoiDung) VALUES ('$name', '$email', '$subject', '$message')";
            $result = $conn->query($insert_query);

            if ($result === true) {
                echo "Thêm thành công";
            } else {
                echo "Thất bại";
            }

            // 4. Đóng kết nối
            $conn->close();
        } 
    ?>


    <!-- Contact Start -->
    <div class="container-fluid">
        <h3 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Liên hệ với chúng tôi &#9742;</span></h3>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30 border-black">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Tên của bạn"
                                required="required" data-validation-required-message="Vui lòng nhập tên của bạn" value="<?php echo htmlspecialchars($name ?? ''); ?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Địa chỉ Email"
                                required="required" data-validation-required-message="Vui lòng nhập địa chỉ Email của bạn" value="<?php echo htmlspecialchars($email ?? '') ;?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Tiêu đề"
                                required="required" data-validation-required-message="Vui lòng nhập 1 tiêu đề" value="<?php echo htmlspecialchars($subject ?? '') ;?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Lời nhắn"
                                required="required"
                                data-validation-required-message="Vui lòng nhập lời nhắn của bạn" value="<?php echo htmlspecialchars($message ?? '') ;?>"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi lời nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30 border-black">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1167129398733!2d105.86988121476323!3d20.97875748606426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acec346a66f1%3A0x98364ab30828cb12!2zMjE4IEzGsMahbmcgTmFtLCBQaMaw4budbmcgVGjhu4tuaCwgSG_DoG5nIE1haSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1svi!2s!4v1697972156033!5m2!1svi!2s"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
                <div class="bg-light p-30 mb-3 border-black">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>218 Lĩnh Nam, Hoàng Mai, Hà Nội</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>cdt-flower@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <style>
        .border-black {
        border: 2px solid #DDDDDD; /* Thay đổi độ dày và màu viền tại đây */
        border-radius: 5px; /* Tùy chọn: làm tròn các góc của viền */
        }
    </style>

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