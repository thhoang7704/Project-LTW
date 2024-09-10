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
        header("Location: admin.php");
    }
}
?>
<link rel="stylesheet" href="../css/login.css">
<div id="loginForm" class="form-nd">
    <h2>Đăng Nhập</h2>
    <form action="xulyloginadmin.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required placeholder="Mật khẩu">
        <button type="submit" id="loginButton" name="login">Đăng Nhập</button>
    </form>