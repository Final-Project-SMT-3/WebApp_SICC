<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/RegisterModel.php';

class DaftarLombaController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new RegisterModel;
    }

    public function index()
    {
        $data = $this->model->getAllLomba();
        $this->view('user/pages/daftar_lomba/daftarLomba', $data);
    }

    public function store()
    {
        $storeData = $this->model->insert([$_POST]);
        if ($storeData['status']) {
            header('Location: /verified');
        } else {
            header('Location: /verified');
        }
    }
}
?>