<?php
require_once 'Controller.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/UsersModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/src/SMTP.php';

class RegisterController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }
    public function index()
    {
        $this->view('user/register');
    }
    public function store()
    {
        $input = $this->model->registerWeb($_POST);
        if($input->status == true){
            $this->sendEmail($input->email);
            session_start();
            $_SESSION['id_register'] = $input->id;
            header("Location: /daftarLomba");
        } else {
            $message = $input->message;
            echo $message;
            echo "<script>alert($message)</script>";
            header("Location: /register");
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

        $otp = $this->generateRandomString(4);
        $mail->isHTML(true);
        $mail->Subject = 'Kode OTP Register';
        $mail->Body = $otp;
        $mail->send();

        $this->model->insertOTP($otp);
    }

    public function cekOtp(){
        $cekOTP = $this->model->cekOTP($_POST);
        if($cekOTP->status == 'ok'){
            if($cekOTP->result > 0){
                $this->model->deactiveOTP($_POST['otp']);
                $insertKelompok = $this->model->createPassword($_POST);
                if($insertKelompok->status == 'ok'){
                    header("Location: /login");
                } else{
                    var_dump($insertKelompok);
                }
            } else{
                var_dump($cekOTP);
                // header("Location: /daftarLomba");
            }
        } else{
            var_dump($cekOTP);
            // header("Location: /daftarLomba");
        }
    }
}
?>