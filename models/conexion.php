<?php

class ConexionDB
{

    private $host;
    private $db;
    private $user;
    private $password;


    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'homeros_pizza_db';
        $this->user = 'root';
        $this->password = '';
    }

    function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
