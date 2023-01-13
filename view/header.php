<?php
$activo = array("", "", "", "");
if (!isset($_GET["p"])) {
    if(!isset($_GET["datos-personales"])){
        $activo[0] = "active opcion-actual";
    }
    
} else {
    switch ($_GET["p"]) {
        case "simulacion":
            $activo[2] = "active opcion-actual";
        case "procesos":
            $activo[1] = "active opcion-actual";
    }
}
?>

<header>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarToggler" style="">
                <a class="navbar-brand" href="#">

                </a>
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?= $activo[0] ?>" href="index.php">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activo[1] ?>" href="index.php?p=procesos">Procesos Académicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activo[2] ?>" href="index.php?p=simulacion">Simulación</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown text-end">

                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <label><?php echo $_SESSION["nombre-corto"]; ?></label>
                                <img src="view/img/person-circle.svg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" style="">
                                <li><a class="dropdown-item" href="index.php?datos-personales">Mis Datos Personales</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="controller/cerrar_sesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>