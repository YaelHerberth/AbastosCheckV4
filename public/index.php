<?php
require_once __DIR__ . "/../includes/app.php";

use Controllers\AdminController;
use MVC\Router;
use Controllers\PaginasController;
use Controllers\AuthController;
use Controllers\DepartamentosController;
use Controllers\ProductosController;
use Controllers\ProfileController;
use Controllers\UsuariosController;

$router = new Router;

session_start();

// var_dump( password_hash('123456', PASSWORD_DEFAULT));

// Zona publica
$router->get('/',[PaginasController::class, 'index']);
$router->get('/departamentos',[PaginasController::class, 'departamentos']);
$router->get('/productos',[PaginasController::class, 'productos']);

// Zona privada
$router->get('/profile',[ProfileController::class, 'profile']);
$router->get('/admin',[PaginasController::class, 'index']);
// Usuarios
$router->get('/users',[UsuariosController::class, 'index']);
$router->get('/users/crear',[UsuariosController::class, 'crear']);
$router->post('/users/crear',[UsuariosController::class, 'crear']);
$router->get('/users/actualizar',[UsuariosController::class, 'actualizar']);
$router->post('/users/actualizar',[UsuariosController::class, 'actualizar']);
$router->post('/users/eliminar',[UsuariosController::class, 'eliminar']);

// Departamentos
$router->get('/departamentos',[DepartamentosController::class, 'index']);
$router->get('/departamentos/crear',[DepartamentosController::class, 'crear']);
$router->post('/departamentos/crear',[DepartamentosController::class, 'crear']);
$router->get('/departamentos/actualizar',[DepartamentosController::class, 'actualizar']);
$router->post('/departamentos/actualizar',[DepartamentosController::class, 'actualizar']);
$router->post('/departamentos/eliminar',[DepartamentosController::class, 'eliminar']);
// Productos
$router->get('/productos',[ProductosController::class, 'index']);
$router->get('/productos/crear',[ProductosController::class, 'crear']);



// Autenticación
$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'login']);
$router->get('/signup',[AuthController::class, 'signup']);
$router->post('/signup',[AuthController::class, 'signup']);
$router->get('/logout',[AuthController::class, 'logout']);

$router->comprobarRutas();