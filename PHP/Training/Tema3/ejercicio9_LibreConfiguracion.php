<!--
    Realiza un programa que resuelva una ecuación de segundo grado (del tipo ax2 + bx + c = 0).
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 9</title>
    </head>
    <body>
        <form action="ejercicio9_LibreConfiguracion.php" method="post">
            <label for="variableA">Introduce la variable a </label>
            <input type="text" name="variableA">
            <br>
            <label for="variableB">Introduce la variable b </label>
            <input type="text" name="variableB">
            <br>
            <label for="variableB">Introduce la variable c </label>
            <input type="text" name="variableC">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $variableA=0;
            $variableB=0;
            $variableC = 0;
            $resultado1=0;
            $resultado2=0;
            if(isset($_POST["variableA"]) && isset($_POST["variableB"]) && isset($_POST["variableC"])){
                $variableA = $_POST["variableA"];
                $variableB = $_POST["variableB"];
                $variableC = $_POST["variableC"];

                if($variableA > 0){
                    $discriminante = $variableB * $variableB - 4 * $variableA * $variableC;
                    echo "$discriminante <br>";
                    $resultado1 = (-$variableB + sqrt($discriminante)) / (2 * $variableA);
                    $resultado2 = (-$variableB - sqrt($discriminante)) / (2 * $variableA);
                    echo "Resultado 1: $resultado1 <br>";
                    echo "Resultado 2: $resultado2";
                }
            }
        ?>
    </body>
</html>