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
          $connection = new PDO('mysql:host=192.168.121.85;dbname=prueba', 'root', '1234');
        } catch (PDOException $e) {
            throw new PDOException("Error en la conexión: " . $e->getMessage());
        }
       return $connection; 
    }
}
