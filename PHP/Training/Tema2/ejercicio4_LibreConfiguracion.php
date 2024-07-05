<!--
    Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 4 </title>
    </head>
    <body>
        <form action="ejercicio4_LibreConfiguracion.php" method="post">
            <label for="numero1">Introduce el primer numero </label>
            <input type="text" name="numero1">
            <br>
            <label for="numero2">Introduce el segundo numero</label>
            <input type="text" name="numero2">
            <br>
            <input type="submit" value="Enviar">
        </form>
        <?php
            $numero1=0;
            $numero2=0;
            if(isset($_POST["numero1"]) && isset($_POST["numero2"]) && $_POST["numero1"] !== "" && $_POST["numero2"] !== ""){
                $numero1=$_POST["numero1"];
                $numero2=$_POST["numero2"];

                echo "<h1>Suma</h1>";
                echo "<p>$numero1 + $numero2 = </p>", $numero1+$numero2;
                echo "<h1>Resta</h1>";
                echo "<p>$numero1 - $numero2 = </p>", $numero1-$numero2;
                echo "<h1>Multiplicación</h1>";
                echo "<p>$numero1 * $numero2 = </p>", $numero1*$numero2;
                echo "<h1>División</h1>";
                echo "<p>$numero1 / $numero2 = </p>", $numero1/$numero2;
            }else{
                echo "Envio los datos vacios";
            }
        ?>
    </body>
</html>