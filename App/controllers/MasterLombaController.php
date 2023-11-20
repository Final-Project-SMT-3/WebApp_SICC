<?php

class MasterLombaController extends Controller{
    private $model;

    public function __construct()
    {
        require_once '../App/Models/LombaModel.php';
        $this->model = new LombaModel;
    }

    public function index(){
        $data = $this->model->getAllLomba();
        $this->view('master-lomba/index', $data);
    }

    public function create(){
        $this->view('admin/pages/lomba/lomba_add');
    }
}