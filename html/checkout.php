<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanh toán hóa đơn</title>
    <link rel="stylesheet" href="../css/checkout.css" />
</head>

<body>
    <div class="container">
        <div class="column1">
            <h2><a href="../html/index.php">TH FASHION</a></h2>
            <p><span>Thông tin giao hàng</span></p>
            <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" type="text" id="hoten" size="30" />
            <input placeholder="Email" autocapitalize="off" spellcheck="false" type="email" id="email" />
            <input placeholder="Số điện thoại" autocapitalize="off" spellcheck="false" type="tel" id="sdt" />
            <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false" type="text" id="address" />
            <div class="tinh">
                <label class="fiel-label" for="shipping_province">Tỉnh/Thành</label>
                <select name="shipping_province" id="shipping_province" class="diachi">
                    <option value="">Tỉnh/thành phố</option>
                </select>
            </div>
            <div class="huyen">
                <label class="fiel-label" for="shipping_district">Quận/huyện</label>
                <select name="shipping_district" id="shipping_district" class="diachi" disabled>
                    <option value="">Quận/huyện</option>
                </select>
            </div>
            <div class="xa">
                <label class="fiel-label" for="shipping_ward">Phường/xã</label>
                <select name="shipping_ward" id="shipping_ward" class="diachi" disabled>
                    <option value="">Phường/xã</option>
                </select>
            </div>
            <p><span>Phương thức vận chuyển</span></p>
            <input type="text" readonly value="Giao hàng tận nơi" id="vanchuyen" />
            <p><span>Phương thức thanh toán</span></p>
            <input type="text" readonly value="Thanh toán khi giao hàng (COD)" id="vanchuyen" />
        </div>
        <div class="divider"></div>
        <div class="column2">
            <?php
            require_once "../html/connectdb.php";
            $conn = new mysqli($host, $username, $password, $dbname);
            // Lấy ID sản phẩm từ URL
            // Lấy ID sản phẩm từ URL
            $idSP = isset($_GET['idSP']) ? $_GET['idSP'] : null;
            if ($idSP === null) {
                die("ID sản phẩm không được cung cấp");
            }

            // Chuẩn bị câu truy vấn SQL
            $sql = "SELECT * FROM sanpham WHERE idSP = ?";

            // Chuẩn bị statement để tránh SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $idSP);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Tính giá cả và phí vận chuyển
                    $price = floatval(str_replace(',', '', $row['price']));
                    $quantity = 1; // Số lượng mua
                    $shippingCost = 30000; // Giá cố định cho phí vận chuyển

                    // Tính tổng tiền
                    $totalPrice = $price * $quantity + $shippingCost;

                    // Hiển thị thông tin sản phẩm
                    echo "<form action='#' method='post' id='orderForm'>";
                    echo "<div class='cart-content'>";
                    echo "<div class='cart-box'>";
                    echo "<img src='../img/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['tenSP']) . "' class='cart-img' />";
                    echo "<div class='detail-box'>";
                    echo "<div class='cart-product-title'>" . htmlspecialchars($row['tenSP']) . "</div>";
                    echo "<div class='cart-price'><span>" . number_format(floatval(str_replace(',', '', $row['price'])), 0, ',', '.') . "</span><sup>đ</sup></div>";
                    echo "<input type='number' value='1' min='1' class='cart-quantity' />";
                    echo "</div>";
                    echo "<div class='border'></div>";
                    echo "</div>";
                    echo "</div>";
                    echo "
              <div class='discount'>
                  <input type='text' placeholder='Mã giảm giá' id='code' name='discountCode' />
                  <button id='use'>Sử dụng</button>
              </div>
              <div class='border'></div>
              <div class='calculate'>
                  <div class='calculate-title'>Tạm tính</div>
                  <div class='calculate-price'><span>" . number_format($price * $quantity, 0, ',', '.') . "</span><sup>đ</sup></div>
              </div>
              <div class='ship'>
                  <div class='shipping-title'>Phí vận chuyển</div>
                  <div class='shipping-price'><span>" . number_format($shippingCost, 0, ',', '.') . "</span><sup>đ</sup></div>
              </div>
              <div class='border'></div>
              <div class='total'>
                  <div class='total-title'>Tổng tiền</div>
                  <div class='total-price'><span>" . number_format($totalPrice, 0, ',', '.') . "</span><sup>đ</sup></div>
              </div>
              <div class='dat-hang'>
                  <button class='dat' type='submit'>Đặt hàng</button>
              </div>
          </form>
          ";
                    break;
                }
            } else {
                echo "Sản phẩm không tồn tại";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy thông tin từ form
                $tenSP = htmlspecialchars($row['tenSP']);
                $image = htmlspecialchars($row['image']);
                $price = floatval(str_replace(',', '', $row['price']));
                $quantity = 1;

                // Tính toán tổng tiền
                $totalPrice = $price * $quantity + 30000;

                // Lưu thông tin vào bảng order
                // $sql = "INSERT INTO orders (idSP,tenSP, image, quantity,price, totalPrice)
                //         VALUES (('" . $idSP . "', '" . $tenSP . "', '" . $image . "', '" . $quantity . "','" . $price . "','" . $totalPrice . "')";
                $sql = "INSERT INTO orders (idSP, tenSP, image, quantity, price, totalPrice)
        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt1 = $conn->prepare($sql);
                $stmt1->bind_param("ssssss", $idSP, $tenSP, $image, $quantity, $price, $totalPrice);

                if ($stmt1->execute()) {
                    echo "<script>alert('Đặt hàng thành công!');</script>";
                } else {
                    echo "<script>alert('Lỗi khi lưu đơn hàng. Vui lòng thử lại.');</script>";
                }
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
</body>
<script src="../js/address.js"></script>

</html>