<?php
/**
 * @author: Véronique Grué
 * @since 15/11/2025
 * 
 * Ejercicio 1: Desarrollo de un control de acceso con identificación del usuario basado en la función header().
 */
/**
 * @var array<string, string> $aUsuarios Array asociativo con los usuarios válidos, sus contraseñas nombres completos.
 * La clave es el nombre de usuario y el valor es la contraseña y el nombre.
 */
if (isset($_REQUEST["cerrar"])) {
    header("location: ../indexLoginLogoffTema5.php");
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
            <h1>FORMULARIO</h1>
            <nav>
                <form>
                    <button class="botonSession" type="submit" name="cerrar" id="cerrar">Cerrar Sessión</button> 
                </form>
            </nav>
        </header>
        <main class="mainForm">
            <section class="formulario">
                <div class="imagen"><img src="../webroot/images/logo.png" alt="logo"/></div>
                
                <form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                                               
                        <label for="usuario">Usuario:</label>
<!--                        <a style='color:red'><?php echo $aErrores['nombre'] ?></a><br>-->
                        <input  name="usuario" id="usuario" type="text" value='<?php echo(empty($aErrores['nombre'])) ? ($_REQUEST['nombre'] ?? '') : ''; ?> '><br>
                                            

                        <label for="passwd" >Contraseña: </label>
<!--                        <a style='color:red'><?php echo $aErrores['preguntaSeguridad'] ?></a><br>-->
                        <input name="passwd" id="passwd" type="password" value='<?php echo(empty($aErrores['preguntaSeguridad'])) ? ($_REQUEST['preguntaSeguridad'] ?? '') : ''; ?>'><br>

                        <button class="botonSession" type="submit" name="enviar">Enviar</button>
                        <button class="botonCentral" type="submit" name="volver" id="volver">volver</button>
                    </form>  
                    
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

