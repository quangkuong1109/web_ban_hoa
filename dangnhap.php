<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style_dangnhap_dangky.css">
</head>

<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/signin-image.jpg" alt="sign in image"></figure>
                        <a href="dangky.php" class="signup-image-link">Tạo tài khoản</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>

                        <form method="POST" class="register-form" action="login.php">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="taikhoan" id="your_name" placeholder="Tên đăng nhập" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="matkhau" id="your_pass" placeholder="Mật khẩu" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập" />
                            </div>
                            <div>
                                <?php
                                session_start();
                                // Kiểm tra nếu có thông báo lỗi từ phiên
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['error']) . '</div>';
                                    // Xóa thông báo lỗi sau khi hiển thị
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>