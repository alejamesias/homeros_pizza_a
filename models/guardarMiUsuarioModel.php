<?php
include 'conexion.php';
class guardarMiUsuarioModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $nombre;
    private $apellido;
    private $email;
    private $clave;
    private $db;
    private $query;

    public function __construct($nombre, $apellido, $email, $clave)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->clave = $clave;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function guardarMiUsuarioModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('INSERT INTO usuario (nombre, apellido, email, clave) VALUES (:nombre, :apellido, :email, :clave)');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['nombre' =>$this->nombre, 'apellido' =>$this->apellido, 'email' =>$this->email, 'clave' =>$this->clave])) {

            return true;
        }
        return false;
    }
}
