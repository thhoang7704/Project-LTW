<?php
require_once "connectdb.php";

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy giá trị từ thanh tìm kiếm
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

// Thoát kí tự đặc biệt để tránh lỗi SQL Injection
$search_query = $conn->real_escape_string($search_query);

if ($search_query != '') {
    // Truy vấn tìm kiếm sản phẩm theo tên hoặc phân loại
    $sql = "SELECT * FROM sanpham WHERE tenSP LIKE '%$search_query%' OR loai LIKE '%$search_query%'";
    echo "Câu lệnh SQL: " . $sql . "<br>"; // Debug: In câu lệnh SQL

    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Hiển thị kết quả tìm kiếm
            while ($row = $result->fetch_assoc()) {
                // Xác định trang sản phẩm dựa trên phân loại
                $product_page = '';
                if ($row["loai"] == 'áo') {
                    $product_page = 'thun.php'; // Đảm bảo tên file đúng
                } elseif ($row["loai"] == 'quần') {
                    $product_page = 'pants.php'; // Đảm bảo tên file đúng
                } elseif ($row["loai"] == 'giày') {
                    $product_page = 'shoes.php'; // Đảm bảo tên file đúng
                } else {
                    $product_page = 'product.php'; // Trang mặc định cho các loại khác
                }

                echo '
                <a href="../sp/' . htmlspecialchars($product_page) . '?id=' . htmlspecialchars($row["id"]) . '">
                    <div class="each-item">
                        <div class="img">
                            <img src="../img/' . htmlspecialchars($row["image"]) . '" alt="" class="img-item">
                            <img src="../img/' . htmlspecialchars($row["hover_image"]) . '" alt="" class="img-hover">
                        </div>
                        <div class="name-item" style="text-align: center">' . htmlspecialchars($row["tenSP"]) . '</div>
                        <div class="cost-item" style="text-align: center"><span>' . number_format($row["price"], 0, ',', '.') . '</span><sup>đ</sup></div>
                        <a href="../html/checkout.php?id=' . htmlspecialchars($row["id"]) . '" class="buy">Mua ngay</a>
                    </div>
                </a>
                ';
            }
        } else {
            echo "Không tìm thấy sản phẩm nào.";
        }
    } else {
        echo "Lỗi trong truy vấn: " . $conn->error;
    }
} else {
    echo "Vui lòng nhập từ khóa tìm kiếm.";
}

// Đóng kết nối
$conn->close();
?>
