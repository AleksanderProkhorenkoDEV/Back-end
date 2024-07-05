<?php

include_once "libros.class.php";

class LibrosViews extends Libros{
    public function mostrarLibros(){
        $resultado = $this->obtenerTodosLosLibros();

        foreach($resultado as $fila){
            echo "El nombre del Libro es: ".$fila["titulo"]."<br>";
            echo "La categoria del Libro es: ".$fila["categoria"]."<br>";
            echo "<br>";
        }
    }

    public function mostrarUnLibro($titulo){
        $resultado = $this->obtenerUnLibro($titulo);

        if ($resultado) {
            echo "EL LIBRO QUE BUSCAS ES: <br>";
            echo "El nombre del Libro es: ".$resultado["titulo"]."<br>";
            echo "La categoria del Libro es: ".$resultado["categoria"]."<br>";
            echo "La descripcion del Libro es: ".$resultado["descripcion"]."<br>";
            echo "<br>";
        } else {
            echo "Libro no encontrado";
        }

    }
}