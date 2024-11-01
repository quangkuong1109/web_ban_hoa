<?php
session_start();          // Khởi động session nếu chưa có
session_unset();          // Xóa tất cả các biến session
session_destroy();        // Hủy session
header("Location: index.php"); // Chuyển hướng về index.php sau khi đăng xuất
exit();
?>