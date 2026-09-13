<?php
namespace App\Repositories;

use App\Core\database;
use PDO;

class MatakuliahRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function allWithProdi(): array
    {
        $stmt = $this->db->query(
            "SELECT mk.*, p.nama AS prodi_nama 
             FROM matakuliah mk 
             JOIN prodi p ON mk.prodi_id = p.id 
             ORDER BY mk.id DESC"
        );
        return $stmt->fetchAll();
    }

    public function getAllProdi(): array
    {
        return $this->db->query("SELECT * FROM prodi")->fetchAll();
    }

    public function find(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM matakuliah WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO matakuliah (kode, nama, sks, prodi_id) 
             VALUES (:kode, :nama, :sks, :prodi_id)"
        );
        return $stmt->execute([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
            'prodi_id' => $data['prodi_id']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE matakuliah SET kode = :kode, nama = :nama, sks = :sks, prodi_id = :prodi_id 
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
            'prodi_id' => $data['prodi_id']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM matakuliah WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>