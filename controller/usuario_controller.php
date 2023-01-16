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
            $_SESSION["abreviatura"] = $user["abreviatura"];
            header("location: index.php");
        } else {

            echo '<script type="text/javascript">
               alert("¡Usuario o Contraseña incorrecta!");
               window.location.href="index.php";
               document.cookie="usuario=;"
               </script>';

            //header("location: index.php");
        }
    }

    static public function registro()
    {
        UsuarioController::$usuario = new Usuario();
        if (isset($_POST["registrar"])) {
            $codigo = $_POST["usuario"];
            $dni = $_POST["dni"];
            $fechaNacimiento = $_POST["fecha-nacimiento"];
            $contra1 = $_POST["contra1"];
            $contra2 = $_POST["contra2"];
            $validacion = false;

            if ($contra1 != $contra2) {
                echo '<script type="text/javascript">
                alert("¡La contraseñas no coinciden!");
                window.location.href="index.php?registro";
                </script>';
            } else {
                $validacion = true;
            }

            if (UsuarioController::$usuario->esUsuarioRegistrado($codigo) && $validacion == true) {
                echo '<script type="text/javascript">
                alert("¡El usuario está registrado en el Sistema!");
                window.location.href="index.php?registro";
                </script>';
                $validacion = false;
            }

            if (strlen($contra2) < 5 && $validacion == true) {
                echo '<script type="text/javascript">
                alert("¡La contraseña no es válida!");
                window.location.href="index.php?registro";
                </script>';
                $validacion = false;
            }

            if (UsuarioController::$usuario->validarRegistro($codigo, $dni, $fechaNacimiento) && $validacion) {
                UsuarioController::$usuario->registrarUsuario($codigo, $contra2);
                echo '<script type="text/javascript">
                alert("¡El usuario ha sido registrado exitosamente!");
                window.location.href="index.php?registro";
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("¡Los datos ingresados no corresponden al usuario o el usuario no esta prerregistrado!");
                window.location.href="index.php?registro";
                </script>';
            }
        } else {
            require_once "view/registro.php";
        }
    }

    static public function datosPersonales()
    {
        UsuarioController::$usuario = new Usuario();
        $validacion = false;
        if (isset($_POST["actualizar-datos"])) {
            if (strlen($_POST["contra-actual"]) != 0 || strlen($_POST["contra-nueva"]) != 0 || strlen($_POST["contra-nueva2"]) != 0) {
                if (!UsuarioController::$usuario->validarUsuario($_SESSION["codigo"], $_POST["contra-actual"])) {
                    echo '<script type="text/javascript">
                alert("¡La contraseña es incorrecta!");
                window.location.href="index.php?datos-personales";
                </script>';
                } else {
                    $validacion = true;
                }

                if ($_POST["contra-nueva"] != $_POST["contra-nueva2"] && $validacion) {
                    echo '<script type="text/javascript">
                alert("¡La contraseñas no coinciden!");
                window.location.href="index.php?datos-personales";
                </script>';
                    $validacion = false;
                }

                if (strlen($_POST["contra-nueva2"]) <= 5 && $validacion) {
                    echo '<script type="text/javascript">
                alert("¡La Nueva Contraseña no es Válida!");
                window.location.href="index.php?datos-personales";
                </script>';
                    $validacion = false;
                } else {
                    if($validacion){
                        UsuarioController::$usuario->actualizarDatos($_POST["ciclo"], $_POST["contra-nueva2"], true);
                    } 
                }
            } else {
                UsuarioController::$usuario->actualizarDatos($_POST["ciclo"], $_POST["contra-nueva2"], false);
            }
            echo '<script type="text/javascript">
                alert("¡Datos actualizados correctamente!");
                window.location.href="index.php?datos-personales";
                </script>';
        } else {
            require_once "view/personal.php";
        }
    }
}
