<!--
    Escribe un programa que calcule el área de un triángulo.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 7 </title>
    </head>
    <body>
        <h1>Aplicación para calcular el área de un triángulo</h1>
        <form action="ejercicio6_LibreConfiguracion.php" method="post">
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

                echo "El área es: ",($alto * $ancho)/2;
            }else{
                echo "No se puede realizar la operación";
            }
        ?>
    </body>
</html>