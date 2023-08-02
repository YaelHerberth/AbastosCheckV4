<?php

namespace Model;

class UsuariosModel extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'username_usuario', 'email_usuario', 'password_usuario', 'imagen_usuario', 'token', 'autenticado','estatus'];

    public $id;
    public $username_usuario;
    public $email_usuario;
    public $password_usuario;
    public $imagen_usuario;
    public $token;
    public $autenticado;
    public $estatus;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->username_usuario = $args['username_usuario'] ?? '';
        $this->email_usuario = $args['email_usuario'] ?? '';
        $this->password_usuario = $args['password_usuario'] ?? '';
        $this->imagen_usuario = $args['imagen_usuario'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->autenticado = $args['autenticado'] ?? '';
        $this->estatus = $args['estatus'] ?? '';
    }

    public function findUsuario($id){
        $resultado = $this->find($id);
        return $resultado;
    }

    public function validar(){
        if (!$this->username_usuario) {
            self::$errores[] = 'El Nombre es obligatorio';
        }
        if (!$this->email_usuario) {
            self::$errores[] = 'El Correo Electronico es obligatorio';
        } else if (!filter_var($this->email_usuario, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = 'Formato de Email no valido';
        }
        if (!$this->password_usuario) {
            self::$errores[] = 'La Contraseña es obligatorio';
        }

        return self::$errores;
    }

    public function encriptarPassword(){
        $password = $this->password_usuario;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->password_usuario = $passwordHash;
    }

    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->eliminarImagen();
        }

        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen_usuario = $imagen;
        }
    }

}