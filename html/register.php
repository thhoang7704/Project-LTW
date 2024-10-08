<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css" />
  </head>
  <body>
    <div class="wrapper">
      <form action="">
        <h1>Đăng ký</h1>
        <div class="input-box">
          <input type="text" placeholder="Tên tài khoản" required />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Mật khẩu" required />
          <i class="bx bxs-lock"></i>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Nhập lại mật khẩu" required />
          <i class="bx bxs-lock"></i>
        </div>
        <div class="input-box">
          <input type="email" placeholder="Email" required />
        </div>
        <div class="input-box">
          <input type="tel" placeholder="Số điện thoại" required />
        </div>
        <button type="submit" class="btn">Dăng ký</button>
        <div class="register-link">
          <p>Bạn đã có tài khoản? <a href="../html/login.php">Đăng nhập</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
