<?php
@session_start();
$id = $_GET['id'];
unset($_SESSION['carrito']['productos'][$id]);
header('Location: ../Views/checkout.php');