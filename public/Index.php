<?php
require_once __DIR__ . '/../routes/Web.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/database.php';
require_once __DIR__ . '/../app/Controller/home_controller.php';
require_once __DIR__ . '/../app/Controller/Mahasiswa_controller.php';
require_once __DIR__ . '/../app/Controller/Auth_controller.php';
require_once __DIR__ . '/../app/Core/Middleware/Authmiddleware.php';
require_once __DIR__ . '/../app/Controller/Prodi_controller.php';
require_once __DIR__ . '/../app/Controller/Matakuliah_controller.php';
require_once __DIR__ . '/../app/Repository/Mahasiswa_repository.php';
require_once __DIR__ . '/../app/Repository/Prodi_repository.php';
require_once __DIR__ . '/../app/Repository/Matakuliah_repository.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/S1-Akademik/public'; 
if (str_starts_with($uri, $base)) {
    $uri = substr($uri, strlen($base)) ?: '/';
}

$method = $_SERVER['REQUEST_METHOD'];

if (isset($routes[$method][$uri])) {
    $route = $routes[$method][$uri];
    $controllerName = $route['controller'];
    $action = $route['method'];
    $middlewares = $route['middleware'] ?? [];

    foreach ($middlewares as $mw) {
        $mwInstance = new $mw();
        $mwInstance->handle();
    }

    $controllerClass = "App\\Controller\\{$controllerName}";
    $controller = new $controllerClass();
    $controller->$action();
} 
else {
    $parts = explode('/', trim($uri, '/'));
    
    if (count($parts) === 2 && is_numeric($parts[1])) {
        $resource = $parts[0];
        $id = $parts[1];
        if ($resource === 'mahasiswa' && $method === 'GET') {

            $controller = new \App\Controller\Mahasiswa_controller();
            $controller->show($id);
            exit;
        }
    }
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
}
?>