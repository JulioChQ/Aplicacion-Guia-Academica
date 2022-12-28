<?php
require_once "model/curso_modelo.php";
require_once "model/usuario_modelo.php";

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

   static public function verCursoDetallado(){
      CursoController::inicializar();
      $curso = CursoController::$curso_modelo->getCursoXId($_GET["curso"]);
      $prerrequisitos = CursoController::$curso_modelo->getPrerrequisitosXId($_GET["curso"]);
      require_once "view/curso-detallado.php";
      
   }
}