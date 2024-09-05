<?php

session_start();
require_once "connectdb.php";

if (isset($_POST['login'])) {
    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));

    $stmt = $conn->prepare("SELECT TenTK, quyen FROM taikhoan WHERE TenTK = :username AND MK = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['login'] = $username;

        // Kiểm tra quyền truy cập
        $query = "SELECT quyen FROM taikhoan WHERE TenTK = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result['quyen'] == 'admin') {
            header("Location: admin.php"); // Trang quản trị dành cho admin
        } else {
            header("Location: index.php"); // Trang chủ dành cho người dùng thông thường
        }
    } else {
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại");</script>';
        header("Location: gioithieu.php"); // file nào cũng được
    }
}
