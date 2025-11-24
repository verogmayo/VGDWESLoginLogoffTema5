<?php
/**
 * @author: Véronique Grué
 * @since 20/11/2025
 * 

 */
if (isset($_REQUEST["login"])) {
    header("location: codigoPHP/login.php");
    exit;
}
if (isset($_REQUEST["es"])) {
   setcookie("idioma", "es", time()+3600);
}
if (isset($_REQUEST["fr"])) {
   setcookie("idioma", "fr", time()+3600);
}
if (isset($_REQUEST("en"))) {
   setcookie("idioma", "en", time()+3600);
}



?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Véro Grué - DWESLoginLogoffTema5</title>
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
            <div>
                <h1>INICIO PUBLICO</h1>
            </div>
            <nav>
                
                <form method="post">
                      <button class="idioma" type="submit" name="es" id="es"> <img src="webroot/images/banderaEs.png" width="15px" height="height" alt="alt"/> </button>
                      <button class="idioma" type="submit" name="en" id="en"> <img src="webroot/images/banderaGb.png" width="15px" height="height" alt="alt"/> </button>	
                    <button class="idioma" type="submit" name="fr" id="fr"> <img src="webroot/images/banderaFr.png" width="15px" height="height" alt="alt"/> </button>    
                    <button class="botonSession" type="submit" name="login" id="login">login</button>
                    
                </form>
                <!--<a href="" class="nav-login">Iniciar Session</a>-->
            </nav>
        </header>
        <main>
            <section>

                <div class="titulo">
                    <p class="letras">
                        <span>B</span><span>I</span><span>E</span><span>N</span><span>V</span><span>E</span><span>N</span><span>I</span><span>D</span><span>O</span>
                        <span>&nbsp;</span><span>A</span><span>&nbsp;</span>
                        <span>I</span><span>N</span><span>I</span><span>C</span><span>I</span><span>O</span>
                        <span>&nbsp;</span>
                        <span>P</span><span>U</span><span>B</span><span>L</span><span>I</span><span>C</span><span>O</span>
                    </p>
                </div>

            </section>
        </main>
        <footer >
            <div class="footer">
                <div class="pais">
                    <p><a href="codigoPHP/formulario.php">España</a>
                        </p>
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