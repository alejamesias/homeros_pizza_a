<?php
@session_start();

if ($_SESSION['usuario'] == null) {
    header('Location: ../index.php');
}

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

if (isset($_GET["pag_actual"])) {
    $pagina_actual = $_GET["pag_actual"];
}
else {
    $pagina_actual = 1;
}

if (isset($_GET["busqueda"])) {
    $busqueda = $_GET["busqueda"];
}
else {
    $busqueda = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-crud</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CUSTOM JS -->
    <script src="../js/app.js" defer></script>
    
</head>

<body>

    <div class="row">
        <!---<div class="menu-dashboard">
            <div class="top-menu">
                <div class="logo">
                    <img src="./img/logo.svg" alt="">
                    <span>TuMejorWeb</span>
                </div>
                <div class="toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </div>
            <div class="input-search">
                <i class='bx bx-search'></i>
                <input type="text" class="input" placeholder="Buscar">
            </div>
            <div class="menu">
                <div class="enlace">
                    <i class="bx bx-grid-alt"></i>
                    <span>Dashboard</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-user"></i>
                    <span>Usuarios</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-grid-alt"></i>
                    <span>Analíticas</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-message-square"></i>
                    <span>Mensajes</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-file-blank"></i>
                    <span>Archivos</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-cart"></i>
                    <span>Pedidos</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-heart"></i>
                    <span>Favoritos</span>
                </div>

                <div class="enlace">
                    <i class="bx bx-cog"></i>
                    <span>Configuración</span>
                </div>
            </div>
        </div>
        --->

        <main class="p-5 container tabla-dashboard">
            <h4>Usuarios</h4>
            <div class="row">
                <div class="col">
                    <a href="registro_usuario.php" class="btn btn-primary float-right">Nuevo Usuario</a>
                    <a href="logout.php" class="btn btn-danger float-left">Cerrar sesion</a>
                    <a href="../Controllers/reporteController.php" class="btn btn-success float-left">Reporte</a>
                    <a href="../Views/productos.php" class="btn btn-warning float-left">Productos</a>
                </div>
                <div class="col">
                </div>
                <!--<div class="col-4">
                    <form action="admin2.php" method="get">
                        <div class="input-group mb-3">    
                            <input name="busqueda" type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary"><img src="../images/lupa.png" width="25"/></button>
                            </div>
                        </div>
                    </form>
                </div>-->

                

                <div class="row py-3">
                    <div class="col">
                        <table class="table table-border" id="example">
                            <thead>
                                <tr>
                                    <th>id_usuario</th>
                                    <th>email</th>
                                    <th>clave</th>
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>id_rol</th>
                                    <th>estado_usuario</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tabla">
                            </tbody>
                        </table>

                    </div>
                </div>

        </main>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarTitle" aria-hidden="true">
        <input type="hidden" name="idUsuarioModal" id="idUsuarioModal" readonly>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarTitle">Eliminar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalEliminar').modal('toggle')">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro que quieres eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalEliminar').modal('toggle')">No</button>
                <button type="button" class="btn btn-primary" onclick="confirmarEliminarRegistro( $('#idUsuarioModal').val() ); $('#modalEliminar').modal('toggle')">Si, estoy seguro</button>
            </div>
            </div>
        </div>
    </div>
</body>

<!--Plugin crud admin-->
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: false,
            lengthMenu: [
                [5, 10, 15, 20], //Cantidad en numeros
                [5, 10, 15, 20], //Cantidad en string
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

        obtenerRegistros();
    });


    function eliminarRegistro(id) {
        $('#modalEliminar').modal('toggle');
        $('#idUsuarioModal').val(id);
    }

    function confirmarEliminarRegistro(id) {

        $.ajax('../controllers/eliminarAdminController.php?id=' + id,
        {
            success: function(data) {
                if (data === "true") {
                    alert('Eliminado correctamente');
                    obtenerRegistros();
                }
                else {
                    alert('Error al eliminar');
                }
            },
            error: function() {
                alert('Error al eliminar');
            }
        }
        );
    }

    function obtenerRegistros() {

        $.ajax('../controllers/obtenerRegistrosAdminController.php?pag_actual=<?php echo $pagina_actual; ?>&busqueda=<?php echo $busqueda; ?>',
        {
            success: function(data) {
                var registros = JSON.parse(data);
                $("#tabla").html("");
                for (var i = 0; i < registros.length; i++) {
                    $("#tabla").append(`\
                        <tr>\
                            <td> ${registros[i].id_usuario} </td>\
                            <td> ${registros[i].email} </td>\
                            <td> ${registros[i].clave} </td>\
                            <td> ${registros[i].nombre} </td>\
                            <td> ${registros[i].apellido} </td>\
                            <td> ${registros[i].rol} </td>\
                            <td> ${registros[i].estado_usuario} </td>\
                            <td><a href="../Views/editar_admi.php?id=${registros[i].id_usuario}" class="btn btn-warning">Editar</a></td>\
                            <td>\
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar" onclick="eliminarRegistro(${registros[i].id_usuario})">\
                                Eliminar\
                            </button>\
                            </td>\
                        </tr>\
                    `);
                }
            },
            error: function() {
                alert('Error al consultar');
            }
        }
        );
    }

</script>
</html>