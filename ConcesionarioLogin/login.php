<link rel="stylesheet" type="text/css" href="style.css" />
<body>
    <form name='loginUser' action='login.php' method='post' class="caja">
        <label for='nameUser'>Introduce el nombre de usuario</label>
        <input type='text' name='nameUser'>
        <br>
        <label for='passwordUser'>Introduce la contraseña</label>
        <input type='text' name='passwordUser'>
        <br>
        <input type='submit' value='enviar' name="enviar">
    </form>
</body>

<?php
    /**
     * Desarrolla un script en PHP, que recoja los datos introducidos en el formulario y los valide. Los valores de acceso son:
     * Usuario: dwse
     * Contraseña: 1234
     */

    $usuarioMaestro = "dwse";
    $contraseñaMaestra="1234";
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(isset($_POST["enviar"])){

            
            $_SESSION["nameUser"] = $_POST["nameUser"];
            $_SESSION["passwordUser"] = $_POST["passwordUser"];
            if(($_SESSION["nameUser"] == $usuarioMaestro) && ($_SESSION["passwordUser"] == $contraseñaMaestra)){
                echo "Login correcto";
                header("Location: index.php");
            }else{
                echo "La contraseña o el usuario son incorrectos";
            }
        }
    }

?>