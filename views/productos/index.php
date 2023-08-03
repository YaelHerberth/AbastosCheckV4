<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/profile" class="btn btn-outline-success mb-3"><i class="bi bi-arrow-left"></i> Volver</a>
        </div>
        <div class="col-md-10">
        </div>
    </div>
    <?php $r = $_GET['resultado'] ?? null ?>

    <?php if ($r == 1) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Producto Registrado Correctamente
        </div>
    <?php elseif ($r == 2) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Producto Actualizado Correctamente
        </div>
    <?php elseif ($r == 3) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Producto Dado de Baja Correctamente
        </div>
    <?php elseif ($r == 4) : ?>
        <div class="alert alert-success text-uppercase text-center" role="alert">
            Producto Eliminado Correctamente
        </div>
    <?php elseif ($r == 5) : ?>
        <div class="alert alert-danger text-uppercase text-center" role="alert">
            Producto No Existe
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col">
            <h2>Registros de Productos</h2>
        </div>
        <div class="col">
            <div class="text-end">
                <a href="/productos/crear" class="btn btn-success mb-3"><i class="bi bi-person-plus"></i> Crear</a>
            </div>
        </div>
    </div>
    <br>
    <table class="table" id="tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Stock</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $producto) : ?>
                <tr>
                    <td><?= $producto->id ?></td>
                    <td><?= $producto->nombre_producto ?></td>
                    <td><?= $producto->precio_producto ?></td>
                    <td><?= $producto->descripcion_producto ?></td>
                    
                    <?php if (!$producto->imagen_producto) : ?>
                        <td><img class="img-fluid img-thumbnail" style="width: 75px;" src="build/img/AbastosCheckDefault.png" alt="ProductImageDefault"></td>
                    <?php else : ?>
                        <td><img class="img-fluid img-thumbnail" style="width: 75px;" src="build/img/Productos/<?= $producto->imagen_producto ?>" alt="<?= $producto->nombre_producto ?>"></td>
                    <?php endif ?>
                    <td><?= $producto->stock ?></td>
                    <td><?= $producto->nombre_departamento ?></td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <a href="/productos/actualizar?id=<?= $producto->id ?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                            </div>
                            <div class="col-4">
                                <form action="/productos/eliminar" method="POST">
                                    <input type="hidden" name="id" value="<?= $producto->id ?>">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>

                        </div>
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