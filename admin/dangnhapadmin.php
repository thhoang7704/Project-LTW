<link rel="stylesheet" href="../css/login.css">
<div id="loginForm" class="form-nd">
    <h2>Đăng Nhập</h2>
    <form action="xulyloginadmin.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required placeholder="Mật khẩu">
        <button type="submit" id="loginButton" name="login">Đăng Nhập</button>
    </form>
    <p>Bạn chưa có tài khoản? <a href="#" id="showRegister">Đăng ký ngay</a></p>
</div>