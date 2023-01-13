<?php
require_once 'model/Conexion.php';

class Usuario
{
    //put your code here
    private $usuarios;
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->usuarios = array();
    }


    public function validarUsuario($codigo, $contrasenia)
    {
        $esUsuarioValido = false;
        $sql = "SELECT * FROM usuario WHERE codigo = '$codigo' AND contrasenia = '$contrasenia';";

        $resultado = $this->db->query($sql);

        //var_dump($resultado);

        if ($resultado->fetch_assoc()) {
            $esUsuarioValido = true;
        }
        //var_dump($esUsuarioValido);

        return $esUsuarioValido;
    }

    public function getUsuario($codigo)
    {
        $sql = "SELECT usuario.id_usuario, usuario.codigo, usuario.tipo, usuario.nombre, usuario.apellido1, usuario.apellido2, usuario.ciclo, usuario.genero, curricula.regimen, escuela.abreviatura, escuela.nombre AS nombre_escuela FROM (usuario JOIN curricula ON usuario.id_curricula = curricula.id_curricula) JOIN escuela ON curricula.id_escuela = escuela.id_escuela WHERE codigo = '$codigo'";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }

    public function getIdUsuario($codigo)
    {
        $sql = "SELECT id_usuario FROM usuario WHERE codigo = '$codigo'";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }

    public function esUsuarioRegistrado($codigo)
    {
        $sql = "SELECT codigo, contrasenia FROM usuario WHERE codigo = '$codigo' AND es_activo = 1";
        $esUsuarioRegistrado = false;

        $resultado = $this->db->query($sql);
        if ($resultado->fetch_assoc()) {
            $esUsuarioRegistrado = true;
        }

        return $esUsuarioRegistrado;
    }

    public function validarRegistro($codigo, $dni, $fechaNacimiento)
    {
        $sql = "SELECT id_usuario FROM usuario WHERE codigo = '$codigo' AND documento = '$dni' AND fecha_nacimiento = '$fechaNacimiento'";
        $esUsuarioValido = false;

        $resultado = $this->db->query($sql);
        //var_dump($resultado);
        if ($resultado->fetch_assoc()) {
            $esUsuarioValido = true;
        }

        return $esUsuarioValido;
    }

    public function getIdCurriculaXUsuario($idUsuario)
    {
        $sql = "SELECT id_curricula FROM usuario WHERE id_usuario = '$idUsuario';";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }

    public function registrarUsuario($codigo, $contrasenia)
    {
        $idUsuario = $this->getIdUsuario($codigo)["id_usuario"];

        $sql = "UPDATE usuario SET contrasenia = '$contrasenia', es_activo = 1 WHERE id_usuario = '$idUsuario';";
        $this->db->query($sql);

        $idCurricula = $this->getIdCurriculaXUsuario($idUsuario)["id_curricula"];

        $sql = "SELECT id_asignatura FROM asignatura WHERE id_curricula = '$idCurricula';";
        $resultado = $this->db->query($sql);

        while ($row = $resultado->fetch_row()) {
            $idAsignatura = $row[0];
            $sql = "INSERT INTO situacion_asignatura (`id_usuario`, `id_asignatura`) VALUES ('$idUsuario', '$idAsignatura');";
            $this->db->query($sql);
        }
    }

    public function actualizarDatos($ciclo, $contrasenia, $hayContrasenia)
    {
        $idUsuario = $_SESSION["id"];
        if ($hayContrasenia) {
            $sql = "UPDATE usuario SET contrasenia = '$contrasenia', ciclo = '$ciclo' WHERE id_usuario = '$idUsuario';";
            $this->db->query($sql);
            
        } else {
            $sql = "UPDATE usuario SET ciclo = '$ciclo' WHERE id_usuario = '$idUsuario';";
            $this->db->query($sql);
        }
        $_SESSION["ciclo"] = $ciclo;
    }
}
