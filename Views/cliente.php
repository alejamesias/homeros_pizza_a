<?php
    @session_start();

    $nombre_usuario = $_SESSION["usuario"][3];

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    
    <title>CLiente</title>
</head>
<body>
    <h1>Bienvenidx <?php echo $nombre_usuario; ?></h1>
    <a href="../Views/productos.php" class="btn btn-primary float-right">Productos</a>
    <a href="../Views/editar_mi_usuario.php" class="btn btn-warning float-right">Editar mi información</a>
    <a href="logout.php" class="btn btn-danger float-left">Cerrar sesion</a>
</body>
</html>
