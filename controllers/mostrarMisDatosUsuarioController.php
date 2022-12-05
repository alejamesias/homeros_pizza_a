<?php
require '../models/mostrarMisDatosUsuarioModel.php';

@session_start();

$id_usuario = $_SESSION["usuario"][0];

// Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
$mostrarMisDatosUsuario = new mostrarMisDatosUsuarioModel($id_usuario);
$resultado = $mostrarMisDatosUsuario->mostrarMisDatosUsuarioModel();
