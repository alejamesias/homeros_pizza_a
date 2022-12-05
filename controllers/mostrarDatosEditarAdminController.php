<?php
require '../models/mostrarDatosEditarAdminModel.php';

$id_usuario = $_GET["id"];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$mostrarDatosEditarAdmin = new mostrarDatosEditarAdminModel($id_usuario);
$resultado = $mostrarDatosEditarAdmin->mostrarDatosEditarAdminModel();
