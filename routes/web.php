<?php
use App\Controllers\IndexController;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;

$router->get('/', [IndexController::class, 'index']);
    // ->middleware(AuthMiddleware::class);

$router->get('/register', [AuthController::class, 'formRegister']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/login', [AuthController::class, 'formLogin']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);
