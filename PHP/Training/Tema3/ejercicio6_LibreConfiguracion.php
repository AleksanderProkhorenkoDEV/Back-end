<!--
    Realiza un programa que calcule el tiempo que tardará en caer un objeto desde una altura h. Aplica
    la fórmula t =
    √2h
    g
    siendo g = 9.81m/s
    2

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio 6</title>
    </head>
    <body>
        <form action="ejercicio6_LibreConfiguracion.php" method="post" >
            <label form="altura">Introduce la altura</label>
            <input type="text" name="altura">
            <br>
            <input type="submit" value="enviar">
        </form>
        <?php
            $altura=0;
            $g= 9.81;
            $resultado=0;
            if(isset($_POST["altura"])){
                $altura = $_POST["altura"];
                if($altura >0){
                    $resultado = sqrt(2*$altura)/$g;
                    echo "El tiempo es: $resultado";
                }else{
                    echo "la altura no puede ser cero";
                }
            }
        ?>
    </body>
</html>