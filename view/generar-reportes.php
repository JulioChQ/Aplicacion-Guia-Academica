<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reportes | Guía Académica</title>
   <link rel="stylesheet" href="view/estilo.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
   <?php
   require_once "view/header.php";
   ?>
   <section>
      <div class="container">
         <div class="row">
            <div class="col">
               <br><h3 id="titulo">Reportes</h3>
               <p>

               </p>
            </div>
         </div>

         <form action="index.php?p=reportes" method="POST" target="_blank">
            <div class="row text-center">
               <h5>Datos de Reporte</h5><br><br>
               <div class="col-xl-6 col-md-6">
                  <label for="situacion">Tipo de Reporte</label><br>
                  <select class="form-select" name="situacion" id="situacion" style="width: 80%;">
                     <option value="-" selected>-</option>
                     <option value="plan">Plan de estudios</option>
                     <option value="cursoXciclo">Asignaturas por semestre</option>
                     <option value="">Datos Personales</option>
                  </select>
               </div>
               <div class="col-xl-6 col-md-6">
                  <label for="creditos-total">Parámetro</label><br>
                  <input type="text" class="input-matricula" id="creditos-total" value="" name="creditos-total" style="width: 80%;">
               </div>

            </div><br><br>
            <div class="row text-center">
               <div class="col-12">
                  <input type="submit" name="generar-reporte" class="btn btn-primary" value="Generar Reporte" id="generar" disabled>
                  <a class="btn btn-secondary" href="index.php">Volver</a><br><br><br><br><br><br>
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