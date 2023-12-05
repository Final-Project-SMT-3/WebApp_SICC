<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/FaqModel.php';

class MasterFaqController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new FaqModel;
    }

    public function index()
    {
        $data = $this->model->getAllFaq();
        $this->view('admin/pages/faq/faq', $data);
    }

    public function create()
    {
        $this->view('admin/pages/faq/faq_add');
    }

    public function store()
    {
        $storeData = $this->model->insert([$_POST]);
        if ($storeData['status']) {
            header('Location: /admin/MasterFaq');
        } else {
            header('Location: /admin/MasterFaq');
        }
    }

    public function edit($id)
    {
        $data = $this->model->getFaq($id);
        $this->view('admin/pages/faq/faq_edit', $data);
    }

    public function update()
    {
        $updatedData = $this->model->update([$_POST]);
        if ($updatedData['status']) {
            header('Location: /admin/MasterFaq/index');
        } else {
            var_dump($updatedData['error_message']);
        }
    }

    public function delete($id)
    {
        $deletedData = $this->model->delete($id);
        if ($deletedData['status']) {
            header('Location: /admin/MasterFaq/index');
        } else {
            var_dump($deletedData['error_message']);
        }
    }
}
?>