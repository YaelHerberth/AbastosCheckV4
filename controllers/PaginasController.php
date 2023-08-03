<?php
namespace Controllers;

use Model\CarritoModel;
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

    public static function conocenos(Router $router){

        $router->render('paginas/conocenos', [
            
        ]);
    }
    public static function avisos(Router $router){

        $router->render('paginas/avisos-privacidad', [
            
        ]);
    }

    public static function terminos(Router $router){

        $router->render('paginas/terminos-condiciones', [
            
        ]);
    }

    public static function productos(Router $router){

        $carrito = new CarritoModel();

        $producto = new ProductoModel();
        $id_departamento = $_GET['id'];

        if(!filter_var($id_departamento, FILTER_VALIDATE_INT)){
            header('Location: /departamentoss');
        }

        $resultado = $producto->findProducto($id_departamento);
        $departamento = $producto->findDepartamento($id_departamento);

        $producto = $_POST['producto'] ?? null;
        $carrito->carrito($producto);

        if($_SERVER['REQUEST_METHOD']){
            

        }

        $router->render('paginas/productos', [
            'resultado' => $resultado,
            'departamento' => $departamento
        ]);
    }

    public static function carrito(Router $router){
        $carrito = new CarritoModel();
        $id = $_POST['id'] ?? null;
        if($id){
            $carrito->eliminarProductoCarrito($id);
        }

        $router->render('paginas/carrito', [
            
        ]);
    }

    public static function comprar(Router $router){
        $carrito = new CarritoModel();
        $comprar = $_POST['comprar'] ?? null;
        if($comprar){
            $_SESSION['CARRITO'] = '';
            
        }

        $router->render('paginas/comprar', [
                
        ]);
    }
}