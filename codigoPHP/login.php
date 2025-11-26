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
if (isset($_REQUEST["volver"])) {
    header("location: ../indexLoginLogoffTema5.php");
    exit;
}
if (isset($_REQUEST["iniciar"])) {
    //   header("location: inicio.php");
    header("location: formulario.php");
    exit;
}
session_start();
//enlace para importar las librerías de validación de campos
require_once '../core/libreriaValidacion.php';
//enlace para la configuración de la conexion a la base de datos
require_once '../config/confDBPDODes.php';

///inicialización de variables
/** @var array $aErrores Array para almacenar mensajes de error de validación. */
$aErrores = [
    'usuario' => null,
    'passwd' => null
];
/** @var array $aRespuestas Array para almacenar las repuestas. */
$aRespuestas = [
    'usuario' => '',
    'passwd' => ''
];

/** @boollean boolean $entradaOK Indica si los datos de entrada son correctos o no. */
$entradaOK = true;

//Para cada campo del formulario se valida la entrada y se actua en consecuencia
if (isset($_REQUEST['enviar'])) {//se cumple si el boton es buscar
    // $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T02_DescDepartamento'], 255, 0, 0);
    $aErrores['usuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 255, 0, 0);
    $aErrores['passwd'] = validacionFormularios::validarPassword($_REQUEST['passwd'], 20, 2, 1, 1);

    //recorre el array de errores para detectar si hay alguno
    foreach ($aErrores as $valorCampo) {
        if (!is_null($valorCampo) && $valorCampo !== '') {
            $entradaOK = false;
        }
    }
} else {
    //Si no se ha aceptado el formulario
    $entradaOK = false;
}
//Tratamiento del formulario
if ($entradaOK) {
    //REllenamos el array de respuesta con los valores que ha introducido el usuario

    try {
        $miDB = new PDO(DNS, USUARIODB, PSWD);
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = <<<SQL
                        SELECT T01_CodUsuario,
                        T01_Password,
                        T01_DescUsuario,
                        T01_FechaHoraUltimaConexion,
                        T01_NumConexiones
                        FROM T_01Usuario 
                        WHERE T01_CodUsuario= :usuario AND 
                        T01_Password = sha2(:passwd,256)
                        SQL;

        $consulta = $miDB->prepare($sql);
        $consulta->execute([
            ':usuario' => $_REQUEST['usuario'],
            ':passwd' => $_REQUEST['usuario'] . $_REQUEST['passwd']
        ]);

        $usuarioBD = $consulta->fetch();
        // Si no exite, se vuelve a pedir las credenciales.
        if (!$usuarioBD) {
            //Si las credenciales no son correctas la entrada es false
            $entradaOK = false;
        } else {
            // sino se inicia la session 
            session_start();

            //Se actualiza lafecha de ultima session y el contador de conexiones
            $actualizacion = <<<SQL
                                     UPDATE T_01Usuario SET
                            T01_FechaHoraUltimaConexion = now(),
                            T01_NumConexiones = T01_NumConexiones + 1
                            WHERE T01_CodUsuario = :usuario
                            SQL;
            $consulta2 = $miDB->prepare($actualizacion);
            $consulta2->execute([':usuario' => $_REQUEST['usuario']]);

            //Se recogen estos datos de la sesión en un array $aDatosSession
            $aDatosSesion = [
            'usuario' => $usuarioBD['T01_CodUsuario'],
            'descripcion' => $usuarioBD['T01_DescUsuario'],
            'ultimaConexion' => $usuarioBD['T01_FechaHoraUltimaConexion'],
            'numConexiones' => $usuarioBD['T01_NumConexiones']
            ];
            //y se guardan en un array en lka sesión
            $_SESSION['sesion']=$aDatosSesion;
            //y  se abre inicio.php
            header("Location: inicio.php");
            exit;
        }
    } catch (Exception $ex) {
        echo"Error: " . $ex->getMessage();
        exit;
    }
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
            <div>
                <h1>LOGIN</h1>
            </div>
            <nav>


            </nav>
        </header>
        <main class="mainForm">
            <section class="formulario">
                <div class="imagen"><img src="../webroot/images/logo.png" alt="logo"/>
                    <p class="pInicioSession"> Inicia Sessión en Login Logoff Tema5</p>
                </div>

                <form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                    <div class="contenedorInput">
                        <a style='color:red'><?php echo $aErrores['usuario'] ?></a><br>
                        <input  name="usuario" id="usuario" type="text" placeholder=" " value='<?php echo(empty($aErrores['usuario'])) ? ($_REQUEST['usuario'] ?? '') : ''; ?>'>
                        <label for="usuario">Usuario:</label>
                    </div>
                    <div class="contenedorInput">
                        <a style='color:red'><?php echo $aErrores['passwd'] ?></a><br>
                        <input name="passwd" id="passwd" type="password" placeholder=" " value='<?php echo(empty($aErrores['passwd'])) ? ($_REQUEST['passwd'] ?? '') : ''; ?>'>
                        <label for="passwd" >Contraseña: </label>
                    </div>

                    <div class="divBotones">
                        <button class="botonAzul" type="button" name="volver" id="volver">Volver</button>
                        <button class="botonSession" type="submit" name="enviar">Enviar</button>
                    </div>

                </form>         
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

