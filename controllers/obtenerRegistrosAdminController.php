<?php
require '../models/obtenerRegistrosAdminModel.php';

if (isset($_GET["pag_actual"])) {
    $pagina_actual = $_GET["pag_actual"];
}
else {
    $pagina_actual = 1;
}

if (isset($_GET["busqueda"])) {
    $busqueda = $_GET["busqueda"];
}
else {
    $busqueda = "";
}

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$obtenerRegistrosAdmin = new obtenerRegistrosAdminModel($pagina_actual, $busqueda);
$resultado = $obtenerRegistrosAdmin->obtenerRegistrosAdminModel();
echo JSON_encode($resultado);