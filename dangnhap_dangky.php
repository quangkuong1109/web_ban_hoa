<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập/ Đăng ký</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">


    <!-- Main css -->
    <link rel="stylesheet" href="css/style_dangnhap_dangky.css">
    
    <style>
        /* Ẩn phần sign-up khi tải trang */
        .signup { 
            display: none; 
        }
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup" id="signup-section">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Tên của bạn" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email của bạn" required/>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="phonenumber" id="phonenumber" placeholder="Số điện thoại của bạn" required />
                            </div>
                            <div class="form-group">
                                <label for="home"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="home" id="home" placeholder="Địa chỉ"/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-circle"></i></label>
                                <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Mật khẩu" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với các điều khoản trong  <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link" id="show-signin">Tôi đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sign in  Form -->
        <section class="sign-in" id="signin-section">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link" id="show-signup">Tạo tài khoản</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Tên đăng nhập" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mật khẩu" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ mật khẩu</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Hoặc đăng nhập bằng</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script>
        // Lấy các phần tử section
        const signUpSection = document.getElementById('signup-section');
        const signInSection = document.getElementById('signin-section');

        // Lấy các liên kết chuyển đổi
        const showSignUp = document.getElementById('show-signup');
        const showSignIn = document.getElementById('show-signin');

        // Thêm sự kiện cho liên kết "Create an account"
        showSignUp.addEventListener('click', function(e) {
            e.preventDefault();
            signUpSection.style.display = 'block';  // Hiển thị form Sign Up
            signInSection.style.display = 'none';   // Ẩn form Sign In
        });

        // Thêm sự kiện cho liên kết "I am already member"
        showSignIn.addEventListener('click', function(e) {
            e.preventDefault();
            signUpSection.style.display = 'none';   // Ẩn form Sign Up
            signInSection.style.display = 'block';  // Hiển thị form Sign In
        });
    </script>
</body>
</html>
