<!--
    Realiza un programa que calcule la media de tres notas.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 7</title>
    </head>
    <body>
        <form action="ejercicio7_LibreConfiguracion.php" method="post">
            <label for="nota1">Introduce la primera nota </label>
            <input type="text" name="nota1">
            <br>
            <label for="nota2">Introduce la segunda nota</label>
            <input type="text" name="nota2">
            <br>
            <label for="nota3">Introduce la tercera nota</label>
            <input type="text" name="nota3">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $nota1=0;
            $nota2=0;
            $nota3=0;
            $resultado=0;
            if(isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["nota3"])){
                $nota1 = $_POST["nota1"];
                $nota2 = $_POST["nota2"];
                $nota3 = $_POST["nota3"];
                $resultado =  ($nota1 + $nota2 + $nota3)/3;
                echo "La media es: $resultado";
            }
        ?>
    </body>
</html>