<?php
require 'models/token.php';
include 'models/conexion.php';


        // Conexion a la base de datos
        $db = new ConexionDB();
        $query = $db->connect();

        $id = isset($_GET['id']) ? $_GET['id'] :'';
        //$token = $_GET['token'] ? $_GET['token'] : '';

        if($id == '' ){
            echo "Error al procesar la peticion";
            exit;
        }else {

          
                $prepararConsulta = $query->prepare('SELECT count(id_producto) FROM productos WHERE id_producto=?');
                $prepararConsulta->execute([$id]);
                if($prepararConsulta->fetchColumn() > 0) {

                $prepararConsulta = $query->prepare('SELECT * FROM productos WHERE id_producto=? LIMIT 1');
                $prepararConsulta->execute([$id]);
                $row = $prepararConsulta->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio_unitario'];
                $ingredientes = $row['ingredientes']; 
                $dir_images = 'images/productos/' . $id . '/';

                $rutaImg = $dir_images . 'principal.jpg';

                if(!file_exists($rutaImg)){
                    $rutaImg = 'images/no-image.png';
                }
                else {

                  $imagenes = array();
                  $dir = dir($dir_images);

                  while(($archivo = $dir->read()) != false){
                      if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || (strpos($archivo, 'jpeg')))) {
                          $imagenes[] = $dir_images . $archivo;
                          

                      }
                  }
                  $dir->close();

                }

                }
               

            } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <!-- style sheet link -->
    <link rel="stylesheet" href="css/producto.css" />

    <!-- Bootstrap Bundle with Popper -->
    <script defer src="assets/bootstrap/js/bootstrap.bundle.js"></script>

    <title>Inicio</title>
  </head>
  <body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"
          ><img src="assets/img/logo-nav-bar.svg" alt="nav-bar-logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarNavAltMarkup"
        >
          <div class="navbar-nav">
            <a
              class="nav-link ms-5 active"
              aria-current="page"
              href="index.php"
              >Inicio</a
            >
            <a class="nav-link ms-5" href="Views/productos.php">Productos</a>
          </div>
          <div class="navbar-nav">
          <div class="navbar-nav">
            <?php if (isset($_SESSION['usuario'])) :?>
              <a href="Views/checkout.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
            <?php endif; ?>
            <?php if (isset($_SESSION['usuario'])) :?>
            <a
              type="button"
              class="btn btn-outline-warning ms-4"
              href="Views/editar_mi_usuario.php"
              style="color: #000"
            >
              Editar mi información
            </a>
            <a type="button" class="btn btn-warning ms-4" href="Views/logout.php">
              Cerrar sesión
            </a>
            <a
              type="disabled"
              class="btn btn-outline-warning ms-4"
              style="color: #000; background-color: lightgray; cursor: default; border-radius: 50%"
            >
              <?php if (isset($_SESSION['usuario'])) { echo $_SESSION['usuario'][3]; } ?>
            </a>
            <?php else :?>
            <a
              type="button"
              class="btn btn-outline-warning ms-4"
              href="Views/Registro.php"
              style="color: #000"
            >
              Registrarse
            </a>
            <a type="button" class="btn btn-warning ms-4" href="Views/login.php">
              Iniciar Sesión
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav bar -->
    <!-- Container -->
    <div class="container-fluid">
      <!-- Container header -->
      <div class="row header pb-5">
        <!-- section 1 -->
        <div class="d-flex col justify-content-center align-items-center">
          <img
            class="w-75"
            src="<?php echo $rutaImg; ?>"
            alt="Img hamburguesa"
          />
        </div>
        <!-- section 2 -->
        <div class="d-flex col align-items-center">

          <div class="row">
            <div class="col-12 mb-5"><h2><?php echo $nombre; ?></h2></div>
            <hr class="w-100" />
            <!-- -------- -->
            <div class="col-4">
              <p><?php echo MONEDA . $precio; ?></p>
            </div>
            <!-- ----- -->
            <hr class="w-100" />
            <div class="col-12">
              <p>
              <?php echo $descripcion; ?>
                    <?php echo $ingredientes; ?>
              </p>
            </div>
            <!-- ----------- -->
            <hr class="w-25" />
            <div class="col-12">
            <button class="btn btn-secondary" type="button" onclick="addProducto(<?php echo $id; ?>)"> Agregar al carrito</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end container header -->
      <!-- footer -->
      <div
        class="row text-center align-items-center p-5"
        style="background-color: #263238; color: #fff"
      >
        <div class="col-5"><h3 style="color: #ec994b">Homeros pizza</h3></div>
        <div class="col-4">
          <h3>Nuestros productos</h3>
          <p>Suport</p>
          <p>Guide</p>
        </div>
        <div class="col-3">
          <h3>Contacto</h3>
          <p>(+62) 3213213213</p>
          <p>contacto@homeros.com</p>
        </div>
        <div class="col-12 mt-3">
          <p>
            &#169; Homeros 2022 - All <br />
            Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </body>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    function addProducto(id){
        let url = 'views/carrito.php'
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero

            }
        })
    }

    </script>
</html>