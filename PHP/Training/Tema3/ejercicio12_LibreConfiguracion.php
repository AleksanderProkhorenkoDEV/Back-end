<!--
    Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
    el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
    obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
    de conocimientos en las diferentes asignaturas del curso.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario sobre Desarrollo Web</title>
</head>
<body>
    <h1>Cuestionario sobre Desarrollo Web</h1>
    <form action="ejercicio12_LibreConfiguracion.php" method="post">
        <!-- Pregunta 1 -->
        <h2>1. ¿Qué significa HTML?</h2>
        <label><input type="radio" name="q1" value="a"> HyperText Markup Language</label><br>
        <label><input type="radio" name="q1" value="b"> High-Level Text Manipulation Language</label><br>
        <label><input type="radio" name="q1" value="c"> Hyper Transfer Markup Language</label><br>

        <!-- Pregunta 2 -->
        <h2>2. ¿Cuál de las siguientes no es una etiqueta HTML válida?</h2>
        <label><input type="radio" name="q2" value="a"> &lt;p&gt;</label><br>
        <label><input type="radio" name="q2" value="b"> &lt;div&gt;</label><br>
        <label><input type="radio" name="q2" value="c"> &lt;section&gt;</label><br>

        <!-- Pregunta 3 -->
        <h2>3. ¿Cuál es el lenguaje de programación principal utilizado en el lado del cliente en desarrollo web?</h2>
        <label><input type="radio" name="q3" value="a"> PHP</label><br>
        <label><input type="radio" name="q3" value="b"> JavaScript</label><br>
        <label><input type="radio" name="q3" value="c"> Python</label><br>

        <!-- Pregunta 4 -->
        <h2>4. ¿Cuál de las siguientes no es una tecnología de hoja de estilo?</h2>
        <label><input type="radio" name="q4" value="a"> HTML</label><br>
        <label><input type="radio" name="q4" value="b"> CSS</label><br>
        <label><input type="radio" name="q4" value="c"> SCSS</label><br>

        <!-- Pregunta 5 -->
        <h2>5. ¿Cuál es el estándar principal para el intercambio de datos en la web?</h2>
        <label><input type="radio" name="q5" value="a"> XML</label><br>
        <label><input type="radio" name="q5" value="b"> JSON</label><br>
        <label><input type="radio" name="q5" value="c"> CSV</label><br>

        <!-- Pregunta 6 -->
        <h2>6. ¿Qué lenguaje se utiliza para agregar interactividad a una página web?</h2>
        <label><input type="radio" name="q6" value="a"> Java</label><br>
        <label><input type="radio" name="q6" value="b"> JavaScript</label><br>
        <label><input type="radio" name="q6" value="c"> C++</label><br>

        <!-- Pregunta 7 -->
        <h2>7. ¿Cuál es el propósito principal de SQL en desarrollo web?</h2>
        <label><input type="radio" name="q7" value="a"> Crear páginas web</label><br>
        <label><input type="radio" name="q7" value="b"> Gestionar bases de datos</label><br>
        <label><input type="radio" name="q7" value="c"> Diseñar interfaces de usuario</label><br>

        <!-- Pregunta 8 -->
        <h2>8. ¿Qué significa PHP en desarrollo web?</h2>
        <label><input type="radio" name="q8" value="a"> Personal Hypertext Processor</label><br>
        <label><input type="radio" name="q8" value="b"> Preprocessed Hypertext Pages</label><br>
        <label><input type="radio" name="q8" value="c"> PHP: Hypertext Preprocessor</label><br>

        <!-- Pregunta 9 -->
        <h2>9. ¿Cuál es el protocolo utilizado para transferir datos a través de la web?</h2>
        <label><input type="radio" name="q9" value="a"> HTTP</label><br>
        <label><input type="radio" name="q9" value="b"> FTP</label><br>
        <label><input type="radio" name="q9" value="c"> SMTP</label><br>

        <!-- Pregunta 10 -->
        <h2>10. ¿Cuál es el estándar de accesibilidad web que describe cómo hacer que el contenido web sea más accesible para personas con discapacidades?</h2>
        <label><input type="radio" name="q10" value="a"> HTML5</label><br>
        <label><input type="radio" name="q10" value="b"> CSS3</label><br>
        <label><input type="radio" name="q10" value="c"> WCAG</label><br>

        <input type="submit" value="Calcular Calificación">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicializa la calificación
        $calificacion = 0;

        // Comprueba las respuestas y suma puntos
        $respuestas = array("a", "b", "b", "a", "b", "b", "b", "c", "a", "c");
        for ($i = 1; $i <= 10; $i++) {
            $nombrePregunta = "q" . $i;
            if (isset($_POST[$nombrePregunta]) && $_POST[$nombrePregunta] == $respuestas[$i - 1]) {
                $calificacion++;
            }
        }

        // Muestra la calificación
        echo "<h2>Calificación obtenida: $calificacion / 10</h2>";
    }
    ?>
</body>
</html>