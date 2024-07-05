<!--
    Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle do-while.
-->
<?php
    $contador=0;

    do{
        if($contador % 5 == 0){
            echo "$contador es multiplo de cinco <br>";
        }
        $contador++;
    }while($contador <= 100);
?>