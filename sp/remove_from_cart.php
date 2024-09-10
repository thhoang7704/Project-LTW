<?php
session_start();

$idSP = isset($_GET['idSP']) ? $_GET['idSP'] : null;

if ($idSP && isset($_SESSION['cart'][$idSP])) {
    unset($_SESSION['cart'][$idSP]);
}

// Chuyển hướng người dùng trở lại trang giỏ hàng sau khi xóa
header("Location: cart.php");
exit();
?>
