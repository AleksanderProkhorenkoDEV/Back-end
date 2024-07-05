<?php
include("funciones.php");


$array = [1,2,3,4,5];
$nRotar = -5;


$arrayResultado = array_merge(rotarDerechaArray($nRotar,$array));

for($i = 0; $i < count($arrayResultado); $i++){
    echo $arrayResultado[$i] ,",";
}

?>