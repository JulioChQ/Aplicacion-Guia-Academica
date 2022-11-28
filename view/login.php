<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión | Sistema Guía Académico</title>
    <link rel="stylesheet" href="view/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body id="login-user">
    <header>
        <div class="navbar align-items-center justify-content-center" id="cabecera-login">
        <h2>APLICACIÓN DE GUÍA ACADÉMICA</h2>    
        </div>
    </header>

    <div id="login" class="container-md text-center">
        <br>
        <div id="login-formulario" class="row">

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <div class="form-group">
                    <div id="login-icono">
                        <img src="view/img/person-circle.svg" alt="mdo" width="200" height="200" class="rounded-circle">
                    </div>
                    <h4 id="login-titulo">Inicio de Sesión</h4>
                    <div class="login-entrada">
                        <label for="login-usuario">Usuario:</label><br>
                        <input id="login-usuario" class="login-txt" name="usuario" type="text" placeholder="Usuario" required>
                    </div>
                    <div class="login-entrada">
                        <label for="login-contrasenia">Contraseña:</label><br>
                        <input id="login-contra" class="login-txt" name="contra" type="password" placeholder="Contraseña" required>
                    </div>
                    <div>
                        <input type="checkbox" id="recordar-usuario">
                        <label for="recordar-usuario">Recordar Usuario</label>
                    </div>
                    <input class="btn btn-primary" type="submit" name="iniciar-sesion" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </div>
</html>