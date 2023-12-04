<?php
require_once 'Controller.php';

class BlogController extends Controller
{
    public function index()
    {
        $this->view('user/pages/blog/blog');
    }
}
?>