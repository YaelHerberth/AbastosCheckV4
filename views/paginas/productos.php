<div class="container">
    <h1>Productos</h1>
    <h5><?= $departamento->nombre_departamento ?></h5>
    <hr>
    <div class="row">
        
            <?php foreach ($resultado as $producto) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <?php if (!$producto->imagen_producto) : ?>
                            <img src="build/img/AbastosCheckDefault.png" class="card-img-top img-fluid" alt="">
                        <?php else : ?>
                            <img src="build/img/Productos/<?= $producto->imagen_producto ?>" class="card-img-top img-fluid" alt="<?= $producto->imagen_producto ?>">
                        <?php endif ?>
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?= $producto->nombre_producto ?></h4>
                            <p class="card-text mb-4"><?= $producto->descripcion_producto ?></p>
                            <form action="" method="POST">
                                <input type="hidden" name="producto[id]" value="<?= $producto->id ?>">
                                <input type="hidden" name="producto[nombre_producto]" value="<?= $producto->nombre_producto ?>">
                                <input type="hidden" name="producto[cantidad]" value="1">
                                <input type="hidden" name="producto[precio_producto]" value="<?= $producto->precio_producto ?>">
                                <button type="submit" class="btn btn-outline-success"><i class="bi bi-cart"></i> Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
    </div>
</div>