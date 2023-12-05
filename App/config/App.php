<?php

class App
{
    private $controller;
    private $method;
    private $params;

    public function __construct()
    {
        $url = $this->parseUrl();

        if (!isset($url[1])) {
            // FOR NON API CONTROLLER
            $this->controller = 'IndexController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'lomba') {
            // FOR NON API CONTROLLER
            $this->controller = 'LombaController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'verified') {
            $this->view('user/verified');
        } else if ($url[1] == 'login') {
            // FOR NON API CONTROLLER
            $methodName = $url[2] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[1] . "Controller.php")) {
                $this->controller = 'LoginController';
                unset($url[1]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[2])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[2]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'register') {
            // FOR NON API CONTROLLER
            $this->controller = 'RegisterController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'forgetPassword') {
            // FOR NON API CONTROLLER
            $this->controller = 'ForgetPassController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'changePassword') {
            // FOR NON API CONTROLLER
            $this->controller = 'ChangePassController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'daftarLomba') {
            // FOR NON API CONTROLLER
            $this->controller = 'DaftarLombaController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'blog') {
            // FOR NON API CONTROLLER
            $this->controller = 'BlogController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[1] == 'verified') {
            // FOR NON API CONTROLLER
            $this->view('user/verified');
        } else if ($url[1] == 'logout') {
            session_start();
            session_destroy();
            header('Location: /login');
        } else if ($url[1] == 'admin' && !isset($url[2])) {
            // FOR NON API CONTROLLER
            $this->controller = 'DashboardController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[2] == 'MasterArtikel') {
            // FOR NON API CONTROLLER
            $this->controller = 'ArtikelController';
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;
            $this->method = 'index';

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);

        } else if ($url[2] == 'MasterLomba') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[2] == 'MasterFaq') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[2] == 'MasterJuara') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[2] == 'PengajuanBimbingan') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[2] == 'PengajuanJudul') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[2] == 'PengajuanProposal') {
            $methodName = $url[3] ?? 'index';
            // FOR NON API CONTROLLER
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $url[2] . "Controller.php")) {
                $this->controller = (($url[2])) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once $_SERVER['DOCUMENT_ROOT'] . "/App/controllers/" . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            } else {
                $this->method = 'index';
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else if ($url[1] == 'API') {
            $methodName = $url[3];
            // FOR API CONTROLLER
            if (file_exists("../App/controllers/API/" . ucfirst($url[2]) . "Controller.php")) {
                $this->controller = ucfirst($url[2]) . 'Controller';
                unset($url[2]);
            }

            // GET Controller
            require_once '../App/controllers/API/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[3])) {
                if (method_exists($this->controller, $methodName)) {
                    $this->method = $methodName;
                    unset($url[3]);
                }
            }

            // Parsing parameter
            if (!empty($url)) {
                unset($url[0]);
                unset($url[1]);
                $this->params = array_values($url);
            } else {
                $this->params = [];
            }

            // Run controler & method
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            $this->view('user/404');
        }
    }

    public function view($view, $data = array())
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.php';
    }

    public function parseUrl()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}