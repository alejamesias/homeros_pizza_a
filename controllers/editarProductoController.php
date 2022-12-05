<?php
require '../models/editarProductoModel.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$id_producto = $_POST['id_producto'];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$editarProducto = new editarProductoModel($nombre, $precio, $id_producto);
$resultado = $editarProducto->editarProductoModel();
if ($resultado === true) {
    header("Location: ../Views/productos.php?correcto=true");
}
else {
    header("Location: ../Views/productos.php?correcto=false");
}