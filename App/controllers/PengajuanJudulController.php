<?php
require_once 'Controller.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/PengajuanProposalModel.php';

class PengajuanJudulController extends Controller
{
    private $model;

    // public function __construct()
    // {
    //     $this->model = new PengajuanProposalModel;
    // }

    public function index()
    {
        // $data = $this->model->getAllPengajuan();
        $this->view('admin/pages/pengajuanJudul/pengajuan');
    }

    public function tinjauan($id)
    {
        // $data = $this->model->getPengajuan($id);
        $this->view('admin/pages/pengajuanJudul/pengajuan_tinjau');
    }
}
?>