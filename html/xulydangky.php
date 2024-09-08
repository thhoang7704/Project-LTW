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
// Kiểm tra xem username đã tồn tại chưa
$sql_check = "SELECT * FROM taikhoan WHERE TenTK = '$username'";
$result = $conn->query($sql_check);
$sql_check_email = "SELECT * FROM taikhoan WHERE email = '$email'";
$result_email = $conn->query($sql_check_email);
$sql_check_sdt = "SELECT * FROM taikhoan WHERE sdt = '$sdt'";
$result_sdt = $conn->query($sql_check_sdt);
$loi = "";
$loi_username = "";
$loi_email = "";
$loi_sdt = "";
if ($sdt == 0) $loi_sdt .= "Bạn chưa nhập số điện thoại--";
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) $loi_email .= "Email không đúng--";
if ($password != $repass) $loi .= "Hai mật khẩu không giống nhau--";
// Nếu username đã tồn tại
if ($result->rowCount() > 0) {
    $loi_username .= "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác--";
}
if ($result_email->rowCount() > 0) $loi_email .= "Email đã được sử dụng. Vui lòng chọn email khác.--";
if ($result_sdt->rowCount() > 0) $loi_sdt .= "Số điện thoại đã được sử dụng. Vui lòng chọn số điện thoại khác.";

// Nếu không có lỗi nào, tiến hành insert
if (empty($loi)) {
    $sql = "INSERT INTO taikhoan(hoTen,TenTK,MK,email,sdt,quyen) VALUES ('$hovaten', '$username', '$password','$email', '$sdt', 'user')";
    $kq = $conn->exec($sql);
    if ($kq == 1) {
        echo "Đăng ký thành công";
    } else {
        echo "Đăng ký không thành công";
        exit();
    }
}
if (!empty($loi_username) || !empty($loi_email) || !empty($loi_sdt)) {
    header("Location: index.php?error_username=$loi_username&error_email=$loi_email&error_sdt=$loi_sdt");
    exit();
}
?>
<a href="index.php"> Quay lại đăng nhập</a>