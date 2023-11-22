<?php

class Controller{
    private $token = 'KgncmLUc7qvicKI1OjaLYLkPi';
    public function view($view, $data = array()){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.php';
    }

    public function getToken(){
        return $this->token;
    }
}