<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Libreria Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!-- Link estilos css -->
    <link rel="stylesheet" href="../css/estilosV.css">

    <!-- Ttitulo de la pagina -->
    <title>Registro</title>
</head>
<body>
    <!-- Barra de volver a inicio -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../img/Volver.png" alt="Volver" width=18px> Volver</a>
    <img src="../img/Logo.png" class="rounded mx-auto d-block" alt="Logo" width=110px>
  </div>
</nav>
    <!-- Imagen de Registro -->
<div class="ImgL">
<img src="../img/ri.png" class="img-fluid" alt="imgregistro" >
</div>
    <!-- Formulario Registro -->
    <div class="ForL">
<form action="../controllers/guardarMiUsuarioController.php" method="POST">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Nombre</label>
  <textarea class="form-control" name="nombre" rows="1"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
  <textarea class="form-control" name="apellido" rows="1"></textarea>
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo eléctronico</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Escribe un correo eléctronico que no se te olvide</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="clave">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">He leido terminos y condiciones</label>
  </div>
  <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
    
</body>
</html>