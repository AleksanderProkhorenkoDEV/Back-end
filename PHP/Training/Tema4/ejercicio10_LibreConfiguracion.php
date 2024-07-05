<!--
    Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
    teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
    terminado de introducir los datos cuando meta un número negativo.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejercico 10</title>
</head>
    <body>
        <form id='formulario' action='ejercicio10_LibreConfiguracion.php' method='post'>
            <label>Introduce numeros para calcular la media, cuando quieras parar introduce -1</label>
            <br>
            <input type='number' name='numeros'>
            <br>
            <input type='submit' name='submit' value='enviar'>
            </form> 
    </body>
</html>
<?php
    session_start();
    $contador= 0;
    
    /**
     * Hacemos una condicion que quiere decir, si la sesion de sumaNumeros y la de contador no estan creadas las creamos y las inicializamos, asi nos aseguramos que en el segundo envio
     * no se crean de nuevo y perdemos los datos almanceandos
     */
    if(!isset($_SESSION["sumaNumeros"]) || !isset($_SESSION["contador"])){
        $_SESSION["sumaNumeros"] = 0;
        
        $_SESSION["contador"] = $contador; 
    }
    /**
     * Realizo dos comprobaciones básicas para saber que no viene vacio el formulario y operamos con datos correctos.
     */
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_POST["submit"])) {
            
            /**
             * Inicializo la variable contador con la que tenia en el formulario anterior, asi se va incrementando y la uso luego para calcular la media.
             */
            $contador = $_SESSION["contador"];

            $numeros = intval($_POST["numeros"]);

            if($numeros != -1){
                $contador++;
                /**
                 * Almaceno la variable contador y la suma de los numeros que introduce el usuario por el formulario en sesiones, para poder usarlo luego cuando vuelva a enviarlo y no perder datos.
                 */
                $_SESSION["contador"] = $contador;
                $_SESSION["sumaNumeros"] += $numeros;
            }else{
                /**
                 * Realizo las operaciones porque cancela
                 */
                $sumaSesion = $_SESSION["sumaNumeros"];
                $contadorSesion = $_SESSION["contador"];
                $resultado = $sumaSesion / $contadorSesion;

                echo "La media es: $resultado";
                $_SESSION["contador"] = 0;
            }


                
        }
    }
?>