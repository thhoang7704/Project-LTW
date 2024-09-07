<?php
include 'header.php';
if (!empty($_SESSION['login'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `idSP` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
?>
<div class="main-content">
    <h1>Danh sách sản phẩm</h1>
    <div class="product-items">
        <div class="buttons">
            <a href="./product_editing.php">Thêm sản phẩm</a>
        </div>
        <ul>
            <li class="product-item-heading">
                <div class="product-prop product-img">Ảnh</div>
                <div class="product-prop product-name">Tên sản phẩm</div>
                <div class="product-prop product-button">
                    Xóa
                </div>
                <div class="product-prop product-button">
                    Sửa
                </div>
                <div class="clear-both"></div>
            </li>
            <?php
                while ($row = mysqli_fetch_array($products)) {
                ?>
            <li>
                <div class="product-prop product-img"><img src="../img/<?= $row['image'] ?>" alt="<?= $row['tenSP'] ?>"
                        title="<?= $row['tenSP'] ?>" /></div>
                <div class="product-prop product-name"><?= $row['tenSP'] ?></div>
                <div class="product-prop product-button">
                    <a href="product_delete.php?idSP=<?= $row['idSP'] ?>">Xóa</a>
                </div>
                <div class="product-prop product-button">
                    <a href="product_editing.php?idSP=<?= $row['idSP'] ?>">Sửa</a>
                </div>
                <div class="clear-both"></div>
            </li>
            <?php } ?>
        </ul>
        <?php
            include 'pagination.php';
            ?>
        <div class="clear-both"></div>
    </div>
</div>
<?php
}
?>