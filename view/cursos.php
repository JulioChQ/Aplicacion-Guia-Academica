<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cursos | Sistema de Guía Académica |</title>
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
               <h2>Mis cursos</h2>
            </div>
         </div>

         <div class="row">
            <?php
            $ciclo = 1;
            $i = 0;
            while (isset($cursos[$i])) {

            ?>
               <div class="col-xl-4 col-md-6">
                  <h3>Ciclo <?php echo $ciclo; ?></h3>
                  <table class="table table-striped">
                     <th>Nombre</th>
                     <th>Cré.&nbsp&nbsp</th>
                     <th>Estado</th>
                     <?php
                     while ($cursos[$i]["ciclo"] == $ciclo) {
                     ?>
                        <tr>
                           <td>
                              <a href="index.php?curso=<?php echo $cursos[$i]["id_asignatura"]; ?>">
                                 <?php 
                                 echo $cursos[$i]["nombre"]; 
                                 if($cursos[$i]["electivo"] != 0){
                                    echo "(E-" . $cursos[$i]["electivo"] . ")";
                                 }
                                 ?>
                              </a>
                           </td>
                           <td>
                              <?php 
                              echo round($cursos[$i]["creditos"]);
                              ?>
                           </td>
                           <td>
                              <select name="estado" id="">
                                 <option value="-">-</option>
                                 <option value="noaprobado">No aprobado</option>
                                 <option value="aprobado">Aprobado</option>
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
            <?php

               $ciclo++;
            }
            ?>



         </div>
         <br>
         <input type="submit" value="Guardar Cambios" class="btn btn-primary">
         <button class="btn btn-secondary">Cancelar</button>
      </div>
   </section>
   <?php
   require_once "view/footer.php"; 
   ?>


</body>

</html>