<!--
    Vamos a ampliar uno de los ejercicios de la relación anterior para considerar las horas extras. Escribe
    un programa que calcule el salario semanal de un trabajador teniendo en cuenta que las horas
    ordinarias (40 primeras horas de trabajo) se pagan a 12 euros la hora. A partir de la hora 41, se
    pagan a 16 euros la hora.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 4</title>
    </head>
    <body>
        <form action="ejercicio4_LibreConfiguracion.php" method="post">
            <label for="horasTrabajadas">Introduce la cantidad de horas </label>
            <input type="text" name="horasTrabajadas">
            <input type="submit" value="enviar">
        </form>
        <?php
            $horasTrabajadas = 0;
            $salarioBase = 12;
            $salarioPorEncimaBase = 16;

            $salarioTotal = 0;

            if(isset($_POST["horasTrabajadas"])){
                $horasTrabajadas = $_POST["horasTrabajadas"];

                $diferenciaHoras = 0;
                if($horasTrabajadas >= 41){
                    $diferenciaHoras = $horasTrabajadas - 40;
                    $salarioTotal = ($diferenciaHoras * $salarioPorEncimaBase) + (40 * $salarioBase);
                }else{
                    $salarioTotal = $horasTrabajadas * $salarioBase;
                }
            }
            echo "$salarioTotal";
        ?>
    </body>
</html>