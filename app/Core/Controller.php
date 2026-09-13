<?php
namespace App\Core;
class Controller 
{ 
    protected function view(string $viewPath, array $data = []): void 
    { 
        extract($data); 
        $content = __DIR__ . '/../View/' . $viewPath . '.php'; 
        require __DIR__ . '/../View/Layouts/main.php'; 
    } 
    protected function redirect(string $url): void 
    { 
        header("Location: /S1-Akademik/public{$url}"); 
        exit; 
    } 
}
class MahasiswaController extends Controller 
{ 
public function index(): void 
{ 
    $this->view('mahasiswa/index', ['title' => 'Daftar Mahasiswa']); 
    } 
} 
?>