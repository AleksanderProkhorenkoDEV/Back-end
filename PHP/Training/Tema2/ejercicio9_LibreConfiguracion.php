<!--
    Escribe un programa que calcule el volumen de un cono mediante la fórmula V =1/3πr2h.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 8</title>
    </head>
    <body>
        <h1>Calculo de volumen</h1>
        <form action="ejercicio9_LibreConfiguracion.php" method="post">
            <label for="altura">Introduce la altura</label>
            <input type="text" name="altura">
            <br>
            <label for="radio">Introduce el radio</label>
            <input type="text" name="radio">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $altura=0;
            $radio=0;
            $pi=3.14;
            $resultado = 0;
            if(isset($_POST["radio"]) && $_POST["radio"] !== "" && isset($_POST["altura"]) && $_POST["altura"] !== "" ){
                $altura = $_POST["altura"];
                $radio = $_POST["radio"];

                $resultado = (1*$radio * $radio * $pi * $altura)/3;
                echo "El resultado es: $resultado";
            }else{
                echo "No se puede realizar la operación";
            }   
        ?>
    </body>
</html>