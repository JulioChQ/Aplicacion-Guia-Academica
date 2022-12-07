<?php
require_once 'model/Usuario.php';

class UsuarioController
{
    static private $usuario;

    static public function login()
    {
        UsuarioController::$usuario = new Usuario();
        $codigo = $_POST["usuario"];
        $contrasenia = $_POST["contra"];
        if (UsuarioController::$usuario->validarUsuario($codigo, $contrasenia)) {
            session_start();
            $_SESSION["usuario"] = $codigo;   
        } 
        header("location: index.php");
    }
}