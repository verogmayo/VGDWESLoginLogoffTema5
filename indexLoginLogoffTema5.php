        <?php
        /**
         * @author: Véronique Grué
         * @since 20/11/2025
         * 
         
         */
        if (isset($_REQUEST["login"])){
            header("location: codigoPHP/login.php");
            exit;
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
        <header class="header">
            <p>LOGIN LOGOFF TEMA 5</p>
            <h1>INICIO PUBLICO</h1>
            <form>
                    <button type="submit" name="login" id="login">login</button>
                </form>
           
        </header>
        <main>
            <section>
                
                <h4>BIENVENIDO A INICIO PUBLICO</h4>
                
            </section>
        </main>
        <footer class="footer">
            <div class="footerContent">
                                    <div class="social-media">
                        <a href="https://github.com/verogmayo/VGDWESLoginLogoffTema5"><i class='bx bxl-github' ></i></a>
                    </div>
                <div><p class="copyright">
                        2025-26 IES LOS SAUCES. &#169;Todos los derechos reservados.</p> <address><a href="https://veroniquegru.ieslossauces.es/" target="_blank">Véronique Grué.</a> Fecha de Actualización :
                        <time datetime="2025-11-19"></time> 19-11-2025 </address>

                    
                </div>

            </div>

        </footer>

    </body>
</html>