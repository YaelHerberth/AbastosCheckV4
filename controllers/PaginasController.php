<?php
namespace Controllers;

use Model\DepartamentosModel;
use Model\ProductoModel;
use Model\PaginasModel;
use MVC\Router;

class PaginasController{

    public static function index(Router $router){

        $router->render('paginas/index', [
            
        ]);
    }

    public static function departamentos(Router $router){

        $departamento = new DepartamentosModel();

        $resultado =  $departamento->all();

        $router->render('paginas/departamentos', [
            'resultado' =>$resultado
        ]);
    }

    public static function productos(Router $router){

        $producto = new ProductoModel();
        $id_departamento = $_GET['id'];

        if(!filter_var($id_departamento, FILTER_VALIDATE_INT)){
            header('Location: /departamentoss');
        }

        $resultado = $producto->findProducto($id_departamento);
        $departamento = $producto->findDepartamento($id_departamento);

        $router->render('paginas/productos', [
            'resultado' => $resultado,
            'departamento' => $departamento
        ]);
    }
}