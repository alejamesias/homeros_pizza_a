<?php
require '../controllers/productosController.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <!-- style sheet link -->
    <link rel="stylesheet" href="../css/producto.css" />

    <!-- Bootstrap Bundle with Popper -->
    <script defer src="../assets/bootstrap/js/bootstrap.bundle.js"></script>

    <title>Inicio</title>
  </head>
  <body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"
          ><img src="../assets/img/logo-nav-bar.svg" alt="nav-bar-logo"
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
              href="../index.php"
              >Inicio</a
            >
            <a class="nav-link ms-5" href="productos.php">Productos</a>
          </div>
          <div class="navbar-nav">
            <?php if (isset($_SESSION['usuario'])) :?>
                <a href="Views/checkout.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
            <?php endif; ?>
            <?php if (isset($_SESSION['usuario'])) :?>
            <a
              type="button"
              class="btn btn-outline-warning ms-4"
              href="editar_mi_usuario.php"
              style="color: #000"
            >
              Editar mi información
            </a>
            <a type="button" class="btn btn-warning ms-4" href="logout.php">
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
      <!-- continer other products -->
      <div
        class="row container-products align-items-center justify-content-left pb-5"
      >
        <div class="col-12 text-center"><h2>Nuestros productos</h2></div>

        <?php foreach ($resultado as $row) { ?>

            <?php

                $id = $row['id_producto'];
                $imagen = "../images/productos/" .$id . "/principal.jpg";

                if(!file_exists($imagen)){
                    $imagen = "../images/productos/no-image.png";
                }
                ?>

            <div class="col-6 mt-5 pe-3 d-flex">
                <img
                    class="w-50 h-25 align-self-center"
                    style="border-radius:15px"
                    src="<?php echo $imagen; ?>"
                    alt="Img pizza"
                />
                <div class="p-3">
                  <div>
                      <h3><?php echo $row['nombre']; ?></h3>
                      <p>$<?php echo $row['precio_unitario']; ?></p>
                      <p>$<?php echo $row['descripcion']; ?></p>
                  </div>
                  <div class="d-flex ">
                      <div class="btn-group">
                          <!-- el "hash_hmac" sirve para cifrar informacion mediante una contraseña--> 
                          <a href="../detalles.php?id=<?php echo $row['id_producto']; ?>" class="btn btn-primary">Detalles</a>
                      </div>
                      <?php if ($_SESSION["usuario"][5] == 1): ?>
                      <div class="btn-group">
                          <!-- el "hash_hmac" sirve para cifrar informacion mediante una contraseña--> 
                          <a href="editar_producto.php?id=<?php echo $row['id_producto']; ?>" class="btn btn-warning">Editar</a>
                      </div>
                      <?php endif; ?>
                      <?php if ($row['estado'] == "no disponible"): ?>
                          <div class="text-danger">Agotado</div>
                      <?php else: ?>
                          <a href="#" class="btn btn-success" type="button"  onclick="addProducto(<?php echo $id; ?>)">Agregar</a>
                      <?php endif; ?>
                  </div>
                </div>
            </div>
        <?php } ?>
        </div>
      </div>
      <!-- container categories -->
      <div class="row text-center container-categories">
        <p>- Categorias -</p>
        <h2>Nuestras Categorias</h2>
        <div class="col-4">
          <img
            src="../assets/img/Rectangle 8cat_hambu.png"
            alt="img hamburguesa"
          />
          <h2>hamburguesas</h2>
          <p>Lorem ipsum, dolor sit amet consectetur</p>
        </div>
        <div class="col-4">
          <img src="../assets/img/Rectangle 8cat_pizza.png" alt="img pizza" />
          <h2>Pizzas</h2>
          <p>Lorem ipsum, dolor sit amet consectetur</p>
        </div>
        <div class="col-4">
          <img src="../assets/img/Rectangle 8cat_bebida.png" alt="img bebida" />
          <h2>Bebidas</h2>
          <p>Lorem ip sum, dolor sit amet consectetur</p>
        </div>
      </div>
      <!-- end conatiner footer -->
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
        let url = 'carrito.php'
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