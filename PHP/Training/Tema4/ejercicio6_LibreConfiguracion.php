<!--
    Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle do-while.
-->

<?php

    $inicial=320;

    do{
        echo "$inicial <br>";
        $inicial -=20;
    }while($inicial >= 160);

?>