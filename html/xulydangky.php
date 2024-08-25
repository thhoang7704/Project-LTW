<?php
require_once "connectdb.php";
$username = $_POST['new-username'];
$password = $_POST['new-password'];
$repass = $_POST['confirm-password'];
$hovaten = $_POST['hovaten'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
?>
<?php
// validate dữ liệu
$username = trim(strip_tags($username));
$password = trim(strip_tags($password));
$repass =  trim(strip_tags($repass));
$email =  trim(strip_tags($email));
settype($sdt, "int");
?>
<?php
$loi = "";
if ($sdt == 0) $loi .= "Bạn chưa nhập số điện thoại<br>";
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) $loi .= "Email không đúng<br>";
if ($password != $repass) $loi .= "Hai mật khẩu không giống nhau<br>";
?>
<?php
$sql = "INSERT INTO taikhoan(hoTen,TenTK,MK,email,sdt,quyen) VALUES ('$hovaten', '$username', '$password','$email', '$sdt', 'user')";
$kq = $conn->exec($sql);
if ($kq == 1) {
    echo "Đăng ký thành công";
} else echo "Đăng ký không thành công";
