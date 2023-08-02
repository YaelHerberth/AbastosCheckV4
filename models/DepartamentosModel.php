<?php
namespace Model;

class DepartamentosModel extends ActiveRecord
{
    protected static $tabla = 'departamentos';
    protected static $columnasDB = ['id', 'nombre_departamento', 'imagen_departamento'];

    public $id;
    public $nombre_departamento;
    public $imagen_departamento;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_departamento = $args['nombre_departamento'] ?? '';
        $this->imagen_departamento = $args['imagen_departamento'] ?? '';
    }
    public function validar()
    {
        if (!$this->nombre_departamento) {
            self::$errores[] = 'El Nombre es obligatorio';
        }

        return self::$errores;
    }

    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            // Comprobar que $this->imagen_departamento no este vacio
            if (!$this->imagen_departamento) {
                $this->imagen_departamento = $imagen;
            }
            $this->eliminarImagenDepartamento();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen_departamento = $imagen;
        }
    }

    //Eliminar imagen
    public function eliminarImagenDepartamento()
    {
        // Comprobar que $this->imagen_departamento no este vacio
        if(!$this->imagen_departamento == ''){

            // Comprobar que existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES_DEPARTAMENTOS . $this->imagen_departamento);

            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES_DEPARTAMENTOS . $this->imagen_departamento);
            }
            
        }else{
            return;
        }
    }

    public function eliminarDepartamento()
    {

        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->eliminarImagenDepartamento();
            header('Location: /departamentos?resultado=4');
        }
    }
}