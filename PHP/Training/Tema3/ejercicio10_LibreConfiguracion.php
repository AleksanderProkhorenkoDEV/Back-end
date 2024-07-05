<!--
    Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Horóscopo</title>
</head>
<body>
    <h1>Calculadora de Horóscopo</h1>
    <form action="ejercicio10_LibreConfiguracion.php" method="post">
        <label for="fecha">Fecha de Nacimiento:</label>
        <input type="date" name="fecha" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener la fecha de nacimiento del formulario
            $fechaNacimiento = $_POST["fecha"];
            
            // Obtener el mes y el día de la fecha de nacimiento
            list($year, $month, $day) = explode("-", $fechaNacimiento);
            
            // Determinar el signo del zodíaco
            $signo = "";
            if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
                $signo = "Aries";
            } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
                $signo = "Tauro";
            } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
                $signo = "Géminis";
            } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
                $signo = "Cáncer";
            } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
                $signo = "Leo";
            } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
                $signo = "Virgo";
            } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
                $signo = "Libra";
            } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
                $signo = "Escorpio";
            } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
                $signo = "Sagitario";
            } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
                $signo = "Capricornio";
            } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
                $signo = "Acuario";
            } else {
                $signo = "Piscis";
            }
            
            // Mostrar el resultado
            echo "<p>Tu signo del zodíaco es: $signo</p>";
        }
    ?>
</body>
</html>