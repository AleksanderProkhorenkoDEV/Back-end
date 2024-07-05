<!--
    Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle while.
-->
<?php

$contador=0;

while($contador <= 100){
    if($contador % 5 == 0){
        echo "$contador es multiplo de 5 <br>";
    }
    $contador++;
}

?>