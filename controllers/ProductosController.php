<?php
namespace Controllers;

use MVC\Router;

class ProductosController{
    public static function index(Router $router){
        
        $router->render('productos/index', [
            
        ]);
    }

    public static function crear(Router $router){
        
        $router->render('productos/crear', [
            
        ]);
    }
}