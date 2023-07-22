<?php
require_once __DIR__ . "/../includes/app.php";

use MVC\Router;
use Controllers\PaginasController;
use Controllers\AuthController;

$router = new Router;

// Zona publica
$router->get('/',[PaginasController::class, 'index']);
$router->get('/departamentos',[PaginasController::class, 'departamentos']);
$router->get('/productos',[PaginasController::class, 'productos']);

// Zona privada
$router->get('/admin',[PaginasController::class, 'index']);
$router->get('/perfil',[PaginasController::class, 'index']);



// Autenticación
$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'login']);
$router->get('/signup',[AuthController::class, 'signup']);
$router->post('/signup',[AuthController::class, 'signup']);
$router->get('/logout',[AuthController::class, 'logout']);

$router->comprobarRutas();