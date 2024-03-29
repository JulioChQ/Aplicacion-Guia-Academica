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
      $idUsuario = $_SESSION["id"];
      $listaCursos = MatriculaController::$matriculaModelo->getListaCursosXUsuarioDetallado($idUsuario);
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
      $dompdf->set_base_path("view/css/bootstrap.min.css");
      $dompdf->set_base_path("view/reports/reportes.css");

      $options = $dompdf->getOptions();
      $options->set(array("isRemoteEnabled" => true));
      $dompdf->setOptions($options);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4',"portrait");
      $dompdf->render();
      $codigo = $_SESSION["codigo"];
      $dompdf->stream("simulacion_matricula_$codigo.pdf", array("Attachment" => false));
      
      
   }
}
