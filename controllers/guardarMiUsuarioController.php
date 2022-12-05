<?php
require '../models/guardarMiUsuarioModel.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$guardarMiUsuario = new guardarMiUsuarioModel($nombre, $apellido, $email, $clave);
$resultado = $guardarMiUsuario->guardarMiUsuarioModel();
if ($resultado === true) {
    header("Location: ../index.php?correcto=true");
}
else {
    header("Location: ../index.php?correcto=false");
}