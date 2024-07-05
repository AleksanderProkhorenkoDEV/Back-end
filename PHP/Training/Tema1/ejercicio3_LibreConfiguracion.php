<!--
    Escribe un programa que muestre por pantal la 10 palabras en inglés junto a su correspondiente
    traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
    <table> de HTML.
-->
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8" />
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
            $tituloIngles = "English";
            $tituloEspañol = "Spanish";
            echo 
                "<table>
                    <tr>
                        <th>$tituloIngles</th>
                        <th>$tituloEspañol</th>
                    </tr>
                    <tr>
                        <td>Car</td>
                        <td>Coche</td>
                    </tr>
                    <tr>
                        <td>Apple</td>
                        <td>Manzana</td>
                    </tr>
                    <tr>
                        <td>Travel</td>
                        <td>Viajar</td>
                    </tr>
                    <tr>
                        <td>Phone</phone>
                        <td>Móvil</pd>
                    </tr>
                    <tr>
                        <td>Laptop</td>
                        <td>Pórtatil<td>
                    </tr>
                    <tr>
                        <td>Keyboard</td>
                        <td>Teclado</td>
                    </tr>
                    <tr>
                        <td>Mouse</td>
                        <td>Ratón</td>
                    </tr>
                    <tr>
                        <td>Table</td>
                        <td>Mesa</td>
                    </tr>
                    <tr>
                        <td>Chair</td>
                        <td>Silla</td>
                    </tr>
                    <tr>
                        <td>Nismo</td>
                        <td>Nissan</td>
                    </tr>
                </table>"
        ?>
    </body>
</html>