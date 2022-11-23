<?php
require_once "model/Conexion.php";

class Curso{
   private $cursos;
   private $db;

   public function __construct()
   {
      $this->db = Conexion::conectar();
      $this->cursos = array();
   }

   public function getListaCursosXUsuario($idUsuario){
      $sql = "call cursos_por_usuario('$idUsuario');";
      $resultado = $this->db->query($sql);
      $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
      return $cursos;
   }
}