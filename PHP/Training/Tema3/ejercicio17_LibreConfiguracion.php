<!--
    Escribe un programa que diga cuál es la primera cifra de un número entero introducido por teclado.
    Se permiten números de hasta 5 cifras.

-->
<!DOCTYPE html>
<html>
<head>
    <title>Primera Cifra de un Número Entero</title>
</head>
<body>
    <h1>Primera Cifra de un Número Entero</h1>
    <form action="" method="post">
        <label for="numero">Ingrese un número entero (hasta 5 cifras):</label>
        <input type="number" name="numero" required>
        <input type="submit" value="Calcular Primera Cifra">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número ingresado por el usuario
        $numero = $_POST["numero"];

        // Verificar si el número tiene más de 5 cifras
        if (abs($numero) >= 100000) {
            echo "<p>El número ingresado tiene más de 5 cifras.</p>";
        } else {
            // Obtener la primera cifra utilizando divisiones sucesivas
            $primeraCifra = abs($numero);
            while ($primeraCifra >= 10) {
                $primeraCifra = floor($primeraCifra / 10);
            }

            // Mostrar la primera cifra
            echo "<h2>La primera cifra de $numero es $primeraCifra.</h2>";
        }
    }
    ?>
</body>
</html>
