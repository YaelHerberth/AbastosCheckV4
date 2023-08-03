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

// Zona publica
$router->get('/',[PaginasController::class, 'index']);
$router->get('/departamentoss',[PaginasController::class, 'departamentos']);
$router->get('/productoss',[PaginasController::class, 'productos']);
$router->post('/productoss',[PaginasController::class, 'productos']);
$router->get('/conocenos',[PaginasController::class, 'conocenos']);
$router->get('/avisos-privacidad',[PaginasController::class, 'avisos']);
$router->get('/terminos-condiciones',[PaginasController::class, 'terminos']);
$router->get('/carrito',[PaginasController::class, 'carrito']);
$router->post('/carrito',[PaginasController::class, 'carrito']);
$router->get('/comprar',[PaginasController::class, 'comprar']);
$router->post('/comprar',[PaginasController::class, 'comprar']);

// Zona privada
$router->get('/profile',[ProfileController::class, 'profile']);
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
$router->post('/productos/crear',[ProductosController::class, 'crear']);
$router->get('/productos/actualizar',[ProductosController::class, 'actualizar']);
$router->post('/productos/actualizar',[ProductosController::class, 'actualizar']);
$router->post('/productos/eliminar',[ProductosController::class, 'eliminar']);

// Autenticación
$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'login']);
$router->get('/signup',[AuthController::class, 'signup']);
$router->post('/signup',[AuthController::class, 'signup']);
$router->get('/logout',[AuthController::class, 'logout']);



// RUTAS PARA EL HOSTING
// Zona publica
$router->get('/public/',[PaginasController::class, 'index']);
$router->get('/public/departamentoss',[PaginasController::class, 'departamentos']);
$router->get('/public/productoss',[PaginasController::class, 'productos']);
$router->post('/public/productoss',[PaginasController::class, 'productos']);
$router->get('/public/conocenos',[PaginasController::class, 'conocenos']);
$router->get('/public/avisos-privacidad',[PaginasController::class, 'avisos']);
$router->get('/public/terminos-condiciones',[PaginasController::class, 'terminos']);
$router->get('/public/carrito',[PaginasController::class, 'carrito']);
$router->post('/public/carrito',[PaginasController::class, 'carrito']);
$router->get('/public/comprar',[PaginasController::class, 'comprar']);
$router->post('/public/comprar',[PaginasController::class, 'comprar']);

// Zona privada
$router->get('/public/profile',[ProfileController::class, 'profile']);
// Usuarios
$router->get('/public/users',[UsuariosController::class, 'index']);
$router->get('/public/users/crear',[UsuariosController::class, 'crear']);
$router->post('/public/users/crear',[UsuariosController::class, 'crear']);
$router->get('/public/users/actualizar',[UsuariosController::class, 'actualizar']);
$router->post('/public/users/actualizar',[UsuariosController::class, 'actualizar']);
$router->post('/public/users/eliminar',[UsuariosController::class, 'eliminar']);

// Departamentos
$router->get('/public/departamentos',[DepartamentosController::class, 'index']);
$router->get('/public/departamentos/crear',[DepartamentosController::class, 'crear']);
$router->post('/public/departamentos/crear',[DepartamentosController::class, 'crear']);
$router->get('/public/departamentos/actualizar',[DepartamentosController::class, 'actualizar']);
$router->post('/public/departamentos/actualizar',[DepartamentosController::class, 'actualizar']);
$router->post('/public/departamentos/eliminar',[DepartamentosController::class, 'eliminar']);
// Productos
$router->get('/public/productos',[ProductosController::class, 'index']);
$router->get('/public/productos/crear',[ProductosController::class, 'crear']);
$router->post('/public/productos/crear',[ProductosController::class, 'crear']);
$router->get('/public/productos/actualizar',[ProductosController::class, 'actualizar']);
$router->post('/public/productos/actualizar',[ProductosController::class, 'actualizar']);
$router->post('/public/productos/eliminar',[ProductosController::class, 'eliminar']);

// Autenticación
$router->get('/public/login',[AuthController::class, 'login']);
$router->post('/public/login',[AuthController::class, 'login']);
$router->get('/public/signup',[AuthController::class, 'signup']);
$router->post('/public/signup',[AuthController::class, 'signup']);
$router->get('/public/logout',[AuthController::class, 'logout']);
$router->comprobarRutas();