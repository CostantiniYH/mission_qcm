<?php
namespace App\Middleware;
use Core\Middleware;

class AuthMiddleware implements Middleware
{
    public function handle($next)
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

        return $next();
    }
}