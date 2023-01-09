<?php
require_once "model/matricula_modelo.php";

class MatriculaController
{
   static private $matricula_modelo;

   static function inicializar()
   {
      MatriculaController::$matricula_modelo = new Matricula();
   }

   static public function verSimulacionMatricula()
   {
      MatriculaController::inicializar();
      require_once "view/simulacion-matricula.php";
      
   }

   
}
