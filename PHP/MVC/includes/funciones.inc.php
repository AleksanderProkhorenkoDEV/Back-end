<?php

function validarTitulo($titulo){
    $regex = "/^[a-zA-Z0-9\s]+$/";
    $esValido = true;

    if (!preg_match($regex, $titulo)) {
        $esValido = false;
    }

    return $esValido;
}