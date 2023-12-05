<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/BlogModel.php';

class BlogController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new BlogModel;
    }

    public function index()
    {
        $data = $this->model->getAllBlog();
        $this->view('user/pages/blog/blog', $data);
    }
}
?>