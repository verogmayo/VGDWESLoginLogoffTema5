<?php
/**
 * @author: Véronique Grué
 * Ultima actualización : 27/11/2025
 * 
 * Página de inicio de la parte privada
 */
session_start();
//Si la session no se ha iniciado, reenvía a la pagina de inicio publico
if (!isset($_SESSION["usuarioVGDAWAppLoginLogoff"])) {
    header("location: login.php");
    exit;
}
//Si el usuario hace clic en cerrar session, reenvía a la pagina de inicio publico
if (isset($_REQUEST["cerrar"])) {
    session_destroy();
    header("location: ../indexLoginLogoffTema5.php");
    exit;
}
// Redirección a la pagina de detalle cuando se hace clic en el bton
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
        <!--Fuente de google font-->
        <!--Para descargar iconos. https://v2.boxicons.com/usage  (import the css)-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="webroot/css/styles.css">
        <!--https://cdnjs.com/libraries/font-awesome --> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

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
                    <!-- Botones de idiomas 
                    Solo aparece el boton que corresponda a la cookie de idioma-->
                    <?php if ($_COOKIE["idioma"] === "es"){
                    echo '<button class="idioma selecionado" type="submit" name="es" id="es"> <img src="../webroot/images/banderaEs.png"  alt="es"/> </button>';
                    }
                    if ($_COOKIE["idioma"] === "en"){
                    echo '<button class="idioma selecionado" type="submit" name="en" id="en"> <img src="../webroot/images/banderaGb.png"  alt="en" /> </button>';	
                    }
                    if ($_COOKIE["idioma"] === "fr"){
                    echo '<button class="idioma selecionado" type="submit" name="fr" id="fr"> <img src="../webroot/images/banderaFr.png"  alt="fr" /> </button>';
                    }?>
                    <button class="botonSession" type="submit" name="cerrar" id="cerrar">Cerrar Sessión</button>
                </form>
            </nav>
        </header>
        <main>
            <section>
                <div class="titulo2">
                    <?php
                    //https://www.php.net/manual/es/timezones.php


                    if ($_COOKIE["idioma"] === "es") {
                        //SE crea el objeto DateTime para poder utilizar fecha y hora de la ultima conexion.
                        $oFechaHora = new DateTime($_SESSION['usuarioVGDAWAppLoginLogoff']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/Madrid'));
                        $hora = $oFechaHora->format('H:i');
                        //Como está instalada la extensión de internacionalización intl en el seridor y en plesk se va a utiliza IntlDAteFormater
                        //se utiliza timestamp para que intl funcione mejor
                        $timestamp = $oFechaHora->getTimestamp();
                        $oFormatoFecha = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                        $fecha = $oFormatoFecha->format($timestamp);
                        echo " <h2>BIENVENIDO " . $_SESSION['usuarioVGDAWAppLoginLogoff']['DescUsuario'] . "</h2>";
                        if ($_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones'] == 1) {
                            echo "Esta es tu primera conexión!!!<br>";
                        } else {
                            echo "Esta es la " . $_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones']  . " vez que se contecta.<br>";
                            echo "Usted se conectó por ultima vez el <br>";
                            echo $fecha . " a las " . $hora;
                        }
                    } elseif ($_COOKIE["idioma"] === "en") {
                        $oFechaHora = new DateTime($_SESSION['usuarioVGDAWAppLoginLogoff']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/London'));
                        // Convertir a zona horaria de Londres
                        $oFechaHora->setTimezone(new DateTimeZone('Europe/London'));
                        $hora = $oFechaHora->format('H:i');
                        $timestamp = $oFechaHora->getTimestamp();
                        $oFormatoFecha = new IntlDateFormatter('en_GB', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                        $fecha = $oFormatoFecha->format($timestamp);
                        echo " <h2>WELCOME " . $_SESSION['usuarioVGDAWAppLoginLogoff']['DescUsuario'] . "</h2>";
                        if ($_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones'] == 1) {
                            echo "This is your first connection. !!!!<br>";
                        } else {
                            echo "This is the " . $_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones']  . " time you've logged in.<br>";
                            echo "You last connected on <br>";
                            echo $fecha . " at " . $hora;
                        }
                    } elseif ($_COOKIE["idioma"] === "fr") {
                        $oFechaHora = new DateTime($_SESSION['usuarioVGDAWAppLoginLogoff']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/Paris'));
                        $hora = $oFechaHora->format('H:i');
                        $timestamp = $oFechaHora->getTimestamp();
                        $oFormatoFecha = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                        $fecha = $oFormatoFecha->format($timestamp);
                        echo " <h2>BIENVENUE " . $_SESSION['usuarioVGDAWAppLoginLogoff']['DescUsuario'] . "</h2>";
                        if ($_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones'] == 1) {
                            echo "C'est votre première connexion. !!!!<br>";
                        } else {
                            echo "C'est la " . $_SESSION['usuarioVGDAWAppLoginLogoff']['NumConexiones']  . " fois que vous vous connectez.<br>";
                            echo "Vous vous êtes connecté(e) pour la dernière fois le <br>";
                            echo $fecha . " à " . $hora;
                        }
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
                    <p>España</p>
                    <div class="social-media">
                        <a href="https://github.com/verogmayo/VGDWESLoginLogoffTema5"><i class='bx bxl-github' ></i></a>
                    </div>
                </div>
                <div class="footerInfo">
                    <div class="info">
                        <p >
                            2025-26 IES LOS SAUCES. &#169;Todos los derechos reservados.</p> <address><a href="https://veroniquegru.ieslossauces.es/" target="_blank">Véronique Grué.</a> Fecha de Actualización :
                            <time datetime="2025-11-27"></time> 27-11-2025 </address>
                    </div>
                    <div class="google">
                        <a href="https://www.google.com/"><i class="fa-brands fa-google" style="color: #1a73e8;"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>

