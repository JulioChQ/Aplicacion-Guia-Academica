<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
require_once 'model/config.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/curso_controller.php';
require_once 'controller/matricula_controller.php';

session_start();
if(!isset($_SESSION["codigo"])){
    if (isset($_POST["iniciar-sesion"])) {
        UsuarioController::login();
    }else{
        require_once "view/login.php";
    }    
}else{
    if(!isset($_GET["curso"])){
        if(!isset($_GET["p"])){
            CursoController::verSituacionCursos();
        }else{
            switch($_GET["p"]){
                case "simulacion":
                    MatriculaController::verSimulacionMatricula();
            }
        }
    }else{
            CursoController::verCursoDetallado();
            
        
    }
}