<?php
include 'header.php';
include 'connect_db.php';
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}



// Hàm để thêm sản phẩm
function add_product($con)
{
    $idSP = $_POST['idSP'];
    $tenSP = $_POST['tenSP'];
    $gia = $_POST['price'] * 1000;
    $image = $_FILES['image']['name'];

    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
        echo "Vui lòng tải lên hình ảnh có định dạng JPG, JPEG, PNG.";
        return false;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Hình ảnh vượt quá kích thước cho phép. Kích thước tối đa là 500KB.";
        return false;
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Có lỗi xảy ra khi upload hình ảnh.";
        return false;
    }

    $sql = "INSERT INTO sanpham (idSP, tenSP, price, image)
        VALUES ('" . $idSP . "', '" . $tenSP . "', '" . $gia . "', '" . $image . "')";
    if (mysqli_query($con, $sql)) {
        echo "Sản phẩm đã được thêm thành công!";
    } else {
        echo "Lỗi khi thêm sản phẩm: " . mysqli_error($con);
    }
}

// Hàm để cập nhật sản phẩm
function update_product($con)
{
    $idSP = $_GET['idSP']; // Lấy từ POST thay vì GET
    $updates = [];

    // Kiểm tra và cập nhật tên sản phẩm
    if (!empty($_POST['tenSP'])) {
        $tenSP = mysqli_real_escape_string($con, $_POST['tenSP']);
        $updates[] = "tenSP='$tenSP'";
    }

    // Kiểm tra và cập nhật giá sản phẩm
    if (!empty($_POST['price'])) {
        $gia = mysqli_real_escape_string($con, $_POST['price']);
        $updates[] = "price='$gia'";
    }

    // Kiểm tra và xử lý hình ảnh nếu có upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($image);
        $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file type
        if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
            echo "Vui lòng tải lên hình ảnh có định dạng JPG, JPEG, PNG.";
            return false;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Hình ảnh vượt quá kích thước cho phép. Kích thước tối đa là 500KB.";
            return false;
        }

        // Kiểm tra trạng thái upload file
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Move uploaded file
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Có lỗi xảy ra khi upload hình ảnh.";
                return false;
            }

            // Thêm cột image vào câu lệnh update nếu hình ảnh upload thành công
            $updates[] = "image='$image'";
        } else {
            echo "Lỗi upload hình ảnh: " . $_FILES['image']['error'];
            return false;
        }
    }

    // Kiểm tra xem có thay đổi gì không
    if (empty($updates)) {
        return false;
    }

    // Câu lệnh SQL để cập nhật
    $sql = "UPDATE sanpham SET " . implode(", ", $updates) . " WHERE idSP='$idSP'";

    // Thực hiện truy vấn
    if (mysqli_query($con, $sql)) {
        echo "Sản phẩm đã được cập nhật thành công!";
    } else {
        echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($con);
    }
}



// Hàm để xóa sản phẩm
function delete_product($con)
{
    global $con;
    $idSP = $_GET['idSP'];
    $sql = "DELETE FROM sanpham WHERE idSP='$idSP'";
    if (mysqli_query($con, $sql)) {
        echo "Sản phẩm đã được xóa thành công!";
    } else {
        echo "Lỗi khi xóa sản phẩm: " . mysqli_error($con);
    }
}

// Xử lý các hành động
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    add_product($con);
} elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    update_product($con);
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    delete_product($con);
}

?>

<div class="main-content">
    <h1>Quản lý sản phẩm</h1>

    <!-- Form thêm sản phẩm -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        <label for="idSP">Mã sp:</label>
        <input type="text" id="idSP" name="idSP" required><br><br>
        <label for="tenSP">Tên sản phẩm:</label>
        <input type="text" id="tenSP" name="tenSP" required><br><br>
        <label for="gia">Giá:</label>
        <input type="number" id="gia" name="price" required><br><br>
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        <button type="submit" name="submit">Thêm sản phẩm</button>
    </form>

    <!-- Form cập nhật sản phẩm -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'update') {
        $idSP = $_GET['idSP'];
        $sql = "SELECT * FROM sanpham WHERE idSP='$idSP'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="idSP" value="<?php echo $row['idSP']; ?>">
            <label for="tenSP">Tên sản phẩm:</label>
            <input type="text" id="tenSP" name="tenSP" value="<?php echo $row['tenSP']; ?>" required><br><br>
            <label for="gia">Giá:</label>
            <input type="number" id="gia" name="price" value="<?php echo $row['price']; ?>" required><br><br>
            <!-- Chỉnh lại name thành "price" -->
            <label for="image">Hình ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*"><br><br>
            <button type="submit" name="submit">Cập nhật sản phẩm</button>
        </form>

    <?php
    }
    ?>
    <?php
    if (!empty($_SESSION['login'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `idSP` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    ?>
    <!-- Table danh sách sản phẩm -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        <?php
        $sql = "SELECT * FROM sanpham";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['idSP']; ?></td>
                <td><?php echo "<img style='width: 100px; height: 100px  ;' src='../img/{$row['image']}' alt='Image'>"; ?>
                </td>
                <td><?php echo $row['tenSP']; ?></td>
                <td><?php echo number_format($row['price'], 0, ',', '.'); ?> đ</td>
                <td>
                    <a href="?action=update&idSP=<?php echo $row['idSP']; ?>">Sửa</a> |
                    <a href="?action=delete&idSP=<?php echo $row['idSP']; ?>"
                        onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <!-- Pagination -->
    <?php
    include 'pagination.php';
    ?>

</div>