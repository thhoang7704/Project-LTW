<?php
require_once "connect_db.php"; // Đảm bảo đường dẫn đúng đến tệp kết nối

// Lấy idOrder từ URL
$idOrder = isset($_GET['idOrder']) ? trim($_GET['idOrder']) : null;

if (empty($idOrder)) {
    die("ID đơn hàng không hợp lệ.");
}

// Truy vấn để lấy thông tin chi tiết của đơn hàng từ cơ sở dữ liệu
$sql = "SELECT * FROM orders WHERE idOrder = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $idOrder);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Chi Tiết Đơn Hàng</title>
        <link rel='stylesheet' href='styles.css'> <!-- Thay đổi đường dẫn CSS nếu cần -->
    </head>
    <body>
        <h1>Chi Tiết Đơn Hàng</h1>
        <table border='1'>
            <tr>
                <th>ID Đơn Hàng</th>
                <td>" . htmlspecialchars($order['idOrder']) . "</td>
            </tr>
            <tr>
                <th>Tên Sản Phẩm</th>
                <td>" . htmlspecialchars($order['tenSP']) . "</td>
            </tr>
            <tr>
                <th>Số Lượng</th>
                <td>" . htmlspecialchars($order['quantity']) . "</td>
            </tr>
            <tr>
                <th>Hình Ảnh</th>
                <td><img src='../img/" . htmlspecialchars($order['image']) . "' alt='" . htmlspecialchars($order['tenSP']) . "' width='100' /></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td>" . number_format($order['price'], 0, ',', '.') . " đ</td>
            </tr>
            <tr>
                <th>Họ và Tên</th>
                <td>" . htmlspecialchars($order['hoTen']) . "</td>
            </tr>
            <tr>
                <th>Số Điện Thoại</th>
                <td>" . htmlspecialchars($order['sdt']) . "</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>" . htmlspecialchars($order['email']) . "</td>
            </tr>
            <tr>
                <th>Địa Chỉ</th>
                <td>" . htmlspecialchars($order['address']) . "</td>
            </tr>
        </table>
        <a href='../admin/quanlydonhang.php'>Quay lại danh sách đơn hàng</a>
    </body>
    </html>";
} else {
    echo "Không tìm thấy thông tin đơn hàng.";
}

$stmt->close();
$con->close();
