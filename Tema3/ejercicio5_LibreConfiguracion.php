<!--
    Realiza un programa que resuelva una ecuación de primer grado (del tipo ax + b = 0).
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 5</title>
    </head>
    <body>
        <form action="ejercicio5_LibreConfiguracion.php" method="post">
            <label for="variableA">Introduce la variable a </label>
            <input type="text" name="variableA">
            <br>
            <label for="variableB">Introduce la variable b </label>
            <input type="text" name="variableB">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $variableA=0;
            $variableB=0;
            $resultado=0;
            if(isset($_POST["variableA"]) && isset($_POST["variableB"])){
                $variableA = $_POST["variableA"];
                $variableB = $_POST["variableB"];

                if($variableA > 0){
                    $resultado = -($variableB/$variableB);
                    echo $resultado;
                }
            }
        ?>
    </body>
</html>