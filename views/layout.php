<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

use Model\DepartamentosModel;

$departamento = new DepartamentosModel();
$resultado =  $departamento->all();

// var_dump($_SESSION);
// var_dump($_SERVER['DOCUMENT_ROOT'])
// var_dump($_SESSION['CARRITO']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AbastosCheck</title>
    <link rel="shortcut icon" href="../build/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../build/css/app.css">
    <script src="../build/js/app.js"></script>
    <script src="../build/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
</head>

<body data-bs-theme="light">
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="/build/img/LogoH2.svg" alt="" class="img-fluid ms-2 me-4" style="width: 3rem; ">
                    <h3 class="mt-2">AbastosCheck</h3>
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link link-success px-2">Inicio</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-success" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Departamentos
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($resultado as $departamento) : ?>
                            <li><a class="dropdown-item" href="/productoss?id=<?= $departamento->id ?>"><?= $departamento->nombre_departamento ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-success" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sobre nosotros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/conocenos">Conocenos</a></li>
                        <li><a class="dropdown-item" href="/avisos-privacidad">Avisos de Privacidad</a></li>
                        <li><a class="dropdown-item" href="/terminos-condiciones">Terminos y Condiciones</a></li>
                    </ul>
                </li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/carrito" class="btn btn-outline-success position-relative me-3">
                    <i class="bi bi-cart-fill">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= (empty($_SESSION['CARRITO']))?0:count(($_SESSION['CARRITO'])); ?>
                            <span class="visually-hidden">Productos en el carrito</span>
                        </span>
                    </i>
                </a>
                <?php if (!$auth) : ?>
                    <a href="/login" class="btn btn-outline-success"><i class="bi bi-person-circle"></i></i> Iniciar Sesion</a>
                    <a href="/signup" class="btn btn-success ">Registrarse</a>
                <?php else :  ?>

                    <a role="button" class="link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (!$_SESSION['imagen']) : ?>
                            <img src="/build/img/profile-default.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                        <?php else : ?>
                            <img src="/build/img/Usuarios/<?= $_SESSION['imagen'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                        <?php endif ?>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li>
                            <p class="dropdown-item text-success text-uppercase"><?= $_SESSION['username'] ?></p>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-circle"></i> Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
                    </ul>

                <?php endif ?>
                <button type="button" id="button-darkmode" class="btn btn-dark dark-mode"><i id="darkmode" class="bi bi-moon-fill"></i></button>
            </div>
        </header>
    </div>

    <?php
    echo $contenido;
    ?>

    <div class="container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 AbastosCheck</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="build/img/LogoH2.svg" alt="" class="img-fluid me-4" style="width: 3rem; ">
            </a>

            <p class="col-md-4 mb-0 text-body-secondary text-end">Desarrollado por: Yael Sánchez Herberth</p>
        </footer>
    </div>
</body>

</html>