<!--
    Escribe un programa que calcule el área de un rectángulo.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 5 </title>
    </head>
    <body>
        <form action="ejercicio5_LibreConfiguracion.php" method="post">
            <label for="altura"> Introduzca la altura </label>
            <input type="text" name="altura">
            <br>
            <label for="base">Introduce la base </label>
            <input type="text" name="base">
            <br>
            <input type="submit" value="Enviar">
        </form>   
        <?php
            $alto=0;
            $ancho=0;

            if(isset($_POST["altura"]) && isset($_POST["base"]) && $_POST["altura"] !== "" && $_POST["base"] !== ""){
                $alto = $_POST["altura"];
                $ancho = $_POST["base"];

                echo "El área es: ",$alto * $ancho;
            }else{
                echo "No se puede realizar la operación";
            }
        ?>
    </body>
</html>