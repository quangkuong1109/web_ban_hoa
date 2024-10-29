<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style_dangnhap_dangky.css">
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <form method="POST" class="register-form" action="register.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="hoten" id="name" placeholder="Tên của bạn" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email của bạn" required />
                            </div>
                            <div class="form-group">
                                <label for="phonenumber"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="sdt" id="phonenumber" placeholder="Số điện thoại của bạn" required />
                            </div>
                            <div class="form-group">
                                <label for="home"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="diachi" id="home" placeholder="Địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-circle"></i></label>
                                <input type="text" name="taikhoan" id="username" placeholder="Tên đăng nhập" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="matkhau" id="pass" placeholder="Mật khẩu" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="nhaplaimatkhau" id="re_pass" placeholder="Nhập lại mật khẩu" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký" />
                            </div>
                            <?php
                            session_start();
                            // Kiểm tra nếu có thông báo lỗi từ phiên
                            if (isset($_SESSION['errors'])) {
                                echo '<div class="alert alert-danger">' . implode("<br>", $_SESSION['errors']) . '</div>';
                                // Xóa thông báo lỗi sau khi hiển thị
                                unset($_SESSION['errors']);
                            } else {
                                if (isset($_SESSION['message'])) { //nếu đăng ký thành công thì hiển thị thông báo từ phiên 
                                    echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['message']) . '</div>';
                                    unset($_SESSION['message']);
                                }
                            }

                            ?>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="dangnhap.php" class="signup-image-link">Tôi đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>