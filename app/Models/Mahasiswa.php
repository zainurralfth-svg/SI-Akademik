<?php
// File: app/Models/Mahasiswa.php
namespace App\Models;

require_once __DIR__ . '/../Core/Model.php'; 
use App\Core\Model;

class Mahasiswa extends Model
{
    public function allWithProdi(?string $keyword = null): array
    {
        if ($keyword) {
            $stmt = $this->db->prepare(
                "SELECT m.*, p.nama AS prodi_nama 
                 FROM mahasiswa m 
                 JOIN prodi p ON m.prodi_id = p.id 
                 WHERE m.nama LIKE :keyword1 OR m.nim LIKE :keyword2 
                 ORDER BY m.nim DESC"
            );
            $stmt->execute([
                'keyword1' => "%{$keyword}%",
                'keyword2' => "%{$keyword}%"
            ]);
            return $stmt->fetchAll();
        } else {
            $stmt = $this->db->query(
                "SELECT m.*, p.nama AS prodi_nama 
                 FROM mahasiswa m 
                 JOIN prodi p ON m.prodi_id = p.id 
                 ORDER BY m.nim DESC"
            );
            return $stmt->fetchAll();
        }
    }
    public function getAllProdi(): array
    {
        return $this->db->query("SELECT * FROM prodi")->fetchAll();
    }
    public function find(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO mahasiswa (nim, nama, email, prodi_id, angkatan, status) 
             VALUES (:nim, :nama, :email, :prodi_id, :angkatan, :status)"
        );
        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status']
        ]);
    }
   public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE mahasiswa SET nim = :nim, nama = :nama, email = :email, 
             prodi_id = :prodi_id, angkatan = :angkatan, status = :status 
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status']
        ]);
    }
   public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>