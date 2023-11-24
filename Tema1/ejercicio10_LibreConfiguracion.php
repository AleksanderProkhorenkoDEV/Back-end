<!--
    Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base de la
    pirámide debe estar formada por 9 asteriscos.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 10</title>
    </head>
    <body>
        <p>
            <?php 
            $altura =5;
            
            for($i = 0; $i < $altura; $i++){
                echo "<br>";
                $espaciosBlanco = $altura - $i;
                for($j = 1; $j <= $espaciosBlanco; $j++){
                    echo "&nbsp;";
                }
                for($base = 0; $base < $i; $base++){
                    echo "* ";
                }
            }
            ?>
        </p>
    </body>
</html>