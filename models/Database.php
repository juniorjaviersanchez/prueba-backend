<?php
class Database
{
    public static function StartUp()
    {
        try {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=intelcost_bienes;charset=utf8;port=3309', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            return $pdo;
        }catch(PDOException $e)
        {
        echo "La conexión ha fallado: " . $e->getMessage();
        }
    }
}