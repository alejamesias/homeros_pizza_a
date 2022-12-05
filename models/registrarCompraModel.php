<?php
include 'conexion.php';
class registrarCompraModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $db;
    private $query;

    public function __construct($id_cliente, $carrito)
    {
        $this->id_cliente = $id_cliente;
        $this->carrito = $carrito;
    }

    function registrarCompraModel() {

        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('INSERT INTO pedidos (id_cliente, estado_pedido, metodo_pago, tiempo_estimado, domicilio, fecha_pedido, direccion, observaciones, descuento, total) VALUES (:id_cliente, :estado_pedido, :metodo_pago, :tiempo_estimado, :domicilio, :fecha_pedido, :direccion, :observaciones, :descuento, :total)');

        $descuento = 0;
        $total = 0;

        $lista_carrito = array();

        $productos = isset($carrito['productos']) ? $carrito['productos'] : null;

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

        foreach($lista_carrito as $producto){
            $_id= $producto['id_producto'];
            $nombre = $producto['nombre'];
            $precio = $producto['precio_unitario'];
            $cantidad = $producto['cantidad'];
            $subtotal = $cantidad * $precio;
            $total +=$subtotal;
        }
        if ($total >= 70000) {
            $descuento = $total * 0.1;
            $total - ($total * 0.1);
        }

        $prepararConsulta = $this->query->prepare('INSERT INTO pedidos (id_cliente, estado_pedido, metodo_pago, tiempo_estimado, domicilio, fecha_pedido, direccion, observaciones, descuento, total) VALUES (:id_cliente, :estado_pedido, :metodo_pago, :tiempo_estimado, :domicilio, :fecha_pedido, :direccion, :observaciones, :descuento, :total)');
        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['id_cliente' =>$this->id_cliente, 'estado_pedido' =>'activo', 'metodo_pago' =>'paypal', 'tiempo_estimado' =>'', 'domicilio' =>0, 'fecha_pedido' =>date('Y-m-d'), 'direccion' =>'', 'observaciones' =>'', 'descuento' =>$descuento, 'total' =>$total])) {
        }
        else 
        { 
            return false;

        }
        $id_pedido = $this->query->lastInsertId();
        
        foreach ($this->carrito["productos"] as $id_producto => $cantidad) {
            $prepararConsulta = $this->query->prepare('INSERT INTO detalles_pedido (id_pedido, id_producto, cantidad) VALUES (:id_pedido, :id_producto, :cantidad)');

            // Se ejecuta y se valida al instnte si salio bien la consulta
            if ($prepararConsulta->execute(['id_pedido' =>$id_pedido, 'id_producto' =>$id_producto, 'cantidad' =>$cantidad])) {
            }
            else {
            
                return false;

            }

        
        }
    
    }
}
?>