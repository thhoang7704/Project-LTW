<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- Css -->
    
    <link rel="stylesheet" href="../css/reset.css" /> 
    <link rel="stylesheet" href="../sp/sp.css">
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
                  <li><a href="../sort sp/thun.php" >Áo thun</a></li>
                  <li><a href="../sort sp/somi.php" >Áo sơ mi</a></li>
                  <li><a href="../sort sp/short.php" >Quần short</a></li>
                  <li><a href="../sort sp/jeans.php" >Quần jean</a></li>
                  <li class="last__sub"><a href="../sort sp/non.php" >Nón</a></li>
                </ul> 
              </li>
              <li class="navbar-item">
                <a href="" class="navbar__link">Bài Viết</a>
              </li>
              <li class="navbar-item">
                <a href="" class="navbar__link">Liên Hệ</a>
              </li>
              <li class="navbar-item">
                <a href="" class="navbar__link">Giới Thiệu</a>
              </li>
            </ul>
          </nav>
          <div class="action">
            <div class="action__notify">
              <a href="">
                <i class="fa-regular fa-bell"></i>
              </a>
            </div>
            <div class="action__cart">
              <a href="">
                <i class="fa-solid fa-cart-shopping cart__head"></i>
              </a>
            </div>
            <div class="action__login">
              <a href="#">
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
              <input type="password" id="confirm-password" name="confirm-password" required placeholder="Xác nhận Mật Khẩu">
              <button type="submit">Đăng Ký</button>
          </form>
          <p>Đã có tài khoản? <a href="#" id="showLogin">Đăng nhập</a></p>
      </div>
      <script src="../js/login.js"></script>
  </div>
</div>

    <main>
        <div class="container">
            <div class="item">
                <div class="detail-item">
                    <h2>THÔNG TIN</h2>
                    <ul class="info-item">
                        <li>Form basic mới</li>
                        <li>Graphic mặt trước áo được in kéo lụa</li>
                        <li>Logo thêu nổi ở tay áo</li>
                        <li>Chất liệu: Cotton 2 chiều</li>
                    </ul><br>
                    <div class="warning">
                        <strong>Lưu ý</strong>
                        <span>Màu sắc sản phẩm có thể khác trên ảnh <br>do điều kiện ánh sáng khi chụp.</span>
                    </div><br>
                    <div class="vc">
                        Vận chuyển từ 2-3 ngày. <br>Thiết kế và sản xuất bởi THF.
                    </div>
                </div>
                <div class="img-items">
                    <img src="../img/i19.png" alt="">
                    <img src="../img/i19-19.png" alt="">

                </div>
            </div>
            <div class="item-sidebar">
                <div class="detail-item-sidebar">
                    <div class="name-item">CAP 5</div>
                    <div class="masp">SKU: HBHT0001</div>
                    <div class="cost">490,000₫</div>
                    <div class="color">
                        Màu sắc
                        <div class="color-item"></div>
                    </div>
                    <div class="size">
                        <div class="size-item size-s" onclick="selectBox(this)">S</div>
                        <div class="size-item size-m" onclick="selectBox(this)">M</div>
                        <div class="size-item size-l" onclick="selectBox(this)">L</div>
                        <div class="size-item size-xl" onclick="selectBox(this)">XL</div>
                    </div>
                    <script>
                        function selectBox(element) {
                        // Xóa trạng thái chọn khỏi tất cả các ô
                        var boxes = document.querySelectorAll('.size-item');
                        boxes.forEach(function(box) {
                            box.classList.remove('selected');
                        });

                        // Thêm trạng thái chọn cho ô hiện tại
                        element.classList.add('selected');
                    }

                    </script>
                    <div class="add">THÊM VÀO GIỎ</div>
                    <div class="buys">MUA NGAY</div>
                </div>
            </div>
        </div>
        <div class="lq">SẢN PHẨM LIÊN QUAN</div>
        <div class="layout">
            <div class="layout__item">

                <a href="../sp/lamp.php">
                    <div class="each-item">
                      <div class="img">
                          <img src="../img/i31.png" alt="" class="img-item">
                          <img src="../img/i31-31.png" alt="" class="img-hover img-31">
                          <div class="icon">
                            <i class="fa-solid fa-plus"></i>
                              <i class="fa-solid fa-cart-shopping"></i>
                          </div>
                      </div>
                      <div class="name-item" align="center">LAMP LEGEND TEE</div>
                      <div class="cost-item" align="center">420,000VND</div>
                      <a href="" class="buy">Mua ngay</a>
                    </div>
                  </a>
                  <a href="../sp/lor.php">
                    <div class="each-item">
                      <div class="img">
                          <img src="../img/i33.png" alt="" class="img-item">
                          <img src="../img/i33-33.png" alt="" class="img-hover img-33">
                          <div class="icon">
                            <i class="fa-solid fa-plus"></i>
                              <i class="fa-solid fa-cart-shopping"></i>
                          </div>
                      </div>
                      <div class="name-item" align="center">LORRYLOAD CARGO SHORT</div>
                      <div class="cost-item" align="center">270,000VND</div>
                      <a href="" class="buy">Mua ngay</a>
                    </div>
                  </a>
                  <a href="../sp/classic.php">

                    <div class="each-item">
                      <div class="img">
                          <img src="../img/i27.png" alt="" class="img-item">
                          <img src="../img/i27-27.png" alt="" class="img-hover">
                          <div class="icon">
                            <i class="fa-solid fa-plus"></i>
                              <i class="fa-solid fa-cart-shopping"></i>
                          </div>
                      </div>
                      <div class="name-item" align="center">CLASSIC CAP</div>
                      <div class="cost-item" align="center">275,000VND</div>
                      <a href="" class="buy">Mua ngay</a>
                    </div>
                  </a>
                  <a href="../sp/tracer.php">

                    <div class="each-item">
                      <div class="img">
                          <img src="../img/i24.png" alt="" class="img-item">
                          <img src="../img/i24-24.png" alt="" class="img-hover">
                          <div class="icon">
                            <i class="fa-solid fa-plus"></i>
                              <i class="fa-solid fa-cart-shopping"></i>
                          </div>
                      </div>
                      <div class="name-item" align="center">TRACER SLEEVES BOXY SHIRT</div>
                      <div class="cost-item" align="center">495,000VND</div>
                      <a href="" class="buy">Mua ngay</a>
                    </div>
                  </a>
            </div>
        </div>
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
          <h3>2251040023</h3>
        </div>
        <div class="project">
          <h1 class="last-footer">Đề Tài:</h2>
          <h3>SHOP BÁN QUẦN ÁO</h3>
        </div>
        <div class="contact">
          <h2><span class="email">Email:</span> 2251040023@ut.edu.vn</h2>
        </div>
      </div>
    </footer>
</div>
  </body>
</html>
