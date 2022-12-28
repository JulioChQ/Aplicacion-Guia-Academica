<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
require_once 'model/config.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/curso_controller.php';
session_start();
if(!isset($_SESSION["usuario"])){
    if (isset($_POST["iniciar-sesion"])) {
        UsuarioController::login();
    }else{
        require_once "view/login.php";
    }    
}else{
    if(!isset($_GET["curso"])){
        CursoController::verSituacionCursos();
    
    }else{
            CursoController::verCursoDetallado();
            
        
    }
}