<!--
    Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
    almacenada en una variable.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 9</title>
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
            $resultadoPesetas=0;
            $expresionRegular = '/^[1-9]\d*$/';
            if(isset($_POST["euros"]) && preg_match($expresionRegular, $_POST["euros"])){
                $eurosParaConvertir = $_POST["euros"];
                $resultadoPesetas = $eurosParaConvertir * $pesetas;
                echo "<br>El restulado de la conversión es: " ,$resultadoPesetas;
            }else{
                echo "<p>No se puede convertir los euros, porque <b>no introducio</b> los datos correctamente <p>";
            }
        ?>
    </body>
</html>