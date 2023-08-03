<?php

namespace Model;

class CarritoModel
{
    public $id;
    public $nombre_producto;
    public $cantidad;
    public $precio_producto;
    public $mensaje;

    public function carrito($productos)
    {
        if ($productos) {
            $id = $productos['id'];
            $nombre_producto = $productos['nombre_producto'];
            $cantidad = $productos['cantidad'];
            $precio_producto = $productos['precio_producto'];
            if (!isset($_SESSION['CARRITO']) || !is_array($_SESSION['CARRITO'])) {
                $_SESSION['CARRITO'] = array();
            }
            $producto = array(
                'id' => $id,
                'nombre_producto' => $nombre_producto,
                'cantidad' => $cantidad,
                'precio_producto' => $precio_producto
            );
            $_SESSION['CARRITO'][] = $producto;
            $mensaje = "¡Producto agregado al carrito!";
        }
    }

    public function eliminarProductoCarrito($id)
    {
        if (isset($id)) {
            // Buscar y eliminar el producto correspondiente del array $_SESSION['CARRITO']
            foreach ($_SESSION['CARRITO'] as $key => $producto) {
                if ($producto['id'] == $id) {
                    unset($_SESSION['CARRITO'][$key]);
                    break;
                }
            }
        }

        // Redirigir al usuario a la página del carrito o a donde desees
        header('Location: /carrito?resultado=1');
    }
}
