<?php
/**
 * @author: Véronique Grué
 * @since 15/11/2025
 * 
 * 
 */
session_start();
if (!isset($_SESSION["usuario"])) {
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
        <header>
            <div class="proyecto">
                <p class="letras">
                    <span>L</span><span>O</span><span>G</span><span>I</span><span>N</span>
                    <span>&nbsp;</span>
                    <span>L</span><span>O</span><span>G</span><span>O</span><span>F</span><span>F</span>
                    <br>
                    <span>T</span><span>E</span><span>M</span><span>A</span><span>5</span>
                </p>
            </div>
            <div class="tituloCentral">
                <p class="letras">
                    <span>I</span><span>N</span><span>I</span><span>C</span><span>I</span><span>O</span>
                    <span>&nbsp;</span>
                    <span>P</span><span>R</span><span>I</span><span>V</span><span>A</span><span>D</span><span>O</span>
                </p>
            </div>
            <nav>
                <form>

                    <button class="botonSession" type="submit" name="cerrar" id="cerrar">Cerrar Sessión</button>
                </form>

            </nav>

        </header>
        <main>
            <section>
                <div class="titulo2">
                    <?php
                    //SE crea el objeto DateTime para poder utilizar fecha y hora de la ultima conexion.
                    //Como está instalada la extensión de internacionalización intl en el seridor y en plesk se va a utiliza IntlDAteFormater
                    // Solo fecha completa
//                    $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
//// Salida: "martes, 26 de noviembre de 2025"
//// Fecha y hora
////                    $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
//// Salida: "26 de noviembre de 2025, 14:30"
//// Solo hora
//                    $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::MEDIUM);
// Salida: "14:30:45"
                    
                    $fechaHora = new DateTime($_SESSION['sesion']['ultimaConexion']);
                    //para utilizar intl es mejor utilizar timestamp
                    $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fmt->setPattern('EEEE j \d\e MMMM \d\e Y');
                    echo $fmt->format($fechaHora);
//                    $FechaHoraTimeStamp = $fechaHora->getTimestamp();

                    $fecha = $fechaHora->format('d-m-Y');
                    $hora = $fechaHora->format('d-m-Y');
                    if ($_COOKIE["idioma"] === "es") {
                        echo "<h2>" . $_SESSION['sesion']['descripcion'] . "</h2>";
                        echo " <h2>BIENVENIDO A TU AREA PRIVADA</h2>";
                        echo "Última conexión : el " . $fecha . " a las " . $hora . "<br>";
                        echo "Numero de conexiones: " . $_SESSION['sesion']['numConexiones'];
                    } elseif ($_COOKIE["idioma"] === "en") {
                        echo "<h2>" . $_SESSION['sesion']['descripcion'] . "</h2>";
                        echo "<h2>WELCOME TO YOUR PRIVATE AREA </h2>";
                        echo "Last connection : on " . $fecha . " at " . $hora . "<br>";
                        echo "Number of connections: " . $_SESSION['sesion']['numConexiones'];
                    } elseif ($_COOKIE["idioma"] === "fr") {
                        echo "<h2> " . $_SESSION['sesion']['descripcion'] . "</h2>";
                        echo "<h2>BIENVENUE A TON ESPACE PRIVÉ</h2>";
                        echo "Dernière connexion : le " . $fecha . " à " . $hora . "<br>";
                        echo "Nombre de connexions: " . $_SESSION['sesion']['numConexiones'];
                    }
                    ?>

                </div> 
                <div class="botones">
                    <form>
                        <button class="botonCentral" type="submit" name="detalle" id="detalle">Detalle</button>
                    </form>
                </div>




            </section>
        </main>
        <footer >
            <div class="footer">
                <div class="pais">

                    <div class="social-media">
                        <a href="https://github.com/verogmayo/VGDWESLoginLogoffTema5"><i class='bx bxl-github' ></i></a>
                    </div>
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

