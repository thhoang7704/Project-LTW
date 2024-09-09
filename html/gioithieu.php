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
    <link rel="stylesheet" href="../css/gioithieu.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/notify.css">
    <link rel="stylesheet" href="../css/info.css">
    <title>Clean Coin</title>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <a href="../html/index.php">
                    <img class="logo-img" src="../img/1.png" alt="" / style="width: 200px; height: 200px;">
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
                                <span class="contact-sdt"><i class="fa-solid fa-phone">0372605077</i> </span> <br>
                                <span class="contact-sdt"><i class="fa-solid fa-phone">0372605077</i> </span>
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
                                        <div class="header__notify-description">Hãy xem bài viết giới thiệu về shop của
                                            chúng tôi để hiểu rõ về chúng tôi hơn.</div>
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
                                        <div class="header__notify-description">Hãy xem các bài viết của chúng tôi để
                                            hiểu rõ hơn về nhu cầu của bạn.</div>
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

    </header>
    <!-- Modal -->
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <!-- Login Form -->
            <div id="loginForm" class="form-nd">
                <h2>Đăng Nhập</h2>
                <form action="">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required placeholder="mật khẩu">
                    <button type="submit">Đăng Nhập</button>
                </form>
                <p>Bạn chưa có tài khoản? <a href="#" id="showRegister">Đăng ký ngay</a></p>
            </div>

            <!-- Register Form -->
            <div id="registerForm" class="form-nd" style="display: none;">
                <h2>Đăng Ký</h2>
                <form action="">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="" id="" placeholder="Họ và tên">
                    <label for="new-username">Tên đăng nhập:</label>
                    <input type="text" id="new-username" name="new-username" required placeholder="Tên đăng nhập">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email">
                    <label for="sdt">SDT</label>
                    <input type="text" name="" id="" placeholder="SDT">
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
    <main>
        <div class="container">
            <style>
            /* Container cho hiệu ứng hình tròn */
            /* Container cho hiệu ứng */
            .marquee-container {
                width: 100vw;
                /* Chiều rộng của container */
                overflow: hidden;
                /* Ẩn phần text bị tràn */
                white-space: nowrap;
                /* Giữ nguyên dòng chữ không ngắt dòng */
                position: relative;
                /* Để có thể sử dụng position: absolute trong marquee-text */
                background-color: #1874CD;
            }

            .marquee-text {
                display: inline-block;
                padding-left: 100%;
                /* Bắt đầu ngoài khung nhìn */
                animation: marquee 10s linear infinite;
                /* Thời gian chạy và hiệu ứng liên tục */


            }

            .marquee-text span {
                display: inline-block;
                padding-right: 50px;
                /* Khoảng cách giữa các đoạn text */
                font-size: 40px;
                color: #96ee1c;
                text-shadow: 0 0 100px #96ee1c;
            }

            span>ul {
                list-style: circle;
                /* Bỏ dấu chấm tròn mặc định */
                padding-left: 0;
                /* Bỏ khoảng cách bên trái */
            }

            span ul li {
                position: relative;
                padding-left: 25px;
                /* Khoảng cách bên trái cho nội dung */
                color: black;
            }

            span ul li::before {
                content: "";
                position: absolute;
                left: 10px;
                top: 33%;
                width: 7px;
                /* Đường kính dấu chấm tròn */
                height: 7px;
                /* Đường kính dấu chấm tròn */
                background-color: black;
                /* Màu sắc của dấu chấm tròn */
                border-radius: 50%;
                /* Tạo hình tròn */
                transform: translateY(-50%);
                color: black;
            }

            @keyframes marquee {
                0% {
                    transform: translateX(0);
                    /* Bắt đầu từ vị trí ban đầu */
                }

                100% {
                    transform: translateX(-100%);
                    /* Dịch chuyển hết ra khỏi khung nhìn */
                }
            }

            .direction {
                display: flex;
                position: relative;
                top: 10px;
            }

            .direction-info {
                position: relative;
                width: 50vw;
                left: 100px;
                top: 30px;
            }

            .direction-info strong {
                font-weight: bold;
            }

            .direction-img {
                position: relative;
                left: 300px;

            }

            img {
                height: 200px;
                width: 200px;
                border-radius: 8px;
            }

            span ul li strong {
                font-weight: bold;
            }

            .logo {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .info-logo {
                font-size: 20px;
                width: 500px;
            }

            .info-logo strong {
                font-weight: bold;
            }

            footer {
                width: 100vw;
            }
            </style>
            <h1>NHÓM 12</h1>
            <br>
            <div class="marquee-container">
                <div class="marquee-text">
                    <span>Chào mừng bạn đến với shop Local Brand Dành Cho Giới Trẻ</span>

                </div>
            </div>


            <span style="font-size: 25px;">
                <span class="direction">
                    <span class="direction-info">
                        <strong>Website</strong>
                        này là điểm đến lý tưởng cho các tín đồ thời trang yêu thích phong cách local brand – xu hướng
                        đang làm mưa làm gió trong cộng đồng giới trẻ hiện nay.
                        Với sứ mệnh mang đến những bộ trang phục chất lượng, độc đáo, và mang đậm dấu ấn cá nhân,
                        website cung cấp một loạt sản phẩm đa dạng từ áo thun, áo sơ mi, quần jeans, quần short đến nón
                        thời trang. <br> <br>

                    </span>
                    <span class="direction-img">
                        <img src="../img/ONLINESHOPPING.jpg" alt="">
                    </span>
                </span>

                <br>
                <ul>
                    Các tính năng nổi bật:
                    <li><strong>Trải nghiệm mua sắm dễ dàng:</strong> Giao diện website thân thiện và dễ sử dụng, cho
                        phép bạn nhanh chóng chọn lựa và mua sắm các món đồ yêu thích chỉ với vài thao tác đơn giản.
                    </li>
                    <li><strong>Thêm vào giỏ hàng:</strong> Không cần vội vàng quyết định, bạn có thể thêm các sản phẩm
                        vào giỏ hàng và xem lại khi đã sẵn sàng mua.</li>
                    <li><strong>Tạo tài khoản cá nhân:</strong> Đăng ký tài khoản để dễ dàng quản lý đơn hàng, theo dõi
                        lịch sử mua sắm và nhận thông tin khuyến mãi mới nhất.</li>
                    <li><strong>Đăng nhập nhanh chóng:</strong> Đăng nhập vào tài khoản của bạn để truy cập nhanh vào
                        các tính năng cá nhân hóa, từ danh sách yêu thích đến quản lý thông tin thanh toán.</li>
                    <li><strong>Chi tiết sản phẩm rõ ràng:</strong> Mỗi sản phẩm đều được trình bày chi tiết với hình
                        ảnh chân thực, mô tả chất liệu, kích thước, và các tùy chọn màu sắc, giúp bạn dễ dàng đưa ra
                        quyết định mua sắm đúng đắn.</li>
                    <li><strong>Phân loại sản phẩm linh hoạt:</strong> Duyệt qua hàng trăm sản phẩm theo danh mục như
                        áo, quần, nón, hoặc theo các bộ sưu tập đặc biệt để nhanh chóng tìm thấy những món đồ phù hợp
                        với phong cách của bạn.</li>
                    <li><strong>Các tính năng hữu ích khác:</strong> Bao gồm thanh tìm kiếm thông minh, hệ thống lọc sản
                        phẩm nâng cao, quy trình thanh toán bảo mật, và dịch vụ chăm sóc khách hàng tận tâm.</li>

                </ul>
            </span>
            <div class="logo">
                <div class="info-logo">
                    <strong>LOGO</strong> của Shop thiết kế được đại diện cho tên của 2 thành viên chủ chốt trong nhóm
                    sáng lập ra shop.
                </div>
                <div class="img-logo">
                    <img src="../img/1.png" alt="">
                </div>

            </div>
            </>
    </main>

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