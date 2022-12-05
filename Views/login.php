<?php
    //Muestra el mensaje de si el registro fue exitoso o no
    if (isset($_GET["correcto"])) {
        $correcto = $_GET["correcto"];

        if ($correcto === "true") {
            echo "<script>alert('Se registro correctamente')</script>";
        }
        else {
            echo "<script>alert('Error en el registro')</script>";
        }
    }

    //Muestra el mensaje de si el registro fue exitoso o no
    if (isset($_GET["usuario_encontrado"])) {
        $usuario_encontrado = $_GET["usuario_encontrado"];

        if ($usuario_encontrado === "false") {
            echo "<script>alert('Usuario y/o contraseña incorrectos')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Libreria Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Link estilos css -->
    <link rel="stylesheet" href="../css/estilosV.css">

    <!-- Titulo de la página -->
    <title>Login</title>


</head>
<body>

<!-- Barra de volver a inicio -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../img/Volver.png" alt="Volver" width=18px> Volver</a>
    <img src="../img/Logo.png" class="rounded mx-auto d-block" alt="Logo" width=110px>
  </div>
</nav>

<!-- Imagen de Login -->
<div class="ImgL">
<img src="../img/jj.png" class="img-fluid" alt="Identidad" >
</div>
<!-- Formulario de login -->
<div class="ForL">
<form action="../controllers/loginController.php" method="POST">
<div class="form-group">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Correo eléctronico</label>
    <input type="email" class="form-control " id="email" name="email" placeholder="Ingrese su Correo Electrónico" width=100% required>
    
  </div>
  <div class="mb-3">
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="inputText" id="pwd" name="clave" placeholder="Ingrese su contraseña" required/>
  </div>
  <p class="card-text " style="transform: rotate(0);">
    ¿No te has registrado? Que esperas! <a href="Registro.php" class="text-warning stretched-link">Da click aquí</a>
    </p>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Acepto términos y condiciones</label>
  </div>

  <input type="hidden" name="opcion" id="" value="1" readonly>
  <button type="submit" class="btn btn-primary" id="buttonLogin"> Iniciar sesion</button>

</form>
</div>  
</body>
</html>