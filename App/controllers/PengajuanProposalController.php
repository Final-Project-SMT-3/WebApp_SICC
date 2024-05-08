<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/PengajuanProposalModel.php';

class PengajuanProposalController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PengajuanProposalModel;
    }

    public function index()
    {
        $data = $this->model->getAllPengajuan();
        $this->view('admin/pages/pengajuanProposal/pengajuan', $data);
    }

    public function tinjauan($id)
    {
        $data = $this->model->getPengajuan($id);
        $this->view('admin/pages/pengajuanProposal/pengajuan_tinjau', $data);
    }

    public function update()
    {
        $data = $this->model->updatePengajuanProposal([$_POST]);
        if ($data['status']) {
            header('Location: /admin/PengajuanProposal');
        } else {
            var_dump($data['error_message']);
        }
    }
}
?>