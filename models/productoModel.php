<?php
include 'conexion.php';
class productoModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $db;
    private $query;
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    function productoModel() {

        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('SELECT * FROM productos WHERE id_producto = ' . $this->id);

        // Se ejecuta y se valida al instnte si salio bien la consulta
        $prepararConsulta->execute();

        // fetch devuele un array de la consulata SQL que se ejecutó
        $resultado = $prepararConsulta->fetch(PDO::FETCH_ASSOC);

        return $resultado;

    
    }
}
?>