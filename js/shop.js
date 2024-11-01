function sortProducts(sortType) {
    // Lấy giá trị của các tham số hiện tại
    const urlParams = new URLSearchParams(window.location.search);
    const priceRange = urlParams.get('price-range') || 'all'; // Giá trị lọc giá
    const theme = urlParams.get('theme') || 'all'; // Giá trị lọc chủ đề
    // Cập nhật thông báo
    let message = '';
    switch (sortType) {
        case 'asc':
            message = 'Sắp xếp sản phẩm theo giá từ thấp đến cao!';
            break;
        case 'desc':
            message = 'Sắp xếp sản phẩm theo giá từ cao đến thấp!';
            break;
        case 'name_asc':
            message = 'Sắp xếp sản phẩm theo tên từ A-Z!';
            break;
        case 'name_desc':
            message = 'Sắp xếp sản phẩm theo tên từ Z-A!';
            break;
    }
    $('#toast-message').text(message);
    // Hiển thị toast
    $('#toast').toast({
        delay: 5000 // Thời gian hiển thị 5 giây
    });
    $('#toast').toast('show');
    // Chuyển hướng đến trang với tham số lọc và sắp xếp
    window.location.href = `?page=1&price-range=${encodeURIComponent(priceRange)}&theme=${encodeURIComponent(theme)}&sapxep=${sortType}`;
}
