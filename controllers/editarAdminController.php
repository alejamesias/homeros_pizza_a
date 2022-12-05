<?php
require '../models/editarAdminModel.php';

$id_usuario= $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$roles = $_POST['roles'];
$estado = $_POST['estado'];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$editarAdmin = new editarAdminModel($id_usuario, $nombre, $apellido, $roles, $estado);
$resultado = $editarAdmin->editarAdminModel();
header("Location: ../Views/admin2.php");