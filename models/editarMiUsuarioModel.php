<?php
include 'conexion.php';
class editarMiUsuarioModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $db;
    private $query;

    public function __construct($id_usuario, $nombre, $apellido)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;

    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function editarMiUsuarioModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('UPDATE usuario SET nombre=:nombre, apellido=:apellido WHERE id_usuario=:id_usuario');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['id_usuario'=>$this->id_usuario, 'nombre' =>$this->nombre, 'apellido' =>$this->apellido])) {

            return true;
        }
        return false;
    }
}
