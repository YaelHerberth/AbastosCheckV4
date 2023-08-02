<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <?php if (!$resultado->imagen_usuario) : ?>
                        <img class="border border-success rounded-circle img-fluid" src="/build/img/profile-default.jpg" alt="Profile Default">
                    <?php else : ?>
                        <img class="border border-success rounded-circle img-fluid" src="/build/img/Usuarios/<?= $resultado->imagen_usuario ?>" alt="<?= $resultado->username_usuario ?>">
                    <?php endif ?>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= $resultado->username_usuario ?></h3>
                    <button class="btn btn-success mb-3">Cambiar nombre de perfil</button>
                    <button class="btn btn-warning">Cambiar foto de perfil</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?php if (!$resultado->id == 0) : ?>
                <h1>¡Bienvenido!</h1>
            <?php else : ?>
                <h1>¡Bienvenido!</h1>
                <h2 class="text-danger mb-5">Tienes acceso ha funciones de Administrador</h2>

                <h3>Panel de control</h3>
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="text-decoration-none" href="/users">
                                    <div class="d-flex justify-content-center align-items-center p-4 bg-primary rounded-3 text-light">
                                        <span class="mb-0">
                                            <i class="bi bi-person-circle w-100"></i>
                                        </span>
                                        <div class="ms-4 h6 fw-normal mb-0">
                                            <p class="mb-0 h5">Perfiles</p>
                                            <div class="d-flex">
                                                <h5 class="purecounter me-1 mb-0 fw-bold">
                                                    100
                                                </h5>
                                                <span class="mt-1 mb-0">Registros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-md-4">
                                <a class="text-decoration-none" href="/departamentos">
                                    <div class="d-flex justify-content-center align-items-center p-4 bg-danger rounded-3 text-light">
                                        <span class="mb-0">
                                            <i class="bi bi-building"></i>
                                        </span>
                                        <div class="ms-4 h6 fw-normal mb-0">
                                            <p class="mb-0 h5">Departamentos</p>
                                            <div class="d-flex">
                                                <h5 class="purecounter me-1 mb-0 fw-bold">
                                                    100
                                                </h5>
                                                <span class="mt-1 mb-0">Registros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="text-decoration-none" href="/productos">
                                    <div class="d-flex justify-content-center align-items-center p-4 bg-success rounded-3 text-light">
                                        <span class="mb-0">
                                            <i class="bi bi-basket"></i>
                                        </span>
                                        <div class="ms-4 h6 fw-normal mb-0">
                                            <p class="mb-0 h5">Productos</p>
                                            <div class="d-flex">
                                                <h5 class="purecounter me-1 mb-0 fw-bold">
                                                    100
                                                </h5>
                                                <span class="mt-1 mb-0">Registros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>