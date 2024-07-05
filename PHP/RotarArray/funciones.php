<?php
function rotarDerechaArray($nNumerosRotar, $array){
    //Cojo la longitud del array y la almaceno, le hago el mod a la cantidad de numeros que hay que rotar entre la longitud
    $length = count($array);
    $nNumerosRotar = $nNumerosRotar % $length;
    //En caso de que salga negativo lo hago positivo
    if ($nNumerosRotar < 0) {
        $nNumerosRotar += $length; 
    }
    //Divido el array original en dos partes 0 hasta n, y desde n hasta length
    $parte1 = array_slice($array, -$nNumerosRotar);
    $parte2 = array_slice($array, 0, $length - $nNumerosRotar);
    //Los agrupo en un array nuevo
    $resultado = array_merge($parte1, $parte2);

    return $resultado;
} 

?>