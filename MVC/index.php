<?php
    include 'includes/autoCarga.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 


        //VISTA
        $libroObjV = new LibrosViews();
        $libroObjV->mostrarUnLibro("El hipnotista");

        //CONTROLADOR
        $libroObjC = new LibrosController();
        $libroObjC->introducirLibro("El fin del mundo", "Terror", "Escrito por Aleksander");
        $libroObjV->mostrarUnLibro("El fin del mundo");
    ?>
</body>
</html>