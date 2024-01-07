<!--
    Escribe un programa que dada una hora determinada (horas y minutos), calcule los segundos que
    faltan para llegar a la medianoche.

-->
<!DOCTYPE html>
<html>
<head>
    <title>Calcular Segundos Hasta Medianoche</title>
</head>
<body>
    <h1>Calculadora de Segundos Hasta Medianoche</h1>
    <form action="ejercicio11_LibreConfiguracion.php" method="post">
        <label for="hora">Hora:</label>
        <input type="number" name="hora" min="0" max="23" required>
        <label for="minutos">Minutos:</label>
        <input type="number" name="minutos" min="0" max="59" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener la hora y los minutos introducidos en el formulario
        $hora = $_POST["hora"];
        $minutos = $_POST["minutos"];

        // Validar que los valores estén dentro de los rangos permitidos
        if ($hora >= 0 && $hora <= 23 && $minutos >= 0 && $minutos <= 59) {
            // Calcular los segundos hasta la medianoche
            $segundosHastaMedianoche = ($hora * 3600) + ($minutos * 60);

            // Mostrar el resultado
            echo "Faltan $segundosHastaMedianoche segundos para llegar a la medianoche.";
        } else {
            echo "Por favor, ingresa valores válidos para la hora y los minutos.";
        }
    }
    ?>
</body>
</html>