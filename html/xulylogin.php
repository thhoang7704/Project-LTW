<?php
require_once "connectdb.php";

$username = $_POST['username'];
$password = $_POST['password'];

$username = trim(strip_tags($_POST['username']));
$password = trim(strip_tags($_POST['password']));

$sql = "SELECT idTK, TenTK FROM taikhoan WHERE TenTK='{$username}' AND MK='{$password}'";
$kq  = $conn->query($sql);
$numrows_user = $kq->rowCount();
if ($numrows_user == 1) {
    session_start();
    $row_user = $kq->fetch();
    $_SESSION['login_id'] = $row_user['idTK']; // tạo biến ghi nhận đã login
    $_SESSION['login_user'] = $row_user['TenTK'];
    echo "Đăng nhập thành công";
    header("location: index.php");
} else header("location: gioithieu.php");
echo "Vui lòng đăng nhập lại";
