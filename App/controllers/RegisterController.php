<?php
require_once 'Controller.php';

class RegisterController extends Controller
{
    public function index()
    {
        $this->view('user/register');
    }
    public function store()
    {

    }
}
?>