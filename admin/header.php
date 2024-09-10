<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php
    session_start();
    include 'connect_db.php';
    if (!empty($_SESSION['login'])) { //Kiểm tra xem đã đăng nhập chưa?
    ?>
        <div id="admin-heading-panel">
            <div class="container">
                <div class="left-panel">
                    Xin chào <span>Admin1</span>
                </div>
                <div class="right-panel">
                    <a href="admin.php">Trang chủ</a>
                    <a href="logoutadmin.php">Đăng xuất</a>
                </div>
            </div>
        </div>
        <div id="content-wrapper">
            <div class="container">
                <div class="left-menu">
                    <div class="menu-heading">Admin Menu</div>
                    <div class="menu-items">
                        <ul>
                            <li><a href="product_listing.php">Sản phẩm</a></li>
                            <li><a href="quanlydonhang.php">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>