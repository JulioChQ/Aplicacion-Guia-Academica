<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once 'model/Usuario.php';

class UsuarioController
{
    private $usuario;
    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function login()
    {
        $codigo = $_POST["usuario"];
        $contrasenia = $_POST["contra"];
        if ($this->usuario->validarUsuario($codigo, $contrasenia)) {
            echo 'USUARIO VALIDADO';
            session_start();
            $_SESSION["usuario"] = $codigo;
            header("location:index.php");
        } else {
            echo 'Usuario no valido';
        }
    }
}

$usuarioController = new UsuarioController();


if (isset($_POST["iniciar-sesion"])) {
    $usuarioController->login();
}else{
    require_once "view/login.php";
}
