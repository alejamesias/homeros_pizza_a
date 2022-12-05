<?php
require '../models/guardarAdminModel.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
// $clave = $_POST['clave'];
$roles = $_POST['roles'];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$guardarAdmin = new guardarAdminModel($nombre, $apellido, $email, $roles);
$resultado = $guardarAdmin->guardarAdminModel();
if ($resultado === true) {
    header("Location: ../Views/admin2.php?correcto=true");
}
else {
    header("Location: ../Views/admin2.php?correcto=false");
}