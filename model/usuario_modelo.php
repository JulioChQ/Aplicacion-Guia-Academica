<?php
require_once 'model/Conexion.php';

class Usuario {
    //put your code here
    private $usuarios;
    private $db;
 
    public function __construct() {
        $this->db = Conexion::conectar();
        $this->usuarios=array();
    }
    
    
    public function validarUsuario($codigo, $contrasenia){
        $esUsuarioValido = false;
        $sql = "SELECT * FROM usuario WHERE codigo = '$codigo' AND contrasenia = '$contrasenia';";
        
        $resultado = $this->db->query($sql);
        
        var_dump($resultado);
        
        if ($resultado->fetch_assoc()){
            $esUsuarioValido = true;
        }
        var_dump($esUsuarioValido);
       
        return $esUsuarioValido;
    }

    public function getUsuario($codigo){
        $sql = "SELECT usuario.codigo, usuario.tipo, usuario.nombre, usuario.apellido1, usuario.apellido2, usuario.ciclo, usuario.genero, curricula.regimen, escuela.abreviatura, escuela.nombre AS nombre_escuela FROM (usuario JOIN curricula ON usuario.id_curricula = curricula.id_curricula) JOIN escuela ON curricula.id_escuela = escuela.id_escuela WHERE codigo = '$codigo'";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }

    public function getIdUsuario($codigo){
        $sql = "SELECT id_usuario FROM usuario WHERE codigo = '$codigo'";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }

    
}
