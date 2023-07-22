<div class="container">

    <h1>Departamentos</h1>
    <hr>
    <div class="row">
        <?php foreach ($resultado as $departamento) : ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <?php if (!$departamento->imagen_departamento) : ?>
                        <img src="build/img/AbastosCheckDefault.png" class="card-img-top img-fluid" alt="">
                    <?php else : ?>
                        <img src="build/img/Departamentos/<?= $departamento->imagen_departamento ?>" class="card-img-top img-fluid" alt="<?= $departamento->imagen_departamento ?>">
                    <?php endif ?>
                    <div class="card-body text-center">
                        <h4 class="card-title mb-4"><?= $departamento->nombre_departamento ?></h4>
                        <a href="/productos?id=<?= $departamento->id ?>" class="btn btn-success">Ver más</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>

</div>