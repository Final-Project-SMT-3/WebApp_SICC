<?php

class Controller{
    private $token = 'KgncmLUc7qvicKI1OjaLYLkPi';
    public function view($view, $data = array()){
        require_once '../App/views/' . $view . '.php';
    }

    public function getToken(){
        return $this->token;
    }
}