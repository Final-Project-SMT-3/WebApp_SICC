<?php
require_once 'Controller.php';

class LombaController extends Controller
{
    public function index()
    {
        $this->view('user/infoLomba');
    }
}
?>