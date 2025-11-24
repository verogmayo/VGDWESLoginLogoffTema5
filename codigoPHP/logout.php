<?php
/**
 * @author: Véronique Grué
 * @since 15/11/2025
 * 
 * 
 */

session_start();
session_destroy();
header("location: ../indexLoginLogoffTema5.php");
exit;
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
            <h1 class="letras"> <span>D</span><span>E</span><span>T</span><span>A</span><span>L</span><span>L</span><span>E</span></h1>
            <nav>
                <form>
                    <button class="botonSession" type="submit" name="cerrar" id="cerrar">Cerrar Sessión</button> 
                </form>
            </nav>
        </header>
        <main>
            <section>
                <div class="titulo">

                </div> 
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

