<?php
include 'conexion.php';
class loginModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $email;
    private $clave;
    private $db;
    private $query;

    public function __construct($email, $clave)
    {
        $this->email = $email;
        $this->clave = $clave;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function loginModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('SELECT * FROM usuario WHERE email = :email and clave = :clave');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        if ($prepararConsulta->execute(['email' => $this->email, 'clave' => $this->clave])) {

            // fetch devuele un array de la consulata SQL que se ejecutó
            $filas = $prepararConsulta->fetch(PDO::FETCH_NUM);
            // se devuelve el array que resulte de la funcion fetch
            return $filas;
        }
        return null;
    }
}
