<?php
require '../models/token.php';
require '../models/productoModel.php';

$id = $_GET["id"];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$claseProductos = new productoModel($id);
$resultado = $claseProductos->productoModel();