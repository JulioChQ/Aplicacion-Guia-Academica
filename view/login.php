<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión | Guía Académico</title>
    <link rel="stylesheet" href="view/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body id="login-user" class="text-center">
    


        <main class="form-signin w-100 m-auto">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">


                <img src="view/img/person-circle.svg" class="mb-4" alt="mdo" width="72" height="72" class="rounded-circle">

                <h1 id="login-titulo" class="h3 mb-3 fw-normal">Inicio de Sesión</h1>
                <div class="form-floating">
                    <label for="login-usuario">Usuario:</label><br>
                    <input id="login-usuario" class="form-control" name="usuario" type="text" placeholder="Usuario" required>
                </div>
                <div class="form-floating">
                    <label for="login-contra">Contraseña:</label><br>
                    <input id="login-contra" class="form-control" name="contra" type="password" placeholder="Contraseña" required>
                </div>
                <div class="checkbox mb-3">
                    <input type="checkbox" id="recordar-usuario">
                    <label for="recordar-usuario">Recordar Usuario</label>
                </div>
                <input class="w-100 btn btn-lg btn-primary" type="submit" name="iniciar-sesion" value="Iniciar Sesión">

            </form>

        </main>



    





</body>

</html>