<?php
$routes = [
    'GET' => [
        '/login' => ['controller' => 'Auth_controller', 'method' => 'loginForm'],
        '/logout' => ['controller' => 'Auth_controller', 'method' => 'logout'],
        '/' => ['controller' => 'home_controller', 'method' => 'index', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/dashboard' => ['controller' => 'home_controller', 'method' => 'index', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/mahasiswa' => ['controller' => 'Mahasiswa_controller', 'method' => 'index', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/mahasiswa/create' => ['controller' => 'Mahasiswa_controller', 'method' => 'create', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/mahasiswa/edit' => ['controller' => 'Mahasiswa_controller', 'method' => 'edit', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/mahasiswa/delete' => ['controller' => 'Mahasiswa_controller', 'method' => 'delete', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        
        '/prodi' => ['controller' => 'Prodi_controller', 'method' => 'index', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/prodi/create' => ['controller' => 'Prodi_controller', 'method' => 'create', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/prodi/edit' => ['controller' => 'Prodi_controller', 'method' => 'edit', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/prodi/delete' => ['controller' => 'Prodi_controller', 'method' => 'delete', 'middleware' => ['App\Core\Middleware\Authmiddleware']],

        '/matakuliah' => ['controller' => 'Matakuliah_controller', 'method' => 'index', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/matakuliah/create' => ['controller' => 'Matakuliah_controller', 'method' => 'create', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/matakuliah/edit' => ['controller' => 'Matakuliah_controller', 'method' => 'edit', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/matakuliah/delete' => ['controller' => 'Matakuliah_controller', 'method' => 'delete', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
    ],
    'POST' => [
        '/login' => ['controller' => 'Auth_controller', 'method' => 'login'],
        '/mahasiswa/store' => ['controller' => 'Mahasiswa_controller', 'method' => 'store', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/mahasiswa/update' => ['controller' => 'Mahasiswa_controller', 'method' => 'update', 'middleware' => ['App\Core\Middleware\Authmiddleware']],

        '/prodi/store' => ['controller' => 'Prodi_controller', 'method' => 'store', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/prodi/update' => ['controller' => 'Prodi_controller', 'method' => 'update', 'middleware' => ['App\Core\Middleware\Authmiddleware']],

        '/matakuliah/store' => ['controller' => 'Matakuliah_controller', 'method' => 'store', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
        '/matakuliah/update' => ['controller' => 'Matakuliah_controller', 'method' => 'update', 'middleware' => ['App\Core\Middleware\Authmiddleware']],
    ]
];
?>