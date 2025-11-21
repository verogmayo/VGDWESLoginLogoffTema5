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
        if (isset($_REQUEST["cerrar"])){
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
            <h1>REGISTRO</h1>
             <form>
                    
                    <button type="submit" name="cerrar" id="cerrar">Iniciar Sessión</button><br>
                </form>
        </header>
        <main>
            <section>
               

            </section>
        </main>

        <footer class="footer">
            <div class="footerContent">
                <div><p class="copyright">
                        2025-26 IES LOS SAUCES. &#169;Todos los derechos reservados.</p> <address><a href="../../VGDWESProyectoDWES/indexProyectoDWES.html">Véronique Grué.</a> Fecha de Actualización :
                        <time datetime="2025-11-20"></time> 20-11-2025 </address>
                </div>

            </div>

        </footer>

    </body>
</html>

