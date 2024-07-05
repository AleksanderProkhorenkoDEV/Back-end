<!--
    Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
    introducir por teclado.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 3 </title>
    </head>
    <body>
        <form action="ejercicio3_LibreConfiguracion.php" method="post">
            <label for="pesetas">Introduce la cantidad de pesetas que quieres convertir </label>
            <input type="text" name="pesetas">
            <br>
            <input type="submit" value="Convertir" />
        </form>
        <?php 
            $pesetasParaConvertir = 0;
            $pesetas = 166;
            $resultadoEuros=0;
            $expresionRegular = '/^[1-9]\d*$/';
            if(isset($_POST["pesetas"]) && preg_match($expresionRegular, $_POST["pesetas"])){
                $pesetasParaConvertir = $_POST["pesetas"];
                $resultadoEuros = $pesetasParaConvertir / $pesetas;
                echo "<br>El restulado de la conversión es: " ,$resultadoEuros;
            }else{
                echo "<p>No se puede convertir los euros, porque <b>no introducio</b> los datos correctamente <p>";
            }
        ?>
    </body>
</html>