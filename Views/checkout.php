<?php
require '../models/token.php';
include '../models/conexion.php';


//Esto va enel controlador y se envia a la clase del modelo
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        // Conexion a la base de datos
        $db = new ConexionDB();
        $query = $db->connect();

        
        
        //clave= id de producto
        //cantidad= cantidad producto

        $lista_carrito = array();

        if($productos != null) {
            foreach ($productos as $clave => $cantidad) {

                // Se prepara una consulta a la base de datos 
                $prepararConsulta = $query->prepare("SELECT id_producto, nombre, precio_unitario, descripcion, $cantidad AS cantidad FROM productos WHERE id_producto=?");
                //'Select id_producto, id_categoria, nombre, precio_unitario, foto, descripcion, ingredientes, $cantidad AS cantidad  FROM productos WHERE id_producto=?

                // Se ejecuta y se valida al instnte si salio bien la consulta
                $prepararConsulta->execute([$clave]);

                    // fetch devuele un array de la consulata SQL que se ejecutó
                $lista_carrito[] = $prepararConsulta->fetch(PDO::FETCH_ASSOC);

            }
        }
       

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeros Pizza</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/mercado_pago.css" rel="stylesheet">

    <script src="https://www.paypal.com/sdk/js?client-id=AZGVp6qpohj7UuN0o29SUprUeNkWZWzh1Gp4Qe1cBVgkV2QDxyRjwI_2cqZlDNH8XJd_MTPGWoG1fmH7&enable-funding=mercadopago"></script>
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="../index.php" class="navbar-brand">
                    <strong>Homeros Pizza</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Sedes</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Promociones</a>
                        </li>

                    </ul>
                    <a href="carrito.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>       
                            <th></th>                     
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if($lista_carrito == null) {
                            echo'<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';

                            } else {

                                $total = 0;

                                foreach($lista_carrito as $producto){
                                    $_id= $producto['id_producto'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio_unitario'];
                                    $cantidad = $producto['cantidad'];
                                    $subtotal = $cantidad * $precio;
                                    $total +=$subtotal;
                                
                    
                                    ?>
                                    
                            <tr>
                                <td><?php echo $nombre ?> </td>
                                <td><?php echo $precio ?> </td>
                                <td> 
                                    <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_ <?php echo $_id; ?>" onchange="addProducto(<?php echo $_id; ?>);">  
                                </td>
                                <td>
                                <div id="subtotal_"<?php echo $_id; ?> name="subtotal[]"><?php echo $subtotal ?></div>
                                </td>
                                
                                <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" onclick="window.location.href='../controllers/eliminarProductoCarritoController.php?id=<?php echo $_id; ?>'" data-bs-toogle="modal" data-bs-target="eliminaModal">Eliminar</a></td>
                            </tr>
                            <?php } ?>
                            <?php
                                if ($total >= 70000):
                            ?>
                            <tr>
                                <td colspan="3">Descuento (10%)</td>
                                <td colspan="2">
                                    <p class="h3" id="total"><?php echo ($total * 0.1) ?></p>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td colspan="2">
                                    <p class="h3" id="total">
                                    <?php
                                        if ($total < 70000) {
                                            echo $total;
                                        }
                                        else {
                                            echo $total - ($total * 0.1);
                                        }
                                    ?></p>
                                </td>
                            </tr>
                    </tbody>
                    <?php } ?>
                </table>
           </div >
           <div class="row">
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
           </div>
          
        </div>
    </main>

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

        function registrarCompra(){
            let url = '../controllers/registrarCompraController.php'
            let formData = new FormData()

            fetch(url, {
                method: 'POST',
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    console.log("asd")
                }
            })
        }

        </script>

    <!--
        Marko Robles
        Códigos de Programación
        2021
    -->
</body>

<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            registrarCompra();
            return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php
                                        if ($total < 70000) {
                                            echo number_format($total / 4600, 2);
                                        }
                                        else {
                                            echo number_format(($total - ($total * 0.1)) / 4600, 2);
                                        }
                                    ?>' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>

</html>