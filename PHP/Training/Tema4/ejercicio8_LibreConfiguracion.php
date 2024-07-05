<!--
    Muestra la tabla de multiplicar de un número introducido por teclado. El resultado se debe mostrar
    en una tabla (<table> en HTML).
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Ejercicio 8 </title>
    </head>
    <body>
        <form name="formulario" id="formulario" action="ejercicio8_LibreConfiguracion.php" method="post">
            <label>Introduce el numero el cual quieras obtener su tabla de multiplicar</label>
            <br>
            <input type="number" name="numero" min="1">
            <br>
            <input type="submit" value="Enviar" name="submit">
        </form>
    </body>
    <br>
    <table>
        <thead>
            <th>Tabla de multiplicar de 
                <?php 
                    if($_SERVER["REQUEST_METHOD"] === "POST"){
                        if(isset($_POST["submit"])){
                            $numeroTabla = $_POST["numero"];
                            print($numeroTabla);
                        }
                    }
                ?>
            </th>
        </thead>
        <tbody>
            <tr>
                <?php
                    if($_SERVER["REQUEST_METHOD"] === "POST"){
                        if(isset($_POST["submit"])){
                            $numeroTabla = $_POST["numero"];
                            $resultado = 0;
                            for($i=1; $i <= 10; $i++){
                                $resultado = $i * $numeroTabla;
                                echo "<tr>";
                                    echo "<td>$i x $numeroTabla = $resultado </td>";
                                echo "</tr>";    
                            }
                        }
                    }
                ?>
            </tr>
        </tbody>
    </table>
</html>
