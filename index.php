<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
date_default_timezone_set('America/Lima');
require_once 'model/config.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/curso_controller.php';
require_once 'controller/matricula_controller.php';


session_start();
//var_dump($_POST["usuario"]);
if (!isset($_SESSION["codigo"])) {
    if (isset($_POST["iniciar-sesion"])) {
        UsuarioController::login();
    } else {
        if (isset($_GET["registro"])) {
            UsuarioController::registro();
        } else {
            require_once "view/login2.php";
        }
    }
} else {
    if (!isset($_GET["curso"])) {
        if (!isset($_GET["p"])) {

            if (isset($_GET["datos-personales"])) {
                UsuarioController::datosPersonales();
            } else {
                CursoController::verSituacionCursos();
            }
        } else {
            switch ($_GET["p"]) {
                case "simulacion":
                    if (!isset($_POST["generar-matricula"])) {
                        MatriculaController::verSimulacionMatricula();
                    } else {
                        MatriculaController::generarReporteMatricula();
                    }
                    break;

                case "procesos":
                    require_once "view/procesos.php";
                    break;
                
                case "reportes":
                    require_once "view/generar-reportes.php";
                    break;
                default:
                    header("index.php");
            }
        }
    } else {
        CursoController::verCursoDetallado();
    }
}
