<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/ArtikelModel.php';

class ArtikelController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ArtikelModel;
    }

    public function index()
    {
        $data = $this->model->getAllArtikel();
        $this->view('admin/pages/artikel/artikel', $data);
    }
}
?>