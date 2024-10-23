<?php
require_once("database_connect/db_connect.php");

$priceRange = isset($_GET['price_range']) ? $_GET['price_range'] : 'all';
$query = "SELECT * FROM sanpham";

if ($priceRange != 'all') {
    if (strpos($priceRange, '-') !== false) {
        [$minPrice, $maxPrice] = explode('-', $priceRange);
        $query .= " WHERE gia BETWEEN $minPrice AND $maxPrice";
    } else {
        $query .= " WHERE gia > $priceRange";
    }
}

$result = $db->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<div class="product-item">';
    echo '<img src="' . $row['image'] . '" alt="' . $row['ten_sp'] . '">';
    echo '<p>' . $row['ten_sp'] . '</p>';
    echo '<p>' . $row['gia'] . ' VND</p>';
    echo '</div>';
}
?>
