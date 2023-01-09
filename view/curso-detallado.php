<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?=$curso[0]["nombre"]?> | Cursos | Sistema de Guía Académica |</title>
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

            <h1>
               <?php
               echo "Semestre " . $curso[0]["ciclo"];
               ?>
            </h1>
         </div>
         <div class="row">

            <h2>
               <?php
               echo "ASIGNATURA - " . $curso[0]["nombre"];
               ?>
            </h2>
         </div><br>

         <div class="row">
            <h4>PRE REQUISITOS </h4>
            <?php
            if(!empty($prerrequisitos)){
               foreach($prerrequisitos as $row ){
            ?>
            <li>
            <a href="index.php?curso=<?=$row["id"]?>"><?=$row["nombre"]?></a>
            </li>
                  
            <?php
               }
            }else{
               echo "No tiene";
            }
            ?>
            <br><br>
            

            <h4>PROPÓSITO U OBJETIVO</h4>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, consequatur accusantium obcaecati
            porro magni eaque eveniet esse! Error ut vel facilis amet numquam itaque quae quos dolores, nobis
            adipisci voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi soluta exercitationem ab harum magnam. Voluptates, eaque blanditiis. Molestias fugiat ut, earum itaque ea repellendus, asperiores dignissimos dolore veritatis quae laborum. <br><br>
            <h4>CONTENIDO</h4>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, consequatur accusantium obcaecati
            porro magni eaque eveniet esse! Error ut vel facilis amet numquam itaque quae quos dolores, nobis
            adipisci voluptate. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos doloribus quos dicta, maiores fugit hic, distinctio quis alias aperiam voluptatibus dolorem. Nisi eius deserunt libero recusandae necessitatibus molestiae blanditiis animi. <br><br>


         </div><br>

         <div class="row">
            <div class="col">
               <h4>HORAS Y CRÉDITOS</h4>
               <div class="table-responsive">
                  <table class="table table-striped">
                     <tr>
                        <td><b>Horas de Teoría</b></td>
                        <td><?php echo $curso[0]["horas_teoria"]; ?></td>
                     </tr>
                     <tr>
                        <td><b>Horas de Práctica</b></td>
                        <td><?php echo $curso[0]["horas_practica"]; ?></td>
                     </tr>
                     <tr>
                        <td><b>Horas de Laboratorio</b></td>
                        <td><?php echo $curso[0]["horas_laboratorio"]; ?></td>
                     </tr>
                     <tr>
                        <td><b>Total de horas</b></td>
                        <td><?php echo $curso[0]["horas_total"]; ?></td>
                     </tr>
                     <tr>
                        <td><b>Créditos</b></td>
                        <td><?php echo round($curso[0]["creditos"]); ?></td>
                     </tr>
                  </table>
               </div>
            </div>

            <div class="col">
               <h4>INFORMACIÓN ADICIONAL</h4>
               <div class="table-responsive">
                  <table class="table table-striped">
                     <tr>
                        <td><b>Código de curso</b></td>
                        <td>1234</td>
                     </tr>
                     
                  </table>
               </div>
            </div>

         </div>
      </div>
   </section>

   <?php
   require_once "view/footer.php"; 
   ?>
</body>


</html>