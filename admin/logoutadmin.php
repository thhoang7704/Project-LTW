<?php
session_start();
unset($_SESSION['login']);
header("Location: dangnhapadmin.php");
exit();