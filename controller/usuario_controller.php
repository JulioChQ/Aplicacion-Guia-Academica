<?php
require_once 'model/usuario_modelo.php';

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
            $_SESSION["codigo"] = $codigo;
            
            $user = UsuarioController::$usuario->getUsuario($codigo);
            $_SESSION["id"] = $user["id_usuario"];
            $_SESSION["nombre-corto"] = $user["nombre"] . " " . $user["apellido1"]; 
            $_SESSION["nombre-completo"] = $_SESSION["nombre-corto"] . " " . $user["apellido2"];
            $_SESSION["tipo"] = $user["tipo"];
            $_SESSION["ciclo"] = $user["ciclo"];
            $_SESSION["regimen"] = $user["regimen"];
            $_SESSION["nombre_escuela"] = $user["nombre_escuela"];
            header("location: index.php");
        } else {
            echo '<script type="text/javascript">
               alert("¡Usuario o Contraseña incorrecta!");
               window.location.href="index.php";
               </script>';
            //header("location: index.php");
        }
    }
}