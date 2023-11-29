<?php
require_once 'Controller.php';

class ChangePassController extends Controller
{
    public function index()
    {
        $this->view('user/changePassword');
    }
}
?>