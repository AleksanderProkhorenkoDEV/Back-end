<!--
    Escribe un programa que utilice las variables $x y $y. Asignales los valores 144 y 999 respectivamente. A continuación, muestra por pantalla el valor de cada variable, 
    la suma, la resta, la división y la multiplicación.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 5</title>
    </head>
    <body>
        <h2>Suma</h2>
        <p>
            <?php
                $x = 144;
                $y = 999;

                echo $x + $y;
            ?>
        </p>
        <h2>Resta</h2>
        <p>
            <?php
                echo $x - $y;
            ?>
        </p>
        <h2>Multiplicación</h2>
        <p>
            <?php
                echo $x * $y;
            ?>
        </p>   
        <h2>División</h2>
        <p>
            <?php
                echo $x / $y;
            ?>
        </p>               
    </body>
</html>