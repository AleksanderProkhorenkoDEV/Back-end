<!--
    Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que se quiere convertir se
    deberá introducir por teclado.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 2</title>
    </head>
    <body>
        <form action="ejercicio2_LibreConfiguracion.php" method="post">
            <label for="euros">Introduce la cantidad en euros que quieres convertir </label>
            <input type="text" name="euros">
            <br>
            <input type="submit" value="Convertir" />
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