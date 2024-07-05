<!--
    Crea las variables $nombre, $direccion y $telefono y asígnales los valores adecuados. Muestra los
    valores por pantalla de tal forma que el resultado sea el mismo que el del ejercicio 2.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 7</title>
    </head>
    <body>
        <p>
            <?php
                $nombre = "Aleksander Trujillo";
                $direccion = "c/Inventada nº7";
                $telefono = "123456789";

                echo "Mi<b> nombre </b>es $nombre";
                echo "<br>";
                echo "Mi<b> dirección </b>es $direccion";
                echo "<br>";
                echo "Mi<b> número </b> es $telefono";
            ?>
        </p>    
    </body>
</html>