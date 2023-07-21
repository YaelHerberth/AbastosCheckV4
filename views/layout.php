<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;


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
</head>

<body data-bs-theme="light">
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="build/img/LogoH2.svg" alt="" class="img-fluid ms-2 me-4" style="width: 3rem; ">
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
                        <li><a class="dropdown-item" href="#">Bebidas</a></li>
                        <li><a class="dropdown-item" href="#">Niños</a></li>
                        <li><a class="dropdown-item" href="#">Comida</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-success" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sobre nosotros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Conocenos</a></li>
                        <li><a class="dropdown-item" href="#">Mision</a></li>
                        <li><a class="dropdown-item" href="#">Valores</a></li>
                    </ul>
                </li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="" class="btn btn-outline-success position-relative me-3">
                    <i class="bi bi-cart-fill">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">Productos en el carrito</span>
                        </span>
                    </i>
                </a>
                <?php if (!$auth) : ?>
                    <a href="/login" class="btn btn-outline-success"><i class="bi bi-person-circle"></i></i> Iniciar Sesion</a>
                    <a href="/signup" class="btn btn-success">Registrarse</a>
                <?php else :  ?>

                    <a role="button" class="link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><p class="dropdown-item text-success text-uppercase"><?= $_SESSION['username'] ?></p></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Perfil</a></li>
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

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link link-success px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-success px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-success px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-success px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-success px-2 text-body-secondary">About</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>