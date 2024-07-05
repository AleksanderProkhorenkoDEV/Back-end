<?php

class Bd {
    private $host = "localhost";
    private $user = "root";
    private $contraseña = "";
    private $bdNombre = "biblioteca";

    protected function conexion(){
        $direccion = 'mysql:host='.$this->host.';dbname='.$this->bdNombre;
        $pdo = new PDO($direccion, $this->user, $this->contraseña);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
} 