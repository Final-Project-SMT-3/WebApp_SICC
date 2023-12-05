<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/PengajuanJudulModel.php';

class PengajuanJudulController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PengajuanJudulModel;
    }

    public function index()
    {
        session_start();
        $idUser = $_SESSION['userId'];
        $data = $this->model->getAllPengajuan($idUser);
        $this->view('admin/pages/pengajuanJudul/pengajuan', $data);
    }

    public function updateJudul($id)
    {
        $data = $this->model->updatePengajuanJudul($id, [$_POST]);
        if ($data['status']) {
            header('Location: /admin/PengajuanJudul');
        } else {
            var_dump($data['error_message']);
        }
    }
}
?>