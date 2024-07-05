<!--
    Modifica el programa anterior para que muestre tu dirección y tu número de teléfono. Cada dato
    se debe mostrar en una línea diferente. Mezcla de alguna forma las salidas por pantalla, utilizando
    tanto HTML como PHP.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php
            $direccion = "c/Inventada nº7";
            $numeroTelefono = "+34 123456789";
            echo "Mi dirección es ",$direccion;
            echo "<br>";
            echo "Mi número de teléfono: ",$numeroTelefono;
        ?>
    </body>
</html>