<?php
include_once "Bd.class.php";
include_once "includes/funciones.inc.php";

class Libros extends Bd{

    protected function obtenerTodosLosLibros(){
        $consulta = "SELECT * FROM libros";
        $stmt = $this->conexion()->query($consulta);
        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    protected function obtenerUnLibro($titulo){
        $resultado = null;

        if(validarTitulo($titulo)){
            $consulta = "SELECT * FROM libros WHERE titulo = :titulo";
            $stmt = $this->conexion()->prepare($consulta);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();  

        }

        return $resultado;
    }

    protected function crearLibroNuevo($titulo, $categoria, $descripcion, $autor_id){
        $resultado = null;
        if(validarTitulo($titulo) && validarTitulo($categoria) && validarTitulo($descripcion)){
            try {
                $consulta = "INSERT INTO libros (titulo, categoria, descripcion, autor_id) VALUES (:titulo, :categoria, :descripcion, :autor_id)";
                $stmt = $this->conexion()->prepare($consulta);
                $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(':autor_id', $autor_id, PDO::PARAM_INT);
    
                $stmt->execute();
                
                $resultado = true; 
            } catch (PDOException $e) {
                echo "Error al insertar el libro: " . $e->getMessage();
            }
        }
        return $resultado;
    }
}


