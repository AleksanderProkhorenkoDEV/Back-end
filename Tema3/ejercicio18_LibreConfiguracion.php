<!--
    Realiza un programa que nos diga cuántos dígitos tiene un número entero que puede ser positivo o
    negativo. Se permiten números de hasta 5 dígitos
-->
<!DOCTYPE html>
<html>
<head>
    <title>Cantidad de Dígitos en un Número Entero</title>
</head>
<body>
    <h1>Cantidad de Dígitos en un Número Entero</h1>
    <form action="" method="post">
        <label for="numero">Ingrese un número entero (hasta 5 dígitos):</label>
        <input type="number" name="numero" required>
        <input type="submit" value="Calcular Cantidad de Dígitos">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número ingresado por el usuario
        $numero = $_POST["numero"];

        // Obtener la cantidad de dígitos utilizando la función abs() y luego convirtiendo a cadena
        $cantidadDigitos = strlen((string) abs($numero));

        // Mostrar la cantidad de dígitos
        echo "<h2>El número ingresado tiene $cantidadDigitos dígitos.</h2>";
    }
    ?>
</body>
</html>
