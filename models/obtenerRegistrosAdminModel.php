<?php
include 'conexion.php';
class obtenerRegistrosAdminModel
{
    // Creacion de las variables para poder usarlas. 
    //Con el "private" para que no se pueda acceder a ellas desde otra parte del codigo
    private $pagina_actual;
    private $busqueda;
    private $total_paginas;
    private $db;
    private $query;

    public function __construct($pagina_actual, $busqueda)
    {
        $this->pagina_actual = $pagina_actual;
        $this->busqueda = $busqueda;
    }

    // retorna un array con la consulta SQL o null si algo sale mal
    function obtenerRegistrosAdminModel()
    {
        // Conexion a la base de datos
        $this->db = new ConexionDB();
        $this->query = $this->db->connect();
        // Se prepara una consulta a la base de datos 
        $prepararConsulta = $this->query->prepare('SELECT count(*) AS cantidad FROM usuario');

        // Se ejecuta y se valida al instnte si salio bien la consulta
        $prepararConsulta->execute();

        //$usuarios_cantidad = $prepararConsulta->fetch(PDO::FETCH_ASSOC)["cantidad"];
        //$u_por_paginas = 5;
        //$total_paginas = ceil($usuarios_cantidad/$u_por_paginas);
        //$this->total_paginas = $total_paginas;
        //$offset = (($this->pagina_actual - 1) * $u_por_paginas);

        if ($this->busqueda != "") {
            $prepararConsulta = $this->query->prepare("SELECT u.id_usuario, u.email, u.clave, u.nombre, u.apellido, r.rol, u.estado_usuario FROM usuario u inner join rol r ON r.id_rol=u.id_rol WHERE u.nombre LIKE '%$this->busqueda%' OR u.apellido LIKE '%$this->busqueda%' OR r.rol LIKE '%$this->busqueda%' ");
        }
        else {
            //$prepararConsulta = $this->query->prepare("SELECT u.id_usuario, u.email, u.clave, u.nombre, u.apellido, r.rol, u.estado_usuario FROM usuario u inner join rol r ON r.id_rol=u.id_rol LIMIT $u_por_paginas OFFSET $offset");
            $prepararConsulta = $this->query->prepare("SELECT u.id_usuario, u.email, u.clave, u.nombre, u.apellido, r.rol, u.estado_usuario FROM usuario u inner join rol r ON r.id_rol=u.id_rol");
        }

        $prepararConsulta->execute();
        $resultado = $prepararConsulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
