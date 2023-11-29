<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/ProposalModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/controllers/Controller.php';

class ProposalController extends Controller {
    private $model;
    public function __construct() 
    {
        $this->model = new ProposalModel;
    }
    public function pengajuanProposal() {
        if (isset($_SERVER['HTTP_HTTP_TOKEN'])) {
            if ($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()) {
                echo json_encode($this->model->pengajuanProposal($_POST));
            } else {
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';
                echo json_encode($response);
            }
        } else {
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';
            echo json_encode($response);
        }
    }

    public function pengajuanRevisiProposal() {
        if (isset($_SERVER['HTTP_HTTP_TOKEN'])) {
            if ($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()) {
                echo json_encode($this->model->pengajuanRevisiProposal($_POST));
            } else {
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';
                echo json_encode($response);
            }
        } else {
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';
            echo json_encode($response);
        }
    }

    public function getDetailProposal() {
        if (isset($_SERVER['HTTP_HTTP_TOKEN'])) {
            if ($_SERVER['HTTP_HTTP_TOKEN'] == $this->getToken()) {
                echo $this->model->getDetailProposal($_POST);
            } else {
                $response = new stdClass;
                $response->status_code = 403;
                $response->message = 'Access Forbidden.';
                echo json_encode($response);
            }
        } else {
            $response = new stdClass;
            $response->status_code = 403;
            $response->message = 'Access Forbidden.';
            echo json_encode($response);
        }
    }
}