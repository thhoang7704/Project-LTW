<?php
session_start();

// Hiển thị thông báo nếu có
if (isset($_SESSION['success_message'])) {
    echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
    // Xóa thông báo sau khi hiển thị để tránh lặp lại khi tải lại trang
    unset($_SESSION['success_message']);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- Css -->
    <link rel="stylesheet" href="../css/search.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/info.css">
    <!-- js -->
    <script src="../js/login.js"></script>
    <title>TH Fashion</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-top">
                <div class="logo">
                    <a href="../html/index.php">
                        <img class="logo-img" src="../img/1.png" alt="/" style="width: 200px; height: 200px;">
                    </a>
                </div>
                <nav class="navbar">
                    <ul class="navbar__list">
                        <li class="navbar-item">
                            <a href="../html/index.php" class="navbar__link">Trang Chủ</a>
                        </li>
                        <li class="navbar-item">
                            <a href="all-item.php" class="navbar__link">Sản Phẩm</a>
                            <ul class="sub-navbar">
                                <li><a href="../sort sp/thun.php">Áo thun</a></li>
                                <li><a href="../sort sp/somi.php">Áo sơ mi</a></li>
                                <li><a href="../sort sp/short.php">Quần short</a></li>
                                <li><a href="../sort sp/jeans.php">Quần jean</a></li>
                                <li class="last__sub"><a href="../sort sp/non.php">Nón</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item">
                            <a href="" class="navbar__link">Bài Viết</a>
                        </li>
                        <li class="navbar-item">
                            <a href="" class="navbar__link">Liên Hệ</a>
                        </li>
                        <li class="navbar-item">
                            <a href="../html/gioithieu.php" class="navbar__link">Giới Thiệu</a>
                        </li>
                    </ul>
                </nav>
                <!-- SEARCH -->
                <div class="search-bar">
                    <form action="search.php" method="get">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="query">
                        <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>


                <div class="action">
                    <div class="action__notify">
                        <a href="">
                            <i class="fa-regular fa-bell"></i>
                        </a>
                    </div>
                    <div class="action__cart">
                        <i class="fa-solid fa-cart-shopping cart__head"></i>
                        </a>
                    </div>
                    <script>
                        // Tự động ẩn thông báo sau 2 giây
                        setTimeout(function() {
                            const message = document.querySelector('.success-message');
                            if (message) {
                                message.style.display = 'none';
                            }
                        }, 2000); // 2 giây
                    </script>
                    
                    <!-- Bấm vào hiện form -->
                     
                       <div class="action__login">
                        
                            <a href="#" id="loginIcon">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <div id="userInfo" class="user-info">
                            <h2>THÔNG TIN CỦA BẠN</h2>
                                <?php if (isset($_SESSION['login'])): ?>
                                    <div class="information">

                                        <p class="name-login"><strong>Họ và tên:<span class="information__user-name"><?php echo htmlspecialchars($_SESSION['login']); ?></span> </strong> </p>
                                        <p class="email-login"><strong>Email:<span class="information__user-email"><?php echo htmlspecialchars($_SESSION['email']); ?></span></strong> </p>
                                        <p class="sdt"><strong>SĐT :<span class="information__user-sdt"><span class="sdt-have0">0</span><?php echo htmlspecialchars($_SESSION['sdt']); ?></span></strong> </p>
                                    </div>
                                    <a href="logout.php" class="logout">Đăng xuất</a>
                                <?php else: ?>
                                    <p>Bạn chưa đăng nhập</p>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
            </div>
    </div>
    </header>
    <!-- Modal -->
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <!-- Login Form -->
            <div id="loginForm" class="form-nd">
                <h2>Đăng Nhập</h2>
                <form action="xulylogin.php" method="post">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required placeholder="Mật khẩu">
                    <button type="submit" id="loginButton">Đăng Nhập</button>
                </form>
                <p>Bạn chưa có tài khoản? <a href="#" id="showRegister">Đăng ký ngay</a></p>
            </div>

            <!-- Register Form -->
            <div id="registerForm" class="form-nd" style="display: none;">
                <h2>Đăng Ký</h2>
                <form action="xulydangky.php" method="post">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="hovaten" id="" placeholder="Họ và tên">
                    <label for="new-username">Tên đăng nhập:</label>
                    <input type="text" id="new-username" name="new-username" required placeholder="Tên đăng nhập">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email">
                    <label for="sdt">SDT</label>
                    <input type="tel" name="sdt" id="" placeholder="SDT">
                    <label for="new-password">Mật khẩu:</label>
                    <input type="password" id="new-password" name="new-password" required placeholder="Mật Khẩu">
                    <label for="confirm-password">Xác nhận mật khẩu:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required
                        placeholder="Xác nhận Mật Khẩu">
                    <button type="submit">Đăng Ký</button>
                </form>
                <p>Đã có tài khoản? <a href="#" id="showLogin">Đăng nhập</a></p>
            </div>
            <script src="../js/login.js"></script>
        </div>
    </div>

    <br /><br />
    <main>
        <div class="allitem">TẤT CẢ SẢN PHẨM</div>
        <div class="layout">
            <div class="layout__item">
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
                  <a href="../sp/' . htmlspecialchars($product_page) . '?idSP=' . htmlspecialchars($row["idSP"]) . '&loai=' . urlencode(htmlspecialchars($row["loai"])) . '">



                                <div class="each-item">
                                    <div class="img">
                                        <img src="../img/' . htmlspecialchars($row["image"]) . '" alt="" class="img-item">
                                        <img src="../img/' . htmlspecialchars($row["hover_image"]) . '" alt="" class="img-hover">
                                    </div>
                                    <div class="name-item" style="text-align: center">' . htmlspecialchars($row["tenSP"]) . '</div>
                                    <div class="cost-item" style="text-align: center"><span>' . number_format($row["price"], 0, ',', '.') . '</span><sup>đ</sup></div>
                                    <a href="../html/checkout.php?idSP=' . htmlspecialchars($row["idSP"]) . '" class="buy">Mua ngay</a>
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


            </div>

    </main>
    <div class="cart">
        <h2 class="cart-title">GIỎ HÀNG CỦA BẠN</h2>
        <div class="cart-content">
            <!-- <div class="cart-box">
          <img src="../img/2.png" alt="" class="cart-img">
          <div class="detail-box">
            <div class="cart-product-title">STUFFED WOLF TEE</div>
            <div class="cart-price"><span>490.000</span><sup>đ</sup></div>
            <input type="number" value="1" class="cart-quantity">
          </div>
          <i class="fa-solid fa-trash cart-remove"></i>
        </div> -->
        </div>
        <!-- total -->
        <div class="total">
            <div class="total-title">Tổng tiền:</div>
            <div class="total-price"><span>0</span><sup>đ</sup></div>
        </div>
        <!-- button -->
        <button type="button" class="btn-buy">Thanh toán</button>
        <!-- close -->
        <i class="fa-solid fa-x" id="close-cart"></i>
    </div>
    <script src="../js/cart.js"></script>
    <footer style="top: 1000px;">
        <div class="footer-container">

            <div class="information">
                <h1 class="last-footer">Thành Viên:</h2>
                    <h3>Trần Huy Hoàng</h3>
                    <h3>Võ Quang Thành </h3>
            </div>
            <div class="ms">
                <h1>MSSV</h1>
                <h3>2251040023</h3>
                <h3>2251150079</h3>
            </div>
            <div class="project">
                <h1 class="last-footer">Đề Tài:</h2>
                    <h3>SHOP BÁN QUẦN ÁO</h3>
            </div>
            <div class="contact">
                <h2><span class="email">Email:</span> 2251040023@ut.edu.vn</h2>
                <h2><span class="email">Email:</span> 2251150079@ut.edu.vn</h2>
            </div>
        </div>
    </footer>
    </div>
</body>

</html>

</body>

</html>