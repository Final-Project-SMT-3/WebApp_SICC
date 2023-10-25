<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        include 'views/user/index.php';
        break;
    case '/login':
        include 'views/user/login.php';
        break;
    case '/register':
        include 'views/user/register.php';
        break;
    case '/forgetPassword':
        include 'views/user/forgetPassword.php';
        break;
    case '/admin':
        include 'views/admin/dashboard.php';
        break;
    case '/admin/artikel':
        include 'views/admin/artikel.php';
        break;
    default:
        include 'views/user/404.php';
        break;
}
?>