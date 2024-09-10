<?php
session_start();
require_once "../html/connectdb.php";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra xem giỏ hàng có sản phẩm nào không
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$totalPrice = 0;

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>

    <h2>Giỏ hàng của bạn</h2>
    <!-- Nút quay lại trang chủ -->
    <button><a href="../html/index.php" class="back-home-btn">Quay lại trang chủ</a></button>
    <style>
    .back-home-btn {
        text-decoration: none;
    }
    </style>
    <?php
    // Khởi tạo giá trị ban đầu
    $totalPrice = 0;

    // Kiểm tra nếu giỏ hàng có sản phẩm
    if (isset($cart) && count($cart) > 0): ?>
    <div class="cart-items">
        <?php foreach ($cart as $idSP => $quantity):
                // Truy vấn sản phẩm từ cơ sở dữ liệu
                $sql = "SELECT * FROM sanpham WHERE idSP = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $idSP);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row):
                    $price = $row["price"];
                    $totalPrice += $price * $quantity;
            ?>
        <div class="cart-item">
            <img src="../img/<?php echo htmlspecialchars($row['image']); ?>" alt="Sản phẩm" class="cart-item-img">
            <div class="cart-item-details">
                <div class="cart-item-name"><?php echo htmlspecialchars($row['tenSP']); ?></div>
                <div class="cart-item-price"><?php echo number_format($price, 0, ',', '.'); ?>đ</div>
                <div class="cart-item-quantity">
                    Số lượng: <?php echo $quantity; ?>
                </div>
            </div>
            <div class="cart-item-remove">
                <a href="remove_from_cart.php?idSP=<?php echo $idSP; ?>">Xóa</a>
            </div>
        </div>
        <?php
                endif;
                // Đóng statement sau khi thực hiện
                $stmt->close();
                ?>
        <?php endforeach; ?>
    </div>

    <div class="cart-summary">
        <div class="cart-total">
            <span>Tổng tiền:</span>
            <span><?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</span>
        </div>

        <!-- Form chứa dữ liệu giỏ hàng để gửi khi nhấn nút Thanh toán -->
        <form action="../html/checkout.php" method="GET">
            <?php foreach ($cart as $idSP => $quantity): ?>
            <!-- Truyền idSP của từng sản phẩm -->
            <input type="hidden" name="idSP[]" value="<?php echo htmlspecialchars($idSP); ?>">
            <!-- Truyền số lượng tương ứng của từng sản phẩm -->
            <input type="hidden" name="quantity[]" value="<?php echo htmlspecialchars($quantity); ?>">
            <?php endforeach; ?>

            <!-- Nút Thanh toán -->
            <button type="submit">Thanh toán</button>

        </form>
    </div>

    <?php else: ?>
    <p>Giỏ hàng của bạn đang trống.</p>
    <?php endif; ?>

</body>

</html>