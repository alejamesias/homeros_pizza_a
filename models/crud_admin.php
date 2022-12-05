<?php
include 'conexion.php';
class crud_admin
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $db;
    private $query;

    // retorna un array con la consulta SQL o null si algo sale mal
    function crud_admin()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('SELECT u.id_usuario, u.email, u.clave, u.nombre, u.apellido, r.rol, u.estado_usuario FROM usuario u inner join rol r ON r.id_rol=u.id_rol');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        $prepararConsulta->execute();

            // fetch devuele un array de la consulata SQL que se ejecutó
            $resultado = $prepararConsulta->fetchAll(PDO::FETCH_ASSOC);
        }
    }

