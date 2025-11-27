<?php
/**
 * @author: Véronique Grué
 * @since 15/11/2025
 * 
 * 
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["usuarioVGDAWAppLoginLogoff"])) {
    header("location: ../indexLoginLogoffTema5.php");
    exit;
}
if (isset($_REQUEST["cerrar"])) {
    session_destroy();
    header("location: login.php");
    exit;
}
if (isset($_REQUEST["detalle"])) {
    header("location: detalle.php");
    exit;
}
require_once '../core/libreriaValidacion.php';
require_once '../core/miLibreriaStatic.php';

//inicialización de variables
/** @var array $aErrores Array para almacenar mensajes de error de validación. */
$aErrores = [
    'coef' => null,
    'const' => null
];
/** @var array $aRespuestas Array para almacenar las repuestas. */
$aRespuestas = [
    'coef' => null,
    'const' => null
];

/** @boollean boolean $entradaOK Indica si los datos de entrada son correctos o no. */
$entradaOK = true;
$mensajeError = ''; 
// Respuestas correctas
$respuestaCorrectaCoef = 17;
$respuestaCorrectaConst = 11;

//Para cada campo del formulario se valida la entrada y se actua en consecuencia
if (isset($_REQUEST['enviar'])) {//se cumple si el boton es submit
    //Validación de los datos de los campos del formulario
    $aErrores['coef'] = validacionFormularios::comprobarEntero($_REQUEST['coef'],100,-100,1);
    $aErrores['const'] = validacionFormularios::comprobarEntero($_REQUEST['const'],100,-100,1);

    //recorre el array de errores para detectar si hay alguno
    foreach ($aErrores as $campo => $valorCampo) {
        if ($valorCampo != null) {//Si encuentra algún error 
            $entradaOK = false; // la entrada no es correcta
        }
    }

    //Tratamiento del formulario
    if ($entradaOK) {
        //REllenamos el array de respuesta con los valores que ha introducido el usuario
        $aRespuestas['coef'] = $_REQUEST['coef'];
        $aRespuestas['const'] = $_REQUEST['const'];

        //verificar si las repuestas son correctas

        if ($aRespuestas['coef'] == $respuestaCorrectaCoef &&
                $aRespuestas['const'] == $respuestaCorrectaConst) {
            // ¡Respuestas correctas! Redirigir a resultado.php
            header("Location: resultado.php");
            exit;
        } else {
            //respuesats incorrectas
            $entradaOK = false;
            $mensajeError = "Les réponses ne sont pas correctes. Réessaie!";
        }
    }
}else{
    $entradaOK = false;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Véro Grué - ProyectoLoginLogoff Login</title>
        <link rel="stylesheet" href="../webroot/css/styleEjercicios.css">

    </head>
    <body>
        <header class="header">
            <div class="proyecto">
                <p class="letras">
                    <span>L</span><span>O</span><span>G</span><span>I</span><span>N</span>
                    <span>&nbsp;</span>
                    <span>L</span><span>O</span><span>G</span><span>O</span><span>F</span><span>F</span>
                    <br>
                    <span>T</span><span>E</span><span>M</span><span>A</span><span>5</span>
                </p>
            </div>
            <h1 class="letras"> <span>N</span><span>O</span><span>A</span></h1>
            <nav>
                <form>
                    <button class="botonSession" type="submit" name="cerrar" id="cerrar">Cerrar Sessión</button> 
                </form>
            </nav>
        </header>
        <main>
            <section class="sectionNoa">
                <div class="tituloNoa">
                    <h2>Coucou <?php echo $_SESSION['usuarioVGDAWAppLoginLogoff']['DescUsuario'] ?></h2>
                </div>  
                <article class="articleNoa">
                    <div class="divTexte"></div>
                    <p> Aujourd'hui,  nous sommes le   tu as la grande chance de devoir resoudre un problème de math.</p>
                    <p>Le résultat sera une expression litérale. Il faudra indiquer les chiffres dans les cases qui corresponde pour pouvoir savoir ce que tu as gagné</p>
                    <div class="divImgNoa">
                        <img class="imgNoa" src="../webroot/images/MathExo1.png" alt="imageExo"/>  
                    </div>

                    <?php
                    // Mostrar mensaje de error si las respuestas son incorrectas
                    if (!$entradaOK && $mensajeError != '') {
                        echo "<p style='color: red; font-weight: bold;'>$mensajeError</p>";
                    }
                    
                    // Mostrar errores de validación
                    if ($aErrores['coef'] != null) {
                        echo "<p style='color: red;'>" . $aErrores['coef'] . "</p>";
                    }
                    if ($aErrores['const'] != null) {
                        echo "<p style='color: red;'>" . $aErrores['const'] . "</p>";
                    }
                    ?>

                    <p>Indique le résultat ci-dessous: </p>
                    <div class="divNoa">
                        <form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <!--Solo se añade el valor a value si hay un valor-->
                            <input  name="coef" id="chiffrex" type="number" placeholder="coeficient du x" <?php echo !empty($aRespuestas['coef']) ? 'value="' . $aRespuestas['coef'] . '"' : ''; ?>>
                            <input  name="const" id="constante" type="number" placeholder="constante" <?php echo !empty($aRespuestas['const']) ? 'value="' . $aRespuestas['const'] . '"' : ''; ?> ><br>
                            <button class="botonSession" type="submit" name="enviar">Enviar</button>
                        </form>

                    </div>

                </article>

            </section>

        </main>

        <footer >
            <div class="footer">
                <div class="pais">

                </div>
                <div class="footerInfo">
                    <div class="info">
                        <p >
                            2025-26 IES LOS SAUCES. &#169;Todos los derechos reservados.</p> <address><a href="https://veroniquegru.ieslossauces.es/" target="_blank">Véronique Grué.</a> Fecha de Actualización :
                            <time datetime="2025-11-19"></time> 19-11-2025 </address>
                    </div> 
                    <div class="google">
                        <a href="https://www.google.com/"><i class="fa-brands fa-google" style="color: #1a73e8;"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>

