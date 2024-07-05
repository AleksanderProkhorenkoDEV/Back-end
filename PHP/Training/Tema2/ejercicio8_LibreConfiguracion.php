<!--
    Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
    Se pagarán 12 euros por hora
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 8</title>
    </head>
    <body>
        <form action="ejercicio8_LibreConfiguracion.php" method="post">
            <label for="totalHoras">Introduce la cantidad de horas trabajadas</label>
            <input type="text" name="totalHoras">
            <input type="submit" value="Enviar">
        </form>
        <?php
            $totalHoras=0;
            $salarioTotal=0;
            $salarioXhora=12;

            if(isset($_POST["totalHoras"]) && $_POST["totalHoras"] !== "" ){
                $totalHoras = $_POST["totalHoras"];
                $salarioTotal = $totalHoras * $salarioXhora;
                echo "<p>El salario total de esta semana es: $salarioTotal</p>";
            }else{
                echo "<h1>Error al introducir los datos</h1>";
            }
        ?>
    </body>
</html>