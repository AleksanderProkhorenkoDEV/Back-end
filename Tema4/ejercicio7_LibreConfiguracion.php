<!--
    Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
    programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
    “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
    satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.

-->


<?php
    /**
     * Abro sesion para poder almacenar la cantida de intentos por cada try que hace el usuario.
     */
    session_start();

    $codigoAcceso = 1234;

    $intentos = 4;
    /**
     * Si la variable de SESSION no esta creada la creo y le asigno el valor por defectos de intentos que tiene, que son 4
     */
    if(!isset($_SESSION["cantidadIntentos"])){
        $_SESSION["cantidadIntentos"] = $intentos;
    }

    /**
     * Compruebo que el mensaje llega por un metodo determinado que estableci en el formulario, luego obtengo la combinacion y la convierto a int, despues compruebo que los datos no llegaron vacios desde el boton submit
     * y comienzo hacer las pruebas necesarias de la combinacion junto a la que la abre y compruebo a su vez de que tiene intentos para poder abrirla, en caso de que no tenga no podra intentarlo mas. En caso de tener 
     * intentos y equivocarse le resta uno y se lo muestra por pantalla.
     */
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $combinacion = intval($_POST["combinacion"]);

        if(isset($_POST["submit"])){

            
            if(($combinacion != $codigoAcceso) && $_SESSION["cantidadIntentos"] > 0){
            
                echo "Te equivocaste, tienes un intento menos";
                $intentosResta = $_SESSION["cantidadIntentos"];
                $_SESSION["cantidadIntentos"] = $intentosResta - 1;
            }else if ($combinacion == $codigoAcceso && $_SESSION["cantidadIntentos"] > 0){
                echo "Abrista la caja";
                $intentosResta = 4;
            }else{
                echo "te quedaste sin intentos";
            }
        }
            

    }
?>

<body>
    <h2>Apertura de caja fuerte </h2>
    <p>Te quedan
        <?php echo $_SESSION["cantidadIntentos"] ?>
    <form name="cajaFuerte" action="ejercicio7_LibreConfiguracion.php" method="post">
        <label>Introduzca la convinación </label>
        <input type="password" name="combinacion" maxlength="4">
        <br>
        <input type="submit" value="enviar" name="submit">
    </form>
</body>