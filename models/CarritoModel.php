<?php

namespace Model;

class CarritoModel extends ActiveRecord
{
    protected static $tabla = 'productos';

    public $id;
    public $nombre_producto;
    public $precio_producto;
    public $descripcion;
    public $imagen_producto;
    public $stock;
    public $id_departamento;

    public function carrito($productos)
    {
        if ($productos) {
            $id = $productos['id'];
            $nombre_producto = $productos['nombre_producto'];
            $stock = $productos['cantidad'];
            $precio_producto = $productos['precio_producto'];
            if (!isset($_SESSION['CARRITO']) || !is_array($_SESSION['CARRITO'])) {
                $_SESSION['CARRITO'] = array();
            }
            $producto = array(
                'id' => $id,
                'nombre_producto' => $nombre_producto,
                'cantidad' => $stock,
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

    public function comprarProductoCarrito()
    {
        foreach ($_SESSION['CARRITO'] as $producto) {

            $id = $producto['id'];
            $stock = $producto['cantidad'];

            // Verificar si el producto ya está acumulado
            if (isset($productos_acumulados[$id])) {
                // Actualizar la cantidad acumulada
                $productos_acumulados[$id]['cantidad'] += $stock;
            } else {
                // Agregar el producto al array de productos acumulados
                $productos_acumulados[$id] = array(
                    'id' => $id,
                    'cantidad' => $stock,
                );
            }

            $productoDB = self::find($id);
            $productoDB->stock -= $stock;
            return $productoDB;
        }

        // Redirigir al usuario a la página del carrito o a donde desees
        header('Location: /carrito?resultado=1');
    }
}
