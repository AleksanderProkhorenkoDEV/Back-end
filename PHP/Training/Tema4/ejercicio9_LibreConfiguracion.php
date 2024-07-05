<!--
    Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 9</title>
    </head>
    <body>
        <form name="formulario" action="ejercicio9_LibreConfiguracion.php" method="post">
            <label>Introduce el numero al que quieras averiguar la cantidad de digitos que tiene </label>
            <br>
            <input type="number" name="numero">
            <br>
            <input type="submit" name="submit" value="enviar">
        </form>
    </body>
</html>

<?php

 if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["submit"])){
        $numero = intval($_POST["numero"]);

        $restoModulo=$numero;
        $contador=0;

        if($numero < 10){
            $contador++;
        }else{
            do{ 

                $restoModulo = $restoModulo / 10;
                $contador++;
    
                if($restoModulo < 10){
                    $contador++;
                }
            }while($restoModulo >= 10);
        }

        echo "<br>";
        echo "$numero tiene : $contador cifras";
    }
 }

?>