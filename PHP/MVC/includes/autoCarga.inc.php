<?php

spl_autoload_register('autoCargaClases'); /**Metodo PHP que carga ficheros automaticamente con mi función */

function autoCargaClases($nombreClase){
    $ruta = "Class/"; /*Directorio donde se encuentran las clases*/
    $extension = ".class.php"; /**Extension de las clases */
    $rutaCompleta = $ruta . $nombreClase . $extension; /**Ruta completa para cargarlas */

    if(!file_exists($rutaCompleta)){ /**Comprobacion en caso de que no exista la clase que se quiera cargar */
        return false;
    }
    include_once $rutaCompleta; 
}