<?php
/**
 * @author: Véronique Grué
 * @since 20/11/2025
 * 
 * Página de inicio publico de la aplicación.
 */
//si se hace clic en el boton login, nos lleva a la pagina de login.php
if (isset($_REQUEST["login"])) {
    header("location: codigoPHP/login.php");
    exit;
}
//Cookies para los idiomas. Si se hace clic en el boton de francés, el mensaje de bienvenida será en frances,
//Si se hace clic en el boton de ingles, el mensaje será en ingles y sino será en castellano.
if (isset($_REQUEST["fr"])) {
    setcookie("idioma", "fr", time() + 3600);
}elseif (isset($_REQUEST["en"])) {
    setcookie("idioma", "en", time() + 3600);
}else{
    setcookie("idioma", "es", time() + 3600);
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
            <div class="tituloCentral">
                <p class="letras">
                    <span>I</span><span>N</span><span>I</span><span>C</span><span>I</span><span>O</span>
                    <span>&nbsp;</span>
                    <span>P</span><span>R</span><span>I</span><span>V</span><span>A</span><span>D</span><span>O</span>
                </p>
            </div>
            <nav>

                <form method="post">
                    <!-- Botones de idiomas -->
                    <button class="idioma" type="submit" name="es" id="es"> <img src="webroot/images/banderaEs.png" width="20" alt="es"/> </button>
                    <button class="idioma" type="submit" name="en" id="en"> <img src="webroot/images/banderaGb.png" width="20" alt="es" /> </button>	
                    <button class="idioma" type="submit" name="fr" id="fr"> <img src="webroot/images/banderaFr.png" width="20" alt="es" /> </button>    
                    <!-- Boton de login -->
                    <button class="botonSession" type="submit" name="login" id="login">login</button>

                </form>
                
            </nav>
        </header>
        <main>
            <section>

                <div class="titulo">
                    <h2>BIENVENIDO A INICIO PÚBLICO</h2>
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