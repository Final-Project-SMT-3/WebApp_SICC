<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/UsersModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/controllers/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/SMTP.php';

class UsersController extends Controller{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }

    public function login(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                echo $this->model->login($_POST);
            } else{
                $response = new stdClass;
                $response->code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }

    public function register(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                echo $this->model->register($_POST);
            } else{
                $response = new stdClass;
                $response->code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }

    public function lupaPassword(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                $cekEmail = $this->model->cekEmail($_POST);
                if($cekEmail->status_code == 200){
                    if ($cekEmail->result > 0) {
                        $response = new stdClass;
                        $response->status_code = 200;
                        $response->message ='Success';

                        echo json_encode($response);

                        return $this->sendEmail($cekEmail->email);
                    } else{
                        $response = new stdClass;
                        $response->status_code = 200;
                        $response->message ='Email Tidak Dapat Ditemukan';

                        echo json_encode($response);
                    }
                } else
                    echo json_encode($cekEmail);
            } else{
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }

    public function sendEmail($email){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abhiemsmile@gmail.com';
        $mail->Password = 'hvfbfijcfbnqwqsl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom('abhiemsmile@gmail.com');
        $mail->addAddress($email);

        $otp = $this->generateRandomNumber(4);
        $mail->isHTML(true);
        $mail->Subject = 'Lupa Password OTP';
        $mail->Body = $otp;
        $mail->send();

        $this->model->insertOTP($otp);
    }

    public function cekOtp(){
        $response = new stdClass;
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                $cekOTP = $this->model->cekOTP($_POST);
                if($cekOTP->status_code == 200){
                    $response->status_code = 200;
                    if($cekOTP->result > 0){
                        $this->model->deactiveOTP($_POST['otp']);
                        $response->message ='Success';
                    }
                    else{
                        $response->message ='OTP Tidak Dapat Di Temukan.';
                    }
                } else{
                    echo json_encode($cekOTP);
                }
                echo json_encode($response);
            } else{
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }

    public function resetPassword(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                echo json_encode($this->model->resetPassword($_POST));
            } else{
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }

    public function getDataUser(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                echo $this->model->getDataUser($_POST);
            } else{
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';

                echo json_encode($response);
            }
        } else{
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';

            echo json_encode($response);
        }
    }
}