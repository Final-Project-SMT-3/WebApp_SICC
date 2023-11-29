<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/LombaModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/controllers/Controller.php';

class LombaController extends Controller{
    private $model;

    public function __construct()
    {
        $this->model = new LombaModel;
    }

    public function getLomba(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                if(isset($_POST['id_detail_lomba'])){
                    echo json_encode($this->model->getRequestedData($_POST));
                } else{
                    echo json_encode($this->model->getAllData());
                }
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

    public function getDetailLomba(){
        if(isset($_SERVER['HTTP_HTTP_TOKEN'])){
            if($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()){
                echo $this->model->getRequestedData($_POST);
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