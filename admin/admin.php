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
    $user = $_SESSION['login'];
    if (!empty($user)) { ?>
    <div>
        <h2>Trang chủ quản trị</h2>
        <p>Xin chào <?= $user ?> <a href="logoutadmin.php">Đăng xuất</a></p>
        <form action="">


            <div class="module">
                <table>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td>Tên</td>
                        <td>Loại</td>
                        <td>Hình ngoài</td>
                        <td>Hình trong</td>
                        <td>Giá</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <!-- <! thêm sản phẩm vào database và các trang sản phẩm -->
                <!-- Xóa sản phẩm từ data và các trang sản phẩm -->
                <!-- Sửa và cập nhật  -->
            </div>
        </form>
    </div>
    <?php }
    ?>



</body>

</html>