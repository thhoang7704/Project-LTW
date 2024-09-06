<?php

session_start();
require_once "../html/connectdb.php";

if (isset($_POST['login'])) {
    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));

    $stmt = $conn->prepare("SELECT TenTK, quyen FROM taikhoan WHERE TenTK = :username AND MK = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['login'] = $username;

        header("Location: admin.php");
    } else {
        // echo 'Đăng nhập không thành công vui lòng đăng nhập lại';
        header("Location: dangnhapadmin.php");
    }
}