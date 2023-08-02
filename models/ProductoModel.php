<?php
namespace Model;

class ProductoModel extends ActiveRecord
{
    protected static $tabla = 'productos';
    protected static $tabla2 = 'departamentos';
    protected static $columnasDB = ['id', 'nombre_producto', 'precio_producto', 'descripcion_producto', 'imagen_producto', 'stock', 'id_departamento'];

    public $id;
    public $nombre_producto;
    public $precio_producto;
    public $descripcion_producto;
    public $imagen_producto;
    public $stock;
    public $id_departamento;
    public $nombre_departamento;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_producto = $args['nombre_producto'] ?? '';
        $this->precio_producto = $args['precio_producto'] ?? '';
        $this->descripcion_producto = $args['descripcion_producto'] ?? '';
        $this->imagen_producto = $args['imagen_producto'] ?? '';
        $this->stock = $args['stock'] ?? '';
        $this->id_departamento = $args['id_departamento'] ?? '';
        $this->nombre_departamento = $args['nombre_departamento'] ?? '';
    }

    function sanitizarEntrada($id){
        if(!filter_var($id, FILTER_VALIDATE_INT)){
            header('Location: /departamentos');
        }
    }

    function findProducto($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id_departamento = {$id}";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    function findDepartamento($id){
        $query = "SELECT nombre_departamento FROM " . static::$tabla2 . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);

        // Array_shift manda el primer elemento de un arreglo
        return array_shift($resultado);
    }
}