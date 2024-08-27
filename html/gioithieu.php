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
    <link rel="stylesheet" href="../css/gioithieu.css" />
    <link rel="stylesheet" href="../css/reset.css" /> 
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/login.css">
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
            <h1>NHÓM 12</h1>
            <h2>SHOP BÁN QUẦN ÁO LOCAL BRAND</h2>
            <h3>Mô tả về Website</h3>
            <span style="font-size: 25px;">Website làm về một web bán quần áo local brand thương hiệu dành cho giới trẻ hiện nay. Web bán áo thun, áo sơ mi, quân jeans, quần short, nón. Có các chức năng chính như:
                <br>
                Mua hàng <br>
                Thêm vào giỏ hàng <br>
                Đăng ký tài khoản <br>
                Đăng nhập tài khoản <br>
                Xem chi tiết các sản Phẩm <br>
                Phân loại sản phẩm <br>
                Và các chức năng cơ bản khác của một Website bán hàng
            </span>
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
