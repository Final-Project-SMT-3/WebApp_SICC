<?php
require_once 'Controller.php';

class ArtikelController extends Controller
{
    public function index()
    {
        $this->view('admin/pages/artikel/artikel');
    }
}
?>