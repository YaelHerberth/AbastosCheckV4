<div class="row">
    <div class="col-md-12">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="usuario[username_usuario]" value="<?= s($usuario->username_usuario) ?>" placeholder="Nombre de usuario">
            <label for="username">Nombre de usuario</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="usuario[email_usuario]" value="<?= s($usuario->email_usuario) ?>" placeholder="Correo Electronico">
            <label for="email">Correo Electronico</label>
        </div>
    </div>

    <div class="col-md-12">
        <?php if ($crear) : ?>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="usuario[password_usuario]" value="<?= s($usuario->password_usuario) ?>" id="password" placeholder="Contraseña">
                <label for="password">Contraseña</label>
            </div>
        <?php else : ?>
            <button class="btn btn-warning"><i class="bi bi-key"></i>Cambiar contraseña</button>
        <?php endif ?>
    </div>

    <div class="col-md-12">
        <div class="form-floating mb-3">
            <select class="form-select" id="estatus" name="usuario[estatus]">
                <option value="1">Activo</option>
                <option value="0">Baja</option>
            </select>
            <label for="estatus">Estatus</label>

        </div>
    </div>

    <div class="col-md-12">
        <div class="container row">
            <div class="col-md-6">
                <label for="imagen" class="mb-1"><i class="bi bi-image"></i> Imagen (Solo jpg y png)</label>
                <input type="file" class="form-control" id="imagen" name="usuario[imagen_usuario]" accept="image/jpeg, image/png" placeholder="Contraseña">
            </div>
            <div class="col-md-6">
                <?php if (!$crear) : ?>
                    <img class="img-thumbnail img-fluid w-50" src="/build/img/profile-default.jpg" alt="Profile Default">
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<br>