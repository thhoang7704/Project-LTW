<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    require_once "../html/connectdb.php";
    if (!empty($_SESSION['login'])) {
    ?>
    <div id="admin-heading-panel">
        <div class="container">
            <div class="left-panel">

            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="container">
        <div class="box-content"></div>
    </div>
    <?php } ?>
</body>

</html>