<?php
// File: app/Controller/home_controller.php
namespace App\Controller;

class home_controller 
{
    public function index() 
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        
        echo "<h1>Dashboard SI Akademik</h1>";
        
        if (isset($_SESSION['flash'])) {
            echo "<h3 style='color: green;'>" . $_SESSION['flash'] . "</h3>";
            unset($_SESSION['flash']);
        }

        echo "<p>Halo, " . $_SESSION['user_name'] . "</p>";
        echo "<a href='/S1-Akademik/public/logout'>Klik untuk Logout</a>";
    }
}
?>