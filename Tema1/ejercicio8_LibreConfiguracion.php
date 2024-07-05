<!--
    Realiza un conversor de euros a pesetas. La cantidad en euros que se quiere convertir deberá estar
    almacenada en una variable.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 8</title>
    </head>
    <body>
        <form action="ejercicio8_LibreConfiguracion.php" method="post">
            <label for="euros">Introduce la cantidad de euros que quieres convertir a pesetas</label>
            <input type="text" name="euros">
            <br>
            <input type="submit" value="Enviar" />
        </form>
        <?php 
            $eurosParaConvertir = 0;
            $pesetas = 166;
            $expresionRegular = '/^[1-9]\d*$/';
            if(isset($_POST["euros"]) && preg_match($expresionRegular, $_POST["euros"])){
                $eurosParaConvertir = $_POST["euros"];
                echo "<br>El restulado de la conversión es: " ,$eurosParaConvertir * $pesetas;
            }else{
                echo "<p>No se puede convertir los euros, porque <b>no introducio</b> los datos correctamente <p>";
            }
        ?>
    </body>
</html>