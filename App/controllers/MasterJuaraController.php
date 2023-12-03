<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/JuaraModel.php';

class MasterJuaraController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new JuaraModel;
    }

    public function index()
    {
        $this->view('admin/pages/juara/juara');
    }

    public function create()
    {
        $this->view('admin/pages/juara/juara_add');
    }

    public function edit($id)
    {
        $data = $this->model->getFaq($id);
        $this->view('admin/pages/faq/faq_edit', $data);
    }
}
?>