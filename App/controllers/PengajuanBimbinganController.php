<?php
require_once 'Controller.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/PengajuanProposalModel.php';

class PengajuanBimbinganController extends Controller
{
    private $model;

    // public function __construct()
    // {
    //     $this->model = new PengajuanProposalModel;
    // }

    public function index()
    {
        // $data = $this->model->getAllPengajuan();
        $this->view('admin/pages/pengajuanBimbingan/pengajuan');
    }

}
?>