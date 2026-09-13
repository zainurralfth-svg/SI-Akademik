<?php
// File: app/Core/Middleware/Authmiddleware.php
namespace App\Core\Middleware;

class Authmiddleware 
{
    public function handle(): void 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            $_SESSION['flash'] = "Akses ditolak. Silakan login terlebih dahulu.";
            header('Location: /S1-Akademik/public/login');
            exit;
        }
    }
}
?>