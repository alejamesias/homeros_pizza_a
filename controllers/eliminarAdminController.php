<?php
require '../models/eliminarAdminModel.php';

$id_usuario = $_GET["id"];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$eliminarAdmin = new eliminarAdminModel($id_usuario);
$resultado = $eliminarAdmin->eliminarAdminModel();
if ($resultado === true) {
    echo "true";
}
else {
    echo "false";
}