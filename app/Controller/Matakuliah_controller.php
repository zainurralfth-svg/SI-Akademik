<?php
namespace App\Controller;

require_once __DIR__ . '/../Repository/Matakuliah_repository.php'; 
use App\Repositories\MatakuliahRepository;

class Matakuliah_controller 
{
    private MatakuliahRepository $mkRepo;

    public function __construct()
    {
        $this->mkRepo = new MatakuliahRepository();
    }

    public function index() 
    {
        $data_mk = $this->mkRepo->allWithProdi();
        $content = __DIR__ . '/../View/Matakuliah/index.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function create()
    {
        $data_prodi = $this->mkRepo->getAllProdi();
        $content = __DIR__ . '/../View/Matakuliah/create.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => trim($_POST['kode'] ?? ''),
                'nama' => trim($_POST['nama'] ?? ''),
                'sks' => $_POST['sks'] ?? 2,
                'prodi_id' => $_POST['prodi_id'] ?? 1
            ];
            if (!empty($data['kode']) && !empty($data['nama'])) {
                $this->mkRepo->create($data);
            }
            header('Location: /S1-Akademik/public/matakuliah');
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /S1-Akademik/public/matakuliah');
            exit;
        }

        $matakuliah = $this->mkRepo->find((int)$id);
        $data_prodi = $this->mkRepo->getAllProdi();
        $content = __DIR__ . '/../View/Matakuliah/edit.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $data = [
                    'kode' => trim($_POST['kode'] ?? ''),
                    'nama' => trim($_POST['nama'] ?? ''),
                    'sks' => $_POST['sks'] ?? 2,
                    'prodi_id' => $_POST['prodi_id'] ?? 1
                ];
                $this->mkRepo->update((int)$id, $data);
            }
            header('Location: /S1-Akademik/public/matakuliah');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->mkRepo->delete((int)$id);
        }
        header('Location: /S1-Akademik/public/matakuliah');
        exit;
    }
}
?>