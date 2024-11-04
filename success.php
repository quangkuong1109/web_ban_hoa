<?php
session_start(); // Bắt đầu phiên làm việc
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <style>
        /* Căn giữa nội dung */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Chiều cao đầy đủ màn hình */
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Màu nền */
        }
        /* Hiệu ứng chữ uốn lượn */
        .wave-text {
            font-size: 2rem;
            font-weight: bold;
            color: #28a745; /* Màu chữ */
            animation: wave 1.5s infinite;
        }
        /* Tạo hiệu ứng uốn lượn */
        @keyframes wave {
            0%, 100% { transform: translateY(0); }
            25% { transform: translateY(-10px); }
            50% { transform: translateY(5px); }
            75% { transform: translateY(-5px); }
        }
        /* Đếm ngược thời gian */
        .countdown {
            font-size: 1.5rem;
            color: #6c757d; /* Màu chữ đếm ngược */
            margin-top: 10px;
            text-align: center;
        }
        /* Căn giữa các ảnh GIF */
        .gif-container {
            display: flex; /* Sử dụng flexbox */
            justify-content: space-between; /* Căn đều giữa hai ảnh */
            align-items: center; /* Căn giữa theo chiều dọc */
            margin-top: 50px;
        }
        .gif {
            max-width: 100px; /* Giới hạn kích thước ảnh */
        }
    </style>
</head>
<body>
    <div>
        <div class="gif-container">
            <img src="img/phaohoa.gif" alt="Loading" class="gif">
            <img src="img/phaohoa.gif" alt="Redirecting" class="gif">
        </div>
        <p class="wave-text" align="center">Đã đặt hàng thành công</p>
        <div class="countdown">
            <p>Trang sẽ tự động chuyển về trang chủ sau <span id="timer">5</span>s...</p>
        </div>
        <div class="gif-container">
            <img src="img/phaohoa.gif" alt="Loading" class="gif">
            <img src="img/phaohoa.gif" alt="Redirecting" class="gif">
        </div>
    </div>
    <script>
        // Đếm ngược từ 5 giây
        let timeLeft = 5;
        const timerElement = document.getElementById("timer");

        const countdown = setInterval(() => {
            timeLeft--;
            timerElement.textContent = timeLeft;
            // Khi đếm ngược về 0, chuyển hướng về trang chủ
            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = "index.php"; // Địa chỉ chuyển hướng về trang chính
            }
        }, 1000);
    </script>
</body>
</html>
