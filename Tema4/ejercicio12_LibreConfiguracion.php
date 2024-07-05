<!--
    Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. El primer término
    de la serie de Fibonacci es 0, el segundo es 1 y el resto se calcula sumando los dos anteriores, por lo
    que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144… El número n se debe
    introducir por teclado.

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 12</title>
    </head>
    <body>
        <form action="ejercicio12_LibreConfiguracion.php" method="post">
            <label>Introduce el numero para averiguar la serie de fibonachi </label>
            <br>
            <input type="number" name="number"min="1">
            <br>
            <input type="submit" name="submit" value="enviar">
        </form>
    </body>
</html>

<?php
    $sumaNumeros=0;

    $serieNumeros = [];
    $serieNumeros[0] = 0;
    $serieNumeros[1] = 1;
    /**
     * Hacemos validaciones para que llegen los datos del formulario correctamente
     */
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["submit"])){
            /**
             * Establecemos los valores limites del for
             */
            $n = (int)($_POST["number"]);
            /**
             * Calculamos el algoritmo de fibonachi mediante la suma de dos numeros, empieza en el indice 2, porque es el siguiente numero a 0 1 = 1. 
             * Lo hacemos mediante la resta de indics para que se sumen 0 + 1 y lo metemos en la posicion 2 que es donde lo iniciamos
             */
            for($i=2; $i < $n ; $i++){
                $serieNumeros[$i] = $serieNumeros[$i-1] + $serieNumeros[$i-2];
            }
        
            echo  implode(",", $serieNumeros);
        }
    }
?>