<?php
// File: app/Controller/Auth_controller.php
namespace App\Controller;

class Auth_controller 
{
    public function loginForm() 
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        require_once __DIR__ . '/../View/Auth/login.php';
    }

    public function login() 
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username === 'admin' && $password === 'admin123') {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = 'Admin';
            $_SESSION['flash'] = 'Selamat datang, Admin'; 
            
            header('Location: /S1-Akademik/public/mahasiswa');
            exit;
        } else {
            $_SESSION['flash'] = 'Username atau password salah!';
            header('Location: /S1-Akademik/public/login');
            exit;
        }
    }

    public function logout() 
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        session_destroy(); // Hapus semua session login[cite: 1]
        
        session_start(); // Mulai session baru khusus untuk menyimpan pesan logout
        
        // PENYELESAIAN TUGAS MANDIRI: Flash message saat logout[cite: 1]
        $_SESSION['flash'] = 'Anda telah logout'; 
        header('Location: /S1-Akademik/public/login');
        exit;
    }
}
?>