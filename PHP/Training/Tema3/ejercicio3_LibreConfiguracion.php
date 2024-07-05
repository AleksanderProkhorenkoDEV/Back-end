<!--
    Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día
    de la semana.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 3 </title>
    </head>
    <body>
        <form action="ejercicio3_LibreConfiguracion.php" method="post">
            <label for="diaSemana">Introduce el dia de la semana</label>
            <input type="text" name="diaSemana">
            <input type="submit" value="enviar">
        </form>
        <?php
            $diaSemana = "";
            $diaSemana = $_POST["diaSemana"];

            switch($diaSemana){
                case "1":
                    echo "Lunes";
                    break;
                case "2":
                    echo "Martes";
                    break;
                case "3":
                    echo "Miercoles";
                    break;
                case "4":
                    echo "Jueves";
                    break;
                case "5":
                    echo "Viernes";
                    break;
                case "6":
                    echo "Sabado";
                    break;
                case "7":
                    echo "Domingo";
                    break;
                default:
                    echo "No es correcto ese numero";
            }
        ?>
    </body>
</html>