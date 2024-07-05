<body>
        <div class="contenedor">
            <form name="eleccion" action="index.php" method="post" class="form">
                <ul class="lista">
                    <li>
                        <label for="modelo">Introduzca el <b>modelo</b>: </label>
                        <select name="modelo" class="modelo-items">
                            <option value="mercedes">Mercedes</option>
                            <option value="renault">Renault</option>
                            <option value="nisan">Nissan</option>
                            <option value="toyota">Toyota</option>
                            <option value="mitchubichi">Mitchubichi</option>
                            <option value="opel">Opel</option>
                            <option value="seat">Seat</option>
                            <option value="Audi">Audi</option>
                        </select>
                    </li>
                    <li>
                        <label for="color">Introduzca el <b>color</b>: </label>
                        <input type="text" name="color" class="modelo-items"> 
                    </li>
                    <li>
                        <label for="tipo">Escoja el <b>tipo</b> del coche</label>
                        <select name="tipo" class="modelo-items">
                            <option value="sedan">Sedán</option>
                            <option value="hatchback">Hatchback</option>
                            <option value="coupe">Coupé</option>
                            <option value="suv">Suv</option>
                            <option value="stationVagon">Station Vagon</option>
                            <option value="crossover">Crossover</option>
                            <option value="convertible">Convertibles</option>
                            <option value="mpv">MPV</option>
                        </select>
                    </li>
                    <li>
                        <label for="puertas">Seleccione la cantidad de <b>puertas</b>: </label>
                        <select name="puertas" class="modelo-items">
                            <option  value="2" > 2 puertas </option>
                            <option  value="5" > 5 puertas </option>
                        </select>
                    </li>
                    <li>
                        <label for="cv">Introduzca la cantidad de <b>caballos</b> que tiene: </label>
                        <input type="text" name="cv" class="modelo-items">
                    </li>
                    <li>
                        <label for="motor">Indique el tipo de <b>motor</b> que tiene: </label>
                        <input type="radio" name="motor" value="Diesel" class="modelo-items"/> Diesel
                        <input type="radio" name="motor" value="Gasolina" class="modelo-items"/> Gasolina
                        <input type="radio" name="motor" value="Electrico" class="modelo-items"/> Electrico
                        <input type="radio" name="motor" value="Hibrido" class="modelo-items"/> Hibrido
                    </li>
                    <input type="submit" value="Enviar" class="buttom"/>
                </ul>
            </form>
        </div>
    </body>

<?php

include_once("claves.php");
include("funcionesConcesionario.php");
session_start();


$precioSinFinanciacion=0;

if(!isset($_SESSION["nameUser"] ) || !isset($_SESSION["passwordUser"]) || !isset($_SESSION["nameUser"]) == 'nameUser' || !isset($_SESSION["passwordUser"]) == 'passwordUser'){
    header("Location: login.php");

    exit;
}else{
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(!isset($_POST["eleccion"])){
            
            $datosFormularioEleccion = $_POST;
            $_SESSION["formularioEleccion"] = $datosFormularioEleccion;
            
            $precioSinFinanciacion = calcularPrecioConcesionario();
        
            echo "<h2>Resultado de elección</h2>";
            if (isset($_SESSION["formularioEleccion"]["modelo"])) {
                echo "El modelo es: " . $_SESSION["formularioEleccion"]["modelo"] . "<br>";
            }
            if (isset($_SESSION["formularioEleccion"]["color"])) {
                echo "El color es: " . $_SESSION["formularioEleccion"]["color"] . "<br>";
            }
            if (isset($_SESSION["formularioEleccion"]["tipo"])) {
                echo "El tipo es: " . $_SESSION["formularioEleccion"]["tipo"] . "<br>";
            }
            if (isset($_SESSION["formularioEleccion"]["puertas"])) {
                echo "Cantidad de puertas: " . $_SESSION["formularioEleccion"]["puertas"] . "<br>";
            }
            if (isset($_SESSION["formularioEleccion"]["cv"])) {
                echo "Los caballos de potencia son: " . $_SESSION["formularioEleccion"]["cv"] . "<br>";
            }
            if (isset($_SESSION["formularioEleccion"]["motor"])) {
                echo "El tipo de motor es: " . $_SESSION["formularioEleccion"]["motor"] . "<br>";
            }
    
            echo "El precio total es: <strong>$precioSinFinanciacion</strong>";
            $_SESSION["precioFinal"] = $precioSinFinanciacion;
            echo "<h2>¿Quieres financiarlo?</h2>";
            echo "
                <form name='financiamiento' action='calcularFinanciacion.php' method='post'>
                    Si<input type='radio' name='si' value='si'>
                    <br>
                    No<input type='radio' name='no' value='no'>
                    <br>
                    <input type='submit' value='enviar'>
                </form>
            ";
        }
    }
}

?>