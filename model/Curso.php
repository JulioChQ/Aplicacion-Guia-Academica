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
      $sql = "SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.horas_teoria + asignatura.horas_laboratorio/2 + asignatura.horas_practica/2 as creditos, asignatura.ciclo, asignatura.electivo  FROM (asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula WHERE usuario.codigo = '$idUsuario'";
      $resultado = $this->db->query($sql);
      $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
      return $cursos;
   }
}