<?php
@session_start();

$opcion = $_POST['opcion'];

switch ($opcion) {
    case 1:
        require_once '../models/loginModel.php';
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        // Llamamos a la clase loginModel que contiene el metodo para que nos valide el login y el rol
        $login = new loginModel($email, $clave);
        // Creamos una variable la cual se almacenara el valor que retorne la funcion loginModel 
        $validar = $login->loginModel();
        
        $estado = $validar[6];
        if($estado !== "Activo") {
            header('Location:../Views/login.php?usuario_encontrado=false');
            die();
        }

        $_SESSION['usuario'] = $validar;
        //die(var_dump($_SESSION));
        //validar ahora es un array que en la posicion 5 contiene la informacion del rol
        if($validar==null)
        { 
            header('Location:../Views/login.php?usuario_encontrado=false');
            die();
        }
        switch ($validar[5]) {
            case 1:
                // si el rol es 1 se enviara a esta vista 
                header('Location: ../Views/admin2.php');
                break;

            case 2:
                 // si el rol es 2 se enviara a esta vista 
                header('Location: ../index.php');
                break;
        
            case 3:
                // si el rol es 3 se enviara a esta vista 
                header('Location: ../Views/domi.php');
                break;

            case 4:
                // si el rol es 4 se enviara a esta vista 
                header('Location: ../Views/chef.php');
                break;

            case 5:
                // si el rol es 5 se enviara a esta vista 
               header('Location: ../Views/cajero.php');
               break;

            default:
                # code...
                break;
        }
        break;

    default:
        header('../Views/login.php?usuario_encontrado=false');
        break;
}
