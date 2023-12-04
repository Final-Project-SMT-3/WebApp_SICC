<?php
require_once 'Controller.php';

class IndexController extends Controller
{
    public function index()
    {
        session_start();
        session_destroy();
        $this->view('user/index');
    }
}
?>