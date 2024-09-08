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

    // Lấy kết quả truy vấn
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng fetch để lấy một hàng dữ liệu

    if ($user) {
        // Lưu thông tin người dùng vào session
        $_SESSION['login'] = $user['hoTen']; // Sửa để lưu họ và tên
        $_SESSION['email'] = $user['email'];
        $_SESSION['sdt'] = $user['sdt'];
        $_SESSION['success_message'] = "Đăng nhập thành công!";
        // Chuyển hướng đến trang chủ
        header("Location: index.php");
        exit();
    } else {
        echo 'Đăng nhập không thành công vui lòng đăng nhập lại';
    }
?>
    <a href="index.php">Quay lại đăng nhập</a>
<?php
}
?>
