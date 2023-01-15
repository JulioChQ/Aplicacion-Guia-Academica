<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reporte de Matrícula | Guía Académica</title>
   <link rel='stylesheet' type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/aplicacionguiaacademica/view/reports/reportes.css">

   <link rel='stylesheet' type="text/css" href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

</head>

<body>


   <div class="container">
      <div class="row">
         <div class="col text-center">
            <h2 id="titulo">Ficha de Matrícula Simulada</h2>

         </div>
      </div>
      <div class="row">
         <h3>Información Personal</h3>
         <div class="col col-xs-3">
            <label for="codigo-alumno">Código de alumno</label><br>
            <input type="text" class="input-matricula" id="codigo-alumno" value="<?= $codigo ?>" disabled>
         </div>
         <div class="col col-xs-6">
            <label for="nombre-apellido">Nombres y Apellidos</label><br>
            <input type="text" class="input-matricula" id="nombre-apellido" value="<?= $nombreCompleto ?>" disabled>
         </div>
         <div class="col col-xs-2">
            <label for="ciclo">Ciclo</label><br>
            <input type="text" class="input-matricula" id="ciclo" value="<?= $ciclo ?>" disabled>
         </div>
         <div class="col col-xs-1"><br></div>
      </div>

      <div class="row">
         <div class="col col-xs-2">
            <label for="plan">Plan de Estudios</label><br>
            <input type="text" class="input-matricula" id="plan" value="<?= $planEstudios ?>" disabled>
         </div>
         <div class="col col-xs-9">
            <label for="escuela">Escuela Profesional</label><br>
            <input type="text" class="input-matricula" id="escuela" value="<?= $nombreEscuela ?>" disabled>
         </div>
         <div class="col col-xs-1"></div>
      </div>

      <div class="row">
         <h3>Información de Matrícula</h3>
         <div class="col col-xs-4">
            <label for="situacion">Situación de Estudiante</label><br>
            <input type="text" class="input-matricula" id="situacion" value="<?= $situacion ?>" readonly>
         </div>
         <div class="col col-xs-4">
            <label for="creditos-selec">Creditos Totales</label><br>
            <input type="text" class="input-matricula" id="creditos-selec" value="<?= $creditosSeleccionados ?>" name="creditos-selec" readonly>
         </div>
         <div class="col col-xs-3">
            <label for="horas-total">Total de Horas</label><br>
            <input type="text" class="input-matricula" id="horas-total" value="<?= $totalHoras ?>" name="horas-total" readonly>
         </div><br>
         <div class="col-xs-1"></div>
      </div><br>
      <div class="row">
         <div class="">
            <table id="cursos" class="table">
               <thead>
                  <tr>
                     <th>Nro.</th>
                     <th>Asignatura</th>
                     <th>Ciclo</th>
                     <th>H.T.</th>
                     <th>H.P.</th>
                     <th>H.L.</th>
                     <th>Cred.</th>
                     <th>Nro. Mat.</th>

                  </tr>
               </thead>
               <?php
               $contador = 0;
               foreach ($asignaturas as $row) {
                  $contador++;
               ?>

                  <tr id="curso-<?= $contador ?>">

                     <td><?= $contador ?></td>
                     <td>
                        <?php
                        if ($row["electivo"] > 0) {
                           echo $row["nombre"] . " " . "(E-" . $row["electivo"] . ")";
                        } else {
                           echo $row["nombre"];
                        }

                        ?>
                     </td>
                     <td><?= $row["ciclo"] ?></td>
                     <td class="curso-ht"><?= $row["horas_teoria"] ?></td>
                     <td class="curso-hp"><?= $row["horas_practica"] ?></td>
                     <td class="curso-hl"><?= $row["horas_laboratorio"] ?></td>
                     <td class="curso-creditos">
                        <?= $row["horas_teoria"] + ($row["horas_practica"] + $row["horas_laboratorio"]) / 2 ?>
                     </td>
                     <td><?= $row["nro_matricula"] ?></td>
                  </tr>
               <?php
               }
               ?>
            </table>
         </div>
      </div>
   </div>

   <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="text-muted">Hora y fecha de generación: <?=date("H:i:s d/m/Y")?></p>
      
   </footer>
</body>

</html>