<!--
    Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 1</title>
    </head>
    <body>
        <form action="ejercicio1_LibreConfiguracion.php" method="post">
            <label for="numero1">Introduzca el primer número </label>
            <input type="text" name="numero1">
            <br>
            <label for="numero2">Introduzca el segundo número </label>
            <input type="text" name="numero2">
            <br>
            <input  type="submit" value="Enviar" />

        </form>
        <br>
        <?php
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            
            if(isset($_POST["numero1"]) && isset($_POST["numero2"]) && $_POST["numero1"] !== "" && $_POST["numero2"] !== ""){
                echo "El resultado de: <br>" ,"$numero1 x $numero2 = ", $numero1*$numero2;
            }else{
                echo "Envio los datos vacios";
            }
        ?>
    </body>
</html>