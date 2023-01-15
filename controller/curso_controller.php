<?php
require_once "model/curso_modelo.php";
require_once "model/usuario_modelo.php";

class CursoController
{
   static private $curso_modelo;
   static private $usuario_modelo;

   static function inicializar()
   {
      CursoController::$curso_modelo = new Curso();
      CursoController::$usuario_modelo = new Usuario();
   }

   static public function verSituacionCursos()
   {
      CursoController::inicializar();

      if (isset($_POST["guardar-situacion"])) {
         $idCursos = $_POST["id-curso"];
         //var_dump($idCursos);
         $estados = $_POST["estado"];
         //var_dump($estados);
         CursoController::$curso_modelo->guardarSituacionCurso($idCursos, $estados);
         echo '<script type="text/javascript">
               alert("Cambios guardados con exito");
               
               </script>';
      }

      $idUsuario = $_SESSION["id"];
      $cursos = CursoController::$curso_modelo->getListaCursosXUsuario($idUsuario);
      require_once "view/cursos.php";
   }

   static public function verCursoDetallado()
   {
      CursoController::inicializar();


      $curso = CursoController::$curso_modelo->getCursoXId($_GET["curso"]);
      $prerrequisitos = CursoController::$curso_modelo->getPrerrequisitosXId($_GET["curso"]);
      $cursoSucesor = CursoController::$curso_modelo->getCursoSucesorXId($_GET["curso"]);
      require_once "view/curso-detallado.php";
   }
}
