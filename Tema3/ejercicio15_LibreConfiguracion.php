<!--
    Realiza un programa que nos diga si hay probabilidad de que nuestra pareja nos está siendo
    infiel. El programa irá haciendo preguntas que el usuario contestará con verdadero o falso. Puedes
    utilizar radio buttons. Cada pregunta contestada como verdadero sumará 3 puntos. Las preguntas
    contestadas con falso no suman puntos.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario de Infidelidad</title>
</head>
<body>
    <h1>Cuestionario de Infidelidad</h1>
    <form action="" method="post">
        <h2>Pregunta 1: Tu pareja parece estar más inquieta de lo normal sin ningún motivo aparente.</h2>
        <label><input type="radio" name="q1" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q1" value="falso"> Falso</label><br>

        <h2>Pregunta 2: Ha aumentado sus gastos de vestuario.</h2>
        <label><input type="radio" name="q2" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q2" value="falso"> Falso</label><br>

        <h2>Pregunta 3: Ha perdido el interés que mostraba anteriormente por ti.</h2>
        <label><input type="radio" name="q3" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q3" value="falso"> Falso</label><br>

        <h2>Pregunta 4: Ahora se afeita y se asea con más frecuencia (si es hombre) o ahora se arregla el pelo y se asea con más frecuencia (si es mujer).</h2>
        <label><input type="radio" name="q4" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q4" value="falso"> Falso</label><br>

        <h2>Pregunta 5: No te deja que mires la agenda de su teléfono móvil.</h2>
        <label><input type="radio" name="q5" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q5" value="falso"> Falso</label><br>

        <h2>Pregunta 6: A veces tiene llamadas que dice no querer contestar cuando estás tú delante.</h2>
        <label><input type="radio" name="q6" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q6" value="falso"> Falso</label><br>

        <h2>Pregunta 7: Últimamente se preocupa más en cuidar la línea y/o estar bronceado/a.</h2>
        <label><input type="radio" name="q7" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q7" value="falso"> Falso</label><br>

        <h2>Pregunta 8: Muchos días viene tarde después de trabajar porque dice tener mucho más trabajo.</h2>
        <label><input type="radio" name="q8" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q8" value="falso"> Falso</label><br>

        <h2>Pregunta 9: Has notado que últimamente se perfuma más.</h2>
        <label><input type="radio" name="q9" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q9" value="falso"> Falso</label><br>

        <h2>Pregunta 10: Se confunde y te dice que ha estado en sitios donde no ha ido contigo.</h2>
        <label><input type="radio" name="q10" value="verdadero"> Verdadero</label>
        <label><input type="radio" name="q10" value="falso"> Falso</label><br>

        <input type="submit" value="Calcular Probabilidad">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicializa la puntuación
        $puntuacion = 0;

        // Suma puntos por las respuestas verdaderas
        $respuestas = array("verdadero", "verdadero", "verdadero", "verdadero", "verdadero", "verdadero", "verdadero", "verdadero", "verdadero", "verdadero");
        for ($i = 1; $i <= 10; $i++) {
            $nombrePregunta = "q" . $i;
            if (isset($_POST[$nombrePregunta]) && $_POST[$nombrePregunta] == $respuestas[$i - 1]) {
                $puntuacion += 3;
            }
        }

        // Determina el resultado según la puntuación
        if ($puntuacion >= 0 && $puntuacion <= 10) {
            $resultado = "¡Enhorabuena! Tu pareja parece ser totalmente fiel.";
        } elseif ($puntuacion >= 11 && $puntuacion <= 22) {
            $resultado = "Quizás exista el peligro de otra persona en su vida o en su mente, aunque seguramente será algo sin importancia. No bajes la guardia.";
        } else {
            $resultado = "Tu pareja tiene todos los ingredientes para estar viviendo un romance con otra persona. Te aconsejamos que indagues un poco más y averigües qué es lo que está pasando por su cabeza.";
        }

        // Muestra el resultado
        echo "<h2>Resultado:</h2>";
        echo "<p>$resultado</p>";
    }
    ?>
</body>
</html>