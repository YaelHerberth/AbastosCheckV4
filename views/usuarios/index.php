<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/profile" class="btn btn-outline-success mb-3"><i class="bi bi-arrow-left"></i> Volver</a>
        </div>
        <div class="col-md-10">
        </div>
    </div>
    <?php $r = $_GET['resultado'] ?? null ?>
    <?php if ($r) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Usuario Registrado Correctamente
        </div>
    <?php elseif ($r) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Usuario Actualizado Correctamente
        </div>
    <?php elseif ($r) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Usuario Dado de Baja Correctamente
        </div>
    <?php elseif ($r) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Usuario Eliminado Correctamente
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col">
            <h2>Registros de Usuarios</h2>
        </div>
        <div class="col">
            <div class="text-end">
                <a href="/users/crear" class="btn btn-success mb-3"><i class="bi bi-person-plus"></i> Crear</a>
            </div>
        </div>
    </div>
    <br>
    <table class="table" id="tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Imagen</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $usuarios) : ?>
                <tr>
                    <td><?= $usuarios->id ?></td>
                    <td><?= $usuarios->username_usuario ?></td>
                    <td><?= $usuarios->email_usuario ?></td>
                    <?php if (!$usuarios->imagen_usuario) : ?>
                        <td><img class="img-fluid img-thumbnail" style="width: 75px;" src="build/img/profile-default.jpg" alt="ProfileImageDefault"></td>
                    <?php else : ?>
                        <td><img class="img-fluid img-thumbnail" style="width: 75px;" src="build/img/Usuarios/<?= $usuarios->imagen_usuario ?>" alt="<?= $usuarios->username_usuario ?>"></td>
                    <?php endif ?>
                    <td><?php if ($usuarios->estatus == 1) {
                            echo 'Activo';
                        } else {
                            echo 'Baja';
                        } ?></td>
                    <td>
                        <button class="btn btn-info"><i class="bi bi-pen"></i></button>
                        <button class="btn btn-warning"><i class="bi bi-trash"></i></button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="crear" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5">Crear Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success">Guardar</button>
                    </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            language: {
                searchBuilder: {
                    title: 'Buscar'
                }
            },
            "order": [
                [0, "desc"]
            ],

        });
    });
</script>