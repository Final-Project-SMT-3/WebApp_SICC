<?php
require_once 'Controller.php';

class PengajuanController extends Controller
{
    public function index()
    {
        $this->view('admin/pages/pengajuan/pengajuan');
    }
}
?>