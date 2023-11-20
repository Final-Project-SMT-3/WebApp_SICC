<?php   

class App{
    private $controller;
    private $method;
    private $params;

    public function __construct()
    {
        $url = $this->parseUrl();
        $methodName = $url[3];
        
        if($url[1] == 'API'){
            // FOR API CONTROLLER
            if(file_exists("../App/controllers/API/" . ucfirst($url[2]) . "Controller.php")){
                $this->controller = ucfirst($url[2]) . 'Controller'; 
                unset($url[2]);
            }

            // GET Controller
            require_once '../App/controllers/API/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if(isset($url[3])){
                if(method_exists($this->controller, $methodName)){
                    $this->method = $methodName;
                    unset($url[3]);
                }
            }
        } else if($url[1] == 'admin') {
            // FOR NON API CONTROLLER
            if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")){
                $this->controller = (($url[2])) . 'Controller'; 
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
    
            if(isset($url[3])){
                if(method_exists($this->controller, $methodName)){
                    $this->method = $methodName;
                    unset($url[3]);
                }
            }
        }

        // Parsing parameter
        if(!empty($url)){
            unset($url[0]);
            unset($url[1]);
            $this->params = array_values($url);
        } else{
            $this->params = [];
        }

        // Run controler & method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(){
        if( isset($_SERVER['REQUEST_URI']) ){
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}