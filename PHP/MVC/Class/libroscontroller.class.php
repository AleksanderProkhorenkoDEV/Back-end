<?php
include_once "libros.class.php";
include_once "includes/funciones.inc.php";

class LibrosController extends Libros{
    public function introducirLibro($titulo, $categoria, $descripcion){
        $autor_id = 2; //Es una aplicacion sencilla, asi que se lo añado a un escritor ya creado para hacer la prueba
        if(validarTitulo($titulo) && validarTitulo($categoria) && validarTitulo($descripcion)){
            $this->crearLibroNuevo($titulo, $categoria, $descripcion, $autor_id);
        }
    }
}

