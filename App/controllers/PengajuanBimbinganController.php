<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/PengajuanBimbinganModel.php';

class PengajuanBimbinganController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PengajuanBimbinganModel;
    }

    public function index()
    {
        session_start();
        $idUser = $_SESSION['userId'];
        $data = $this->model->getAllPengajuan($idUser);
        $this->view('admin/pages/pengajuanBimbingan/pengajuan', $data);
    }

    public function updateAcc($id)
    {
        $updatedData = $this->model->updateAcc($id);
        if ($updatedData['status']) {
            header('Location: /admin/PengajuanBimbingan');
        } else {
            var_dump($updatedData['error_message']);
        }
    }
    public function updateDec($id)
    {
        $updatedData = $this->model->updateDec($id);
        if ($updatedData['status']) {
            header('Location: /admin/PengajuanBimbingan');
        } else {
            var_dump($updatedData['error_message']);
        }
    }

}
?>