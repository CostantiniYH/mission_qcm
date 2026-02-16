<?php
namespace App\Controllers;

class AuthController 
{
    public function formRegister() {
        $titre = "Inscription";
        ob_start();
        require dirname(__DIR__) . '/Views/auth/register.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function register() {

    }

    public function formLogin() {
        $titre = "Connexion";
        ob_start();
        require dirname(__DIR__) . '/Views/auth/login.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function login() {
        
    }
}