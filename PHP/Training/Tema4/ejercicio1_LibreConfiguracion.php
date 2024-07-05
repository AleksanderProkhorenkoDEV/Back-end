<!--
    Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for.
-->
<?php
    $cinco = 5;

    for($i = 0; $i <= 100; $i++){
        if(($i % $cinco) == 0){
            echo "$i es multiplo de $cinco";
            echo "<br>";
        }
    }
?>