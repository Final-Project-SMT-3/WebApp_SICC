<?php
require_once 'Controller.php';

class IndexController extends Controller
{
    public function index()
    {
        $this->view('user/index');
    }
}
?>