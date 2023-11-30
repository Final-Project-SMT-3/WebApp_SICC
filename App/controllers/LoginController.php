<?php
require_once 'Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/LoginModel.php';

class LoginController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new LoginModel;
    }

    public function index()
    {
        $this->view('user/login');
    }

    public function login()
    {
        $loginData = $this->model->login([$_POST]);
        if ($loginData['tipe'] == 'mahasiswa') {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userType'] = 'mahasiswa';
            $_SESSION['userId'] = $loginData['id'];
            header('Location: /verified');
        } else if ($loginData['tipe'] == 'dosen') {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userType'] = 'dosen';
            $_SESSION['userId'] = $loginData['id'];
            header('Location: /admin');
        } else if ($loginData['tipe'] == 'admin') {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userType'] = 'admin';
            $_SESSION['userId'] = $loginData['id'];
            header('Location: /admin');
        }
    }
}
?>