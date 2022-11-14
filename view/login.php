<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesión | Sistema Guía Académico ESIS</title>
    </head>
    <body>
        
        <div id="cabecera">
            
        </div>

        <div id="login">
            <div id="login-formulario">
                <form action="controller/usuario_controller.php" method="POST">
                    <div id="login-icono">
                        <img src="https://png.pngtree.com/png-vector/20191110/ourlarge/pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" width="200px" height="200px">
                    </div>
                    <h4 id="login-titulo">Inicio de Sesión</h4>
                    <div class="login-entrada">
                        <label for="login-usuario">Usuario:</label>
                        <input id="login-usuario" class="login-txt" name="usuario" type="text" placeholder="Usuario" required>
                    </div>
                    <div class="login-entrada">
                        <label for="login-contrasenia">Contraseña:</label>
                        <input id="login-contra" class="login-txt" name="contra" type="password" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" name = "iniciar-sesion">
                </form>
            </div>
        </div>
        
        
    </body>
</html>
