<?php
    include_once("claves.php");

    session_start();


    if(!isset($_SESSION["nameUser"]) || !isset($_SESSION["passwordUser"]) || !isset($_SESSION["nameUser"]) == 'nameUser' || !isset($_SESSION["passwordUser"]) == 'passwordUser'){
        header("Location: login.php");
    
        exit;
    }else{
        if($_SERVER["REQUEST_METHOD"] === "POST"){
        
            if(!isset($_POST["financiamiento"])){
                $precioTotal = $_SESSION["precioFinal"];
    
                $datosFormularioFinanciacion = $_POST;
                $_SESSION["financiacion"] = $datosFormularioFinanciacion;
    
                if(($_SESSION["financiacion"]["si"] === "si") && isset($_SESSION["financiacion"]["si"])){
                    echo "La financiación sera en 10 años y el precio aumenta en 7.500€, en total= ". $precioTotal+7500;
                }else{
                    echo "El precio final es: ".$resultadoFinanciacion;
                }
            }
        }
    }
?>