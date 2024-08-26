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
    <link rel="stylesheet" href="../sort sp/thun.css">
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/login.css">

    <title>Clean Coin</title>
</head>

<body>
    <div class="container">
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
                            <a href="../html/all-item.php" class="navbar__link">Sản Phẩm</a>
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
                <div class="search-bar">
                    <input type="text" placeholder="Tìm kiếm sản phẩm">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                    <div class="action__login">
                        <a href="../html/login.php">
                            <i class="fa-regular fa-user"></i>
                        </a>
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
    <br /><br />
    <main>
        <div class="allitem">TẤT CẢ SẢN PHẨM</div>
        <div class="layout">
            <div class="layout__item">
                <a href="../sp/stuffed.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/2.png" alt="" class="img-item">
                            <img src="../img/i1-1.png" alt="" class="img-hover">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                       <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" style="text-align: center">STUFFED WOLF TEE</div>
                        <div class="cost-item" style="text-align: center"><span>490.000</span><sup>đ</sup></div>
                        <a href="../html/checkout.php" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/abytee.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i8.png" alt="" class="img-item">
                            <img src="../img/i8-8.png " alt="" class="img-hover">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                       <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" style="text-align: center">ABYSS SS24 INSECT AFFECTION TEE</div>
                        <div class="cost-item" style="text-align: center"><span>200.000</span><sup>đ</sup></div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/brokenheart.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i11.png" alt="" class="img-item">
                            <img src="../img/i11-11.png" alt="" class="img-hover">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                          <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" style="text-align: center">BROKEN HEART TEE</div>
                        <div class="cost-item" style="text-align: center"><span>450.000</span><sup>đ</sup></div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/essence.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i12.png" alt="" class="img-item">
                            <img src="../img/i12-12.png" alt="" class="img-hover">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                          <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" style="text-align: center">ESSENCE TEE</div>
                        <div class="cost-item" style="text-align: center"><span>450.000</span><sup>đ</sup></div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/basic.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i29.png" alt="" class="img-item">
                            <img src="../img/i29-29.png" alt="" class="img-hover img-29">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                        <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" align="center">GUARDIAN BASIC TEE</div>
                        <div class="cost-item" align="center">460,000VND</div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/angle.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i21.png" alt="" class="img-item">
                            <img src="../img/i21-21.png" alt="" class="img-hover">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                        <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" align="center">GUARDIAN ANGLE TEE</div>
                        <div class="cost-item" align="center">460,000VND</div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/lod.php">
                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i30.png" alt="" class="img-item">
                            <img src="../img/i30-30.png" alt="" class="img-hover img-29">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                       <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" align="center">LODESTAR BLUR TEE</div>
                        <div class="cost-item" align="center">450,000VND</div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>

                </a>
                <a href="../sp/lamp.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i31.png" alt="" class="img-item">
                            <img src="../img/i31-31.png" alt="" class="img-hover img-31">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                       <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" align="center">LAMP LEGEND TEE</div>
                        <div class="cost-item" align="center">420,000VND</div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>
                <a href="../sp/abyss.php">

                    <div class="each-item">
                        <div class="img">
                            <img src="../img/i18.png" alt="" class="img-item">
                            <img src="../img/i18-18.png" alt="" class="img-hover img-18">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-plus"></i>
                       <i class="fa-solid fa-cart-shopping"></i> -->
                            </div>
                        </div>
                        <div class="name-item" align="center">ABYSS SS24 MYSTIC WING WAX TEE</div>
                        <div class="cost-item" align="center">490,000VND</div>
                        <a href="" class="buy">Mua ngay</a>
                    </div>
                </a>


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