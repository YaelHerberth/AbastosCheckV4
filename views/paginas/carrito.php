<div class="container">
    <hr>
    <h1>Carrito</h1>
    <hr>
    <?php $r = $_GET['resultado'] ?? null; ?>
    <?php if($r == 1): ?>
    <div class="alert alert-success text-uppercase text-center" role="alert">
        Producto eliminado del carrito
    </div>
    <?php endif ?>
    <div class="col-md-12">
        <?php if (!empty($_SESSION['CARRITO'])) : ?>
            <table class="table table-striped">
                <tr>
                    <th>Nombre de Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                <?php
                $total = 0;
                $productos_acumulados = array(); // Array para acumular los productos
                ?>
                <?php foreach ($_SESSION['CARRITO'] as $producto) : ?>
                    <?php
                    $id = $producto['id'];
                    $nombre = $producto['nombre_producto'];
                    $cantidad = $producto['cantidad'];
                    $precio = $producto['precio_producto'];

                    // Verificar si el producto ya está acumulado
                    if (isset($productos_acumulados[$id])) {
                        // Actualizar la cantidad acumulada
                        $productos_acumulados[$id]['cantidad'] += $cantidad;
                    } else {
                        // Agregar el producto al array de productos acumulados
                        $productos_acumulados[$id] = array(
                            'id' => $id,
                            'nombre' => $nombre,
                            'cantidad' => $cantidad,
                            'precio' => $precio
                        );
                    }
                    ?>
                    <?php $total += $cantidad * $precio; ?>
                <?php endforeach ?>
                <?php foreach ($productos_acumulados as $producto) : ?>
                    <tr>
                        <th><?= $producto['nombre'] ?></th>
                        <th><?= $producto['cantidad'] ?></th>
                        <th><?= $producto['precio'] ?></th>
                        <th><?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></th>
                        <th>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="3" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                    <td></td>
                </tr>
            </table>
            <div class="text-end">
                <a href="" class="btn btn-success"><i class="bi bi-cart"></i> Comprar</a>
            </div>
        <?php else : ?>
            <div class="alert alert-success text-uppercase text-center" role="alert">
                Aún no hay nada en el carrito de compras :/
            </div>

        <?php endif ?>
    </div>

</div>