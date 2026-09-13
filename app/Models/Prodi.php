<?php
namespace App\Models;

require_once __DIR__ . '/../Core/Model.php'; 
use App\Core\Model;

class Prodi extends Model
{
    public function all(): array
    {
        return $this->db->query("SELECT * FROM prodi ORDER BY id DESC")->fetchAll();
    }

    public function find(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM prodi WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare("INSERT INTO prodi (kode, nama) VALUES (:kode, :nama)");
        return $stmt->execute([
            'kode' => $data['kode'],
            'nama' => $data['nama']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE prodi SET kode = :kode, nama = :nama WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'kode' => $data['kode'],
            'nama' => $data['nama']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM prodi WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>