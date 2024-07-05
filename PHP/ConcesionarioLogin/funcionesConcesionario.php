<?php

/**
 * Esta función recibe el metodo POST, se encarga de comprobar que no viene vacio, posteriormente con la esctructura Swicht va recorriendola y escogiendo el precio para cada cosa
 * , luego posteriormente realiza la suma de lo que costaría el coche y la devuelve por un return.
 */
function calcularPrecioConcesionario(){
    $precioTotal = 0;
    $precioModelo = 0;
    $precioColor = 1500;
    $precioTipo = 0;
    $precioPuertas = 0;
    $precioMotor = 0;
    $precioCaballos = 0;

   
    if(isset($_SESSION["formularioEleccion"])){
        $formularioEleccion = $_SESSION["formularioEleccion"];
        switch ($formularioEleccion["modelo"]) {
            case "mercedes":
                $precioModelo = 20000;
                break;
            case "renault":
                $precioModelo = 15000;
                break;
            case "nisan":
                $precioModelo = 35000;
                break;
            case "toyota":
                $precioModelo = 12000;
                break;
            case "mitchubichi":
                $precioModelo = 14000;
                break;
            case "opel":
                $precioModelo = 18000;
                break;
            case "seat":
                $precioModelo = 8000;
                break;
            case "Audi":
                $precioModelo = 22000;
                break;
        }
        switch ($formularioEleccion["tipo"]) {
            case "sedan":
                $precioTipo = 5000;
                break;
            case "hatchback":
                $precioTipo = 6500;
                break;
            case "coupe":
                $precioTipo = 12000;
                break;
            case "suv":
                $precioTipo = 21000;
                break;
            case "stationVagon";
                $precioTipo = 17500;
                break;
            case "crossover":
                $precioTipo = 31000;
                break;
            case "convertible":
                $precioTipo = 50000;
                break;
            case "mpv":
                $precioTipo = 55000;
                break;
        }
        if ($formularioEleccion["puertas"] == 2) {
            $precioPuertas = 2500;
        } else {
            $precioPuertas = 5000;
        }

        switch ($formularioEleccion["motor"]) {
            case "diesel":
                $precioMotor = 1500;
                break;
            case "Electrico":
                $precioMotor = 3000;
                break;
            case "Gasolina":
                $precioMotor = 2000;
                break;
            case "Hibrido":
                $precioMotor = 2500;
                break;
        }
        $cv = $formularioEleccion["cv"];
        switch ($cv) {
            case ($cv < 100):
                $precioCaballos = 500;
                break;
            case ($cv >= 100):
                $precioCaballos = 1000;
                break;
            case ($cv >= 150):
                $precioCaballos = 1500;
                break;
        }

        $precioTotal = $precioColor + $precioModelo + $precioMotor + $precioPuertas + $precioTipo + $precioCaballos;

    }
    
    return $precioTotal;

}






?>