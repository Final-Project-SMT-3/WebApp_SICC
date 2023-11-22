<?php
require_once 'Controller.php';

class DashboardController extends Controller
{
    public function index()
    {
        $this->view('admin/dashboard');
    }
}
?>