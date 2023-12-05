<?php

class Controller
{
    private $token = 'KgncmLUc7qvicKI1OjaLYLkPi';
    public function view($view, $data = array())
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.php';
    }
    public function viewIndexLomba($view, $data = array(), $dataLomba = array())
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.php';
    }

    public function getToken()
    {
        return $this->token;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}