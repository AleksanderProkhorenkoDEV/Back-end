<!--
    Escribe un programa que ordene tres números enteros introducidos por teclado.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Ordenar Números</title>
</head>
<body>
    <h1>Ordenar Números</h1>
    <form action="ejercicio13_LibreConfiguracion.php" method="post">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" required><br>

        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" required><br>

        <label for="numero3">Número 3:</label>
        <input type="number" name="numero3" required><br>

        <input type="submit" value="Ordenar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los números ingresados por el usuario
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $numero3 = $_POST["numero3"];

        // Ordenar los números en orden ascendente
        if ($numero1 > $numero2) {
            list($numero1, $numero2) = array($numero2, $numero1);
        }
        if ($numero2 > $numero3) {
            list($numero2, $numero3) = array($numero3, $numero2);
        }
        if ($numero1 > $numero2) {
            list($numero1, $numero2) = array($numero2, $numero1);
        }

        // Mostrar los números ordenados
        echo "<h2>Números ordenados en orden ascendente:</h2>";
        echo "Número 1: $numero1<br>";
        echo "Número 2: $numero2<br>";
        echo "Número 3: $numero3<br>";
    }
    ?>
</body>
</html>