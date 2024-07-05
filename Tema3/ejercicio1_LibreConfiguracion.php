<!--
    Escribe un programa que pida por teclado un día de la semana y que diga qué asignatura toca a
    primera hora ese día.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 1</title>
    </html>
    <body>
        <form action="ejercicio1_LibreConfiguracion.php" method="post">
            <label for="diaSemana">Introduce un dia de la semana</label>
            <input type="text" name="diaSemana">
            <input type="submit" value="enviar">
        </form>
        <?php
            $diaSemana="";
            if(isset($_POST["diaSemana"]) && $_POST["diaSemana"] !== ""){
                $diaSemana = $_POST["diaSemana"];
                
                switch($diaSemana){
                    case "lunes":
                        echo "<p>Diseño</p>";
                        break;
                    case "martes":
                        echo "<p>Cliente</p>";
                        break;
                    case "miercoles":
                        echo "<p>Servidor</p>";
                        break;
                    case "jueves":
                        echo "<p>Diseño</p>";
                        break;
                    case "viernes":
                        echo "<p>Despliegue de servidor</p>";
                        break;
                }
                
            }
        ?>
    </body>
</html>