<?php
@session_start();

require '../models/registrarCompraModel.php';

$usuario = $_SESSION["usuario"];
// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$registrarCompra = new registrarCompraModel($usuario[0], $_SESSION["carrito"]);
$resultadoRegistrarCompra = $registrarCompra->registrarCompraModel();

die(var_dump($resultadoRegistrarCompra));
?>