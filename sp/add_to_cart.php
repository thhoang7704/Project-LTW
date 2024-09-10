<?php
session_start();

$idSP = isset($_POST['idSP']) ? $_POST['idSP'] : null;
$quantity = 1;  // Số lượng mặc định là 1, bạn có thể cho phép người dùng chọn số lượng

if ($idSP) {
    // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới trong session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
    if (isset($_SESSION['cart'][$idSP])) {
        $_SESSION['cart'][$idSP] += $quantity;
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
        $_SESSION['cart'][$idSP] = $quantity;
    }

    echo "Sản phẩm đã được thêm vào giỏ hàng!";
} else {
    echo "Không có sản phẩm để thêm!";
}
?>
