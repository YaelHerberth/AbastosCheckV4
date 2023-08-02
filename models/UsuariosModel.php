<?php

namespace Model;

class UsuariosModel extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'username_usuario', 'email_usuario', 'password_usuario', 'imagen_usuario', 'token', 'autenticado'];

    public $id;
    public $username_usuario;
    public $email_usuario;
    public $password_usuario;
    public $imagen_usuario;
    public $token;
    public $autenticado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->username_usuario = $args['username_usuario'] ?? '';
        $this->email_usuario = $args['email_usuario'] ?? '';
        $this->password_usuario = $args['password_usuario'] ?? '';
        $this->imagen_usuario = $args['imagen_usuario'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->autenticado = $args['autenticado'] ?? '';
    }


    public function validar()
    {
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

    public function encriptarPassword()
    {
        $password = $this->password_usuario;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->password_usuario = $passwordHash;
    }

    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            // Comprobar que $this->imagen_usuario no este vacio
            if (!$this->imagen_usuario) {
                $this->imagen_usuario = $imagen;
            }

            $this->eliminarImagenUsuario();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen_usuario = $imagen;
        }
    }

    //Eliminar imagen
    public function eliminarImagenUsuario()
    {
        if(!$this->imagen_usuario == ''){
            // Comprobar que existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES_USUARIOS . $this->imagen_usuario);
    
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES_USUARIOS . $this->imagen_usuario);
            }

        }else {
            return;
        }
    }

    // Comprobar que la contraseña coincida con la almancenada en la base de datos
    public function comprobarPasswordNueva()
    {
        if ($_POST['usuario']['password_usuario_a'] && $_POST['usuario']['password_usuario_n']) {
            $pass = $_POST['usuario']['password_usuario_a'];
            $passNuevo = $_POST['usuario']['password_usuario_n'];
            $passHash = $this->password_usuario;
            $verify = password_verify($pass, $passHash);

            if ($verify) {
                $passHashNuevo = password_hash($passNuevo, PASSWORD_DEFAULT);
                $this->password_usuario = $passHashNuevo;
            } else {
                self::$errores[] = 'La nueva contraseña no coincide con la anterior, intentelo de nuevo';
            }
        }
    }

    public function eliminarUsuario()
    {

        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->eliminarImagenUsuario();
            header('Location: /users?resultado=4');
        }
    }
}
