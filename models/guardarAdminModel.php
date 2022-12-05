<?php
include 'conexion.php';
class guardarAdminModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $nombre;
    private $apellido;
    private $email;
    private $roles;
    private $db;
    private $query;

    public function __construct($nombre, $apellido, $email, $roles)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->roles = $roles;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function guardarAdminModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('INSERT INTO usuario (nombre, apellido, email, clave, id_rol) VALUES (:nombre, :apellido, :email, MD5(RAND()), :roles)');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['nombre' =>$this->nombre, 'apellido' =>$this->apellido, 'email' =>$this->email, 'roles' =>$this->roles])) {

            return true;
        }
        return false;
    }
}
