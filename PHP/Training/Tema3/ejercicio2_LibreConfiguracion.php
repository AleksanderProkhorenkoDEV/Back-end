<!--
    Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
    tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
    respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 2</title>
    </head>
    <body>
        <form action="ejercicio2_LibreConfiguracion.php" method="post">
            <label for="hora">Introduce la hora y te saludo</label>
            <input type="text" name="hora">
            <input type="submit" value="enviar">
        </form>
        <?php
            $hora=0;
            if(isset($_POST["hora"])){
                $hora = $_POST["hora"];
                if($hora <= 12 && $hora >= 6){
                    echo "<p>Buenos dias</p>";
                }elseif($hora >= 13 && $hora <= 20 ){
                    echo "<p>Buenas tardes</p>";
                }elseif($hora >= 21 && $hora <= 24 || $hora <= 5){
                    echo "<p>Buenas noches</p>";
                }
            }
        ?>
    </body>
</html>