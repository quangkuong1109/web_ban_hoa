    function addToCart(maSanPham, giaSP) {
        // Tạo dữ liệu cần gửi
        const data = new URLSearchParams();
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
                alert("Đã thêm vào giỏ hàng!");
                location.reload(true);
            } else {
                alert("Có lỗi xảy ra, vui lòng thử lại.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
