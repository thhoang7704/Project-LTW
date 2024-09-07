<?php
include 'header.php';
if (!empty($_SESSION['login'])) {
?>
    <div class="main-content">
        <h1><?= !empty($_GET['idSP']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy sản phẩm" : "Sửa sản phẩm") : "Thêm sản phẩm" ?>
        </h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['tenSP']) && !empty($_POST['tenSP']) && isset($_POST['price']) && !empty($_POST['price'])) {
                    $galleryImages = array();
                    if (empty($_POST['tenSP'])) {
                        $error = "Bạn phải nhập tên sản phẩm";
                    } elseif (empty($_POST['price'])) {
                        $error = "Bạn phải nhập giá sản phẩm";
                    } elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Giá nhập không hợp lệ";
                    }
                    if (isset($_FILES['image']) && !empty($_FILES['image']['tenSP'][0])) {
                        $uploadedFiles = $_FILES['image'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $image = $result['path'];
                        }
                    }
                    if (!isset($image) && !empty($_POST['image'])) {
                        $image = $_POST['image'];
                    }
                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['tenSP'][0])) {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $galleryImages = $result['uploaded_files'];
                        }
                    }
                    if (!empty($_POST['gallery_image'])) {
                        $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                    }
                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['idSP'])) { //Cập nhật lại sản phẩm
                            $result = mysqli_query($con, "UPDATE `sanpham` SET `tenSP` = '" . $_POST['tenSP'] . "',`image` =  '" . $image . "', `price` = " . str_replace('.', '', $_POST['price']) . " WHERE `sanpham`.`idSP` = " . $_GET['idSP']);
                        } else { //Thêm sản phẩm
                            $result = mysqli_query($con, "INSERT INTO `sanpham` (`idSP`, `tenSP`, `image`, `price`, `hover_image`, , `loai`) VALUES (NULL, '" . $_POST['tenSP'] . "','" . $image . "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['hover_image'] . "', '" . $_POST['loai'] . "'");
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        } else { //Nếu thành công
                            if (!empty($galleryImages)) {
                                $product_id = ($_GET['action'] == 'edit' && !empty($_GET['idSP'])) ? $_GET['idSP'] : $con->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $path) {
                                    if (empty($insertValues)) {
                                        $insertValues = "(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    } else {
                                        $insertValues .= ",(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    }
                                }
                                $result = mysqli_query($con, "INSERT INTO `image` (`idSP`, `product_id`, `path`, `created_time`, `last_updated`) VALUES " . $insertValues . ";");
                            }
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin sản phẩm.";
                }
            ?>
                <div class="container">
                    <div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href="product_listing.php">Quay lại danh sách sản phẩm</a>
                </div>
            <?php
            } else {
                if (!empty($_GET['idSP'])) {
                    $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `idSP` = " . 'idSP');
                    $product = $result->fetch_assoc();
                    $gallery = mysqli_query($con, "SELECT * FROM `image` WHERE `product_id` = " . 'idSP');
                    if (!empty($gallery) && !empty($gallery->num_rows)) {
                        while ($row = mysqli_fetch_array($gallery)) {
                            $product['gallery'][] = array(
                                'idSP' => $row['idSP'],
                                'path' => $row['path']
                            );
                        }
                    }
                }
            ?>
                <link rel="stylesheet" href="../css/admin_style.css">
                <form id="product-form" method="POST"
                    action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&idSP=" . $_GET['idSP'] : "?action=add" ?>"
                    enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="name" value="<?= (!empty($product) ? $product['tenSP'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price"
                            value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
                            <?php if (!empty($product['image'])) { ?>
                                <img src="../img/<?= $product['image'] ?>" /><br />
                                <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                            <?php } ?>
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Thư viện ảnh: </label>
                        <div class="right-wrap-field">
                            <?php if (!empty($product['gallery'])) { ?>
                                <ul>
                                    <?php foreach ($product['gallery'] as $image) { ?>
                                        <li>
                                            <img src="../img/<?= $image['path'] ?>" />
                                            <a href="gallery_delete?id=<?= $image['idSP'] ?>">Xóa</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                                <?php foreach ($product['gallery'] as $image) { ?>
                                    <input type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                                <?php } ?>
                            <?php } ?>
                            <input multiple="" type="file" name="gallery[]" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <!-- <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"><?= (!empty($product) ? $product['content'] : "") ?></textarea>
                        <div class="clear-both"></div>
                    </div> -->
                </form>
                <div class="clear-both"></div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('product-content');
                </script>
            <?php } ?>
        </div>
    </div>

<?php
}
?>