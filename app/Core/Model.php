<?php
// File: app/Core/Model.php
namespace App\Core;
require_once __DIR__ . '/database.php';

use PDO;

class Model
{
    protected PDO $db;

    public function __construct()
    {
        // Menggunakan class database yang sudah kita buat
        $this->db = database::getInstance();
    }
}
?>