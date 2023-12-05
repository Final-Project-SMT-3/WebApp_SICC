<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/IndexModel.php';

class IndexController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new IndexModel;
    }
    public function index()
    {
        session_start();
        session_destroy();
        $dataFaq = $this->model->getAllFaq();
        $dataLomba = $this->model->getAllLomba();
        $this->viewIndexLomba('user/index', $dataFaq, $dataLomba);
    }
}
?>