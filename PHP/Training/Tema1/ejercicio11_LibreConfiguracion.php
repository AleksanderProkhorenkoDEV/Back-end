<!--
    Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver únicamente el
    contorno hecho con asteriscos).
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 11</title>
    </head>
    <body>
        <p>
            <?php 
                $altura =5;
                    
                    for($i=1;$i<=$altura;$i++){
                        for ($s = 1; $s <= $altura- $i; $s ++) {// espacio de salida
                        echo '&nbsp;';
                    }
                    for($j=1;$j<=2*$i-1;$j++){
                            if ($j == 1 || $j == 2 * $i-1) {// asterisco de salida
                            echo '*';
                            } else {// espacios de salida en asteriscos
                            echo '&nbsp;';
                        }
                    }
                    echo '<br>';
                }
                for($base = 0; $base <= $altura; $base++){
                        echo "*";
                }
            ?>
        </p>
    </body>
</html>