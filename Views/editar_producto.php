<?php
require '../controllers/productoController.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Editar producto</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="public/css/estilos.css">

</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Editar producto</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="../controllers/editarProductoController.php" autocomplete="off">
                        <input type="hidden" id="id_producto" name="id_producto" value="<?= $resultado["id_producto"] ?>">
                        <div class="col-md-8">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="<?= $resultado["nombre"] ?>" class="form-control" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id="precio" name="precio" value="<?= $resultado["precio_unitario"] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../Views/admin2.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

        
    </form>
  </div>
  </div>
</body>

</html>