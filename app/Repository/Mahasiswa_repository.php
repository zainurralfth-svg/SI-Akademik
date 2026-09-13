<?php
namespace App\Repositories;

use App\Core\database;
use PDO;
use Exception;
class MahasiswaRepository
{
    private PDO $db;
    public function __construct()
    {
        $this->db = database::getInstance();
    }
    public function all(): array
    {
        return $this->db->query(
            "SELECT m.*, p.nama AS prodi_nama 
             FROM mahasiswa m 
             JOIN prodi p ON m.prodi_id = p.id 
             ORDER BY m.nim DESC"
        )->fetchAll();
    }
    public function find(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function getAllProdi(): array
    {
        return $this->db->query("SELECT * FROM prodi")->fetchAll();
    }
    public function create(array $data): bool
    {
        $check = $this->db->prepare("SELECT COUNT(*) FROM mahasiswa WHERE nim = :nim");
        $check->execute(['nim' => $data['nim']]);
        if ($check->fetchColumn() > 0) {
            throw new Exception("NIM sudah terdaftar di database!");
        }
        $stmt = $this->db->prepare(
            "INSERT INTO mahasiswa (nim, nama, email, prodi_id, angkatan) 
             VALUES (:nim, :nama, :email, :prodi_id, :angkatan)"
        );
        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan']
        ]);
    }
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE mahasiswa SET nim = :nim, nama = :nama, email = :email, 
             prodi_id = :prodi_id, angkatan = :angkatan 
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan']
        ]);
    }
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>