<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <title>Inicio de Sesión | Guía Académica</title>

   <!-- Favicons -->

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="view/estilo.css">


   <style>
      .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
      }

      @media (min-width: 768px) {
         .bd-placeholder-img-lg {
            font-size: 3.5rem;
         }
      }

      .b-example-divider {
         height: 3rem;
         background-color: rgba(0, 0, 0, .1);
         border: solid rgba(0, 0, 0, .15);
         border-width: 1px 0;
         box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
         flex-shrink: 0;
         width: 1.5rem;
         height: 100vh;
      }

      .bi {
         vertical-align: -.125em;
         fill: currentColor;
      }

      .nav-scroller {
         position: relative;
         z-index: 2;
         height: 2.75rem;
         overflow-y: hidden;
      }

      .nav-scroller .nav {
         display: flex;
         flex-wrap: nowrap;
         padding-bottom: 1rem;
         margin-top: -1px;
         overflow-x: auto;
         text-align: center;
         white-space: nowrap;
         -webkit-overflow-scrolling: touch;
      }
   </style>


   <!-- Custom styles for this template -->
</head>

<body class="text-center">
   <header class="">
      <nav class="navbar navbar-expand-md navbar-light">
         <div class="container-fluid">
            <div class="col-12">
                  <h4>Guía Académica</h4>
               
            </div>


         </div>
      </nav>
   </header>

   <main class="form-signin w-100 m-auto">
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
         <img class="mb-4" src="view/img/person-circle.svg" alt="" width="72" height="57">
         <h1 class="h3 mb-3 fw-normal">Inicio de Sesión</h1>

         <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="usuario" onchange="guardarSesion()">
            <label for="floatingInput">Código</label>
         </div>
         <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="contra">
            <label for="floatingPassword">Contraseña</label>
         </div>

         <div class="checkbox mb-3">
            <label>
               <input type="checkbox" value="remember-me" id="recuerdame" name="recuerdame" onchange="guardarSesion()"> Recuérdame
            </label>
         </div>
         <button class="w-100 btn btn-lg btn-primary" type="submit" name="iniciar-sesion">Iniciar Sesión</button>

      </form>
      <a href="index.php?registro">Registrarme</a>
   </main>

   <?php
   require_once "view/footer.php";
   ?>

   <script src="view/js/login.js"></script>




</body>

</html>