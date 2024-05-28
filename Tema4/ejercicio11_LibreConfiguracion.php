<!--
    Escribe un programa que muestre en tres columnas, el cuadrado y el cubo de los 5 primeros números
    enteros a partir de uno que se introduce por teclado.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejecicio 11</title>
    </head>
    <body>
        <form action="ejercicio11_LibreConfiguracion.php" method="post">
            <label> Introduce el numero que quieras </label>
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

            $numeroBase = $_POST["numero"];
            $cuadrado = 0;
            $cubo = 0;
            echo "--Numero Base-- --Numero Cuadrado-- --Numero Cubo-- ";
            for($i = $numeroBase; $i <= ($numeroBase + 4); $i++){
                echo "<br>";
                $cuadrado = $i*$i;
                $cubo = $i*$i*$i;
                echo "Numero: $i --  $cuadrado -- $cubo" ;
            }
        }

    }
?>