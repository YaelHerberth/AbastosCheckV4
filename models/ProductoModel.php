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

    public static function allProductos(){
        $query = "SELECT p.*, d.nombre_departamento FROM productos AS p
        LEFT JOIN departamentos AS d ON p.id_departamento = d.id";

        $resultado = self::consultarSQL($query);
        return $resultado;
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

    public function validar()
    {
        if (!$this->nombre_producto) {
            self::$errores[] = 'El Nombre es obligatorio';
        }
        if (!$this->precio_producto) {
            self::$errores[] = 'El Precio es obligatorio';
        } 
        if (!$this->stock) {
            self::$errores[] = 'El Numero de Stock es obligatorio';
        }
        if (!$this->id_departamento) {
            self::$errores[] = 'El Departamento es obligatorio';
        }
        if (!$this->descripcion_producto) {
            self::$errores[] = 'La Descripcion es obligatoria';
        }

        return self::$errores;
    }

    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->eliminarImagenProducto();
        }

        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen_producto = $imagen;
        }
    }

    //Eliminar imagen
    public function eliminarImagenProducto()
    {
        // Comprobar que $this->imagen_producto no este vacio
        if(!$this->imagen_producto == ''){

            // Comprobar que existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES_PRODUCTOS . $this->imagen_producto);

            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES_PRODUCTOS . $this->imagen_producto);
            }
            
        }else{
            return;
        }
    }

    public function eliminarProducto()
    {

        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->eliminarImagenProducto();
            header('Location: /productos?resultado=4');
        }
    }
}