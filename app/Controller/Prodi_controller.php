<?php
namespace App\Controller;

require_once __DIR__ . '/../Repository/Prodi_repository.php'; 
use App\Repositories\ProdiRepository;

class Prodi_controller 
{
    private ProdiRepository $prodiRepo;

    public function __construct()
    {
        $this->prodiRepo = new ProdiRepository();
    }

    public function index() 
    {
        $data_prodi = $this->prodiRepo->all();
        $content = __DIR__ . '/../View/Prodi/index.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function create()
    {
        $content = __DIR__ . '/../View/Prodi/create.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => trim($_POST['kode'] ?? ''),
                'nama' => trim($_POST['nama'] ?? '')
            ];
            if (!empty($data['kode']) && !empty($data['nama'])) {
                $this->prodiRepo->create($data);
            }
            header('Location: /S1-Akademik/public/prodi');
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /S1-Akademik/public/prodi');
            exit;
        }

        $prodi = $this->prodiRepo->find((int)$id);
        $content = __DIR__ . '/../View/Prodi/edit.php';
        require_once __DIR__ . '/../View/Layouts/main.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $data = [
                    'kode' => trim($_POST['kode'] ?? ''),
                    'nama' => trim($_POST['nama'] ?? '')
                ];
                $this->prodiRepo->update((int)$id, $data);
            }
            header('Location: /S1-Akademik/public/prodi');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->prodiRepo->delete((int)$id);
        }
        header('Location: /S1-Akademik/public/prodi');
        exit;
    }
}
?>