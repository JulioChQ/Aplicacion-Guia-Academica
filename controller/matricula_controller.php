<?php
require_once "model/matricula_modelo.php";

class MatriculaController
{
   static private $matriculaModelo;

   static function inicializar()
   {
      MatriculaController::$matriculaModelo = new Matricula();
   }

   static public function verSimulacionMatricula()
   {
      MatriculaController::inicializar();
      $codigo = $_SESSION["codigo"];
      $listaCursos = MatriculaController::$matriculaModelo->getListaCursosXUsuarioDetallado($codigo); 
      require_once "view/simulacion-matricula.php";
   }

   
}
