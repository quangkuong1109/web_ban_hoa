function addToCart(tenSanPham, maSanPham, giaSP) {
    const quantityInput = document.getElementById("soluong_sp");
    const quantity = quantityInput ? quantityInput.value : 1;
    // Tạo dữ liệu cần gửi
    const data = new URLSearchParams();
    data.append("tenSanPham", tenSanPham);
    data.append("maSanPham", maSanPham);
    data.append("giaSP", giaSP);
    data.append("soluong_sp", quantity);

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
            // Thêm vào giỏ hàng thành công
            localStorage.setItem('cartMessage', `Thêm sản phẩm "${tenSanPham}" vào giỏ hàng thành công!`);
            location.reload(true);
        } else if (result === "not_logged_in") {
            // Người dùng chưa đăng nhập
            localStorage.setItem('cartMessage', "Bạn cần *Đăng Nhập* trước khi thêm sản phẩm vào giỏ hàng");
            location.reload(true);
        } else {
            alert("Có lỗi xảy ra, vui lòng thử lại.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

// Hiển thị thông báo từ localStorage khi trang load
window.addEventListener('load', () => {
    const message = localStorage.getItem('cartMessage');
    if (message) {
        setTimeout(() => {
            $('#toast-message').text(message);
            $('#toast').toast({
                delay: 5000 // Thời gian hiển thị 5 giây
            });
            $('#toast').toast('show');

            localStorage.removeItem('cartMessage');
        }, 500); // Độ trễ 1 giây
    }
});
