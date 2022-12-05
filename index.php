<?php
  @session_start();
?>
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
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <!-- style sheet link -->
    <link rel="stylesheet" href="assets/css/index.css" />

    <!-- Bootstrap Bundle with Popper -->
    <script defer src="assets/bootstrap/js/bootstrap.bundle.js"></script>

    <title>Inicio</title>
  </head>
  <body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.html"
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
            <?php if (isset($_SESSION['usuario'])) :?>
              <img
              class="me-5"
              src="assets/img/logo-nav-carrito.svg"
              alt="logo-carrito"
            />
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
      <div class="row align-items-center container-header pb-5">
        <!-- section 1 -->
        <div class="col vw-100">
          <!-- tittle -->
          <h1 class="mb-5">
            ¿Tienes hambre? <br />
            pues nosotros comida :p
          </h1>

          <!-- description -->
          <p class="text-xxl-start mb-5">
            En homero's pizza si no te llenas, te servimos mas.
          </p>
          <button type="button" class="btn btn-secondary button ps-3 pe-3 mb-4">
            Pide ya
          </button>
          <button
            type="button"
            class="btn btn-outline-warning button ps-3 pe-3 mb-4"
            style="color: #000"
          >
            Como pedir
          </button>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Pizza con pollo..."
              aria-label="Pizza con pollo..."
            />
            <button class="btn btn-warning" type="submit">Search</button>
          </form>
        </div>

        <!-- section 2 -->
        <div class="col">
          <img
            class="img-fluid"
            src="assets/img/homero-seccion-2.png"
            alt="Homero-img"
          />
        </div>
      </div>
      <!-- end container header -->

      <!-- container carrusel -->
      <div
        class="row justify-content-center carousel h-100"
        style="height: 400px"
      >
        <div class="col-6">
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner" style="    text-align: -webkit-center;">
              <div class="carousel-item active">
                <img
                  src="assets/img/Rectangle 7carrusel1.jpg"
                  class="d-block w-45"
                  alt="Img-carousel"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="assets/img/Rectangle 8carrusel2.jpg"
                  class="d-block w-45"
                  alt="Img-carousel"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="assets/img/Rectangle 10carrusel5.jpg"
                  class="d-block w-45"
                  alt="..."
                />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <!-- end conatinercorousel -->
      <!-- container categories -->
      <div class="row text-center container-categories">
        <p>- Categorias -</p>
        <h2>Nuestras Categorias</h2>
        <div class="col-4">
          <img
            src="assets/img/Rectangle 8cat_hambu.png"
            alt="img hamburguesa"
          />
          <h2>hamburguesas</h2>
          <p>Lorem ipsum, dolor sit amet consectetur</p>
        </div>
        <div class="col-4">
          <img src="assets/img/Rectangle 8cat_pizza.png" alt="img pizza" />
          <h2>Pizzas</h2>
          <p>Lorem ipsum, dolor sit amet consectetur</p>
        </div>
        <div class="col-4">
          <img src="assets/img/Rectangle 8cat_bebida.png" alt="img bebida" />
          <h2>Bebidas</h2>
          <p>Lorem ip sum, dolor sit amet consectetur</p>
        </div>
      </div>
      <!-- end conatiner footer -->
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
</html>
