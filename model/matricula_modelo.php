<?php
require_once "model/Conexion.php";

class Matricula{
   private $db;
   private $matricula;

   public function __construct()
   {
      $this->db = Conexion::conectar();
      $this->matricula = array();
   }

   public function getListaCursosXUsuarioDetallado($idUsuario){
      $sql = "SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.ciclo, asignatura.horas_teoria, asignatura.horas_practica, asignatura.horas_laboratorio, asignatura.electivo, situacion_asignatura.estado, count(t.id_asignatura1) as prerrequisitos
      FROM ((asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) 
      INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula)  
      LEFT JOIN situacion_asignatura ON 
      (usuario.id_usuario = situacion_asignatura.id_usuario AND asignatura.id_asignatura = situacion_asignatura.id_asignatura)
      LEFT JOIN (SELECT t1.id_asignatura1 FROM prerrequisito t1 JOIN situacion_asignatura t2 ON t1.id_asignatura0 = t2.id_asignatura WHERE t2.estado != 1 OR t2.estado IS NULL) as t 
      ON asignatura.id_asignatura = t.id_asignatura1
      WHERE usuario.codigo = '$idUsuario'
      GROUP BY 1,2,3,4,5,6,7,8;";
      $resultado = $this->db->query($sql);
      $matricula = $resultado->fetch_all(MYSQLI_ASSOC);
      return $matricula;
   }

}