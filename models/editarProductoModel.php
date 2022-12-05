<?php
include 'conexion.php';
class editarProductoModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $nombre;
    private $precio;
    private $id_producto;

    public function __construct($nombre, $precio, $id_producto)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->id_producto = $id_producto;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function editarProductoModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('UPDATE productos SET nombre=:nombre, precio_unitario=:precio WHERE id_producto=:id_producto');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['nombre' =>$this->nombre, 'precio' =>$this->precio, 'id_producto' =>$this->id_producto])) {

            return true;
        }
        return false;
    }
}
