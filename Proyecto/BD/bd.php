<?php

class BD
{
    private $connection;
    /**
     * Get the value of connection
     */
    public static function getConnection()
    {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=proyecto', 'root');
         // $connection = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '1234');
        } catch (PDOException $e) {
            throw new PDOException("Error en la conexión hola!!: " . $e->getMessage());
        }
       return $connection; 
    }
}
