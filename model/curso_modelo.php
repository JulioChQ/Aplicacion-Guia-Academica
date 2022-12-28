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

   public function getCursoXId($idCurso){
      //var_dump($idCurso);
      $sql = "SELECT *, horas_teoria + horas_practica + horas_laboratorio AS horas_total, horas_teoria + (horas_practica + horas_laboratorio)/2 AS creditos FROM asignatura WHERE id_asignatura = '$idCurso';";
      $resultado = $this->db->query($sql);
      //var_dump($resultado);
      $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
      return $cursos;
   }

   public function getPrerrequisitosXId($idCurso){
      $sql = "SELECT a.id_asignatura AS id, a.nombre AS nombre FROM (asignatura a INNER JOIN prerrequisito ON a.id_asignatura=prerrequisito.id_asignatura0) 
      JOIN asignatura b ON prerrequisito.id_asignatura1=b.id_asignatura
      WHERE b.id_asignatura = '$idCurso'";
      $resultado = $this->db->query($sql);
      $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
      return $cursos;
   }
}