<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require '../model/Usuario.php';



function login(){
    $usuario = new Usuario();
    if(!isset($_POST["usuario"])){
        header("Location:index.php");
    } else {
        $codigo = $_POST["usuario"];
        $contrasenia = $_POST["contra"];
        if($usuario->validarUsuario($codigo, $contrasenia)){
            echo 'USUARIO VALIDADO';
        } else {
            echo 'Usuario no valido';
        }
    }
}

if(isset($_POST["iniciar-sesion"])){
    login();
} else {
    echo 'Hubo un error';
}
