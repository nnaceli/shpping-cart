<?php
session_start();
$_SESSION['products'] = 0;
$_SESSION['quantityProducts'] = 0;
header("Location: products.php");
?>