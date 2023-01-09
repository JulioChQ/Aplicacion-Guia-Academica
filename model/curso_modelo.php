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
      $sql = "SELECT asignatura.id_asignatura, asignatura.nombre, 
      asignatura.horas_teoria + asignatura.horas_laboratorio/2 + asignatura.horas_practica/2 as creditos, 
      asignatura.ciclo, asignatura.electivo, situacion_asignatura.estado, count(t.id_asignatura1) as prerrequisitos
      FROM ((asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) 
      INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula)  
      LEFT JOIN situacion_asignatura ON 
      (usuario.id_usuario = situacion_asignatura.id_usuario AND asignatura.id_asignatura = situacion_asignatura.id_asignatura)
      LEFT JOIN (SELECT t1.id_asignatura1 FROM prerrequisito t1 JOIN situacion_asignatura t2 ON t1.id_asignatura0 = t2.id_asignatura WHERE t2.estado != 1 OR t2.estado IS NULL) as t 
      ON asignatura.id_asignatura = t.id_asignatura1
      WHERE usuario.codigo = '$idUsuario'
      GROUP BY 1,2,3,4,5,6;";
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

   public function guardarSituacionCurso($idAsignaturas, $estados)
   {
      // MODIFICAR LA CONSULTA
      //var_dump($idAsignaturas);
      $idUsuario = $_SESSION["id"];
      $cursos_actual = $this->getListaCursosXUsuario($_SESSION["usuario"]);

      for ($i = 0; $i < count($idAsignaturas); $i++) {
         $estado = $estados[$i];
         $idAsignatura = $idAsignaturas[$i];
         if ($estado != $cursos_actual[$i]["estado"]) {
            $sql = "UPDATE situacion_asignatura SET estado = $estado WHERE (id_usuario = $idUsuario) and (id_asignatura = $idAsignatura);";
            //var_dump($sql);
            $resultado = $this->db->query($sql);
            //var_dump($resultado);
         }
      }
   }
   
}