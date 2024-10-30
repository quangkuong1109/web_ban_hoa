function addToCart(tenSanPham, maSanPham, giaSP) {
    // Tạo dữ liệu cần gửi
    const data = new URLSearchParams();
    data.append("tenSanPham", tenSanPham);
    data.append("maSanPham", maSanPham);
    data.append("giaSP", giaSP);

    // Gửi yêu cầu AJAX bằng fetch API
    fetch("cart_functions/add_to_cart.php", {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    })
    .then(response => response.text())
    .then(result => {
        if (result === "success") {
            // Lưu thông báo vào localStorage để giữ thông báo qua trang load lại
            localStorage.setItem('cartMessage', `Thêm sản phẩm "${tenSanPham}" vào giỏ hàng thành công!`);
            
            // Load lại trang
            location.reload(true);
        } else {
            alert("Có lỗi xảy ra, vui lòng thử lại.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

// Sau khi trang đã load xong, kiểm tra xem có thông báo trong localStorage không
window.addEventListener('load', () => {
    const message = localStorage.getItem('cartMessage');
    if (message) {
        // Sử dụng setTimeout để hiển thị thông báo sau 1 giây
        setTimeout(() => {
            // Hiển thị thông báo toast
            $('#toast-message').text(message);
            $('#toast').toast({
                delay: 5000 // Thời gian hiển thị 5 giây
            });
            $('#toast').toast('show');

            // Xóa thông báo khỏi localStorage sau khi hiển thị
            localStorage.removeItem('cartMessage');
        }, 500); // Độ trễ 1 giây
    }
});
