<?php
include 'conexion.php';
class eliminarAdminModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $id_usuario;
    private $db;
    private $query;

    public function __construct($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function eliminarAdminModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('DELETE FROM usuario WHERE id_usuario = :id_usuario');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['id_usuario' => $this->id_usuario])) {

            return true;
        }
        return false;
    }
}
