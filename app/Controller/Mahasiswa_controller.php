<?php
namespace App\Controller;
require_once __DIR__ . '/../Core/Controller.php'; 
require_once __DIR__ . '/../Repository/Mahasiswa_repository.php'; 

use App\Core\Controller;
use App\Repositories\MahasiswaRepository;
use Exception;

class Mahasiswa_controller extends Controller 
{
        private MahasiswaRepository $mhsRepo;

    public function __construct()
    {
        $this->mhsRepo = new MahasiswaRepository();
    }
    public function index() 
    {
        $data_mahasiswa = $this->mhsRepo->all();
        $this->view('mahasiswa/index', ['data_mahasiswa' => $data_mahasiswa]);
    }
    public function create()
    {
        $data_prodi = $this->mhsRepo->getAllProdi();
        $this->view('Mahasiswa/create', ['data_prodi' => $data_prodi]);
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'nim' => trim($_POST['nim'] ?? ''),
                    'nama' => trim($_POST['nama'] ?? ''),
                    'email' => trim($_POST['email'] ?? ''),
                    'prodi_id' => $_POST['prodi_id'] ?? 1,
                    'angkatan' => $_POST['angkatan'] ?? date('Y')
                ];
                
                if (!empty($data['nim']) && !empty($data['nama'])) {
                    $this->mhsRepo->create($data);
                }
                $this->redirect('/mahasiswa');
            } catch (Exception $e) {
                echo "<script>alert('{$e->getMessage()}'); window.history.back();</script>";
                exit;
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('/mahasiswa');
        }
        $mahasiswa = $this->mhsRepo->find((int)$id);
        $data_prodi = $this->mhsRepo->getAllProdi();

        $this->view('Mahasiswa/edit', [
            'mahasiswa' => $mahasiswa, 
            'data_prodi' => $data_prodi
        ]);
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $data = [
                    'nim' => trim($_POST['nim'] ?? ''),
                    'nama' => trim($_POST['nama'] ?? ''),
                    'email' => trim($_POST['email'] ?? ''),
                    'prodi_id' => $_POST['prodi_id'] ?? 1,
                    'angkatan' => $_POST['angkatan'] ?? date('Y')
                ];
                $this->mhsRepo->update((int)$id, $data);
            }
            $this->redirect('/mahasiswa');
        }
    }
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->mhsRepo->delete((int)$id);
        }
        $this->redirect('/mahasiswa');
    }
}
?>