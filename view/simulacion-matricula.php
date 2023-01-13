<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Simulación</title>
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
      <div class="container">
         <div class="row">
            <div class="col">
               <h3 id="titulo">Simulación de Matrícula</h3>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus cumque facere odio suscipit iure distinctio, aliquid doloribus cupiditate. Sunt impedit fuga tenetur harum illo aperiam amet hic delectus deserunt expedita!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta voluptatibus mollitia perferendis dolore tenetur ab quidem in qui accusantium consequuntur sed, architecto quae magnam sequi velit reiciendis maxime voluptate eius.
               </p>
            </div>
         </div>
         <div class="row">
            <h5>Información Personal</h5>
            <div class="col-xl-3 col-md-3">
               <label for="codigo-alumno">Código de alumno</label><br>
               <input type="text" class="input-matricula" id="codigo-alumno" value="<?=$codigo?>" disabled>
            </div>
            <div class="col-xl-6 col-md-6">
               <label for="nombre-apellido">Nombres y Apellidos</label><br>
               <input type="text" class="input-matricula" id="nombre-apellido" value="<?=$_SESSION["nombre-completo"]?>" disabled>
            </div>
            <div class="col-xl-3 col-md-3">
               <label for="ciclo">Ciclo</label><br>
               <input type="text" class="input-matricula" id="ciclo" value="<?=$_SESSION["ciclo"]?>" disabled>
            </div>
            <div class="col-xl-3 col-md-3">
               <label for="plan">Plan de Estudios</label><br>
               <input type="text" class="input-matricula" id="plan" value="<?=$_SESSION["regimen"]?>" disabled>
            </div>
            <div class="col-xl-9 col-md-9">
               <label for="escuela">Escuela Profesional</label><br>
               <input type="text" class="input-matricula" id="escuela" value="<?=$_SESSION["nombre_escuela"]?>" disabled>
            </div>
         </div><br>

         <form action="index.php?p=simulacion" method="POST" target="_blank">
            <div class="row">
               <h5>Información de Matrícula</h5>
               <div class="col-xl-3 col-md-4">
                  <label for="situacion">Situación de Estudiante</label><br>
                  <select onchange="cambiarCreditos()" class="form-select" name="situacion" id="situacion">
                     <option value="especial">Especial</option>
                     <option value="regular" selected>Regular</option>
                     <option value="destacado">Destacado</option>
                  </select>
               </div>
               <div class="col-xl-3 col-md-4">
                  <label for="creditos-total">Creditos Máximos</label><br>
                  <input type="text" class="input-matricula" id="creditos-total" value="22" readonly onchange="actualizarRestriccion()" name="creditos-total">
               </div>
               <div class="col-xl-3 col-md-4">
                  <label for="creditos-selec">Creditos Seleccionados</label><br>
                  <input type="text" class="input-matricula" id="creditos-selec" value="0" name="creditos-selec" readonly>
               </div><br>
               <div class="col-xl-3 col-md-4">
                  <label for="horas-total">Total de Horas</label><br>
                  <input type="text" class="input-matricula" id="horas-total" value="0" name="horas-total" readonly>
               </div><br>

               <div class="table-responsive">
                  <table id="cursos" class="table table-hover">
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
                           <th>Estado</th>
                        </tr>
                     </thead>
                     <?php
                     $contador = 0;
                     foreach ($listaCursos as $row) {
                        $contador++;
                     ?>

                        <tr id="curso-<?= $contador ?>">
                           <input type="hidden" name="id_asignatura[]" value="<?=$row["id_asignatura"]?>">
                           <input type="hidden" name="estado-aux[]" class="estado-aux" value="no">
                           <input type="hidden" name="nro-matricula-aux[]" class="nro-matricula-aux" value="1">
                           <td><?= $contador ?></td>
                           <td>
                              <?php
                              if($row["electivo"]>0){
                                 echo $row["nombre"] ." ". "(E-" . $row["electivo"] . ")";
                              }else{
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
                           <td>
                              <select class="nro-matricula" name="nro-matricula-<?=$row["id_asignatura"]?>" id="nro-matricula" onchange="actualizarEstadoCursos()">
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                              </select>
                           </td>
                           <td>
                              <input type="checkbox" class="checkbox curso-estado" name="estado-<?=$row["id_asignatura"]?>" id="estado" onchange="modificarCreditosSeleccionados()">
                           </td>
                        </tr>
                     <?php
                     }
                     ?>
                  </table>
                  <div class="row text-center">
                     <div class="col-12">
                        <input type="submit" name="generar-matricula" class="btn btn-primary" value="Generar Matrícula">
                        <a href="index.php?p=simulacion"><button class="btn btn-secondary"> Descartar Cambios</button></a>
                        
                     </div>

                  </div>

               </div>
            </div>
         </form>

      </div>
   </section>


   <?php
   require_once "view/footer.php";
   ?>

   <script src="view/js/simulacion-matricula.js"></script>
</body>

</html>