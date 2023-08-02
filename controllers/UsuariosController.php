<?php

namespace Controllers;

use Model\UsuariosModel;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class UsuariosController
{
    public static function index(Router $router)
    {
        $usuarios = new UsuariosModel();
        $resultado = UsuariosModel::all();

        $router->render('usuarios/index', [
            "resultado" => $resultado
        ]);
    }

    public static function crear(Router $router)
    {

        $usuario = new UsuariosModel();
        $errores = UsuariosModel::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new UsuariosModel($_POST['usuario']);

            /* Subida de archivos */
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            //  Setear la imagen
            //  Realiza un resize a la imagen con intervention

            if ($_FILES['usuario']['tmp_name']['imagen_usuario']) {
                $img = Image::make($_FILES['usuario']['tmp_name']['imagen_usuario'])->fit(500, 500);
                $usuario->setImagen($nombreImagen);
            }

            $errores = $usuario->validar();

            if (empty($errores)) {

                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES_USUARIOS)) {
                    mkdir(CARPETA_IMAGENES_USUARIOS);
                }
                //  Guardar la imagen en el servidor
                $img->save(CARPETA_IMAGENES_USUARIOS . $nombreImagen);

                // Guardar en la base de datos
                $usuario->encriptarPassword();
                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /users?resultado=1');
                }
            }
        }
        $router->render('usuarios/crear', [
            "usuario" => $usuario,
            "errores" => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        validarORedireccionar('/users');

        $errores = UsuariosModel::getErrores();
        $usuario = UsuariosModel::find($_GET['id']);

        if (!$usuario) {
            header('Location: /users?resultado=5');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Cambio de contraseña
            
            // Asignar los atributos
            $args = $_POST['usuario'];
            
            $usuario->comprobarPasswordNueva();
            
            $usuario->sincronizar($args);

            // Validacion
            $errores = $usuario->validar();


            if (empty($errores)) {

                if ($_FILES['usuario']['tmp_name']['imagen_usuario']) {
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                    $image = Image::make($_FILES['usuario']['tmp_name']['imagen_usuario'])->fit(500, 500);
                    $usuario->setImagen($nombreImagen, CARPETA_IMAGENES_USUARIOS);
                    $image->save(CARPETA_IMAGENES_USUARIOS . $nombreImagen);
                }

                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /users?resultado=2');
                }

            }
        }

        $router->render('usuarios/actualizar', [
            "errores" => $errores,
            "usuario" => $usuario
        ]);
    }
}
