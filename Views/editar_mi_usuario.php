<?php

require '../controllers/mostrarMisDatosUsuarioController.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Editar mi usuario</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" >
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="public/css/estilos.css">

</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Editar Usuarios</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="../controllers/editarMiUsuarioController.php" autocomplete="off">
                        <div class="col-md-8">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $resultado['nombre'];?>" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $resultado['apellido'];?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $resultado['email'];?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="clave" class="form-label">Clave</label>
                            <div class="col-md-12">
                                <input id="password-field" type="password" class="form-control" name="password" value="<?php echo $resultado['clave'];?>" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="clave" class="form-label">Rol</label>
                            <select name="roles" class="form-select" disabled >
                                <option selected value="1">Administrador</option>
                                <option value="2">Cliente</option>
                                <option value="3">Domiciliario</option>
                                <option value="4">Chef</option>
                                <option value="5">Cajero</option>
                             </select>
                        </div>
                        <div class="col-md-8">
                            <label for="clave" class="form-label">Estado</label>
                            <select name="estado" class="form-select" disabled >
                                <option selected value="1">Activo</option>
                                <option value="2">Inactivo</option>
                             </select>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../Views/cliente.php">Regresar</a>
                            <input type="hidden" name="id_usuario" id="" value="<?php echo $id_usuario; ?>" readonly>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

        
    </form>
  </div>
  </div>
</body>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
</script>
</html>