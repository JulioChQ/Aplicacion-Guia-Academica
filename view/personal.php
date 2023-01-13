<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Procesos Académicos | Guía Académica</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="view/estilo.css">
</head>

<body>
   <?php
   require_once "view/header.php";
   ?>
   <section>
      <div class="container">
         <form action="index.php?datos-personales" method="post">
            <div class="row">
               <h1>Mis Datos personales</h1>
            </div>

            <div class="row">
               <p>A continuación se mostrarán todos los enlaces a los documentos de intéres relacionados con los procesos Académicos de la universidad</p>
            </div>

            <div class="row">
               <div class="col-xl-3 col-md-3">
                  <label for="codigo-alumno">Usuario</label><br>
                  <input type="text" class="input-matricula" id="codigo-alumno" value="<?= $_SESSION["codigo"] ?>" disabled>
               </div>
               <div class="col-xl-6 col-md-6">
                  <label for="nombre-apellido">Nombres y Apellidos</label><br>
                  <input type="text" class="input-matricula" id="nombre-apellido" value="<?= $_SESSION["nombre-completo"] ?>" disabled>
               </div>

               <div class="col-xl-3 col-md-3">
                  <label for="plan">Plan de Estudios</label><br>
                  <input type="text" class="input-matricula" id="plan" value="<?= $_SESSION["regimen"] ?>" disabled>
               </div>
               <div class="col-xl-9 col-md-9">
                  <label for="escuela">Escuela Profesional</label><br>
                  <input type="text" class="input-matricula" id="escuela" value="<?= $_SESSION["nombre_escuela"] ?>" disabled>
               </div>
               <?php
               $ciclo = array("", "", "", "", "", "", "", "", "", "", "", "", "");
               $ciclo[(int) $_SESSION["ciclo"]] = " selected";
               //var_dump($ciclo);
               ?>
               <div class="col-xl-3 col-md-3">
                  <label for="ciclo">Ciclo</label><br>
                  <select name="ciclo" id="ciclo" class="input-matricula">
                     <option value="1" <?= $ciclo[1] ?>>1</option>
                     <option value="2" <?= $ciclo[2] ?>>2</option>
                     <option value="3" <?= $ciclo[3] ?>>3</option>
                     <option value="4" <?= $ciclo[4] ?>>4</option>
                     <option value="5" <?= $ciclo[5] ?>>5</option>
                     <option value="6" <?= $ciclo[6] ?>>6</option>
                     <option value="7" <?= $ciclo[7] ?>>7</option>
                     <option value="8" <?= $ciclo[8] ?>>8</option>
                     <option value="9" <?= $ciclo[9] ?>>9</option>
                     <option value="10" <?= $ciclo[10] ?>>10</option>
                     <option value="11" <?= $ciclo[11] ?>>11</option>
                     <option value="12" <?= $ciclo[12] ?>>12</option>
                  </select>
               </div>
            </div><br>

            <div class="row">
               <h5>Cambio de Contraseña</h5>
               <div class="col-xl-3 col-md-4">
                  <label for="contra-actual">Contraseña Actual</label><br>
                  <input type="password" name="contra-actual">
               </div>
               <div class="col-xl-3 col-md-4">
                  <label for="contra-nueva">Contraseña Nueva</label><br>
                  <input type="password" name="contra-nueva">
               </div>
               <div class="col-xl-3 col-md-4">
                  <label for="ciclo">Repita la nueva contraseña</label><br>
                  <input type="password" name="contra-nueva2">
               </div>
            </div><br>
            <div class="row text-center">
               <div class="col">
                  <input class="btn btn-primary" type="submit" value="Actualizar Datos" name="actualizar-datos">

                  <button class="btn btn-secondary">Descartar Cambios</button>
               </div>
            </div>


         </form>
      </div>


      </div>

   </section>
   <?php
   require_once "view/footer.php";
   ?>
</body>

</html>