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

    public function generateRandomNumber($length = 4) {
        $numbers = '0123456789';
        $numbersLength = strlen($numbers);
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $numbers[random_int(0, $numbersLength - 1)];
        }
        return $randomNumber;
    }
}