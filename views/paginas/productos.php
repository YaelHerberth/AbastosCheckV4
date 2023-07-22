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
                            <img src="build/img/Departamentos/<?= $producto->imagen_producto ?>" class="card-img-top img-fluid" alt="<?= $producto->imagen_producto ?>">
                        <?php endif ?>
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?= $producto->nombre_producto ?></h4>
                            <p class="card-text mb-4"><?= $producto->descripcion_producto ?></p>
                            <a href="/productos?id=<?= $producto->id ?>" class="btn btn-success">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

    </div>

</div>