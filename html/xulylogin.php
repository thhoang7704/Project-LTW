<?php

session_start();
require_once "connectdb.php";

if (isset($_POST['login'])) {
    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));

    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE TenTK = :username AND MK = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['login'] = $username;
        header("Location: index.php"); // Trang chủ dành cho người dùng thông thường
        exit();
    } else {
        echo 'Đăng nhập không thành công vui lòng đăng nhập lại';
    }
?>
    <a href="index.php">Quay lại đăng nhập</a>
<?php

} ?>