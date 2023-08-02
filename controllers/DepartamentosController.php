<?php
namespace Controllers;

use MVC\Router;

class DepartamentosController{
    public static function index(Router $router){
        
        $router->render('departamentos/index', [
            
        ]);
    }
}