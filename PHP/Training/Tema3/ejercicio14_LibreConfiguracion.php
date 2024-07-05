<!--
    Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 5.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Verificar Número Par y Divisible por 5</title>
</head>
<body>
    <h1>Verificar Número Par y/o Divisible por 5</h1>
    <form action="" method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número ingresado por el usuario
        $numero = $_POST["numero"];

        // Verificar si el número es par
        if ($numero % 2 == 0) {
            echo "<p>El número $numero es par.</p>";
        } else {
            echo "<p>El número $numero no es par.</p>";
        }

        // Verificar si el número es divisible por 5
        if ($numero % 5 == 0) {
            echo "<p>El número $numero es divisible por 5.</p>";
        } else {
            echo "<p>El número $numero no es divisible por 5.</p>";
        }
    }
    ?>
</body>
</html>