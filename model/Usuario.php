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
        $sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
        $resultado = $this->db->query($sql);

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }
}
