<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        h2 {
            text-align: center;
            font-size: 2em;
        }

        p {
            font-size: 2em;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require_once "../html/connectdb.php";
    $conn = new mysqli($host, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    ?>
    <?php
    $user = $_SESSION['login'];
    if (!empty($user)) { ?>
        <div>
            <h2>Trang chủ quản trị</h2>
            <p>Xin chào <?= $user ?> <a href="logoutadmin.php">Đăng xuất</a></p>
            <a href="product_listing.php">Quản lý sản phẩm</a><br />
        </div>
    <?php }

    ?>
    <?php if (!isset($_SESSION['login'])) { ?>
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
        </div>
    <?php
    }  ?>


</body>

</html>