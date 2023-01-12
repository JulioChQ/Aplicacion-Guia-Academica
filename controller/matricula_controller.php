<?php

require_once "lib/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
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

   static public function generarReporteMatricula()
   {
      MatriculaController::inicializar();
      $codigo = $_SESSION["codigo"];
      $nombreCompleto = $_SESSION["nombre-completo"];
      $ciclo = $_SESSION["ciclo"];
      $planEstudios = $_SESSION["regimen"];
      $nombreEscuela = $_SESSION["nombre_escuela"];
      $situacion = $_POST["situacion"];
      $creditosSeleccionados = $_POST["creditos-selec"];
      $totalHoras = $_POST["horas-total"];
      $idAsignaturas = $_POST["id_asignatura"];
      $estados = $_POST["estado-aux"];
      $numeroMatriculas = $_POST["nro-matricula-aux"];

      $asignaturas = array();
      $contador = 0;
      for ($i = 0; $i < count($idAsignaturas); $i++) {
         if ($estados[$i] == "si") {
            $asignaturas[$contador] = MatriculaController::$matriculaModelo->getAsignaturaXId($idAsignaturas[$i]);
            $asignaturas[$contador]["nro_matricula"] = $numeroMatriculas[$i];
            $contador++;
         }
      }
      
      //var_dump($asignaturas);

      ob_start();

      require_once "view/reports/reporte_matricula.php";

      $html = ob_get_clean();
      //echo $html;
           

      $dompdf = new Dompdf();

      $options = $dompdf->getOptions();
      $options->set(array("isRemoteEnabled" => true));
      $dompdf->setOptions($options);
      $dompdf->loadHtml($html);
      //$dompdf->setPaper('letter');
      $dompdf->setPaper('A4');
      $dompdf->render();
      $dompdf->stream("archivo_.pdf", array("Attachment" => false));

   }
}
