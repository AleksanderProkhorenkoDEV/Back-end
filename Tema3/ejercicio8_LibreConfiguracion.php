<!--
    Amplía el programa anterior para que diga la nota del boletín (insuficiente, suficiente, bien, notable
    o sobresaliente).

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 8</title>
    </head>
    <body>
        <form action="ejercicio8_LibreConfiguracion.php" method="post">
            <label for="nota1">Introduce la primera nota </label>
            <input type="text" name="nota1">
            <br>
            <label for="nota2">Introduce la segunda nota</label>
            <input type="text" name="nota2">
            <br>
            <label for="nota3">Introduce la tercera nota</label>
            <input type="text" name="nota3">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $nota1=0;
            $nota2=0;
            $nota3=0;
            $resultado=0;
            if(isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["nota3"])){
                $nota1 = $_POST["nota1"];
                $nota2 = $_POST["nota2"];
                $nota3 = $_POST["nota3"];
                $resultado =  ($nota1 + $nota2 + $nota3)/3;

                if($resultado >= 9 && $resultado <= 10){
                    echo "sobresaliente";
                }
                if($resultado >= 7 && $resultado <= 8){
                    echo "notable";
                }
                if($resultado == 6){
                    echo "bien";
                }
                if($resultado == 5){
                    echo "suficiente";
                }
                if($resultado <= 4){
                    echo "insuficiente";
                }
            }
            
        ?>
    </body>
</html>