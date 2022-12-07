<?php
require_once "model/Curso.php";
require_once "model/Usuario.php";

class CursoController{
   static private $curso_modelo;
   static private $usuario_modelo;

   static function inicializar()
   {
      CursoController::$curso_modelo = new Curso();
      CursoController::$usuario_modelo = new Usuario();
   }

   static public function verSituacionCursos(){
      CursoController::inicializar();
      $codigoUsuario = $_SESSION["usuario"];
      $cursos = CursoController::$curso_modelo->getListaCursosXUsuario($codigoUsuario); 
      $usuario = CursoController::$usuario_modelo->getUsuario($codigoUsuario);
      $nombreUsuario = $usuario["nombre"] . " " . $usuario["apellido1"];
      require_once "view/cursos.php";
   }

   static public function verCursoDetallado($idCurso){
      CursoController::inicializar();
      $curso = CursoController::$curso_modelo->getCursoXId($idCurso);
      require_once "view/curso-detallado.php";
      
   }
}