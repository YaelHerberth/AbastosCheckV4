<?php
namespace Model;

class DepartamentosModel extends ActiveRecord
{
    protected static $tabla = 'departamentos';
    protected static $columnasDB = ['id', 'nombre_departamento', 'imagen_departamento','estatus'];

    public $id;
    public $nombre_departamento;
    public $imagen_departamento;
    public $estatus;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_departamento = $args['nombre_departamento'] ?? '';
        $this->imagen_departamento = $args['imagen_departamento'] ?? '';
        $this->estatus = $args['estatus'] ?? '';
    }
}