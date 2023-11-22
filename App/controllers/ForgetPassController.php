<?php
require_once 'Controller.php';

class ForgetPassController extends Controller
{
    public function index()
    {
        $this->view('user/forgetPassword');
    }
}
?>