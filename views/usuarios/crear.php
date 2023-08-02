<div class="container">
    <a href="/users" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Volver</a>
    <hr>
    <h1>Crear Usuario</h1>
    <hr>
    <form method="POST" enctype="multipart/form-data">
        <?php foreach ($errores as $error) : ?>
            <div class="alert alert-danger text-uppercase text-center" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach ?>


        <?php
        foreach ($errores as $error) {
        }
        $crear = true;
        include_once "formulario_usuarios.php"
        ?>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>