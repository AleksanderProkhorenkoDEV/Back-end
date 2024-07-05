<!--
    Escribe un programa que calcule el total de una factura a partir de la base imponible.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 7</title>
    </head>
    <body>
        <h1>Aplicación para calcular la base imponible</h1>
        <form action="ejercicio7_LibreConfiguracion.php" method="post">
            <label for="baseCalculo">Introduce la base imponible</label>
            <input type="text" name="baseCalculo">
            <input type="submit" value="enviar">
        </form>
        <?php
            $IVA = 0.21;
            $resultado=0;
            $baseCalculo=0;
            if(isset($_POST["baseCalculo"]) && $_POST["baseCalculo"] !== "" ){
                $baseCalculo = $_POST["baseCalculo"];
                $resultado = $baseCalculo * $IVA;
                $resultado = $baseCalculo + $resultado;
                echo "<p> $resultado </p>";
            }
        ?>
    </body>
</html>