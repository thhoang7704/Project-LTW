<?php
require_once "connect_db.php"; // Đảm bảo đường dẫn đúng đến tệp kết nối

// Truy vấn để lấy tất cả đơn hàng từ cơ sở dữ liệu
$sql = "SELECT idOrder, hoTen FROM orders";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Quản lý Đơn Hàng</title>
        <link rel='stylesheet' href='styles.css'> <!-- Thay đổi đường dẫn CSS nếu cần -->
    </head>
    <body>
        <h1>Danh Sách Đơn Hàng</h1>
        <table border='1'>
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Tên Người Đặt</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>";

    // Hiển thị thông tin đơn hàng
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['idOrder']) . "</td>
                <td>" . htmlspecialchars($row['hoTen']) . "</td>
                <td><a href='order_details.php?idOrder=" . urlencode($row['idOrder']) . "'>Xem Chi Tiết</a></td>
            </tr>";
    }

    echo "</tbody>
        </table>
    </body>
    </html>";
} else {
    echo "Chưa có đơn hàng nào.";
}

$con->close();
