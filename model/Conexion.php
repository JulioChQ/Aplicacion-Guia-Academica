<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Conexion
 *
 * @author USUARIO
 */


class Conexion {
    public static function conectar() {
        $conexion = mysqli_init();
        $conexion->ssl_set(null,null,"model/ca-bundle.pem",null,null);
        $conexion->real_connect(DB_HOST, DB_USUARIO, DB_CONTRASENIA, DB_NOMBRE);
        
        return $conexion;
    }
}