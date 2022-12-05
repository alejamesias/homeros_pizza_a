<?php
require '../models/editarMiUsuarioModel.php';

$id_usuario= $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];


// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$editarMiUsuario = new editarMiUsuarioModel($id_usuario, $nombre, $apellido);
$resultado = $editarMiUsuario->editarMiUsuarioModel();

if ($resultado == true) {
    header("Location: ../Views/cliente.php?correcto=true");
}
else {
    header("Location: ../Views/cliente.php?correcto=false");
}