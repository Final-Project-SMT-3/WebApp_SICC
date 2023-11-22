<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/LombaModel.php';

class MasterLombaController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new LombaModel;
    }

    public function index()
    {
        $data = $this->model->getAllLomba();
        $this->view('admin/pages/lomba/lomba', $data);
    }

    public function create()
    {
        $this->view('admin/pages/lomba/lomba_add');
    }

    public function store()
    {
        $storeData = $this->model->insert([$_POST, $_FILES]);
        if ($storeData['status']) {
            header('Location: /admin/MasterLomba');
        } else {
            header('Location: /admin/MasterLomba');
        }
    }

    public function edit($id)
    {
        $data = $this->model->getLomba($id);
        $this->view('admin/pages/lomba/edit', $data);
    }

    public function update()
    {
        $updatedData = $this->model->update([$_POST, $_FILES]);
        if ($updatedData['status']) {
            header('Location: /admin/MasterLomba/index');
        } else {
            var_dump($updatedData['error_message']);
        }
    }

    public function delete($id)
    {
        $deletedData = $this->model->delete($id);
        if ($deletedData['status']) {
            header('Location: /admin/MasterLomba/index');
        } else {
            var_dump($deletedData['error_message']);
        }
    }
}