<?php
require_once 'Controller.php';

class FaqController extends Controller
{
    public function index()
    {
        $this->view('admin/pages/faq/faq');
    }
}
?>