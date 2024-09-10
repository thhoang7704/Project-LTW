<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanh toán hóa đơn</title>
    <link rel="stylesheet" href="../css/checkout.css" />
</head>

<body>


    <?php
require_once "../html/connectdb.php";
$conn = new mysqli($host, $username, $password, $dbname);

// Xử lý idSP và quantity từ URL
$idSP = isset($_GET['idSP']) ? trim($_GET['idSP']) : null;
$quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1; // Mặc định là 1 nếu không có quantity

// Giải mã URL và loại bỏ ký tự không hợp lệ
$idSP = urldecode($idSP); // Giải mã URL nếu cần thiết
$idSP = preg_replace('/[^a-zA-Z0-9]/', '', $idSP); // Loại bỏ ký tự không hợp lệ

if (empty($idSP)) {
    die("Không có sản phẩm nào để thanh toán.");
}

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM sanpham WHERE idSP = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $idSP);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Sản phẩm không tồn tại.");
}

// Hiển thị form đặt hàng với thông tin sản phẩm
echo "<form action='#' method='post' id='orderForm'>";
echo '<div class="container">
        <div class="column1">
            <h2><a href="../html/index.php">TH FASHION</a></h2>
            <p><span>Thông tin giao hàng</span></p>
            <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" type="text" id="hoten" name="hoten" size="30" required/>
            <input placeholder="Email" autocapitalize="off" spellcheck="false" type="email" id="email" name="email" required />
            <input placeholder="Số điện thoại" autocapitalize="off" spellcheck="false" type="tel" id="sdt" name="sdt" required />
            <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false" type="text" id="address" name="address" required />
            <p><span>Phương thức vận chuyển</span></p>
            <input type="text" readonly value="Giao hàng tận nơi" id="vanchuyen" />
            <p><span>Phương thức thanh toán</span></p>
            <input type="text" readonly value="Thanh toán khi giao hàng (COD)" id="vanchuyen" />
        </div>
        <div class="divider"></div>
        <div class="column2">';

$price = floatval(str_replace(',', '', $row['price']));
$itemTotal = $price * $quantity;
$totalPrice = $itemTotal;
$shippingCost = 30000; // Giá cố định cho phí vận chuyển
$finalTotal = $totalPrice + $shippingCost;

// Hiển thị thông tin sản phẩm
echo "<div class='cart-content'>";
echo "<div class='cart-box'>";
echo "<img src='../img/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['tenSP']) . "' class='cart-img' />";
echo "<div class='detail-box'>";
echo "<div class='cart-product-title'>" . htmlspecialchars($row['tenSP']) . "</div>";
echo "<div class='cart-price'><span>" . number_format($price, 0, ',', '.') . "</span><sup>đ</sup></div>";
echo "<div>Số lượng: " . $quantity . "</div>";
echo "</div>";
echo "<div class='border'></div>";
echo "</div>";
echo "</div>";

echo "
    <div class='border'></div>
    <div class='calculate'>
        <div class='calculate-title'>Tạm tính</div>
        <div class='calculate-price'><span>" . number_format($totalPrice, 0, ',', '.') . "</span><sup>đ</sup></div>
    </div>
    <div class='ship'>
        <div class='shipping-title'>Phí vận chuyển</div>
        <div class='shipping-price'><span>" . number_format($shippingCost, 0, ',', '.') . "</span><sup>đ</sup></div>
    </div>
    <div class='border'></div>
    <div class='total'>
        <div class='total-title'>Tổng tiền</div>
        <div class='total-price'><span>" . number_format($finalTotal, 0, ',', '.') . "</span><sup>đ</sup></div>
    </div>
    <div class='dat-hang'>
        <button class='dat' type='submit'>Đặt hàng</button>
    </div>
</div>
</form>";
// Xử lý đơn hàng khi nhấn nút "Đặt hàng"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = htmlspecialchars($_POST['hoten']);
    $email = htmlspecialchars($_POST['email']);
    $sdt = htmlspecialchars($_POST['sdt']);
    $address = htmlspecialchars($_POST['address']);

    foreach ($idSPArray as $index => $idSP) {
        $quantity = isset($quantityArray[$index]) ? intval($quantityArray[$index]) : 1;

        // Truy vấn sản phẩm
        $sql = "SELECT * FROM sanpham WHERE idSP = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $idSP);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $tenSP = htmlspecialchars($row['tenSP']);
            $image = htmlspecialchars($row['image']);
            $price = floatval(str_replace(',', '', $row['price']));
            $itemTotal = $price * $quantity;

            // Lưu thông tin vào bảng order
            $sqlOrder = "INSERT INTO orders (idSP, tenSP, image, quantity, price, totalPrice, hoTen, email, sdt, address)
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtOrder = $conn->prepare($sqlOrder);
            $stmtOrder->bind_param("ssssssssss", $idSP, $tenSP, $image, $quantity, $price, $itemTotal, $hoTen, $email, $sdt, $address);
            $stmtOrder->execute();
            $stmtOrder->close();
        }
        $stmt->close();
    }

    echo "<script>alert('Đặt hàng thành công!');</script>";
}

$conn->close();
?>
</body>

</html>