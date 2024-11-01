function addToFavorites(tenSanPham, maSanPham) {
    // Tạo dữ liệu cần gửi
    const data = new URLSearchParams();
    data.append("maSanPham", maSanPham);

    // Gửi yêu cầu AJAX bằng fetch API
    fetch("cart_functions/add_favorites.php", {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    })
    .then(response => response.text())
    .then(result => {
        if (result === "success") {
            // Thêm vào danh mục yêu thích thành công
            localStorage.setItem('favoritesMessage', `Thêm sản phẩm "${tenSanPham}" vào danh mục Yêu Thích thành công!`);
            location.reload(true);
        } else if (result === "product_exists") {
            // Sản phẩm đã có trong danh mục yêu thích
            localStorage.setItem('favoritesMessage', `Sản phẩm "${tenSanPham}" đã có trong danh mục Yêu Thích.`);
            location.reload(true);
        } else if (result === "not_logged_in") {
            // Người dùng chưa đăng nhập
            localStorage.setItem('favoritesMessage', "Bạn cần *Đăng Nhập* trước khi thêm sản phẩm vào danh mục Yêu Thích.");
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
    const message = localStorage.getItem('favoritesMessage');
    if (message) {
        setTimeout(() => {
            $('#toast-message').text(message);
            $('#toast').toast({
                delay: 5000 // Thời gian hiển thị 5 giây
            });
            $('#toast').toast('show');

            localStorage.removeItem('favoritesMessage');
        }, 500); // Độ trễ 1 giây
    }
});
