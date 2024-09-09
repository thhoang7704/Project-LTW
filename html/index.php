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
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/notify.css">
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
                            <a href="../html/baiviet.php" class="navbar__link">Bài Viết</a>
                        </li>
                        <li class="navbar-item">

                            <style>
                                .contact-overlay {
                                    display: none;
                                    position: fixed;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    background-color: rgba(0, 0, 0, 0.5);
                                    /* Màu nền mờ tối */
                                    z-index: 998;
                                    /* Dưới modal nhưng trên các nội dung khác */
                                }

                                .contact-modal {
                                    display: none;
                                    position: fixed;
                                    top: 0;
                                    right: 0;
                                    height: 100%;
                                    width: 30%;
                                    background-color: white;
                                    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
                                    z-index: 999;
                                    /* Trên overlay */
                                    overflow-y: auto;
                                    border-radius: 5px;
                                }

                                .contact-modal-content {
                                    padding: 20px;
                                    position: relative;
                                    top: 80px;
                                }

                                .contact-close {
                                    color: #aaa;
                                    float: right;
                                    font-size: 28px;
                                    font-weight: bold;
                                }

                                .contact-close:hover,
                                .contact-close:focus {
                                    color: black;
                                    text-decoration: none;
                                    cursor: pointer;
                                }

                                .facebook {
                                    display: flex;
                                }


                                .contact-modal-content h2 {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    color: #990000;
                                    font-size: 33px;
                                }

                                p {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .contact-sdt {
                                    left: 3px;
                                }

                                .contact-sdt i {
                                    padding: 15px 0px;
                                    font-size: 20px;

                                }

                                .email-contact i {
                                    padding: 15px 0px;
                                    font-size: 20px;
                                }

                                .facebook a {
                                    padding-top: 15px;
                                    padding-bottom: 40px;
                                }

                                .thank {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    font-size: 18px;
                                }
                            </style>
                            <a href="#" class="navbar__link" id="contactModalLink">Liên Hệ</a>

                            <div id="contactOverlay" class="contact-overlay"></div>

                            <div id="contactModal" class="contact-modal">
                                <div class="contact-modal-content">
                                    <span class="contact-close">&times;</span>
                                    <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                                    <p>Trung tâm Tư vấn Khách hàng</p>

                                    <br>
                                    <span class="sdt"><i class="fa-solid fa-phone">0372605077</i> </span> <br>
                                    <span class="sdt"><i class="fa-solid fa-phone">0976925204</i> </span>
                                    <span class="email">
                                        <i class="fa-regular fa-envelope">
                                            <span class="email-detail">2251040023@ut.edu.vn</span>
                                        </i>
                                    </span><br>
                                    <span class="email-contact">
                                        <i class="fa-regular fa-envelope">
                                            <span class="email-detail">2251150079@ut.edu.vn</span>
                                        </i>
                                    </span><br>
                                    <span class="facebook">

                                        <a href="https://www.facebook.com/linhvai.hon"><i
                                                class="fa-brands fa-facebook"></i>Facebook</a>
                                    </span>
                                    <p class="thank">THFashion rất hân hạnh được hỗ trợ quý khách.</p>
                                </div>
                            </div>
                            <script src="../js/contact.js"></script>
                        </li>
                        <li class="navbar-item">
                            <a href="../html/gioithieu.php" class="navbar__link">Giới Thiệu</a>
                        </li>
                    </ul>
                </nav>
                <!-- SEARCH -->
                <div class="search-bar">
                    <form action="search.php" autocomplete="off" method="get">
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
                    <div class="header__notify">
                        <header class="header__notify-header">
                            <h3>THÔNG BÁO MỚI NHẬN</h3>
                        </header>
                        <a href="../html/gioithieu.php" class="link-notify">

                            <div class="header__notify-list">
                                <div class="header__notify-item">
                                    <div class="header__notify-link">
                                        <img src="../img/we.jpg" alt="" class="header__notify-img">
                                        <div class="header__notify-info">
                                            <div class="header__notify-name">Bài giới thiệu</div>
                                            <div class="header__notify-description">Hãy xem bài viết giới thiệu về shop
                                                của chúng tôi để hiểu rõ về chúng tôi hơn.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="../html/baiviet.php" class="link-notify">

                            <div class="header__notify-list">
                                <div class="header__notify-item">
                                    <div class="header__notify-link">
                                        <img src="../img/myshop.jpg" alt="" class="header__notify-img">
                                        <div class="header__notify-info">
                                            <div class="header__notify-name">Các bài viết về Shop</div>
                                            <div class="header__notify-description">Hãy xem các bài viết của chúng tôi
                                                để hiểu rõ hơn về nhu cầu của bạn.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="seeall" style="text-decoration: none;">Xem tất cả</a>
                        <script>
                            document.querySelector('.seeall').addEventListener('click', function(event) {
                                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                                alert('Không có thông báo mới');
                            });
                        </script>


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

                                    <p class="name-login"><strong>Họ và tên:<span
                                                class="information__user-name"><?php echo htmlspecialchars($_SESSION['login']); ?></span>
                                        </strong> </p>
                                    <p class="email-login"><strong>Email:<span
                                                class="information__user-email"><?php echo htmlspecialchars($_SESSION['email']); ?></span></strong>
                                    </p>
                                    <p class="sdt"><strong>SĐT :<span class="information__user-sdt"><span
                                                    class="sdt-have0">0</span><?php echo htmlspecialchars($_SESSION['sdt']); ?></span></strong>
                                    </p>
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
                    <button type="submit" name="login">Đăng Nhập</button>
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
                    <input type="email" placeholder="Email" name="email">
                    <label for="sdt">SDT</label>
                    <input type="tel" name="sdt" id="" placeholder="SDT">
                    <label for="new-password">Mật khẩu:</label>
                    <input type="password" id="new-password" name="new-password" required placeholder="Mật Khẩu">
                    <label for="confirm-password">Xác nhận mật khẩu:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required
                        placeholder="Xác nhận Mật Khẩu">
                    <button type="submit">Đăng Ký</button>
                    <span class="error" id="error_username"></span>
                    <span class="error" id="error_email"></span>
                    <span class="error" id="error_sdt"></span>
                    <script>
                        // Kiểm tra xem có tham số error trong URL không
                        const urlParams = new URLSearchParams(window.location.search);
                        const errorUsername = urlParams.get('error_username');
                        const errorEmail = urlParams.get('error_email');
                        // ... các biến khác ...

                        // Hiển thị thông báo lỗi tương ứng với từng trường
                        document.getElementById('error_username').textContent = errorUsername;
                        document.getElementById('error_email').textContent = errorEmail;
                        // ...
                    </script>
                </form>
                <p>Đã có tài khoản? <a href="#" id="showLogin">Đăng nhập</a></p>
            </div>
            <!-- <script src="../js/test.js"></script> -->
            <script src="../js/login.js"></script>
        </div>
    </div>
    <section class="slider">
        <div class="list">
            <div class="list-images">
                <img src="../img/slideshow_2.webp" alt="Đây là slide">
            </div>
            <div class="list-images">
                <img src="../img/slideshow_3.webp" alt="Đây là slide">
            </div>
            <div class="list-images">
                <img src="../img/show_block_home_category_image_3_new.webp" alt="Đây là slide">
            </div>
        </div>
        <!-- button prev and next -->
        <div class="buttons">
            <button id="prev">
                < </button>
                    <button id="next">></button>
        </div>
        <!-- dots -->
        <ul class="dots">
            <li class="dot active"></li>
            <li class="dot"></li>
            <li class="dot"></li>
        </ul>
    </section>
    <!-- Gọi js -->
    <script src="../js/slideshow.js"></script>
    <br /><br />
    <main>
        <div class="allitem">TẤT CẢ SẢN PHẨM</div>
        <div class="layout">
            <div class="layout__item">
                <?php

                // Kết nối cơ sở dữ liệu
                require_once "../html/connectdb.php";
                $conn = new mysqli($host, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Bước 1: Lấy tất cả các loại sản phẩm
                $sql_types = "SELECT DISTINCT loai FROM sanpham";
                $types_result = $conn->query($sql_types);

                $types = [];
                while ($row = $types_result->fetch_assoc()) {
                    $types[] = $row['loai'];
                }

                // Bước 2: Lấy ngẫu nhiên 16 sản phẩm từ các loại khác nhau mà không bị trùng
                $products = [];
                $max_products = 16;
                $selected_ids = []; // Mảng lưu các ID sản phẩm đã chọn

                while (count($products) < $max_products) {
                    $random_type = $types[array_rand($types)]; // Chọn ngẫu nhiên loại sản phẩm

                    // Lấy sản phẩm ngẫu nhiên của loại sản phẩm này
                    $sql_products = "SELECT * FROM sanpham WHERE loai = ? ORDER BY RAND() LIMIT 1";
                    $stmt = $conn->prepare($sql_products);
                    $stmt->bind_param("s", $random_type);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if (count($products) >= $max_products) {
                                break 2; // Thoát khỏi vòng lặp while khi đạt số lượng mong muốn
                            }
                            // Kiểm tra nếu sản phẩm đã tồn tại trong danh sách sản phẩm
                            if (!in_array($row['idSP'], $selected_ids)) {
                                $products[] = $row;
                                $selected_ids[] = $row['idSP']; // Thêm ID sản phẩm vào danh sách đã chọn
                            }
                        }
                    }
                }

                $conn->close();

                // Bước 3: Hiển thị sản phẩm
                if (!empty($products)) {
                    foreach ($products as $product) {
                        $product_page = '';
                        switch ($product["loai"]) {
                                // case 'áo thun':
                                //     $product_page = 'thun.php';
                                //     break;
                                // case 'quần jean':
                                //     $product_page = 'jeans.php';
                                //     break;
                                // case 'áo sơ mi':
                                //     $product_page = 'somi.php';
                                //     break;
                                // case 'nón':
                                //     $product_page = 'non.php';
                                //     break;
                            default:
                                $product_page = 'product.php'; // Trang mặc định cho các loại khác
                                break;
                        }

                        echo '
                        <a href="../sp/' . htmlspecialchars($product_page) . '?idSP=' . htmlspecialchars($product["idSP"]) . '&loai=' . urlencode(htmlspecialchars($product["loai"])) . '">
                            <div class="each-item">
                                <div class="img">
                                    <img src="../img/' . htmlspecialchars($product["image"]) . '" alt="" class="img-item">
                                    <img src="../img/' . htmlspecialchars($product["hover_image"]) . '" alt="" class="img-hover">
                                </div>
                                <div class="name-item" style="text-align: center">' . htmlspecialchars($product["tenSP"]) . '</div>
                                <div class="cost-item" style="text-align: center"><span>' . number_format($product["price"], 0, ',', '.') . '</span><sup>đ</sup></div>
                                <a href="../html/checkout.php?idSP=' . htmlspecialchars($product["idSP"]) . '" class="buy">Mua ngay</a>
                            </div>
                        </a>
                        ';
                    }
                } else {
                    echo "Không tìm thấy sản phẩm.";
                }
                ?>



            </div>

    </main>
    <a href="all-item.php" class="more">
        <span> Xem thêm >
        </span>
    </a>
    <div class="cart">
        <h2 class="cart-title">GIỎ HÀNG CỦA BẠN</h2>
        <!-- <div class="cart-content">
            <div class="cart-box">
                <img src="../img/2.png" alt="" class="cart-img">
                <div class="detail-box">
                    <div class="cart-product-title">STUFFED WOLF TEE</div>
                    <div class="cart-price"><span>490.000</span><sup>đ</sup></div>
                    <input type="number" value="1" class="cart-quantity">
                </div>
                <i class="fa-solid fa-trash cart-remove"></i>
            </div>
        </div> -->
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
    <footer>
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