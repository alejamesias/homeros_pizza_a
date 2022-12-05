<?php
include 'conexion.php';
class reporteModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $db;
    private $query;

    public function __construct()
    {
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function reporteModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('SELECT * FROM detalles_pedido INNER JOIN pedidos ON detalles_pedido.id_pedido = pedidos.id_pedido INNER JOIN productos ON detalles_pedido.id_producto = productos.id_producto');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute([])) {

            // fetch devuele un array de la consulata SQL que se ejecutó
            $filas = $prepararConsulta->fetchAll(PDO::FETCH_ASSOC);
            // se devuelve el array que resulte de la funcion fetch
            return $filas;
        }
        return null;
    }
}
