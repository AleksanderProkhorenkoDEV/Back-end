<!--
    Escribe un programa que diga cuál es la última cifra de un número entero introducido por teclado.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Última Cifra de un Número Entero</title>
</head>
<body>
    <h1>Última Cifra de un Número Entero</h1>
    <form action="ejercicio16_LibreConfiguracion.php" method="post">
        <label for="numero">Ingrese un número entero:</label>
        <input type="number" name="numero" required>
        <input type="submit" value="Calcular Última Cifra">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número ingresado por el usuario
        $numero = $_POST["numero"];

        // Obtener la última cifra utilizando el operador de módulo (%)
        $ultimaCifra = abs($numero % 10);

        // Mostrar la última cifra
        echo "<h2>La última cifra de $numero es $ultimaCifra.</h2>";
    }
    ?>
</body>
</html>
