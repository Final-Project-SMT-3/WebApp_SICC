<?php
require_once 'Controller.php';

class LoginController extends Controller
{
    public function index()
    {
        $this->view('user/login');
    }
}
?>