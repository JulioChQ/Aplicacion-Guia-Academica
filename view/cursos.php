<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Asignaturas | Guía Académica | Universidad</title>
   <link rel="stylesheet" href="view/estilo.css">


   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
   <?php
   require_once "view/header.php";
   ?>

   <section>
      <div class="container-lg">
         <div class="row">
            <div class="col">
               <h2><br>Mis Asignaturas</h2>
            </div>
         </div>
         <p>A continuación se muestran las asignaturas correspondientes a su Plan de Estudios(<?= $_SESSION["abreviatura"] . " " . $_SESSION["regimen"] ?>).</p>
         <p>
            Puede modificar los estados de las asignaturas (Aprobado o no aprobado) teniendo en cuenta las siguientes indicaciones:
         <p>
         <ul>
            <li>
               El estado de las asignaturas puede estar bloqueado en los siguientes casos:
               <ul>
                  <li>La asignatura tiene prerrequisitos y estos no estan aprobados</li>
                  <li>La asignatura es prerrequisito de otras asignaturas que están aprobadas</li>
               </ul>
            </li>
            <li>
               Para consultar la Información detallada de cada asignatura, haga hacer click en el nombre de la asignatura que quiera visualizar.
            </li>
            <li>
               Para la <a href="index.php?p=simulacion">simulacion de la matrícula</a> solamente se mostrarán aquellos asignaturas en estado no aprobado y que tengan todos sus prerrequisitos aprobados (Si los tuvieran) como pasaría en una situación real.
            </li>
         </ul>
         </p>
         </p>


         <form action="index.php" method="POST">

            <div class="row">
               <?php
               //var_dump($cursos[22]);
               $ciclo = 1;
               $i = 0;
               while (isset($cursos[$i])) {

               ?>
                  <div class="col-xl-6 col-md-12">
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="panelsStayOpen-heading<?= $i ?>">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                                 Ciclo <?php echo $ciclo; ?>
                              </button>
                           </h2>
                           <div id="panelsStayOpen-collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $i ?>" data-bs-parent="#accordionExample">
                              <div class="accordion-body">

                                 <table class="table table-striped">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cré.&nbsp&nbsp</th>
                                    <th>Estado</th>
                                    <?php
                                    while ($cursos[$i]["ciclo"] == $ciclo) {
                                    ?>
                                       <tr>
                                          <td><?= $i + 1 ?></td>
                                          <td>
                                             <a class="link-curso" href="index.php?curso=<?php echo $cursos[$i]["id_asignatura"]; ?>">
                                                <?php
                                                echo $cursos[$i]["nombre"];
                                                if ($cursos[$i]["electivo"] != 0) {
                                                   echo "(E-" . $cursos[$i]["electivo"] . ")";
                                                }
                                                ?>
                                             </a>
                                          </td>
                                          <td>
                                             <?php
                                             echo round($cursos[$i]["creditos"]);
                                             if ($cursos[$i]["prerrequisitos"] > 0 || $cursos[$i]["prerrequisitos1"] > 0) {
                                                $deshabilitar = "disabled";
                                                $valor = $cursos[$i]["estado"];
                                                echo "<input type='hidden' name='estado[]' value='$valor'";
                                             } else {
                                                $deshabilitar = "";
                                             }
                                             ?>
                                          </td>
                                          <td>
                                             <input type="hidden" name="id-curso[]" value="<?= $cursos[$i]["id_asignatura"] ?>">
                                             <select class="form-select form-select-sm mb-3" name="estado[]" <?= $deshabilitar ?>>

                                                <?php
                                                $estado = $cursos[$i]["estado"];

                                                $texto = array("", "");
                                                switch ($estado) {
                                                   case 0:
                                                      $texto[0] = "selected";
                                                      break;
                                                   case 1:
                                                      $texto[1] = "selected";
                                                      break;
                                                }
                                                ?>
                                                <option value="0" <?= $texto[0] ?>>No aprobado</option>
                                                <option value="1" <?= $texto[1] ?>>Aprobado</option>
                                             </select>
                                          </td>
                                       </tr>
                                    <?php
                                       $i++;
                                       if ($i >= count($cursos)) {
                                          break;
                                       }
                                    }
                                    ?>

                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php

                  $ciclo++;
               }
               ?>



            </div>
            <br>


            <div class="row text-center">
               <div class="col-12">
                  <input type="submit" value="Guardar Cambios" class="btn btn-primary" name="guardar-situacion">
                  <button class="btn btn-secondary">Cancelar</button>
               </div>

            </div>


         </form>
      </div>
   </section>
   <?php
   require_once "view/footer.php";
   ?>


</body>

</html>