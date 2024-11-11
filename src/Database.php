<?php

namespace App;

use PDO;
use PDOException;

class Database {

    public $mysql;

    public function __construct() {
        try {
            $this->mysql = $this->getCOnnection();
        } catch(PDOExeption $e) {
            echo "Conexión BBDD fallida: ". $e->getMessage();
        }
    }

    private function getConnection() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "prueba_consejeria";
        $charset = "utf-8";

        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host={$host};dbname={$database};charset{$charset}", $user, $password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}